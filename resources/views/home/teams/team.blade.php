@extends('layouts.page')
@push('css')
    <link href="{{ asset('css/home/teams/team.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/icofont.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400&display=swap" rel="stylesheet">
@endpush
@push('scripts')
<script src="{{ asset('js/home/team.js') }}" defer></script>
@endpush

@section('content')
<section class="team">
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="wrapper-team-info"  style="background-image: url({{ url('/images/team-bg.jpg')}})">
                <div class="team-info">
                    <div class="head-info">
                        <div class="logo">
                            @if(empty($team['team_logo']))
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAJ1BMVEX////Ly8vIyMjR0dHd3d3o6Oj7+/vx8fHg4OD39/fa2trX19fr6+uWykArAAAFVElEQVR4nO2d6ZLiMAyESZyDJLz/8+4QyHBMgG7H0cHq+7lVS6ljW5JtyXM4BEEQBEEQ7MDQt82UqvpKldJ4bPtO26wyDG1zkVY9Mv/T1Pba9m2jO43VH2nPOqfW61h2bXqv7qYytdrGZnAC5S0iR1/TdWgYeVeRyY/GPtHyrhoHbdMhcvXNGkf7TmeLvlmjcZ8zTNv0nSUmy8N43KxvxqzH6asyAqv6qC1lnbGQvrPESVvMCsUG0KrEQivwJjFpK3piY4gwL3EoLW+WaGiinooP4EVioy1sofQSvEk0kt40ewn8kWgiES8YBVfQVnfYW2A9auvbWeCPRO0UdW+BlfY83c2L3tBNwtv9Bf5IVNwt9hICNeP+ICJQcxBl9CmuxO0HMrBEHYEiXuaqUCU9lVqEMyo7RUF9Ogm4QKi/Vyjva7Lm6HL7m4H8NE28uqppT31/ao/Undvy36VDIutH6/RwydvS547i3pQ0rzo9/wC9jIW3iZx9q9+fPpwTFdgxAutq3dN3nEDZhcgM4etjXU6i6FafGcJ3h7rU3kvU1TBD+DaOUScgkq6GsavcLwnGfCIWfkonKZ8so+4MbtPHtUOtaBFxZwj/8HliTYRCsXAx4jZ93vIQd1ZyGyj8qwPej5imYgERn6TQR8e/l5hCfJJCF7jEnP+Tve8EPoTQN8fjhZRCwpNCv4e7GimF8DcHT1aIZS2kED69AJ07oVDG0xDeHftB/ERLSCH+ycH7IkKhTMSHs2501RCzVCZrg8MX+sUJX7qvsgXUHPiLE1uxfZUtFLengX9QZgcMu1K4rBA/O5e56h7GBgQ9N8KXoZEKNxZz4bA4hCu13KDwBnzzZKGCLwdcoH4BXxZERuPU0RA7fKfLkDgu1TY1Dzxls9ok9Al8BJ1GQ6YYQNvWLJhLCzN9FxTMnYXLSUq12WgbmwNzi+/TkzJFVS7DPdVIZKiFDYa63rbR+8TBlcWZarTE4AQ6DBVk1Z6/ISRL/N0N4cCWlnobQrqu1Jkj5V89MdBgSdBl9Cp6SmeGnF5MRwdQfV6TlBc3Mxwz3wTxMUf7rP6Ki0Brc/T8PuCdb++Gvj0/t5fdPmTpWYyZrr7KSWlKqVp7J5FEW9EzpZuC7aVrhTsuzS3C0v165hbhgTodBLAYCYsKNOdlzhQVaDHUl+x8trllKhgsbAosGCyMCiTqt5wK5HufX2FVINWH9prapBedoTpnXws0mMksFHGlpq/RSrwraG83cc/2vNv6Q9eb8247r0C+YGOwqO2+jbzw5QO4Me+2vgJnNgSLlXdBLJKdd9eVvfOYVTLz7rqyHOMfyHKlrv4uSYa8ejIfIO5g8+766Vkl+zDBovYn78Dl3Y2nyfkL0XTuUh+Tdys9Y7kZPFhYPK1HwIfQTYR/5Pub7Mx1ZBcHz7u9LkO8ptlVEdcd+GsZLraCK6AC7d5JfKD4eyDmwIOF4UP7t8B5t8EKEgz84SGny5Bo59W2NBc4WHiN9/DlqNe0m3jxxGnajefdXne/eN7tdhmiebeDC6YXoK7UbdoN591ed79E3q1taS5w3u119wvn3W7Tbjjvdpt2H5oEom1oEARBEARBEARBEARBEARBkE+HHgYnD71baxB1pdqmZvL9daV4MZTXC264CcHtBXfpvzNnj6gr/cVrXSleDOX1ghv/S3peC9rwv6SnbWku319Xigp0+gc4mLpSr/Eed6Ve4z2ed2tbmgucd3uN93De7baAHa+c9Rrv8SYEr5WzeN6tbWkucLBwWzmLBgu3Gwv40R238R7Pu7UNzQYV6HZj0dUgbuN9EARBEARBEATB/8A/RPM4XilEn7EAAAAASUVORK5CYII=" alt="">
                            @else
                                {{$team['team_logo']}}
                            @endif
                        </div>
                        <div class="team">
                            <p class="name">{{$team['team']}}</p>
                            <p class="league">{{$team['team_league']}}</p>
                        </div>
                    </div>
                    <div class="rest-info">
                        <div class="row w-100">
                            <div class="col-12 col-md-6">
                                <div class="info">
                                    <p class="label">Kapitan</p>
                                    <p class="content">{{$team['capitan']}}</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="info">
                                    <p class="label">Telefon</p>
                                    <p class="content">
                                        @if(isset($team['phone']))
                                            {{$team['phone']}}
                                        @else
                                            brak
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="info">
                                    <p class="label">Adres email</p>
                                    <p class="content">{{$team['email']}}</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="info">
                                    <p class="label">Adres hali</p>
                                    <p class="content">
                                        @if(isset($team['address']))
                                            {{$team['address']}}
                                        @else
                                            brak adresu
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="info">
                                    <p class="label">Dzień</p>
                                    <p class="content">
                                        @if(isset($team['time']))
                                            {{$team['time']}}
                                        @else
                                            brak godziny
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12 ml-auto">
            <div class="team-menu-wrapper">
                <div class="active-bg"></div>
                <div class="item active" id="timetable">Terminarz</div>
                <div class="item " id="last-matches">Ostatnie mecze</div>
                <div class="item" id="players">Zawodnicy</div>
            </div>
            <div class="collapse-item timetable-wrapper" >
                @if(!empty($matchFuture))
                    @foreach($matchFuture as $match)
                        <div class="card-match">
                            <div class="team">

                                <a href="{{route('team',$match['home_team_id'])}}" style="text-decoration: none; color: #212529">{{$match['home_team']}}</a>
                                @if(empty($match['home_team_logo']))
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAJ1BMVEX////Ly8vIyMjR0dHd3d3o6Oj7+/vx8fHg4OD39/fa2trX19fr6+uWykArAAAFVElEQVR4nO2d6ZLiMAyESZyDJLz/8+4QyHBMgG7H0cHq+7lVS6ljW5JtyXM4BEEQBEEQ7MDQt82UqvpKldJ4bPtO26wyDG1zkVY9Mv/T1Pba9m2jO43VH2nPOqfW61h2bXqv7qYytdrGZnAC5S0iR1/TdWgYeVeRyY/GPtHyrhoHbdMhcvXNGkf7TmeLvlmjcZ8zTNv0nSUmy8N43KxvxqzH6asyAqv6qC1lnbGQvrPESVvMCsUG0KrEQivwJjFpK3piY4gwL3EoLW+WaGiinooP4EVioy1sofQSvEk0kt40ewn8kWgiES8YBVfQVnfYW2A9auvbWeCPRO0UdW+BlfY83c2L3tBNwtv9Bf5IVNwt9hICNeP+ICJQcxBl9CmuxO0HMrBEHYEiXuaqUCU9lVqEMyo7RUF9Ogm4QKi/Vyjva7Lm6HL7m4H8NE28uqppT31/ao/Undvy36VDIutH6/RwydvS547i3pQ0rzo9/wC9jIW3iZx9q9+fPpwTFdgxAutq3dN3nEDZhcgM4etjXU6i6FafGcJ3h7rU3kvU1TBD+DaOUScgkq6GsavcLwnGfCIWfkonKZ8so+4MbtPHtUOtaBFxZwj/8HliTYRCsXAx4jZ93vIQd1ZyGyj8qwPej5imYgERn6TQR8e/l5hCfJJCF7jEnP+Tve8EPoTQN8fjhZRCwpNCv4e7GimF8DcHT1aIZS2kED69AJ07oVDG0xDeHftB/ERLSCH+ycH7IkKhTMSHs2501RCzVCZrg8MX+sUJX7qvsgXUHPiLE1uxfZUtFLengX9QZgcMu1K4rBA/O5e56h7GBgQ9N8KXoZEKNxZz4bA4hCu13KDwBnzzZKGCLwdcoH4BXxZERuPU0RA7fKfLkDgu1TY1Dzxls9ok9Al8BJ1GQ6YYQNvWLJhLCzN9FxTMnYXLSUq12WgbmwNzi+/TkzJFVS7DPdVIZKiFDYa63rbR+8TBlcWZarTE4AQ6DBVk1Z6/ISRL/N0N4cCWlnobQrqu1Jkj5V89MdBgSdBl9Cp6SmeGnF5MRwdQfV6TlBc3Mxwz3wTxMUf7rP6Ki0Brc/T8PuCdb++Gvj0/t5fdPmTpWYyZrr7KSWlKqVp7J5FEW9EzpZuC7aVrhTsuzS3C0v165hbhgTodBLAYCYsKNOdlzhQVaDHUl+x8trllKhgsbAosGCyMCiTqt5wK5HufX2FVINWH9prapBedoTpnXws0mMksFHGlpq/RSrwraG83cc/2vNv6Q9eb8247r0C+YGOwqO2+jbzw5QO4Me+2vgJnNgSLlXdBLJKdd9eVvfOYVTLz7rqyHOMfyHKlrv4uSYa8ejIfIO5g8+766Vkl+zDBovYn78Dl3Y2nyfkL0XTuUh+Tdys9Y7kZPFhYPK1HwIfQTYR/5Pub7Mx1ZBcHz7u9LkO8ptlVEdcd+GsZLraCK6AC7d5JfKD4eyDmwIOF4UP7t8B5t8EKEgz84SGny5Bo59W2NBc4WHiN9/DlqNe0m3jxxGnajefdXne/eN7tdhmiebeDC6YXoK7UbdoN591ed79E3q1taS5w3u119wvn3W7Tbjjvdpt2H5oEom1oEARBEARBEARBEARBEARBkE+HHgYnD71baxB1pdqmZvL9daV4MZTXC264CcHtBXfpvzNnj6gr/cVrXSleDOX1ghv/S3peC9rwv6SnbWku319Xigp0+gc4mLpSr/Eed6Ve4z2ed2tbmgucd3uN93De7baAHa+c9Rrv8SYEr5WzeN6tbWkucLBwWzmLBgu3Gwv40R238R7Pu7UNzQYV6HZj0dUgbuN9EARBEARBEATB/8A/RPM4XilEn7EAAAAASUVORK5CYII=" alt="" style="margin-left: 10px;">
                                @else
                                    {{$team['home_team_logo']}}
                                @endif
                            </div>
                            <div class="score">
                                <div class="versus">VS</div>

                            </div>
                            <div class="team">
                                @if(empty($match['enemy_team_logo']))
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAJ1BMVEX////Ly8vIyMjR0dHd3d3o6Oj7+/vx8fHg4OD39/fa2trX19fr6+uWykArAAAFVElEQVR4nO2d6ZLiMAyESZyDJLz/8+4QyHBMgG7H0cHq+7lVS6ljW5JtyXM4BEEQBEEQ7MDQt82UqvpKldJ4bPtO26wyDG1zkVY9Mv/T1Pba9m2jO43VH2nPOqfW61h2bXqv7qYytdrGZnAC5S0iR1/TdWgYeVeRyY/GPtHyrhoHbdMhcvXNGkf7TmeLvlmjcZ8zTNv0nSUmy8N43KxvxqzH6asyAqv6qC1lnbGQvrPESVvMCsUG0KrEQivwJjFpK3piY4gwL3EoLW+WaGiinooP4EVioy1sofQSvEk0kt40ewn8kWgiES8YBVfQVnfYW2A9auvbWeCPRO0UdW+BlfY83c2L3tBNwtv9Bf5IVNwt9hICNeP+ICJQcxBl9CmuxO0HMrBEHYEiXuaqUCU9lVqEMyo7RUF9Ogm4QKi/Vyjva7Lm6HL7m4H8NE28uqppT31/ao/Undvy36VDIutH6/RwydvS547i3pQ0rzo9/wC9jIW3iZx9q9+fPpwTFdgxAutq3dN3nEDZhcgM4etjXU6i6FafGcJ3h7rU3kvU1TBD+DaOUScgkq6GsavcLwnGfCIWfkonKZ8so+4MbtPHtUOtaBFxZwj/8HliTYRCsXAx4jZ93vIQd1ZyGyj8qwPej5imYgERn6TQR8e/l5hCfJJCF7jEnP+Tve8EPoTQN8fjhZRCwpNCv4e7GimF8DcHT1aIZS2kED69AJ07oVDG0xDeHftB/ERLSCH+ycH7IkKhTMSHs2501RCzVCZrg8MX+sUJX7qvsgXUHPiLE1uxfZUtFLengX9QZgcMu1K4rBA/O5e56h7GBgQ9N8KXoZEKNxZz4bA4hCu13KDwBnzzZKGCLwdcoH4BXxZERuPU0RA7fKfLkDgu1TY1Dzxls9ok9Al8BJ1GQ6YYQNvWLJhLCzN9FxTMnYXLSUq12WgbmwNzi+/TkzJFVS7DPdVIZKiFDYa63rbR+8TBlcWZarTE4AQ6DBVk1Z6/ISRL/N0N4cCWlnobQrqu1Jkj5V89MdBgSdBl9Cp6SmeGnF5MRwdQfV6TlBc3Mxwz3wTxMUf7rP6Ki0Brc/T8PuCdb++Gvj0/t5fdPmTpWYyZrr7KSWlKqVp7J5FEW9EzpZuC7aVrhTsuzS3C0v165hbhgTodBLAYCYsKNOdlzhQVaDHUl+x8trllKhgsbAosGCyMCiTqt5wK5HufX2FVINWH9prapBedoTpnXws0mMksFHGlpq/RSrwraG83cc/2vNv6Q9eb8247r0C+YGOwqO2+jbzw5QO4Me+2vgJnNgSLlXdBLJKdd9eVvfOYVTLz7rqyHOMfyHKlrv4uSYa8ejIfIO5g8+766Vkl+zDBovYn78Dl3Y2nyfkL0XTuUh+Tdys9Y7kZPFhYPK1HwIfQTYR/5Pub7Mx1ZBcHz7u9LkO8ptlVEdcd+GsZLraCK6AC7d5JfKD4eyDmwIOF4UP7t8B5t8EKEgz84SGny5Bo59W2NBc4WHiN9/DlqNe0m3jxxGnajefdXne/eN7tdhmiebeDC6YXoK7UbdoN591ed79E3q1taS5w3u119wvn3W7Tbjjvdpt2H5oEom1oEARBEARBEARBEARBEARBkE+HHgYnD71baxB1pdqmZvL9daV4MZTXC264CcHtBXfpvzNnj6gr/cVrXSleDOX1ghv/S3peC9rwv6SnbWku319Xigp0+gc4mLpSr/Eed6Ve4z2ed2tbmgucd3uN93De7baAHa+c9Rrv8SYEr5WzeN6tbWkucLBwWzmLBgu3Gwv40R238R7Pu7UNzQYV6HZj0dUgbuN9EARBEARBEATB/8A/RPM4XilEn7EAAAAASUVORK5CYII=" alt="" style="margin-right: 10px;">
                                @else
                                    {{$match['enemy_team_logo']}}
                                @endif
                                <a href="{{route('team',$match['enemy_team_id'])}}" style="text-decoration: none; color: #212529">{{$match['enemy_team']}}</a>
                            </div>
                            <div class="date"><i class="icofont-ui-calendar"></i> {{$match['date']}}</div>
                            <div class="date"><i class="icofont-location-pin"></i> {{$match['address']}}</div>

                        </div>
                    @endforeach
                @else
                    <div class="card-match">
                        Brak przyszłych meczy
                    </div>
                @endif
            </div>
            <div class="collapse-item last-matches-wrapper"  style="display: none">
                @if(!empty($matchesPast))
                    @foreach($matchesPast as $match)
                    <div class="card-match">
                        <div class="team">

                            <a href="{{route('team',$match['home_team_id'])}}" style="text-decoration: none; color: #212529">{{$match['home_team']}}</a>
                            @if(empty($match['home_team_logo']))
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAJ1BMVEX////Ly8vIyMjR0dHd3d3o6Oj7+/vx8fHg4OD39/fa2trX19fr6+uWykArAAAFVElEQVR4nO2d6ZLiMAyESZyDJLz/8+4QyHBMgG7H0cHq+7lVS6ljW5JtyXM4BEEQBEEQ7MDQt82UqvpKldJ4bPtO26wyDG1zkVY9Mv/T1Pba9m2jO43VH2nPOqfW61h2bXqv7qYytdrGZnAC5S0iR1/TdWgYeVeRyY/GPtHyrhoHbdMhcvXNGkf7TmeLvlmjcZ8zTNv0nSUmy8N43KxvxqzH6asyAqv6qC1lnbGQvrPESVvMCsUG0KrEQivwJjFpK3piY4gwL3EoLW+WaGiinooP4EVioy1sofQSvEk0kt40ewn8kWgiES8YBVfQVnfYW2A9auvbWeCPRO0UdW+BlfY83c2L3tBNwtv9Bf5IVNwt9hICNeP+ICJQcxBl9CmuxO0HMrBEHYEiXuaqUCU9lVqEMyo7RUF9Ogm4QKi/Vyjva7Lm6HL7m4H8NE28uqppT31/ao/Undvy36VDIutH6/RwydvS547i3pQ0rzo9/wC9jIW3iZx9q9+fPpwTFdgxAutq3dN3nEDZhcgM4etjXU6i6FafGcJ3h7rU3kvU1TBD+DaOUScgkq6GsavcLwnGfCIWfkonKZ8so+4MbtPHtUOtaBFxZwj/8HliTYRCsXAx4jZ93vIQd1ZyGyj8qwPej5imYgERn6TQR8e/l5hCfJJCF7jEnP+Tve8EPoTQN8fjhZRCwpNCv4e7GimF8DcHT1aIZS2kED69AJ07oVDG0xDeHftB/ERLSCH+ycH7IkKhTMSHs2501RCzVCZrg8MX+sUJX7qvsgXUHPiLE1uxfZUtFLengX9QZgcMu1K4rBA/O5e56h7GBgQ9N8KXoZEKNxZz4bA4hCu13KDwBnzzZKGCLwdcoH4BXxZERuPU0RA7fKfLkDgu1TY1Dzxls9ok9Al8BJ1GQ6YYQNvWLJhLCzN9FxTMnYXLSUq12WgbmwNzi+/TkzJFVS7DPdVIZKiFDYa63rbR+8TBlcWZarTE4AQ6DBVk1Z6/ISRL/N0N4cCWlnobQrqu1Jkj5V89MdBgSdBl9Cp6SmeGnF5MRwdQfV6TlBc3Mxwz3wTxMUf7rP6Ki0Brc/T8PuCdb++Gvj0/t5fdPmTpWYyZrr7KSWlKqVp7J5FEW9EzpZuC7aVrhTsuzS3C0v165hbhgTodBLAYCYsKNOdlzhQVaDHUl+x8trllKhgsbAosGCyMCiTqt5wK5HufX2FVINWH9prapBedoTpnXws0mMksFHGlpq/RSrwraG83cc/2vNv6Q9eb8247r0C+YGOwqO2+jbzw5QO4Me+2vgJnNgSLlXdBLJKdd9eVvfOYVTLz7rqyHOMfyHKlrv4uSYa8ejIfIO5g8+766Vkl+zDBovYn78Dl3Y2nyfkL0XTuUh+Tdys9Y7kZPFhYPK1HwIfQTYR/5Pub7Mx1ZBcHz7u9LkO8ptlVEdcd+GsZLraCK6AC7d5JfKD4eyDmwIOF4UP7t8B5t8EKEgz84SGny5Bo59W2NBc4WHiN9/DlqNe0m3jxxGnajefdXne/eN7tdhmiebeDC6YXoK7UbdoN591ed79E3q1taS5w3u119wvn3W7Tbjjvdpt2H5oEom1oEARBEARBEARBEARBEARBkE+HHgYnD71baxB1pdqmZvL9daV4MZTXC264CcHtBXfpvzNnj6gr/cVrXSleDOX1ghv/S3peC9rwv6SnbWku319Xigp0+gc4mLpSr/Eed6Ve4z2ed2tbmgucd3uN93De7baAHa+c9Rrv8SYEr5WzeN6tbWkucLBwWzmLBgu3Gwv40R238R7Pu7UNzQYV6HZj0dUgbuN9EARBEARBEATB/8A/RPM4XilEn7EAAAAASUVORK5CYII=" alt="" style="margin-left: 10px;">
                            @else
                                {{$team['home_team_logo']}}
                            @endif
                        </div>
                        <div class="score">
                            <div class="main-score"><span>{{$match['home_team_score']}} : {{$match['enemy_team_score']}}</span></div>
                            <div class="detail">
                                @foreach($match['details'] as $point)
                                    @if($loop->last)
                                        <div class="single-set">{{$point[0]}}:{{$point[1]}})</div>
                                    @elseif($loop->first)
                                    <div class="single-set">({{$point[0]}}:{{$point[1]}}, &nbsp</div>
                                    @else
                                        <div class="single-set">{{$point[0]}}:{{$point[1]}}, &nbsp</div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="team">
                            @if(empty($match['enemy_team_logo']))
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAJ1BMVEX////Ly8vIyMjR0dHd3d3o6Oj7+/vx8fHg4OD39/fa2trX19fr6+uWykArAAAFVElEQVR4nO2d6ZLiMAyESZyDJLz/8+4QyHBMgG7H0cHq+7lVS6ljW5JtyXM4BEEQBEEQ7MDQt82UqvpKldJ4bPtO26wyDG1zkVY9Mv/T1Pba9m2jO43VH2nPOqfW61h2bXqv7qYytdrGZnAC5S0iR1/TdWgYeVeRyY/GPtHyrhoHbdMhcvXNGkf7TmeLvlmjcZ8zTNv0nSUmy8N43KxvxqzH6asyAqv6qC1lnbGQvrPESVvMCsUG0KrEQivwJjFpK3piY4gwL3EoLW+WaGiinooP4EVioy1sofQSvEk0kt40ewn8kWgiES8YBVfQVnfYW2A9auvbWeCPRO0UdW+BlfY83c2L3tBNwtv9Bf5IVNwt9hICNeP+ICJQcxBl9CmuxO0HMrBEHYEiXuaqUCU9lVqEMyo7RUF9Ogm4QKi/Vyjva7Lm6HL7m4H8NE28uqppT31/ao/Undvy36VDIutH6/RwydvS547i3pQ0rzo9/wC9jIW3iZx9q9+fPpwTFdgxAutq3dN3nEDZhcgM4etjXU6i6FafGcJ3h7rU3kvU1TBD+DaOUScgkq6GsavcLwnGfCIWfkonKZ8so+4MbtPHtUOtaBFxZwj/8HliTYRCsXAx4jZ93vIQd1ZyGyj8qwPej5imYgERn6TQR8e/l5hCfJJCF7jEnP+Tve8EPoTQN8fjhZRCwpNCv4e7GimF8DcHT1aIZS2kED69AJ07oVDG0xDeHftB/ERLSCH+ycH7IkKhTMSHs2501RCzVCZrg8MX+sUJX7qvsgXUHPiLE1uxfZUtFLengX9QZgcMu1K4rBA/O5e56h7GBgQ9N8KXoZEKNxZz4bA4hCu13KDwBnzzZKGCLwdcoH4BXxZERuPU0RA7fKfLkDgu1TY1Dzxls9ok9Al8BJ1GQ6YYQNvWLJhLCzN9FxTMnYXLSUq12WgbmwNzi+/TkzJFVS7DPdVIZKiFDYa63rbR+8TBlcWZarTE4AQ6DBVk1Z6/ISRL/N0N4cCWlnobQrqu1Jkj5V89MdBgSdBl9Cp6SmeGnF5MRwdQfV6TlBc3Mxwz3wTxMUf7rP6Ki0Brc/T8PuCdb++Gvj0/t5fdPmTpWYyZrr7KSWlKqVp7J5FEW9EzpZuC7aVrhTsuzS3C0v165hbhgTodBLAYCYsKNOdlzhQVaDHUl+x8trllKhgsbAosGCyMCiTqt5wK5HufX2FVINWH9prapBedoTpnXws0mMksFHGlpq/RSrwraG83cc/2vNv6Q9eb8247r0C+YGOwqO2+jbzw5QO4Me+2vgJnNgSLlXdBLJKdd9eVvfOYVTLz7rqyHOMfyHKlrv4uSYa8ejIfIO5g8+766Vkl+zDBovYn78Dl3Y2nyfkL0XTuUh+Tdys9Y7kZPFhYPK1HwIfQTYR/5Pub7Mx1ZBcHz7u9LkO8ptlVEdcd+GsZLraCK6AC7d5JfKD4eyDmwIOF4UP7t8B5t8EKEgz84SGny5Bo59W2NBc4WHiN9/DlqNe0m3jxxGnajefdXne/eN7tdhmiebeDC6YXoK7UbdoN591ed79E3q1taS5w3u119wvn3W7Tbjjvdpt2H5oEom1oEARBEARBEARBEARBEARBkE+HHgYnD71baxB1pdqmZvL9daV4MZTXC264CcHtBXfpvzNnj6gr/cVrXSleDOX1ghv/S3peC9rwv6SnbWku319Xigp0+gc4mLpSr/Eed6Ve4z2ed2tbmgucd3uN93De7baAHa+c9Rrv8SYEr5WzeN6tbWkucLBwWzmLBgu3Gwv40R238R7Pu7UNzQYV6HZj0dUgbuN9EARBEARBEATB/8A/RPM4XilEn7EAAAAASUVORK5CYII=" alt="" style="margin-right: 10px;">
                            @else
                                {{$match['enemy_team_logo']}}
                            @endif
                            <a href="{{route('team',$match['enemy_team_id'])}}" style="text-decoration: none; color: #212529">{{$match['enemy_team']}}</a>
                        </div>
                        <div class="date"><i class="icofont-ui-calendar"></i> {{$match['date']}}</div>
                    </div>
                    @endforeach
                @else
                    <div class="card-match">
                        Brak ostatnich meczy
                    </div>
                @endif
            </div>
            <div class="collapse-item players-wrapper"  style="display: none">
                @if(isset($team['players']))

                    <div class="row">
                    @foreach($team['players'] as $player)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="card-player">
                                <div class="img-wrapper" style="background-image: url({{ Storage::url('images/players/'.$player['photo']) }})"></div>
                                <div class="info-wrapper">
                                    <div class="name">{{$player['name']}} {{$player['surname']}}</div>
                                    <div class="birth">{{$player['birth']}}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                @else
                    <div class="card-player" style="flex:1;">Brak zawodników</div>
                @endif
            </div>
        </div>
    </div>
</div>
</section>

@endsection
