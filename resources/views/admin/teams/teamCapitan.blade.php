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
                        <div class="logo-wrapper mr-3">
                            <div>
                                @if($team['logo'] != '')
                                <img src="{{Storage::url('images/teams/'.$team['logo'])}}" height="50px;" alt="">
                                @else
                                    <img height="50px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAJ1BMVEX////Ly8vIyMjR0dHd3d3o6Oj7+/vx8fHg4OD39/fa2trX19fr6+uWykArAAAFVElEQVR4nO2d6ZLiMAyESZyDJLz/8+4QyHBMgG7H0cHq+7lVS6ljW5JtyXM4BEEQBEEQ7MDQt82UqvpKldJ4bPtO26wyDG1zkVY9Mv/T1Pba9m2jO43VH2nPOqfW61h2bXqv7qYytdrGZnAC5S0iR1/TdWgYeVeRyY/GPtHyrhoHbdMhcvXNGkf7TmeLvlmjcZ8zTNv0nSUmy8N43KxvxqzH6asyAqv6qC1lnbGQvrPESVvMCsUG0KrEQivwJjFpK3piY4gwL3EoLW+WaGiinooP4EVioy1sofQSvEk0kt40ewn8kWgiES8YBVfQVnfYW2A9auvbWeCPRO0UdW+BlfY83c2L3tBNwtv9Bf5IVNwt9hICNeP+ICJQcxBl9CmuxO0HMrBEHYEiXuaqUCU9lVqEMyo7RUF9Ogm4QKi/Vyjva7Lm6HL7m4H8NE28uqppT31/ao/Undvy36VDIutH6/RwydvS547i3pQ0rzo9/wC9jIW3iZx9q9+fPpwTFdgxAutq3dN3nEDZhcgM4etjXU6i6FafGcJ3h7rU3kvU1TBD+DaOUScgkq6GsavcLwnGfCIWfkonKZ8so+4MbtPHtUOtaBFxZwj/8HliTYRCsXAx4jZ93vIQd1ZyGyj8qwPej5imYgERn6TQR8e/l5hCfJJCF7jEnP+Tve8EPoTQN8fjhZRCwpNCv4e7GimF8DcHT1aIZS2kED69AJ07oVDG0xDeHftB/ERLSCH+ycH7IkKhTMSHs2501RCzVCZrg8MX+sUJX7qvsgXUHPiLE1uxfZUtFLengX9QZgcMu1K4rBA/O5e56h7GBgQ9N8KXoZEKNxZz4bA4hCu13KDwBnzzZKGCLwdcoH4BXxZERuPU0RA7fKfLkDgu1TY1Dzxls9ok9Al8BJ1GQ6YYQNvWLJhLCzN9FxTMnYXLSUq12WgbmwNzi+/TkzJFVS7DPdVIZKiFDYa63rbR+8TBlcWZarTE4AQ6DBVk1Z6/ISRL/N0N4cCWlnobQrqu1Jkj5V89MdBgSdBl9Cp6SmeGnF5MRwdQfV6TlBc3Mxwz3wTxMUf7rP6Ki0Brc/T8PuCdb++Gvj0/t5fdPmTpWYyZrr7KSWlKqVp7J5FEW9EzpZuC7aVrhTsuzS3C0v165hbhgTodBLAYCYsKNOdlzhQVaDHUl+x8trllKhgsbAosGCyMCiTqt5wK5HufX2FVINWH9prapBedoTpnXws0mMksFHGlpq/RSrwraG83cc/2vNv6Q9eb8247r0C+YGOwqO2+jbzw5QO4Me+2vgJnNgSLlXdBLJKdd9eVvfOYVTLz7rqyHOMfyHKlrv4uSYa8ejIfIO5g8+766Vkl+zDBovYn78Dl3Y2nyfkL0XTuUh+Tdys9Y7kZPFhYPK1HwIfQTYR/5Pub7Mx1ZBcHz7u9LkO8ptlVEdcd+GsZLraCK6AC7d5JfKD4eyDmwIOF4UP7t8B5t8EKEgz84SGny5Bo59W2NBc4WHiN9/DlqNe0m3jxxGnajefdXne/eN7tdhmiebeDC6YXoK7UbdoN591ed79E3q1taS5w3u119wvn3W7Tbjjvdpt2H5oEom1oEARBEARBEARBEARBEARBkE+HHgYnD71baxB1pdqmZvL9daV4MZTXC264CcHtBXfpvzNnj6gr/cVrXSleDOX1ghv/S3peC9rwv6SnbWku319Xigp0+gc4mLpSr/Eed6Ve4z2ed2tbmgucd3uN93De7baAHa+c9Rrv8SYEr5WzeN6tbWkucLBwWzmLBgu3Gwv40R238R7Pu7UNzQYV6HZj0dUgbuN9EARBEARBEATB/8A/RPM4XilEn7EAAAAASUVORK5CYII=" alt="">
                                @endif
                            </div>
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

                            @if($team['information'] == '')
                                brak dodatkowych informacji
                            @else
                                {{$team['information']}}
                            @endif

                        </div>
                    </div>
                </div>

                <div class="table-name">
                    <div class="title">Zawodnicy</div>
                    <div class="table-action"><a href="{{route('zawodnik.create')}}"> <i class="icofont-ui-add mr-3"></i> Dodaj zawodnika</a>
                    </div>
                </div>
                <div class="table-wrapper ">
                    <table class="table table-responsive-lg">
                        <tbody>
                            <th>#</th>
                            <th></th>
                            <th>Imię i nazwisko</th>
                            <th>Data urodzenia</th>
                            <th></th>
                        </tbody>
                    @foreach($team['players'] as $key=>$player)
                        <tr>

                            <td><span style="margin-right: 20px;">{{$key+1}}.</span></td>
                            <td><div class="player-photo" style="background-image: url('{{Storage::url('images/players/'.$player['photo'])}}')"></div></td>
                            <td width="50%">
                                <span>{{$player['name']}}</span>
                            </td>
                            <td width="30%">{{$player['birth']}}</td>
                            <td width="20%" style="text-align: right"><a class="btn btn-primary" href="{{route('zawodnik.edit', $player['id'])}}">edytuj</a></td>
                        </tr>
                    @endforeach
                    </table>

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

