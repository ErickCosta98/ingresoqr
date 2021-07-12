@extends('layouts.app')


@section('contenido')
<a href="{{ route('alumnoList')}}">Alumnos</a>
    <form action="{{ route('alumnoSave') }}" method="POST">
        <label for="">Nombre</label>
        <input type="text" name="nombre" id="nombre">
        <label for="">Nombre</label>
        <input type="text" name="nombre" id="nombre">
        <label for="">Nombre</label>
        <input type="text" name="nombre" id="nombre">
    </form>
@endsection