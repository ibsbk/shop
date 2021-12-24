<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/resources/css/app.css">
</head>
<body>
    <header class="header">
        <a href="{{route('/')}}" class="big-text">гOZON</a>
        <nav>
            @guest
                <a href="{{route('cart')}}">корзина</a>
                <a href="{{route('auth')}}">личный кабинет</a>
            @endguest
            @auth
                <a href="{{route('cart')}}">корзина</a>
                @if (Auth::user()->isAdmin == 1)
                    <a href="{{route('adminLk')}}">админ панель</a> 
                @endif
                <a href="{{route('lk')}}">личный кабинет</a>    
            @endauth
        </nav>
    </header>
    <section class="content-section">
        <div class="content-wrapper">
            @yield('content')
        </div>
    </section>
</body>
</html>