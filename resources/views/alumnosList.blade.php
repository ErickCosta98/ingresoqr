@extends('layouts.app')



@section('contenido')
    
<div class="container">
    <div class="row">
      <h3 style="text-align: center;">Lista de alumnos</h3>
    </div>    
    <div class="row">
    <a href="" class="btn btn-primary">Nuevo registro</a>
    <a href="{{ route('home') }}" class="btn btn-primary">home</a>

  </div>
    <form action=""   method="post">
      @csrf
    <b class="h5">Nombre:</b> <input class="form" type="text" name="busqueda" id="busqueda" value="{{old('busqueda')}}">
    <input name="enviar" id="enviar" class="btn btn-info" type="submit" value="Buscar">
    
  </form>
    <div class="row table-reponsive">
  <table class="table table-light table-striped">
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
        <td>{{$alumno->id_alumno}}</td>
        <td>{{$alumno->matricula}}</td>
        <td>{{$alumno->nombre}}</td>
        @if ($alumno->estatus == 1)
            <td>Activo</td>
        @else
        <td>Inactivo</td>
        @endif
        <td><a href="{{ route('userEdit', $alumno->id_alumno) }}" class="btn btn-info btn-block">Editar</a></td>  
        @if ($alumno->estado == 1)
        <td><a id='btnBorrar' href="{{ route('userDelete', $alumno->id_alumno) }}" class="btn btn-danger btn-block" >Desactivar</a></td>
        @else
        <td><a id='btnActive' href="{{ route('userActive', $alumno->id_alumno) }}" class="btn btn-success btn-block" >Activar</a></td>
        @endif
    @endforeach
        </tr>
    </tbody>
  </table>
  {{$alumnos->links()}}
    </div>
  </div>

@endsection