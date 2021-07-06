<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="pcss/login.css">
</head>
<body class="text-center">
  
      <main class="form-signin">
          <form action="{{ route('loging') }}" method="POST">
            @csrf
            <img class="mb-4" src="img/bootstrap-logo.svg" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">A</h1>
        
            <div class="form-floating">
              <label for="floatingInput">Usuario</label>
              <input type="text" class="form-control" id="floatingInput" name="usuario" placeholder="Usuario" value="{{old('usuario')}}">
              @error('usuario'){{$message}}@enderror
            </div>
            <div class="form-floating">
              <label for="floatingPassword">Contraseña</label>
              <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
              @error('password'){{$message}}@enderror
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Iniciar sesion</button>
            {{-- <p class="mt-5 mb-3 text-muted">&copy; </p> --}}
          </form>
          {{-- @dd($errors) --}}
      </main>
</div>
</body>
</html>
