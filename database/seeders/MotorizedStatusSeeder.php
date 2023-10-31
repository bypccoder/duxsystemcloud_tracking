<?php

namespace Database\Seeders;

use App\Models\MotorizedStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MotorizedStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $datos = [
            ['state' => 'ENTREGADO - CON CAPACITACION', 'created_by' => 1, 'updated_by' => 1],
            ['state' => 'ENTREGADO - SIN CAPACITACION', 'created_by' => 1, 'updated_by' => 1],
            ['state' => 'NO ENTREGADO - CLIENTE NO SE ENCUENTRA', 'created_by' => 1, 'updated_by' => 1],
            ['state' => 'NO ENTREGADO - CLIENTE RECHAZA', 'created_by' => 1, 'updated_by' => 1],
            ['state' => 'NO ENTREGADO - NO SE CAPACITA', 'created_by' => 1, 'updated_by' => 1],
            ['state' => 'NO ENTREGADO - POR TOKEN', 'created_by' => 1, 'updated_by' => 1],
        ];

        // Inserta los datos en la tabla motorized_statuses
        DB::table('motorized_status')->insert($datos);

    }
}
