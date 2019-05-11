/**
 * Created by maximebriand on 27/04/2019.
 */
jQuery(document).ready(function( $ ) {

    //menu navigation
    $('button').on('click', function () {
        $('body').toggleClass('open');
    });

    //slider
    $('.gallery_content').createDiagonalSlider();

    $(document).ready(function() {
        $('.go-to-next').click(function(event) {
            horizontalNavigation("+=300px", event);
        });
        $('.go-to-previous').click(function(event) {
            horizontalNavigation("-=300px", event);
        });
    });

    function horizontalNavigation(position, event) {
        event.preventDefault();
        $('html,body').animate({ scrollLeft: position }, 400);

    }

    $(document).scroll(function() {
        var y = $(document).scrollTop(), //get page y value
            header = $(".nav");
        if(y >= $(window).height())  {
            header.css("display", "block");
        } else {
            header.css("display", "none" );
        }
    });
});