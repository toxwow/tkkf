@extends('layouts.admin')
@push('scripts')

    <script src="{{ asset('js/admin/articles.js') }}" defer></script>

@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if(session()->get('success'))
                    <div class="alert alert-success mb-4">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
                <div class="content-header">
                    <div class="content-title">
                        <div class="icon-wrapper">
                            <i class="icofont-newspaper"></i>
                        </div>
                        <div class="text-wrapper">
                            <p class="title">Artykuły</p>
                            <p class="sub-title">lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        </div>
                    </div>
                    <div class="content-add">
                        <a href="/dodaj-artykul">
                            <i class="icofont-plus mr-2"></i> dodaj artykuł
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="table-wrapper table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>

                        <td>Tytuł</td>
                        <td>Data</td>
                        <td>Status</td>
                        <td colspan = 2>Actions</td>
                    </tr>
                    </thead>
                    <tbody class="">
                        @foreach($articles as $article)
                            <tr>
                                <td>
                                    @if($article->important)
                                        <i class="icofont-star"></i>
                                    @endif
                                        {{$article->title}}</td>
                                <td>{{$article->updated_at}}</td>
                                <td>{{$article->status}}</td>
                                <td class="d-flex">
                                    <a href="{{ route('artykuly.edit',$article->id)}}" class="btn btn-primary mr-3">Edytuj</a>

                                    @csrf
                                    <button class="btn btn-danger deleteArticle" data-id="{{ $article->id }}">Usuń</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination-wrapper">
                {{ $articles->links() }}
            </div>
        </div>
        </div>
        <ul>

        </ul>
</div>
@endsection

