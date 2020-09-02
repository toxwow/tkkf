@extends('layouts.admin')
@push('scripts')
    <script>
        var leagues =  {!! json_encode($leagues) !!}
        var teams =  {!! json_encode($teams->toArray()) !!}
    </script>
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
    <div class="col-sm-12">

        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">


                @foreach($leagues as $league)
                    {{$league->name}}<br><br>
                    <ul>
                    @foreach($league->matches as $matches)
                        @if($matches->status === 'zaakceptowany')
                                <li><b>mecz zakończony - {{$matches->date}}</b>
                            @if($matches->home_team_score> $matches->enemy_team_score)
                                <span style="color: green; font-weight: 900">{{$teams->find($matches->home_team_id)->name}}</span>
                            vs
                            {{$teams->find($matches->enemy_team_id)->name}}
                            @else
                                {{$teams->find($matches->home_team_id)->name}}
                                vs
                                <span style="color: green; font-weight: 900">{{$teams->find($matches->enemy_team_id)->name}} {{$matches->enemy_team_id}}</span>
                            @endif
                            | | <b>{{$matches->home_team_score}} : {{$matches->enemy_team_score}}</b>  | |
                        @foreach($matches->detail as $detail)
                                ({{$detail->home_points}}:{{$detail->enemy_points}})

                            @endforeach

                        </li>

                            @elseif($matches->status === 'nieodbyty')
                                <li><b>mecz nieodbyty {{$matches->date}}</b> -

                                        <span>{{$teams->find($matches->home_team_id)->name}} </span>
                                        vs
                                        {{$teams->find($matches->enemy_team_id)->name}}


                                </li>

                            @elseif($matches->status === 'niezaakceptowany')
                                <li><b>mecz niezakceptowany {{$matches->date}}</b> -

                                    @if($matches->home_team_score> $matches->enemy_team_score)
                                        <span style="color: green; font-weight: 900">{{$teams->find($matches->home_team_id)->name}}</span>
                                        vs
                                        {{$teams->find($matches->enemy_team_id)->name}}
                                    @else
                                        {{$teams->find($matches->home_team_id)->name}}
                                        vs
                                        <span style="color: green; font-weight: 900">{{$teams->find($matches->enemy_team_id)->name}} {{$matches->enemy_team_id}}</span>
                                    @endif
                                    | | <b>{{$matches->home_team_score}} : {{$matches->enemy_team_score}}</b>  | |
                                    @foreach($matches->detail as $detail)
                                        ({{$detail->home_points}}:{{$detail->enemy_points}})

                                    @endforeach

                                </li>

                        @endif

                            <a href="{{ route('mecze.edit',$matches->id)}}"> edytuj mecz</a>  ||||
                            <form action="{{ route('mecze.destroy', $matches->id)}}" method="post" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button class=" btn btn-link" type="submit">Usuń mecz</button>
                            </form>
                    @endforeach
                    </ul>
                    <br><br>
                @endforeach
            </div>
        </div>
    </div>

@endsection

