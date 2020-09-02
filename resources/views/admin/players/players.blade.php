@extends('layouts.admin')

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
        <div class="col-12">
            @foreach($leagues as $league)
                <h4>{{$league -> name}}</h4>
                @foreach($league->team as $team)
                <div style="margin-bottom: 20px">
                    <div style="background-color: #57abff; padding: 10px 30px; display: flex; align-items: center; justify-content: space-between">
                        <h3 style="margin-bottom: 0;">{{$team -> name}}</h3>
                    </div>
                    <table class="table table-dark table-striped" style="margin-bottom: 0">
                        <thead>
                        <tr>
                            <td scope="col">ID</td>
                            <td scope="col">Zdjęcie</td>
                            <td scope="col">Imię</td>
                            <td scope="col">Nazwisko</td>
                            <td scope="col">Data urodzenia</td>
                            <td>Actions</td>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($team->players as $player)
                                <tr>
                                    <td>{{$player -> id}}</td>
                                    <td><img src="{{ Storage::url('images/players/'.$player->photo) }}" alt="" width="100px"></td>
                                    <td>{{$player -> name}}</td>
                                    <td>{{$player -> surname}}</td>
                                    <td>
                                        @if($player->birth === null)
                                            brak daty urodzenia
                                        @else
                                            {{$player -> birth}}
                                        @endif
                                    </td>
                                    <td style="display: flex"> <a href="{{ route('zawodnik.edit', $player -> id)}}" class="btn btn-primary mr-3">Edytuj zawodnika</a>
                                        <form action="{{ route('zawodnik.destroy', $player -> id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Usuń zawodnika</button>
                                        </form>
                                    </td>

                                </tr>

                            @endforeach



                        </tbody>
                    </table>

                    <div style="width: 100%; background-color: greenyellow; padding: 10px 0; text-align: center"><a href="{{route('zawodnik.create', 'team='.$team->id)}}">dodaj zawodnika </a></div>
                </div>

                @endforeach
            @endforeach

        </div>
    </div>
</div>
@endsection

