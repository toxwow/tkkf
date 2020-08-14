@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
           <p>Panel zarządzania:</p>
            @if($user->role === 'admin')
            <ul>
                <li><a href="{{route('artykuly')}}">Artykuly</a></li>
            </ul>
            @else
                Brak uprawnień
            @endif
        </div>
    </div>
</div>
@endsection
