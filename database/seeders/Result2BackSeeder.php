<?php

namespace Database\Seeders;

use App\Models\Result2Back;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Result2BackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Result2Back::create(['result1_backs_id'=> 1,'result' => 'POR REPROGRAMACIÓN', 'created_by' => 1, 'updated_by' => 1]);
        Result2Back::create(['result1_backs_id'=> 2,'result' => 'SIN GESTIÓN', 'created_by' => 1, 'updated_by' => 1]);
        Result2Back::create(['result1_backs_id'=> 3,'result' => 'TELF. NO EXISTE', 'created_by' => 1, 'updated_by' => 1]);
        Result2Back::create(['result1_backs_id'=> 3,'result' => 'TELF. NO CONTESTA', 'created_by' => 1, 'updated_by' => 1]);
        Result2Back::create(['result1_backs_id'=> 3,'result' => 'TELF. BUZON', 'created_by' => 1, 'updated_by' => 1]);
        Result2Back::create(['result1_backs_id'=> 4,'result' => 'NO ES EL TITULAR', 'created_by' => 1, 'updated_by' => 1]);
        Result2Back::create(['result1_backs_id'=> 4,'result' => 'DESCONOCE VENTA', 'created_by' => 1, 'updated_by' => 1]);
        Result2Back::create(['result1_backs_id'=> 4,'result' => 'CANCELA VENTA', 'created_by' => 1, 'updated_by' => 1]);
        Result2Back::create(['result1_backs_id'=> 4,'result' => 'AGENDADO', 'created_by' => 1, 'updated_by' => 1]);
        Result2Back::create(['result1_backs_id'=> 5,'result' => 'PROGRAMADO', 'created_by' => 1, 'updated_by' => 1]);
    }

}
