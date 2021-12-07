<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\alumno_grupo;
use App\Models\Alumnos;
use App\Models\diashoras;
use App\Models\lugares;
use App\Models\lugares_asignado;
use App\Models\reportes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ingresoController extends Controller
{
    //
    public function index(){
        $lugares = lugares::where('status','!=','0')->orderBy('id', 'desc')->select('limit','row_name')->get();
        $oc = lugares_asignado::where('status','=','1')->get('seat_name');
        $no = lugares_asignado::where('status','=','2')->get('seat_name');
        $no_asig = [];
        $ocupados = [];
        foreach ($no as $key => $value) {
            array_push($no_asig,$value->seat_name);
        }
        foreach ($oc as $key => $value) {
            array_push($ocupados,$value->seat_name);
        }
        // return $ocupados;

        // return $count;
        // return $lugares;
        // $numSeat = [];
        // $in = $lugares->last_seat;
        // for ($i=0; $i < 4 ; $i++) {
        //     $in++;
        //     if($in <= $lugares->limit)array_push($numSeat,$in);
        // }
        return view('qrscan',compact('lugares','ocupados','no_asig'));
    }

    public function verificarDia(Request $request){

        $data = json_decode($request->data);
        // return $request->data;
        $lugar = lugares_asignado::find($data->id);
        if($lugar->status == 1){
            return redirect()->route('qrscan')->with('error',$lugar->seat_name);

        }else{
            if($lugar->student_name == 'Especial'){
                $lugar->status = '1';
                $lugar->save();
                return redirect()->route('qrscan')->with('success','Invitado Especial');
                    
            }
            $lugar->status = '1';
            $lugar->save();
            return redirect()->route('qrscan')->with('success',$lugar->seat_name);
            
        }
    //     $users = DB::select('select  diashoras.* , alumnos.id as idalumno, alumno_grupos.fk_grupoid as idgrupo  from diashoras inner join alumnos inner join alumno_grupos on alumnos.matricula = ? and alumno_grupos.fk_alumnoid = alumnos.id and diashoras.fk_grupoid = alumno_grupos.fk_grupoid' , [$request->matricula]);
    //     $reporte = reportes::where('fk_alumnoid',$users[0]->idalumno)->where('fecha',date('Y-m-d'))->get();
    //     // return $reporte;
    //     // , alumnos.id as idalumno, alumno_grupos.fk_grupoid as idgrupo
    //     foreach ($users as  $value) {
    //         if(date('N')== $value->nombreDia ){
    //             if(count($reporte)>0){
    //                 if(date('H:i:s',time()) <= date($value->salida)){
    //                     reportes::where('id', $reporte[0]->id)->update(['salida' => date('H:i:s',time())]);
    //                     return redirect()->route('qrscan')->with('success','Salida registrada');
    //                 }else{
    //                     return redirect()->route('qrscan')->with('error','Tu hora de salida ya paso');
    //                 }
    //             }else{
    //                 if(date('H:i:s',time()) <= date($value->entrada)){
    //                     $reporte = new reportes();
    //                     $reporte->fecha = date('Y-m-d');
    //                     $reporte->entrada = date('H:i:s',time());
    //                     $reporte->fk_alumnoid = $value->idalumno;
    //                     $reporte->save();
    //                     return redirect()->route('qrscan')->with('success','Entrada registrada registrada');
    //                 }else{
    //                     return redirect()->route('qrscan')->with('error','Tu hora de entrada ya paso');
    //                 }
    //             }
    //         }
    //     }
    // //   $diashoras = diashoras::where()
    //     return redirect()->route('qrscan')->with('error','Hoy no te tocaba');
    }

}
