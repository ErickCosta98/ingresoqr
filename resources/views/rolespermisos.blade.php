
@extends('layouts.app')

@section('contenido')
<a href="{{ route('userList')}}">Usuarios</a>

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
<a href="{{ route('userList') }}" class="btn btn-primary">regresar</a>


{{-- @dd($errors) --}}
@endsection
