@extends('layouts.app')


@section('contenido')
    
<div class="container col-sm-12">
    <div class="row ">
      <div class="mx-auto">
      <div class="card ">
        <div class="card-body">
          <h3 style="text-align: center;">Lista de alumnos</h3>   
          <a href="{{ route('regisAlumno') }}" class="btn btn-primary">Nuevo registro</a>
          <br>
          <div class="row table-reponsive">
        <table class="table table-light table-striped" id="tabla">
          <thead class="thead-light">
            <tr>
              {{-- <th>id</th> --}}
              <th>Matricula</th>
              <th>Nombre</th>
              <th>Apellido paterno</th>
              <th>Apellido materno</th>
              <th>Automovil</th>
              <th>modificar</th>
              <th>Modificar estado</th>
            </tr>
          </thead>
          <tbody>
          @foreach ( $alumnos as $alumno )
              <tr>
              {{-- <td>{{$alumno->id}}</td> --}}
              <td>{{$alumno->matricula}}</td>
              <td>{{$alumno->nombre}}</td>
              <td>{{$alumno->apelPat}}</td>
              <td>{{$alumno->apelMat}}</td>
              @if ($alumno->automovil == 1)
                  <td><label >si</label></td>
              @else
              <td><label >no</label></td>
              @endif
              <td><a href="{{ route('alumnoEdit', $alumno->id) }}" class="btn btn-info btn-block">Editar</a></td>  
              <td><a id='btnBorrar' href="{{ route('alumnoDelete', $alumno->id) }}" class="btn btn-danger btn-block" >eliminar</a></td>
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