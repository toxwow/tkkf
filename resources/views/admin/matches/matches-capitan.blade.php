@extends('layouts.admin')
@push('scripts')
{{--    <script src="{{ asset('js/index.js') }}" defer></script>--}}
<script src="{{ asset('js/admin/shift.js') }}" defer></script>


@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
                <div class="content-header">
                    <div class="content-title">
                        <div class="icon-wrapper">
                            <i class="icofont-newspaper"></i>
                        </div>
                        <div class="text-wrapper">
                            <p class="title">Mecze drużyny {{$selectTeam[0]->name}}</p>
                            <p class="sub-title">Twoje wszystkie mecze w {{$selectTeam[0]->league}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-name">
                    <div class="title  table-tabs table-action" style="cursor: pointer" id="reffil">Wyniki do wprowedzania <span class="badge badge-danger badge-pill" id="badgeReffil"></span></div>
                    <div class="table-tabs table-action" style="cursor: pointer" id="future">Nieodbyte mecze <span class="badge badge-secondary badge-pill" id="badgeFuture"></span></div>
                    <div class="table-tabs table-action" style="cursor: pointer" id="past">Odbyte mecze <span class="badge badge-info badge-pill" id="badgePast"></span></div>
                </div>
                <div class="table-wrapper">
                    <div id="reffilMatch">
                        <table class="table table-striped table-responsive-lg">
                            <thead>
                            <tr>
                                <td>Drużyna gospodarzy</td>
                                <td>Wynik</td>
                                <td>Drużyna gości</td>
                                <td>Data</td>
                                <td>Status</td>
                            </tr>
                            </thead>
                            @foreach($matches as $match)
                                @if( ($today >= $match->date) && $match->status === 'nieodbyty' || $match->status === 'niezaakceptowany')
                                <tr class="reffilRow">
                                    <td><a href="{{route('druzyna.show', $match->home_team)}}">{{$teams->find($match->home_team)->name}}</a></td>
                                    <td>
                                        @if(($match->home_team_score == '' && $match->enemy_team_score == ''))
                                            @if($match->home_team === $selectTeam[0]->id && ($today >= $match->date) && $match->status === 'nieodbyty')
                                                <a class="btn btn-danger" href="{{ route('mecze.edit', $match->id)}}"> Wprowadź wynik</a>

                                            @else
                                                Czekam na wynik
                                            @endif
                                        @else
                                            {{$match->home_team_score}} : {{$match->enemy_team_score}}
                                            @if($match->status == 'niezaakceptowany')
                                                @if($match->home_team === $selectTeam[0]->id)
                                                    <br>
                                                    <a class="btn-link" href="{{ route('mecze.edit', $match->id)}}"> Zmień wynik</a>
                                                @endif
                                            @endif
                                        @endif
                                    </td>
                                    <td><a href="{{route('druzyna.show', $match->enemy_team)}}">{{$teams->find($match->enemy_team)->name}}</a></td>
                                    <td>{{$match->date}}</td>
                                    <td width="20%">

                                        @if($match->home_team === $selectTeam[0]->id && ($today > $match->date) && $match->status === 'nieodbyty' )
                                            Czekam na wprowadzenie wyniku
                                        @elseif($match->enemy_team === $selectTeam[0]->id && ($today > $match->date) && $match->status === 'nieodbyty' )
                                            Czekam na wprowadzenie wyniku przez zespół przeciwny
                                        @elseif($match->status === 'niezaakceptowany')
                                            W trakcie weryfikacji...
                                        @elseif( $match->status === 'zaakceptowany')
                                            Wynik meczu zaakceptowany
                                        @else($match->status === 'nieodbyty')
                                            Czekam na mecz
                                        @endif
                                    </td>
                                </tr>
                            @else

                                @endif
                            @endforeach
                        </table>
                    </div>
                    <div id="futureMatch" style="display: none">
                        <table class="table table-striped table-responsive-lg">
                            <thead>
                            <tr>
                                <td>Drużyna gospodarzy</td>
                                <td>Wynik</td>
                                <td>Drużyna gości</td>
                                <td>Data</td>
                                <td>Status</td>
                            </tr>
                            </thead>
                            @foreach($matches as $match)
                                @if( ($today < $match->date) && $match->status === 'nieodbyty')
                                    <tr class="futureRow">
                                        <td><a href="{{route('druzyna.show', $match->home_team)}}">{{$teams->find($match->home_team)->name}}</a></td>
                                        <td>
                                            @if(($match->home_team_score == '' && $match->enemy_team_score == ''))
                                                @if($match->home_team === $selectTeam[0]->id && ($today >= $match->date) && $match->status === 'nieodbyty')
                                                    <a href="{{ route('mecze.edit', $match->id)}}"> Wprowadź wynik</a>

                                                @else
                                                    Czekam na wynik
                                                @endif
                                            @else
                                                {{$match->home_team_score}} : {{$match->enemy_team_score}}
                                                @if($match->status == 'niezaakceptowany')
                                                    @if($match->home_team === $selectTeam[0]->id)
                                                        <br>
                                                        <a href="{{ route('mecze.edit', $match->id)}}"> Zmień wynik</a>
                                                    @endif
                                                @endif
                                            @endif
                                        </td>
                                        <td><a href="{{route('druzyna.show', $match->enemy_team)}}">{{$teams->find($match->enemy_team)->name}}</a></td>
                                        <td>{{$match->date}}</td>
                                        <td width="20%">

                                            @if($match->home_team === $selectTeam[0]->id && ($today > $match->date) && $match->status === 'nieodbyty' )
                                                Czekam na wprowadzenie wyniku
                                            @elseif($match->enemy_team === $selectTeam[0]->id && ($today > $match->date) && $match->status === 'nieodbyty' )
                                                Czekam na wprowadzenie wyniku przez zespół przeciwny
                                            @elseif($match->status === 'niezaakceptowany')
                                                W trakcie weryfikacji...
                                            @elseif( $match->status === 'zaakceptowany')
                                                Wynik meczu zaakceptowany
                                            @else($match->status === 'nieodbyty')
                                                Czekam na mecz
                                            @endif
                                        </td>
                                    </tr>
                                @else

                                @endif
                            @endforeach
                        </table>
                    </div>
                    <div id="pastMatch" style="display: none">
                        <table class="table table-striped table-responsive-lg">
                            <thead>
                            <tr>
                                <td>Drużyna gospodarzy</td>
                                <td>Wynik</td>
                                <td>Drużyna gości</td>
                                <td>Data</td>
                                <td>Status</td>
                            </tr>
                            </thead>
                            @foreach($matches as $match)
                                @if( $match->status === 'zaakceptowany')
                                    <tr class="pastRow">
                                        <td><a href="{{route('druzyna.show', $match->home_team)}}">{{$teams->find($match->home_team)->name}}</a></td>
                                        <td>
                                            @if(($match->home_team_score == '' && $match->enemy_team_score == ''))
                                                @if($match->home_team === $selectTeam[0]->id && ($today >= $match->date) && $match->status === 'nieodbyty')
                                                    <a href="{{ route('mecze.edit', $match->id)}}"> Wprowadź wynik</a>

                                                @else
                                                    Czekam na wynik
                                                @endif
                                            @else
                                                {{$match->home_team_score}} : {{$match->enemy_team_score}}
                                                @if($match->status == 'niezaakceptowany')
                                                    @if($match->home_team === $selectTeam[0]->id)
                                                        <br>
                                                        <a href="{{ route('mecze.edit', $match->id)}}"> Zmień wynik</a>
                                                    @endif
                                                @endif
                                            @endif
                                        </td>
                                        <td><a href="{{route('druzyna.show', $match->enemy_team)}}">{{$teams->find($match->enemy_team)->name}}</a></td>
                                        <td>{{$match->date}}</td>
                                        <td width="20%">

                                            @if($match->home_team === $selectTeam[0]->id && ($today > $match->date) && $match->status === 'nieodbyty' )
                                                Czekam na wprowadzenie wyniku
                                            @elseif($match->enemy_team === $selectTeam[0]->id && ($today > $match->date) && $match->status === 'nieodbyty' )
                                                Czekam na wprowadzenie wyniku przez zespół przeciwny
                                            @elseif($match->status === 'niezaakceptowany')
                                                W trakcie weryfikacji...
                                            @elseif( $match->status === 'zaakceptowany')
                                                Wynik meczu zaakceptowany
                                            @else($match->status === 'nieodbyty')
                                                Czekam na mecz
                                            @endif
                                        </td>
                                    </tr>
                                @else

                                @endif
                            @endforeach
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

