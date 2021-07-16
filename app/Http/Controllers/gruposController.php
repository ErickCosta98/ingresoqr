<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\diashoras;
use App\Models\grupos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\all;

class gruposController extends Controller
{
    //

    public function guardar(Request $request)
    {
        // $grup = new grupos();
        //  return $grup->get()->last()->value('id');

        $grup = new grupos();
        $grup->nombreGrupo = $request->nombreG;
        $grup->save();
        $id = $grup->get()->last();
        // return $id;
        for ($i = 0; $i < count($request->dias); $i++) {

            if ($request->dias[$i] == 1) {
                $diah = new diashoras();
                $diah->fk_grupoid = $id->id;
                $diah->nombreDia = $request->dias[$i];
                $diah->entrada = $request->horaEntrada[0] ;
                $diah->salida = $request->horSalida[0] ;
                $diah->save();
            }
            if ($request->dias[$i] == 2) {
                $diah = new diashoras();
                $diah->fk_grupoid = $id->id;
                $diah->nombreDia = $request->dias[$i];
                $diah->entrada = $request->horaEntrada[1] ;
                $diah->salida = $request->horSalida[1] ;
                $diah->save();
            }
            if ($request->dias[$i] == 3) {

                $diah = new diashoras();
                $diah->fk_grupoid = $id->id;
                $diah->nombreDia = $request->dias[$i];
                $diah->entrada = $request->horaEntrada[2] ;
                $diah->salida = $request->horSalida[2] ;
                $diah->save();
            }
            if ($request->dias[$i] == 4) {

                $diah = new diashoras();
                $diah->fk_grupoid = $id->id;
                $diah->nombreDia = $request->dias[$i];
                $diah->entrada = $request->horaEntrada[3] ;
                $diah->salida = $request->horSalida[3] ;
                $diah->save();
            }
            if ($request->dias[$i] == 5) {

                $diah = new diashoras();
                $diah->fk_grupoid = $id->id;
                $diah->nombreDia = $request->dias[$i];
                $diah->entrada = $request->horaEntrada[4] ;
                $diah->salida = $request->horSalida[4] ;
                $diah->save();
            }
        }

        return redirect()->route('frmRegistro');
    }

    public function listGrupos(){
        $diashoras = grupos::all();
        // return $grupos;
        return view('grupos.listgrupos',compact('diashoras'));
    }
    public function delete($id){
        DB::delete('delete from diashoras where fk_grupoid= ?', [$id]);
        DB::delete('delete from grupos where id= ?', [$id]);
        return redirect()->route('grupoList');
    }
    public function dtUpdate($id){
        $grupo= grupos::find($id);
        // return $grupo;
        $diashoras = diashoras::where('fk_grupoid',$id)->get();
        // return $diashoras;
        return view('grupos.edit',compact('grupo','diashoras'));
    }
    public function update(Request $request, grupos $grupo) {
        //  return $request['dias'];
        $elm = diashoras::select('nombreDia')->where('fk_grupoid',$grupo->id)->get();
        foreach ($elm as $value) {
            for ($i=0; $i < count($request->dias); $i++) {
            if($value->nombreDia==$request->dias[$i]){
                break;
            }
            DB::delete('delete from diashoras where fk_grupoid= ? and nombreDia = ?', [$grupo->id,$value->nombreDia]);
        }
        }
        //  return count(diashoras::where('fk_grupoid',1)->where('nombreDia','lunes')->get());
        $grupo->nombreGrupo = $request->nombreG;
        $grupo->save();         
       
        for ($i=0; $i < count($request->dias); $i++) { 
            $auth = diashoras::where('fk_grupoid',$grupo->id)->where('nombreDia',$request->dias[$i])->get();
            if ($request->dias[$i] == 1) {
                if (count($auth) > 0) {
                diashoras::where('fk_grupoid',$grupo->id)->where('nombreDia',$request->dias[$i])->update([
                    'nombreDia' => $request->dias[$i],
                    'entrada' => $request->horaEntrada[0],
                    'salida' => $request->horSalida[0],
                ]);
            }else{
                $diah = new diashoras();
                $diah->fk_grupoid = $grupo->id;
                $diah->nombreDia = $request->dias[$i];
                $diah->entrada = $request->horaEntrada[0] ;
                $diah->salida = $request->horSalida[0] ;
                $diah->save();
            }
            }
            if ($request->dias[$i] == 2) {
                if (count($auth)>0) {
                diashoras::where('fk_grupoid',$grupo->id)->where('nombreDia',$request->dias[$i])->update([
                    'nombreDia' => $request->dias[$i],
                    'entrada' => $request->horaEntrada[1],
                    'salida' => $request->horSalida[1],
                ]);
            }else{
                $diah = new diashoras();
                $diah->fk_grupoid = $grupo->id;
                $diah->nombreDia = $request->dias[$i];
                $diah->entrada = $request->horaEntrada[1] ;
                $diah->salida = $request->horSalida[1] ;
                $diah->save();
            }
            }
            if ($request->dias[$i] == 3) {
                if (count($auth)>0) {
                diashoras::where('fk_grupoid',$grupo->id)->where('nombreDia',$request->dias[$i])->update([
                    'nombreDia' => $request->dias[$i],
                    'entrada' => $request->horaEntrada[2],
                    'salida' => $request->horSalida[2],
                ]);
            }else{
                $diah = new diashoras();
                $diah->fk_grupoid = $grupo->id;
                $diah->nombreDia = $request->dias[$i];
                $diah->entrada = $request->horaEntrada[2] ;
                $diah->salida = $request->horSalida[2] ;
                $diah->save();
            }
            }
            if ($request->dias[$i] == 4) {
                if (count($auth)>0) {
                diashoras::where('fk_grupoid',$grupo->id)->where('nombreDia',$request->dias[$i])->update([
                    'nombreDia' => $request->dias[$i],
                    'entrada' => $request->horaEntrada[3],
                    'salida' => $request->horSalida[3],
                ]);
            }else{
                $diah = new diashoras();
                $diah->fk_grupoid = $grupo->id;
                $diah->nombreDia = $request->dias[$i];
                $diah->entrada = $request->horaEntrada[3] ;
                $diah->salida = $request->horSalida[3] ;
                $diah->save();
            }
            }
            if ($request->dias[$i] == 5) {
                if (count($auth)>0) {
                diashoras::where('fk_grupoid',$grupo->id)->where('nombreDia',$request->dias[$i])->update([
                    'nombreDia' => $request->dias[$i],
                    'entrada' => $request->horaEntrada[4],
                    'salida' => $request->horSalida[4],
                ]);
            }else{
                $diah = new diashoras();
                $diah->fk_grupoid = $grupo->id;
                $diah->nombreDia = $request->dias[$i];
                $diah->entrada = $request->horaEntrada[4] ;
                $diah->salida = $request->horSalida[4] ;
                $diah->save();
            }
            }
        }
        
        return redirect()->route('grupoList');
    }
}
