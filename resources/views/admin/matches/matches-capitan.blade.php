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
                <div class="table-wrapper">

                    <table class="table table-striped table-responsive-lg">
                        <thead>
                            <tr>
                                <td>Drużyna gospodarzy</td>
                                <td>Wynik</td>
                                <td>Drużyna gości</td>
                                <td>Data</td>
                                <td>Status</td>
                                <td></td>
                            </tr>
                        </thead>
                        @foreach($matches as $match)
                            <tr>
                                <td><a href="{{route('druzyna.show', $match->home_team)}}">{{$teams->find($match->home_team)->name}}</a></td>
                                <td>
                                    @if(($match->home_team_score == '' && $match->enemy_team_score == ''))
                                        @if($match->home_team === $selectTeam[0]->id && ($today > $match->date) && $match->status === 'nieodbyty')
                                            <a href="{{ route('mecze.edit', $match->id)}}"> Wprowadź wynik</a>
                                        @elseif($match->status === 'przelozony')
                                        Mecz przełożony
                                        @else
                                        Czekam na wynik
                                        @endif
                                    @else
                                        {{$match->home_team_score}} : {{$match->enemy_team_score}}
                                        @if($match->status == 'niezaakceptowany')
                                            <br>
                                            <a href="{{ route('mecze.edit', $match->id)}}"> Zmień wynik</a>
                                        @endif
                                    @endif
                                </td>
                                <td><a href="{{route('druzyna.show', $match->enemy_team)}}">{{$teams->find($match->enemy_team)->name}}</a></td>
                                <td>{{$match->date}}</td>
                                <td>{{$match->status}}</td>
                                <td>
                                    @if($selectTeam[0]->shifts<3 && $match->status != 'przelozony')
                                    <a class="shiftButton btn btn-danger" data-match="{{ $match->id }}" data-team="{{ $selectTeam[0]->id }}">przełóż mecz</a>
                                    @elseif($match->status = 'przelozony')
                                        <button class="btn btn-success" disabled>Mecz został przełożony</button>
                                    @else
                                        <button class="btn btn-light" disabled>Wyczerpano limit przełożeń</button>

                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

