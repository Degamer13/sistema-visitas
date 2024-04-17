<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sistema de Visitas') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="color:#fff;">
               Sistema de Visitas
                </a>
                <button class="navbar-toggler" style="background-color: #ffffffef" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @if(auth()->check())
                        <ul class="navbar-nav me-auto mb-2 mb-md-0">
                          <li class="nav-item" >
                            <a class="nav-link active" href="{{ url('/home') }}" style="color:#fff;">
                                Inicio
                            </a>


                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" style="color:#fff;" href="#" id="dropdown04" data-bs-toggle="dropdown" aria-expanded="false">Usuarios</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown04">

                              <li><a class="dropdown-item" href="{{ route('users.create') }}">Registrar Usuario</a></li>
                              <li><a class="dropdown-item" href="/users">Visualizar Usuarios</a></li>
                            </ul>
                          </li>
                          <li class="nav-item" >


                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" style="color:#fff;" href="#" id="dropdown04" data-bs-toggle="dropdown" aria-expanded="false">Roles</a>
                              <ul class="dropdown-menu" aria-labelledby="dropdown04">

                                <li><a class="dropdown-item" href="{{ route('roles.create') }}">Registrar Rol</a></li>
                                <li><a class="dropdown-item" href="/roles">Visualizar Roles</a></li>
                              </ul>
                            </li>
                        </ul>
                        @endif

                    </ul>



                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" style="color:#fff;" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                         <!-- <a class="nav-link" style="color:#fff;" href="{{ route('register') }}">{{ __('Register') }}</a> -->
                                </li>
                            @endif
                        @else

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle"  style="color:#fff;" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item"  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
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
