/**
 * Created by shaimaa on 9/25/2017.
 */
$(document).ready(function() {

    /*STimeLine Slider*/
    $("#owl-demo3").owlCarousel({
        slideBy: 1,//num of next step
        navigation : true, // Show next and prev buttons
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem:true,
        items:1,
        dots:false,
        navText : ["<svg><use xlink:href='#left'></use></svg>"," <svg><use xlink:href='#right'></use></svg>"],
        loop:true,
        margin:2,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            552:{
                items:3
            },
            1000:{
                items:4
            }
        }
    });

});
