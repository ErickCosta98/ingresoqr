<?php

namespace Database\Seeders;

use App\Models\alumno_grupo;
use App\Models\diashoras;
use App\Models\grupos;
use Illuminate\Database\Seeder;

class grupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        grupos::create([
            'nombreGrupo' => 'Primer grupo',  
        ]);

        diashoras::create([
            'fk_grupoid' => grupos::get()->last()->value('id'),
            'nombreDia' => 1,
            'entrada' => '11:00',
            'salida'  =>  '13:00',
         ]);

    }
}
