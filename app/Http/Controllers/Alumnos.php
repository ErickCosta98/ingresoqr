<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\alumno_grupo;
use App\Models\Alumnos as ModelsAlumnos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Alumnos extends Controller
{
    //
    public function listAlumnos(){
        $alumnos = ModelsAlumnos::where('estado','1')->get();
        // return $alumnos;
        return view('alumnos.alumnosList',compact('alumnos'));
    }

    public function save(Request $request){
        $alumno_id = Helper::IDGenerator(new ModelsAlumnos, 'matricula', 8 , 'MTR'); /** Generate id */
        $q = new ModelsAlumnos();
        $q->matricula = $alumno_id;
        $q->nombre = $request->nombre;
        $q->apelPat = $request->apelPat;
        $q->apelMat = $request->apelMat;
        $q->automovil = $request->auto;
        $save =  $q->save();
        $id = $q->get()->last();
        $alumnogrupo = new alumno_grupo();
        $alumnogrupo->fk_alumnoid = $id->id;
        $alumnogrupo->fk_grupoid = $request->grupo;
        $alumnogrupo->save();
        // return $alumno_id;
        if($save){
            return redirect()->route('regisAlumno')->with('info','New studen has been added');
        }else{
            return redirect()->route('regisAlumno')->with('info','Something went wrong');
        }
    }
    public function dtUpdate($id){
        
        $alumno= DB::select('select Alumnos.*, alumno_grupos.fk_grupoid from alumno_grupos inner join Alumnos on alumno_grupos.fk_alumnoid = ?', [$id]);
        return $alumno;
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
