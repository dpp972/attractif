$(function () {
    var count = 0;
    var nbElement = $('.marque').size() * 308;

    function cachebtn() {
        if (count <= -nbElement +308) {
            $('.btn-slider-left').hide();
            $('.btn-slider-right').show();
        } else if (count < nbElement && count >0 ) {
            $('.btn-slider-right').show();
            $('.btn-slider-left').show();
        } else if(count == 0){
            $('.btn-slider-right').hide();
            $('.btn-slider-left').show();
        } else{
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

}); 