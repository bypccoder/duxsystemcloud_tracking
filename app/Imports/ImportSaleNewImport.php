<?php

namespace App\Imports;

use App\Models\ImportSaleNew;
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
    protected $successData = [];
    protected $invalidRecords = [];

    public function __construct($type_format)
    {
        $this->type_format = $type_format;
    }


    public function model(array $row)
    {
        $type_format = intval($this->type_format);

        if ($type_format == 1) {
            $errors = $this->validateRowFormatNewSale($row);
            if (empty($errors)) {
                return new PostSale([
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
                    'management_type_id' => $type_format,
                    'created_by' => Auth::id(),
                    'updated_by' => Auth::id()

                ]);
            } else {

                $this->invalidRecords[] = [
                    'row' => $row,
                    'errors' => $errors,
                ];

                return null;
            }
        } else if ($type_format == 2) {
            $errors = $this->validateRowFormatChange($row);
            if (empty($errors)) {
                return new ImportSaleNew([
                    'document' => $row['documento'],
                    'business_name' => $row['razon_social'],
                    'receiving_person' => $row['contacto_que_recepciona'],
                    'email_customer' => $row['email'],
                    'titular_cellphone' => $row['celular_del_titular'],
                    'address' => $row['direccion'],
                    'reference' => $row['referencia'],
                    'sale_change' => $row['fecha_cambio'],
                    'time_ranges_id' => 1,
                    'model_text' => $row['modelo'],
                    'old_serial' => $row['serie_antiguo'],
                    'observation' => $row['observaciones'],
                    'management_type_id' => $type_format,
                    'created_by' => Auth::id(),
                    'updated_by' => Auth::id()

                ]);
            } else {

                $this->invalidRecords[] = [
                    'row' => $row,
                    'errors' => $errors,
                ];

                return null;
            }
        } else if ($type_format == 3) {

            $errors = $this->validateRowFormatPickup($row);
            if (empty($errors)) {
                return new ImportSaleNew([
                    'document' => $row['documento'],
                    'business_name' => $row['razon_social'],
                    'receiving_person' => $row['contacto_que_recepciona'],
                    'email_customer' => $row['email'],
                    'titular_cellphone' => $row['celular_del_titular'],
                    'address' => $row['direccion'],
                    'reference' => $row['referencia'],
                    'pickup_date' => $row['fecha_recojo'],
                    'time_ranges_id' => 1,
                    'model_text' => $row['modelo'],
                    'old_serial' => $row['serie_antiguo'],
                    'observation' => $row['observaciones'],
                    'management_type_id' => $type_format,
                    'created_by' => Auth::id(),
                    'updated_by' => Auth::id()

                ]);
            } else {

                $this->invalidRecords[] = [
                    'row' => $row,
                    'errors' => $errors,
                ];

                return null;
            }
        } else if ($type_format == 4) {
            $errors = $this->validateRowFormatSupport($row);
            if (empty($errors)) {
                return new ImportSaleNew([
                    'document' => $row['documento'],
                    'business_name' => $row['razon_social'],
                    'receiving_person' => $row['contacto_que_recepciona'],
                    'email_customer' => $row['email'],
                    'titular_cellphone' => $row['celular_del_titular'],
                    'address' => $row['direccion'],
                    'reference' => $row['referencia'],
                    'support_date' => $row['fecha_soporte'],
                    'time_ranges_id' => 1,
                    'model_text' => $row['modelo'],
                    'old_serial' => $row['serie_antiguo'],
                    'observation' => $row['observaciones'],
                    'management_type_id' => $type_format,
                    'created_by' => Auth::id(),
                    'updated_by' => Auth::id()

                ]);
            } else {

                $this->invalidRecords[] = [
                    'row' => $row,
                    'errors' => $errors,
                ];

                return null;
            }
        } else if ($type_format == 5) {

            $errors = $this->validateRowFormatSurvey($row);
            if (empty($errors)) {
                return new ImportSaleNew([
                    'document' => $row['documento'],
                    'business_name' => $row['razon_social'],
                    'receiving_person' => $row['contacto_que_recepciona'],
                    'email_customer' => $row['email'],
                    'titular_cellphone' => $row['celular_del_titular'],
                    'address' => $row['direccion'],
                    'reference' => $row['referencia'],
                    'survey_date' => $row['fecha_encuesta'],
                    'time_ranges_id' => 1,
                    'survey' => $row['encuesta'],
                    'observation' => $row['observaciones'],
                    'management_type_id' => $type_format,
                    'created_by' => Auth::id(),
                    'updated_by' => Auth::id()

                ]);
            } else {

                $this->invalidRecords[] = [
                    'row' => $row,
                    'errors' => $errors,
                ];

                return null;
            }
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

    public function getSuccessData()
    {
        return $this->successData;
    }

    public function getInvalidRecords()
    {
        return $this->invalidRecords;
    }
}
