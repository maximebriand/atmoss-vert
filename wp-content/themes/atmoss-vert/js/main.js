/**
 * Created by maximebriand on 27/04/2019.
 */
jQuery(document).ready(function($) {

    //menu navigation
    $('button').on('click', function() {
        $('body').toggleClass('open');
    });

    //slider
    var slider;
    var title = $('.background a');
    var width;

    function resizeWindow() {
        width = $('.slideshow li').width() * -1;
    }

    function startSlider() {
        resizeWindow();
        slider = setInterval(function() {
            onClickNavigation();
            animateSlider(width);
        }, 4000);
    }

    function animateSlider(width) {
        clearInterval(slider);
        $(".slideshow ul li:first-child").animate({ "margin-left": width }, 1000, function() {
            $(this).css("margin-left", 0).appendTo(".slideshow ul");
        });
        $(".slideshow ul li").removeClass('show');

        $(".slideshow ul li:nth-child(3)").addClass('show');
        startSlider();
    }

    function onClickNavigation() {
        clearInterval(slider);

        $(".slideshow ul li:first-child").on('click', function() {
            console.log("gauche");
            console.log($(".slideshow ul li"));

            animateSlider(-width);
        })
        $(".slideshow ul li:nth-child(3)").on('click', function() {
            console.log("droite");
            console.log($(".slideshow ul li"));

            animateSlider(width);
        })
    }
    title.mouseover(function() {
        clearInterval(slider);
    });

    title.mouseout(function() {
        startSlider();
    });

    $(".slideshow ul li:nth-child(2)").addClass('show');
    //startSlider();
    $(window).resize(function() {
        resizeWindow();
    });
});