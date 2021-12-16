
@extends('layout')
@section('title','Полностью Главная')
@section('content')




    <section class="wrapperSingle">

        <div class="wrapperBorderSingle">
            <div class="wrapperUpSingle">{{$index->title}}</div>
            <div class="wrapperManifestSingle">
                <img src="{{$index->img}}" alt="">

                <div class="wrapperDataSingle">{{$index->created_at}}

                    {{-- <a href="{{route('news_by_authors',$ivent->author->key)}}">{{$ivent->author->name}}</a>--}}
                </div>
            </div>
        </div>
        <div class="wrapperTextSingle">{{$index->body}}</div>


    </section>
@endsection
