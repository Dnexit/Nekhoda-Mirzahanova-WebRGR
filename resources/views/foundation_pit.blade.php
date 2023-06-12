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
        <form name="foundation_pit-form"  method="post" action="/foundation_pit">
            @csrf
            <div class="container">
                <div class="card-deck mb-3 text-center">
                    <div class="card mb-4 box-shadow">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal text-dark">Котлован</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-dark">Ширина проезда</p>
                            <input type="number" name="pass-width" class="form-control" placeholder="Ширина (см)">

                            <p class="text-dark">Высота проезда</p>
                            <input type="number" name="pass-height" class="form-control" placeholder="Высота (см)">

                            <p class="text-dark">Нужен поиск коммуникаций?</p>
                            <select class="form-select" name="communications-search" aria-label="Default select example">
                                <option selected value="1">Нет</option>
                                <option value="2">Да</option>
                            </select>

                            <p class="text-dark">Длина участка</p>
                            <input type="number" name="area-lenght" class="form-control" placeholder="Длина (см)">

                            <p class="text-dark">Ширина участка</p>
                            <input type="number" name="area-width" class="form-control" placeholder="Ширина (см)">

                            <p class="text-dark">Глубина котлована</p>
                            <input type="number" name="foundation-depth" class="form-control" placeholder="Глубина (см)">
                            <p class="text-dark">Местоположение</p>
                            <select class="form-select" name="delivery" aria-label="Default select example">
                                <option selected>Выберите ваше местоположение</option>
                                <option value="1">Симферополь</option>
                                <option value="2">ЮБК</option>
                                <option value="3">Не Симферополь и не ЮБК</option>
                            </select>

                            <div>
                                <p class="text-dark">Расстояние от симферополя до вашего местоположения</p>
                                <input type="number" name="distance" class="form-control" placeholder="Введите расстояние (Если вы не в Симферополе и не в ЮБК) (км)">
                            </div>

                            <button type="submit" href="/main" class="btn btn-lg btn-block btn-primary m-3">Рассчитать</button>
                        </div>
                    </div>
                </div>
        </form>
    </div>
@endsection
