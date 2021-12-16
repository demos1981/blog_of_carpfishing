@extends('layout')
@section('title','Лайфхаки')




@section('content')


    @foreach($life as $hack)
    <!--Секция4-->
    <section class="wrapper">
        <div class="wrapperBorder">


            <div class="wrapperUp">{{$hack->title}}</div>
            <div class="wrapperEquipment">
                <img src="{{$hack->img}}" alt="">

            <div class="wrapperData">{{$hack->created_at}}</div>
                <a href="{{route('news_by_authors',$hack->author->key)}}">{{$hack->author->name}}</a>

            </div>
        </div>
        <div class="wrapperText">{{mb_substr($hack->body,0,800)}}
            <div class="wrapperNext">
                <a class="wrapperLink" href="{{route('single_lifehack',$hack->id)}}">Читать полностью</a>
            </div>
        </div>
    </section>

    @endforeach
    <ul class="pagination">
        @if($life->currentPage() !=1)
            <li class="nextLink"><a class="pageNext" href="?page=1">Начало</a></li>
            <li class="nextLink"><a class="pageNext" href="{{$life->previousPageUrl()}}">&larr;</a></li>
        @endif
        @if($life->count()>1)
            @for($count=1;$count<=$life->lastPage();$count++)
                @if($count > $life->currentPage()-3 and $count < $life->currentPage() +3)
                    <li class="nextLink @if($count==$life->currentPage()) active @endif")><a class="pageNext" href="?page={{$count}}">{{$count}}</a></li>
                @endif
            @endfor

        @endif
        @if($life->currentPage() != $life->lastPage())
            <li class="nextLink"><a class="pageNext" href="{{$life->nextPageUrl()}}">&rarr;</a></li>
            <li class="nextLink"><a class="pageNext" href="?page={{$life->lastPage()}}">Конец</a></li>
        @endif

    </ul>
@endsection
