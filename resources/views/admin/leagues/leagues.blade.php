@extends('layouts.admin')
@push('scripts')
    <script src="{{ asset('js/admin/leagues.js') }}" defer></script>
@endpush
@push('scripts')
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
                            <i class="icofont-newspaper"></i>
                        </div>
                        <div class="text-wrapper">
                            <p class="title">Tabela</p>
                            <p class="sub-title">lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
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
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="">

                    @foreach($mecze as $id_league => $liga)
                        @if($id_league != '')
                        <div class="card-box">
                        <div class="league-name">
                            <div class="d-flex align-items-center justify-content-between" >
                                {{$leagues->find($id_league)->name}}
                            </div>
                        </div>
                        <table class="table table-striped table-responsive-lg">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Drużyna</th>
                                <th scope="col"><span data-toggle="tooltip" data-placement="top" title="Liczba meczy">L.M.</span></th>
                                <th scope="col"><span data-toggle="tooltip" data-placement="top" title="Punkty">Pkt</span></th>
                                <th scope="col"><span data-toggle="tooltip" data-placement="top" title="Wygrane">W</span></th>
                                <th scope="col"><span data-toggle="tooltip" data-placement="top" title="Przegrane">P</span></th>
                                <th scope="col"><span data-toggle="tooltip" data-placement="top" title="Wygrane sety">W.S.</span></th>
                                <th scope="col"><span data-toggle="tooltip" data-placement="top" title="Przegrane sety">P.S.</span></th>
                                <th scope="col"><span data-toggle="tooltip" data-placement="top" title="Zdobyte/stracone">+/-</span></th>
                            </tr>
                            </thead>
                            <tbody>
                                @php $lp = 0 @endphp
                                @foreach($liga as $team_id => $team)

                                    <tr>
                                        <td>
                                            {{$lp = $lp + 1}}
                                        </td>
                                        <td>
                                            {{$teams->find($team_id)->name}}
                                        </td>
                                        <td>
                                            {{$team['libcza_meczy']}}
                                        </td>
                                        <td>
                                            {{$team['sum_points_match']}}
                                        </td>
                                        <td>{{$team['win_total']}}</td>
                                        <td>{{$team['lose_total']}}</td>
                                        <td>
                                            {{$team['win']}}
                                        </td>
                                        <td>
                                            {{$team['lose']}}
                                        </td>
                                        <td>
                                            {{$team['sum_point_win'] - $team['sum_point_lose']}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>


{{--<div class="container">--}}
{{--    <div class="row">--}}
{{--        <div class="col-12">--}}
{{--            @foreach($leagues as $league)--}}
{{--                <div style="margin-bottom: 20px">--}}
{{--                    <div style="background-color: #57abff; padding: 10px 30px; display: flex; align-items: center; justify-content: space-between">--}}
{{--                        <h3 style="margin-bottom: 0;">{{$league -> name}}</h3>--}}
{{--                        <div style="display: flex">--}}
{{--                            <a href="{{ route('liga.edit',$league->id)}}" class="btn btn-primary mr-4">Edytuj lige</a>--}}
{{--                            <form action="{{ route('liga.destroy', $league->id)}}" method="post">--}}
{{--                                @csrf--}}
{{--                                @method('DELETE')--}}
{{--                                <button class="btn btn-danger" type="submit">Usuń lige</button>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <table class="table table-dark table-striped" style="margin-bottom: 0">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <td scope="col">ID</td>--}}
{{--                            <td scope="col">Drużyna</td>--}}
{{--                            <td >Actions</td>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @foreach($league->team as $team)--}}
{{--                        <tr>--}}
{{--                            <td>{{$team}}</td>--}}
{{--                            <td>{{$team -> id}}</td>--}}
{{--                            <td>{{$team -> name}}</td>--}}
{{--                            <td style="display: flex"> <a href="{{ route('druzyna.edit',$team->id)}}" class="btn btn-primary mr-3">Edytuj drużyne</a>--}}
{{--                                <form action="{{ route('druzyna.destroy', $team->id)}}" method="post">--}}
{{--                                    @csrf--}}
{{--                                    @method('DELETE')--}}
{{--                                    <button class="btn btn-danger" type="submit">Usuń drużyne</button>--}}
{{--                                </form>--}}
{{--                            </td>--}}

{{--                        </tr>--}}
{{--                        @endforeach--}}


{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                    <div style="width: 100%; background-color: greenyellow; padding: 10px 0; text-align: center"><a href="{{route('druzyna.create')}}">dodaj druzyne</a></div>--}}
{{--                </div>--}}

{{--            @endforeach--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@endsection

