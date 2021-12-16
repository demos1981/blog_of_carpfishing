
@extends('layout')
@section('title','Блог Карпфишера')
@section('content')

<!--Секция1-->
@foreach($index as $home)
    <section class="wrapper">
     <div class="wrapperBorder">

        <div class="wrapperUp">{{$home->title}}</div>

        <div class="wrapperSlider">

            <img src="{{$home->img}}" alt="">

           <div class="wrapperData">{{$home->created_at}}

           </div>
        </div>


    </div>

    <div class="wrapperText">{{mb_substr($home->body,0,800)}}
        <div class="wrapperNext">
            <a class="wrapperLink" href="{{route('single_index',$home->id)}}">Читать полностью</a>
        </div>
    </div>
    </section>

@endforeach
<ul class="pagination">
    @if($index->currentPage() !=1)
        <li class="nextLink"><a class="pageNext" href="?page=1">Начало</a></li>
        <li class="nextLink"><a class="pageNext" href="{{$index->previousPageUrl()}}">&larr;</a></li>
    @endif
    @if($index->count()>1)
        @for($count=1;$count<=$index->lastPage();$count++)
            @if($count > $index->currentPage()-3 and $count < $index->currentPage() +3)
                <li class="nextLink @if($count==$index->currentPage()) active @endif")><a class="pageNext" href="?page={{$count}}">{{$count}}</a></li>
            @endif
        @endfor

    @endif
    @if($index->currentPage() != $index->lastPage())
        <li class="nextLink"><a class="pageNext" href="{{$index->nextPageUrl()}}">&rarr;</a></li>
        <li class="nextLink"><a class="pageNext" href="?page={{$index->lastPage()}}">Конец</a></li>
    @endif

</ul>
@endsection

