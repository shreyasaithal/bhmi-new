<?php
/**
 * 5th-Avenue admin options notice if not installed Redux.
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="av5-admin-welcome">
    <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/admin-logo.png'); ?>">
    <h1><?php esc_html_e('Welcome to Fifth Avenue', '5th-avenue'); ?></h1>
    <h3><?php esc_html_e('You\'re almost there! Run the setup wizard to install required plugins and complete the initial setup.', '5th-avenue'); ?></h3>
    <a href="<?php echo esc_url( admin_url( 'themes.php?page=av5-theme-setup' ) )?>" class="button av5-install"><?php esc_html_e( 'Run the Setup Wizard', '5th-avenue' ); ?></a>
    <p><a href="http://vavenue.lifeis.design/documentation/" target="_blank"><?php esc_html_e('View Documentation', '5th-avenue'); ?></a></p>
</div>