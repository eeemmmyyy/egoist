let offset = 0;
const sliderLine = document.querySelector('.Slider-items');

document.querySelector('.button-prev').addEventListener('click', function () {
    offset = offset + 278;
    if (offset > 1112) {
        offset = 0;
    }
    sliderLine.style.left = -offset + 'px';
});

document.querySelector('.button-next').addEventListener('click', function () {
    offset = offset - 278;
    if (offset < 0) {
        offset = 1112;
    }
    sliderLine.style.left = -offset + 'px';
});



