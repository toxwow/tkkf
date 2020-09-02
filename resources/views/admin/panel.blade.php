@extends('layouts.admin')
@push('style')
    <link href="{{ asset('css/admin/home.css') }}" rel="stylesheet">

@endpush
@section('content')
<div class="panel-home">
    <div class="container">
        <div class="row">
            <div class="col-12">


                <div class="content-header">
                    <div class="content-title">
                        <div class="icon-wrapper">
                            <i class="icofont-home"></i>
                        </div>
                        <div class="text-wrapper">
                            <p class="title">Home</p>
                            <p class="sub-title">lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
