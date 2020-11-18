@extends('layouts.admin')
@push('scripts')
    <script>
        var leagues =  {!! json_encode($leagues) !!}
        var teams =  {!! json_encode($teams->toArray()) !!}

    </script>
{{--    <script src="{{ asset('js/index.js') }}" defer></script>--}}

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
                <input type="text" id="search" placeholder="  live search"></input>
                @foreach($leagues as $league)
                <div class="table-wrapper mb-3">
                    <div class="league-name">
                    <div class="d-flex align-items-center justify-content-between" >
                        <div>
                            {{$league->name}}
                        </div>
                    </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <th>Gospodarze</th>
                            <th>wynik</th>
                            <th>Goście</th>
                            <th>Data</th>
                            <th>Status</th>
                            <th></th>
                            </thead>
                            @foreach($league->matches as $matches)
                            <tr>
                                <td>{{$teams->find($matches->home_team_id)->name}}</td>
                                <td>
                                    @if($matches->status === 'nieodbyty')
                                        czekam na wynik
                                    @else
                                        {{$matches->home_team_score}} : {{$matches->enemy_team_score}}
                                    @endif
                                </td>
                                <td>{{$teams->find($matches->enemy_team_id)->name}}</td>

                                <td>{{$matches->date}}</td>
                                <td>{{$matches->status}}</td>
                                <td>
                                    <a href="{{ route('mecze.edit',$matches->id)}}" class="btn btn-primary">Edytuj</a>
                                    <form action="{{ route('mecze.destroy', $matches->id)}}" method="post" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class=" btn btn-danger" type="submit">Usuń mecz</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>

                </div>
                @endforeach

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

