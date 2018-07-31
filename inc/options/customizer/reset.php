<?php
/**
 * Reset option theme for cutomizer
 *
 * @package           5th-Avenue\Option
 * @subpackage        Redux
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

Kirki::add_section( 'advanced', array(
	'title'			 => esc_html__( 'Reset Options', '5th-avenue' ),
	'priority'		 => 999,
	'description'	 => esc_html__( 'Click the reset button to reset all options to default values.', '5th-avenue' ),
) );
Kirki::add_field( 'av5_reset_settings', array(
	'type'		 => 'custom',
	'settings'	 => 'custom_title_advanced_reset',
	'label'		 => '',
	'section'	 => 'advanced',
	'default'	 => '<div class="reset-options-container"><a href="' . esc_url( str_replace( '%', '%%', add_query_arg( 'av5-customizer-reset', wp_create_nonce( 'reset' ) ) ) ) . '" id="av5-customizer-reset" class="button-primary button" title="Reset Theme Options">Reset Theme Options</a></div>',
) );

if ( ! function_exists( 'av5_kirki_custom_action' ) ) {

	/**
	 * Reset customize value
	 */
	function av5_kirki_custom_action() {
		$reset = filter_input( INPUT_GET, 'av5-customizer-reset' );
		if ( $reset && wp_verify_nonce( $reset, 'reset' ) ) {
			remove_theme_mods();
			wp_safe_redirect( remove_query_arg( 'av5-customizer-reset' ) );
		}
	}

	add_action( 'customize_controls_init', 'av5_kirki_custom_action', 0 );
}
