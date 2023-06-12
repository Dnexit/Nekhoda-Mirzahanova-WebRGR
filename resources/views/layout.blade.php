<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield("page-title")</title>
    <script  type="text/javascript"  src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://getbootstrap.com/docs/4.0/examples/cover/cover.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/4.0/examples/pricing/pricing.css" rel="stylesheet">

</head>

<body class="text-center">
    <div class="container-fluid d-flex h-100 p-3 mx-auto flex-column">
        <header class="masthead">
            <div class="inner">
                <h3 class="masthead-brand">Crimean Ground Works</h3>
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link" href="/main">Главная</a>
                    <a class="nav-link" href="/payment">Расчет</a>
                    <a class="nav-link" href="/reviews">Отзывы</a>
                    <a class="nav-link ms-5" href="/reviews"></a>
                    @if(session('isModer') == 1)
                        <a class="nav-link" href="/moderpanel">Панель модератора</a>
                        <a class="nav-link" href="/reviews">Редактор отзывов</a>
                        <a class="nav-link ms-5" href="/reviews"></a>
                        <a class="btn btn-light ms-2" href="/adminlogout">Модератор: {{session('nickname')}} - выйти</a>
                    @endif
                    @if(session('isAdmin') == 1)
                        <a class="nav-link" href="/adminpanel">Панель администратора</a>
                        <a class="nav-link" href="/reviews">Редактор отзывов</a>
                        <a class="nav-link" href="/moders_editor">Редактор модераторов</a>
                        <a class="nav-link ms-5" href="/reviews"></a>
                        <a class="btn btn-light ms-2" href="/adminlogout">Админ: {{session('nickname')}} - выйти</a>
                    @endif
                    @if(session('isUser') != 1)
                        <a class="btn btn-light ms-2" href="signin">Войти</a>
                        <a class="btn btn-light ms-2" href="login">Регистрация</a>
                    @endif
                    @if(session('isUser') == 1)
                        <a class="btn btn-light ms-2" href="/logout">Хорошая работа, {{session('username')}}</a>
                    @endif
                </nav>
            </div>
        </header>

        <main role="main" class="inner cover">

            @yield("page-content")
        </main>
    </div>
    <script  type="text/javascript"  src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
