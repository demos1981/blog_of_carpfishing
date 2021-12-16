
@extends('layout')
@section('title','Обзор полностью')
@section('content')




    <section class="wrapperSingle">

        <div class="wrapperBorderSingle">
            <div class="wrapperUpSingle">{{$lifehack->title}}</div>
            <div class="wrapperManifestSingle">
                <img src="{{$lifehack->img}}" alt="">

                <div class="wrapperDataSingle">{{$lifehack->created_at}}
                    <a href="{{route('news_by_authors',$lifehack->author->key)}}">{{$lifehack->author->name}}</a>
                </div>
            </div>
        </div>
        <div class="wrapperTextSingle">{{$lifehack->body}}</div>


    </section>
@endsection
