<?php
/**
 * 5th-Avenue header fullscreen menu element
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

$menu_text = av5_get_option( 'header-burger-menu-text' );
?>
<div class="header-item full-screen-menu header__item header__item__full-screen-menu <?php echo esc_attr( av5_get_option( 'header-burger-menu-hover' ) ); ?> <?php echo esc_attr( av5_get_option( 'header-burger-menu-icon-style' ) ); ?>">
	<div id="hamburger-menu-icon-small">
		<span></span>
		<span></span>
		<span></span>
	</div><!-- end of fullscreen icon -->
	<?php
	if ( $menu_text ) {
		echo '<span class="text">' . $menu_text . '</span>'; // WPCS: xss ok.
	}
	?>
</div> <!-- end of fullscreen menu wrap -->
