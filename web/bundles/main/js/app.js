$(function () {
    var count = 0;
    var nbElement = $('.marque').size() * 308;

    var icon = 1;
    var icon2 = 1;

    function cachebtn() {
        if (count <= -nbElement + 308) {
            $('.btn-slider-left').hide();
            $('.btn-slider-right').show();
        } else if (count < nbElement && count > 0) {
            $('.btn-slider-right').show();
            $('.btn-slider-left').show();
        } else if (count == 0) {
            $('.btn-slider-right').hide();
            $('.btn-slider-left').show();
        } else {
            $('.btn-slider-right').show();
        }
    }

    cachebtn();

    $('.btn-slider-left').click(function (e) {
        e.preventDefault;
        count -= 308;
        $('.marque').velocity({
            translateX: count + "px"
        });
        cachebtn();
    });

    $('.btn-slider-right').click(function (e) {
        e.preventDefault;
        count += 308;
        $('.marque').velocity({
            translateX: count + "px"
        });
        cachebtn();
    });


    $('.type-eve-icon').click(function (e) {
        e.preventDefault;
        if (icon == 1) {
            $('.type-evenement').find('li').slideDown();
            icon = 2;
        } else {
            $('.type-evenement').find('li').hide();
            $('.type-evenement').find('li').first().show();
            icon = 1;
        }
    });

    $('.icon-date').click(function (e) {
        e.preventDefault;
        if (icon2 == 1) {
            $('.evenement').find('li').slideDown();
            icon2 = 2;
        } else {
            $('.evenement').find('li').hide();
            $('.evenement').find('li').first().show();
            icon2 = 1;
        }
    });
});


$('.insc').on('click', function (e) {
    e.preventDefault;
    $('form').fadeOut();
    $('section').fadeOut();
    $('.form-inscription').velocity('fadeIn');

});

$('.log').click(function (e) {
    e.preventDefault;
    $('section').velocity('fadeOut');
    $('form').velocity('fadeOut');
    $('.form-connect').velocity('fadeIn', {duration: 500});
});
$('.close-co').click(function (e) {
    e.preventDefault;
    $('section').hide();
    $('.form-connect').velocity('fadeOut');
    $('.page-evenement').velocity('fadeIn', {delay: 300});
});
$('.close-ins').click(function (e) {
    e.preventDefault;
    $('section').hide();
    $('.form-inscription').velocity('fadeOut');
    $('.page-evenement').velocity('fadeIn', {delay: 300});
});

$('.lien-produit').on('click', function (e) {
    e.preventDefault;
    $('section').velocity('fadeOut');
    $('.page-produit').velocity('fadeIn');
})

$('.page-produit').on('click', function (e) {
    e.preventDefault;
    $('section').velocity('fadeOut');
    $('.page-evenement').velocity('fadeIn');
})

$('.all-produit').on('click', function (e) {
    e.preventDefault;
    $('section').velocity('fadeOut');
    $('.page-all-produit').velocity('fadeIn');
})

$('.retour').on('click', function (e) {
    e.preventDefault;
    $('section').velocity('fadeOut');
    $('.page-evenement').velocity('fadeIn');
})