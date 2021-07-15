@extends('layouts.app')

@section('contenido')
<br>
<br>
<div class="container-fluid " >
  <div class="col-sm-6 mx-auto">
<div class="card-group">
  <div class="card">
    <div class="card-body">
        <h1>Nuevo grupo</h1>

        <form action="{{ route('grupoG') }}" method="post">
            @csrf
            <label for="nombreG">Nombre de grupo</label>
            <input type="text" name="nombreG" id="nombreG">
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
                            <input type="time" id="horaEntrada[]" name="horaEntrada[]"  >
                        </td>
                        <td>
                            <input type="time" id="horSalida[]" name="horSalida[]"  >
                        </td>
                        <td>
                            <input type="checkbox" name="dias[]" id="dias[]" value="lunes" >
                    </tr>
                    <tr>
                        <td scope="row">martes</td>
                        <td>
                            <input type="time" id="horaEntrada[]" name="horaEntrada[]"  >
                        </td>
                        <td>
                            <input type="time" id="horSalida[]" name="horSalida[]"  >
                        </td>
                        <td>
                            <input type="checkbox" name="dias[]" id="dias[]" value="martes" >
                    </tr>
                    <tr>
                        <td scope="row">miercoles</td>
                        <td>
                            <input type="time" id="horaEntrada[]" name="horaEntrada[]"  >
                        </td>
                        <td>
                            <input type="time" id="horSalida[]" name="horSalida[]"  >
                        </td>
                        <td>
                            <input type="checkbox" name="dias[]" id="dias[]" value="miercoles" >
                    </tr>
                    <tr>
                        <td scope="row">jueves</td>
                        <td>
                            <input type="time" id="horaEntrada[]" name="horaEntrada[]"  >
                        </td>
                        <td>
                            <input type="time" id="horSalida[]" name="horSalida[]"  >
                        </td>
                        <td>
                            <input type="checkbox" name="dias[]" id="dias[]" value="jueves" >
                    </tr>
                    <tr>
                        <td scope="row">viernes</td>
                        <td>
                            <input type="time" id="horaEntrada[]" name="horaEntrada[]"  >
                        </td>
                        <td>
                            <input type="time" id="horSalida[]" name="horSalida[]"  >
                        </td>
                        <td>
                            <input type="checkbox" name="dias[]" id="dias[]" value="viernes" >
                    </tr>
    
                </tbody>
            </table>
            <input class="btn btn-primary" type="submit" value="guardar">
        </form>
    </div>
  </div>
</div>
</div>
</div>
    
@endsection
