<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="articles-container">
                <a href="{{route('article', $articles->first()->id)}}" class="first-article" style="background-image: url('{{Storage::url('images/articles/'.$articles->first()->photo)}}')">
                    <div class="title-wrapper">
                        <p class="article-title">{{$articles->first()->title}}</p>
                        <p class="article-subtitle">{{$articles->first()->subtitle}}</p>
                    </div>
                </a>
                <div class="rest-articles">
                    @foreach($articles as $article)
                        @if ($loop->first) @continue @endif
                            <a href="{{route('article', $article->id)}}" class="article-item">
                                <div class="title-wrapper">
                                    <div class="article-category"><p>{{$article->category}}</p></div>
                                    <div class="article-title">{{$article->title}}</div>
                                    <div class="article-date">{{$article->created_at->format('d.m.Y')}}</div>
                                </div>
                                <div class="img-wrapper" style="background-image: url('{{Storage::url('images/articles/'.$article->photo)}}')"></div>
                            </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
