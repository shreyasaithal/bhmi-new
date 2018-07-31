<?php
/**
 * 5th-Avenue title area hero style
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

if ( ! av5_get_option_titlearea( 'titlearea-show', true ) || ( is_home() && is_front_page() ) || ( av5_is_woocommerce_activated() && is_account_page() && ! is_user_logged_in()) ) {
	return;
}

$av5_post_type		 = get_query_var( 'av5_post_type', 'post' );
$text_alignment		 = 'center'; /* av5_get_option_titlearea( 'titlearea-text-alignment', 'left' ); */
$text_color_style	 = av5_get_option_titlearea( 'titlearea-text-color-style', 'default' );
$title				 = av5_get_option_titlearea( 'titlearea-title' );
$additional_content	 = av5_get_option_titlearea( 'titlearea-hero-additional-content' );
$effect				 = av5_get_option_titlearea( 'titlearea-hero-effect', 'none' );
$title_color		 = av5_get_titlearea_title_color();
$background			 = av5_get_titlearea_background();
/* $_overlay_background    = av5_get_option_titlearea( 'titlearea-hero-overlay-colorgrad', 'none' ); */
$overlay_background	 = 'background:' . av5_get_option_titlearea( 'titlearea-hero-overlay-color' ); /* av5_get_titlearea_hero_overlay_background(); */
$overlay_opacity	 = av5_get_option_titlearea( 'titlearea-hero-overlay-opacity', 100 ) / 100;
$hero_height		 = av5_get_option_titlearea( 'titlearea-hero-height', 400 );
$sub_title			 = av5_get_option_titlearea( 'titlearea-text-above' );
if ( is_array( $hero_height ) ) {
	$hero_height = str_replace( $hero_height['units'], '', $hero_height['height'] );
}

$classes = apply_filters( 'av5_title_area_class_wrap', array(
	'title-area-wrap',
	'title-area-hero',
	sprintf( '%s-title', $av5_post_type ),
	sprintf( 'align-%s', $text_alignment ),
	sprintf( '%s-style', $text_color_style ),
) );
$classes = implode( ' ', $classes );
?>

<section class="<?php echo esc_attr( $classes ); ?>" data-height="<?php echo esc_attr( $hero_height ); ?>">

	<?php do_action( 'av5_title_area_hero_before_hero', $av5_post_type ); ?>
	<div class="page-heading heading-effect-<?php echo esc_attr( $effect ); ?>" style="<?php echo esc_attr( ( in_array( $effect, array( 'fixed', 'parallax2' ) ) ) ? '' : $background ); ?>"  data-height="<?php echo esc_attr( $hero_height ); ?>">

		<?php if ( in_array( $effect, array( 'fixed', 'parallax2' ) ) ) : ?> 
			<div class="bg-layer" style="<?php echo esc_attr( $background ); ?>"></div>
		<?php endif; ?>

			<div class="page-heading-overlay" style="<?php echo esc_attr( $overlay_background ); ?>; opacity:<?php echo esc_attr( $overlay_opacity ); ?>;"></div>


		<div class="page-heading-text">
			<div class="title-area-filler"></div>
			<?php if ( $sub_title ) { ?>
				<div class="page-heading--subtitle" style="<?php echo esc_attr( av5_get_titlearea_subtitle_color() ); ?>"><?php echo do_shortcode( $sub_title ); // WPCS: xss ok.    ?></div>
			<?php } ?>
			<?php do_action( 'av5_title_area_hero_before_title', $av5_post_type ); ?>
			<?php if ( $title ) : ?>
				<h1 class="entry-title" style="<?php echo esc_attr( av5_get_titlearea_title_color() ); ?>"><?php av5_the_title(); ?></h1>
			<?php endif; ?>                                
			<?php if ( $additional_content ) : ?>
				<div class="additional-content"><?php echo do_shortcode( $additional_content ); ?></div>
			<?php endif; ?>
			<?php do_action( 'av5_title_area_hero_after_title', $av5_post_type ); ?>
		</div>


	</div>
	<?php do_action( 'av5_title_area_hero_after', $av5_post_type ); ?>
</section>
