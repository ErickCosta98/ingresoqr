<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Alumnos as ModelsAlumnos;
use Illuminate\Http\Request;

class Alumnos extends Controller
{
    //
    public function listAlumnos(){
        $alumnos = ModelsAlumnos::where('estado','1')->get();
        // return $alumnos;
        return view('alumnos.alumnosList',compact('alumnos'));
    }

    public function save(Request $request){
        /** Validate name field */
        // return $request;

        $alumno_id = Helper::IDGenerator(new ModelsAlumnos, 'matricula', 8 , 'MTR'); /** Generate id */
        $q = new ModelsAlumnos();
        $q->matricula = $alumno_id;
        $q->nombre = $request->nombre;
        $q->apelPat = $request->apelPat;
        $q->apelMat = $request->apelMat;
        $q->automovil = $request->auto;
        $save =  $q->save();
        // return $alumno_id;
        if($save){
            return redirect()->route('regisAlumno')->with('info','New studen has been added');
        }else{
            return redirect()->route('regisAlumno')->with('info','Something went wrong');
        }
    }
    public function dtUpdate($id){
        $alumno= ModelsAlumnos::find($id);
        return view('alumnos.edit',compact('alumno'));
    }
    public function update(Request $request, ModelsAlumnos $alumno) {
        // return $alumno;
        $alumno->nombre = $request->nombre;
        $alumno->apelPat = $request->apelPat;
        $alumno->apelMat = $request->apelMat;
        $alumno->automovil = $request->auto;
        $alumno->save();
        return redirect()->route('alumnoList');
    }

    public function delete($id){
        ModelsAlumnos::where('id',$id)->update(['estado' => '0']);
        return redirect()->route('alumnoList');
    }
}
