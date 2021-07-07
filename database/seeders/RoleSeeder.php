<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Capturista']);
        

        Permission::create(['name' => 'home'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'userAdmin'])->syncRoles([$role1]);
        Permission::create(['name' => 'alumnoRegistro'])->syncRoles([$role1],$role2);
        Permission::create(['name' => 'alumnoAdmin'])->syncRoles([$role1]);
        Permission::create(['name' => 'alumnoReporte'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'horariosAdmin'])->syncRoles([$role1]);
    }
}