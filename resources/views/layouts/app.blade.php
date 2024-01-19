<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link rel="stylesheet" href="css/profile.css">


    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        .navbar-bg {
            background-color: #e10600;
        }
        img {
            width: 100px;
        }

        .nav-item {
            font-weight: bold;
        }
    </style>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-bg shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/home') }}">
                <img src="\images\Logo-f1.jpg" class="" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Coureurs
                        </a>

                        <div class="dropdown-menu dropdown-menu-begin" aria-labelledby="navbarDropdown">
                            <ul class="navbar-nav me-auto">
                                <li class="nav-item">
                                    <a class="dropdown-item" href="{{ route('indexProfiles') }}">
                                        Bekijken
                                    </a>
                                </li>

                            </ul>

                        </div>
                    </li>

                    <li class="nav-item">
                        <a id="navbar" class="nav-link" href="{{ route('teams') }}">
                            Teams
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a id="navbarDropdownScoreboard" class="nav-link dropdown-toggle" href="{{ route('trophies') }}" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Trofeeën
                        </a>

                        <div class="dropdown-menu dropdown-menu-begin" aria-labelledby="navbarDropdownScoreboard">
                            <ul class="navbar-nav me-auto">
                                <li class="nav-item">
                                    <a class="dropdown-item" href="{{ route('trophies') }}">
                                        Bekijken
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="dropdown-item" href="{{ route('addtrophy') }}">
                                        Toevoegen
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>










                    <li class="nav-item dropdown">
                        <a id="navbarDropdownScoreboard" class="nav-link dropdown-toggle" href="#" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Scoreboard
                        </a>

                        <div class="dropdown-menu dropdown-menu-begin" aria-labelledby="navbarDropdownScoreboard">
                            <ul class="navbar-nav me-auto">
                                <li class="nav-item">
                                    <a class="dropdown-item" href="{{ route('getScoreboards') }}">
                                        Bekijken
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="dropdown-item" href="{{ route('addscore.create')}}">
                                        Toevoegen
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a id="navbar" class="nav-link" href="{{ route('circuit') }}">
                            Circuits
                        </a>
                    </li>


                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
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
