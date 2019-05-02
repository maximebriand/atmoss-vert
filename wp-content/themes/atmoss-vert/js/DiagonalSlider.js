jQuery(document).ready(function( $ ) {

    /*
    source:
     DiagonalSlider.js
     jQuery plugin to create diagonal slider
     (c) Innvenio 2015 (@innvenio)

     modified to make a slider with define width and an extendable div
     */

    function loadSlider(slider,default_text){
        var w;
        var x;
        var width = 0;
        var image_width = slider.find('.gallery_item img').width();
        var image_height = slider.find('.gallery_item img').height();
        var out = true;
        var valor = 0;
        var timeout;
        var length_gallery_item = slider.find('.gallery_item').length;

        valor = length_gallery_item * 25;
        if($(window).width() < 1060){
            valor = length_gallery_item * 40;
        }
        w = $(window).width() + ($(window).width() / length_gallery_item) + valor;
        if(length_gallery_item > 4) {
            width = w / 2;
            slider.width(length_gallery_item * 400 - 300);
            slider.find('.gallery_item').width((400));
            slider.find('.gallery_item img').css('margin-left', -400);
            x = 300;
        } else {
            width = w / 3;
            slider.width(w);
            slider.find('.gallery_item').width((w / length_gallery_item));
            slider.find('.gallery_item img').css('margin-left', ((image_width / 2) * -1) + (w / length_gallery_item));
            x = (w / length_gallery_item) - (width / length_gallery_item - 1);
        }
        slider.height($(window).height());
        if($(window).height()<image_height){
            slider.find('.gallery_item img').css('top', ((image_height-$(window).height())/2)*-1);
        }
        var i = 1;
        slider.find('.gallery_item').each(function(){
            $(this).attr('data-position', i);
            i++;
        });

        height_img = slider.find('.gallery_item img').height();

        if(height_img < slider.height()){
            slider.height(height_img);
        }

        $('.content_slider').find('.content_title').css('margin-top',slider.height() - 200);

        slider.find('.gallery_item').unbind("hover");
        slider.find('.gallery_item').hover(function(){
            var item = $(this);
            if (out){
                out = false;
                if (timeout){
                    clearTimeout(timeout);
                }

                timeout = setTimeout(function(){
                    zoomIn(item, function(){ });
                }, 10);
            }

        }, function(){
            zoomOut(function(){
                out = true;
            });
        });

        function zoomOut(callback){
            slider.find('.gallery_item').each(function(){
                var x = w / length_gallery_item;
                $(this).css('width', 400);
            });

            setTimeout(function(){
                if (out) {
                    $('.content_slider').find('.content_title .text').html(default_text);
                }
            }, 200);

            callback();
        }

        function zoomIn(item, callback){
            slider.find('.gallery_item').each(function(){
                if ($(this).attr('data-position') != item.attr('data-position')){
                    $(this).css('width', x);
                }
                else
                {
                    item.css('width', ((w / length_gallery_item) + width) - ((width / length_gallery_item) * 1.5));
                    var title = item.find('img').attr('data-title');
                    $('.content_slider').find('.content_title .text').html(title);
                }
            });
            callback();
        }
    }

    (function($) {
        $.fn.createDiagonalSlider = function() {
            var slider = $(this);
            var doit;
            var default_text = $('.content_slider').find('.content_title').attr('data-default-text');

            setTimeout(function(){
                loadSlider(slider, default_text);
            }, 10);

            function resizedw(){
                loadSlider(slider, default_text);
            }

            window.onresize = function() {
                clearTimeout(doit);
                doit = setTimeout(function() {
                    resizedw();
                }, 100);
            };

        }
    }(jQuery));


function redimensionnement(){

    var $image = $('.gallery_item img');
    var image_width = $image.width();
    var image_height = $image.height();

    var over = image_width / image_height;
    var under = image_height / image_width;

    var body_width = $(window).width();
    var body_height = $(window).height();

    if (body_width / body_height >= over) {
        $image.css({
            'width': body_width + 'px',
            'height': Math.ceil(under * body_width) + 'px',
            'left': '0px',
            'top': Math.abs((under * body_width) - body_height) / -2 + 'px'
        });
    }

    else {
        $image.css({
            'width': Math.ceil(over * body_height) + 'px',
            'height': body_height + 'px',
            'top': '0px',
            'left': Math.abs((over * body_height) - body_width) / -2 + 'px'
        });
    }
}

// Au chargement initial
redimensionnement();

// En cas de redimensionnement de la fenêtre
$(window).resize(function(){
    redimensionnement();
});

    //mouse hover scroll
/*    var b = null;
    $( '.gallery_content' ).on( 'mousemove', function(e) {
        const speed = 200;
        var container = $(this).parent();
        if ((e.pageX - container.offset().left) < container.width() / 2) {
            var direction = function() {
                container.animate( {scrollLeft: '-='}, 1000, 'linear', direction );
            }
            if ((b == false) || (b == null)) {
                b = true;
                container.stop( true ).animate( {scrollLeft: '-='  + speed}, 1000, 'linear', direction );
            }
        } else {
            var direction = function() {

                container.animate( {scrollLeft: '+='  + speed}, 1000, 'linear', direction );
            }
            if ((b == true) || (b == null)) {
                b = false;
                container.stop( true ).animate( {scrollLeft: '+=' + speed}, 1000, 'linear', direction );
            }
        }
    }).on ( 'mouseleave', function() {
        var container = $(this).parent();
        container.stop( true );
        b = null;
    });*/

});