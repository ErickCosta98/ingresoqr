<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\alumno_grupo;
use App\Models\Alumnos as ModelsAlumnos;
use App\Models\lugares_asignado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade as PDF;

class Alumnos extends Controller
{
    //
    public function listAlumnos()
    {
        $alumnos = ModelsAlumnos::where('estado', '1')->get();
        // return $alumnos;
        return view('alumnos.alumnosList', compact('alumnos'));
    }

    public function save(Request $request)
    {
        $alumno_id = Helper::IDGenerator(new ModelsAlumnos, 'matricula', 8, 'MTR');
        /** Generate id */
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
        if ($save) {
            return redirect()->route('regisAlumno')->with('info', 'Nuevo estudiante agregado');
        } else {
            return redirect()->route('regisAlumno')->with('info', 'error');
        }
    }
    public function dtUpdate($id)
    {
        $alumno = ModelsAlumnos::find($id);
        $gid = alumno_grupo::where('fk_alumnoid', $id)->value('fk_grupoid');
        // return $gid;
        // $alumno = DB::select('select Alumnos.*, alumno_grupos.fk_grupoid from alumno_grupos inner join Alumnos on alumno_grupos.fk_alumnoid = ?', [$id]);
        // return $alumno
        return view('alumnos.edit', compact('alumno', 'gid'));
    }
    public function update(Request $request, ModelsAlumnos $alumno)
    {
        // return date('N');
        $alumno->nombre = $request->nombre;
        $alumno->apelPat = $request->apelPat;
        $alumno->apelMat = $request->apelMat;
        $alumno->automovil = $request->auto;
        $alumno->save();
        DB::update('update alumno_grupos set fk_grupoid = ? where fk_alumnoid = ?', [$request->grupo, $alumno->id]);
        return redirect()->route('alumnoList');
    }

    public function delete($id)
    {
        ModelsAlumnos::where('id', $id)->update(['estado' => '0']);
        return redirect()->route('alumnoList')->with('success', 'Alumno Eliminado');
    }


    public function createPDF(Request $request)
    {
        // return random_bytes(10).'.pdf';
        $qrs = lugares_asignado::where('status', '!=', '2')->where('student_name',$request->student)->get();
        // return $qrs;
        $img = '';
        $style = '<style>

    .container{
        display: inline-block;
        width: 320px;
        height: 190px;
    }
    label{
        margin-left:140px;
        margin-bottom:0px;
        padding: 0;
        position: absolute;
        font-size: 7;
    }
    .mg{
        margin-top: 15px;
        margin-left: 100px;
    }
    img{
        transform: rotate(90deg);
    }
    .page-break {
        page-break-after: always;
    }
  
</style>';
        $contador = 0;
        $cnt = 0;
        foreach ($qrs as  $qr) {
            $contador++;
            $json = json_encode([
                'id' => $qr->id,
                'Fila' => $qr->seat_name,
            ]);
            $img = $img . '
            <div class="container">
            <label><strong>' . $qr->seat_name . '</strong></label>
            <div class="mg"><img src="data:image/png;base64,' .  base64_encode(QrCode::format('png')->size(100)->generate($json)) . '" /></div>   
              </div>';
              if($contador == 10){
                  $contador = 0;
                  $cnt ++;
                $content = PDF::loadHTML($style . $img)->output();
                Storage::disk('public')->put($cnt.$request->student.'.pdf', $content);
                $img = '';
  
            }
        }
        $cnt ++;
                $content = PDF::loadHTML($style . $img)->output();
                Storage::disk('public')->put($cnt.$request->student.'.pdf', $content);
                $img = '';
        
        // $style = $style . $img;
        // return $style;
        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML($style );
        // return $pdf->stream();
        return back();
    }
}
