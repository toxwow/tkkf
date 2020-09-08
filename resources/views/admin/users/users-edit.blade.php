@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <div class="content-header">
                    <div class="content-title">
                        <div class="icon-wrapper">
                            <i class="icofont-user"></i>
                        </div>
                        <div class="text-wrapper">
                            <p class="title">Edytuj profil</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <form method="post" action="{{ route('uzytkownicy.update', $selectUser->id) }}">
                        @method('PATCH')
                        @csrf

                        <div class="form-group">
                            <label for="name">Imię:</label>
                            <input type="text" class="form-control" name="name" value="{{$selectUser->name}}"/>
                        </div>
                        <div class="form-group">
                            <label for="surname">Nazwisko</label>
                            <input type="text" class="form-control" name="surname" value="{{$selectUser->surname}}"/>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" name="email" value="{{$selectUser->email}}"/>
                        </div>

                        <div class="form-group">
                            <label for="new_password">Nowe hasło</label>
                            <input  type="password" class="form-control" name="new_password"/>
                        </div>

                        <div class="form-group">
                            <label for="password_confirm">Powtórz hasło</label>
                            <input type="password" class="form-control" name="password_confirm"/>
                        </div>

                        <div class="form-group">
                            <label for="phone">Telefon</label>
                            <input type="phone" class="form-control" name="phone" value="{{$selectUser->phone}}"/>
                        </div>
                        @if($user->isAdmin())
                            <div class="form-group">
                                <label for="role">Uprawnienia</label>
                                <select  class="form-control" name="role">
                                    @if($selectUser->role === 'admin' )
                                        <option value="admin" selected>Admin</option>
                                        <option value="capitan">Kapitan</option>
                                        <option value="user">Użytkownik</option>
                                    @elseif($selectUser->role === 'capitan')
                                        <option value="admin">Admin</option>
                                        <option value="capitan" selected>Kapitan</option>
                                        <option value="user">Użytkownik</option>
                                    @else
                                        <option value="capitan" >Kapitan</option>
                                        <option value="admin">Admin</option>
                                        <option value="user" selected>Użytkownik</option>
                                    @endif

                                </select>
                            </div>
                        @endif


                        <button type="submit" class="btn btn-primary w-100">Edytuj profil</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
