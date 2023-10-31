<?php

namespace Database\Seeders;

use App\Models\ManagementTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ManagementTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ManagementTypes::create(['management' => 'VENTA NUEVA', 'created_by' => 1, 'updated_by' => 1]);
        ManagementTypes::create(['management' => 'CAMBIO', 'created_by' => 1, 'updated_by' => 1]);
        ManagementTypes::create(['management' => 'RECOJO', 'created_by' => 1, 'updated_by' => 1]);
        ManagementTypes::create(['management' => 'SOPORTE', 'created_by' => 1, 'updated_by' => 1]);
        ManagementTypes::create(['management' => 'ENCUESTA', 'created_by' => 1, 'updated_by' => 1]);
    }
}
