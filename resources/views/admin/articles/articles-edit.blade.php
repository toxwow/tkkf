@extends('layouts.admin')
@push('scripts')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script src="{{ asset('js/admin/articles.js') }}" defer></script>
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <div class="content-header">
                    <div class="content-title">
                        <div class="icon-wrapper">
                            <i class="icofont-newspaper"></i>
                        </div>
                        <div class="text-wrapper">
                            <p class="title">Edytuj artykuł</p>
                            <p class="sub-title">lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        </div>
                    </div>
                </div>
                <div class="card-box">
                        <div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div><br />
                            @endif
                                <form method="post" action="{{ route('artykuly.update', $article->id) }}" enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf
                                @csrf
                                <div class="form-group">
                                    <label for="author">Autor:</label>
                                    <input type="text" class="form-control" name="author" value="{{$article->author}}"/>
                                </div>

                                <div class="form-group">
                                    <label for="category">Kategoria:</label>
                                    <input type="text" class="form-control" name="category"  value="{{$article->category}}"/>
                                </div>

                                <div class="form-group">
                                    <label for="photo">Zmień zdjęcie</label>
                                    <input type="file" class="form-control" name="photo"/>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status:</label>
                                    <select  class="form-control" name="status">
                                        @if($article->status == 'widoczny')
                                            <option value="widoczny" selected>Widoczny</option>
                                            <option value="niewidoczny">Niewidoczny</option>
                                        @else
                                            <option value="widoczny">Widoczny</option>
                                            <option value="niewidoczny" selected>Niewidoczny</option>
                                        @endif

                                    </select>
                                </div>

                                <div class="form-check my-4">
                                    @if($article -> important)
                                    <input class="form-check-input" type="checkbox" checked value="" id='checkboximporant' name="important">

                                    @else
                                    <input class="form-check-input" type="checkbox" value="" id='checkboximporant' name="important">
                                    @endif
                                    <label class="form-check-label" for="checkboximporant">
                                        Ważny artykuł (na pierwszym miejscu)
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label for="title">Tytuł:</label>
                                    <input type="text" class="form-control" name="title"  value="{{$article->title}}"/>
                                </div>

                                <div class="form-group">
                                    <label for="subtitle">Podtytuł:</label>
                                    <input type="text" class="form-control" name="subtitle"  value="{{$article->subtitle}}"/>
                                </div>

                                <div class="form-group">
                                    <label for="content">Treść:</label>
                                    <textarea  type="text" class="form-control ckeditor" name="content">{{$article->content}}</textarea>
                                </div>

                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
