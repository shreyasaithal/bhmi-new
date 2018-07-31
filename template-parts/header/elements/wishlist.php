<?php
/**
 * 5th-Avenue header wishlist output
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="header-item wishlist">
	<?php
	// Check if WooCommerce Wishlist Plugin activated.
	if ( defined( 'TINVWL_LOAD_FREE' ) || defined( 'TINVWL_LOAD_PREMIUM' ) ) {
		echo do_shortcode( '[ti_wishlist_products_counter]' );
	}
	?>
</div>
