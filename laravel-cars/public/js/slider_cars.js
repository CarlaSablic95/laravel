$(document).ready(function () {
    $('#left').on('click',function () {
        var cantidad = $('.slider').find('.s_element').size();
        $('.slider').find('.s_element').each(function (index,item) {
            if($(item).hasClass('s_visible')){
                $(item).fadeOut();
                $(item).removeClass('s_visible');

                if (index == 0){
                    $($('.slider').find('.s_element').get(cantidad - 1)).show();
                    $($('.slider').find('.s_element').get(cantidad - 1)).addClass('s_visible');
                    return false;
                }else{
                    $($('.slider').find('.s_element').get(index -1)).show();
                    $($('.slider').find('.s_element').get(index -1)).addClass('s_visible');
                    return false;
                }
            }
        });
    });

    $('#right').on('click',function () {
        var cantidad = $('.slider').find('.s_element').size();
        $('.slider').find('.s_element').each(function (index,item) {
            if($(item).hasClass('s_visible')){
                $(item).fadeOut();
                $(item).removeClass('s_visible');

                if (index + 1 < cantidad){
                    $($('.slider').find('.s_element').get(index + 1)).show();
                    $($('.slider').find('.s_element').get(index + 1)).addClass('s_visible');
                    return false;
                }else{
                    $($('.slider').find('.s_element').get(0)).show();
                    $($('.slider').find('.s_element').get(0)).addClass('s_visible');
                    return false;
                }
            }
        });
    });
});