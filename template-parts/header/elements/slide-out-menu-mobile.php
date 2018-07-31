<?php
/**
 * 5th-Avenue mobile header slideout menu
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

if ( ! av5_exist_menu_in_location( 'mobile-slideout-menu' ) && ! is_user_logged_in() ) {
	return;
}
?>
<div class="header-item slide-out-menu--mobile header__item header__item__slide-out-menu--mobile <?php echo esc_attr( av5_get_option( 'header-burger-menu-icon-style' ) ); ?>">
	<div class="hamburger-menu-icon-small">
		<span></span>
		<span></span>
		<span></span>
	</div><!-- end of burger icon -->
	<div id="slide-out-menu-content--mobile" style="display: none;">
		<span class="big_cross_icon slideout_close"></span>
		<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 'Mobile Menu Before' ) ) : ?>
		<?php endif; ?>
		<ul><?php do_action( 'av5_slideout_menu_mobile', 'right' ); ?></ul>
		<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 'Mobile Menu After' ) ) : ?>
		<?php endif; ?>
	</div><!-- end of slideout menu -->
</div> <!-- end of slideout menu wrap -->
