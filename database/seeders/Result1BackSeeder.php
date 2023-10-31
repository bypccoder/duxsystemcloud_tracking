<?php

namespace Database\Seeders;

use App\Models\Result1Back;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Result1BackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Result1Back::create(['result' => 'POR REPROGRAMACIÓN', 'created_by' => 1, 'updated_by' => 1]);
        Result1Back::create(['result' => 'SIN GESTIÓN', 'created_by' => 1, 'updated_by' => 1]);
        Result1Back::create(['result' => 'NO CONTACTO', 'created_by' => 1, 'updated_by' => 1]);
        Result1Back::create(['result' => 'CONTACTO NO EFECTIVO', 'created_by' => 1, 'updated_by' => 1]);
        Result1Back::create(['result' => 'CONTACTO EFECTIVO', 'created_by' => 1, 'updated_by' => 1]);


    }
}
