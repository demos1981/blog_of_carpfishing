
@extends('layout')
@section('title','Обзор полностью')
@section('content')




    <section class="wrapperSingle">

        <div class="wrapperBorderSingle">
            <div class="wrapperUpSingle">{{$markering->title}}</div>
            <div class="wrapperManifestSingle">
                <img src="{{$markering->img}}" alt="">

                <div class="wrapperDataSingle">{{$markering->created_at}}
                   {{-- <a href="{{route('news_by_authors',$markering->author->key)}}">{{$markering->author->name}}</a>--}}
                </div>
            </div>
        </div>
        <div class="wrapperTextSingle">{{$markering->body}}</div>


    </section>
@endsection
