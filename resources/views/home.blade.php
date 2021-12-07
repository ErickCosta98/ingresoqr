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
    body {
        width: 100%;
        min-height: 100%;
        height: auto !important;
        height: 100%;
        /* background-size: 100% 100%; */
        /* background: rgb(2,84,65); */
        background-image: url('../public/img/back.jpg') ;
        background-size: cover;
        /* background: linear-gradient(0deg, rgba(2,84,65,1) 0%, rgba(253,187,45,1) 100%) fixed; */
  }
    </style>
@section('contenido')
<div class="centrado ">
    
              <h1 style="color: white;"><Strong>Bienvenido  {{Auth::user()->nombre}}</Strong></h1>
              {{-- imprimir nombre de usuario --}}
  
</div>


@endsection
