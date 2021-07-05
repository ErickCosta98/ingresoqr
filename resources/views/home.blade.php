@extends('layouts.app')

@section('contenido')

<pre>{{Auth::user()}}</pre>
{{-- <a href="{{ route('registro')}}">Registro de nuevo ususario</a> --}}
<a href="{{ route('userList')}}">Usuarios</a>
<form action="{{ route('logout') }}" method="post"> @csrf <a href="#" onclick="this.closest('form').submit()">Logout</a></form>
@endsection
