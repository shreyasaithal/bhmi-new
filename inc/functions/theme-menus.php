<?php
/**
 * 5th-Avenue theme menus
 *
 * @package 5th-Avenue
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

// Register theme menu locations.
register_nav_menus( array(
	'header-menu-left'		 => esc_html__( 'Header Menu Left', '5th-avenue' ),
	'header-menu-right'		 => esc_html__( 'Header Menu Right', '5th-avenue' ),
	'slideout-menu'			 => esc_html__( 'Slide Out Menu', '5th-avenue' ),
	'full-screen-menu'		 => esc_html__( 'Full Screen Menu', '5th-avenue' ),
	'mobile-slideout-menu'	 => esc_html__( 'Mobile Menu', '5th-avenue' ),
	'footer-copyright-menu'	 => esc_html__( 'Footer Menu', '5th-avenue' ),
) );
