<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-180450376-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-180450376-1');
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TKKF') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @stack('scripts')

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/icofont.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/home/index.css') }}" rel="stylesheet">
    @stack('css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md">
            <div class="container">

                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{url('/images/logo-tkkf.png')}}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <i class="icofont-navigation-menu" style="color: white;"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="{{route('articles')}}" class="nav-link {{ (request()->is('artykuły*')) || (request()->is('artykuł*'))  ? 'active' : '' }}"><i class="icofont-ui-note mr-2"></i> Artykuły</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('season')}}" class="nav-link {{ (request()->is('sezon'))  ? 'active' : '' }}"> <i class="icofont-listing-number mr-2"></i> Tabela 2020/2021</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('seasonPast')}}" class="nav-link {{ (request()->is('sezon-*'))  ? 'active' : '' }}"> <i class="icofont-listing-number mr-2"></i>  Poprzedni sezon </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('documents')}}" class="nav-link {{ (request()->is('dokumenty'))  ? 'active' : '' }}"> <i class="icofont-download mr-2"></i>  Dokumenty </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('contact')}}" class="nav-link {{ (request()->is('kontakt'))  ? 'active' : '' }}"> <i class="icofont-ui-contact-list mr-2"></i>Kontakt</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="{{ route('login') }}">{{ __('Zaloguj się') }}</a>--}}
{{--                            </li>--}}
{{--                            @if (Route::has('register'))--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Zarejestruj się') }}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Twój profil <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('panel') }}">
                                        Twój profil
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Wyloguj') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')


        </main>
        <footer class="">

            <!-- Copyright -->
            <div class="">© 2020
                <a href="https://tkkfkrakow.pl/"> TKKF Kraków.</a>
                All rights reserved.
            </div>
            <!-- Copyright -->
        </footer>
    </div>

</body>
</html>
