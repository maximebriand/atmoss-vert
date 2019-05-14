<?php
/*
Template Name: Page d'Accueil
*/

get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main homepage onepage-wrapper">

            <?php
            if ( have_posts() ) :

                    $imageCover = carbon_get_the_post_meta( 'image_cover' );
                    ?>


                    <section id="cover" style="background-image:url(<?= $imageCover; ?>">
                        <header>
                            <hgroup>
                                <h1 class="page-title"><?php single_post_title(); ?></h1>
                                <h2><?= get_bloginfo('description');?> </h2>
                            </hgroup>
                        </header>

                    </section>
            <section id="portfolio" class="slideshow">
                <ul>
                    <?php $loop = new WP_Query( array( 'post_type' => 'chantiers', 'posts_per_page' => 5, 'paged' => $paged) ); ?>
                    <?php while ( $loop->have_posts() ) :   $loop->the_post(); ?>
                        <li>
                            <div class="background" style="background-image: url(<?= the_post_thumbnail_url(); ?>)">
                                <a href="<?= get_permalink(); ?>">
                                    <h3>
                                        <?= get_the_title();?>
                                    </h3>
                                </a>
                            </div>
                        </li>
                    <?php endwhile ; ?>

                </ul>
            </section>



                <?php

                /* Start the Loop */
                while ( have_posts() ) :
                    the_post();
                ?>

                <?php
                    /*
                     * Include the Post-Type-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                     */
                  //  get_template_part( 'template-parts/content', get_post_type() );

                endwhile;

              //  the_posts_navigation();

            else :

               // get_template_part( 'template-parts/content', 'none' );

            endif;
            ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
/*get_sidebar();*/
get_footer();
