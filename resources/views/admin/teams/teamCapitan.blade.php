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
            <div class="col-12 mb-1">
                <div class="content-header">
                    <div class="content-title">
                        <div class="icon-wrapper">
                            <i class="icofont-users"></i>
                        </div>
                        <div class="text-wrapper">
                            <p class="title">Drużyna {{$team['name']}}</p>
                            <p class="sub-title">{{$team['league']}}</p>
                        </div>
                    </div>
                    <div class="content-add">
                        <a href="{{route('druzyna.edit', $team['id'] )}}">
                            <i class="icofont-edit mr-2"></i> edytuj informacje
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-around d">
                    <div class="card-box mr-2 flex-fill">
                        <div class="text-center"><i class="icofont-info-circle mr-2" style="color: #4099ff"></i>
                            @if($team['address'] == '')
                            uzupełnij dane
                            @else
                                {{$team['address']}}
                            @endif
                        </div>
                    </div>
                    <div class="card-box ml-2 flex-fill">
                        <div class="text-center"><i class="icofont-clock-time mr-2" style="color: #4099ff"></i>

                            @if($team['date'] == '')
                                uzupełnij dane
                            @else
                                {{$team['date']}}
                            @endif

                        </div>
                    </div>
                    <div class="card-box ml-2 flex-fill">
                        <div class="text-center"><i class="icofont-clock-time mr-2" style="color: #4099ff"></i>

                            @if($team['date'] == '')
                                mecze do przełożenia: {{$team['shifts']}}
                            @else
                                {{$team['date']}}
                            @endif

                        </div>
                    </div>
                </div>
                <div class="table-wrapper mt-5">
                    <div class="league-name">
                        <div class="text-center">
                                <p class="mb-0">Zawodnicy</p>
                        </div>
                    </div>
                    <table class="table table-striped table-responsive-lg">
                        <tbody>
                            <th>#</th>
                            <th></th>
                            <th>Imię i nazwisko</th>
                            <th>Data urodzenia</th>
                            <th>Status</th>
                        </tbody>
                    @foreach($team['players'] as $key => $player)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td class="with-input">
                                <div class="img-wrapper" style="background-image: url('{{Storage::url('images/players/'.$player['photo'])}}')">
                                    <a class="mask-edit" href="{{route('zawodnik.edit', $player['id'])}}">
                                        <i class="icofont-ui-image"></i>
                                        edytuj zdjęcie</a>

                                </div>

                            <td>{{$player['name']}}</td>
                            <td>{{$player['birth']}}</td>
                            <td>{{$player['status']}}</td>
                        </tr>
                    @endforeach
                    </table>

                </div>
                <div class="player-wrapper add">
                    <a href="{{route('zawodnik.create')}}">dodaj zawodnika</a>
                </div>

{{--                @foreach($leagues as $league)--}}

{{--                <div class="table-wrapper mb-4 leagueTable" id="league-{{$league->id}}" >--}}

{{--                    <div class="league-name">--}}
{{--                        <div class="d-flex align-items-center justify-content-between" >--}}
{{--                            <div>--}}
{{--                                {{$league->name}}--}}
{{--                            </div>--}}
{{--                            <div class="dropdown">--}}
{{--                                <button class="btn btn-info" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #fff;">--}}
{{--                                    <i class="icofont-settings-alt"></i>--}}
{{--                                </button>--}}
{{--                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
{{--                                    <a class="dropdown-item" href="{{route('druzyna.create','league='.$league->id)}}">Dodaj drużyne do ligi</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <table class="table table-striped">--}}

{{--                    @foreach($league->team as $team)--}}

{{--                        <tr>--}}
{{--                            <td scope="col">--}}
{{--                                <div class="d-flex justify-content-between align-items-center" >--}}
{{--                                    <span style="font-size: 18px;">{{$team->name}}</span>--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                        <span style="cursor: pointer" id="team-click-{{$team->id}}">Pokaż zawodników</span>--}}
{{--                                        <a href="{{ route('druzyna.edit',$team->id)}}" class="btn btn-primary mx-3"><i class="icofont-ui-edit"></i></a>--}}
{{--                                        <form action="{{ route('druzyna.destroy', $team->id)}}" method="post">--}}
{{--                                            @csrf--}}
{{--                                            @method('DELETE')--}}
{{--                                            <button class="btn btn-danger" type="submit"><i class="icofont-delete-alt"></i></button>--}}
{{--                                        </form>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="mt-2" id="team-wrapper-{{$team->id}}" style="display: none;">--}}
{{--                                    @foreach($team->players as $key => $player)--}}
{{--                                        @if($key % 2 == 0)--}}
{{--                                        <div class="player-wrapper" style="background-color: rgba(0, 0, 0, 0.05)">--}}
{{--                                        @else--}}
{{--                                        <div class="player-wrapper" style="background-color: rgba(0, 0, 0, 0.10)">--}}
{{--                                        @endif--}}
{{--                                        <div class="d-flex justify-content-between align-items-center">--}}
{{--                                            <div>--}}
{{--                                                {{$key+1}}. {{$player->name}} {{$player->surname}}--}}
{{--                                            </div>--}}
{{--                                            <div class="d-flex">--}}
{{--                                                <a href="{{ route('zawodnik.edit', $player -> id)}}" class="btn btn-primary mr-3"><i class="icofont-edit"></i></a>--}}
{{--                                                <form action="{{ route('zawodnik.destroy', $player -> id)}}" method="post">--}}
{{--                                                    @csrf--}}
{{--                                                    @method('DELETE')--}}
{{--                                                    <button class="btn btn-danger" type="submit"><i class="icofont-delete-alt"></i></button>--}}
{{--                                                </form>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}
{{--                                        <div class="player-wrapper add">--}}
{{--                                            <a href="{{route('zawodnik.create', 'team='.$team->id)}}">dodaj zawodnika {{$team -> name}}</a>--}}
{{--                                        </div>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}

{{--                    @endforeach--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--                @endforeach--}}
            </div>
        </div>
    </div>

@endsection

