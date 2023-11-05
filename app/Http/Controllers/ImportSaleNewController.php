<?php

namespace App\Http\Controllers;

use App\Exports\InvalidRecordsExport;
use App\Exports\SuccessRecordsExport;
use App\Models\ManagementTypes;
use App\Imports\ImportSaleNewImport;
use App\Models\ImportSaleNew;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Exception;

class ImportSaleNewController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:Admin|Post-Venta', 'permission:admin.form_postsale.index']);
    }

    public function index()
    {
        $management_types = ManagementTypes::all();
        return view('admin.import_salenew.index', compact('management_types'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'fileImport' => 'required|mimes:xlsx'
        ], [
            'fileImport.required' => 'El archivo es un campo obligatorio',
            'fileImport.mimes' => 'El archivo debe tener el formato XLSX',
        ]);

        $type_format = $request->input('management_types');
        $import = new ImportSaleNewImport($type_format);
        Excel::import($import, $request->file('fileImport'));

        $totalRows = $import->totalRows;
        $successRows = $import->successRows;
        $errorRows = $import->errorRows;

        $invalidRecords = $import->getInvalidRecords();
        $successRecords = $import->getSuccessRecords();

        $response = [
            'redirect' => 'admin.import_salenew.index',
            'type' => 'bg-success',
        ];

        if (!empty($invalidRecords)) {
            $nameFileNameErrors = $this->storeExportedFile(new InvalidRecordsExport($invalidRecords), 'error_sale_new', 'invalid_records');
            $response['title'] = 'Error';
            $response['message'] = 'Se encontraron registros con errores en la importación';
            $response['type'] = 'bg-danger';
            $response['download_url_error'] = $nameFileNameErrors;
        } else {
            $nameFileNameSuccess = $this->storeExportedFile(new SuccessRecordsExport($successRecords), 'success_sale_new', 'success_records');
            $response['title'] = 'Éxito';
            $response['message'] = 'Todos los registros se importaron correctamente';
            $response['download_url_success'] = $nameFileNameSuccess;

            $importSaleNew = new ImportSaleNew([
                'name' => 'import_file_' . Date::now()->format('YmdHis') . '.xlsx',
                'total_rows' => $totalRows,
                'errors_rows' => $errorRows,
                'success_rows' => $successRows,
                'url_errors_rows' => !isset($nameFileNameErrors) ? '' : $nameFileNameErrors,
                'url_success_rows' => $nameFileNameSuccess,
                'created_by' => Auth::id(),
                'updated_by' => Auth::id()
            ]);

            $importSaleNew->save();
        }

        return response()->json($response, !empty($invalidRecords) ? 500 : 200);
    }

    public function export(Request $request)
    {
        $type_format = $request->query('type_format');
        $filePaths = [
            '1' => 'import_sale_new/formato_importacion_venta_nueva.xlsx',
            '2' => 'import_sale_new/formato_importacion_cambio.xlsx',
            '3' => 'import_sale_new/formato_importacion_recojo.xlsx',
            '4' => 'import_sale_new/formato_importacion_soporte.xlsx',
            '5' => 'import_sale_new/formato_importacion_encuesta.xlsx',
        ];

        $rutaArchivo = storage_path('app/public/' . ($filePaths[$type_format] ?? $filePaths['accion1']));
        $nombreArchivo = basename($rutaArchivo);

        if (file_exists($rutaArchivo)) {
            $headers = [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            ];
            return Response::download($rutaArchivo, $nombreArchivo, $headers);
        } else {
            return abort(404);
        }
    }

    public function export_errors(Request $request)
    {
        return $this->exportFile($request->query('nameFile'), 'error_sale_new');
    }

    public function export_success(Request $request)
    {
        return $this->exportFile($request->query('nameFile'), 'success_sale_new');
    }

    protected function storeExportedFile($export, $folder, $fileNamePrefix)
    {
        $nameFileName = $fileNamePrefix . '_' . Date::now()->format('YmdHis') . '.xlsx';
        $exportFileName = $folder . '/' . $nameFileName;
        Excel::store($export, $exportFileName, 'public');
        return $nameFileName;
    }

    protected function exportFile($nameFile, $folder)
    {
        $routeFile = storage_path('app/public/' . $folder . '/' . $nameFile);
        $nameFile = basename($routeFile);

        if (file_exists($routeFile)) {
            $headers = [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            ];
            return Response::download($routeFile, $nameFile, $headers);
        } else {
            return abort(404);
        }
    }
}
