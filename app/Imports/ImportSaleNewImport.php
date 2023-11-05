<?php

namespace App\Imports;

use App\Models\PostSale;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Auth;

class ImportSaleNewImport implements ToModel, WithHeadingRow
{

    use Importable;

    protected $type_format;
    protected $errors = [];
    protected $invalidRecords = [];
    protected $successRecords = [];
    public $totalRows = 0;
    public $errorRows = 0;
    public $successRows = 0;

    public function __construct($type_format)
    {
        $this->type_format = $type_format;
    }


    public function model(array $row)
    {
        $type_format = intval($this->type_format);

        $modelData = [
            'document' => $row['documento'],
            'business_name' => $row['razon_social'],
            'receiving_person' => $row['contacto_que_recepciona'],
            'email_customer' => $row['email'],
            'titular_cellphone' => $row['celular_del_titular'],
            'address' => $row['direccion'],
            'reference' => $row['referencia'],
            'sale_date' => $row['fecha_venta'],
            'time_ranges_id' => 1,
            'model_text' => $row['modelo'],
            'new_serial' => $row['serie_nueva'],
            'observation' => $row['observaciones'],
            'record_type' => 'importacion',
            'management_type_id' => $type_format,
            'created_by' => Auth::id(),
            'updated_by' => Auth::id()

        ];

        if ($type_format == 1) {
            $modelData['sale_date'] = $row['fecha_venta'];
            $modelData['time_ranges_id'] = 1;
            $modelData['new_serial'] = $row['serie_nueva'];
            $errors = $this->validateRowFormatNewSale($row);
        } else if ($type_format == 2) {
            $modelData['sale_change'] = $row['fecha_cambio'];
            $modelData['time_ranges_id'] = 1;
            $modelData['old_serial'] = $row['serie_antiguo'];
            $errors = $this->validateRowFormatChange($modelData);
        } elseif ($type_format == 3) {
            $modelData['pickup_date'] = $row['fecha_recojo'];
            $modelData['time_ranges_id'] = 1;
            $modelData['old_serial'] = $row['serie_antiguo'];
            $errors = $this->validateRowFormatPickup($modelData);
        } elseif ($type_format == 4) {
            $modelData['support_date'] = $row['fecha_soporte'];
            $modelData['time_ranges_id'] = 1;
            $modelData['old_serial'] = $row['serie_antiguo'];
            $errors = $this->validateRowFormatSupport($modelData);
        } elseif ($type_format == 5) {
            $modelData['survey_date'] = $row['fecha_encuesta'];
            $modelData['time_ranges_id'] = 1;
            $modelData['survey'] = $row['encuesta'];
            $errors = $this->validateRowFormatSurvey($modelData);
        }

        $this->totalRows++;

        if (empty($errors)) {
            $this->successRows++;
            $this->successRecords[] = [
                'row' => $row
            ];
            return new PostSale($modelData);
        } else {
            $this->errorRows++;
            $this->invalidRecords[] = [
                'row' => $row,
                'errors' => $errors,
            ];

            return null;
        }
    }

    protected function validateRowFormatNewSale($row)
    {
        // Realiza validaciones personalizadas aquí y devuelve un array de errores
        $errors = [];

        if (empty($row['documento'])) {
            $errors['documento'] = 'El campo Documento es obligatorio.';
        }

        if (!is_numeric($row['documento'])) {
            $errors['documento'] = 'El campo Documento debe ser numérico.';
        }

        if (empty($row['razon_social'])) {
            $errors['razon_social'] = 'El campo Razón Social es obligatorio.';
        }

        if (empty($row['contacto_que_recepciona'])) {
            $errors['contacto_que_recepciona'] = 'El campo Contacto que recepciona es obligatorio.';
        }

        if (empty($row['email'])) {
            $errors['email'] = 'El campo Email es obligatorio.';
        }

        if (!filter_var($row['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'El campo Email no es una dirección de correo electrónico válida.';
        }

        if (empty($row['celular_del_titular'])) {
            $errors['celular_del_titular'] = 'El campo Celular del Titular es obligatorio.';
        }

        if (!is_numeric($row['celular_del_titular'])) {
            $errors['celular_del_titular'] = 'El campo Celular del Titular debe ser numérico.';
        }

        if (empty($row['direccion'])) {
            $errors['direccion'] = 'El campo Dirección es obligatorio.';
        }

        if (empty($row['referencia'])) {
            $errors['referencia'] = 'El campo Referencia es obligatorio.';
        }

        if (empty($row['fecha_venta'])) {
            $errors['fecha_venta'] = 'El campo Fecha de Venta es obligatorio.';
        }

        // if (empty($row['time_ranges_id'])) {
        //     $errors['time_ranges_id'] = 'El campo Rango Horario es obligatorio.';
        // }

        if (empty($row['modelo'])) {
            $errors['modelo'] = 'El campo Modelo es obligatorio.';
        }

        if (empty($row['serie_nueva'])) {
            $errors['serie_nueva'] = 'El campo Nueva Serie es obligatorio.';
        }

        if (empty($row['observaciones'])) {
            $errors['observaciones'] = 'El campo Observaciones es obligatorio.';
        }

        // dd($errors);

        return $errors;
    }

    protected function validateRowFormatChange($row)
    {
        // Realiza validaciones personalizadas aquí y devuelve un array de errores
        $errors = [];

        if (empty($row['documento'])) {
            $errors['documento'] = 'El campo Documento es obligatorio.';
        }

        if (!is_numeric($row['documento'])) {
            $errors['documento'] = 'El campo Documento debe ser numérico.';
        }

        if (empty($row['razon_social'])) {
            $errors['razon_social'] = 'El campo Razón Social es obligatorio.';
        }

        if (empty($row['contacto_que_recepciona'])) {
            $errors['contacto_que_recepciona'] = 'El campo Contacto que recepciona es obligatorio.';
        }

        if (empty($row['email'])) {
            $errors['email'] = 'El campo Email es obligatorio.';
        }

        if (!filter_var($row['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'El campo Email no es una dirección de correo electrónico válida.';
        }

        if (empty($row['celular_del_titular'])) {
            $errors['celular_del_titular'] = 'El campo Celular del Titular es obligatorio.';
        }

        if (!is_numeric($row['celular_del_titular'])) {
            $errors['celular_del_titular'] = 'El campo Celular del Titular debe ser numérico.';
        }

        if (empty($row['direccion'])) {
            $errors['direccion'] = 'El campo Dirección es obligatorio.';
        }

        if (empty($row['referencia'])) {
            $errors['referencia'] = 'El campo Referencia es obligatorio.';
        }

        if (empty($row['fecha_cambio'])) {
            $errors['fecha_cambio'] = 'El campo Fecha de Cambio es obligatorio.';
        }

        // if (empty($row['time_ranges_id'])) {
        //     $errors['time_ranges_id'] = 'El campo Rango Horario es obligatorio.';
        // }

        if (empty($row['modelo'])) {
            $errors['modelo'] = 'El campo Modelo es obligatorio.';
        }

        if (empty($row['serie_antiguo'])) {
            $errors['serie_nueva'] = 'El campo Antigua Serie es obligatorio.';
        }

        if (empty($row['observaciones'])) {
            $errors['observaciones'] = 'El campo Observaciones es obligatorio.';
        }

        // dd($errors);

        return $errors;
    }

    protected function validateRowFormatPickup($row)
    {
        // Realiza validaciones personalizadas aquí y devuelve un array de errores
        $errors = [];

        if (empty($row['documento'])) {
            $errors['documento'] = 'El campo Documento es obligatorio.';
        }

        if (!is_numeric($row['documento'])) {
            $errors['documento'] = 'El campo Documento debe ser numérico.';
        }

        if (empty($row['razon_social'])) {
            $errors['razon_social'] = 'El campo Razón Social es obligatorio.';
        }

        if (empty($row['contacto_que_recepciona'])) {
            $errors['contacto_que_recepciona'] = 'El campo Contacto que recepciona es obligatorio.';
        }

        if (empty($row['email'])) {
            $errors['email'] = 'El campo Email es obligatorio.';
        }

        if (!filter_var($row['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'El campo Email no es una dirección de correo electrónico válida.';
        }

        if (empty($row['celular_del_titular'])) {
            $errors['celular_del_titular'] = 'El campo Celular del Titular es obligatorio.';
        }

        if (!is_numeric($row['celular_del_titular'])) {
            $errors['celular_del_titular'] = 'El campo Celular del Titular debe ser numérico.';
        }

        if (empty($row['direccion'])) {
            $errors['direccion'] = 'El campo Dirección es obligatorio.';
        }

        if (empty($row['referencia'])) {
            $errors['referencia'] = 'El campo Referencia es obligatorio.';
        }

        if (empty($row['fecha_recojo'])) {
            $errors['fecha_recojo'] = 'El campo Fecha de Recojo es obligatorio.';
        }

        // if (empty($row['time_ranges_id'])) {
        //     $errors['time_ranges_id'] = 'El campo Rango Horario es obligatorio.';
        // }

        if (empty($row['modelo'])) {
            $errors['modelo'] = 'El campo Modelo es obligatorio.';
        }

        if (empty($row['serie_antiguo'])) {
            $errors['serie_antiguo'] = 'El campo Antigua Serie es obligatorio.';
        }

        if (empty($row['observaciones'])) {
            $errors['observaciones'] = 'El campo Observaciones es obligatorio.';
        }

        // dd($errors);

        return $errors;
    }

    protected function validateRowFormatSupport($row)
    {
        // Realiza validaciones personalizadas aquí y devuelve un array de errores
        $errors = [];

        if (empty($row['documento'])) {
            $errors['documento'] = 'El campo Documento es obligatorio.';
        }

        if (!is_numeric($row['documento'])) {
            $errors['documento'] = 'El campo Documento debe ser numérico.';
        }

        if (empty($row['razon_social'])) {
            $errors['razon_social'] = 'El campo Razón Social es obligatorio.';
        }

        if (empty($row['contacto_que_recepciona'])) {
            $errors['contacto_que_recepciona'] = 'El campo Contacto que recepciona es obligatorio.';
        }

        if (empty($row['email'])) {
            $errors['email'] = 'El campo Email es obligatorio.';
        }

        if (!filter_var($row['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'El campo Email no es una dirección de correo electrónico válida.';
        }

        if (empty($row['celular_del_titular'])) {
            $errors['celular_del_titular'] = 'El campo Celular del Titular es obligatorio.';
        }

        if (!is_numeric($row['celular_del_titular'])) {
            $errors['celular_del_titular'] = 'El campo Celular del Titular debe ser numérico.';
        }

        if (empty($row['direccion'])) {
            $errors['direccion'] = 'El campo Dirección es obligatorio.';
        }

        if (empty($row['referencia'])) {
            $errors['referencia'] = 'El campo Referencia es obligatorio.';
        }

        if (empty($row['fecha_soporte'])) {
            $errors['fecha_soporte'] = 'El campo Fecha de Soporte es obligatorio.';
        }

        // if (empty($row['time_ranges_id'])) {
        //     $errors['time_ranges_id'] = 'El campo Rango Horario es obligatorio.';
        // }

        if (empty($row['modelo'])) {
            $errors['modelo'] = 'El campo Modelo es obligatorio.';
        }

        if (empty($row['serie_antiguo'])) {
            $errors['serie_nueva'] = 'El campo Antigua Serie es obligatorio.';
        }

        if (empty($row['observaciones'])) {
            $errors['observaciones'] = 'El campo Observaciones es obligatorio.';
        }

        // dd($errors);

        return $errors;
    }

    protected function validateRowFormatSurvey($row)
    {
        // Realiza validaciones personalizadas aquí y devuelve un array de errores
        $errors = [];

        if (empty($row['documento'])) {
            $errors['documento'] = 'El campo Documento es obligatorio.';
        }

        if (!is_numeric($row['documento'])) {
            $errors['documento'] = 'El campo Documento debe ser numérico.';
        }

        if (empty($row['razon_social'])) {
            $errors['razon_social'] = 'El campo Razón Social es obligatorio.';
        }

        if (empty($row['contacto_que_recepciona'])) {
            $errors['contacto_que_recepciona'] = 'El campo Contacto que recepciona es obligatorio.';
        }

        if (empty($row['email'])) {
            $errors['email'] = 'El campo Email es obligatorio.';
        }

        if (!filter_var($row['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'El campo Email no es una dirección de correo electrónico válida.';
        }

        if (empty($row['celular_del_titular'])) {
            $errors['celular_del_titular'] = 'El campo Celular del Titular es obligatorio.';
        }

        if (!is_numeric($row['celular_del_titular'])) {
            $errors['celular_del_titular'] = 'El campo Celular del Titular debe ser numérico.';
        }

        if (empty($row['direccion'])) {
            $errors['direccion'] = 'El campo Dirección es obligatorio.';
        }

        if (empty($row['referencia'])) {
            $errors['referencia'] = 'El campo Referencia es obligatorio.';
        }

        if (empty($row['fecha_encuesta'])) {
            $errors['fecha_venta'] = 'El campo Fecha de Venta es obligatorio.';
        }

        // if (empty($row['time_ranges_id'])) {
        //     $errors['time_ranges_id'] = 'El campo Rango Horario es obligatorio.';
        // }

        if (empty($row['encuesta'])) {
            $errors['encuesta'] = 'El campo Encuesta es obligatorio.';
        }

        if (empty($row['observaciones'])) {
            $errors['observaciones'] = 'El campo Observaciones es obligatorio.';
        }

        // dd($errors);

        return $errors;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function getSuccessRecords()
    {
        return $this->successRecords;
    }

    public function getInvalidRecords()
    {
        return $this->invalidRecords;
    }
}
