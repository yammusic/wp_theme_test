<?php get_header(); ?>

    <section id="main">

        <div class="slide-banner">
            <?php
                if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'mywidget slideshow' ) ) {}
            ?>
        </div>
        <div class="widgets-theme">
            <?php
                if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'mywidget name' ) ) {}
            ?>
        </div>

        <hr />
        
        <?php 
            if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post();
        ?>
        <article class="posts-main">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <small>Publicado el <?php the_time( 'j/m/Y' ); ?> por <?php the_author_posts_link(); ?></small>
            <?php
                    if ( has_post_thumbnail() ) {
            ?>
            <div class="thumbnail">
                <?php the_post_thumbnail(); ?>
            </div>
            <?php
                    }

                    the_excerpt();
                }
            ?>
        </article>

        <hr />
        <?php
                if ( function_exists( "pagination" ) ) pagination( $additional_loop->max_num_pages );
            }
        ?>

    </section>

    <?php get_footer(); ?>