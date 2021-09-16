$(function () {
  let btnTrigger = $(".btn-trigger");
  let fixTrigger = $(".fix-btn-trigger");
  let overlay = $(".overlay");
  let fix_overlay = $(".fix-overlay");
  let fix_header = $(".fix-header");
  let header = $(".header");
  let nav = $('a[href^="#"]');

  btnTrigger.on("click", function () {
    btnTrigger.toggleClass("active");
    overlay.toggleClass("open");
    return false;
  });

  fixTrigger.on("click", function () {
    fixTrigger.toggleClass("active");
    fix_overlay.toggleClass("open");
    return false;
  });

  
  $(window).scroll(function () {
    let scroll = $(this).scrollTop();
    if (scroll > 1000) {
      fix_header.addClass("open");
      header.addClass("close");
      btnTrigger.removeClass("active");
      overlay.removeClass("open");
    } else {
      fix_header.removeClass("open");
      header.removeClass("close");
      fixTrigger.removeClass("active");
      fix_overlay.removeClass("open");
    };
  });

  nav.click(function() {
    let adjust = -80;
    let speed = 800;
    let href = $(this).attr("href");
    let target = $(href == "#" || href == "" ? 'html' : href);
    let position = target.offset().top + adjust;
    $('body,html').animate({scrollTop:position}, speed, 'swing');
    return false;
  });

});
