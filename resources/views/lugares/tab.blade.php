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
       background-image: url('../public/img/back.jpg') ;
       background-size: cover;
       /* background: linear-gradient(0deg, rgba(2,84,65,1) 0%, rgba(253,187,45,1) 100%) ; */
 }
</style>    
@endsection

@section('contenido')

<div>
<div class="container  shadow-lg border-0 rounded-lg  bg-light  w-100 mt-5">
  
    <h3 style="text-align: center;">Lista de Alumnos</h3>   
    <h3 style="text-align: center;">Alumnos: {{$countA}}</h3>   
      <table class="table  table-striped" id="tabla">
        <thead class="thead-light">
          <tr>
            <th>Nombre Alumno</th>
            <th>Asientos</th>
          </tr>
        </thead>
        <tbody>
        @foreach ( $alumnos as $alumno )
            <tr>
            <td>{{$alumno->student_name}}</td>
            <td>{{$alumno->seats_count}}</td>
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