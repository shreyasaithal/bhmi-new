<?php
/**
 * Register the required plugins for this theme.
 *
 * @package           5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

add_action( 'tgmpa_register', 'av5_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function av5_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$updates_domain = 'https://lifeis.design/';

	$plugins = array(
		array(
			'name'			 => '5th-Avenue Plugin Core',
			'slug'			 => '5th-avenue-core',
			'version'		 => '1.0.1',
			'required'			 => true,
			'force_activation'	 => true,
			'source'		 => get_template_directory() . '/inc/integrations/5th-avenue-core/5th-avenue-core.zip',
			'external_url'	 => '',
		),
		array(
			'name'				 => 'Redux Framework',
			'slug'				 => 'redux-framework',
			'required'			 => true,
			'force_activation'	 => true,
		),
		array(
			'name'				 => 'Meta Box',
			'slug'				 => 'meta-box',
			'required'			 => true,
			'force_activation'	 => true,
		),
		array(
			'name'				 => 'Kirki Toolkit',
			'slug'				 => 'kirki',
			'version'			 => '3.0.0',
			'required'			 => true,
			'force_activation'	 => true,
		),
		array(
			'name'			 => 'WPBakery Page Builder for WordPress (formerly Visual Composer)',
			'slug'			 => 'js_composer',
			'version'		 => '5.4.7',
			'required'		 => false,
			'source'		 => get_template_directory() . '/inc/integrations/js-composer/js_composer.zip',
			'external_url'	 => '',
		),
		array(
			'name'		 => 'Woocommerce',
			'slug'		 => 'woocommerce',
			'required'	 => false,
		),
		array(
			'name'		 => 'MailChimp for WordPress',
			'slug'		 => 'mailchimp-for-wp',
			'required'	 => false,
		),
		array(
			'name'		 => 'Contact Form 7',
			'slug'		 => 'contact-form-7',
			'required'	 => false,
		),
		/**
		* Not active plugins
		array(
			'name'			 => 'Yoast SEO',
			'slug'			 => 'wordpress-seo',
			'required'		 => false,
			'is_callable'	 => 'wpseo_init',
		),
		array(
			'name'		 => 'WooCommerce Wishlist',
			'slug'		 => 'ti-woocommerce-wishlist',
			'required'	 => false,
		),
		array(
			'name'		 => 'WooCommerce Variation Swatches',
			'slug'		 => 'woo-variation-swatches',
			'required'	 => false,
		),
		array(
			'name'				 => 'Slider Revolution',
			'slug'				 => 'revslider',
			'source'			 => $updates_domain . 'extras/plugins/revslider.zip',
			'required'			 => false,
			'version'			 => '5.4.1',
			'force_activation'	 => false,
			'force_deactivation' => true,
			'external_url'		 => 'http://codecanyon.net/item/slider-revolution-responsive-wordpress-plugin/2751380',
		),
		 */
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'			 => '5th-avenue',
		// Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path'	 => '',
		// Default absolute path to bundled plugins.
		'menu'			 => 'install-required-plugins',
		// Menu slug.
		'has_notices'	 => true,
		// Show admin notices or not.
		'dismissable'	 => true,
		// If false, a user cannot dismiss the nag message.
		'dismiss_msg'	 => '',
		// If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic'	 => false,
		// Automatically activate plugins after installation or not.
		'message'		 => '',
	// Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
