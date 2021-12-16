@extends('layout')
@section('title','Ивенты')




@section('content')

    @foreach($ivent as $now)
        <section class="wrapper">
        <div class="wrapperBorder">
            <div class="wrapperUp">{{$now->title}}</div>
            <div class="wrapperSlider">
                <img src="{{$now->img}}" alt="">

              <div class="wrapperData">{{$now->created_at}}</div>

              </div>
        </div>

        </div>
        <div class="wrapperText">{{mb_substr($now->body,0,800)}}
            <div class="wrapperNext">
                <a class="wrapperLink" href="{{route('single_ivent',$now->id)}}">Читать полностью</a>
            </div>
        </div>
        </section>

    @endforeach
    <ul class="pagination">
        @if($ivent->currentPage() !=1)
            <li class="nextLink"><a class="pageNext" href="?page=1">Начало</a></li>
            <li class="nextLink"><a class="pageNext" href="{{$ivent->previousPageUrl()}}">&larr;</a></li>
        @endif
        @if($ivent->count()>1)
            @for($count=1;$count<=$ivent->lastPage();$count++)
                @if($count > $ivent->currentPage()-3 and $count < $ivent->currentPage() +3)
                    <li class="nextLink @if($count==$ivent->currentPage()) active @endif")><a class="pageNext" href="?page={{$count}}">{{$count}}</a></li>
                @endif
            @endfor

        @endif
        @if($ivent->currentPage() != $ivent->lastPage())
            <li class="nextLink"><a class="pageNext" href="{{$ivent->nextPageUrl()}}">&rarr;</a></li>
            <li class="nextLink"><a class="pageNext" href="?page={{$ivent->lastPage()}}">Конец</a></li>
        @endif

    </ul>
@endsection
