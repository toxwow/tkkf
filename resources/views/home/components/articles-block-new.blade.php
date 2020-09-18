@push('scripts')
    <script>
        var countArtcile = {!! json_encode($articles->count()) !!};
    </script>
    <script src="{{ asset('js/home/articles-block-new.js') }}" defer></script>
@endpush

            <div class="articles-container">
                <div class="articles-wrapper" style="width: {{$articles->count().'00%'}}">
                    <div class="black-mask"></div>
                    @foreach($articles as $article)
                        <div class="articles" style="background-image: url('{{Storage::url('images/articles/'.$article->photo)}}')">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="{{route('article', $article->id)}}" class="article-item">
                                            <div class="title-wrapper">
                                                <div class="article-category"><p>{{$article->category}}</p></div>
                                                <h3 class="article-title">{{$article->title}}</h3>
                                                <p class="article-subtitle">{{$article->subtitle}}</p>
                                                <div class="info">
                                                    <div class="article-author">{{$article->author}}</div>
                                                    <div class="article-date">{{$article->created_at->format('d.m.Y')}}</div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="navigation-panel">
                    <div class="nav-arrow left"><i class="icofont-rounded-left"></i></div>
                    <div class="nav-arrow right"><i class="icofont-rounded-right"></i></div>
                </div>
            </div>
            <div class="nav-lines">
                @for($i = 0; $i < $articles->count(); $i++)
                    @if($i == 0)
                        <div class="line active"></div>
                    @else
                        <div class="line"></div>
                    @endif
                @endfor
            </div>


