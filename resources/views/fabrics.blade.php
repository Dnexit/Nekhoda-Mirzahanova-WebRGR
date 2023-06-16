@extends("layout")

@section("page-title")Ткани@endsection

@section("page-content")
    <h1 class="m-5">Виды тканей для пошива</h1>
    <div id="container">
        <div id="toggleContainer">
            <label>карусель</label>
            <div id="toggle">
                <div id="outer3">
                    <div id="slider3"></div>
                </div>
                <label>плитка</label>
            </div>
        </div>
        <div id="galleryView">
            <div id="galleryContainer">
                <div id="leftView"></div>
                <button id="navLeft" class="navBtns"><i class="fas fa-arrow-left fa-3x"></i></button>
                <a id="linkTag">
                    <div id="mainView"></div>
                </a>
                <div id="rightView"></div>
                <button id="navRight" class="navBtns"><i class="fas fa-arrow-right fa-3x"></i></button>
            </div>
        </div>
        <div id="tilesView">
            <div id="tilesContainer"></div>
        </div>
        <p id="tilesTextElement">Описание картинок</p>
    </div>
    <script src="js/carousel.js" defer></script>
@endsection
