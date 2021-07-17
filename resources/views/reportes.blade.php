@extends('layouts.app')

@section('meta')
<meta http-equiv="refresh" content="30">
@endsection

@section('contenido')
<div class="container col-sm-12">
  <div class="row ">
    <div class="mx-auto">
    <div class="card ">
      <div class="card-body">
        <div class="row">
          <h3 style="text-align: center;">Lista de Grupos</h3>
        </div>    
        <div class="row">
        <a href="{{ route('frmRegistro') }}" class="btn btn-primary">Nuevo registro</a>
        </div>
        <div class="row table-reponsive">
      <table class="table table-light table-striped" id="tabla">
        <thead class="thead-light">
          <tr>
            {{-- <th>id</th> --}}
            <th>id</th>
            <th>fecha</th>
            <th>Entrada</th>
            <th>Salida</th>
            <th>Matricula</th>
          </tr>
        </thead>
        <tbody>
        @foreach (DB::select('select  reportes.* , alumnos.matricula from reportes inner join alumnos  on alumnos.id = reportes.fk_alumnoid limit 10' ) as $reporte )
            <tr>
            {{-- <td>{{$alumno->id}}</td> --}}
            <td>{{$reporte->id}}</td>
            <td>{{$reporte->fecha}}</td>
            <td>{{$reporte->entrada}}</td>
            <td>{{$reporte->salida}}</td>
            <td>{{$reporte->matricula}}</td>
        @endforeach
            </tr>
        </tbody>
      </table>
        </div>
      </div>
    </div>
</div> 
</div>

@endsection

@section('js')
    <script>
      $(document).ready(function() {
    $('#tabla').DataTable( {
        language: {
            url: 'DataTables/es-mx.json'
        }
    } );
} );
    </script>
@endsection