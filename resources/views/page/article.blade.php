@extends('layouts.page')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
               {{$article->name}}
               {{$article->content}}
            </div>
        </div>
    </div>
@endsection
