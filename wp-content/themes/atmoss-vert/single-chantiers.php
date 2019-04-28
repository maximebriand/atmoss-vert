<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Atmoss\'_Vert
 */

get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php
            while ( have_posts() ) :
                the_post();?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header" style="background-image: url(<?= get_the_post_thumbnail_url();?>)">
                    <?php
                    the_title( '<h1 class="entry-title">', '</h1>' );
                    ?>
                </header><!-- .entry-header -->

                <div class="entry-content container">
                    <?php
                    the_content( sprintf(
                        wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'atmoss-vert' ),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        get_the_title()
                    ) );

                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'atmoss-vert' ),
                        'after'  => '</div>',
                    ) );
                    ?>
                </div><!-- .entry-content -->

                <footer class="entry-footer">
                    <?php atmoss_vert_entry_footer(); ?>
                </footer><!-- .entry-footer -->
                </article><!-- #post-<?php the_ID(); ?> -->
                <?php

                // If comments are open or we have at least one comment, load up the comment template.
/*                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;*/

            endwhile; // End of the loop.
            ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
