
@extends('layout')
@section('title','Новость полностью')
@section('content')




    <section class="wrapperSingle">

            <div class="wrapperBorderSingle">
                <div class="wrapperUpSingle">{{$news->title}}</div>
                <div class="wrapperManifestSingle">
                    <img src="{{$news->img}}" alt="">

                  <div class="wrapperDataSingle">{{$news->created_at}}
                    <a href="{{route('news_by_authors',$news->author->key)}}">{{$news->author->name}}</a>
                  </div>
                </div>
            </div>
                <div class="wrapperTextSingle">{{$news->body}}</div>


    </section>
@endsection
