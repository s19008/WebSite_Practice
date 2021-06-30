$(function() {
    let btnTrigger = $(".btn-trigger");
    let overlay = $(".overlay");
    let nav_a = $('.nav-a');
    let hr = $('hr');
    btnTrigger.on("click", function() {
        btnTrigger.toggleClass("active");
        overlay.toggleClass("open");
        return false;
    });

    window.onload = function() {
        const spinner = document.getElementById('load');
        spinner.classList.add('loaded');
    };
    
    $(window).scroll(function() {
        let scroll = $(this).scrollTop();
        if(scroll > 1660) {
            nav_a.css('color', '#000');
            hr.css('background-color', '#000');
        } else {
            nav_a.css('color', '#FFF');
            hr.css('background-color', '#FFF');
        };
    });
}); 