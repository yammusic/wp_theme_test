var customUploader;

function changeStyleButton( that ) {
    jQuery( 'button#button-preview-style' ).attr( { 'class' : '' } );
    jQuery( 'button#button-preview-style' ).addClass( that.val() );
    jQuery( 'button#button-preview-style' ).parent().find( 'input[type="hidden"]' ).val( that.val() );
    return( false );
}

function addMediaButton( that ) {
 
    if ( customUploader ) {
        customUploader.open();
        return( false );
    }

    customUploader = wp.media.frames.file_frame = wp.media( {
        title: 'Choose Image',
        button: {
            text: 'Choose Image'
        },
        multiple: false
    } );

    customUploader.on( 'select' , function() {
        attachment = customUploader.state().get( 'selection' ).first().toJSON();
        that.parent().find( 'input[data-id="image-input"]' ).val( attachment.url );
    } );

    customUploader.open();
    return( false );
}