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
                            <p class="title">Dodaj zawodnika</p>
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
                    <form method="post" action="{{ route('zawodnik.store') }}" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group">
                            <label for="name">Imię:</label>
                            <input type="text" class="form-control" name="name"/>
                        </div>
                        <div class="form-group">
                            <label for="surname">Naziwsko</label>
                            <input type="text" class="form-control" name="surname"/>
                        </div>
                        <div class="form-group">
                            <label for="photo">Zdjęcie</label>
                            <input type="file" class="form-control" name="photo"/>
                        </div>
                        <div class="form-group">
                            <label for="birth">Data urodzenia</label>
                            <input type="date" class="form-control" name="birth"/>
                        </div>
                        <div class="form-group">
                            <label for="team">Drużyna:</label>
                            <select  class="form-control" name="team">
                                <option value="{{$team['id']}}" selected disabled>{{$team['name']}}</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Dodaj zawodnika</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
