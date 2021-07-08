@extends('layouts.app')

@section('contenido')
<a href="{{ route('userList')}}">Usuarios</a>

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
<a href="{{ route('userList') }}" class="btn btn-primary">regresar</a>


{{-- @dd($errors) --}}
@endsection
