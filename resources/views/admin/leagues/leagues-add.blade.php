@extends('layouts.admin')

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
                            <p class="title">Dodaj lige</p>
                            <p class="sub-title">lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        </div>
                    </div>
                </div>
                <div class="card-box">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif
                    <form method="post" action="{{ route('liga.store') }}">
                        @csrf


                        <div class="form-group">
                            <label for="name">Nazwa ligi:</label>
                            <input type="text" class="form-control" name="name" placeholder="Wprowadź nazwę ligi"/>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Dodaj lige</button>
                    </form>
                </div>
            </div>
        </div>

@endsection
