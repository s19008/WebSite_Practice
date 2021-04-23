$(function() {
    var btnTrigger = $(".btn-trigger");
    btnTrigger.on("click", function() {
        btnTrigger.toggleClass("active");
        $(".header-sp-nav").fadeToggle(500);
        return false;
    });
});