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
                            <p class="title">Dodaj użytkownika</p>
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
                    <form method="post" action="{{ route('uzytkownicy.store') }}" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group">
                            <label for="name">Imię:</label>
                            <input type="text" class="form-control" name="name"/>
                        </div>
                        <div class="form-group">
                            <label for="surname">Nazwisko</label>
                            <input type="text" class="form-control" name="surname"/>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" name="email"/>
                        </div>
                        <div class="form-group">
                            <label for="birth">Telefon</label>
                            <input type="phone" class="form-control" name="birth"/>
                        </div>
                        <div class="form-group">
                            <label for="role">Uprawnienia</label>
                            <select  class="form-control" name="role">
                                <option value="admin">Admin</option>
                                <option value="capitan">Kapitan</option>
                                <option value="user">Użytkownik</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Dodaj użytkownika</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
