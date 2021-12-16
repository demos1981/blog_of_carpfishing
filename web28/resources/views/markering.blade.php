@extends('layout')
@section('title','Маркерение')




@section('content')


    @foreach($markering as $marker)
        <!--Секция4-->
        <section class="wrapper">
            <div class="wrapperBorder">


                <div class="wrapperUp">{{$marker->title}}</div>
                <div class="wrapperEquipment">
                    <img src="{{$marker->img}}" alt="">

                    <div class="wrapperData">{{$marker->created_at}}</div>
                </div>
            </div>
            <div class="wrapperText">{{mb_substr($marker->body,0,800)}}
                <div class="wrapperNext">
                    <a class="wrapperLink" href="{{route('single_markering',$marker->id)}}">Читать полностью</a>
                </div>
            </div>
        </section>

    @endforeach
    <ul class="pagination">
        @if($markering->currentPage() !=1)
            <li class="nextLink"><a class="pageNext" href="?page=1">Начало</a></li>
            <li class="nextLink"><a class="pageNext" href="{{$markering->previousPageUrl()}}">&larr;</a></li>
        @endif
        @if($markering->count()>1)
            @for($count=1;$count<=$markering->lastPage();$count++)
                @if($count > $markering->currentPage()-3 and $count < $markering->currentPage() +3)
                    <li class="nextLink @if($count==$markering->currentPage()) active @endif")><a class="pageNext" href="?page={{$count}}">{{$count}}</a></li>
                @endif
            @endfor

        @endif
        @if($markering->currentPage() != $markering->lastPage())
            <li class="nextLink"><a class="pageNext" href="{{$markering->nextPageUrl()}}">&rarr;</a></li>
            <li class="nextLink"><a class="pageNext" href="?page={{$markering->lastPage()}}">Конец</a></li>
        @endif

    </ul>
@endsection
