<?php
/**
 * 5th-Avenue theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author LifeisDesign
 */

defined( 'ABSPATH' ) || exit;

// Theme variables.
$theme = wp_get_theme( get_template() );

$avenue = (object) array(
	'uri'		 => get_template_directory_uri(),
	'version'	 => $theme->get( 'Version' ),
);

if ( ! defined( 'AV5C_ALLOWED' ) ) {
	define( 'AV5C_ALLOWED', true );
}

// Hooks for demo site.
require_once get_template_directory() . '/inc/functions/demo-hooks.php';

// Helpers.
require get_template_directory() . '/inc/functions/helpers.php';

// Theme setup - supports, menus, sidebars.
require get_template_directory() . '/inc/functions/theme-setup.php';

// Assets enqueues.
require get_template_directory() . '/inc/functions/theme-assets.php';

// TGMPA.
require get_template_directory() . '/inc/integrations/tgmpa/class-tgm-plugin-activation.php';
require get_template_directory() . '/inc/integrations/tgmpa/plugins.php';

// Theme options.
require get_template_directory() . '/inc/options/theme-options.php';

// Meta options.
require get_template_directory() . '/inc/options/meta-options.php';

// Meta category options.
require get_template_directory() . '/inc/functions/theme-category-titlearea.php';
require get_template_directory() . '/inc/options/taxonomy-options.php';

// Customizer options.
// Load Kirki.
define( 'KIRKI_NO_OUTPUT', true );
require get_template_directory() . '/inc/options/customizer-options.php';

// Dynamic CSS.
require_once get_template_directory() . '/inc/functions/styles.php';

// Theme hooks.
require get_template_directory() . '/inc/functions/theme-hooks.php';

// Merlin.
require_once get_template_directory() . '/inc/integrations/merlin/merlin.php';
require_once get_template_directory() . '/inc/functions/merlin-hooks.php';
require_once get_template_directory() . '/inc/functions/merlin-config.php';
