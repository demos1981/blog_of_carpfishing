


<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/start.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Pacifico&display=swap" rel="stylesheet">
</head>

<body>

<!--Хедер-->
<header class="header" role="banner">
<div class="headerLogo"></div>
    <div class="headerName">Блог Карпфишера</div>
    <ul>
        <li><a href="{{route('index')}}" class="headerLink">Главная</a></li>
        <li><a href="{{route('about')}}" class="headerLink">О нас</a></li>
        <li><a href="{{route('news')}}" class="headerLink">Новости</a></li>
        <li><a href="{{route('review')}}" class="headerLink">Обзоры</a></li>
        <li><a href="{{route('ivents')}}" class="headerLink">Ивенты</a></li>
        <li><a href="{{route('lifeHack')}}" class="headerLink">Лайфхаки</a></li>
         @if(\Auth::check())
        <li> <a  href="{{route('add_news_get')}}" class="headerLink">Администрирование</a></li>
         @endif
        <li> <a  href="{{route('login')}}" class="headerLink">@if(\Auth::check()){{\Auth::user()->name}} @else Вход @endif</a></li>

    </ul>

</header>
<main role="main">

</main>

     <div id="mySidenav" class="sidenav">


    <!--Change-->
    <a href="javascript:void(0)" class="closeBtn" onclick="closeNav()">&times;</a>
    <!--Change-->
    <a href="{{route('logistic')}}">Аналитика места ловли</a>
    <a href="{{route('markering')}}">Маркерение</a>
    <a href="{{route('spombing')}}">Кормление</a>
    <a href="{{route('catching')}}">Ловля</a>
    <a href="{{route('storages')}}">Хранение</a>
    <a href="{{route('equipment')}}">Оборудование лагеря</a>
    <div class="button" onclick="openNav()">
        <!--  <img src="all2.png">-->
    </div>
     </div>


@yield('content')



<!--Pagination-->


<!--Подвал-->
<footer class="footer" role="contentinfo">

    <ul>
        <li><a href="#" class="footerLink">Youtube</a></li>
        <li><a href="#" class="footerLink">Instagram</a></li>
        <li><a href="#" class="footerLink">Twitter</a></li>
        <li><a href="#" class="footerLink">Facebook</a></li>
        <li><a href="#" class="footerLink">Telegram</a></li>
    </ul>

</footer>

<div class="author">Copyright 2020 by Yaremenko Dmitriy. All Rights Reserved.</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="/js/media.js"></script>
<script src="/js/start.js"></script>
</body>
</html>
