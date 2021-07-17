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
    input[type="text"]{width:600px; height: 50px; font-size: 40px}
    </style>

@section('contenido')
<div class="centrado ">
    <h1>Matricula</h1>
    <div  class="container-fluid">
        <form action="{{ route('verifica')}}" method="get">
            <input type="text" class="form-control" name="matricula" id="matricula" autocomplete="off" required placeholder="Matricula">
        </form>
        
    </div>
</div>

@endsection

@section('js')
<script>
    $(function(){
    
        @if(Session::has('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ Session::get("error") }}',
            showConfirmButton: false,
            timer: 1500
        })
        @endif
        @if(Session::has('success'))
        Swal.fire({
        icon: 'success',
        title: 'Listo!',
        text: '{{ Session::get("success") }}',
        showConfirmButton: false,
        timer: 1500
    })
    @endif
    });
    </script>
@endsection