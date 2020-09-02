@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="{{route('liga.index')}}">artykuly</a>
           <h2>Edytuj lige</h2>
                        <div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div><br />
                            @endif
                                <form method="post" action="{{ route('druzyna.update', $team->id) }}">
                                    @method('PATCH')
                                    @csrf
                                @csrf


                                <div class="form-group">
                                        <label for="name">Nazwa druzyny:</label>
                                        <input type="text" class="form-control" name="name" value="{{$team->name}}"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="information">Informacje:</label>
                                        <input type="text" class="form-control" name="information" value="{{$team->information}}"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="league_id">Liga:</label>
                                        <select class="form-control" name="league_id" id="league_id">

                                            @foreach($league as $value)
                                                <option value="{{$value->id}}">{{$value->name}} </option>
                                            @endforeach
                                            <option value="">Nieprzypisana drużyna</option>
                                        </select>
                                    </div>

                                <button type="submit" class="btn btn-primary-outline">Zakutalizuj</button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
@endsection
