@extends('layouts.app')



@section('contenido')
    
<div class="container">
    <div class="row">
      <h3 style="text-align: center;">Lista de alumnos</h3>
    </div>    
    <div class="row">
    <a href="{{ route('regisAlumno') }}" class="btn btn-primary">Nuevo registro</a>
    <a href="{{ route('home') }}" class="btn btn-primary">home</a>
    </div>
    <div class="row table-reponsive">
  <table class="table table-light table-striped" id="tabla">
    <thead class="thead-light">
      <tr>
        <th>id</th>
        <th>Matricula</th>
        <th>Nombre</th>
        <th>estado</th>
        <th>modificar</th>
        <th>Modificar estado</th>
      </tr>
    </thead>
    <tbody>
    @foreach ( $alumnos as $alumno )
        <tr>
        <td>{{$alumno->id}}</td>
        <td>{{$alumno->matricula}}</td>
        <td>{{$alumno->nombre}}</td>
        @if ($alumno->estado == 1)
            <td>Activo</td>
        @else
        <td>Inactivo</td>
        @endif
        <td><a href="{{ route('userEdit', $alumno->id) }}" class="btn btn-info btn-block">Editar</a></td>  
        @if ($alumno->estado == 1)
        <td><a id='btnBorrar' href="{{ route('userDelete', $alumno->id) }}" class="btn btn-danger btn-block" >Desactivar</a></td>
        @else
        <td><a id='btnActive' href="{{ route('userActive', $alumno->id) }}" class="btn btn-success btn-block" >Activar</a></td>
        @endif
    @endforeach
        </tr>
    </tbody>
  </table>
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