@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <div class="content-header">
                    <div class="content-title">
                        <div class="icon-wrapper">
                            <i class="icofont-users"></i>
                        </div>
                        <div class="text-wrapper">
                            <p class="title">Edytuj dryżune</p>
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
