@extends("layout")

@section("page-title")Панель админа@endsection

@section("page-content")
    <h1 class="m-5">Панель админа</h1>
        <form name="adminpanel-form"  method="post" action="/pit">
            @csrf
            <div class="container">
                <div class="card-deck mb-3 text-center">
                    <div class="card mb-4 box-shadow">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal text-dark">Выбери действие</h4>
                        </div>
                        <div class="card-body">
                            <a href="/reviews" class="btn btn-lg btn-block btn-primary">Редактировать отзывы</a>
                        </div>

                        <div class="card-body">
                            <a href="/moders_editor" class="btn btn-lg btn-block btn-primary">Добавить/Удалить модератора</a>
                        </div>

                        <div class="card-body">
                            <a href="/adminlogout" class="btn btn-lg btn-block btn-primary m-3">Выйти</a>
                        </div>
                    </div>
                </div>
        </form>
    </div>
@endsection
