$(function(){
    $('.btn-trigger').on('click', function() {
      $(this).toggleClass('active');
      $('.header-inner-sp-nav').toggleClass(500);
      return false;
    });
  });