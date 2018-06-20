<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Shortcut') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
          {{ config('app.name', 'Shortcut') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-link">
              <a href="{{route('faq')}}" class="nav-link">FAQ</a>
            </li>

            @if(Auth::guard('company')->check())
              <li class="nav-link">
                <a href="{{route('createProyect')}}" class="nav-link">Crear Proyecto</a>
              </li>
            @elseif(Auth::guard('freelancer')->check())
              <li class="nav-link">
                <a href="{{route('showAllProyects')}}" class="nav-link">Buscar Proyecto</a>
              </li>

            @endif


          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @if(!isset(Auth::guard('company')->user()->company_name) && !isset(Auth::guard('freelancer')->user()->first_name))
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Iniciar sesión</a>
              <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                <a class="dropdown-item" href="{{ route('freelancersLogin') }}">Como Freelancer</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('companiesLogin') }}">Como Companía</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Registrarme</a>
              <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                <a class="dropdown-item" href="{{ route('freelancersRegister') }}">Como Freelancer</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('companiesRegister') }}">Como Companía</a>
              </div>
            </li>                
            @else
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                @if(Auth::guard('company')->check())
                {{ Auth::guard('company')->user()->company_name }}
                @elseif(Auth::guard('freelancer')->check())
                {{ Auth::guard('freelancer')->user()->first_name }}
                @endif
              </a>
              <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                @if(Auth::guard('company')->check())
                  <a class="dropdown-item" href="{{ route('homeCompany') }}">Perfil</a>
                  <a class="dropdown-item" href="{{ route('companiesProyects') }}">Mis proyectos</a>
                @elseif(Auth::guard('freelancer')->check())
                  <a class="dropdown-item" href="{{ route('homeFreelancer') }}">Perfil</a>
                  <a class="dropdown-item" href="{{ route('showMyProyects') }}">Proyectos en los que participo</a>
                @endif                
                <div class="dropdown-divider"></div>
                @if(Auth::guard('company')->check())
                  <a class="dropdown-item" href="{{ route('companiesLogout') }}">Cerrar sesión</a>
                @elseif(Auth::guard('freelancer')->check())
                <a class="dropdown-item" href="{{ route('freelancersLogout') }}">Cerrar sesión</a>
                @endif   
              </div>
            </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>

  <main class="py-4">
    @yield('content')
  </main>
</div>
</body>
</html>
