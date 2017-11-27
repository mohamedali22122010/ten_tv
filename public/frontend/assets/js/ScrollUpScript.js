/**
 * Created by shaimaa on 9/25/2017.
 */
$(document).ready(function() {
    /*****************Scroll Up Icon*****************************/
    /*Scroll UP icon Hide First Load*/
    var scrollup=$('.scrollup');
    if( $(this).scrollTop()>=200){
        scrollup.show();
    }
    else{
        scrollup.hide();
    }

    /*Scroll UP icon Hide and show according to position*/
    $(window).scroll(function(){
        if( $(this).scrollTop()>=100){
            scrollup.fadeIn();
        }
        else{
            scrollup.fadeOut();
        }
    });

    /*scroll Up on click*/
    $('.scrollup').click(function(){
        $("html,body").animate({scrollTop:0},2000);
    });
});
