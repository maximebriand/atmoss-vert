<?php
/**
 * Atmoss\' Vert functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Atmoss\'_Vert
 */
use Carbon_Fields\Container;
use Carbon_Fields\Field;

//to manage uplaod video
@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

if ( ! function_exists( 'atmoss_vert_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function atmoss_vert_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Atmoss\' Vert, use a find and replace
		 * to change 'atmoss-vert' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'atmoss-vert', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'atmoss-vert' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'atmoss_vert_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'atmoss_vert_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function atmoss_vert_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'atmoss_vert_content_width', 640 );
}
add_action( 'after_setup_theme', 'atmoss_vert_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function atmoss_vert_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'atmoss-vert' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'atmoss-vert' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'atmoss_vert_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function atmoss_vert_scripts() {
    //todo: rooting js files and css
	wp_enqueue_style( 'atmoss-vert-style', get_stylesheet_uri() );

    wp_enqueue_script( 'atmoss-vert-slider', get_template_directory_uri() . '/js/DiagonalSlider.js', array('jquery'), '20151215', true );
    wp_enqueue_script( 'atmoss-vert-main', get_template_directory_uri() . '/js/main.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'atmoss-vert-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    if ( is_front_page() || (is_front_page() && is_home()) ) {
    }

	if (is_singular( 'chantiers' )) {
        wp_enqueue_script( 'atmoss-vert-before-after', get_template_directory_uri() . '/js/before-after.js', array('jquery'), '20151215', true );

    }
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'atmoss_vert_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

add_image_size( 'HP_slider', 1800, 900 );

/*******************************
 *
 CARBON FIELDS
 *
 ********************************/
add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once( 'vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}

//add video on the hompepage template
add_action( 'carbon_fields_register_fields', 'template_hp_cf' );
function template_hp_cf() {
    Container::make( 'post_meta', __( 'Post Options', 'crb' ) )
        ->show_on_template('template-homepage.php')
        ->add_fields( array(
            Field::make( 'file', 'video_presentation', 'Vidéo de Présentation MP4', 'test description' )->set_value_type( 'url' ),
            Field::make( 'checkbox', 'is_muted', 'Son désactivé' )
                ->set_option_value( 'yes' )
        ) )
    ;
}

//add fields cpt chantiers
add_action( 'carbon_fields_register_fields', 'cpt_chantiers_cf' );
function cpt_chantiers_cf() {
    Container::make( 'post_meta', __( 'Post Options', 'crb' ) )
        ->show_on_post_type('chantiers')
        ->add_fields( array(
            Field::make( 'image', 'img_before', 'Image avant' )->set_value_type( 'url' ),
            Field::make( 'image', 'img_after', 'Image avant' )->set_value_type( 'url' ),
        ) )
    ;
}



/*******************************
 *
   CUSTOM POST TYPE
 *
********************************/

function wpm_custom_post_type() {

    $labels = array(
        'name'                => _x( 'Chantiers', 'Post Type General Name'),
        'singular_name'       => _x( 'Chantier', 'Post Type Singular Name'),
        'menu_name'           => __( 'Mes Chantiers'),
        'all_items'           => __( 'Tous les chantiers'),
        'view_item'           => __( 'Voir les chantiers'),
        'add_new_item'        => __( 'Ajouter un nouveau chantier'),
        'add_new'             => __( 'Ajouter'),
        'edit_item'           => __( 'Editer le chantier'),
        'update_item'         => __( 'Modifier le chantier'),
        'search_items'        => __( 'Rechercher un chantier'),
        'not_found'           => __( 'Non trouvé'),
        'not_found_in_trash'  => __( 'Non trouvé dans la corbeille'),
    );

    $args = array(
        'label'               => __( 'Chantiers'),
        'description'         => __( 'Tous sur chantier'),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        'hierarchical'        => false,
        'public'              => true,
        'has_archive'         => true,
        'rewrite'			  => array( 'slug' => 'chantiers'),
        'menu_icon'           => 'dashicons-palmtree',
        'show_in_rest' => true,
        'publicly_queryable' => true,

    );

    register_post_type( 'chantiers', $args );

}

add_action( 'init', 'wpm_custom_post_type', 0 );

