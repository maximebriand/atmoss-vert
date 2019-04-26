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
                        $isMuted = '';
                    }
                    ?>


                    <div id="hpVideo">
                        <header>
                            <hgroup>
                                <h1 class="page-title"><?php single_post_title(); ?></h1>
                                <h2><?php echo get_bloginfo('description');?> </h2>
                            </hgroup>
                        </header>
                        <div class="video">
                            <video preload="preload" autoplay loop poster="<?php echo $posterImg;?>" id="bgvid" <?php echo $isMuted;?>>
                                <source src="<?php echo $video; ?>" type="video/mp4">
                            </video>
                        </div>
                    </div>
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
/*get_sidebar();
get_footer();*/
