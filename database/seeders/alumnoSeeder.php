<?php

namespace Database\Seeders;

use App\Helpers\Helper;
use App\Models\alumno_grupo;
use App\Models\Alumnos;
use App\Models\grupos;
use Illuminate\Database\Seeder;

class alumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Alumnos::create([
            'matricula'=>  Helper::IDGenerator(new Alumnos,'matricula',8,'ALM'),
            'nombre' => 'erick',
            'apelPat'=> 'hernandez',
            'apelMat' => 'cost',
        ]);

        alumno_grupo::create([
            'fk_alumnoid' => Alumnos::get()->last()->value('id'),
            'fk_grupoid' => grupos::get()->last()->value('id'),
        ]);
        
        
    }
}
