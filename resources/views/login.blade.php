@extends("layout")

@section("page-title") Регистрация @endsection

@section("page-content")
    <h1>Регистрация</h1>
        <form name="login-form"  method="post" action="/login">
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
                    <div class="card mb-4 box-shadow">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal text-dark">Создать новый аккаунт</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-dark">Фамилия и Имя</p>
                            <input type="text" name="user-name" class="form-control" placeholder="Введите ваши фамилию и имя">

                            <p class="text-dark">E-mail</p>
                            <input type="email" name="user-email" class="form-control" placeholder="Введите адрес вашей электронной почты">

                            <p class="text-dark">Придумайте пароль</p>
                            <input type="password" name="user-password" class="form-control" placeholder="Введите пароль">

                            <p class="text-dark">Повторите пароль</p>
                            <input type="password" name="password-confirmation" class="form-control" placeholder="Введите пароль повторно">

                            <button type="submit" href="/main" class="btn btn-lg btn-block btn-primary m-3">Зарегестрироваться</button>
                            <p class="text-dark">Уже есть аккаунт?<a class="text-dark" href="signin">Войти.</a></p>
                        </div>
                    </div>
                </div>
                @if(session('isUser') == 1)
                    <div class="alert alert-success">
                        Вы успешно зарегестрированы! <a class="text-dark" href="logout">Выйти из аккаунта</a>.
                    </div>
                @endif
            </div>
        </form>

@endsection
