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
                    <form method="post" action="{{ route('zawodnik.update', $player->id) }}">
                        @method('PATCH')
                        @csrf


                        <div class="form-group">
                            <label for="name">Imię:</label>
                            <input type="text" class="form-control" name="name" value="{{$player->name}}"/>
                        </div>
                        <div class="form-group">
                            <label for="surname">Naziwsko</label>
                            <input type="text" class="form-control" name="surname" value="{{$player->surname}}"/>
                        </div>
                        <div class="form-group">
                            <label for="photo">Zdjęcie nie chodzi</label>
                            <input type="file" disabled class="form-control" name="photo" id="photo"/>
                        </div>
                        <div class="form-group">
                            <label for="birth">Data urodzenia</label>
                            <input type="date" class="form-control" name="birth" value="{{$player->birth}}"/>
                        </div>
                        <div class="form-group">
                            <label for="team">Drużynaa:</label>
                            <select  class="form-control" name="team">
                                @foreach($teams as $team)
                                    {{$player}}
                                    @if($player->team_id === $team->id)

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
                                    @if($player->user_id === $user->id)
                                        <option value="{{$user->id}}" selected>{{$user->name}}</option>
                                    @else
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="user">Status:</label>
                            <select  class="form-control" name="status">
                                @if($player->status === 'niezweryfikowany')
                                    <option value="niezweryfikowany" selected >niezweryfikowany</option>
                                    <option value="zweryfikowany">zweryfikowany</option>
                                    <option value="odrzucony">odrzucony</option>
                                @elseif($player->status === 'zweryfikowany')
                                    <option value="niezweryfikowany">niezweryfikowany</option>
                                    <option value="zweryfikowany" selected>zweryfikowany</option>
                                    <option value="odrzucony">odrzucony</option>
                                @else
                                    <option value="niezweryfikowany">niezweryfikowany</option>
                                    <option value="zweryfikowany" >zweryfikowany</option>
                                    <option value="odrzucony" selected>odrzucony</option>
                                @endif


                            </select>
                        </div>


                        <button type="submit" class="btn btn-primary">Edytuj zawodnika</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
