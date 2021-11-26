@extends('layouts.app')


@section('contenido')
<div class="container-fluid " >
  <div class="col-sm-6 mx-auto">
<div class="card-group">
  <div class="card">
    <div class="card-body">
        <h1>Nuevo alumno</h1>
        @if (session('info'))
        <div class="alert alert-primary" role="alert">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <form action="{{ route('alumnoSave') }}" method="POST">
        @csrf
        <label for="">Nombre</label>
        <input class="form-control" type="text" name="nombre" id="nombre">
        <label  for="">Apellido paterno</label>
        <input class="form-control" type="text" name="apelPat" id="apelPat">
        <label for="">Apellido materno</label>
        <input class="form-control" type="text" name="apelMat" id="apelMat">
        <label for="auto" class="col-sm-2 control-label">¿Tiene auto?</label>
        <div class="col-sm-10">
            <label class="radio-inline">
                <input type="radio" name="auto" id="auto" value="1" checked>SI
            </label>
            <label class="radio-inline">
                <input type="radio" name="auto" id="auto" value="0">NO
            </label>
        </div>
        <div class="form-group">
            <label for="">Grupos</label>
            <select class="form-control" name="grupo" id="grupo">
                @foreach (DB::select('select * from grupos') as $item)
                    <option value="{{ $item->id }}">{{ $item->nombreGrupo }}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" class="btn btn-primary" value="Guardar">
    </form>
    </div>
  </div>
</div>
</div>
</div>
    
@endsection
