$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
});

$(function () {
    var jElement = $('.alert');

    $(document).ready(function () {
        if ($(this).scrollTop() >= 0) {
            jElement.css({
                'position': 'fixed',
                'bottom': '9%',
                'right': '3%'
            });
        }
    });
});

$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() !== 0) {
            $('#up').fadeIn();
        } else {
            $('#up').fadeOut();
        }
    });
    $('#up').click(function () {
        $('body,html').animate({scrollTop: 0}, 800);
    });
});


