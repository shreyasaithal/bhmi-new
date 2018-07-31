<?php
/**
 * 5th-Avenue redux theme options
 *
 * @package 5th-Avenue
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Redux' ) ) {
	return;
}

// This is your option name where all the Redux data is stored.
$opt_name = apply_filters( 'av5_redux_name', 'lid_av5' );

/**
 * * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 * */
$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
	'opt_name'				 => $opt_name,
	'dev_mode'				 => false,
	'disable_tracking'		 => true,
	'use_cdn'				 => true,
	'display_version'		 => $theme->get( 'Version' ),
	'display_name'			 => esc_html__( 'Fifth Avenue', '5th-avenue' ),
	'page_title'			 => esc_html__( '5th Avenue', '5th-avenue' ),
	'menu_title'			 => esc_html__( '5th Avenue', '5th-avenue' ),
	'page_slug'				 => '_lid_options',
	'update_notice'			 => false,
	'admin_bar'				 => true,
	'admin_bar_icon'		 => 'dashicons-portfolio',
	'admin_bar_priority'	 => 100,
	'menu_type'				 => 'menu',
	'google_api_key'		 => '',
	'google_update_weekly'	 => false,
	'allow_sub_menu'		 => true,
	'page_parent'			 => 'themes.php',
	'page_priority'			 => 25,
	'default_mark'			 => '',
	'hints'					 => array(
		'icon'			 => 'el el-question-sign',
		'icon_position'	 => 'right',
		'icon_color'	 => 'lightgray',
		'icon_size'		 => 'normal',
		'tip_style'		 => array(
			'color'		 => 'light',
			'shadow'	 => true,
			'rounded'	 => false,
			'style'		 => '',
		),
		'tip_position'	 => array(
			'my' => 'top left',
			'at' => 'bottom right',
		),
		'tip_effect'	 => array(
			'show'	 => array(
				'effect'	 => 'slide',
				'duration'	 => '500',
				'event'		 => 'mouseover',
			),
			'hide'	 => array(
				'effect'	 => 'slide',
				'duration'	 => '500',
				'event'		 => 'click mouseleave',
			),
		),
	),
	'customizer'			 => false,
	'compiler'				 => false,
	'output'				 => false,
	'output_tag'			 => true,
	'settings_api'			 => true,
	'cdn_check_time'		 => true,
	'page_permissions'		 => 'manage_options',
	'menu_icon'				 => get_template_directory_uri() . '/assets/img/admin-icon.svg',
	'save_defaults'			 => true,
	'default_show'			 => false,
	'show_import_export'	 => true,
	'show_options_object'	 => false,
	'last_tab'				 => '',
	'footer_credit'			 => '',
	'page_icon'				 => 'icon-themes',
	'database'				 => 'options',
	'transient_time'		 => '3600',
	'network_sites'			 => true,
	'async_typography'		 => true,
	'intro_text'			 => '',
);
if ( ! isset( $args['global_variable'] ) || false !== $args['global_variable'] ) {
	if ( ! empty( $args['global_variable'] ) ) {
		$v = $args['global_variable'];
	} else {
		$v = str_replace( '-', '_', $args['opt_name'] );
	}
}

Redux::setArgs( $opt_name, $args );

// Loader.
$path = dirname( __FILE__ ) . '/theme';
foreach ( glob( $path . '/*.php' ) as $file ) {
	require_once $file;
}

// Register sections.
foreach ( $theme_option_sections as $id => $section ) {
	Redux::setSection( $opt_name, $section );
}

