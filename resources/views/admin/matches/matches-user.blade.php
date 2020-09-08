@extends('layouts.admin')
@push('scripts')
{{--    <script src="{{ asset('js/index.js') }}" defer></script>--}}

@endpush
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
                            <p class="title">Brak meczy</p>
                            <p class="sub-title">{{$msg}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>
        </div>
    </div>


@endsection

