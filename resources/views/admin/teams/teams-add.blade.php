@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="{{route('liga.index')}}">liga</a>
           <h2>Dodaj druzyne</h2>
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
                            <form method="post" action="{{ route('druzyna.store') }}">
                                @csrf


                                <div class="form-group">
                                    <label for="name">Nazwa druzyny:</label>
                                    <input type="text" class="form-control" name="name"/>
                                </div>
                                <div class="form-group">
                                    <label for="information">Informacje:</label>
                                    <input type="text" class="form-control" name="information"/>
                                </div>

                                <div class="form-group">
                                    <label for="league_id">Liga:</label>
                                    <select class="form-control" name="league_id" id="league_id">
                                        @foreach($league as $value)
                                            @if($league_selected == $value->id)
                                                <option value="{{$value->id}}" selected>{{$value->name}}</option>
                                            @else
                                                <option value="{{$value->id}}">{{$value->name}}</option>
                                            @endif
                                        @endforeach

                                    </select>
                                </div>


                                <button type="submit" class="btn btn-primary">Dodaj druzyne</button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
@endsection
