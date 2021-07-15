@extends('layouts.app')

@section('contenido')
<br>
<br>
<div class="container-fluid " >
  <div class="col-sm-6 mx-auto">
<div class="card-group">
  <div class="card">
    <div class="card-body">
        <h1>Editar grupo</h1>

        <form action="{{ route('grupoUpdate',$grupo) }}" method="post">
            @csrf
            @method('put')
            <label for="nombreG">Nombre de grupo</label>
            <input  type="text" name="nombreG" id="nombreG" value="{{$grupo->nombreGrupo}}">
            <table class="table">
                <thead>
                    <tr>
                        <th>dia</th>
                        <th>entrada</th>
                        <th>salida</th>
                        <th>activo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">lunes</td>
                        <td>
                            <input type="time" id="horaEntrada[]" name="horaEntrada[]" value="<?php foreach($diashoras as  $dia) { if($dia->nombreDia == 'lunes' ){ echo $dia->entrada;} } ?>" >
                        </td>
                        <td>
                            <input type="time" id="horSalida[]" name="horSalida[]" value="<?php foreach($diashoras as  $dia) { if($dia->nombreDia == 'lunes'){ echo $dia->salida; }} ?>" >
                        </td>
                        <td>
                            <input type="checkbox" name="dias[]" id="dias[]" value="lunes"  <?php foreach($diashoras as  $dia) { if($dia->nombreDia == 'lunes'){ echo ' checked';} } ?>>
                 </tr>
                    <tr>
                        <td scope="row">martes</td>
                        <td>
                            <input type="time" id="horaEntrada[]" name="horaEntrada[]" value="<?php foreach($diashoras as  $dia) { if($dia->nombreDia == 'martes'){ echo $dia->entrada;} } ?>" >
                        </td>
                        <td>
                            <input type="time" id="horSalida[]" name="horSalida[]" value="<?php foreach($diashoras as  $dia) { if($dia->nombreDia == 'martes'){ echo $dia->salida; }} ?>" >
                        </td>
                        <td>
                            <input type="checkbox" name="dias[]" id="dias[]"  value="martes" <?php foreach($diashoras as  $dia) { if($dia->nombreDia == 'martes'){ echo ' checked';} } ?> >
                 </tr>
                    <tr>
                        <td scope="row">miercoles</td>
                        <td>
                            <input type="time" id="horaEntrada[]" name="horaEntrada[]" value="<?php foreach ($diashoras as  $dia) { if($dia->nombreDia == 'miercoles'){ echo $dia->entrada;} } ?>" >
                        </td>
                        <td>
                            <input type="time" id="horSalida[]" name="horSalida[]" value="<?php foreach($diashoras as  $dia) { if($dia->nombreDia == 'miercoles'){ echo $dia->salida; }} ?>" >
                        </td>
                        <td>
                            <input type="checkbox" name="dias[]" id="dias[]"  value="miercoles" <?php foreach($diashoras as  $dia) { if($dia->nombreDia == 'miercoles'){ echo'checked';} }?> >
                 </tr>
                    <tr>
                        <td scope="row">jueves</td>
                        <td>
                            <input type="time" id="horaEntrada[]" name="horaEntrada[]" value="<?php foreach ($diashoras as  $dia) { if($dia->nombreDia == 'jueves'){ echo $dia->entrada;} } ?>" >
                        </td>
                        <td>
                            <input type="time" id="horSalida[]" name="horSalida[]" value="<?php foreach ($diashoras as  $dia) { if($dia->nombreDia == 'jueves'){ echo $dia->salida; }} ?>" >
                        </td>
                        <td>
                            <input type="checkbox" name="dias[]" id="dias[]"  value="jueves"<?php foreach ($diashoras as  $dia) { if($dia->nombreDia == 'jueves'){ echo ' checked';} } ?> >
                 </tr>
                    <tr>
                        <td scope="row">viernes</td>
                        <td>
                            <input type="time" id="horaEntrada[]" name="horaEntrada[]" value="<?php foreach ($diashoras as  $dia) { if($dia->nombreDia == 'viernes'){ echo $dia->entrada;} } ?>" >
                        </td>
                        <td>
                            <input type="time" id="horSalida[]" name="horSalida[]" value="<?php foreach ($diashoras as  $dia) { if($dia->nombreDia == 'viernes'){ echo $dia->salida; }} ?>" >
                        </td>
                        <td>
                            <input type="checkbox" name="dias[]" id="dias[]"   value="viernes"<?php foreach ($diashoras as  $dia) { if($dia->nombreDia == 'viernes'){ echo'checked';} } ?>>
                 </tr>
    
                </tbody>
            </table>
            <input class="btn btn-primary"  type="submit" value="guardar">
        </form>
    </div>
  </div>
</div>
</div>
</div>
    
@endsection
