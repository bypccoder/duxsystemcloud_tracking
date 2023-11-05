<?php

namespace App\Http\Controllers;

use App\Exports\InvalidRecordsExport;
use App\Exports\SuccessRecordsExport;
use App\Models\ManagementTypes;
use App\Imports\ImportSaleNewImport;
use App\Models\ImportSaleNew;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Response;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Storage;

class ImportSaleNewController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:Admin|Post-Venta', 'permission:admin.form_postsale.index']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $management_types = ManagementTypes::all();
        return view('admin.import_salenew.index', compact('management_types'));
    }

    public function import(Request $request)
    {
        $type_format = $request->input('management_types');
        $request->validate([
            'fileImport' => 'required|mimes:xlsx'
        ], [
            'fileImport.required' => 'El archivo es un campo obligatorio',
            'fileImport.mimes' => 'El archivo debe tener el formato XLSX',
        ]);

        $import = new ImportSaleNewImport($type_format);
        Excel::import($import, $request->file('fileImport'));

        $invalidRecords = $import->getInvalidRecords();
        $successRecords = $import->getSuccessRecords();

        $totalRows = $import->totalRows;
        $successRows = $import->successRows;
        $errorRows = $import->errorRows;

        $importSaleNew = new ImportSaleNew([
            'name' => 'import_file_' . Date::now()->format('YmdHis') . '.xlsx',
            'total_rows' => $totalRows,
            'erros_rows' => $errorRows,
            'success_rows' => $successRows,
            'created_by' => Auth::id(),
            'updated_by' => Auth::id()
        ]);
        $importSaleNew->save();


        $invalidRecordsExport = new InvalidRecordsExport($invalidRecords);
        $successRecordsExport = new SuccessRecordsExport($successRecords);




        if (empty($invalidRecords)) {

            //Archivo Registros Correctos
            $nameFileNameSuccess = 'success_records_' . Date::now()->format('YmdHis') . '.xlsx';
            $exportFileNameSuccess = 'success_sale_new/success_records_' . Date::now()->format('YmdHis') . '.xlsx';
            Excel::store($successRecordsExport, $exportFileNameSuccess, 'public');

            $response = [
                'redirect' => 'admin.import_salenew.index',
                'title' => 'Éxito',
                'message' => 'Todos los registros se importaron correctamente.',
                'type' => 'bg-success',
                'download_url_success' => $nameFileNameSuccess,
            ];

            return response()->json($response, 200);

        } else {
            //Archivos Registros Inválidos
            $nameFileNameErros = 'invalid_records_' . Date::now()->format('YmdHis') . '.xlsx';
            $exportFileNameErrors = 'error_sale_new/invalid_records_' . Date::now()->format('YmdHis') . '.xlsx';
            Excel::store($invalidRecordsExport, $exportFileNameErrors, 'public');
            //$exportedFileUrlErrors = asset('storage/' . $exportFileNameErrors);

            //Archivos de Registros Correctos
            $nameFileNameSuccess = 'success_records_' . Date::now()->format('YmdHis') . '.xlsx';
            $exportFileNameSuccess = 'success_sale_new/success_records_' . Date::now()->format('YmdHis') . '.xlsx';
            Excel::store($successRecordsExport, $exportFileNameSuccess, 'public');

            $response = [
                'redirect' => '',
                'title' => 'Error',
                'message' => 'Se encontró registros con errores en la importación',
                'type' => 'bg-danger',
                'download_url_error' => $nameFileNameErros,
                'download_url_success' => $nameFileNameSuccess,
            ];


            return response()->json($response, 500);
        }
    }

    public function export(Request $request)
    {

        $type_format = $request->query('type_format');

        // Ruta completa del archivo
        switch ($type_format) {
            case 'accion1':
                $rutaArchivo = storage_path('app/public/import_sale_new/formato_importacion_venta_nueva.xlsx');
                break;
            case 'accion2':
                $rutaArchivo = storage_path('app/public/import_sale_new/formato_importacion_cambio.xlsx');
                break;
            case 'accion3':
                $rutaArchivo = storage_path('app/public/import_sale_new/formato_importacion_recojo.xlsx');
                break;
            case 'accion4':
                $rutaArchivo = storage_path('app/public/import_sale_new/formato_importacion_soporte.xlsx');
                break;
            case 'accion5':
                $rutaArchivo = storage_path('app/public/import_sale_new/formato_importacion_encuesta.xlsx');
                break;
            default:
                $rutaArchivo = storage_path('app/public/import_sale_new/formato_importacion_venta_nueva.xlsx');
                break;
        }

        $nombreArchivo = basename($rutaArchivo);

        if (file_exists($rutaArchivo)) {
            // Configura la respuesta HTTP para la descarga
            $headers = [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            ];

            // Devuelve la respuesta con el archivo como descarga
            return Response::download($rutaArchivo, $nombreArchivo, $headers);
        } else {
            // El archivo no existe, puedes manejar el error de acuerdo a tus necesidades
            return abort(404);
        }
    }

    public function export_errors(Request $request)
    {

        $file = $request->query('nameFile');
        $routeFile = storage_path('app/public/error_sale_new/' . $file);
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

    public function export_success(Request $request)
    {

        $file = $request->query('nameFile');
        $routeFile = storage_path('app/public/success_sale_new/' . $file);
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
