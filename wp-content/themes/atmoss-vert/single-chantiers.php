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
            while ( have_posts() ) : the_post();?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header" style="background-image: url(<?= get_the_post_thumbnail_url();?>)">
                        <?php
                        the_title( '<h1 class="entry-title">', '</h1>' );
                        ?>
                    </header><!-- .entry-header -->

                    <div class="entry-content container">
                        <h2>Ce que les clients recherchaient:</h2>
                        <div class="content">
                            <?php
                            the_content();

                            wp_link_pages( array(
                                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'atmoss-vert' ),
                                'after'  => '</div>',
                            ) );
                            ?>

                        </div>
                    </div><!-- .entry-content -->

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
