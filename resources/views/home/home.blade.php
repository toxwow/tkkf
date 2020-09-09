@extends('layouts.page')
@push('css')
    <link href="{{ asset('css/home/articles-block.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home/league-info.css') }}" rel="stylesheet">
@endpush
@section('content')

    @include('home.components.articles-block')
    @include('home.components.league-info')
    <div style="height: 500px;"></div>

@endsection
