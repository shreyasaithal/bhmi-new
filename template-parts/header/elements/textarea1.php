<?php
/**
 * 5th-Avenue header textarea output
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<div class="header-item additional-text"><?php echo do_shortcode( av5_get_option( 'header-layout-textarea1' ) ); ?></div>
