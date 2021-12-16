@extends('layout')
@section('title','Хранение')




@section('content')


    @foreach($storages as $storage)
        <!--Секция4-->
        <section class="wrapper">
            <div class="wrapperBorder">


                <div class="wrapperUp">{{$storage->title}}</div>
                <div class="wrapperEquipment">
                    <img src="{{$storage->img}}" alt="">

                    <div class="wrapperData">{{$storage->created_at}}</div>
                </div>
            </div>
            <div class="wrapperText">{{mb_substr($storage->body,0,800)}}
                <div class="wrapperNext">
                    <a class="wrapperLink" href="{{route('single_storage',$storage->id)}}">Читать полностью</a>
                </div>
            </div>
        </section>

    @endforeach
    <ul class="pagination">
        @if($storages->currentPage() !=1)
            <li class="nextLink"><a class="pageNext" href="?page=1">Начало</a></li>
            <li class="nextLink"><a class="pageNext" href="{{$storages->previousPageUrl()}}">&larr;</a></li>
        @endif
        @if($storages->count()>1)
            @for($count=1;$count<=$storages->lastPage();$count++)
                @if($count > $storages->currentPage()-3 and $count < $storages->currentPage() +3)
                    <li class="nextLink @if($count==$storages->currentPage()) active @endif")><a class="pageNext" href="?page={{$count}}">{{$count}}</a></li>
                @endif
            @endfor

        @endif
        @if($storages->currentPage() != $storages->lastPage())
            <li class="nextLink"><a class="pageNext" href="{{$storages->nextPageUrl()}}">&rarr;</a></li>
            <li class="nextLink"><a class="pageNext" href="?page={{$storages->lastPage()}}">Конец</a></li>
        @endif

    </ul>
@endsection
