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
        /* background: linear-gradient(0deg, rgba(2,84,65,1) 0%, rgba(253,187,45,1) 100%) fixed; */
  }
  #letras{
  width: 100%;

}
.imgcont{
  margin-bottom: 0;
}
    </style>
</head>
<body class="text-center">
  <div class="imgcont"><img src="{{ asset('img/letras.png') }}" alt="" id="letras"></div>
      <main class="form-signin">
        
          <form action="{{ route('loging') }}" method="POST">
            @csrf
            {{-- <img class="mb-4" src="img/bootstrap-logo.svg" alt="" width="72" height="57"> --}}

            <h1 class="h3 mb-3 fw-normal text-white">Administrador</h1>

        
            <div class="form-floating">
              <label for="floatingInput" class="text-white">Usuario</label>
              <input type="text" class="form-control" id="floatingInput" name="usuario" placeholder="Usuario" value="{{old('usuario')}}">
              @error('usuario'){{$message}}@enderror
            </div>
            <div class="form-floating">
              <label for="floatingPassword" class="text-white">Contraseña</label>
              <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
            {{-- mensajes de error--}}
              @error('password'){{$message}}@enderror
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Iniciar sesion</button>
            {{-- <p class="mt-5 mb-3 text-muted">&copy; </p> --}}
          </form>
          {{-- @dd($errors) --}}
      </main>
</div>
<style>
  table{
    display: inline;
  }
</style>
</body>
</html>
