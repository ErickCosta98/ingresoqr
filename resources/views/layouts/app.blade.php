<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- <script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script> --}}
    <script src="{{ asset('js/jquery-1.11.2.min.js') }}"></script>
    {{-- <script src="{{ asset('bootstrap-5.1.3-dist/js/bootstrap.min.js') }}"></script> --}}
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    {{-- <script src="{{ asset('davidshimjs-qrcodejs-04f46c6/qrcode.min.js') }}"></script> --}}
    <script src="{{ asset('fontawesome-free-5.15.4-web/js/all.min.js') }}"></script>
    <!-- Fonts -->

    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-5.15.4-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.1.3-dist/css/bootstrap.min.css') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> --}}
</head>
@yield('style')
<style>
 

  .back{
    /* position:fixed;
        top:-50%;
        left:-50%; */
        width:100%;
        height:100%;

  }
</style>
<body>
  @can('home')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
              {{-- @guest
              <li class="nav-item">
                <a href="{{ route('welcome') }}" class="nav-link">Administrador</a>
              </li>
              @endguest --}}
              
              
              @can('userAdmin')
              <li><a  class="nav-link" href="{{ route('userList')}}">Usuarios</a></li>
              <li><a  class="nav-link" href="{{ route('rolespermisos')}}">Roles</a></li>
              @endcan
              @can('alumnoReporte')
              <li><a   class="nav-link" href="{{ route('reporte')}}">Reportes</a></li>
              @endcan
              @can('alumnoRegistro')
              <li><a   class="nav-link" href="{{ route('alumnoList')}}">Alumnos</a></li>
              @endcan
              @can('horariosAdmin')
              <li><a   class="nav-link" href="{{ route('grupoList')}}">Grupos</a></li>
              @endcan
              @can('registroLugares')
              <li><a  class="nav-link" href="{{ route('vistaRegistro')}}">Lugares</a></li>
              <li><a  class="nav-link" href="{{ route('vistaBan')}}">Lugares Ban</a></li>
              <li><a  class="nav-link" href="{{ route('tabAlumnos')}}" ><i class="fas fa-info-circle"></i></a></li>
              <li><a  class="nav-link" href="{{ route('index2')}}" ><i class="fas fa-eye"></i></a></li>
              <li><a  class="nav-link" href="{{ route('tablaLugares')}}" >Log</a></li>
              @endcan
            @yield('nav')
            <li><form action="{{ route('logout') }}" method="post"> @csrf <a   class="nav-link" href="#" onclick="this.closest('form').submit()">Cerrar sesion</a></form></li>
            
          </ul>
        </div>
      </nav>
      @endcan
<div class="back">

  
        {{-- <main class="py-4"> --}}
            @yield('contenido')
        {{-- </main> --}}
    </div>
    @yield('js')
</body>
</html>
