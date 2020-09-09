@extends('layouts.page')
@push('css')
    <link href="{{ asset('css/icons/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home/articles-block.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home/league-info.css') }}" rel="stylesheet">
@endpush
@push('scripts')
    <script src="{{ asset('js/home/index.js') }}" defer></script>
@endpush
@section('content')

    @include('home.components.articles-block')
    @include('home.components.league-info')
    <div style="height: 500px;"></div>

@endsection
