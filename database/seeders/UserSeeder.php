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
            'password' => Hash::make('Ulili2007'),
        ])->syncRoles([1]);


        User::create([
            'nombre' => 'Erick',
            'apelPat' =>  'hernandez',
            'apelMat'=> 'Costa',
            'usuario' => 'Erick@costa',
            'password' => Hash::make('Ulili2098'),
        ])->syncRoles([2]);
    }
}
