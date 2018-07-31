<?php
/**
 * 5th-Avenue title area standard
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

if ( ! av5_get_option_titlearea( 'titlearea-show', true ) || ( is_home() && is_front_page() ) || ( av5_is_woocommerce_activated() && is_account_page() && ! is_user_logged_in()) ) {

	return;
}

$av5_post_type		 = get_query_var( 'av5_post_type', 'posts' );
$text_alignment		 = 'center'; /* av5_get_option_titlearea( 'titlearea-text-alignment', 'left' ); */
$text_color_style	 = av5_get_option_titlearea( 'titlearea-text-color-style', 'default' );
$title				 = av5_get_option_titlearea( 'titlearea-title' );
$additional_content	 = av5_get_option_titlearea( 'titlearea-hero-additional-content' );
$sub_title			 = av5_get_meta( 'titlearea-text-above' );

$classes = apply_filters( 'av5_title_area_class_wrap', array(
	'title-area-wrap',
	'title-area-standart',
	sprintf( '%s-title', $av5_post_type ),
	sprintf( 'align-%s', $text_alignment ),
	sprintf( '%s-style', $text_color_style ),
) );
$classes = implode( ' ', $classes );
?>

<section class="<?php echo esc_attr( $classes ); ?>">
	<div class="container">
		<?php do_action( 'av5_title_area_before', $av5_post_type ); ?>

		<div class="page-heading-text">

			<?php if ( $sub_title ) { ?>
				<div class="page-heading--subtitle"><?php echo do_shortcode( $sub_title ); // WPCS: xss ok.    ?></div> 
			<?php } ?>
			<?php do_action( 'av5_title_area_before_title', $av5_post_type ); ?>
			<?php if ( $title ) { ?>
				<h1 class="entry-title"><?php av5_the_title(); ?></h1>
			<?php } ?>
			<?php if ( $additional_content ) : ?>
				<div class="additional-content"><?php echo do_shortcode( $additional_content ); ?></div>
			<?php endif; ?>
			<?php do_action( 'av5_title_area_after_title', $av5_post_type ); ?>
		</div>

		<?php do_action( 'av5_title_area_after', $av5_post_type ); ?>
	</div>
</section>
