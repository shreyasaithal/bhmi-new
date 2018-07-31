<?php
/**
 * 5th-Avenue mobile header cart
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

$promo_text	 = av5_get_option( 'header-cart-promo-text' );
$cart_icon	 = av5_get_option( 'shopping-cart-icon-select' );
if ( '2' === $cart_icon ) {
	$cart_icon = 'icon-5ave-cart-empty';
} elseif ( '3' === $cart_icon ) {
	$cart_icon = 'icon-5ave-suitcase';
} else {
	$cart_icon = 'icon-5ave-bag-1';
}
?>

<div class="header-item cart header__item header__item__cart--<?php echo esc_attr( av5_get_option( 'header-cart-type' ) ); ?>">
	<span class="cart sf-with-ul">
		<i class="<?php echo esc_attr( $cart_icon ) ?> header-icon"></i>
		<?php if ( av5_get_option( 'header-cart-text' ) ) { ?><span class="cart-text text"><?php echo av5_get_option( 'header-cart-text' ); // WPCS: xss ok. ?></span> <?php } ?>
		<?php if ( av5_get_option( 'header-cart-counter-show' ) ) { ?><span class="widget_shopping_cart_counter cart-num text">0</span><?php } ?>
	</span>
	<div id="av5_woocommerce_mini_cart_mobile" class="av5_woocommerce_mini_cart_drop <?php
	if ( $promo_text ) {
		echo'promo-text--show';
	}
	?>" style="display: none;">
			<?php
			if ( $promo_text ) {
				echo '<div class="mini-cart-promo-text">' . $promo_text . '</div>'; // WPCS: xss ok.
			}
			?>
		<a class="slideout_close"><span class="line"></span><?php esc_html_e( 'Continue shopping', '5th-avenue' ); ?></a>
		<div class="widget_shopping_cart_content">
			<?php
			if ( av5_woocommerce_activated() ) {
				echo woocommerce_mini_cart(); // WPCS: xss ok.
			}
			?>
		</div>
	</div>
</div>
