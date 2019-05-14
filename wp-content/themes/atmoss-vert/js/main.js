/**
 * Created by maximebriand on 27/04/2019.
 */
jQuery(document).ready(function( $ ) {

    //menu navigation
    $('button').on('click', function () {
        $('body').toggleClass('open');
    });

    //slider
    var slider;
    var title = $('.background a');
    var width;
    function resizeWindow() {
        width = $('.slideshow li').width() * -1;
    }
    function startSlider(){
        resizeWindow();
        slider = setInterval(function(){
            $(".slideshow ul li:first-child").animate({"margin-left": width}, 1000, function(){
                $(this).css("margin-left",0).appendTo(".slideshow ul");
            });
            $(".slideshow ul li").removeClass('show');

            $(".slideshow ul li:nth-child(3)").addClass('show');
        }, 4000);
    }

    title.mouseover(function() {
        clearInterval(slider);
    });

    title.mouseout(function() {
        startSlider();
    });

    $(".slideshow ul li:nth-child(2)").addClass('show');
    startSlider();
    $(window).resize(function(){
        resizeWindow();
    });
});