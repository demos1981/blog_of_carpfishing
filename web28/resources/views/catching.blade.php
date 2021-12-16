@extends('layout')
@section('title','Ловля')




@section('content')


    @foreach($catching as $catch)
        <!--Секция4-->
        <section class="wrapper">
            <div class="wrapperBorder">


                <div class="wrapperUp">{{$catch->title}}</div>
                <div class="wrapperEquipment">
                    <img src="{{$catch->img}}" alt="">

                    <div class="wrapperData">{{$catch->created_at}}</div>
                </div>
            </div>
            <div class="wrapperText">{{mb_substr($catch->body,0,800)}}
                <div class="wrapperNext">
                    <a class="wrapperLink" href="{{route('single_catching',$catch->id)}}">Читать полностью</a>
                </div>
            </div>
        </section>

    @endforeach
    <ul class="pagination">
        @if($catching->currentPage() !=1)
            <li class="nextLink"><a class="pageNext" href="?page=1">Начало</a></li>
            <li class="nextLink"><a class="pageNext" href="{{$catching->previousPageUrl()}}">&larr;</a></li>
        @endif
        @if($catching->count()>1)
            @for($count=1;$count<=$catching->lastPage();$count++)
                @if($count > $catching->currentPage()-3 and $count < $catching->currentPage() +3)
                    <li class="nextLink @if($count==$catching->currentPage()) active @endif")><a class="pageNext" href="?page={{$count}}">{{$count}}</a></li>
                @endif
            @endfor

        @endif
        @if($catching->currentPage() != $catching->lastPage())
            <li class="nextLink"><a class="pageNext" href="{{$catching->nextPageUrl()}}">&rarr;</a></li>
            <li class="nextLink"><a class="pageNext" href="?page={{$catching->lastPage()}}">Конец</a></li>
        @endif

    </ul>
@endsection
