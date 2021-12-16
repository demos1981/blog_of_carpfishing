
@extends('layout')
@section('title','Полностью Ивенты')
@section('content')




    <section class="wrapperSingle">

        <div class="wrapperBorderSingle">
            <div class="wrapperUpSingle">{{$ivent->title}}</div>
            <div class="wrapperManifestSingle">
                <img src="{{$ivent->img}}" alt="">

                <div class="wrapperDataSingle">{{$ivent->created_at}}

                   {{-- <a href="{{route('news_by_authors',$ivent->author->key)}}">{{$ivent->author->name}}</a>--}}
                </div>
            </div>
        </div>
        <div class="wrapperTextSingle">{{$ivent->body}}</div>


    </section>
@endsection
