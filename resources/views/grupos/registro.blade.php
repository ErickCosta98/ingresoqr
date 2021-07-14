@extends('layouts.app')

@section('contenido')
<a class="btn btn-primary" href="{{ route('grupoList') }}">grupos</a>

    <form action="{{ route('grupoG') }}" method="post">
        @csrf
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
        <input type="submit" value="guardar">
    </form>
@endsection
