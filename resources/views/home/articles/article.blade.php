@extends('layouts.page')
@push('css')
    <link href="{{ asset('css/home/article.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-lg-7  mx-auto">
                <div class="single-article-content">
                    <div class="breadcrumbs"><a href="{{route('articles')}}">&bull; Artykuły</a></div>
                    <div class="img-wrapper" style="background-image: url('{{Storage::url('images/articles/'.$article->photo)}}')"></div>
                    <div class="title-category">
                        <h1 class="title">{{$article->title}}</h1>
                        <div class="category">{{$article->category}}</div>
                    </div>

                    <div class="subtitle">{{$article->subtitle}}</div>
                    <div class="info">
                        <div class="date">{{$article->created_at->format('d.m.Y')}}</div>
                        <div class="author">{{$article->author}}</div>
                    </div>
                </div>
                <div class="single-article-text">
                    {!!  $article->content !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="show-rest">Zobacz inne artykuły:</p>
            </div>
                @foreach($articlesAll as $articleAll)
                    @if ($articleAll->id == $article->id) @continue @endif
                        <div class="col-12 col-md-6 col-lg-4 my-4">
                            <a href="{{route('article', $articleAll->id)}}" style="text-decoration: none">
                                <div class="wrapper-rest-article">
                                    <div class="img-wrapper" style="background-image: url('{{Storage::url('images/articles/'.$articleAll->photo)}}')"></div>
                                    <div class="content-wrapper">
                                        <div class="category">{{$articleAll->category}}</div>
                                        <div class="title">{{$articleAll->title}}</div>
                                        <div class="subtitle">{{$articleAll->subtitle}}</div>
                                        <div class="info">
                                            <div class="date">{{$articleAll->created_at->format('d.m.Y')}}</div>
                                            <div class="author">{{$articleAll->author}}</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                @endforeach

        </div>
    </div>
@endsection
