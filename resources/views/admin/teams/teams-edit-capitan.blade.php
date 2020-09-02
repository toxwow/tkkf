@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="{{route('liga.index')}}">artykuly</a>
           <h2>Edytuj drużyne {{$team->name}}</h2>
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
                                        <label for="address">Adres:</label>
                                        <input type="text" class="form-control" name="address" value="{{$team->address}}" placeholder="osiedle Wysokie 6 - Kraków" />
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Godzina i dzień meczu:</label>
                                        <input type="text" class="form-control" name="date" value="{{$team->date}}" placeholder="Wtorek 19:30 - 21:30"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="information">Dodatkowe informacje:</label>
                                        <input type="text" class="form-control" name="information" value="{{$team->information}}" placeholder="np. dojazd"/>
                                    </div>


                                <button type="submit" class="btn btn-primary w-100">Zakutalizuj</button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
@endsection
