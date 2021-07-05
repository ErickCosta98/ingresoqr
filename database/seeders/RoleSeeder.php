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

        Permission::create(['name' => 'home'])->syncRoles([$role1]);
        Permission::create(['name' => 'userList'])->syncRoles([$role1]);
        Permission::create(['name' => 'userRegistro'])->syncRoles([$role1]);
        Permission::create(['name' => 'userEdit'])->syncRoles([$role1]);
        Permission::create(['name' => 'userDelete'])->syncRoles([$role1]);
        Permission::create(['name' => 'userActive'])->syncRoles([$role1]);


    }
}
