@extends('layouts.admin')
@push('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
    <script src="{{ asset('js/admin/players.js') }}" defer></script>

@endpush
@section('content')
    <div class="col-sm-12">

        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
    </div>


    <div class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <div class="content-header">
                    <div class="content-title">
                        <div class="icon-wrapper">
                            <i class="icofont-user"></i>
                        </div>
                        <div class="text-wrapper">
                            <p class="title">Wszyscy zawodnicy</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <div class="col-12">
                <div class="table-responsive" id="all-users">
                    <input class="search form-control my-4" placeholder="Wyszukaj zawodnika" />
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="sort" data-sort="name">Imię</th>
                            <th class="sort" data-sort="surname">Nazwisko</th>
                            <th class="sort" data-sort="date">Data urodzenia</th>
                            <th class="sort" data-sort="team-name">Drużyna</th>
                            <th class="sort" data-sort="league-name">Liga</th>
                        </tr>
                        </thead>
                        <tbody  class="list" >
                            @foreach($players as  $player)
                                <tr>
                                    <td class="name">{{$player->name}}</td>
                                    <td  class="surname">{{$player->surname}}</td>
                                    <td class="date">{{$player->birth}}</td>
                                    <td class="team-name">{{$player->team->name}}</td>
                                    <td colspan="league-name">{{$player->team->league->name}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

