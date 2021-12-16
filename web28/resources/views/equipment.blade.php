@extends('layout')
@section('title','Оборудование')




@section('content')


    @foreach($equipment as $equip)
        <!--Секция4-->
        <section class="wrapper">
            <div class="wrapperBorder">


                <div class="wrapperUp">{{$equip->title}}</div>
                <div class="wrapperEquipment">
                    <img src="{{$equip->img}}" alt="">

                    <div class="wrapperData">{{$equip->created_at}}</div>
                </div>
            </div>
            <div class="wrapperText">{{mb_substr($equip->body,0,800)}}
                <div class="wrapperNext">
                    <a class="wrapperLink" href="{{route('single_equipment',$equip->id)}}">Читать полностью</a>
                </div>
            </div>
        </section>

    @endforeach
    <ul class="pagination">
        @if($equipment->currentPage() !=1)
            <li class="nextLink"><a class="pageNext" href="?page=1">Начало</a></li>
            <li class="nextLink"><a class="pageNext" href="{{$equipment->previousPageUrl()}}">&larr;</a></li>
        @endif
        @if($equipment->count()>1)
            @for($count=1;$count<=$equipment->lastPage();$count++)
                @if($count > $equipment->currentPage()-3 and $count < $equipment->currentPage() +3)
                    <li class="nextLink @if($count==$equipment->currentPage()) active @endif")><a class="pageNext" href="?page={{$count}}">{{$count}}</a></li>
                @endif
            @endfor

        @endif
        @if($equipment->currentPage() != $equipment->lastPage())
            <li class="nextLink"><a class="pageNext" href="{{$equipment->nextPageUrl()}}">&rarr;</a></li>
            <li class="nextLink"><a class="pageNext" href="?page={{$equipment->lastPage()}}">Конец</a></li>
        @endif

    </ul>
@endsection
