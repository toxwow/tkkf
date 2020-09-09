<section class="league-info" style="background-image: url({{ url('/images/map.png')}})">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card-wrapper">
                    <div class="title-card">
                        <p>Informacje o lidze</p>
                        <div class="league-items">
                            @foreach($leagues as $league)
                                @if($loop->first)
                                    <a href="" class="active" id="league-{{$league->id}}">{{$league->name}}</a>
                                @else
                                    <a href="" id="league-{{$league->id}}">{{$league->name}}</a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7">
                            <div class="timetable-teams">
                                <p class="name-col">Terminarz</p>
                                <div class="timetable-wrapper">
                                    <div class="match-content">
                                        <div class="home-team">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Legia_Warszawa.svg/1347px-Legia_Warszawa.svg.png" alt="">
                                            <p class="team-name">Wczorajsi</p>
                                        </div>
                                        <div class="result">
                                            <p class="date">05.07</p>
                                            <p class="time">20:30</p>
                                        </div>
                                        <div class="enemy-team">
                                            <p class="team-name">Wczorajsi</p>
                                            <img src="https://seeklogo.com/images/G/GKS_Piast_Gliwice-logo-46CF21A094-seeklogo.com.png" alt="">
                                        </div>
                                    </div>
                                    <div class="match-content">
                                        <div class="home-team">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Legia_Warszawa.svg/1347px-Legia_Warszawa.svg.png" alt="">
                                            <p class="team-name">Wczorajsi</p>
                                        </div>
                                        <div class="result">
                                            <p class="score home-win">2 : 0</p>
                                        </div>
                                        <div class="enemy-team">
                                            <p class="team-name">Wczorajsi</p>
                                            <img src="https://seeklogo.com/images/G/GKS_Piast_Gliwice-logo-46CF21A094-seeklogo.com.png" alt="">
                                        </div>
                                    </div>
                                    <div class="match-content">
                                        <div class="home-team">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Legia_Warszawa.svg/1347px-Legia_Warszawa.svg.png" alt="">
                                            <p class="team-name">Wczorajsi</p>
                                        </div>
                                        <div class="result">
                                            <p class="score enemy-win">1 : 0</p>
                                        </div>
                                        <div class="enemy-team">
                                            <p class="team-name">Wczorajsi</p>
                                            <img src="https://seeklogo.com/images/G/GKS_Piast_Gliwice-logo-46CF21A094-seeklogo.com.png" alt="">
                                        </div>
                                    </div>
                                    <div class="match-content">
                                        <div class="home-team">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Legia_Warszawa.svg/1347px-Legia_Warszawa.svg.png" alt="">
                                            <p class="team-name">Wczorajsi</p>
                                        </div>
                                        <div class="result">
                                            <p class="score enemy-win">3 : 0</p>
                                        </div>
                                        <div class="enemy-team">
                                            <p class="team-name">Wczorajsi</p>
                                            <img src="https://seeklogo.com/images/G/GKS_Piast_Gliwice-logo-46CF21A094-seeklogo.com.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="table-teams">
                                <p class="name-col">Tabela</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

