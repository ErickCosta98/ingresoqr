@extends('layouts.app')



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
            <th>Nombre</th>
            <th>modificar</th>
            <th>Modificar estado</th>
          </tr>
        </thead>
        <tbody>
        @foreach ( $diashoras as $diahora )
            <tr>
            {{-- <td>{{$alumno->id}}</td> --}}
            <td>{{$diahora->id}}</td>
            <td>{{$diahora->nombreGrupo}}</td>
            <td><a href="{{ route('grupoEdit', $diahora->id) }}" class="btn btn-info btn-block">Editar</a></td>  
            <td><a id='btnBorrar' href="{{ route('grupoDelete', $diahora->id) }}" class="btn btn-danger btn-block" >eliminar</a></td>
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