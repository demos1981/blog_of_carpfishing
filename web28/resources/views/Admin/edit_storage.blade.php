
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

            <form action="add_storage" method="POST" enctype="multipart/form-data">
                @csrf
                {{csrf_field()}}
                <h1>Добавить в раздел "Хранение"</h1>
                <select name="author_id">
                    @foreach($authors as $author)
                        <option @if($author->id==$storage->author_id) selected @endif value="{{$author->id}}">{{$author->name}}</option>
                    @endforeach
                </select>
                <input type="hidden" name="id" value="{{$storage->id}}">
                <input type="text" placeholder="News Title" name="title" value="{{$storage->title}}">
                <textarea placeholder="News Body" name="body">{{$storage->body}}</textarea>
                <input type="file" name="image">
                <input type="submit" value="Сохранить">


            </form>



        </div>


    </section>
@endsection
