@extends('layouts.admin')
@push('scripts')
    <script>
        var leagues =  {!! json_encode($leagues) !!}
        var teams =  {!! json_encode($teams->toArray()) !!}

    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>

    <script src="{{ asset('js/admin/matches.js') }}" defer></script>

@endpush
@push('style')
    <link href="{{ asset('css/admin/teams.css') }}" rel="stylesheet">
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
                            <p class="title">Mecze</p>
                            <p class="sub-title">lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        </div>
                    </div>
                    @if($user -> isAdmin())
                        <div class="content-add">
                            <a href="{{route('mecze.create')}}">
                                <i class="icofont-plus mr-2"></i> dodaj mecz
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
                <div class="settings d-flex justify-content-between">
                    <div class="filters d-flex">
                        @foreach($leagues as $league)
                            <div class="filter">{{$league->name}}</div>
                        @endforeach
                    </div>
                    <div class="status d-flex">
                        <div class="filter">Zakończony</div>
                        <div class="filter">Nieodbyty</div>
                        <div class="filter">Niezaakceptowany</div>
                    </div>
                </div>

                    <div class="table-responsive" id="all-matches">
                        <input class="search form-control my-4" placeholder="Wyszukaj meczu" />
                        <table class="table table-dark table-striped">
                            <thead>
                            <th class="sort" data-sort="league">Liga</th>
                            <th class="sort" data-sort="homeTeam">Gospodarze</th>
                            <th>wynik</th>
                            <th class="sort" data-sort="enemyTeam">Goście</th>
                            <th class="sort" data-sort="date">Data</th>
                            <th class="sort" data-sort="status">Status</th>
                            <th></th>
                            </thead>
                            <tbody class="list" >
                                @foreach($leagues as $league)
                                @foreach($league->matches as $matches)
                                <tr>
                                    <td style="font-size: 12px;" class="league">{{$league->name}}</td>
                                    <td class="homeTeam">{{$teams->find($matches->home_team_id)->name}}</td>
                                    <td>
                                        @if($matches->status === 'nieodbyty')
                                            @if($matches->date > $today)
                                            czekam na mecz
                                            @else
                                                <span style="color: #a6d2ff;">czekam na wynik</span>
                                            @endif
                                        @else
                                            {{$matches->home_team_score}} : {{$matches->enemy_team_score}}
                                        @endif
                                    </td>
                                    <td class="enemyTeam">{{$teams->find($matches->enemy_team_id)->name}}</td>

                                    <td class="date">{{$matches->date}}</td>
                                    <td class="status">
                                        @if($matches->status === 'niezaakceptowany')
                                        Niezaakceptowany
                                        @elseif($matches->status === 'zaakceptowany')
                                        Zakończony
                                        @else
                                        Nieodbyty
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-info" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #fff;">
                                                <i class="icofont-settings-alt"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a href="{{ route('mecze.edit',$matches->id)}}" class="dropdown-item">Edytuj</a>


                                                <form action="{{ route('mecze.destroy', $matches->id)}}" method="post" style="display: inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item" type="submit">Usuń mecz</button>
                                                </form>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>

    <div class="container">
        <div class="row">
            <div class="col-12">



            </div>
        </div>
    </div>

@endsection

