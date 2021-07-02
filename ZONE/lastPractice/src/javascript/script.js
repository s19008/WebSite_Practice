$(function () {
  let btnTrigger = $(".btn-trigger");
  let fixTrigger = $(".fix-btn-trigger");
  let overlay = $(".overlay");
  let fix_overlay = $(".fix-overlay");
  let fix_header = $(".fix-header");
  let header = $(".header");

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
    if (scroll > 500) {
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
});
