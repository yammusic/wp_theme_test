<?php
    class MY_HomeWidget extends WP_Widget {

        /** constructor */
        function MY_HomeWidget() {
            parent::WP_Widget( false, $name = 'My - Home' );
        }

        /** @see WP_Widget::widget */
        function widget( $args, $instance ) {
            extract( $args );

            $wTitle = ( isset( $instance[ 'wTitle' ] ) ) ? apply_filters( 'widget_wTitle', $instance[ 'wTitle' ] ) : '';
            $wContent = ( isset( $instance[ 'wContent' ] ) ) ? apply_filters( 'widget_wContent', $instance[ 'wContent' ] ) : '';
            $bText = ( isset( $instance[ 'bText' ] ) ) ? apply_filters( 'widget_bText', $instance[ 'bText' ] ) : '';
            $bURL = ( isset( $instance[ 'bURL' ] ) ) ? apply_filters( 'widget_bURL', $instance[ 'bURL' ] ) : '';
            $bStyle = ( isset( $instance[ 'bStyle' ] ) ) ? apply_filters( 'widget_bStyle', $instance[ 'bStyle' ] ) : '';
            $image = apply_filters( 'widget_image', $instance[ 'image' ] );

            $toEcho = '<article class="widget">';
            $toEcho .= '<img src="'. ( !empty( $image ) ? $image : '' ) .'" /><br /><br />';
            $toEcho .= '<h1>'. ( !empty( $wTitle ) ? $wTitle : __( 'Title Widget', 'mytheme' ) ) .'</h1>';
            $toEcho .= '<p>'. ( !empty( $wContent ) ? $wContent : __( 'Content Widget', 'mytheme' ) ) .'</p>';
            $toEcho .= '<a href="'. ( !empty( $bURL ) ? $bURL : '#' ) .'" class="'. ( !empty( $bStyle ) ? $bStyle : 'btn btn-primary' ) .'">'. ( !empty( $bText ) ? $bText : __( 'Read More...', 'mytheme' ) ) .'</a>';
            $toEcho .= '</article>';

            echo $toEcho;
        }

        /** @see WP_Widget::update */
        function update( $new_instance, $old_instance ) {          
            return( $new_instance );
        }

        /** @see WP_Widget::form */
        function form( $instance ) {
            $wTitle = '';
            $wContent = '';
            $bText = '';
            $bURL = '';
            $bStyle = '';
            $image = '';

            if ( !empty( $instance[ 'wTitle' ] ) ) {
                $wTitle = esc_attr( $instance[ 'wTitle' ] );
                $wContent = esc_attr( $instance[ 'wContent' ] );
                $bText = esc_attr( $instance[ 'bText' ] );
                $bURL = esc_attr( $instance[ 'bURL' ] );
                $bStyle = esc_attr( $instance[ 'bStyle' ] );
                $image = esc_attr( $instance[ 'image' ] );
            }

            $toEcho = '<div class="admin-my-homewidget">';
            // TITLE
            $toEcho .= '<div class="field-widget">';
            $toEcho .= '<label for="'. $this->get_field_id( 'wTitle' ) .'">'. __( 'Title', 'mytheme' ) .':</label><br/>';
            $toEcho .= '<input type="text" id="'. $this->get_field_id( 'wTitle' ) .'" name="'. $this->get_field_name( 'wTitle' ) .'" value="'. $wTitle .'" />';
            $toEcho .= '</div><br/>';
            // CONTENT
            $toEcho .= '<div class="field-widget">';
            $toEcho .= '<label for="'. $this->get_field_id( 'wContent' ) .'">'. __( 'Content', 'mytheme' ) .':</label><br/>';
            $toEcho .= '<textarea id="'. $this->get_field_id( 'wContent' ) .'" name="'. $this->get_field_name( 'wContent' ) .'">'. $wContent .'</textarea>';
            $toEcho .= '</div><br/>';
            // BUTTON
            $toEcho .= '<div class="field-widget">';
            $toEcho .= '<legend>'. __( 'Button', 'mytheme' ) .'</legend>';
            // BUTTON TEXT
            $toEcho .= '<label for="'. $this->get_field_id( 'bText' ) .'">'. __( 'Text', 'mytheme' ) .':</label><br/>';
            $toEcho .= '<input type="text" id="'. $this->get_field_id( 'bText' ) .'" name="'. $this->get_field_name( 'bText' ) .'" value="'. $bText .'" />';
            // BUTTON URL
            $toEcho .= '<label for="'. $this->get_field_id( 'bURL' ) .'">'. __( 'URL', 'mytheme' ) .':</label><br/>';
            $toEcho .= '<input type="text" id="'. $this->get_field_id( 'bURL' ) .'" name="'. $this->get_field_name( 'bURL' ) .'" value="'. $bURL .'" />';
            // BUTTON STYLE
            $toEcho .= '<label for="style">'. __( 'Style', 'mytheme' ) .':</label><br/>';
            $toEcho .= '<input type="hidden" id="'. $this->get_field_id( 'bStyle' ) .'" name="'. $this->get_field_name( 'bStyle' ) .'" value="'. $bStyle .'" />';
            $toEcho .= '<select id="button-list-style-widget" onchange="changeStyleButton( jQuery( this ) )">';
            $toEcho .= '<option value="btn btn-primary" '. ( $bStyle == 'btn btn-primary' ? 'selected' : '' ) .'>Primary</option>';
            $toEcho .= '<option value="btn btn-info" '. ( $bStyle == 'btn btn-info' ? 'selected' : '' ) .'>Info</option>';
            $toEcho .= '<option value="btn btn-success" '. ( $bStyle == 'btn btn-success' ? 'selected' : '' ) .'>Success</option>';
            $toEcho .= '<option value="btn btn-warning" '. ( $bStyle == 'btn btn-warning' ? 'selected' : '' ) .'>Warning</option>';
            $toEcho .= '<option value="btn btn-danger" '. ( $bStyle == 'btn btn-danger' ? 'selected' : '' ) .'>Danger</option>';
            $toEcho .= '</select>';
            $toEcho .= '<button id="button-preview-style" class="'. ( !empty( $bStyle ) ? $bStyle : 'btn btn-primary' ) .'" onclick="return( false )">'. __( 'Button', 'mytheme' ) .'</button>';
            $toEcho .= '</div><br/>';
            // IMAGE
            $toEcho .= '<legend>'. __( 'Image', 'mytheme' ) .'</legend>';
            $toEcho .= '<div class="field-widget">';
            $toEcho .= '<label for="'. $this->get_field_id( 'image' ) .'">'. __( 'Url', 'mytheme' ) .':</label><br/>';
            $toEcho .= '<input type="text" placeholder="Add Media" data-id="image-input" id="'. $this->get_field_id( 'image' ) .'" name="'.$this->get_field_name( 'image' ) .'" value="'. $image .'" />';
            $toEcho .= '<input type="button" data-id="image-button" class="btn btn-inverse" id="'. $this->get_field_id( 'image' ) .'" name="'.$this->get_field_name( 'image' ) .'" value="Add Media" onclick="addMediaButton( jQuery( this ) )" />';
            $toEcho .= '</div><br/>';
            $toEcho .= '</div>';

            echo $toEcho;
        }
    }
?>