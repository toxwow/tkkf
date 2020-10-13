@extends('layouts.admin')
@push('scripts')
    <script src="{{ asset('js/admin/matchesForm.js') }}" defer></script>
    <script>
    function changeStatus(){
        var value = document.getElementById("statusID").value;
        var x = document.getElementById("myDIV");
        if(value === 'nieodbyty'){
            x.style.display = "none";
        }
        else if(value === 'zaakceptowany'){
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
                            <form method="post" action="{{ route('mecze.store') }}" enctype="multipart/form-data">
                                @csrf


                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="league">Liga:</label>
                                        <select  class="form-control" name="league" id="elementId">
                                            <option value="" disabled selected>Wybierz lige</option>
                                            @foreach($leagues as $league)
                                                <option value="{{$league->id}}">{{$league->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="teamHome">Drużyna Gospodarzy:</label>
                                        <select  class="form-control" name="teamHome" id="teamHome">
                                            <option value="" disabled selected>Wybierz drużynę gospodarzy</option>
                                            @foreach($teams as $league)
                                                <optgroup label="{{$league->name}}" id="league-{{$league->id}}">
                                                    @foreach($league->team as $team)
                                                        <option value="{{$team->id}}">{{$team->name}}</option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="teamAway">Drużyna Gości</label>
                                        <select  class="form-control" name="teamAway" id="teamAway">
                                            <option value="" disabled selected>Wybierz drużynę gości</option>
                                            @foreach($teams as $league)
                                                <optgroup label="{{$league->name}}" id="league-{{$league->id}}">
                                                    @foreach($league->team as $team)
                                                        <option value="{{$team->id}}">{{$team->name}}</option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col mb-3">
                                            <label for="date">Data meczu</label>
                                            <input type="date" class="form-control" name="date"/>
                                    </div>
                                </div> <div class="row">
                                    <div class="col mb-3">
                                        <label for="status">Status meczu:</label>
                                        <select  class="form-control" name="status" onchange="changeStatus()" id="statusID">
                                            <option value="nieodbyty">Nieodbyty</option>
                                            <option value="zaakceptowany">Zakończony</option>
                                            <option value="przelozony">Przełożony</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="myDIV" style="display: none;">
                                    <div class="row">
                                        <div class="col-12"><p class="font-weight-bold mb-0">Wynik:</p></div>
                                        <div class="col mb-3">
                                            <label for="teamHomeScore">Gospodarze:</label>
                                            <input class="form-control" type="number" name="teamHomeScore">
                                        </div>
                                        <div class="col mb-3">
                                            <label for="teamAwayScore">Goście:</label>
                                            <input class="form-control" type="number" name="teamAwayScore">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="league">Set 1 (gospodarze):</label>
                                            <input class="form-control" type="number" placeholder ="Gospodarze punkty 1 set" name="homePointSet1">
                                        </div>
                                        <div class="col mb-3">
                                            <label for="league">Set 2 (gospodarze):</label>
                                            <input class="form-control" type="number" placeholder ="Gospodarze punkty 2 set" name="homePointSet2">
                                        </div>
                                        <div class="col mb-3">
                                            <label for="league">Set 3 (gospodarze):</label>
                                            <input class="form-control" type="number" placeholder ="Gospodarze punkty 3 set" name="homePointSet3">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="league">Set 1 (goście):</label>
                                            <input class="form-control" type="number" placeholder ="Goście punkty 1 set" name="enemyPointSet1">
                                        </div>
                                        <div class="col mb-3">
                                            <label for="league">Set 2 (goście):</label>
                                            <input class="form-control" type="number" placeholder ="Goście punkty 2 set" name="enemyPointSet2">
                                        </div>
                                        <div class="col mb-3">
                                            <label for="league">Set 3 (goście):</label>
                                            <input class="form-control" type="number" placeholder ="Goście punkty 3 set" name="enemyPointSet3">
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
