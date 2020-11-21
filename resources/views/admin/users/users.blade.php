@extends('layouts.admin')
@push('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>

    <script src="{{ asset('js/admin/users.js') }}" defer></script>
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
                <div class="table-responsive" id="all-users" >
                    <input class="search form-control my-4" placeholder="Wyszukaj użytkownika" />

                    <table class="table table-dark table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th class="sort" data-sort="name">Imię i nazwisko</th>
                            <th class="sort" data-sort="email">E-mail</th>
                            <th>Telefon</th>
                            <th class="sort" data-sort="team">Drużyna</th>
                            <th>Uprawnienia</th>
                            <th>Ostatnio widziany</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody class="list">
                        @foreach($users as $key => $user1)
                            <tr>
                                <td>{{$key}}</td>
                                <td class="name">{{$user1['name']}}</td>
                                <td class="email">{{$user1['email']}}</td>
                                <td>{{$user1['phone']}}</td>
                                <td class="team">{{$user1['team']}}</td>
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
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

@endsection

