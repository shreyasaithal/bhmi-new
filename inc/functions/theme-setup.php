<?php
/**
 * 5th-Avenue theme setup
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

if ( ! isset( $content_width ) ) {
	$content_width = 1400;
}

/**
 * Setup theme
 */
function av5_setup() {

	/* add woocommerce support */
	add_theme_support( 'woocommerce' );
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );

	/* add woocommerce flexslider support */
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	/* add title tag support */
	add_theme_support( 'title-tag' );

	/* add yoast seo breadcrumbs support */
	add_theme_support( 'yoast-seo-breadcrumbs' );

	/* Load child theme languages */
	load_theme_textdomain( '5th-avenue', get_stylesheet_directory() . '/languages' );

	/* load theme languages */
	load_theme_textdomain( '5th-avenue', get_template_directory() . '/languages' );

	/* Add default posts and comments RSS feed links to head */
	add_theme_support( 'automatic-feed-links' );

	/* Add support for post thumbnails */
	add_theme_support( 'post-thumbnails' );

	/* Add support for HTML5 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'widgets',
	) );

	/* Theme menus */
	require get_template_directory() . '/inc/functions/theme-menus.php';
}

add_action( 'after_setup_theme', 'av5_setup' );

/* Theme sidebars */
require get_template_directory() . '/inc/functions/theme-sidebars.php';

