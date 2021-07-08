<?php

namespace App\Http\Controllers;

use App\Models\Alumnos as ModelsAlumnos;
use Illuminate\Http\Request;

class Alumnos extends Controller
{
    //
    public function listAlumnos(){
        $alumnos = ModelsAlumnos::paginate(5);
        // return $alumnos;
        return view('alumnosList',compact('alumnos'));
    }
}
