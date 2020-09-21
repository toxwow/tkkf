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
                <div class="alert alert-danger fade hide alert-custom" role="alert">
                    Błąd usuwania ligi. Przed usunięciem ligi upewnij się, że nie znajdują się w niej drużyny.
                    <button type="button" class="close alert-hide" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
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
                            <p class="title">Ligi i drużyny</p>
                            <p class="sub-title">Panel do zarządzania ligami i drużynami</p>
                        </div>
                    </div>

                    <div class="content-add d-flex align-items-center">
                        <div class="form-group mb-0 mr-4">
                            <select type="email" class="form-control" id="selectLeague" aria-describedby="emailHelp" placeholder="Enter email">
                                <option value="all">Wszystkie ligi</option>
                                @foreach($leagues as $league)
                                    <option value="{{$league->id}}">{{$league->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <a href="{{route('liga.create')}}">
                            <i class="icofont-plus mr-2"></i> dodaj ligę
                        </a>

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
                            <div class="d-flex">
                                <a class="btn btn-success mr-2" href="{{route('druzyna.create','league='.$league->id)}}"><i class="icofont-plus"></i></a>
                                <div class="dropdown">
                                    <button class="btn btn-info" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #fff;">
                                        <i class="icofont-settings-alt"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{ route('liga.edit', $league->id)}}">Edytuj ligę</a>
                                        @if(empty($league->team[0]))
                                            @csrf
                                            <a class="dropdown-item deleteLeague" style="cursor: pointer" data-id="{{ $league->id }}">Usuń ligę</a>
                                        @else
                                            <a class="dropdown-item deleteLeagueErorr" style="cursor: pointer" data-id="{{ $league->id }}">Usuń ligę</a>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">

                        @foreach($league->team as $team)
                            {{--modal--}}
                            <div class="modal fade" id="modal-{{$team->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Kontakt {{$team->name}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @php $capitanTeam = $user->find($team->capitan);  @endphp
                                            @if(empty($capitanTeam))
                                                brak danych kontaktowych
                                            @else
                                            <div class="ml-3" style="color: #212529">
                                                <p style="font-size: 1.2rem"><i class="icofont-address-book" style="color: #4099ff"></i> {{$capitanTeam->name}} {{$capitanTeam->surname}}</p>
                                                <p style="font-size: 1.2rem"><i class="icofont-mobile-phone" style="color: #4099ff"></i> {{$capitanTeam->phone}}</p>
                                                <p style="font-size: 1.2rem; margin-bottom: 0;"><i class="icofont-email" style="color: #4099ff"></i> {{$capitanTeam->email}}</p>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--end modal--}}

                            <tr>
                                <td scope="col">
                                    <div class="d-flex justify-content-between align-items-center" >
                                        <span style="font-size: 18px;">{{$team->name}}</span>


                                        <div class="d-flex align-items-center">

                                            <button class="btn btn-primary " id="team-click-{{$team->id}}"><i class="icofont-users"></i></button>
                                            <button type="button" class="btn btn-outline-secondary mx-2"  data-toggle="modal" data-target="#modal-{{$team->id}}">
                                                <i class="icofont-phone"></i>
                                            </button>
                                            <button class="btn btn-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #fff;">
                                                <i class="icofont-settings-alt"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="{{ route('druzyna.edit',$team->id)}}">Edytuj drużynę</a>
                                                @if(empty($team->players[0]))
                                                    @csrf
                                                    <a class="dropdown-item deleteTeam"  style="cursor: pointer" data-id="{{ $team->id }}" >Usuń drużynę</a>

                                                @else
                                                    <a class="dropdown-item deleteTeamError"  style="cursor: pointer" >Usuń drużynę</a>
                                                @endif
                                            </div>
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
                                                    @if($player->status === 'odrzucony')
                                                        <a href="{{ route('zawodnik.edit', $player -> id)}}" class="btn btn-danger mr-2">odrzucony</a>
                                                    @endif
                                                    <a href="{{ route('zawodnik.edit', $player -> id)}}" class="btn btn-primary mr-3"><i class="icofont-edit"></i></a>
                                                    @csrf
                                                    <a class="btn btn-danger deletePlayer" data-id="{{ $player->id }}"><i class="icofont-delete-alt"></i></a>
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
                <div class="table-resposnive">
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
    </div>

@endsection

