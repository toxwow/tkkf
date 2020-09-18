@extends('layouts.page')
@push('css')
    <link href="{{ asset('css/home/articles.css') }}" rel="stylesheet">
@endpush
@section('content')
    <section class="article-page">
        <div class="container">
            <div class="row">
                <div class="col-12 page-title-wrapper">
                    <h1 class="page-title">Artykuły i Wiadomości</h1>
                </div>
                <div class="col-12">
                    <a href="{{route('article', $articles->first()->id)}}">
                    <div class="wrapper-first-article">
                        <div class="img-wrapper" style="background-image: url('{{Storage::url('images/articles/'.$articles->first()->photo)}}')">
                        </div>
                        <div class="content-wrapper">
                            <div class="top">
                                <div class="category">{{$articles->first()->category}}</div>
                                <h4 class="title">{{$articles->first()->title}}</h4>
                                <h5 class="subtitle">{{$articles->first()->subtitle}}</h5>
                            </div>
                            <div class="bottom">
                                <p class="date">{{$articles->first()->created_at->format('d.m.Y')}}</p>
                                <p class="author">{{$articles->first()->author}}</p>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                @foreach($articles as $article)
                    @if ($loop->first) @continue @endif
                    <div class="col-4 my-4">
                        <a href="{{route('article', $article->id)}}">
                            <div class="wrapper-rest-article">
                                <div class="img-wrapper" style="background-image: url('{{Storage::url('images/articles/'.$article->photo)}}')"></div>
                                <div class="d-flex flex-column justify-content-between" style="height: calc(100% - 200px);">
                                    <div class="content-wrapper">
                                        <div class="category">{{$article->category}}</div>
                                        <div class="title">{{$article->title}}</div>
                                        <div class="subtitle">{{$article->subtitle}}</div>
                                    </div>
                                    <div class="info">
                                        <div class="date">{{$article->created_at->format('d.m.Y')}}</div>
                                        <div class="author">{{$article->author}}</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
