@extends("layout")

@section("page-title") Редактор модераторов @endsection

@section("page-content")
    <h1 class="m-5">Редактор модераторов</h1>
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
        @if(!empty($data))
                @foreach($data as $d)
                    <div class="card-deck mb-3">
                        <div class="card mb-4 box-shadow">
                            <div class="card-header bg-dark text-lg-start">
                                <h4 class="masthead-brand my-0 font-weight-normal">Имя: {{$d['nickname']}}</h4>
                                <h4 style="margin-left: 20%" class="masthead-brand my-0 font-weight-normal">Пароль: {{$d['password']}}</h4>
                                <div class="nav-masthead">
                                    <a href="/moders_editor/{{$d['nickname']}}/delete"><img src="images/delete.png" width="30" height="30"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
        @endif
            @if(!empty($data['succes']) && $data['succes'] == 1)
                <div class="alert alert-success">
                    Модератор добавлен
                </div>
            @endif
        <form action="/moders_editor" method="post">
            @csrf
            <h4 style="margin-top: 10%">Добавить модератора</h4>
            <div class="card-deck mb-3">
                <div class="card mb-4 box-shadow">
                    <div class="card-header bg-dark text-lg-start">
                        <div class="nav">
                            <input type="text" name="nickname" class="masthead-brand" style="margin-top: auto; margin-bottom: auto; margin-right: 10%; margin-left: 10%" placeholder="Имя модератора">
                            <input type="password" name="password" class="nav-masthead" style="margin-top: auto; margin-bottom: auto; margin-right: 10%;" placeholder="Пароль модератора">
                            <button type="submit" href="" class="btn btn-light ms-2 m-3">Добавить</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
