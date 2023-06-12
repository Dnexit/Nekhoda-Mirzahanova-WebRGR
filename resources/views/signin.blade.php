@extends("layout")

@section("page-title") Авторизация @endsection

@section("page-content")
    <h1>Авторизиция</h1>
        <form name="signin-form"  method="post" action="/signin">
            @csrf
            <div class="container">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                           @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-deck mb-3 text-center">
                    @if(session('isUser') == 0)
                        <div class="card mb-4 box-shadow">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal text-dark">Войти в аккаунт</h4>
                            </div>
                            <div class="card-body">
                                <p class="text-dark">E-mail</p>
                                <input type="email" name="user-email" class="form-control" placeholder="Введите адрес вашей электронной почты">

                                <p class="text-dark">Пароль</p>
                                <input type="password" name="user-password" class="form-control" placeholder="Введите пароль">

                                <button type="submit" href="/main" class="btn btn-lg btn-block btn-primary m-3">Войти</button>
                                <p class="text-dark">Нет аккаунта? <a class="text-dark" href="login">Зарегестрироваться.</a></p>
                                <p class="text-dark">Войти как <a class="text-dark" href="adminsignin">админ/модератор</a>.</p>
                            </div>
                        </div>
                    @endif
                </div>
                @if(session('isUser') == 1)
                    <div class="alert alert-success">
                        Вы вошли в систему. <a class="text-dark" href="logout">Выйти</a>.
                    </div>
                @endif
            </div>
        </form>
@endsection
