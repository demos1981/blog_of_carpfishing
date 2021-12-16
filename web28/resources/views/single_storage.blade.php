
@extends('layout')
@section('title','Хранение полностью')
@section('content')




    <section class="wrapperSingle">

        <div class="wrapperBorderSingle">
            <div class="wrapperUpSingle">{{$storage->title}}</div>
            <div class="wrapperManifestSingle">
                <img src="{{$storage->img}}" alt="">

                <div class="wrapperDataSingle">{{$storage->created_at}}
                    <a href="{{route('news_by_authors',$storage->author->key)}}">{{$storage->author->name}}</a>
                </div>
            </div>
        </div>
        <div class="wrapperTextSingle">{{$storage->body}}</div>


    </section>
@endsection
