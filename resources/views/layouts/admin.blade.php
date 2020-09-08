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
    <link href="{{ asset('css/icons/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/layout.css') }}" rel="stylesheet">
    @stack('style')

</head>
<body>
    <div id="app" class="layout-admin">
        <div class="left-panel">
            <div class="header">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>
            <div class="items-menu">
                <ul>

                    <li class="">
                        <a href="{{route('panel')}}" class="{{ (request()->is('panel')) ? 'active' : '' }}"><i class="icofont-home mr-2"></i> <span>Home</span></a>
                    </li>
                    @if($user -> isAdmin())
                    <li>
                        <a href="{{route('artykuly.index')}}" class="{{ (request()->is('artykuly*')) || (request()->is('dodaj-artykul'))  ? 'active' : '' }}"><i class="icofont-newspaper mr-2"></i> <span>Artykuły</span></a>
                    </li>
                    @endif
                    <li>
                        <a href="{{route('liga.index')}}" class="{{ (request()->is('liga')) ? 'active' : '' }}"><i class="icofont-listing-number mr-2"></i> <span>Tabela</span></a>
                    </li>
                    <li>
                        <a href="{{route('druzyna.index')}}" class="{{ (request()->is('druzyna')) ? 'active' : '' }}"><i class="icofont-users mr-2"></i>
                            @if($user -> isAdmin())
                            <span>Ligi i drużyny</span>
                            @elseif($user -> isCapitan())
                                <span>Twoja drużyna</span>
                            @endif
                        </a>
                    </li>
                    <li>
                        <a href="{{route('mecze.index')}}" class="{{ (request()->is('mecze')) ? 'active' : '' }}"><i class="icofont-score-board mr-2"></i>
                            @if($user -> isAdmin())
                                <span>Mecze</span>
                            @elseif($user -> isCapitan())
                                <span>Twoje mecze</span>
                            @endif</a>
                    </li>
                    @if($user -> isAdmin())
                        <li>
                            <a href="{{route('uzytkownicy.index')}}" class="{{ (request()->is('uzytkownicy*'))  ? 'active' : '' }}"><i class="icofont-user mr-2"></i> <span>Użytkownicy</span></a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        <nav class="navbar navbar-expand-md">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
{{--                            <li class="nav-item icon alarm">--}}
{{--                                <i class="icofont-alarm"></i>--}}
{{--                            </li>--}}
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="{{asset('images/admin/user-icon.png')}}" class="mr-2" alt="">{{ Auth::user()->name }} {{ Auth::user()->surname }} <i class="icofont-caret-down"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('uzytkownicy.show', $user->id) }}">
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
        </nav>
        <main>
            @yield('content')

        </main>
    </div>
    @stack('scripts')
</body>
</html>
