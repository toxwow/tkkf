@extends('layouts.page')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h2>Lista wszystkich artykułów: </h2><br>
                @foreach($articles as $article)
                    <a href="{{route('artykuly.show', [$article->id])}}">
                        {{$article->name}}
                        {{$article->content}}
                    </a>

                    <br>
                    <br>
                @endforeach
            </div>
        </div>
    </div>
@endsection
