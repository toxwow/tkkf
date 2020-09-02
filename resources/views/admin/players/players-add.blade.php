@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="{{route('panel')}}">panel</a>
            <a href="{{route('zawodnik.index')}}">zawodnicy</a>
           <h2>Dodaj zawodnika</h2>
                        <div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div><br />
                            @endif
                            <form method="post" action="{{ route('zawodnik.store') }}" enctype="multipart/form-data">
                                @csrf


                                <div class="form-group">
                                    <label for="name">Imię:</label>
                                    <input type="text" class="form-control" name="name"/>
                                </div>
                                <div class="form-group">
                                    <label for="surname">Naziwsko</label>
                                    <input type="text" class="form-control" name="surname"/>
                                </div>
                                <div class="form-group">
                                    <label for="photo">Zdjęcie</label>
                                    <input type="file" class="form-control" name="photo"/>
                                </div>
                                <div class="form-group">
                                    <label for="birth">Data urodzenia</label>
                                    <input type="date" class="form-control" name="birth"/>
                                </div>
                                <div class="form-group">
                                    <label for="team">Drużyna:</label>
                                    <select  class="form-control" name="team">
                                        @foreach($teams as $team)
                                            @if($selectTeam == $team->id)
                                                <option value="{{$team->id}}" selected>{{$team->name}}</option>
                                            @else
                                                <option value="{{$team->id}}">{{$team->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="user">Przypisz użytkownika:</label>
                                    <select  class="form-control" name="user">
                                        <option value="">Brak w bazie</option>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Dodaj zawodnika</button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
@endsection
