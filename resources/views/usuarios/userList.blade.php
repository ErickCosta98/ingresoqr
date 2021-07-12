@extends('layouts.app')

@section('contenido')
<div class="container">
    <div class="row">
      <h3 style="text-align: center;">Lista de usuarios</h3>
    </div>    
    <div class="row">
    <a href="{{ route('userRegistro') }}" class="btn btn-primary">Nuevo registro</a>
    <a href="{{ route('home') }}" class="btn btn-primary">home</a>
    <a href="{{ route('rolespermisos')}}" class="btn btn-primary">rolespermisos</a>

  </div>
    <div class="row table-reponsive">
  <table class="table table-light table-striped" id="tabla">
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
    @if (Auth::user()->usuario != $user->usuario )      
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