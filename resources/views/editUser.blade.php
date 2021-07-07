@extends('layouts.app')

@section('contenido')
<a href="{{ route('userList')}}">Usuarios</a>

<form action="{{ route('userUpdate',$user)}}" method="post">
    @csrf

    @method('put')

    {{-- @dd($user) --}}
    <label for="">Nombre</label>
    <input type="text" name="nombre" id="nombre" value="{{$user->nombre}}">
    <br>
    <label for="">Apellido paterno</label>
    <input type="text" name="apelPat" id="apelPa" value="{{$user->apelPat}}">
    <br>
    <label for="">Apellido materno</label>
    <input type="text" name="apelMat" id="apelMat" value="{{$user->apelMat}}">
    <br>
    <label for="">usuario</label>
    <input type="text" name="usuario" id="usuario" value="{{$user->usuario}}">
    <br>
    @foreach ($roles as $rol)
        <label class="checkbox-inline">
            <input type="checkbox" name="roles[]" id="roles[]" value="{{$rol->id}}" <?php if(strpos($roleN,$rol['name'])) echo 'checked'?>> {{$rol['name']}}
            </label>
        @endforeach
        <br>
    <input type="submit" value="Guardar">

</form>
<form action="{{ route('userUpdatepass')}}" method="post">
    @csrf
    <input id="id" name="id" type="hidden" value="{{$user->id}}">
    <label for="">Contraseña</label>
    <input type="text" name="contraseña" id="contraseña" ">
    <br>
    <input type="submit" value="Guardar">
</form>
<a href="{{ route('userList') }}" class="btn btn-primary">regresar</a>


{{-- @dd($errors) --}}
@endsection
