@extends('layouts.app')

<style>

    .centrado {
        margin: 0;
        padding: 0;
        text-align: center;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translateX(-50%) translateY(-50%);
    }
    
    </style>
@section('contenido')
<div class="centrado ">
    
              <h1>Bienvenido  {{Auth::user()->nombre}}</h1>
  
</div>


@endsection
