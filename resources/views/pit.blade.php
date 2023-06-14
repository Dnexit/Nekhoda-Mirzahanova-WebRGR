@extends("layout")

@section("page-title")Расчет@endsection

@section("page-content")
    <h1>Заполни поля</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form name="pit-form"  method="post" action="/pit">
            @csrf
            <div class="container">
                <div class="card-deck mb-3 text-center">
                    <div class="card mb-4 box-shadow">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal text-dark">Топ</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-dark">Тип топа</p>
                                <select class="form-select" name="ground-type" aria-label="Default select example">
                                    <option selected>Выберите тип топа</option>
                                    <option value="1">на верёвках</option>
                                    <option value="2">без воротника</option>
                                    <option value="3">с воротником</option>
                                    <option value="4">короткий</option>
                                </select>
                            <p class="text-dark">Ширина лямки</p>
                            <input type="number" name="pass-width" class="form-control" placeholder="Ширина (см)">

                            <p class="text-dark">Длина лямки</p>
                            <input type="number" name="pass-height" class="form-control" placeholder="Длина (см)">

                            <p class="text-dark">Нужен принт на топе?</p>
                            <select class="form-select" name="communications-search" aria-label="Default select example">
                                <option selected value="1">Нет</option>
                                <option value="2">Да</option>
                            </select>
                            <button type="submit" href="/main" class="btn btn-lg btn-block btn-primary m-3">Рассчитать</button>
                        </div>
                    </div>
                </div>

        </form>
    </div>
@endsection
