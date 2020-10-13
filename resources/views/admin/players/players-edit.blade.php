@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <div class="content-header">
                    <div class="content-title">
                        <div class="icon-wrapper">
                            <i class="icofont-user"></i>
                        </div>
                        <div class="text-wrapper">
                            <p class="title">Edytuj zawodnika</p>
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
