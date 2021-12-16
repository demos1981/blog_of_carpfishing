
@extends('layout')
@section('title','Добавить')

@section('content')

    <!--Секция1-->

    <section class="wrapper">
        <h1>
            Удаление (редактирование) Лайфхаков
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


            @foreach($lifehack as $lif)
                <tr>
                    <th scope="row">{{$lif->id}}</th>
                    <td>{{$lif->title}}</td>
                    <td>
                        <form action="/Admin/edit_lifehack/{{$lif->id}}" method="get">
                            <input type="hidden" name="id" value="{{$lif->id}}">
                            <button type="submit" class="btn btn-outline-danger">EDIT</button>
                        </form>
                    </td>
                    <td>
                        <form action="" method="post">
                            {{csrf_field()}}
                            {{method_field('delete')}}
                            <input type="hidden" name="id" value="{{$lif->id}}">
                            <button type="submit" class="btn btn-outline-danger">DELETE</button>

                        </form>
                    </td>


                </tr>
            @endforeach
            </tbody>
        </table>

    </section>
@endsection
