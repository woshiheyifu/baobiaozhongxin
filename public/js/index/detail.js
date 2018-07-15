$(document).ready(function () {
    $('.small').bind('click',showBigImg);
});

function showBigImg() {
    var src = $(this).children()[0].src;
    var bigImg = $('.big').children();
    bigImg.attr('src',src);
}