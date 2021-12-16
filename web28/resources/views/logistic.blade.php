@extends('layout')
@section('title','Логистика')




@section('content')


    @foreach($logic as $logistic)
        <!--Секция4-->
        <section class="wrapper">
            <div class="wrapperBorder">


                <div class="wrapperUp">{{$logistic->title}}</div>
                <div class="wrapperEquipment">
                    <img src="{{$logistic->img}}" alt="">

                    <div class="wrapperData">{{$logistic->created_at}}</div>
                </div>
            </div>
            <div class="wrapperText">{{mb_substr($logistic->body,0,800)}}
                <div class="wrapperNext">
                    <a class="wrapperLink" href="{{route('single_logistic',$logistic->id)}}">Читать полностью</a>
                </div>
            </div>
        </section>

    @endforeach
    <ul class="pagination">
        @if($logic->currentPage() !=1)
            <li class="nextLink"><a class="pageNext" href="?page=1">Начало</a></li>
            <li class="nextLink"><a class="pageNext" href="{{$logic->previousPageUrl()}}">&larr;</a></li>
        @endif
        @if($logic->count()>1)
            @for($count=1;$count<=$logic->lastPage();$count++)
                @if($count > $logic->currentPage()-3 and $count < $logic->currentPage() +3)
                    <li class="nextLink @if($count==$logic->currentPage()) active @endif")><a class="pageNext" href="?page={{$count}}">{{$count}}</a></li>
                @endif
            @endfor

        @endif
        @if($logic->currentPage() != $logic->lastPage())
            <li class="nextLink"><a class="pageNext" href="{{$logic->nextPageUrl()}}">&rarr;</a></li>
            <li class="nextLink"><a class="pageNext" href="?page={{$logic->lastPage()}}">Конец</a></li>
        @endif

    </ul>
@endsection
