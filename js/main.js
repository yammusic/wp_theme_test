jQuery( function( $ ) {

    var slideShowWidget = $( 'ul.slideshow-widget' );
    var liesSlideshow = slideShowWidget.find( 'li' );
    var slideShowController = $( 'a.slideshow-controller');

    // liesSlideshow.hide();
    liesSlideshow.first().show();

    var slideShowInit = setInterval( function() {
        var obj;
        if ( liesSlideshow.hasClass( 'active' ) ) {
            if ( $( 'li.slideshowWidget-content.active' ).next().html() == undefined ) {
                $( 'li.slideshowWidget-content.active' ).removeClass( 'active' );
                $( 'li.slideshowWidget-content' ).first().addClass( 'active' );
            } else {
                $( 'li.slideshowWidget-content.active' ).removeClass( 'active' ).next().addClass( 'active' );
            }
            console.info( true );
        }
        obj = 'hi';
        return obj;
    }, 7000 );

    slideShowInit;

    slideShowController.click( function( event ) {
        event.preventDefault();
        // clearInterval( slideShowInit );

        if ( $( this ).hasClass( 'prev' ) ) {
            if ( $( 'li.slideshowWidget-content.active' ).prev().html() == undefined ) {
                $( 'li.slideshowWidget-content.active' ).removeClass( 'active' );
                $( 'li.slideshowWidget-content' ).last().addClass( 'active' );
            } else {
                $( 'li.slideshowWidget-content.active' ).removeClass( 'active' ).prev().addClass( 'active' );
            }
        } else {
            if ( $( 'li.slideshowWidget-content.active' ).next().html() == undefined ) {
                $( 'li.slideshowWidget-content.active' ).removeClass( 'active' );
                $( 'li.slideshowWidget-content' ).first().addClass( 'active' );
            } else {
                $( 'li.slideshowWidget-content.active' ).removeClass( 'active' ).next().addClass( 'active' );
            }
        }
    } );

} );