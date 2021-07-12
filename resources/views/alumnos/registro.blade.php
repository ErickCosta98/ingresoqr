@extends('layouts.app')


@section('contenido')
@if (session('info'))
    <div class="alert alert-primary" role="alert">
        <strong>{{session('info')}}</strong>
    </div>
@endif
<a href="{{ route('alumnoList')}}">Alumnos</a>
    <form action="{{ route('alumnoSave') }}" method="POST">
        @csrf
        <label for="">Nombre</label>
        <input type="text" name="nombre" id="nombre">
        <label for="">Apellido paterno</label>
        <input type="text" name="apelPat" id="apelPat">
        <label for="">Apellido materno</label>
        <input type="text" name="apelMat" id="apelMat">
        <label for="auto" class="col-sm-2 control-label">¿Tiene auto?</label>
        <div class="col-sm-10">
        <label class="radio-inline">
        <input type="radio" name="auto" id="auto" value="1" checked>SI
        </label>
        <label class="radio-inline">
        <input type="radio" name="auto" id="auto" value="0" >NO
        </label>
        </div>
        <input type="submit" value="Guardar">
    </form>
@endsection