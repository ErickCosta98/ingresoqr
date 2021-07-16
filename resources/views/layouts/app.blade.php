<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery-1.11.2.min.js') }}"></script>
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('davidshimjs-qrcodejs-04f46c6/qrcode.min.js') }}"></script>
    <!-- Fonts -->

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">

</head>
<body class="bg-secondary">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
              @guest
              <li class="nav-item">
                <a href="{{ route('welcome') }}" class="nav-link">Administrador</a>
              </li>
              @endguest
              @can('home')
              
              @can('userAdmin')
              <li><a  class="nav-link" href="{{ route('userList')}}">Usuarios</a></li>
              <li><a  class="nav-link" href="{{ route('rolespermisos')}}">Roles</a></li>
              @endcan
              <li><a   class="nav-link" href="{{ route('alumnoList')}}">Alumnos</a></li>
              <li><a   class="nav-link" href="{{ route('grupoList')}}">Grupos</a></li>
            @yield('nav')
            <li><form action="{{ route('logout') }}" method="post"> @csrf <a   class="nav-link" href="#" onclick="this.closest('form').submit()">Logout</a></form></li>

            @endcan
          </ul>
        </div>
      </nav>
    

        <main class="py-4">
            @yield('contenido')
        </main>
    </div>

    @yield('js')
</body>
</html>
