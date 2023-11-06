<?php

namespace Database\Seeders;

use App\Models\WarehouseStateTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WarehouseStateTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WarehouseStateTypes::create(['type_equipment_state' => 'ASIGNADO','created_by'=>1,'updated_by'=>1]);
        WarehouseStateTypes::create(['type_equipment_state' => 'PROGRAMADO','created_by'=>1,'updated_by'=>1]);
        WarehouseStateTypes::create(['type_equipment_state' => 'NUEVO','created_by'=>1,'updated_by'=>1]);
        WarehouseStateTypes::create(['type_equipment_state' => 'REFABRIC','created_by'=>1,'updated_by'=>1]);
        WarehouseStateTypes::create(['type_equipment_state' => 'PENDIENTE','created_by'=>1,'updated_by'=>1]);
        WarehouseStateTypes::create(['type_equipment_state' => 'DE BAJA','created_by'=>1,'updated_by'=>1]);
    }
}
