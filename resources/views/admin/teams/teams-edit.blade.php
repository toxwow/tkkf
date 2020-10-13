@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <div class="content-header">
                    <div class="content-title">
                        <div class="icon-wrapper">
                            <i class="icofont-team"></i>
                        </div>
                        <div class="text-wrapper">
                            <p class="title">Edytuj drużyne</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <form method="post" action="{{ route('druzyna.update', $team->id) }}">
                        @method('PATCH')
                        @csrf


                    <div class="form-group">
                            <label for="name">Nazwa druzyny:</label>
                            <input type="text" class="form-control" name="name" value="{{$team->name}}"/>
                        </div>

                        <div class="form-group">

                            <label for="league_id">Liga:</label>
                                <select class="form-control" name="league_id" id="league_id">
                                @foreach($league as $value)
                                    @if($value->id === $team->leauge_id)
                                    <option selected value="{{$value->id}}">{{$value->name}} </option>
                                    @else
                                            <option selected value="{{$value->id}}">{{$value->name}} </option>
                                        @endif
                                @endforeach
                                <option value="">Nieprzypisana drużyna</option>
                            </select>
                            @if(!$matchStatus)
                             <small class="form-text text-muted">Nie zmieniaj ligi dopóki drużyna rozegrała mecz. Usuń wszystkie jej mecze i spróbuj ponownie</small>
                            @endif

                        </div>
                        <div class="form-group">
                            <label for="shifts">Liczba przełożonych meczy:</label>
                            <input type="number" class="form-control" name="shifts" value="{{$team->shifts}}"/>
                        </div>

                        <div class="form-group">
                            <label for="address">Adres:</label>
                            <input type="text" class="form-control" name="address" value="{{$team->address}}"/>
                        </div>

                        <div class="form-group">
                            <label for="time">Dzień i godzina hali:</label>
                            <input type="text" class="form-control" name="time" value="{{$team->time}}"/>
                        </div>
                        <div class="form-group">
                            <label for="information">Dodatkowe informacje:</label>
                            <textarea type="text" class="form-control" name="information">{{$team->information}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="capitan">Kapitan:</label>
                            <select class="form-control" name="capitan" id="capitan">

                                @foreach($usersTeams as $key => $usersTeam)
                                    @if($usersTeam['team'] == 'brak' &&  $usersTeam['role'] != 'admin')
                                        <option value="{{$key}}">{{$key.'. '. $usersTeam['name']}}</option>
                                    @else
                                        @if($team->name === $usersTeam['team'])
                                            <option readonly selected value="{{$key}}">{{$key.'. '. $usersTeam['name']}} | {{$usersTeam['team']}}</option>
                                        @else
                                            <option disabled value="{{$key}}">{{$key.'. '. $usersTeam['name']}} | {{$usersTeam['team'],  $team->name}}</option>
                                        @endif
                                    @endif
                                @endforeach
                                <option id="addUserOption" class="addUser-option">Brak użytkownika? Dodaj go w panelu użytkownicy</option>

                            </select>
                        </div>

                    <button type="submit" class="btn btn-primary w-100">Zakutalizuj</button>
                </form>
            </div>
        </div>
    </div>
@endsection
