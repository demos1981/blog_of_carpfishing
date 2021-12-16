@extends('layout')
@section('title','Кормление')




@section('content')


    @foreach($spombing as $spomb)
        <!--Секция4-->
        <section class="wrapper">
            <div class="wrapperBorder">


                <div class="wrapperUp">{{$spomb->title}}</div>
                <div class="wrapperEquipment">
                    <img src="{{$spomb->img}}" alt="">

                    <div class="wrapperData">{{$spomb->created_at}}</div>
                </div>
            </div>
            <div class="wrapperText">{{mb_substr($spomb->body,0,800)}}
                <div class="wrapperNext">
                    <a class="wrapperLink" href="{{route('single_spomb',$spomb->id)}}">Читать полностью</a>
                </div>
            </div>
        </section>

    @endforeach
    <ul class="pagination">
        @if($spombing->currentPage() !=1)
            <li class="nextLink"><a class="pageNext" href="?page=1">Начало</a></li>
            <li class="nextLink"><a class="pageNext" href="{{$spombing->previousPageUrl()}}">&larr;</a></li>
        @endif
        @if($spombing->count()>1)
            @for($count=1;$count<=$spombing->lastPage();$count++)
                @if($count > $spombing->currentPage()-3 and $count < $spombing->currentPage() +3)
                    <li class="nextLink @if($count==$spombing->currentPage()) active @endif")><a class="pageNext" href="?page={{$count}}">{{$count}}</a></li>
                @endif
            @endfor

        @endif
        @if($spombing->currentPage() != $spombing->lastPage())
            <li class="nextLink"><a class="pageNext" href="{{$spombing->nextPageUrl()}}">&rarr;</a></li>
            <li class="nextLink"><a class="pageNext" href="?page={{$spombing->lastPage()}}">Конец</a></li>
        @endif

    </ul>
@endsection
