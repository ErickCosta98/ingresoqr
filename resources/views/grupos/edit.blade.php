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
                            <input type="time" id="horaEntrada[]" name="horaEntrada[]" value="<?php foreach($diashoras as  $dia) { if($dia->nombreDia == 1 ){ echo $dia->entrada;} } ?>" >
                        </td>
                        <td>
                            <input type="time" id="horSalida[]" name="horSalida[]" value="<?php foreach($diashoras as  $dia) { if($dia->nombreDia == 1){ echo $dia->salida; }} ?>" >
                        </td>
                        <td>
                            <input type="checkbox" name="dias[]" id="dias[]" value="1"  <?php foreach($diashoras as  $dia) { if($dia->nombreDia == 1){ echo ' checked';} } ?>>
                 </tr>
                    <tr>
                        <td scope="row">martes</td>
                        <td>
                            <input type="time" id="horaEntrada[]" name="horaEntrada[]" value="<?php foreach($diashoras as  $dia) { if($dia->nombreDia == 2){ echo $dia->entrada;} } ?>" >
                        </td>
                        <td>
                            <input type="time" id="horSalida[]" name="horSalida[]" value="<?php foreach($diashoras as  $dia) { if($dia->nombreDia == 2){ echo $dia->salida; }} ?>" >
                        </td>
                        <td>
                            <input type="checkbox" name="dias[]" id="dias[]"  value="2" <?php foreach($diashoras as  $dia) { if($dia->nombreDia == 2){ echo ' checked';} } ?> >
                 </tr>
                    <tr>
                        <td scope="row">miercoles</td>
                        <td>
                            <input type="time" id="horaEntrada[]" name="horaEntrada[]" value="<?php foreach ($diashoras as  $dia) { if($dia->nombreDia == 3){ echo $dia->entrada;} } ?>" >
                        </td>
                        <td>
                            <input type="time" id="horSalida[]" name="horSalida[]" value="<?php foreach($diashoras as  $dia) { if($dia->nombreDia == 3){ echo $dia->salida; }} ?>" >
                        </td>
                        <td>
                            <input type="checkbox" name="dias[]" id="dias[]"  value="3" <?php foreach($diashoras as  $dia) { if($dia->nombreDia == 3){ echo'checked';} }?> >
                 </tr>
                    <tr>
                        <td scope="row">jueves</td>
                        <td>
                            <input type="time" id="horaEntrada[]" name="horaEntrada[]" value="<?php foreach ($diashoras as  $dia) { if($dia->nombreDia == 4){ echo $dia->entrada;} } ?>" >
                        </td>
                        <td>
                            <input type="time" id="horSalida[]" name="horSalida[]" value="<?php foreach ($diashoras as  $dia) { if($dia->nombreDia == 4){ echo $dia->salida; }} ?>" >
                        </td>
                        <td>
                            <input type="checkbox" name="dias[]" id="dias[]"  value="4"<?php foreach ($diashoras as  $dia) { if($dia->nombreDia == 4){ echo ' checked';} } ?> >
                 </tr>
                    <tr>
                        <td scope="row">viernes</td>
                        <td>
                            <input type="time" id="horaEntrada[]" name="horaEntrada[]" value="<?php foreach ($diashoras as  $dia) { if($dia->nombreDia == 5){ echo $dia->entrada;} } ?>" >
                        </td>
                        <td>
                            <input type="time" id="horSalida[]" name="horSalida[]" value="<?php foreach ($diashoras as  $dia) { if($dia->nombreDia == 5){ echo $dia->salida; }} ?>" >
                        </td>
                        <td>
                            <input type="checkbox" name="dias[]" id="dias[]"   value="5"<?php foreach ($diashoras as  $dia) { if($dia->nombreDia == 5){ echo'checked';} } ?>>
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
