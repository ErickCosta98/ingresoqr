<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'nombre' => 'Admin',
            'apelPat' =>  'Admin',
            'apelMat'=> 'Admin',
            'usuario' => 'Admin@admin',
            'password' => Hash::make('Admin2022'),
        ])->syncRoles([1]);
    }
}
