@extends("layout")

@section("page-title") Расчет @endsection

@section("page-content")
    <h1 class="m-5">Выбери земельную работу</h1>
    <div class="container">
        <div class="container" style="padding-left: 13%">
            <nav class="nav">
                <div class="masthead-brand card m-4 box-shadow">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal text-dark">Траншея</h4>
                    </div>
                    <div class="card-body">
                        <a type="button" href="/trench" class="btn btn-lg btn-block btn-primary">Рассчитать</a>
                    </div>
                </div>
                <div class="card m-4 box-shadow">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal text-dark">Яма</h4>
                    </div>
                    <div class="card-body">
                        <a type="button" href="/pit" class="btn btn-lg btn-block btn-primary">Рассчитать</a>
                    </div>
                </div>
                <div class="card m-4 box-shadow">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal text-dark">Планировка</h4>
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
                        <h4 class="my-0 font-weight-normal text-dark">Террасирование</h4>
                    </div>
                    <div class="card-body">
                        <a type="button" href="/terracing" class="btn btn-lg btn-block btn-primary">Рассчитать</a>
                    </div>
                </div>
                <div class="card m-3 box-shadow">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal text-dark">Гидромолот</h4>
                    </div>
                    <div class="card-body">
                        <a type="button" href="/hydrohammer" class="btn btn-lg btn-block btn-primary">Рассчитать</a>
                    </div>
                </div>
                <div class="card m-3 box-shadow">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal text-dark">Гидробур</h4>
                    </div>
                    <div class="card-body">
                        <a type="button" href="/hydrodrill" class="btn btn-lg btn-block btn-primary">Рассчитать</a>
                    </div>
                </div>
                <div class="card m-3 box-shadow">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal text-dark">Котлован</h4>
                    </div>
                    <div class="card-body">
                        <a type="button" href="/foundation_pit" class="btn btn-lg btn-block btn-primary">Рассчитать</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
@endsection
