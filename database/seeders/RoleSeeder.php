<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Backoffice']);
        $role3 = Role::create(['name' => 'Almacen']);
        $role4 = Role::create(['name' => 'Post-Venta']);
        $role5 = Role::create(['name' => 'Motorizado']);

        Permission::create(['name'=>'admin.users.index'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.users.create'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.users.edit'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.users.destroy'])->syncRoles([$role1]);

        Permission::create(['name'=>'admin.dashboard.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.dashboard.show'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'admin.tasks.index'])->syncRoles([$role1,$role2]);

        Permission::create(['name'=>'admin.form_postsale.index'])->syncRoles([$role1,$role4]);
        Permission::create(['name'=>'admin.form_postsale.create'])->syncRoles([$role1,$role4]);
        Permission::create(['name'=>'admin.form_postsale.edit'])->syncRoles([$role1,$role4]);
        Permission::create(['name'=>'admin.form_postsale.destroy'])->syncRoles([$role1,$role4]);

        Permission::create(['name'=>'admin.import_salenew.index'])->syncRoles([$role1,$role4]);
        Permission::create(['name'=>'admin.import_salenew.import'])->syncRoles([$role1,$role4]);

    }
}
