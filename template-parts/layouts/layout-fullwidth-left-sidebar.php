<?php
/**
 * 5th-Avenue fullwidth left sidebar layout
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

$av5_post_type		 = 'post';
$av5_singular		 = 'archive';
extract( $wp_query->query_vars ); // @codingStandardsIgnoreLine WordPress.Functions.DontExtract.extract
$av5_post_type_path	 = ( 'archive' !== $av5_singular ) ? $av5_post_type . 's' : $av5_post_type;
$post_format		 = ( 'post' === $av5_post_type ) ? get_post_format() : '';

if ( 'archive' === $av5_singular && 'posts' === $av5_post_type ) {
	$post_format = ( ( av5_get_option( 'blog-listing-style' ) ? av5_get_option( 'blog-listing-style' ) : '' ) );
}
$sidebar_size = (int) av5_get_option( $av5_post_type . '-sidebar-size', '4' );
?>
<section class="container-fluid page-layout page-layout--full-width page-layout--left-sidebar">
	<div class="row">
		<div class="col-md-<?php echo esc_attr( 12 - $sidebar_size ); ?>  col-md-push-<?php echo esc_attr( $sidebar_size ); ?>">
			<?php get_template_part( 'template-parts/' . $av5_post_type_path . '/' . $av5_singular, $post_format ); ?>
		</div>
		<div class="col-md-<?php echo esc_attr( $sidebar_size ); ?> col-md-pull-<?php echo esc_attr( 12 - $sidebar_size ); ?>">
			<?php av5_get_sidebar( $av5_post_type ); ?>
		</div>
	</div>
</section>
