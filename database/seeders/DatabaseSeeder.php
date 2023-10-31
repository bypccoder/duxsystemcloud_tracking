<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Carolina PC',
        //     'email' => 'carolina_pe_ca@hotmail.com',
        //        'password' => bcrypt('123456789')
        // ])->assignRole('Admin','model_has_roles');


        $this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);

    }
}
