<?php
/**
 * 5th-Avenue mobile header menu left layout
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

/**
 * Adds items to the right mobile menu
 */
function av5_mobile_elements_right() {
	if ( av5_get_option( 'header-mobile-account-show', false ) ) {
		av5_template_headerelements( 'myaccount' );
	}
	if ( av5_get_option( 'header-mobile-wishlist-show', false ) ) {
		av5_template_headerelements( 'wishlist' );
	}
	if ( av5_get_option( 'header-mobile-cart-show', false ) ) {
		av5_template_headerelements( 'cart-mobile' );
	}
}

/**
 * Adds items to the left mobile menu
 */
function av5_mobile_elements_left() {

	av5_template_headerelements( 'slide-out-menu-mobile' );
	if ( av5_get_option( 'header-mobile-search-show', false ) ) {
		av5_template_headerelements( 'search-mobile' );
	}
	if ( av5_get_option( 'header-mobile-language-show', false ) ) {
		av5_template_headerelements( 'language' );
	}
}
?>

<?php av5_content_mobile_topbar( '<div class="mobile-header--top-bar">', '</div>' ); ?>
<div id="masthead-mobile" class="header-mobile header-mobile--centered">
	<div class="flex-row container">
		<div class="header-left flex-column">
			<div class="nav nav-left">
				<?php av5_mobile_elements_left(); ?>
			</div>
		</div>
		<?php do_action( 'av5_header_logo_mobile' ); ?>
		<div class="header-right flex-column">
			<div class="nav nav-right">
				<?php av5_mobile_elements_right(); ?>
			</div>
		</div>
	</div>
</div>
