document.getElementById("outer3").addEventListener("click", toggleState3);

function toggleState3() {
    let galleryView = document.getElementById("galleryView")
    let tilesView = document.getElementById("tilesView")
    let outer = document.getElementById("outer3");
    let slider = document.getElementById("slider3");
    let tilesContainer = document.getElementById("tilesContainer");
    if (slider.classList.contains("active")) {
        slider.classList.remove("active");
        outer.classList.remove("outerActive");
        galleryView.style.display = "flex";
        tilesView.style.display = "none";

        while (tilesContainer.hasChildNodes()) {
            tilesContainer.removeChild(tilesContainer.firstChild)
        }
    } else {
        slider.classList.add("active");
        outer.classList.add("outerActive");
        galleryView.style.display = "none";
        tilesView.style.display = "flex";

        for (let i = 0; i < imgObject.length - 1; i++) {
            let tileItem = document.createElement("div");
            tileItem.classList.add("tileItem");
            tileItem.style.background =  "url(" + imgObject[i] + ")";
            tileItem.style.backgroundSize = "contain";
            tilesContainer.appendChild(tileItem);
        }
    };
}

let imgObject = [
    "/images/fabrics/cotton.jpg",
    "/images/fabrics/flax.jpg",
    "/images/fabrics/grid.jpg",
    "/images/fabrics/jeans.jpg",
    "/images/fabrics/knitwear.jpg",
    "/images/fabrics/nylon.jpg",
    "/images/fabrics/plush.jpg",
    "/images/fabrics/polyester.jpg",
    "/images/fabrics/synthetics.jpg",
    "/images/fabrics/wool.jpg",
];

let textObject = [
    "Хлопок - 400 руб. за 150 см.",
    "Флакс - 550 руб. за 150 см.",
    "Сетка - 500 руб. за 150 см.",
    "Джинса - 240 руб. за 150 см.",
    "Книтвер - 150 руб. за 150 см.",
    "Нейлон - 245 руб. за 150 см.",
    "Плюш - 340 руб. за 150 см.",
    "Полиэстер - 255 руб. за 150 см.",
    "Синтетика - 140 руб. за 150 см.",
    "Шерсть - 300 руб. за 150 см.",
];

let mainImg = 0;
let prevImg = imgObject.length - 1;
let nextImg = 1;

function loadGallery() {

    let mainView = document.getElementById("mainView");
    mainView.style.background = "url(" + imgObject[mainImg] + ")";

    let leftView = document.getElementById("leftView");
    leftView.style.background = "url(" + imgObject[prevImg] + ")";

    let rightView = document.getElementById("rightView");
    rightView.style.background = "url(" + imgObject[nextImg] + ")";

    let linkTag = document.getElementById("linkTag")
    linkTag.href = imgObject[mainImg];

    let tilesTextElement = document.getElementById("tilesTextElement");
    tilesTextElement.innerText = textObject[mainImg]

};

function scrollRight() {

    prevImg = mainImg;
    mainImg = nextImg;
    if (nextImg >= (imgObject.length -1)) {
        nextImg = 0;
    } else {
        nextImg++;
    };
    loadGallery();
};

function scrollLeft() {
    nextImg = mainImg
    mainImg = prevImg;

    if (prevImg === 0) {
        prevImg = imgObject.length - 1;
    } else {
        prevImg--;
    };
    loadGallery();
};

document.getElementById("navRight").addEventListener("click", scrollRight);
document.getElementById("navLeft").addEventListener("click", scrollLeft);
document.getElementById("rightView").addEventListener("click", scrollRight);
document.getElementById("leftView").addEventListener("click", scrollLeft);
document.addEventListener('keyup',function(e){
    if (e.keyCode === 37) {
        scrollLeft();
    } else if(e.keyCode === 39) {
        scrollRight();
    }
});

loadGallery();




