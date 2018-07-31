<?php
/**
 * 5th-Avenue theme assets
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

/**
 * Setup Styles and Scripts
 */
function av5_scripts() {
	global $avenue;
	$suffix_js = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG || ! av5_get_option( 'min-js' ) ? '' : '.min';
	$suffix_style = defined( 'STYLE_DEBUG' ) && STYLE_DEBUG || ! av5_get_option( 'min-css' ) ? '' : '.min';
	wp_enqueue_style( 'av5-redux-custom-fonts-css', $avenue->uri . '/assets/css/redux-fonts' . $suffix_style . '.css', array(), time(), 'all' );
	// Enable nprogress preloader.
	if ( av5_get_option( 'enable-page-transitions', 0 ) && '1' == av5_get_option( 'page-preloader-style', '1' ) ) {
		wp_enqueue_style( 'nprogress', $avenue->uri . '/assets/css/nprogress' . $suffix_style . '.css', array(), '0.2.0', 'all' );
		wp_enqueue_script( 'nprogress', $avenue->uri . '/assets/js/nprogress' . $suffix_js . '.js', array( 'jquery' ), '0.2.0', true );
	}
	wp_enqueue_style( 'bootstrap', $avenue->uri . '/assets/css/bootstrap' . $suffix_style . '.css', array(), '3.3.7', 'all' );
	wp_enqueue_style( 'av5-icons', $avenue->uri . '/assets/css/5a-icons' . $suffix_style . '.css', array(), $avenue->version, 'all' );
	wp_enqueue_style( 'fontawesome', $avenue->uri . '/assets/css/font-awesome.min.css', array(), $avenue->version, 'all' );
	wp_enqueue_style( 'animate.css', $avenue->uri . '/assets/css/animate' . $suffix_style . '.css', array(), '3.5.2', 'all' );
	wp_enqueue_style( 'owl.carousel', $avenue->uri . '/assets/css/owl.carousel' . $suffix_style . '.css', array(), '2.2.1', 'all' );

	// Main Styles.
	wp_enqueue_style( 'av5-main', $avenue->uri . '/assets/css/main' . $suffix_style . '.css', array(), $avenue->version, 'all' );
	// Woocommerce Styles.
	if ( av5_is_woocommerce_activated() ) {
		if ( av5_get_option( 'shop-page-quickview', '0' ) ) {
			wp_enqueue_style( 'photoswipe' );
			wp_enqueue_style( 'photoswipe-default-skin' );
		}
		wp_enqueue_style( 'av5-shop', $avenue->uri . '/assets/css/woocommerce' . $suffix_style . '.css', array(), $avenue->version, 'all' );
	}
	wp_enqueue_style( 'av5-responsive', $avenue->uri . '/assets/css/responsive' . $suffix_style . '.css', array(), $avenue->version, 'all' );

	// Scripts.
	wp_enqueue_script( 'jquery-validate', $avenue->uri . '/assets/js/jquery.validate' . $suffix_js . '.js', array( 'jquery' ), '1.17.0', true );
	wp_enqueue_script( 'av5-velocity', $avenue->uri . '/assets/js/velocity.min.js', array( 'jquery' ), '1.5.0', true );
	wp_enqueue_script( 'infinite-scroll', $avenue->uri . '/assets/js/infinite-scroll.pkgd' . $suffix_js . '.js', array( 'jquery' ), '3.0.4', true );
	wp_enqueue_script( 'vc_grid-js-imagesloaded', $avenue->uri . '/assets/js/imagesloaded.pkgd' . $suffix_js . '.js', '', '4.1.4', true );
	wp_enqueue_script( 'vc_masonry', $avenue->uri . '/assets/js/masonry.pkgd' . $suffix_js . '.js', array( 'jquery', 'vc_grid-js-imagesloaded' ), '4.2.1', true );
	wp_register_script( 'waypoints', $avenue->uri . '/assets/js/jquery.waypoints' . $suffix_js . '.js', array( 'jquery' ), '4.0.1', true );
	wp_enqueue_script( 'scrollreveal', $avenue->uri . '/assets/js/scrollreveal.min.js', array(), '3.3.6', true );
	wp_register_script( 'jquery-hoverIntent', $avenue->uri . '/assets/js/jquery.hoverIntent.min.js', array(), '1.9.0', true );
	wp_register_script( 'owl.carousel', $avenue->uri . '/assets/js/owl.carousel' . $suffix_js . '.js', array( 'jquery' ), '2.2.1', true );
	wp_register_script( 'nicescroll', $avenue->uri . '/assets/js/jquery.nicescroll.min.js', array( 'jquery' ), '3.7.6', true );
	wp_register_script( 'one-page-scroll', $avenue->uri . '/assets/js/smooth-scroll' . $suffix_js . '.js', array(), '12.1.5', true );
	wp_register_script( 'smooth-scroll', $avenue->uri . '/assets/js/SmoothScroll' . $suffix_js . '.js', array(), '1.4.6', true );
	// Enqueue theme scripts.
	if ( av5_get_option( 'has-nice-scroll' ) ) {
		wp_enqueue_script( 'nicescroll' );
	} else if ( av5_get_option( 'smooth-scroll' ) ) {
		wp_enqueue_script( 'smooth-scroll' );
	}

	wp_enqueue_script( 'av5-js', $avenue->uri . '/assets/js/main' . $suffix_js . '.js', array(
		'jquery',
		'vc_masonry',
		'waypoints',
		'scrollreveal',
		'owl.carousel',
		'infinite-scroll',
		'jquery-hoverIntent',
		'jquery-validate',
	), $avenue->version, true );

	// Add variables to scripts.
	wp_localize_script( 'av5-js', 'av5_JS', array(
		'ajaxurl'					 => admin_url( 'admin-ajax.php' ),
		'smoothscroll'				 => av5_get_option( 'smooth-scroll' ),
		'smoothscroll_links'		 => av5_get_option( 'smooth-scroll-links' ),
		'pagination_type'			 => av5_get_option( 'blog-pagination-type', 'default' ),
		'loadin_animation'			 => av5_get_option( 'blog-loadin-animation', 'none' ),
		'pagination_infinity_loader' => apply_filters( 'av5_blog_pagination_infinity_loader', '<div class="line-preloader"></div>' ),
		'pagination_load_more'		 => esc_js( apply_filters( 'av5_blog_pagination_load_more', esc_html__( 'Load More', '5th-avenue' ) ) ),
		'pagination_message'		 => esc_js( apply_filters( 'av5_shop_pagination_message', esc_html__( 'All items are loaded.', '5th-avenue' ) ) ),
		'owlcarousel_shortcode'		 => array(
			'dots'		 => false,
			'loop'		 => false,
			'nav'		 => true,
			'navText'	 => array(
				'<svg class="next-arrow" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 39 12"><line x1="23" y1="-0.5" x2="29.5" y2="6.5" stroke="#ffffff;"></line><line x1="23" y1="12.5" x2="29.5" y2="5.5" stroke="#ffffff;"></line></svg><span class="line"></span>',
				'<svg class="next-arrow" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 39 12"><line x1="23" y1="-0.5" x2="29.5" y2="6.5" stroke="#ffffff;"></line><line x1="23" y1="12.5" x2="29.5" y2="5.5" stroke="#ffffff;"></line></svg><span class="line"></span>',
			),
		),
		'validation_commentform'	 => array(
			'author'	 => esc_js( esc_html__( 'Please specify your name.', '5th-avenue' ) ),
			'comment'	 => esc_js( esc_html__( 'Please enter your message.', '5th-avenue' ) ),
			'email'		 => array(
				'required'	 => esc_js( esc_html__( 'We need your email address to contact you.', '5th-avenue' ) ),
				'email'		 => esc_js( esc_html__( 'Your email address must be in the format of name@domain.com', '5th-avenue' ) ),
			),
		),
		'load_banner_timeout'		 => av5_get_option( 'load-banner-timeout' ),
		'load_banner_variation'		 => av5_get_option( 'load-banner-many-times' ),
	) );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'av5_scripts', 100 );

/**
 * Enqueue admin scripts and styles.
 */
function av5_admin_scripts() {
	global $avenue;
	$suffix_js = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG || ! av5_get_option( 'min-js' ) ? '' : '.min';
	$suffix_style = defined( 'STYLE_DEBUG' ) && STYLE_DEBUG || ! av5_get_option( 'min-css' ) ? '' : '.min';
	wp_enqueue_style( 'av5-redux-custom-fonts-css', $avenue->uri . '/assets/css/redux-fonts' . $suffix_style . '.css', array(), time(), 'all' );
	wp_enqueue_style( 'av5-main-admin', $avenue->uri . '/assets/css/main-admin.css', array(), $avenue->version, 'all' );
	wp_enqueue_script( '5avenue-admin-functions', $avenue->uri . '/assets/js/functions.admin' . $suffix_js . '.js', array( 'jquery' ), null, true );
}

add_action( 'admin_enqueue_scripts', 'av5_admin_scripts' );
