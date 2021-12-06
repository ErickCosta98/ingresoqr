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
        $role3 = Role::create(['name' => 'Reportes']);
        $role4 = Role::create(['name' => 'Hernan']);


        Permission::create(['name' => 'home'])->syncRoles([$role1,$role2,$role3,$role4]);
        Permission::create(['name' => 'userAdmin'])->syncRoles([$role1]);
        Permission::create(['name' => 'alumnoRegistro']);
        Permission::create(['name' => 'alumnoAdmin']);
        Permission::create(['name' => 'alumnoReporte']);
        Permission::create(['name' => 'horariosAdmin']);
        Permission::create(['name' => 'registroLugares'])->syncRoles([$role1,$role4]);

    }
}
