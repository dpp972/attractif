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
    })

    $('.btn-slider-right').click(function (e) {
        e.preventDefault;
        count += 308;
        $('.marque').velocity({
            translateX: count + "px"
        });
        cachebtn();
    })


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
    })
    
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
    })

}); 