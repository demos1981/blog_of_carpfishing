
@extends('layout')
@section('title','Полностью Ловля')
@section('content')




    <section class="wrapperSingle">

        <div class="wrapperBorderSingle">
            <div class="wrapperUpSingle">{{$catching->title}}</div>
            <div class="wrapperManifestSingle">
                <img src="{{$catching->img}}" alt="">

                <div class="wrapperDataSingle">{{$catching->created_at}}

                    {{-- <a href="{{route('news_by_authors',$ivent->author->key)}}">{{$ivent->author->name}}</a>--}}
                </div>
            </div>
        </div>
        <div class="wrapperTextSingle">{{$catching->body}}</div>


    </section>
@endsection
