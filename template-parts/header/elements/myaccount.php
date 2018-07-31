<?php
/**
 * 5th-Avenue header WooCommerce my account page link
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="header-item myaccount" data-av5-overlay="#av5_fullscreen_login">
	<!-- all of this should be selected by options: icon style, cart text (show/hide), show/hide cart num etc. -->
	<?php if ( is_user_logged_in() ) { ?>
	<a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>" title="<?php esc_attr_e( 'My Account', '5th-avenue' ); ?>"><i  class="icon-5ave-myaccount header-icon"></i></a>
	<?php } else { ?>
		<i  class="icon-5ave-myaccount header-icon"></i>
		<div class="av5-overlay-close"></div>
	<?php } ?>
</div>
