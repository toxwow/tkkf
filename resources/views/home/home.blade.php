@extends('layouts.page')
@push('css')
{{--    <link href="{{ asset('css/home/articles-block.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/home/articles-block-new.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home/league-info.css') }}" rel="stylesheet">
@endpush
@push('scripts')
    <script src="{{ asset('js/home/index.js') }}" defer></script>
@endpush
@section('content')

{{--    @include('home.components.articles-block')--}}
    @include('home.components.articles-block-new')
    @include('home.components.league-info')
{{--    @include('home.components.league-info-static')--}}

@endsection
