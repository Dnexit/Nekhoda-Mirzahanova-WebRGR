@extends("layout")

@section("page-title") Отзывы @endsection

@section("page-content")
    <h1 class="m-5">Отзывы</h1>
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
                                <h4 class="masthead-brand my-0 font-weight-normal">{{$d['fio']}}</h4>
                                <h4 class="nav-masthead my-0 font-weight-normal">{{$d['timestamp']}}</h4>
                            </div>
                            <div class="card-body bg-dark">
                                <p class="masthead-brand text-lg-start">{{$d['text']}}</p>
                                @if(session('isModer') == 1 | session('isAdmin') == 1)
                                    <div class="nav-masthead">
                                        <a href="/reviews_editor/{{$d['id']}}"><img src="images/edit.png" width="30" height="30"></a>
                                        <a href="/reviews_editor/{{$d['id']}}/delete"><img src="images/delete.png" width="30" height="30"></a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
        @endif
            @if(session('succes') == 1)
                <div class="alert alert-success">
                    Отзыв отправлен
                </div>
            @endif
            @if(session('isUser') == 1)
                <form action="/reviews" method="post">
                    @csrf
                    <h4 style="margin-top: 10%">Оставьте свой отзыв о сайте!</h4>
                    <div class="card-deck mb-3">
                        <div class="card mb-4 box-shadow">
                            <div class="card-header bg-dark">
                                <div class="container">
                                    <textarea class="form-control mt-3" id="reviewtext" name="reviewtext"></textarea>
                                </div>
                                <button type="submit" href="/main" class="btn btn-lg btn-block btn-light m-3">Оставить отзыв</button>
                            </div>
                        </div>
                    </div>
                </form>
            @endif
    </div>
    @if(session('isUser') != 1)
        <p class="lead">Чтобы оставить отзыв о сайте или о проделанной работе необходимо <a href="signin">авторизироваться</a></p>
    @endif
@endsection
