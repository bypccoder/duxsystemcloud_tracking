<?php

namespace Database\Seeders;

use App\Models\Models;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Models::create(['model_name' => 'CULQI PRO', 'created_by' => 1, 'updated_by' => 1]);
        Models::create(['model_name' => 'MINI CULQI', 'created_by' => 1, 'updated_by' => 1]);
        Models::create(['model_name' => 'WALLY POS', 'created_by' => 1, 'updated_by' => 1]);
    }
}
