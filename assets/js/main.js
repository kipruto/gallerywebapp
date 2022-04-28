var $ = jQuery.noConflict();

(function($) {
    "use strict";

$(".carousel").slick({
  dots: true,
    infinite: true,
    speed: 700,
    autoplay:true,
    autoplaySpeed: 2000,
    arrows:false,
    slidesToShow: 3,
    slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
			

})(jQuery);
