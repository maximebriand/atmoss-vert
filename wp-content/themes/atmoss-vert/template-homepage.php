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
                            <video preload="preload" autoplay loop poster="<?= $posterImg;?>" id="bgvid" <?= $isMuted;?>>
                                <source src="<?= $video; ?>" type="video/mp4">
                            </video>
                        </div>
                    </section>
                    <section id="portfolio">
                        <div class="content_slider">
                            <?php $loop2 = new WP_Query( array( 'post_type' => 'chantiers', 'posts_per_page' => 1, 'order'=>'ASC', 'orderby'=>'ID') );?>

                            <?php while ( $loop2->have_posts() ) :   $loop2->the_post(); ?>
                            <div class="gallery_content" style="background-image: url(<?= the_post_thumbnail_url();?>);">
                            <?php endwhile ; ?>
                                <?php $loop = new WP_Query( array( 'post_type' => 'chantiers', 'posts_per_page' => 5, 'paged' => $paged) ); ?>
                                <!--TODO: get the last thumbnail and put it as background URL of gallery_content and remove it from CSS-->


                                <?php while ( $loop->have_posts() ) :   $loop->the_post(); ?>
                                    <div class="gallery_item">
                                        <img src="<?= the_post_thumbnail_url();?>">
                                        <a href="<?= get_permalink(); ?>">
                                            <h3>
                                                <?= get_the_title();?>
                                            </h3>
                                        </a>
                                    </div>
                                <?php endwhile ; ?>
                              <!--TODO: remove this degub simulation-->
                                <?php while ( $loop->have_posts() ) :   $loop->the_post(); ?>
                                    <div class="gallery_item">
                                        <img src="<?= the_post_thumbnail_url();?>">
                                        <a href="<?= get_permalink(); ?>">
                                            <h3>
                                                <?= get_the_title();?>
                                            </h3>
                                        </a>
                                    </div>
                                <?php endwhile ; ?>
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
