<?php
/**
 * 5th-Avenue header slideout menu
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

if ( ! av5_exist_menu_in_location( 'slideout-menu' ) && ! is_user_logged_in() ) {
	return;
}

$menu_text			 = av5_get_option( 'header-burger-menu-text' );
$additional_content	 = av5_get_option( 'header-burger-menu-textarea' );
$class				 = array(
	av5_get_option( 'header-burger-menu-hover' ),
	av5_get_option( 'header-burger-menu-icon-style' ),
	av5_get_option( 'header-burger-menu-type' ),
);
?>
<div class="header-item slide-out-menu header__item header__item__slide-out-menu <?php echo esc_attr( implode( ' ', $class ) ); ?>">
	<div class="hamburger-menu-icon-small">
		<span></span>
		<span></span>
		<span></span>
	</div><!-- end of burger icon -->
	<?php
	if ( $menu_text ) {
		echo '<span class="text">' . $menu_text . '</span>'; // WPCS: xss ok.
	}
	?>
	<div id="slide-out-menu-content" class="slide-out-menu-additional <?php
	if ( $additional_content ) {
		echo ' additional-content--on';
	}
	?>" style="display: none;">
		<span class="big_cross_icon slideout_close"></span>
		<ul><?php
		if ( 'header-burger-menu-fullscreen' == av5_get_option( 'header-burger-menu-type' ) ) {
			do_action( 'av5_fullscreen_menu' );
		} else {
			do_action( 'av5_slideout_menu', 'right' );
		}
			?></ul>
		<?php
		if ( $additional_content ) {
			echo do_shortcode( '<div class="slideout-menu__additional-content">' . $additional_content . '</div>' );
		}
		?></div><!-- end of slideout menu -->
</div> <!-- end of slideout menu wrap -->
