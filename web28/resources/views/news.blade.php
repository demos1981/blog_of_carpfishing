
@extends('layout')
@section('title','Новости')
@section('content')



@foreach($news as $new)

    <section class="wrapper">
        <div class="wrapperBorder">
            <div class="wrapperUp">{{$new->title}}</div>
            <div class="wrapperManifest">
                <img src="{{$new->img}}" alt="">

            <div class="wrapperData">{{$new->created_at}} </div>
                <a href="{{route('news_by_authors',$new->author->key)}}">{{$new->author->name}}</a>

            </div>
        </div>
        <div class="wrapperText">{{mb_substr($new->body,0, 800)}}...
            <div class="wrapperNext">
                <a class="wrapperLink" href="{{route('single_news',$new->id)}}">Читать полностью</a>
            </div>

        </div>

    </section>
@endforeach
<ul class="pagination">
    @if($news->currentPage() !=1)
    <li class="nextLink"><a class="pageNext" href="?page=1">Начало</a></li>
        <li class="nextLink"><a class="pageNext" href="{{$news->previousPageUrl()}}">&larr;</a></li>
    @endif
    @if($news->count()>1)
        @for($count=1;$count<=$news->lastPage();$count++)
            @if($count > $news->currentPage()-3 and $count < $news->currentPage() +3)
                <li class="nextLink @if($count==$news->currentPage()) active @endif")><a class="pageNext" href="?page={{$count}}">{{$count}}</a></li>
                @endif
            @endfor

        @endif
        @if($news->currentPage() != $news->lastPage())
            <li class="nextLink"><a class="pageNext" href="{{$news->nextPageUrl()}}">&rarr;</a></li>
            <li class="nextLink"><a class="pageNext" href="?page={{$news->lastPage()}}">Конец</a></li>
            @endif

</ul>

@endsection
