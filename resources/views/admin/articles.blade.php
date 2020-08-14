@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
           <h2>Artykuly</h2>
            @if($user->role === 'admin')
                Zarządzaj
            <ul>

            </ul>
            @else
                Brak uprawnień
            @endif
        </div>
    </div>
</div>
@endsection
