<?php get_header(); ?>

    <section id="main">
        <article id="single">
            <?php
                if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post();
            ?>
                <h2><?php the_title(); ?></h2>
                <small>Publicado por <?php the_author_posts_link(); ?> el <?php the_time( 'j/m/Y' ); ?>. Categoria: <?php the_category( ',' ); ?></small>

                <div class="post">
                    <?php the_content(); ?>
                </div>

                <div class="comentarios">
                    <?php comments_template(); ?>
                </div>

            <?php
                    }
                }
            ?>
        </article>
    </section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>