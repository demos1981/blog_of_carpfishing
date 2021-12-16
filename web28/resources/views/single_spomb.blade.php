
@extends('layout')
@section('title','Обзор полностью')
@section('content')




    <section class="wrapperSingle">

        <div class="wrapperBorderSingle">
            <div class="wrapperUpSingle">{{$spomb->title}}</div>
            <div class="wrapperManifestSingle">
                <img src="{{$spomb->img}}" alt="">

                <div class="wrapperDataSingle">{{$spomb->created_at}}
                    <a href="{{route('news_by_authors',$spomb->author->key)}}">{{$spomb->author->name}}</a>
                </div>
            </div>
        </div>
        <div class="wrapperTextSingle">{{$spomb->body}}</div>


    </section>
@endsection
