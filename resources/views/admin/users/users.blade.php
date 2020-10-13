@extends('layouts.admin')
@push('scripts')
    <script src="{{ asset('js/admin/leagues.js') }}" defer></script>
@endpush
@push('css')
    <link href="{{ asset('css/admin/leagues.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="col-sm-12">


    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
                <div class="content-header">
                    <div class="content-title">
                        <div class="icon-wrapper">
                            <i class="icofont-user"></i>
                        </div>
                        <div class="text-wrapper">
                            <p class="title">Użytkownicy</p>
                            <p class="sub-title">lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        </div>
                    </div>
                    <div class="content-add">
                        <a href="{{route('uzytkownicy.create')}}">
                            <i class="icofont-plus mr-2"></i> dodaj użytkownika
                        </a>
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
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-wrapper  table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <th>#</th>
                            <th>Imię i nazwisko</th>
                            <th>E-mail</th>
                            <th>Telefon</th>
                            <th>Drużyna</th>
                            <th>Uprawnienia</th>
                            <th>Ostatnio widziany</th>
                            <th></th>
                        </thead>
                        @foreach($users as $key => $user1)
                            <tr>
                                <td>{{$key}}</td>
                                <td>{{$user1['name']}}</td>
                                <td>{{$user1['email']}}</td>
                                <td>{{$user1['phone']}}</td>
                                <td>{{$user1['team']}}</td>
                                <td>{{$user1['role']}}</td>
                                <td>
                                    @if($user1['online'])
                                        aktywny
                                    @elseif(empty($user1['last_seen']))
                                        nigdy
                                    @else
                                        {{$user1['last_seen']}}
                                    @endif
                                </td>
                                <td><a class="btn btn-primary" href="{{ route('uzytkownicy.edit', $key)}}"><i class="icofont-settings-alt"></i></a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>

            </div>
        </div>
    </div>

@endsection

