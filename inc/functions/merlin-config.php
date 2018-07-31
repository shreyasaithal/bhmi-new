<?php
/**
 * Merlin WP configuration file.
 *
 * @package   Merlin WP
 * @version   @@pkg.version
 * @link      https://merlinwp.com/
 * @author    Rich Tabor, from ThemeBeans.com & the team at ProteusThemes.com
 * @copyright Copyright (c) 2018, Merlin WP of Inventionn LLC
 * @license   Licensed GPLv3 for Open Source Use
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Merlin' ) ) {
	return;
}

/**
 * Set directory locations, text strings, and settings.
 */
$wizard	 = new Merlin(
	array(
		'directory'				 => 'inc/integrations', // Location / directory where Merlin WP is placed in your theme.
		'merlin_url'			 => 'av5-theme-setup', // The wp-admin page slug where Merlin WP loads.
		'child_action_btn_url'	 => 'https://codex.wordpress.org/child_themes', // URL for the 'child-action-link'.
		'dev_mode'				 => false, // Enable development mode for testing.
		'license_step'			 => false, // EDD license activation step.
		'license_required'		 => false, // Require the license activation step.
		'license_help_url'		 => '', // URL for the 'license-tooltip'.
		'edd_remote_api_url'	 => '', // EDD_Theme_Updater_Admin remote_api_url.
		'edd_item_name'			 => '', // EDD_Theme_Updater_Admin item_name.
		'edd_theme_slug'		 => '', // EDD_Theme_Updater_Admin item_slug.
	), array(
		'admin-menu'				 => esc_html__( 'Theme Setup', '5th-avenue' ),
		'title%s%s%s%s'				 => esc_html__( '%1$s%2$s Themes &lsaquo; Theme Setup: %3$s%4$s', '5th-avenue' ),
		'return-to-dashboard'		 => esc_html__( 'Return to the dashboard', '5th-avenue' ),
		'ignore'					 => esc_html__( 'Disable this wizard', '5th-avenue' ),
		'btn-skip'					 => esc_html__( 'Skip', '5th-avenue' ),
		'btn-next'					 => esc_html__( 'Next', '5th-avenue' ),
		'btn-start'					 => esc_html__( 'Start', '5th-avenue' ),
		'btn-no'					 => esc_html__( 'Cancel', '5th-avenue' ),
		'btn-plugins-install'		 => esc_html__( 'Install', '5th-avenue' ),
		'btn-child-install'			 => esc_html__( 'Install', '5th-avenue' ),
		'btn-content-install'		 => esc_html__( 'Install', '5th-avenue' ),
		'btn-import'				 => esc_html__( 'Import', '5th-avenue' ),
		'btn-license-activate'		 => esc_html__( 'Activate', '5th-avenue' ),
		'btn-license-skip'			 => esc_html__( 'Later', '5th-avenue' ),
		'license-header%s'			 => esc_html__( 'Activate %s', '5th-avenue' ),
		'license-header-success%s'	 => esc_html__( '%s is Activated', '5th-avenue' ),
		'license%s'					 => esc_html__( 'Enter your license key to enable remote updates and theme support.', '5th-avenue' ),
		'license-label'				 => esc_html__( 'License key', '5th-avenue' ),
		'license-success%s'			 => esc_html__( 'The theme is already registered, so you can go to the next step!', '5th-avenue' ),
		'license-json-success%s'	 => esc_html__( 'Your theme is activated! Remote updates and theme support are enabled.', '5th-avenue' ),
		'license-tooltip'			 => esc_html__( 'Need help?', '5th-avenue' ),
		'welcome-header%s'			 => esc_html__( 'Welcome to %s', '5th-avenue' ),
		'welcome-header-success%s'	 => esc_html__( 'Hi. Welcome back', '5th-avenue' ),
		'welcome%s'					 => esc_html__( 'This wizard will set up your theme, install plugins, and import content. It is optional & should take only a few minutes.', '5th-avenue' ),
		'welcome-success%s'			 => esc_html__( 'You may have already run this theme setup wizard. If you would like to proceed anyway, click on the "Start" button below.', '5th-avenue' ),
		'child-header'				 => esc_html__( 'Install Child Theme', '5th-avenue' ),
		'child-header-success'		 => esc_html__( 'You\'re good to go!', '5th-avenue' ),
		'child'						 => esc_html__( 'Let\'s build & activate a child theme so you may easily make theme changes.', '5th-avenue' ),
		'child-success%s'			 => esc_html__( 'Your child theme has already been installed and is now activated, if it wasn\'t already.', '5th-avenue' ),
		'child-action-link'			 => esc_html__( 'Learn about child themes', '5th-avenue' ),
		'child-json-success%s'		 => esc_html__( 'Awesome. Your child theme has already been installed and is now activated.', '5th-avenue' ),
		'child-json-already%s'		 => esc_html__( 'Awesome. Your child theme has been created and is now activated.', '5th-avenue' ),
		'plugins-header'			 => esc_html__( 'Install Plugins', '5th-avenue' ),
		'plugins-header-success'	 => esc_html__( 'You\'re up to speed!', '5th-avenue' ),
		'plugins'					 => esc_html__( 'Let\'s install some essential WordPress plugins to get your site up to speed.', '5th-avenue' ),
		'plugins-success%s'			 => esc_html__( 'The required WordPress plugins are all installed and up to date. Press "Next" to continue the setup wizard.', '5th-avenue' ),
		'plugins-action-link'		 => esc_html__( 'Advanced', '5th-avenue' ),
		'import-header'				 => esc_html__( 'Import Options', '5th-avenue' ),
		'import'					 => esc_html__( 'Import default theme settings and colors.', '5th-avenue' ),
		'import-action-link'		 => esc_html__( 'Advanced', '5th-avenue' ),
		'ready-header'				 => esc_html__( 'All done. Have fun!', '5th-avenue' ),
		'ready%s'					 => esc_html__( 'Your theme has been all set up. Enjoy your new theme by %s.', '5th-avenue' ),
		'ready-action-link'			 => esc_html__( 'Extras', '5th-avenue' ),
		'ready-big-button'			 => esc_html__( 'View your website', '5th-avenue' ),
		'ready-link-1'				 => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( 'http://lifeis.design/help' ), esc_html__( 'Get Theme Support', '5th-avenue' ) ),
		'ready-link-2'				 => sprintf( '<a href="%1$s">%2$s</a>', esc_url( admin_url( 'customize.php' ) ), esc_html__( 'Start Customizing', '5th-avenue' ) ),
		'ready-link-3'				 => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( 'http://vavenue.lifeis.design/documentation' ), esc_html__( 'Theme Documentation', '5th-avenue' ) ),
	)
);

if ( ! function_exists( 'av5_wizard_run_admin_notice' ) ) {

	/**
	 * Adds the note that you need to run the wizard
	 */
	function av5_wizard_run_admin_notice() {
		$theme			 = wp_get_theme();
		$slug			 = strtolower( preg_replace( '#[^a-zA-Z]#', '', $theme->get( 'Name' ) ) );
		// Has this theme been setup yet?
		$already_setup	 = get_option( 'merlin_' . $slug . '_completed' );
		$already_hidded	 = get_option( 'merlin_' . $slug . '_hide_notice' );

		// Return if Merlin has already completed it's setup.
		if ( $already_setup || $already_hidded ) {
			return;
		}
		printf( '<div class="notice notice-error"><p>%1$s</p><p><a href="%2$s" class="button-primary">%3$s</a> <a href="%4$s" class="button-secondary">%5$s</a></p></div>', sprintf( '<strong>%1$s</strong> - %2$s', esc_html__( 'Important', '5th-avenue' ), esc_html__( 'It appears that your setup of 5th Avenue Theme was not complete. Please run the setup wizard, it will take you through the initial configuration.', '5th-avenue' )  ), // @codingStandardsIgnoreLine WordPress.XSS.EscapeOutput.OutputNotEscaped
			esc_url( admin_url( 'themes.php?page=av5-theme-setup' ) ), esc_html__( 'Run the Setup Wizard', '5th-avenue' ),
			esc_url( wp_nonce_url( add_query_arg( 'av5-hide-notice', 'setup' ), 'av5_hide_notices_nonce', '_av5_notice_nonce' ) ), esc_html__( 'Skip setup', '5th-avenue' )
		);
	}
}

add_action( 'admin_notices', 'av5_wizard_run_admin_notice' );


if ( ! function_exists( 'av5_wizard_hide_admin_notice' ) ) {

	/**
	 * Check for hide admin notice
	 */
	function av5_wizard_hide_admin_notice() {
		if ( isset( $_GET['av5-hide-notice'] ) && isset( $_GET['_av5_notice_nonce'] ) ) { // WPCS: input var ok, CSRF ok.
			if ( ! wp_verify_nonce( sanitize_key( wp_unslash( $_GET['_av5_notice_nonce'] ) ), 'av5_hide_notices_nonce' ) ) { // WPCS: input var ok, CSRF ok.
				wp_die( esc_html__( 'Action failed. Please refresh the page and retry.', '5th-avenue' ) );
			}

			$hide_notice = sanitize_text_field( wp_unslash( $_GET['av5-hide-notice'] ) ); // WPCS: input var ok, CSRF ok.

			switch ( $hide_notice ) {
				case 'setup':
					$theme			 = wp_get_theme();
					$slug			 = strtolower( preg_replace( '#[^a-zA-Z]#', '', $theme->get( 'Name' ) ) );
					update_option( 'merlin_' . $slug . '_hide_notice', time() );
					break;
			}

			do_action( 'av5_hide_' . $hide_notice . '_notice' );
		}
	}
}
add_action( 'wp_loaded', 'av5_wizard_hide_admin_notice' );
