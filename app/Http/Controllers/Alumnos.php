<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\alumno_grupo;
use App\Models\Alumnos as ModelsAlumnos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
            return redirect()->route('regisAlumno')->with('info','Nuevo estudiante agregado');
        }else{
            return redirect()->route('regisAlumno')->with('info','error');
        }
    }
    public function dtUpdate($id){
        $alumno = ModelsAlumnos::find($id);
        $gid = alumno_grupo::where('fk_alumnoid',$id)->value('fk_grupoid');
        // return $gid;
        // $alumno = DB::select('select Alumnos.*, alumno_grupos.fk_grupoid from alumno_grupos inner join Alumnos on alumno_grupos.fk_alumnoid = ?', [$id]);
        // return $alumno
        return view('alumnos.edit',compact('alumno','gid'));
    }
    public function update(Request $request, ModelsAlumnos $alumno) {
        // return date('N');
        $alumno->nombre = $request->nombre;
        $alumno->apelPat = $request->apelPat;
        $alumno->apelMat = $request->apelMat;
        $alumno->automovil = $request->auto;
        $alumno->save();
        DB::update('update alumno_grupos set fk_grupoid = ? where fk_alumnoid = ?', [$request->grupo,$alumno->id]);
        return redirect()->route('alumnoList');
    }

    public function delete($id){
        ModelsAlumnos::where('id',$id)->update(['estado' => '0']);
        return redirect()->route('alumnoList')->with('success','Alumno Eliminado');
    }


    public function createPDF(Request $request)
    {
        $qrs = DB::select('select alumnos.* from alumnos inner join alumno_grupos on alumno_grupos.fk_grupoid = ? and alumnos.id = alumno_grupos.fk_alumnoid ', [$request->grupo]);
        // return $qrs;
        $img = '';
        foreach ($qrs as  $qr) {
            $img = $img.'<div class="contenedor"><img src="data:image/png;base64,'.  base64_encode(QrCode::format('png')->size(200)->generate($qr->matricula)) .'" />'.$qr->nombre." ".$qr->apelPat." ".$qr->apelMat.'</div>';
        }
    
    $style = '<style> .contenedor{ margin:20px;} </style>';
        // return $style.$img;
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($style.$img);
        return $pdf->stream();
    }
}
