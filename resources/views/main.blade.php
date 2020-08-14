<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">
    </head>
    <body>
    <nav class="navbar navbar-light bg-white">
        <a class="navbar-brand">Navbar</a>
        @if (Route::has('login'))
                @auth
                    <a href="{{ url('/home') }}">Twój profil</a>
                @else
                    <a href="{{ route('login') }}">Zaloguj się</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Zarejestruj się</a>
                    @endif
                @endauth
        @endif
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if (Route::has('login'))
                            @auth
                                Jesteś zalogowany jako: {{$user -> name}} <br>
                                Twoje uprawnienia to: {{$user -> role}}
                            @else
                                Nie jesteś zalogowany
                                <a href="{{ route('login') }}">Zaloguj się</a>
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-6">
                    Artykuly
                </div>
            </div>
        </div>
    </body>
</html>
