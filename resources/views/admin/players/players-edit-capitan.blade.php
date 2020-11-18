@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <div class="content-header">
                    <div class="content-title">
                        <div class="icon-wrapper">
                            <i class="icofont-user"></i>
                        </div>
                        <div class="text-wrapper">
                            <p class="title">Edytuj zawodnika</p>
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
                    <form method="post" action="{{ route('zawodnik.update', $player->id) }}" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf


                        <div class="form-group">
                            <label for="name">Imię:</label>
                            <input type="text" class="form-control" name="name" disabled value="{{$player->name}}"/>
                        </div>
                        <div class="form-group">
                            <label for="surname">Nazwisko</label>
                            <input type="text" class="form-control" name="surname" disabled value="{{$player->surname}}"/>
                        </div>
                        <div class="form-group">
                            <label for="birth">Data urodzenia</label>
                            @if(empty($player->birth))
                                <input type="date" class="form-control" name="birth"   value="{{$player->birth}}"/>
                            @else
                            <input type="date" class="form-control" name="birth"  disabled value="{{$player->birth}}"/>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="photo">Zdjęcie</label>
                            <input type="file" class="form-control" name="photo"/>
                        </div>



                        <button type="submit" class="btn btn-primary">Edytuj zawodnika</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
