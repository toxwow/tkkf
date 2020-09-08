@extends('layouts.admin')
@push('scripts')
    <script src="{{ asset('js/index.js') }}" defer></script>
    <script>
        var value = document.getElementById("statusID").value;
        var x = document.getElementById("myDIV");
        if(value === 'nieodbyty'){
            x.style.display = "none";
        }
        else if(value === 'zaakceptowany' || 'niezaakceptowany'){
            x.style.display = "block";
        }
        function changeStatus(){
            var value = document.getElementById("statusID").value;
            var x = document.getElementById("myDIV");
            if(value === 'nieodbyty'){
                x.style.display = "none";
            }
            else if(value === 'zaakceptowany' || 'niezaakceptowany'){
                x.style.display = "block";
            }
        }

    </script>
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <div class="content-header">
                    <div class="content-title">
                        <div class="icon-wrapper">
                            <i class="icofont-score-board"></i>
                        </div>
                        <div class="text-wrapper">
                            <p class="title">Dodaj mecz</p>
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
                        <form method="post" action="{{ route('mecze.update', $match->id) }}">
                            @method('PATCH')
                        @csrf


                        <div class="row">
                            <div class="col mb-3">
                                <label for="league">Liga:</label>
                                <select  class="form-control" name="league" onchange="changeLeague()" id="elementId">
                                    @foreach($leagues as $league)
                                        @if($user->isCapitan())
                                            @if($league->id === $match->league_id)
                                                <option selected readonly value="{{$league->id}}">{{$league->name}}</option>
                                            @endif
                                        @else

                                        @if($league->id === $match->league_id)
                                        <option selected value="{{$league->id}}">{{$league->name}}</option>
                                        @else
                                            <option  value="{{$league->id}}">{{$league->name}}</option>
                                        @endif
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="teamHome">Drużyna Gospodarzy:</label>
                                <select  class="form-control" name="teamHome" id="teamHome">
                                    @foreach($teams as $league)

                                        <optgroup label="{{$league->name}}" id="league-{{$league->id}}">
                                            @foreach($league->team as $team)
                                                @if($user -> isCapitan())
                                                    @if($team->id === $match->home_team_id)
                                                        <option readonly selected  value="{{$team->id}}">{{$team->name}}</option>
                                                    @endif
                                                @else
                                                @if($team->id === $match->home_team_id)
                                                <option selected value="{{$team->id}}">{{$team->name}}</option>
                                                @else
                                                    <option  value="{{$team->id}}">{{$team->name}}</option>
                                                @endif
                                                @endif
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="teamAway">Drużyna Gości</label>
                                <select  class="form-control" name="teamAway" id="teamAway">
                                    @foreach($teams as $league)
                                        <optgroup label="{{$league->name}}">
                                            @foreach($league->team as $team)
                                                @if($user -> isCapitan())
                                                    @if($team->id === $match->enemy_team_id)
                                                        <option selected readonly  value="{{$team->id}}">{{$team->name}}</option>
                                                    @endif
                                                @else
                                                @if($team->id === $match->enemy_team_id)
                                                    <option selected value="{{$team->id}}">{{$team->name}}</option>
                                                @else
                                                    <option  value="{{$team->id}}">{{$team->name}}</option>

                                                @endif
                                                @endif
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <label for="date">Data meczu</label>
                                @if($user -> isCapitan())
                                    <input type="date" readonly class="form-control" name="date" value="{{$match->date}}"/>
                                @else
                                    <input type="date" class="form-control" name="date" value="{{$match->date}}"/>
                                @endif

                            </div>
                        </div>
                            @if($user -> isCapitan())
                                <select  disabled class="form-control d-none" name="status"  id="statusID">
                                    <option  selected value="niezaakceptowany">Nieodbyty</option>
                                </select>
                            @else
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="status">Status meczu:</label>
                                        <select  class="form-control" name="status" onchange="changeStatus()" id="statusID">
                                            @if($match -> status === 'nieodbyty')
                                                <option  selected value="nieodbyty">Nieodbyty</option>
                                                <option value="zaakceptowany">Zakończony</option>
                                            @else
                                                <option  selected  value="niezaakceptowany">Niezaakceptowany</option>
                                                <option  value="zaakceptowany">Zaakceptowany</option>
                                                <option   value="nieodbyty">Nieodbyty</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            @endif

                        <div id="myDIV" style="display: none;">
                            <div class="row">
                                <div class="col-12"><p class="font-weight-bold mb-0">Wynik:</p></div>
                                <div class="col mb-3">
                                    <label for="teamHomeScore">Gospodarze:</label>
                                    <input class="form-control" type="number" name="teamHomeScore" value="{{$match-> home_team_score}}">
                                </div>
                                <div class="col mb-3">
                                    <label for="teamAwayScore">Goście:</label>
                                    <input class="form-control" type="number" name="teamAwayScore" value="{{$match-> enemy_team_score}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col mb-3">
                                    <label for="league">Set 1 (gospodarze):</label>
                                    @if(count($matchDetail) >= 2 );
                                    <input class="form-control" type="number" placeholder ="Gospodarze punkty 1 set" name="homePointSet1" value="{{$matchDetail[0]->home_points}}">
                                    @else
                                    <input class="form-control" type="number" placeholder ="Gospodarze punkty 1 set" name="homePointSet1">
                                    @endif

                                </div>
                                <div class="col mb-3">
                                    <label for="league">Set 2 (gospodarze):</label>
                                    @if(count($matchDetail) >= 2 );
                                    <input class="form-control" type="number" placeholder ="Gospodarze punkty 2 set" name="homePointSet2" value="{{$matchDetail[1]->home_points}}">
                                    @else
                                        <input class="form-control" type="number" placeholder ="Gospodarze punkty 2 set" name="homePointSet2">
                                    @endif
                                </div>
                                <div class="col mb-3">
                                    <label for="league">Set 3 (gospodarze):</label>
                                    @if(count($matchDetail) > 2 );
                                    <input class="form-control" type="number" placeholder ="Gospodarze punkty 3 set" name="homePointSet3" value="{{$matchDetail[2]->home_points}}">
                                    @else
                                    <input class="form-control" type="number" placeholder ="Gospodarze punkty 3 set" name="homePointSet3">
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="league">Set 1 (goście):</label>
                                    @if(count($matchDetail) >= 2 );
                                    <input class="form-control" type="number" placeholder ="Goście punkty 1 set" name="enemyPointSet1" value="{{$matchDetail[0]->enemy_points}}">
                                    @else
                                        <input class="form-control" type="number" placeholder ="Goście punkty 1 set" name="enemyPointSet1" >
                                    @endif
                                </div>
                                <div class="col mb-3">
                                    <label for="league">Set 2 (goście):</label>
                                    @if(count($matchDetail) >= 2 );
                                    <input class="form-control" type="number" placeholder ="Goście punkty 2 set" name="enemyPointSet2" value="{{$matchDetail[1]->enemy_points}}">
                                    @else
                                        <input class="form-control" type="number" placeholder ="Goście punkty 2 set" name="enemyPointSet2" >
                                    @endif
                                </div>
                                <div class="col mb-3">
                                    <label for="league">Set 3 (goście):</label>
                                    @if(count($matchDetail) > 2 );
                                    <input class="form-control" type="number" placeholder ="Gospodarze punkty 3 set" name="enemyPointSet3" value="{{$matchDetail[2]->enemy_points}}">
                                    @else
                                        <input class="form-control" type="number" placeholder ="Gospodarze punkty 3 set" name="enemyPointSet3">
                                    @endif
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Dodaj mecz</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
