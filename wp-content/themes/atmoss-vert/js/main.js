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
        $('html, body, *').mousewheel(function(e, delta) {
            this.scrollLeft -= (delta );
            e.preventDefault();
        });
    });
});