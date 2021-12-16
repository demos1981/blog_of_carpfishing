
@extends('layout')
@section('title','Добавить')

@section('content')

    <!--Секция1-->

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
            @if(\Auth::check())
                <form action="add_review" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{csrf_field()}}
                    <h1>Добавить в раздел "Обзоры"</h1>
                    <select name="author_id">
                        @foreach($authors as $auth)
                            <option value="{{$auth->id}}">{{$auth->name}}</option>
                        @endforeach
                    </select>
                    <input type="text" placeholder="News Title" name="title">
                    <textarea placeholder="News Body" name="body"></textarea>
                    <input type="file" name="image">
                    <input type="submit" value="Сохранить">


                </form>
            @endif


        </div>


    </section>



@endsection
