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
    {{-- <script src="{{ asset('js/custom.js') }}"></script> --}}
    @yield('scripts')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!-- Styles -->
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>

<body>
    <header id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <a class="navbar-brand ml-5 pl-5" href="#">
                <img src="{{ asset('svg/logo.png') }}" width="40" height="40" alt="MOPAVIV">
            </a>
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto"></ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                        <li class="nav-item active"><a class="nav-link" href="{{ url('/') }}">Inicio</a></li>
                        <li class="nav-item active"><a class="nav-link" href="{{ url('/blog') }}">Blog</a></li>
                        <li class="nav-item active"><a class="nav-link" href="{{ url('/donar')}}">Donar</a></li>

                        @guest
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                            @if (auth()->user()->isAdmin())
                                <li class="nav-item active"><a class="nav-link" href=" {{ route('tags.index') }}">Etiquetas</a></li>
                                <li class="nav-item active"><a class="nav-link" href=" {{ route('categories.index') }}">Categorías</a>
                                </li>
                                <li class="nav-item active"><a class="nav-link" href=" {{ route('posts.index') }}">Posts</a></li>
                            @endif
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        {{-- Errors message  --}}

        @if ($errors->any())
        <div class="container mt-3">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="alert alert-danger">
                        <p><strong>Por favor corrige los siguientes errores:</strong></p>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Alert message -->
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">

                    {!! Alert::render() !!}

                </div>
            </div>
        </div>
        <!-- Alert message -->
        
    </header>

    <main class="wrapper">
        @yield('content')
    </main>

    <footer class="footer bg-primary">
        <!-- NABVAR BOOTM-->
        <div class="container d-flex justify-content-center flex-wrap  my-3 pt-2 pb-3 ">
            <!--<ul class="list-inline ">-->
            <li class="list-inline-item mx-5 mt-3 "><a class="text-decoration-none text-white" href="{{ url('/') }}">Inicio</a></li>
            <li class="list-inline-item mx-5 mt-3 "><a class="text-decoration-none text-white" href="{{ url('/blog') }}">Blog</a></li>
            <li class="list-inline-item mx-5 mt-3 "><a class="text-decoration-none text-white" href="{{ url('/donar')}}">Donar</a></li>
            <li class="list-inline-item mx-5 mt-3 "><a class="text-decoration-none text-white" href="#">Contacto</a></li>
    
            <!--</ul>-->
        </div>
        <!-- NABVAR BOOTM-->
    
        <!-- SOCIAL NETWORKS-->
        <div class=" row">
            <div class="container col-8  d-flex justify-content-center flex-wrap text-center">
                <div class="col-sm-2 m-2 h2 ">
                    <a class="text-decoration-none text-white" href="https://www.facebook.com/profile.php?id=100008575572134"><i class="fab fa-facebook"></i></a>
                </div>
                <div class="col-sm-2 m-2 h2 ">
                    <a class="text-decoration-none text-white" href=""><i class="fab fa-instagram"></i></a>
                </div>
                <div class="col-sm-2 m-2 h2 ">
                    <a class="text-decoration-none text-white" href=""><i class="fab fa-youtube"></i></a>
                </div>
                <div class="col-sm-2 m-2 h2 ">
                    <a class="text-decoration-none text-white" href=""><i class="fas fa-envelope"></i></a>
                </div>
    
            </div>
            <div class="container mt-5">
                <p class="mb-2 text-center text-white">Motivar para Vivir © 2019 Todos los derechos reservados.</p>
            </div> 
        </div> 
    </footer>
</body>

</html>