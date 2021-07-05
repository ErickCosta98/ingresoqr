@extends('layouts.app')

@section('contenido')
<a href="{{ route('userList')}}">Usuarios</a>

<form action="{{ route('registro.user') }}" method="post">
    @csrf
    <label for="">Nombre</label>
    <input type="text" name="nombre" id="nombre">
    <br>
    <label for="">Apellido paterno</label>
    <input type="text" name="apelPat" id="apelPa">
    <br>
    <label for="">Apellido materno</label>
    <input type="text" name="apelMat" id="apelMat">
    <br>
    <label for="">usuario</label>
    <input type="text" name="usuario" id="usuario">
    <br>
    <label for="">Contraseña</label>
    <input type="text" name="contraseña" id="contraseña">
    <br>
    <input type="submit" value="Guardar">

</form>
@dd($errors)
@endsection
