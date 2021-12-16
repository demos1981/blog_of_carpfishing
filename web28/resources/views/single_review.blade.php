
@extends('layout')
@section('title','Обзор полностью')
@section('content')




    <section class="wrapperSingle">

        <div class="wrapperBorderSingle">
            <div class="wrapperUpSingle">{{$review->title}}</div>
            <div class="wrapperManifestSingle">
                <img src="{{$review->img}}" alt="">

                <div class="wrapperDataSingle">{{$review->created_at}}
                    <a href="{{route('news_by_authors',$review->author->key)}}">{{$review->author->name}}</a>
                </div>
            </div>
        </div>
        <div class="wrapperTextSingle">{{$review->body}}</div>


    </section>
@endsection
