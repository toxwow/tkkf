<section class="league-info" style="background-image: url({{ url('/images/map.png')}})">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card-wrapper">
                    <div class="title-card">
                        <p>Informacje o lidze</p>
                        <div class="league-items">
                            @foreach($timetable as $league)
                                    <a style="cursor: pointer" id="league-{{$league->id}}">{{$league->name}}</a>
                            @endforeach
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-7">
                            <div class="timetable-teams">
                                <p class="name-col">Terminarz</p>
                                @foreach($timetable as $league)
                                    @if(empty($league->matches->first()))
                                        <div class="timetable-wrapper" id="league-{{$league->id}}">
                                            <div class="match-ruller">
                                                <div class="match-content empty">
                                                    <p><i class="icofont-search-user"></i>Brak aktualnych meczy w {{$league->name}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="timetable-wrapper" id="league-{{$league->id}}">
                                            <div class="match-ruller">
                                                @foreach($league->matches as $match)
                                                    @if($match->status === 'nieodbyty')

                                                    <div class="match-content">
                                                        <div class="home-team">
                                                            <p class="team-name"><a href="{{route('team',$match->teamHome->id)}}">{{$match->teamHome->name}}</a></p>
                                                            @if($match->teamHome->logo == null)
                                                                <img src="https://static.hltv.org/images/team/logo/3487" alt="">
                                                            @else

                                                            @endif
                                                        </div>
                                                        <div class="result">
                                                                <p class="date">{{date('d.m',strtotime($match->date))}}</p>
                                                        </div>
                                                        <div class="enemy-team">
                                                            @if($match->teamHome->logo == null)
                                                                <img src="https://static.hltv.org/images/team/logo/3487" alt="">
                                                            @else

                                                            @endif
                                                            <p class="team-name"><a href="{{route('team',$match->teamEnemy->id)}}">{{$match->teamEnemy->name}}</a></p>
                                                        </div>
                                                    </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                @endif
                                @endforeach
                                <div class="navigation-wrapper">
                                    <div class="up nav"><i class="icofont-rounded-up"></i></div>
                                    <div class="down nav"><i class="icofont-rounded-down"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5">
                            <div class="table-teams">
                                <p class="name-col">Tabela</p>
                                @foreach($mecze as $id_league => $liga)
                                    @if($id_league != '')
                                    <div class="table-teams-wrapper" id="league-{{$id_league}}">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Drużyna</th>
                                                <th scope="col">L.M.</th>
                                                <th scope="col"><b>Pkt</b></th>
                                                <th scope="col">W</th>
                                                <th scope="col">P</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php $lp = 0 @endphp
                                            @foreach($liga as $team_id => $team)

                                                <tr>
                                                    <td>
                                                        {{$lp = $lp + 1}}
                                                    </td>
                                                    <td style="font-weight: 600">
                                                        <a href="{{route('team', $team_id)}}">{{$teams->find($team_id)->name}}</a>
                                                    </td>
                                                    <td>
                                                        {{$team['libcza_meczy']}}
                                                    </td>
                                                    <td>
                                                        <b>{{$team['sum_points_match']}}</b>
                                                    </td>
                                                    <td>{{$team['win_total']}}</td>
                                                    <td>{{$team['lose_total']}}</td>

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
            </div>
        </div>
    </div>
</section>

