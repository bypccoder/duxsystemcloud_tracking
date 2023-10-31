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
        WarehouseStateTypes::create(['type_equipment_state' => 'ASIGNADO']);
        WarehouseStateTypes::create(['type_equipment_state' => 'PROGRAMADO']);
        WarehouseStateTypes::create(['type_equipment_state' => 'NUEVO']);
        WarehouseStateTypes::create(['type_equipment_state' => 'REFABRIC']);
        WarehouseStateTypes::create(['type_equipment_state' => 'PENDIENTE']);
        WarehouseStateTypes::create(['type_equipment_state' => 'DE BAJA']);
    }
}
