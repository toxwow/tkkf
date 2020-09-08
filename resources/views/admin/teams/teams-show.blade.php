@extends('layouts.admin')
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
            <div class="col-12 mb-3">
                <div class="content-header">
                    <div class="content-title">
                        <div class="icon-wrapper">
                            <i class="icofont-users"></i>
                        </div>
                        <div class="text-wrapper">
                            <p class="title">Drużyna {{$team['team']}}</p>
                            <p class="sub-title">{{$team['team_league']}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="card-box">
                    <p class="title">Kapitan</p>
                    <div class="content">
                        <p class="item"><a href="{{route('uzytkownicy.show', $team['capitan_id'] )}}"><span>Imię i naziwsko:</span> {{$team['capitan']}}</a></p>
                        <p class="item"><span>Adres email:</span> {{$team['email']}}</p>
                        <p class="item"><span>Telefon:</span> {{$team['phone']}}</p>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card-box">
                    <p class="title">Informacje</p>
                    <div class="content">
                        <p class="item"><span>Adres hali:</span> {{$team['address']}}</p>
                        <p class="item"><span>Dzień i godzina:</span> {{$team['date']}}</p>
                        <p class="item"><span>Dodatkowe informacje:</span> {{$team['information']}}</p>
                    </div>
                </div>
            </div>

            <div class="col-12">
                    <div class="table-wrapper mt-5">
                        <div class="league-name">
                            <div class="text-center">
                                <p class="mb-0">Zawodnicy</p>
                            </div>
                        </div>
                        <table class="table table-striped table-responsive-md">
                            <tbody>
                            <th></th>
                            <th>Imię i nazwisko</th>
                            <th>Data urodzenia</th>
                            </tbody>
                            @if(empty($team['players']))
                                <tr>
                                    <td colspan="3" style="text-align: center">Brak zawodników</td>
                                </tr>
                            @else
                            @foreach($team['players'] as $key => $player)
                                <tr>
                                    <td style=" vertical-align: middle;"><img src="{{ Storage::url('images/players/'.$player['photo']) }}" alt="" width="50px"></td>
                                    <td style=" vertical-align: middle;">{{$player['name']}} {{$player['surname']}}</td>
                                    <td style=" vertical-align: middle;">{{$player['birth']}}</td>
                                </tr>
                            @endforeach
                            @endif
                        </table>

                    </div>
            </div>

    </div>

@endsection

