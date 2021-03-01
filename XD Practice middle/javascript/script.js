$(function () {
    const $question = $('.faq-inner-copy .question')
    $question.on('click',function(){
        $(this).next().slideToggle(100);
    });

    $(document).ready(function (){
        
        const $submitBtn = $('#js-submit')

        $('#form input,#form textarea').on('change', function () {
            if (
                $('#form input[type="text"]').val() !== "" &&
                $('#form input[type="email"]').val() !== "" &&
                $('#form textarea').val() !== "" &&
                $('#form input[type="checkbox"]').val() !== "" &&
                $('#form #privacyCheck').prop('checked') === true
            ) {
                $submitBtn.prop('disabled', false);
                $submitBtn.css('opacity', 1);
            } else {
                $submitBtn.prop('disabled', true);
            }
        });
    });

    $('a[href^="#"]').click(function(){
        var adjust = -80;
        var speed = 700;
        var href= $(this).attr("href");
        var target = $(href == "#" || href == "" ? 'html' : href);
        var position = target.offset().top + adjust;
        $('body,html').animate({scrollTop:position}, speed, 'swing');
        return false;
    });

    $('.header-inner-burger').on('click', function(){
        $('.header-inner-burger').toggleClass('close');
        $('.header-inner-sp-nav').fadeToggle(500);
    });
    
});