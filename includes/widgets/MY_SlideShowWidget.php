<?php
    class MY_SlideShowWidget extends WP_Widget {

        /** constructor */
        function MY_SlideShowWidget() {
            parent::WP_Widget( false, $name = 'My - SlideShow' );
        }

        /** @see WP_Widget::widget */
        function widget( $args, $instance ) {
            extract( $args );

            $TitleImg1 = ( isset( $instance[ 'TitleImg1' ] ) ) ? apply_filters( 'widget_wTitle', $instance[ 'TitleImg1' ] ) : '';
            $DescriptionImg1 = ( isset( $instance[ 'DescriptionImg1' ] ) ) ? apply_filters( 'widget_wContent', $instance[ 'DescriptionImg1' ] ) : '';
            $UrlImg1 = apply_filters( 'widget_image', $instance[ 'UrlImg1' ] );
            $TitleImg2 = ( isset( $instance[ 'TitleImg2' ] ) ) ? apply_filters( 'widget_wTitle', $instance[ 'TitleImg2' ] ) : '';
            $DescriptionImg2 = ( isset( $instance[ 'DescriptionImg2' ] ) ) ? apply_filters( 'widget_wContent', $instance[ 'DescriptionImg2' ] ) : '';
            $UrlImg2 = apply_filters( 'widget_image', $instance[ 'UrlImg2' ] );

            $toEcho = '<ul class="slideshow-widget">';
            $toEcho .= '<li class="slideshowWidget-content active">';
            $toEcho .= '<img class="img" src="'. ( !empty( $UrlImg1 ) ? $UrlImg1 : '' ) .'" />';
            $toEcho .= '<div class="ctx">';
            $toEcho .= '<h1>'. ( !empty( $TitleImg1 ) ? $TitleImg1 : 'Title Image #1' ) .'</h1>';
            $toEcho .= '<span>'. ( !empty( $DescriptionImg1 ) ? $DescriptionImg1 : 'Description for this Image.') .'</span>';
            $toEcho .= '</div>';
            $toEcho .= '</li>';
            $toEcho .= '<li class="slideshowWidget-content">';
            $toEcho .= '<img class="img" src="'. ( !empty( $UrlImg2 ) ? $UrlImg2 : '' ) .'" />';
            $toEcho .= '<div class="ctx">';
            $toEcho .= '<h1>'. ( !empty( $TitleImg2 ) ? $TitleImg2 : 'Title Image #1' ) .'</h1>';
            $toEcho .= '<span>'. ( !empty( $DescriptionImg2 ) ? $DescriptionImg2 : 'Description for this Image.') .'</span>';
            $toEcho .= '</div>';
            $toEcho .= '</li>';
            $toEcho .= '</ul>';
            $toEcho .= '<a class="slideshow-controller prev"><</a>';
            $toEcho .= '<a class="slideshow-controller next">></a>';

            echo $toEcho;
        }

        /** @see WP_Widget::update */
        function update( $new_instance, $old_instance ) {          
            return( $new_instance );
        }

        /** @see WP_Widget::form */
        function form( $instance ) {
            $TitleImg1 = '';
            $DescriptionImg1 = '';
            $UrlImg1 = '';
            $TitleImg2 = '';
            $DescriptionImg2 = '';
            $UrlImg2 = '';

            if ( !empty( $instance[ 'TitleImg1' ] ) ) {
                $TitleImg1 = esc_attr( $instance[ 'TitleImg1' ] );
                $DescriptionImg1 = esc_attr( $instance[ 'DescriptionImg1' ] );
                $UrlImg1 = esc_attr( $instance[ 'UrlImg1' ] );
                $TitleImg2 = esc_attr( $instance[ 'TitleImg2' ] );
                $DescriptionImg2 = esc_attr( $instance[ 'DescriptionImg2' ] );
                $UrlImg2 = esc_attr( $instance[ 'UrlImg2' ] );
            }

            $toEcho = '<div class="admin-my-homewidget">';
            // IMAGE #1
            $toEcho .= '<legend>'. __( 'Image', 'mytheme' ) .' #1</legend>';
            $toEcho .= '<div class="field-widget">';
            // TITLE
            $toEcho .= '<label for="'. $this->get_field_id( 'TitleImg1' ) .'">'. __( 'Title', 'mytheme' ) .':</label><br/>';
            $toEcho .= '<input type="text" id="'. $this->get_field_id( 'TitleImg1' ) .'" name="'. $this->get_field_name( 'TitleImg1' ) .'" value="'. $TitleImg1 .'" />';
            $toEcho .= '</div><br/>';
            // CONTENT
            $toEcho .= '<div class="field-widget">';
            $toEcho .= '<label for="'. $this->get_field_id( 'DescriptionImg1' ) .'">'. __( 'Description', 'mytheme' ) .':</label><br/>';
            $toEcho .= '<textarea id="'. $this->get_field_id( 'DescriptionImg1' ) .'" name="'. $this->get_field_name( 'DescriptionImg1' ) .'">'. $DescriptionImg1 .'</textarea>';
            $toEcho .= '</div><br/>';
            // IMAGE
            $toEcho .= '<div class="field-widget">';
            $toEcho .= '<label for="'. $this->get_field_id( 'UrlImg1' ) .'">'. __( 'URL', 'mytheme' ) .':</label><br/>';
            $toEcho .= '<input type="text" placeholder="Add Media" data-id="image-input" id="'. $this->get_field_id( 'UrlImg1' ) .'" name="'.$this->get_field_name( 'UrlImg1' ) .'" value="'. $UrlImg1 .'" />';
            $toEcho .= '<input type="button" data-id="image-button" class="btn btn-inverse" id="'. $this->get_field_id( 'UrlImg1' ) .'" name="'.$this->get_field_name( 'UrlImg1' ) .'" value="Add Media" onclick="addMediaButton( jQuery( this ) )" />';
            $toEcho .= '</div><br/>';
            // IMAGE #2
            $toEcho .= '<legend>'. __( 'Image', 'mytheme' ) .' #2</legend>';
            $toEcho .= '<div class="field-widget">';
            // TITLE
            $toEcho .= '<label for="'. $this->get_field_id( 'TitleImg2' ) .'">'. __( 'Title', 'mytheme' ) .':</label><br/>';
            $toEcho .= '<input type="text" id="'. $this->get_field_id( 'TitleImg2' ) .'" name="'. $this->get_field_name( 'TitleImg2' ) .'" value="'. $TitleImg2 .'" />';
            $toEcho .= '</div><br/>';
            // CONTENT
            $toEcho .= '<div class="field-widget">';
            $toEcho .= '<label for="'. $this->get_field_id( 'DescriptionImg2' ) .'">'. __( 'Description', 'mytheme' ) .':</label><br/>';
            $toEcho .= '<textarea id="'. $this->get_field_id( 'DescriptionImg2' ) .'" name="'. $this->get_field_name( 'DescriptionImg2' ) .'">'. $DescriptionImg2 .'</textarea>';
            $toEcho .= '</div><br/>';
            // IMAGE
            $toEcho .= '<div class="field-widget">';
            $toEcho .= '<label for="'. $this->get_field_id( 'UrlImg2' ) .'">'. __( 'URL', 'mytheme' ) .':</label><br/>';
            $toEcho .= '<input type="text" placeholder="Add Media" data-id="image-input" id="'. $this->get_field_id( 'UrlImg2' ) .'" name="'.$this->get_field_name( 'UrlImg2' ) .'" value="'. $UrlImg2 .'" />';
            $toEcho .= '<input type="button" data-id="image-button" class="btn btn-inverse" id="'. $this->get_field_id( 'UrlImg2' ) .'" name="'.$this->get_field_name( 'UrlImg2' ) .'" value="Add Media" onclick="addMediaButton( jQuery( this ) )" />';
            $toEcho .= '</div><br/>';
            $toEcho .= '</div>';

            echo $toEcho;
        }
    }
?>