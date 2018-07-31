<?php
/**
 * Kirki Advanced Customizer
 *
 * @package           5th-Avenue
 * @subpackage        Kirki
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

// Early exit if Kirki is not installed.
if ( ! class_exists( 'Kirki' ) ) {
	return;
}

if ( ! function_exists( 'av5_disable_default_customizer' ) ) {

	/**
	 * Disable default customizer section
	 *
	 * @param \WP_Customize_Manager $wp_customize Customizer.
	 */
	function av5_disable_default_customizer( $wp_customize ) {
		// Colors.
		$wp_customize->remove_section( 'colors' );
		// Header Image.
		$wp_customize->remove_section( 'header_image' );
		// Background Image.
		$wp_customize->remove_section( 'background_image' );
		$suffix_style = defined( 'STYLE_DEBUG' ) && STYLE_DEBUG || ! av5_get_option( 'min-css' ) ? '' : '.min';
		wp_enqueue_style( 'av5-customizer-admin', get_template_directory_uri() . '/assets/css/customizer-admin' . $suffix_style . '.css' );
	}

	add_action( 'customize_register', 'av5_disable_default_customizer', 20 );
}

if ( ! function_exists( 'av5_customize_preview_js' ) ) {

	/**
	 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
	 */
	function av5_customize_preview_js() {
		$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG || ! av5_get_option( 'min-js' ) ? '' : '.min';
		wp_enqueue_script( 'av5_customizer', get_template_directory_uri() . '/assets/js/customizer' . $suffix . '.js', array( 'customize-preview' ), '20130508', true );
	}

	add_action( 'customize_preview_init', 'av5_customize_preview_js' );
}

if ( ! function_exists( 'av5_kirki_set_default' ) ) {

	/**
	 * Set default customize value or return default value
	 *
	 * @param boolean $set Set or return default value.
	 * @return array
	 */
	function av5_kirki_set_default( $set = true ) {
		$fields		 = Kirki::$fields;
		$config_mods = array();
		foreach ( $fields as $field ) {
			if ( array_key_exists( 'type', $field ) && array_key_exists( 'default', $field ) ) {
				if ( 'custom' === $field['type'] || 'kirki-custom' === $field['type'] ) {
					continue;
				}
				$config_mods[ $field['settings'] ] = $field['default'];
			}
		}
		$config_mods = apply_filters( 'av5_customize_default', $config_mods );
		if ( $set ) {
			foreach ( $config_mods as $settings => $default ) {
				set_theme_mod( $settings, $default );
			}
		}
		return $config_mods;
	}
}

if ( ! function_exists( 'av5_kirki_check_value' ) ) {

	/**
	 * Check theme mod, if it is empty then a value is set from the default values.
	 */
	function av5_kirki_check_value() {
		$mods = get_theme_mods();
		if ( empty( $mods ) ) {
			av5_kirki_set_default();
		}
	}

	av5_kirki_check_value();
}

if ( ! function_exists( 'av5_kirki_reset_value' ) ) {

	/**
	 * Reset customize value
	 */
	function av5_kirki_reset_value() {
		remove_theme_mods();
		av5_kirki_check_value();
	}
}

Kirki::add_config( 'av5_theme', array(
	'capability'	 => 'edit_theme_options',
	'option_type'	 => 'theme_mod',
) );

$path = dirname( __FILE__ ) . '/customizer';
foreach ( glob( $path . '/*.php' ) as $file ) {
	require_once $file;
}


if ( ! function_exists( 'av5_kirki_update_default' ) ) {

	/**
	 * Set default customize value or return default value
	 *
	 * @param boolean $set Set or return default value.
	 * @return array
	 */
	function av5_kirki_update_default( $set = false ) {
		$fields		 = Kirki::$fields;
		$config_mods = get_theme_mods();
		foreach ( $fields as $field ) {
			if ( ! array_key_exists( $field['settings'], $config_mods ) && array_key_exists( 'type', $field ) && array_key_exists( 'default', $field ) ) {
				if ( 'custom' === $field['type'] || 'kirki-custom' === $field['type'] ) {
					continue;
				}
				$config_mods[ $field['settings'] ] = $field['default'];
				$set								 = true;
			}
		}
		$config_mods = apply_filters( 'av5_customize_default', $config_mods );
		if ( $set ) {
			foreach ( $config_mods as $settings => $default ) {
				set_theme_mod( $settings, $default );
			}
		}
		return $config_mods;
	}
}

add_action( 'customize_save_after', 'av5_kirki_update_default', 0 );
