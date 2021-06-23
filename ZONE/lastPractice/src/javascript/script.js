$(function() {
    var btnTrigger = $(".btn-trigger");

    btnTrigger.on("click", function() {
        btnTrigger.toggleClass("active");
        $(".sp-nav-list").fadeToggle(500);
        return false;
    });
});