<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @package 5th-Avenue
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register widget area.
 */
function av5_widgets_init() {
	register_sidebar( array(
		'name'			 => esc_html__( 'Default Sidebar', '5th-avenue' ),
		'id'			 => 'default',
		'description'	 => '',
		'before_widget'	 => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	 => '</aside>',
		'before_title'	 => '<h2 class="widget-title">',
		'after_title'	 => '</h2>',
	) );
	register_sidebar( array(
		'name'			 => esc_html__( 'Footer Area 1', '5th-avenue' ),
		'id'			 => 'footer-area-1',
		'description'	 => '',
		'before_widget'	 => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	 => '</aside>',
		'before_title'	 => '<h4 class="widget-title">',
		'after_title'	 => '</h4>',
	) );
	register_sidebar( array(
		'name'			 => esc_html__( 'Mobile Menu Before', '5th-avenue' ),
		'id'			 => 'mobile-menu-before',
		'description'	 => '',
		'before_widget'	 => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	 => '</aside>',
		'before_title'	 => '<h4 class="widget-title">',
		'after_title'	 => '</h4>',
	) );
	register_sidebar( array(
		'name'			 => esc_html__( 'Mobile Menu After', '5th-avenue' ),
		'id'			 => 'mobile-menu-after',
		'description'	 => '',
		'before_widget'	 => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	 => '</aside>',
		'before_title'	 => '<h4 class="widget-title">',
		'after_title'	 => '</h4>',
	) );

	$footer_columns = ( ! empty( av5_get_option( 'footer-widget-area-columns' ) ) ) ? av5_get_option( 'footer-widget-area-columns' ) : '4';
	if ( in_array( $footer_columns, array( '2', '3', '4', '5', '6' ) ) ) {
		register_sidebar( array(
			'name'			 => 'Footer Area 2',
			'id'			 => 'footer-area-2',
			'before_widget'	 => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'	 => '</aside>',
			'before_title'	 => '<h4 class="widget-title">',
			'after_title'	 => '</h4>',
		) );
	}
	if ( in_array( $footer_columns, array( '3', '4', '5', '6' ) ) ) {
		register_sidebar( array(
			'name'			 => 'Footer Area 3',
			'id'			 => 'footer-area-3',
			'before_widget'	 => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'	 => '</aside>',
			'before_title'	 => '<h4 class="widget-title">',
			'after_title'	 => '</h4>',
		) );
	}
	if ( in_array( $footer_columns, array( '4', '5' ) ) ) {
		register_sidebar( array(
			'name'			 => 'Footer Area 4',
			'id'			 => 'footer-area-4',
			'before_widget'	 => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'	 => '</aside>',
			'before_title'	 => '<h4 class="widget-title">',
			'after_title'	 => '</h4>',
		) );
	}
}

add_action( 'widgets_init', 'av5_widgets_init' );
