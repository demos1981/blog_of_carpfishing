
@extends('layout')
@section('title','Обзор полностью')
@section('content')




    <section class="wrapperSingle">

        <div class="wrapperBorderSingle">
            <div class="wrapperUpSingle">{{$logistic->title}}</div>
            <div class="wrapperManifestSingle">
                <img src="{{$logistic->img}}" alt="">

                <div class="wrapperDataSingle">{{$logistic->created_at}}
                    <a href="{{route('news_by_authors',$logistic->author->key)}}">{{$logistic->author->name}}</a>
                </div>
            </div>
        </div>
        <div class="wrapperTextSingle">{{$logistic->body}}</div>


    </section>
@endsection
