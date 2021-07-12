@extends('layouts.app')


@section('contenido')
<a href="{{ route('alumnoList')}}">Alumnos</a>
<form action="{{ route('alumnoUpdate',$alumno) }}" method="post">
    @csrf
    @method('put')
    <label for="">Nombre</label>
    <input type="text" name="nombre" id="nombre" value="{{$alumno->nombre}}">
    <label for="">Apellido paterno</label>
    <input type="text" name="apelPat" id="apelPat" value="{{$alumno->apelPat}}">
    <label for="">Apellido materno</label>
    <input type="text" name="apelMat" id="apelMat" value="{{$alumno->apelMat}}">
    <label for="auto" class="col-sm-2 control-label">¿Tiene auto?</label>
    <div class="col-sm-10">
    <label class="radio-inline">
    <input type="radio" name="auto" id="auto" value="1" <?php if ($alumno->automovil == 1) echo 'checked'?>>SI
    </label>
    <label class="radio-inline">
    <input type="radio" name="auto" id="auto" value="0" <?php if ($alumno->automovil == 0) echo 'checked'?>>NO
    </label>
    </div>
    <input type="submit" value="Guardar">
</form>
@endsection