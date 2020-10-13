@extends('layouts.admin')
@push('scripts')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script src="{{ asset('js/admin/articles.js') }}" defer></script>
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
                <div class="content-header">
                    <div class="content-title">
                        <div class="icon-wrapper">
                            <i class="icofont-newspaper"></i>
                        </div>
                        <div class="text-wrapper">
                            <p class="title">Dodaj artykuł</p>
                            <p class="sub-title">lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        </div>
                    </div>
                </div>
                <div class="card-box">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif
                    <form method="post" action="{{ route('artykuly.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="author">Autor:</label>
                            <input type="text" class="form-control" name="author" value="{{$user->name}}"/>
                        </div>

                        <div class="form-group">
                            <label for="photo">Zdjęcie</label>
                            <input type="file" class="form-control" name="photo"/>
                        </div>

                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select  class="form-control" name="status">
                                <option value="widoczny">Widoczny</option>
                                <option value="niewidoczny">Niewidoczny</option>
                            </select>
                        </div>


                        <div class="form-check my-4">
                            <input class="form-check-input" type="checkbox" value="" id='checkboximporant' name="important">
                            <label class="form-check-label" for="checkboximporant">
                                Ważny artykuł (na pierwszym miejscu)
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="category">Kategoria:</label>
                            <input type="text" class="form-control" name="category"/>
                        </div>

                        <div class="form-group">
                            <label for="title">Tytuł:</label>
                            <input type="text" class="form-control" name="title"/>
                        </div>

                        <div class="form-group">
                            <label for="subtitle">Pod tytuł:</label>
                            <input type="text" class="form-control" name="subtitle"/>
                        </div>

                        <div class="form-group">
                            <label for="content">Treść:</label>
                            <textarea type="text" class="form-control ckeditor" name="content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Dodaj artykuł</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
