<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SurveyTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datos = [
            ['survey_type' => 'ENCUESTA 1', 'created_by' => 1, 'updated_by' => 1],
            ['survey_type' => 'ENCUESTA 2', 'created_by' => 1, 'updated_by' => 1],
            ['survey_type' => 'ENCUESTA 3', 'created_by' => 1, 'updated_by' => 1],
        ];

        // Inserta los datos en la tabla motorized_statuses
        DB::table('survey_types')->insert($datos);
    }
}
