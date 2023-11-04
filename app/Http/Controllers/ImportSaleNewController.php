<?php

namespace App\Http\Controllers;

use App\Exports\InvalidRecordsExport;
use App\Models\ManagementTypes;
use App\Imports\ImportSaleNewImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Response;
use Exception;
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

        $invalidRecordsExport = new InvalidRecordsExport($invalidRecords);

        $exportFileName = 'error_sale_new/invalid_records.xlsx';
        Excel::store($invalidRecordsExport, $exportFileName, 'public');
        $exportedFileUrl = asset('storage/' . $exportFileName);

        $response = [
            'redirect' => '',
            'title' => 'Error',
            'message' => 'Se encontró registros con errores en la importación',
            'type' => 'bg-danger',
            'download_url' => $exportedFileUrl
        ];


        return response()->json($response);

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
}
