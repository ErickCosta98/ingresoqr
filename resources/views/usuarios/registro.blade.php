@extends('layouts.app')

@section('contenido')
<br>
<br>
<div class="container-fluid " >
  <div class="col-sm-6 mx-auto">
<div class="card-group">
  <div class="card">
    <div class="card-body">
      <h1>Nuevo  usuario</h1>
        <form  action="{{ route('userSave') }}" method="post">
            @csrf
            <label for="">Nombre</label>
            <input class="form-control" type="text" name="nombre" id="nombre">
            <br>
            <label for="">Apellido paterno</label>
            <input class="form-control" type="text" name="apelPat" id="apelPa">
            <br>
            <label for="">Apellido materno</label>
            <input class="form-control" type="text" name="apelMat" id="apelMat">
            <br>
            <label for="">usuario</label>
            <input class="form-control" type="text" name="usuario" id="usuario">
            <br>
            <label for="">Contraseña</label>
            <input class="form-control" type="text" name="password" id="password">
            <br>
            <label for="">Roles</label>
            <br>
                @foreach ($roles as $rol)
                <label class="checkbox-inline">
                    <input type="checkbox" name="roles[]" id="roles[]" value="{{$rol->id}}" >{{$rol['name']}}
                    </label>
                @endforeach
            <br>
            <input class="btn btn-primary" type="submit" value="Guardar">
        
        </form>
    </div>
  </div>
</div>
</div>
</div>
{{-- @dd($errors) --}}


@endsection
