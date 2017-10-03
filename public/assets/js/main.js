$(document).ready(function(){
    $('.video-block').fadeIn();
    $('.galery-slider').fadeIn();

    $('.video-block').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.more-videos'
    });
    $('.more-videos').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.video-block',
        focusOnSelect: true
    });

    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.galery-slider'
    });
    $('.galery-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: false,
        centerMode: true,
        focusOnSelect: true,
        prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>'
    });

});