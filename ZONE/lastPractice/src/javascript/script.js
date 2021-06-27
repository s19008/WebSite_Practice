$(function() {
    let btnTrigger = $(".btn-trigger");
    let overlay = $(".overlay");
    btnTrigger.on("click", function() {
        btnTrigger.toggleClass("active");
        overlay.toggleClass("open");
        return false;
    });
});