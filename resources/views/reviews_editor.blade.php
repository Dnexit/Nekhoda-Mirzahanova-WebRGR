@extends("layout")

@section("page-title") Редактировать отзыв @endsection

@section("page-content")
    <h1 class="m-5">Редактировать отзыв</h1>
    <form action="/reviews_editor/@if(!empty($data)){{$data['id']}}@endif" method="post">
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
            <textarea class="form-control" id="reviewtext" name="reviewtext">@if(!empty($data)){{$data['review_text']}}@endif</textarea>
        </div>
        <button type="submit" href="/main" class="btn btn-lg btn-block btn-dark m-3">Закончить редактирование</button>
    </form>
@endsection
