@extends("layout")

@section("page-title") Расчет @endsection

@section("page-content")
    <h1 class="m-5">Выбери вид изделия</h1>
    <div class="container">
        <div class="container" style="padding-left: 13%">
            <nav class="nav">
                <div class="masthead-brand card m-4 box-shadow">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal text-dark">Платье</h4>
                    </div>
                    <div class="card-body">
                        <a type="button" href="/trench" class="btn btn-lg btn-block btn-primary">Рассчитать</a>
                    </div>
                </div>
                <div class="card m-4 box-shadow">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal text-dark">Топ</h4>
                    </div>
                    <div class="card-body">
                        <a type="button" href="/pit" class="btn btn-lg btn-block btn-primary">Рассчитать</a>
                    </div>
                </div>
                <div class="card m-4 box-shadow">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal text-dark">Носки</h4>
                    </div>
                    <div class="card-body">
                        <a type="button" href="/planning" class="btn btn-lg btn-block btn-primary">Рассчитать</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container">
            <nav class="nav">
                <div class="card m-3 box-shadow">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal text-dark">Худи</h4>
                    </div>
                    <div class="card-body">
                        <a type="button" href="/terracing" class="btn btn-lg btn-block btn-primary">Рассчитать</a>
                    </div>
                </div>
                <div class="card m-3 box-shadow">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal text-dark">Джинсы</h4>
                    </div>
                    <div class="card-body">
                        <a type="button" href="/hydrohammer" class="btn btn-lg btn-block btn-primary">Рассчитать</a>
                    </div>
                </div>
                <div class="card m-3 box-shadow">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal text-dark">Штаны</h4>
                    </div>
                    <div class="card-body">
                        <a type="button" href="/pants" class="btn btn-lg btn-block btn-primary">Рассчитать</a>
                    </div>
                </div>
                <div class="card m-3 box-shadow">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal text-dark">Футболка</h4>
                    </div>
                    <div class="card-body">
                        <a type="button" href="/tee-shirt" class="btn btn-lg btn-block btn-primary">Рассчитать</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
@endsection
