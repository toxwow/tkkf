@extends('layouts.admin')
@push('scripts')
    <script src="{{ asset('js/admin/teams.js') }}" defer></script>
@endpush
@push('style')
    <link href="{{ asset('css/admin/teams.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if(session()->get('success'))
                    <div class="alert alert-success mb-4">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
                <div class="content-header">
                    <div class="content-title">
                        <div class="icon-wrapper">
                            <i class="icofont-users"></i>
                        </div>
                        <div class="text-wrapper">
                            <p class="title">Drużyny</p>
                            <p class="sub-title">lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <select type="email" class="form-control" id="selectLeague" aria-describedby="emailHelp" placeholder="Enter email">
                            <option value="all">Wszystkie ligi</option>
                            @foreach($leagues as $league)
                                <option value="{{$league->id}}">{{$league->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">

                @foreach($leagues as $league)

                <div class="table-wrapper mb-4 leagueTable" id="league-{{$league->id}}" >

                    <div class="league-name">
                        <div class="d-flex align-items-center justify-content-between" >
                            <div>
                                {{$league->name}}
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-info" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #fff;">
                                    <i class="icofont-settings-alt"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{route('druzyna.create','league='.$league->id)}}">Dodaj drużyne do ligi</a>
                                    <a class="dropdown-item" href="">
                                        <form action="{{ route('liga.destroy', $league->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item" style="text-align: left; display: contents;" type="submit">Usuń ligę</button>
                                        </form></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped">

                    @foreach($league->team as $team)

                        <tr>
                            <td scope="col">
                                <div class="d-flex justify-content-between align-items-center" >
                                    <span style="font-size: 18px;">{{$team->name}}</span>
                                    <div class="d-flex align-items-center">
                                        <span style="cursor: pointer" id="team-click-{{$team->id}}">Pokaż zawodników</span>
                                        <a href="{{ route('druzyna.edit',$team->id)}}" class="btn btn-primary mx-3"><i class="icofont-ui-edit"></i></a>
                                        <form action="{{ route('druzyna.destroy', $team->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit"><i class="icofont-delete-alt"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="mt-2" id="team-wrapper-{{$team->id}}" style="display: none;">
                                    @foreach($team->players as $key => $player)
                                        @if($key % 2 == 0)
                                        <div class="player-wrapper" style="background-color: rgba(0, 0, 0, 0.05)">
                                        @else
                                        <div class="player-wrapper" style="background-color: rgba(0, 0, 0, 0.10)">
                                        @endif
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                {{$key+1}}. {{$player->name}} {{$player->surname}}

                                            </div>
                                            <div class="d-flex">
                                                @if($player->status === 'niezweryfikowany')
                                                    <a href="{{ route('zawodnik.edit', $player -> id)}}" class="btn btn-dark mr-2">niezweryfikowany</a>
                                                @endif
                                                <a href="{{ route('zawodnik.edit', $player -> id)}}" class="btn btn-primary mr-3"><i class="icofont-edit"></i></a>
                                                <form action="{{ route('zawodnik.destroy', $player -> id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit"><i class="icofont-delete-alt"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                        </div>
                                    @endforeach
                                        <div class="player-wrapper add">
                                            <a href="{{route('zawodnik.create', 'team='.$team->id)}}">dodaj zawodnika {{$team -> name}}</a>
                                        </div>
                                </div>
                            </td>
                        </tr>

                    @endforeach
                    </table>
                </div>
                @endforeach
                    <div class="table-wrapper mb-4 leagueTable" id="league-empty" >

                        <div class="league-name">
                            <div class="d-flex align-items-center justify-content-between" >
                                <div>
                                    Nieprzypisane drużyny
                                </div>
                            </div>
                        </div>
                <table class="table table-striped">
                @foreach($emptyTeams as $teams)
                        <tr>
                        <td scope="col">
                            <div class="d-flex justify-content-between align-items-center" >
                                <span style="font-size: 18px;">{{$teams->name}}</span>
                                <div class="d-flex align-items-center">
                                    <a href="{{ route('druzyna.edit',$teams->id)}}" class="btn btn-primary mx-3"><i class="icofont-ui-edit"></i></a>
                                    <form action="{{ route('druzyna.destroy', $teams->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit"><i class="icofont-delete-alt"></i></button>
                                    </form>
                                </div>
                            </div>
                        </td>
                        </tr>
                @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection

