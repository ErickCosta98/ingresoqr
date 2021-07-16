@extends('layouts.app')

@section('contenido')
<br>
<br>
<div class="container-fluid " >
  <div class="col-sm-6 mx-auto">
<div class="card-group">
  <div class="card">
    <div class="card-body">
      <h1>Roles</h1>
      <form action="{{ route('updateRol')}}" method="post">
        @csrf
        {{-- @dd($user) --}}
        <input id="id" name="id" type="hidden" value="{{$role->id}}">
        <label >Nombre de  rol</label>
        <input type="text" name="name" id="name" value="{{$role['name']}}">
        <br>
        @foreach ($permisos as $permiso)
            <label class="checkbox-inline">
                <input type="checkbox" name="permisos[]" id="permisos[]" value="{{$permiso->id}}" <?php if(strpos($permN,$permiso['name'])) echo 'checked'?> >{{$permiso['name']}}
                </label>
            @endforeach
        
            <br>
            {{-- //<?phpif(strpos($roleN,$rol['name'])) echo 'checked'?> --}}
        <input type="submit" value="Guardar">
    </form>
    <a href="{{ route('rolespermisos') }}" class="btn btn-primary">regresar</a>
    </div>
  </div>
</div>
</div>
</div>

{{-- @dd($errors) --}}
@endsection
