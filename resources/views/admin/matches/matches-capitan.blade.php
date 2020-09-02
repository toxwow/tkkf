@extends('layouts.admin')
@push('scripts')
    <script>
        var leagues =  {!! json_encode($leagues) !!}
        var teams =  {!! json_encode($teams->toArray()) !!}
    </script>
{{--    <script src="{{ asset('js/index.js') }}" defer></script>--}}

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
                    <table class="table table-striped">
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
                            <tr>
                                <td>{{$teams->find($match->home_team)->name}}</td>
                                <td>
                                    @if(($match->home_team_score == '' && $match->enemy_team_score == ''))
                                        @if($match->home_team === $selectTeam[0]->id)
                                            <a href="{{ route('mecze.edit', $match->id)}}"> Wprowadź wynik</a>
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
                                <td>{{$teams->find($match->enemy_team)->name}}</td>
                                <td>{{$match->date}}</td>
                                <td>{{$match->status}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

