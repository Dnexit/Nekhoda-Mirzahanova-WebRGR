<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield("page-title")</title>
    <script  type="text/javascript"  src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/jas4xhtwmgxn0u44vlhq5icxap8y48c9i4kf6bx7xeqgh8rk/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://getbootstrap.com/docs/4.0/examples/cover/cover.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/4.0/examples/pricing/pricing.css" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">

</head>

<body class="text-center">
    <div class="container-fluid d-flex h-100 p-3 mx-auto flex-column">
        <header class="masthead">
            <div class="inner">
                <h3 class="masthead-brand">My Dress</h3>
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link" href="/main">Главная</a>
                    <a class="nav-link" href="/fabrics">Ткани</a>
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
                        <style>
                            .dropdown {
                                position: relative;
                                display: inline-block;
                                min-width: 200px;
                            }

                            .dropdown-content {
                                display: none;
                                position: absolute;
                                background-color: #000;

                                min-width: 200px;
                                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                                z-index: 1;
                            }

                            .dropdown-content a {
                                color: black;

                                text-decoration: none;
                                display: block;
                            }

                            .dropdown-content a:hover {background-color: rgba(221, 221, 221, 0.11);}

                            .dropdown:hover .dropdown-content {display: block;}

                            .dropdown:hover .dropbtn {background-color: #882bbd;}
                        </style>

                        <div class="dropdown">
                            <a class="nav-link menubase dropbtn">Администрирование</a>
                            <div class="dropdown-content">
                                <a class="nav-link nav-admin" style="margin-left: 0;" href="/adminpanel">Панель администратора</a>
                                <a class="nav-link nav-admin" style="margin-left: 0;" href="/reviews">Редактор отзывов</a>
                                <a class="nav-link nav-admin" style="margin-left: 0;" href="/moders_editor">Редактор модераторов</a>
                            </div>
                        </div>

                        <a class="nav-link ms-5" href="/reviews"></a>
                        <a class="btn btn-light ms-2" href="/adminlogout">Админ: {{session('nickname')}} - выйти</a>
                    @endif
                    @if(session('isUser') != 1 && session('isModer') != 1 && session('isAdmin') != 1 )
                        <a class="btn btn-light ms-2" href="signin">Войти</a>
                        <a class="btn btn-light ms-2" href="login">Регистрация</a>
                    @endif
                    @if(session('isUser') == 1)
                        <a class="btn btn-light ms-2" href="/logout">выйти</a>
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
