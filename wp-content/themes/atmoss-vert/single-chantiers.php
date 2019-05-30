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
        while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header" style="background-image: url(<?= get_the_post_thumbnail_url(); ?>)">
                    <?php
                    the_title('<h1 class="entry-title">', '</h1>');
                    ?>
                </header><!-- .entry-header -->
            
                <div class="entry-content container">
                    <?php if (carbon_get_the_post_meta('img_after') && carbon_get_the_post_meta('img_before')) { ?>

                        <section class="beforeAfter">
                            <figure class="cd-image-container">
                                <img src="<?= carbon_get_the_post_meta('img_after'); ?>" alt="Original Image">
                                <span class="cd-image-label" data-type="original">Après</span>

                                <div class="cd-resize-img">
                                    <!-- the resizable image on top -->
                                    <img src="<?= carbon_get_the_post_meta('img_before'); ?>" alt="Modified Image">
                                    <span class="cd-image-label" data-type="modified">Avant</span>
                                </div>

                                <span class="cd-handle"></span>
                            </figure> <!-- cd-image-container -->

                        </section>
                    <?php } ?>
                    <h2>Ce que les clients recherchaient:</h2>
                    <div class="presentation">
                        <div class="content">
                            <?php
                            the_content();
                            ?>
                        </div>
                        <?php if (carbon_get_the_post_meta('youtube_iframe')) { ?>
                            <div class="youtubeVideo">
                                <?= carbon_get_the_post_meta('youtube_iframe'); ?>
                            </div>
                        <?php
                    } ?>
                    </div>
                </div><!-- .entry-content -->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php if (carbon_get_the_post_meta('crb_media_gallery')) {
                            foreach (carbon_get_the_post_meta('crb_media_gallery') as $media) {
                                $image = wp_get_attachment_image_src($media, 'large');
                                ?>
                                <div class="swiper-slide" style="background-image: url(<?php echo $image[0]; ?>)"></div>
                            <?php
                        }
                    }
                    ?>
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>

                 </div> <!-- end Slider -->

                 <div class="productList">
                    <?php if( carbon_get_the_post_meta('category_products') ) { 
                        $catProducts = carbon_get_the_post_meta('category_products');
                        $shortcode = 'product_category category=' . $catProducts . ' columns="1"'; 
                        var_dump($shortcode);
                    } ?>
                </div>

                <?php
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'atmoss-vert'),
                    'after'  => '</div>',
                ));
                ?>




            </article>
            <!-- #post-<?php the_ID(); ?> -->
        <?php

    // If comments are open or we have at least one comment, load up the comment template.
    /*f ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;*/

    endwhile; // End of the loop.
    ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
