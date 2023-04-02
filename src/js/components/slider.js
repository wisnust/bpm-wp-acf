jQuery(document).ready(function ($) {
  
  $('.single-slider').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true,
    arrow: true,
    prevArrow: '<button class="btn-prev"><i class="fa fa-arrow-left"></i></button>',
    nextArrow: '<button class="btn-next"><i class="fa fa-arrow-right"></i></button>',
  });
  
});