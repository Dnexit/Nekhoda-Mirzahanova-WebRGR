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
    <form name="pants-form"  method="post" action="/pants">
        @csrf
        <div class="container">
            <div class="card-deck mb-3 text-center">
                <div class="card mb-4 box-shadow">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal text-dark">Штаны</h4>
                    </div>
                    <div class="card-body">

                        <p class="text-dark">Ширина штанины</p>
                        <input type="number" name="pass-width" class="form-control" placeholder="Ширина (см)">

                        <p class="text-dark">Длина штанины</p>
                        <input type="number" name="pass-height" class="form-control" placeholder="Высота (см)">

                        <p class="text-dark">Нужен принт на штанах?</p>
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
