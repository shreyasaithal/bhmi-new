<?php
/**
 * 5th-Avenue fullwdith layout no sidebars
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
?>
<section class="container-fluid page-layout page-layout--full-width page-layout--no-sidebar">
	<div class="row">		
		<?php get_template_part( 'template-parts/' . $av5_post_type_path . '/' . $av5_singular, $post_format ); ?>		
	</div>
</section>
