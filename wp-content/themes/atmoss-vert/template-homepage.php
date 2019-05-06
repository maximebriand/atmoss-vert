<?php
/*
Template Name: Page d'Accueil
*/

get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <?php
            if ( have_posts() ) :

                    $video = carbon_get_the_post_meta( 'video_presentation' );
                    $posterImg = carbon_get_the_post_meta( 'poster_presentation' );
                    $posterImg = 'https://images.unsplash.com/photo-1499463217683-ee3c9ce038f1?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjI0MX0';
                    if (carbon_get_the_post_meta( 'is_muted' ))
                    {
                        $isMuted = 'muted';
                    } else
                    {
                        $isMuted = NULL;
                    }
                    ?>


                    <section id="hpVideo">
                        <header>
                            <?= get_custom_logo(); ?>
                            <hgroup>
                                <h1 class="page-title"><?php single_post_title(); ?></h1>
                                <h2><?= get_bloginfo('description');?> </h2>
                            </hgroup>
                        </header>
                        <div class="video">
                            <div class="video-overlay"></div>
                            <video preload="auto" autoplay loop muted id="bgvid">
                                <source src="<?= $video; ?>" type="video/mp4">
                            </video>
                        </div>
                    </section>
                    <section id="portfolio">
                        <div class="slider">
                            <?php $loop = new WP_Query( array( 'post_type' => 'chantiers', 'posts_per_page' => 5, 'paged' => $paged) ); ?>

                            <?php while ( $loop->have_posts() ) :   $loop->the_post(); ?>

                            <div class="slider__slide">
                                <div class="slider__wrap">
                                    <div class="slider__back"style="background-image:url(<?= get_the_post_thumbnail_url();?>)"></div>
                                </div>
                                <a href="<?= get_post_permalink(); ?>">
                                    <div class="slider__inner" style="background-image:url(<?= get_the_post_thumbnail_url();?>)">
                                        <div class="slider__content">
                                            <h3>
                                                <?= get_the_title();?>
                                            </h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php endwhile ; ?>

                            <div class="slider__indicators"></div>
                            <div class="slider_navigation">
                                <a class="go-to-previous">Précédent</a>
                                <a class="go-to-next">Suivant</a>
                            </div>
                        </div>
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
