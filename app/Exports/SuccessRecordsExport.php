<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class SuccessRecordsExport implements FromCollection, WithHeadings
{
    protected $invalidRecords;

    public function __construct($invalidRecords)
    {
        $this->invalidRecords = $invalidRecords;
    }

    public function headings(): array
    {
        return [
            'DOCUMENTO',
            'RAZON_SOCIAL',
            'CONTACTO_QUE_RECEPCIONA',
            'EMAIL',
            'CELULAR_DEL_TITULAR',
            'DIRECCIÓN',
            'REFERENCIA',
            'FECHA_VENTA',
            'RANGO_HORARIO',
            'MODELO',
            'SERIE_NUEVA',
            'OBSERVACIONES'
        ];
    }

    public function collection()
    {

        $data = [];

        foreach ($this->invalidRecords as $record) {
            $formattedRecord = [
                'DOCUMENTO' => $record['row']['documento'],
                'RAZON_SOCIAL' => $record['row']['razon_social'],
                'CONTACTO_QUE_RECEPCIONA' => $record['row']['contacto_que_recepciona'],
                'EMAIL' => $record['row']['email'],
                'CELULAR_DEL_TITULAR' => $record['row']['celular_del_titular'],
                'DIRECCIÓN' => $record['row']['direccion'],
                'REFERENCIA' => $record['row']['referencia'],
                'FECHA_VENTA' => $record['row']['fecha_venta'],
                'RANGO_HORARIO' => $record['row']['rango_horario'],
                'MODELO' => $record['row']['modelo'],
                'SERIE_NUEVA' => $record['row']['serie_nueva'],
                'OBSERVACIONES' => $record['row']['observaciones']
            ];

            $data[] = $formattedRecord;
        }

        return collect($data);
    }
}
