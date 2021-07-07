@extends('layouts.app')

@section('contenido')

<pre>{{Auth::user()->usuario}}</pre>
{{-- <a href="{{ route('registro')}}">Registro de nuevo ususario</a> --}}
@can('userAdmin')
<a href="{{ route('userList')}}">Usuarios</a>
@endcan
<form action="{{ route('logout') }}" method="post"> @csrf <a href="#" onclick="this.closest('form').submit()">Logout</a></form>
@endsection
