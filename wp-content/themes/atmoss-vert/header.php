<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Atmoss\'_Vert
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
   <!-- <script
            src="https://code.jquery.com/jquery-3.4.0.min.js"
            integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
            crossorigin="anonymous"></script>-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <button class="menu-toggle"></button>
<!--    <nav id="primary-menu">
        <ul class="menu">
            <li data-text="Home">Home</li>
            <li data-text="Projects">Projects</li>
            <li data-text="About">About</li>
            <li data-text="Contact">Contact</li>
        </ul>
    </nav>-->
    <nav id="site-navigation" class="main-navigation">
        <?php
        wp_nav_menu( array(
            'theme_location' => 'menu-1',
            'menu_id'        => 'primary-menu',
        ) );
        ?>
    </nav><!-- #site-navigation -->

	<div id="content" class="site-content">
