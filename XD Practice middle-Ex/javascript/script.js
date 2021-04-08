$(function () {
  var btnTrigger = $(".btn-trigger");
  btnTrigger.on("click", function () {
    btnTrigger.toggleClass("active");
    $(".header-inner-sp-nav").fadeToggle(500);
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
    } else {
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
});
