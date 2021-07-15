@extends('layouts.app')

@section('contenido')


{{-- </form>
<form action="{{ route('userUpdatepass')}}" method="post">
    @csrf
    <input id="id" name="id" type="hidden" value="{{$user->id}}">
    <label for="">Contraseña</label>
    <input type="text" name="contraseña" id="contraseña">
    <br>
    <input type="submit" value="Guardar">
</form> --}}
{{-- <a href="{{ route('userList') }}" class="btn btn-primary">regresar</a> --}}

<br>
<br>
<div class="container-fluid " >
  <div class="col-sm-6 mx-auto">
<div class="card-group">
  <div class="card">
    <div class="card-body">
        <h1>Editar usuario</h1>
        <form action="{{ route('userUpdate',$user)}}" method="post">
            @csrf
        
            @method('put')
        
            {{-- @dd($user) --}}
            <label for="">Nombre</label>
            <input class="form-control"  type="text" name="nombre" id="nombre" value="{{$user->nombre}}">
            <br>
            <label for="">Apellido paterno</label>
            <input class="form-control" type="text" name="apelPat" id="apelPa" value="{{$user->apelPat}}">
            <br>
            <label for="">Apellido materno</label>
            <input class="form-control" type="text" name="apelMat" id="apelMat" value="{{$user->apelMat}}">
            <br>
            <label for="">usuario</label>
            <input class="form-control" type="text" name="usuario" id="usuario" value="{{$user->usuario}}">
            <br>
            @foreach ($roles as $rol)
                <label class="checkbox-inline">
                    <input type="checkbox" name="roles[]" id="roles[]" value="{{$rol->id}}" <?php foreach($roleN as $key => $rolen){ if($rolen == $rol['name']){ echo 'checked';} };  ?>> {{$rol['name']}}
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
