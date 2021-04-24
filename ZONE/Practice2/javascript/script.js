$(function() {
    var btnTrigger = $(".btn-trigger");
    btnTrigger.on("click", function() {
        btnTrigger.toggleClass("active");
        $(".header-sp-nav").fadeToggle(500);
        return false;
    });
    let mySwiper = new Swiper('.swiper-container', {
        loop: true,
        centeredSlides: true,
        slidesPerView: 3.5,
        spaceBetween: 56,
        autoplay: {
            delay: 5000,
        },
    });
});