jQuery(document).ready(function ($) {

    // Header Toggle Menu
    $('.navbar-toggler').click(function (e) { 
      if ($(this).attr('aria-expanded') === 'true') {
        $(this).addClass('is-active');
      } else {
        $(this).removeClass('is-active');
      }
    });
    
});