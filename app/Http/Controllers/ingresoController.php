<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\alumno_grupo;
use App\Models\Alumnos;
use App\Models\diashoras;
use App\Models\reportes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ingresoController extends Controller
{
    //

    public function verificarDia(Request $request){			
        
        $users = DB::select('select  diashoras.* , alumnos.id as idalumno, alumno_grupos.fk_grupoid as idgrupo  from diashoras inner join alumnos inner join alumno_grupos on alumnos.matricula = ? and alumno_grupos.fk_alumnoid = alumnos.id and diashoras.fk_grupoid = alumno_grupos.fk_grupoid' , [$request->matricula]);
        $reporte = reportes::where('fk_alumnoid',$users[0]->idalumno)->where('fecha',date('Y-m-d'))->get();
        // return $reporte;
        // , alumnos.id as idalumno, alumno_grupos.fk_grupoid as idgrupo
        foreach ($users as  $value) {
            if(date('N')== $value->nombreDia ){
                if(count($reporte)>0){
                    if(date('H:i:s',time()) <= date($value->salida)){
                        reportes::where('id', $reporte[0]->id)->update(['salida' => date('H:i:s',time())]);
                        return redirect()->route('qrscan')->with('success','Salida registrada');
                    }else{
                        return redirect()->route('qrscan')->with('error','Tu hora de salida ya paso');
                    }
                }else{
                    if(date('H:i:s',time()) <= date($value->salida)){
                        $reporte = new reportes();
                        $reporte->fecha = date('Y-m-d');
                        $reporte->entrada = date('H:i:s',time());
                        $reporte->fk_alumnoid = $value->idalumno;
                        $reporte->save();
                        return redirect()->route('qrscan')->with('success','Entrada registrada registrada');
                    }else{
                        return redirect()->route('qrscan')->with('error','Tu hora de entrada ya paso');
                    }
                }
            }
        }
    //   $diashoras = diashoras::where()
        return redirect()->route('qrscan')->with('error','Hoy no te tocaba');
    }

}
