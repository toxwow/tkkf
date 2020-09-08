@extends('layouts.admin')
@push('scripts')
    <script src="{{ asset('js/admin/leagues.js') }}" defer></script>
@endpush
@push('scripts')
    <link href="{{ asset('css/admin/leagues.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <div class="content-header">
                    <div class="content-title">
                        <div class="icon-wrapper">
                            <i class="icofont-user"></i>
                        </div>
                        <div class="text-wrapper">
                            <p class="title">
                                @if($sameUser)
                                    Twój profil
                                @else
                                    {{$selectUser -> name}} {{$selectUser -> surname}}
                                @endif
                            </p>
                            <p class="sub-title">
                                @if($sameUser)
                                    zarzadzą swoim profilem
                                @else
                                    informacje o użytkowniku
                                @endif
                            </p>
                        </div>
                    </div>
                    @if($sameUser)
                    <div class="content-add">
                        <a href="{{route('uzytkownicy.edit', $user->id)}}">
                            <i class="icofont-plus mr-2"></i> edytuj profil
                        </a>
                    </div>
                    @endif
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
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="card">
                        <div class="card-header">
                            {{$selectUser->name}} {{$selectUser->surname}}
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"> <i class="icofont-email mr-2"></i> {{$selectUser->email}}</li>
                            <li class="list-group-item"> <i class="icofont-phone mr-2"></i> {{$selectUser->phone}}</li>
                            <li class="list-group-item"> <i class="icofont-clock-time mr-2"></i>
                                @if($selectUser->isOnline())
                                    <span style="color: forestgreen">użytkownik online</span>
                                @else
                                ostatnio widziany: {{$selectUser->last_seen}}
                                @endif
                            </li>
                            @if(empty($selectTeam))
                            @else
                            <li class="list-group-item"><a style="text-decoration: none; color: black" href="{{route('druzyna.show', $selectTeam->id)}}"> <i class="icofont-users mr-2"></i> {{$selectTeam->name}}</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

