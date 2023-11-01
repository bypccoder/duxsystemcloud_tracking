<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::create([
            'name'=> 'Carolina PC',
            'email'=>'carolina_pe_ca@hotmail.com',
            'password'=> bcrypt('123456789')
        ]);

        $user1->assignRole('Admin');

        $user2 = User::create([
            'name'=> 'Demo Backoffice',
            'email'=>'demoback@hotmail.com',
            'password'=> bcrypt('123456789')
        ]);

        $user2->assignRole('Backoffice');


        $user3 = User::create([
            'name'=> 'Demo Postventa',
            'email'=>'demopostventa@hotmail.com',
            'password'=> bcrypt('123456789')
        ]);

        $user3->assignRole('Post-Venta');

    }
}
