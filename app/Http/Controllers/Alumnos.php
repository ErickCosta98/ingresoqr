<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Alumnos as ModelsAlumnos;
use Illuminate\Http\Request;

class Alumnos extends Controller
{
    //
    public function listAlumnos(){
        $alumnos = ModelsAlumnos::orderBy('id','desc')->get();
        // return $alumnos;
        return view('alumnos.alumnosList',compact('alumnos'));
    }

    function save(Request $request){
        /** Validate name field */
        $request->validate([
            'name'=>'required',
        ]);

        $alumno_id = Helper::IDGenerator(new ModelsAlumnos, 'matricula', 8 , 'MTR'); /** Generate id */
        $q = new ModelsAlumnos();
        $q->matricula = $alumno_id;
        $q->nombre = $request->nombre;
        $save =  $q->save();
        return $alumno_id;
        if($save){
            return back()->with('success','New studen has been added');
        }else{
            return back()->with('faile','Something went wrong');
        }


    }
}
