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
        UserHistory::create(['user_id' => 1,'type_row'=>'create','field_name'=>'','field_description'=>'Ha creado el usuario.','old_value'=>'','new_value'=>'', 'created_by' => 1]);

        UserHistory::create(['user_id' => 2,'type_row'=>'create','field_name'=>'','field_description'=>'Ha creado el usuario.','old_value'=>'','new_value'=>'', 'created_by' => 1]);

        UserHistory::create(['user_id' => 3,'type_row'=>'create','field_name'=>'','field_description'=>'Ha creado el usuario.','old_value'=>'','new_value'=>'', 'created_by' => 1]);
    }
}
