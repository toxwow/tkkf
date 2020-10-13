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
                            <p class="title">Dodaj drużyne</p>
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
                    <form method="post" action="{{ route('druzyna.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="league_id">Liga:</label>
                            <select class="form-control" name="league_id" id="league_id">
                                @foreach($league as $value)
                                    @if($league_selected == $value->id)
                                        <option value="{{$value->id}}" selected>{{$value->name}}</option>
                                    @else
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endif
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="name">Nazwa druzyny:</label>
                            <input type="text" class="form-control" name="name"/>
                        </div>


                        <div class="form-group">
                            <label for="capitan">Kapitan:</label>
                            <select class="form-control" name="capitan" id="capitan">

                                @foreach($usersTeams as $key => $usersTeam)
                                    @if($usersTeam['team'] == 'brak' &&  $usersTeam['role'] != 'admin')
                                    <option value="{{$key}}">{{$key.'. '. $usersTeam['name']}}</option>
                                    @else
                                        <option disabled value="{{$key}}">{{$key.'. '. $usersTeam['name']}} | {{$usersTeam['team']}}</option>
                                    @endif
                                @endforeach
                                    <option id="addUserOption" value=" " class="addUser-option">Brak użytkownika? Dodaj go w panelu użytkownicy</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="address">Adres:</label>
                            <input type="text" class="form-control" name="address"/>
                        </div>

                        <div class="form-group">
                            <label for="time">Dzień i godzina hali:</label>
                            <input type="text" class="form-control" name="time"/>
                        </div>
                        <div class="form-group">
                            <label for="information">Dodatkowe informacje:</label>
                            <textarea type="text" class="form-control" name="information"></textarea>
                        </div>


                        <button type="submit" class="btn btn-primary w-100">Dodaj druzyne</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
