<?php get_header(); ?>

    <section id="main">
        
        <?php
            get_page( $page_id );
            $page_data = get_page( $page_id );
            echo '<h2>'. $page_data->post_title .'</h2>';
            echo do_shortcode( apply_filters( 'the_content', $page_data->post_content ) );
            // echo do_shortcode( $page_data->post_content );
        ?>

    </section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>