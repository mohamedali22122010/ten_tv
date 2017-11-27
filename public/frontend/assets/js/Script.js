/**
 * Created by shaimaa on 9/25/2017.
 */
$(document).ready(function() {

    /*Slider*/
    $("#owl-demo").owlCarousel({
        navigation : true, // Show next and prev buttons
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem:true,
        items:1,
        loop:true,
        nav:true,
        dots:true,
        autoplay:true,
        autoplayTimeout:10000,
        navText : ["<svg><use xlink:href='#left'></use></svg>"," <svg><use xlink:href='#right'></use></svg>"]
    });
    /*Slider IMage"Coming Soon"*/
    $("#owl-demo2").owlCarousel({
        navigation : true, // Show next and prev buttons
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem:true,
        items:1,
        loop:true,
        nav:true,
        dots:true,
        autoplay:true,
        autoplayTimeout:10000,
        navText : ["<svg><use xlink:href='#left'></use></svg>"," <svg><use xlink:href='#right'></use></svg>"]
    });

    /*FancyBox*Video**/
    $("[data-fancybox]").fancybox({});

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
