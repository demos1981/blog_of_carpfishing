
@extends('layout')
@section('title','Добавить')

@section('content')

    <!--Секция1-->

    <section class="wrapper">
    <h1>
        Удаление (редактирование) новостей
    </h1>
        <table class="table table-hover-dark">
            <thead>
             <tr>
               <th scope="col">ID</th>
                 <th scope="col">TITLE</th>
                  <th scope="col"></th>


             </tr>
            </thead>
            <tbody>


            @foreach($news as $n)
            <tr>
                <th scope="row">{{$n->id}}</th>
                <td>{{$n->title}}</td>
                <td>
                    <form action="/Admin/edit_news/{{$n->id}}" method="get">
                        <input type="hidden" name="id" value="{{$n->id}}">
                        <button type="submit" class="btn btn-outline-danger">EDIT</button>
                    </form>
                </td>
                <td>
                    <form action="" method="post">
                        {{csrf_field()}}
                        {{method_field('delete')}}
                        <input type="hidden" name="id" value="{{$n->id}}">
                        <button type="submit" class="btn btn-outline-danger">DELETE</button>

                    </form>
                </td>


            </tr>
            @endforeach
            </tbody>
        </table>

    </section>
@endsection
