<?php

namespace App\Http\Controllers;

use App\Models\lugares;
use App\Models\lugares_asignado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class lugaresController extends Controller
{
    //

    public function index(){

        $lugares = lugares::where('status','!=','0')->orderBy('id', 'desc')->select('limit','row_name')->get();
        $oc = lugares_asignado::where('status','=','0')->where('student_name','!=','Especial')->get('seat_name');
        $no = lugares_asignado::where('status','=','2')->get('seat_name');
        $no_asig = [];
        $ocupados = [];

        $count = 0;
        $noAsigcount = count($no);
        $Asigcount = count($oc);
        foreach ($lugares as  $value) {
            $count += $value->limit;
        }

        
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
        return view('lugares.registro',compact('lugares','ocupados','no_asig','count','noAsigcount','Asigcount'));
    }
    public function indexBan(){

        $lugares = lugares::where('status','!=','0')->orderBy('id', 'desc')->select('limit','row_name')->get();
        $oc = lugares_asignado::where('status','=','0')->get('seat_name');
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
        return view('lugares.seat_ban',compact('lugares','ocupados','no_asig'));
    }

    public function registro(Request $request){
        
            for ($i=0; $i <count($request->lugares) ; $i++) { 
                lugares_asignado::create([
                    'student_name' => $request->alumnoName,
                    'seat_name'=> $request->lugares[$i]
                ]);    
            }
            return back();
    }

    public function ban(Request $request){
        for ($i=0; $i <count($request->lugares) ; $i++) { 
            lugares_asignado::create([
                'student_name' => 'noAsig',
                'seat_name'=> $request->lugares[$i],
                'status' => '2'
            ]);    
        }
        return back();
    }

    public function tabla(){
        $lugares = lugares_asignado::where('student_name','!=','Especial')->where('student_name','!=','noAsig')->get();
        // $lugares = [];
        // foreach ($lugar as $key => $value) {
        //     if(!in_array($value->student_name,$lugares,true))
        //     array_push($lugares,$value->student_name);
        // }

        return view('lugares.tabla',compact('lugares'));
    }
    public function index2(){

        $lugares = lugares::where('status','!=','0')->orderBy('id', 'desc')->select('limit','row_name')->get();
        $oc = lugares_asignado::where('status','=','0')->get('seat_name');
        $no = lugares_asignado::where('status','=','2')->get('seat_name');
        $no_asig = [];
        $ocupados = [];
      
        // return $count-$noAsigcount;
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
        return view('lugares.vistaSeat',compact('lugares','ocupados','no_asig'));
    }


    public function tabAlumnos(){
        $alumnos = DB::select("SELECT student_name, COUNT(*) AS seats_count FROM lugares_asignados WHERE lugares_asignados.`status` = '0' AND  lugares_asignados.student_name != 'Especial' GROUP BY student_name HAVING COUNT(*) > 1 ORDER BY id");
        $countA = count($alumnos);

        return view('lugares.tab',compact('alumnos','countA'));
    }
    public function delete(Request $request){
        DB::delete('delete lugares_asignados where id = ?', [$request->id]);
        return back();
    }
}
