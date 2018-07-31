<?php
/**
 * 5th-Avenue title area revolution slider
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

if ( ! av5_get_option_titlearea( 'titlearea-show', true ) || ( av5_is_woocommerce_activated() && is_account_page() && ! is_user_logged_in()) ) {
	return;
}
?>
<section class="title-area-wrap title-area-revslider">
	<?php do_action( 'av5_before_title_area_revslider', $post_type ); ?>
	<?php
	if ( class_exists( 'RevSlider' ) ) {
		$slider_alias	 = av5_get_meta( 'titlearea-revslider-sliders-alias' );
		$slider_content	 = '[rev_slider alias="' . esc_attr( $slider_alias ) . '"]';
		echo do_shortcode( $slider_content );
	}
	?>
	<?php do_action( 'av5_before_title_area_revslider', $post_type ); ?>
</section>
