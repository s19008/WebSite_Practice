$(function () {
  var btnTrigger = $(".btn-trigger");
  var btnTrgger1 = $(".btn-trigger-1");
  btnTrgger1.on("click", function() {
    btnTrgger1.toggleClass("active");
    $(".header-inner-sp-nav").fadeToggle(500);
    return false;
  });
  btnTrigger.on("click", function () {
    btnTrigger.toggleClass("active");
    $(".fix-header-inner-sp-nav").fadeToggle(500);
    return false;
  });


  var _window = $(window),
    _header = $(".header"),
    _headerChange = $(".fix-header"),
    heroBottom;
  _window.on("scroll", function () {
    heroBottom = $(_header).height();
    if (_window.scrollTop() > heroBottom) {
      _headerChange.addClass("show");
      _header.removeClass("show");
    } else {
      _header.addClass("show");
      _headerChange.removeClass("show");
    }
  });
  _window.trigger("scroll");


  var open = $("#open"),
    fix_open = $("#fix-open"),
    close = $("#close"),
    scrollPosition;
  open.on("click", function () {
    $("#mask").fadeIn();
    $("#modal").fadeIn();
  });
  fix_open.on("click", function () {
    $("#mask").fadeIn();
    $("#modal").fadeIn();
  });
  $(close,"#mask").click(function () {
    $("#mask").fadeOut();
    $("#modal").fadeOut();
  });

  AOS.init({
    offset: 300,
    duration: 1500,
    easing: 'ease',
    delay: 100,
    once: true,
    anochorPlacement: 'top-center',
  });

  let tabs = $(".tab");
  let contents = $(".notice-inner");
  tabs.on("click", function() {
    $(".active").removeClass("active");
    $(this).addClass("active");
    const index = tabs.index(this);
    contents.removeClass("show").eq(index).addClass("show");
    });
});
