@extends('layout')
@section('title','Обзоры')




@section('content')

    @foreach($review as $items)

        <section class="wrapper">
        <div class="wrapperBorder">
            <div class="wrapperUp">{{$items->title}}</div>
            <div class="wrapperHistory">
                <img src="{{$items->img}}" alt="">

            <div class="wrapperData">{{$items->created_at}}</div>
               {{-- <a href="{{route('news_by_authors',$items->author->key)}}">{{$items->author->name}}</a> --}}
            </div>

        </div>
        <div class="wrapperText">{{mb_substr($items->body,0,800)}}

            <div class="wrapperNext">
                <a class="wrapperLink" href="{{route('single_review',$items->id)}}">Читать полностью</a>
            </div>
        </div>
        </section>
    @endforeach
    <ul class="pagination">
        @if($review->currentPage() !=1)
            <li class="nextLink"><a class="pageNext" href="?page=1">Начало</a></li>
            <li class="nextLink"><a class="pageNext" href="{{$review->previousPageUrl()}}">&larr;</a></li>
        @endif
        @if($review->count()>1)
            @for($count=1;$count<=$review->lastPage();$count++)
                @if($count > $review->currentPage()-3 and $count < $review->currentPage() +3)
                    <li class="nextLink @if($count==$review->currentPage()) active @endif")><a class="pageNext" href="?page={{$count}}">{{$count}}</a></li>
                @endif
            @endfor

        @endif
        @if($review->currentPage() != $review->lastPage())
            <li class="nextLink"><a class="pageNext" href="{{$review->nextPageUrl()}}">&rarr;</a></li>
            <li class="nextLink"><a class="pageNext" href="?page={{$review->lastPage()}}">Конец</a></li>
        @endif

    </ul>
@endsection
