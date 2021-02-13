$(function () {
    const $question = $('.faq-inner-copy .question')
    $question.on('click',function(){
        $(this).next().slideToggle(100);
    });
    $(document).ready(function () {

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
});