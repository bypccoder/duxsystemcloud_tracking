<?php

namespace Database\Seeders;

use App\Models\UserHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserHistory::create(['user_id' => 1,'type_row'=>'create','field_name'=>'','field_description'=>'','old_value'=>'Ha creado el usuario.','new_value'=>'', 'created_by' => 1]);
    }
}
