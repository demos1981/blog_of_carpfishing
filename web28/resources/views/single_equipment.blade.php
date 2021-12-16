
@extends('layout')
@section('title','Полностью Оборудование')
@section('content')




    <section class="wrapperSingle">

        <div class="wrapperBorderSingle">
            <div class="wrapperUpSingle">{{$equipment->title}}</div>
            <div class="wrapperManifestSingle">
                <img src="{{$equipment->img}}" alt="">

                <div class="wrapperDataSingle">{{$equipment->created_at}}

                    {{-- <a href="{{route('news_by_authors',$ivent->author->key)}}">{{$ivent->author->name}}</a>--}}
                </div>
            </div>
        </div>
        <div class="wrapperTextSingle">{{$equipment->body}}</div>


    </section>
@endsection
