@extends('layouts.app')

@section('contenido')
<div class="container">
    <div class="row">
      <h3 style="text-align: center;">Diccionario</h3>
    </div>    
    <div class="row">
    <a href="{{ route('userRegistro') }}" class="btn btn-primary">Nuevo registro</a>
    <a href="{{ route('home') }}" class="btn btn-primary">home</a>
    
    <br>
    <br>
    {{-- <b class="h4">Nombre:</b> <input class="form " type="text" name="campo" id="campo">
    <input name="enviar" id="enviar" class="btn btn-info" type="submit" value="Buscar"> --}}
    </div>
    <div class="row table-reponsive">
  <table class="table table-light table-striped">
    <thead class="thead-light">
      <tr>
        <th>id</th>
        <th>Usuario</th>
        <th>Nombre</th>
        <th>estado</th>
        <th>modificar</th>
        <th>Modificar estado</th>
      </tr>
    </thead>
    <tbody>
    @foreach ( $users as $user )
        <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->usuario}}</td>
        <td>{{$user->nombre}}</td>
        @if ($user->estatus == 1)
            <td>Activo</td>
        @else
        <td>Inactivo</td>
        @endif
        <td><a href="{{ route('userEdit', $user->id) }}" class="btn btn-info btn-block">Editar</a></td>  
        @if ($user->estatus == 1)
        <td><a id='btnBorrar' href="{{ route('userDelete', $user->id) }}" class="btn btn-danger btn-block" >Desactivar</a></td>
        @else
        <td><a id='btnActive' href="{{ route('userActive', $user->id) }}" class="btn btn-success btn-block" >Activar</a></td>
        @endif
    @endforeach
        </tr>
    </tbody>
  </table>
    </div>
  </div>

@endsection