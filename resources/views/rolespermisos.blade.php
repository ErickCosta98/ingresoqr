
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
      <form action="{{ route('nuevoRol') }}" method="post">
        @csrf
        {{-- @dd($user) --}}
        <label for="">Nombre de nuevo rol</label>
        <input type="text" name="name" id="name">
        <br>
        @foreach ($permisos as $permiso)
            <label class="checkbox-inline">
                <input type="checkbox" name="permisos[]" id="permisos[]" value="{{$permiso->id}}" >{{$permiso['name']}}
                </label>
            @endforeach
        
            <br>
            {{-- //<?phpif(strpos($roleN,$rol['name'])) echo 'checked'?> --}}
        <input type="submit" value="Guardar">
    </form>
    <ul >
            
        @foreach ($roles as $rol)
            
                <li ><a href="{{ route('editRol', $rol->id) }}">{{$rol['name']}}</a></li>
                
            @endforeach
        </ul>
    {{-- <form action="{{ route('nuevoPermiso') }}" method="post">
        @csrf
        <label for="">Nombre de nuevo permiso</label>
        <input type="text" name="name" id="name">
        
        <input type="submit" value="Guardar">
    </form>
    <ul >
        @foreach ($permisos as $permiso)
            
                <li >{{$permiso['name']}}</li>
            @endforeach
        </ul> --}}    
    </div>
  </div>
</div>
</div>
</div>


{{-- @dd($errors) --}}
@endsection
