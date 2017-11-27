/**
 * Created by shaimaa on 9/25/2017.
 */
$(document).ready(function() {
    /**************************Counter************************************/
    var a = 0;
    $(window).scroll(function() {
        var oTop = $('.graph-data').offset().top - window.innerHeight;
        if (a == 0 && $(window).scrollTop() > oTop) {
            $('.counter').each(function() {
                var $this = $(this),
                    countTo = $this.attr('data-count');
                $({ countNum: $this.text()}).animate({
                        countNum: countTo
                    },
                    {
                        duration: 10000,
                        easing:'linear',
                        step: function() {
                            $this.text(Math.floor(this.countNum));
                        },
                        complete: function() {
                            $this.text(this.countNum);
                            //alert('finished');
                        }
                    });
            });
            a = 1;
        }
    });
});
