
@extends('layout')
@section('title','Посты автора')
@section('content')



    @foreach($author->news as $new)

        <section class="wrapper">
            <div class="wrapperBorder"><h1 style="color:mediumvioletred"class="wrapperAuthor">Все новости автора<h3 style="color:green"> {{$author->name}}</h3></h1>
                <div class="wrapperUp">{{$new->title}}</div>
                <div class="wrapperManifest">
                    <img src="{{$new->img}}" alt="">
                </div>
                <div class="wrapperData">{{$new->created_at}}

                </div>

            </div>
            <div class="wrapperText">{{mb_substr($new->body,0, 500)}}...
                <div class="wrapperNext">
                    <a class="wrapperLink" href="{{route('single_news',$new->id)}}">Читать полностью</a>
                </div>
            </div>
        </section>
    @endforeach

@endsection
