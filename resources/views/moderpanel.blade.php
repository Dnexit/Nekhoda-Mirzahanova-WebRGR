@extends("layout")

@section("page-title")Панель модератора@endsection

@section("page-content")
    <h1 class="m-5">Панель модератора</h1>
        <form name="moderpanel-form"  method="post" action="/pit">
            @csrf
            <div class="container">
                <div class="card-deck mb-3 text-center">
                    <div class="card mb-4 box-shadow">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal text-dark">Выбери действие</h4>
                        </div>
                        <div class="card-body">
                            <a type="button" href="/reviews" class="btn btn-lg btn-block btn-primary">Редактировать отзывы</a>
                        </div>

                        <div class="card-body">
                            <a type="button" href="/adminlogout" class="btn btn-lg btn-block btn-primary m-3">Выйти</a>
                        </div>
                    </div>
                </div>
        </form>
    </div>
@endsection
