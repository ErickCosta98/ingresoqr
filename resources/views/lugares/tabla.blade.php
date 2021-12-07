@extends('layouts.app')

@section('style')
<style>
  body {
       width: 100%;
       min-height: 100%;
       height: auto !important;
       height: 100%;
       /* background-size: 100% 100%; */
       /* background: rgb(2,84,65); */
       background-image: url('../img/back.jpg') ;
       background-size: cover;
       /* background: linear-gradient(0deg, rgba(2,84,65,1) 0%, rgba(253,187,45,1) 100%) ; */
 }
</style>    
@endsection

@section('contenido')

<div>
<div class="container  shadow-lg border-0 rounded-lg  bg-light  w-100 mt-5">
  
    <h3 style="text-align: center;">Lista de Alumnos</h3>   
        
      <table class="table  table-striped" id="tabla">
        <thead class="thead-light">
          <tr>
            <th>Nombre Alumno</th>
            <th>imprimir qr</th>
          </tr>
        </thead>
        <tbody>
        @foreach ( $lugares as $lugar )
            <tr>
            <td>{{$lugar}}</td>
            <td><a href="{{ route('pdfqr', ['student'=>$lugar]) }}" class="btn btn-primary btn-block"><i class="fas fa-print"></i></a></td>  
        @endforeach
            </tr>
        </tbody>
      </table></div>
    </div>   

@endsection

@section('js')
    <script>
      $(document).ready(function() {
    $('#tabla').DataTable( {
        language: {
            url: '{{ asset('DataTables/es-mx.json') }}'
        }
    } );
} );
    </script>
@endsection