@extends('layouts.page')
@push('css')
    <link href="{{ asset('css/home/season/season.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endpush
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js" defer></script>
    <script src="{{ asset('js/home/season/season.js') }}" defer></script>
@endpush
@section('content')
    <section class="season">
    <div class="container">
        <div class="row">
            <div class="col-12 page-title-wrapper">
                <h1 class="page-title">Sezon 2020/2021</h1>

                <div>
                    <select class="selectpicker">
                        @foreach($mecze as $id_league  => $liga)
                            @if($id_league != '')
                                <option value="league-{{$id_league}}" >{{$leaguesAll->find($id_league)->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12">
                @foreach($mecze as $id_league => $liga)
                    @if($id_league != '')
                        @if($loop->first)<table class="table" id="league-{{$id_league }}" >@else
                                <table class="table" id="league-{{$id_league }}" style="display: none" >
                                    @endif

                            <thead>
                            <th>#</th>
                            <th>Drużyna</th>
                            <th>L.M.</th>
                            <th>L.P.</th>
                            <th>W.</th>
                            <th>P.</th>
                            <th>S.W.</th>
                            <th>S.P.</th>
                            <th>+/-</th>
                            </thead>
                            @php $lp = 0 @endphp
                            @foreach($liga as $team_id => $team)
                                <tr>
                                    <td>
                                        {{$lp = $lp + 1}}
                                    </td>
                                    <td style="font-weight: 600">
                                        <a href="{{route('team',$team_id)}}">{{$teams->find($team_id)->name}}</a>
                                    </td>
                                    <td>
                                        {{$team['libcza_meczy']}}
                                    </td>
                                    <td>
                                        {{$team['sum_points_match']}}
                                    </td>
                                    <td>
                                        {{$team['win_total']}}
                                    </td>
                                    <td>
                                        {{$team['lose_total']}}
                                    </td>
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
                        </table>
                    @endif
                @endforeach

            </div>
        </div>
    </div>
    </section>
@endsection
