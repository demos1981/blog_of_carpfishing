@extends('layout')
@section('title','Редактировать')

@section('content')




    <section class="wrapper">
        <div class="wrapperBorder">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="add_logistic" method="POST" enctype="multipart/form-data">
                @csrf
                {{csrf_field()}}
                <h1>Добавить в раздел "Лайфхаки"</h1>
                <select name="author_id">
                    @foreach($authors as $author)
                        <option @if($author->id==$logistic->author_id) selected @endif value="{{$author->id}}">{{$author->name}}</option>
                    @endforeach
                </select>
                <input type="hidden" name="id" value="{{$logistic->id}}">
                <input type="text" placeholder="News Title" name="title" value="{{$logistic->title}}">
                <textarea placeholder="News Body" name="body">{{$logistic->body}}</textarea>
                <input type="file" name="image">
                <input type="submit" value="Сохранить">


            </form>



        </div>


    </section>
@endsection
