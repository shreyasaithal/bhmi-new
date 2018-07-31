<?php
/**
 * 5th-Avenue title area categories
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

global $wp_rewrite;

$category_id = 0;
if ( $cat_name	 = get_query_var( 'cat' ) ) {
	$category = get_category( $cat_name );
	if ( $category ) {
		$category_id = $category->cat_ID;
	}
}

$categories = get_categories( array( 'child_of' => $category_id ) );

if ( empty( $category_id ) ) {
	foreach ( $categories as $k => $category ) {
		if ( $category->parent ) {
			unset( $categories[ $k ] );
		}
	}
}

$rel = ( is_object( $wp_rewrite ) && $wp_rewrite->using_permalinks() ) ? 'category tag' : 'category';
?>
<ul class="categories-list">
	<?php if ( av5_get_option( 'posts-titlearea-meta-all', false ) ) { ?>
	<li><a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>"><?php esc_html_e( 'All', '5th-avenue' ); ?></a></li>
	<?php } ?>
	<?php foreach ( $categories as $category ) : ?>
	<li><a href="<?php echo esc_url( get_category_link( $category->term_id ) ); // @codingStandardsIgnoreLine WordPress.VIP.RestrictedFunctions.get_term_link ?>" rel="<?php echo esc_attr( $rel ); ?>"><?php echo esc_html( $category->name ); ?></a></li>
	<?php endforeach; ?>
</ul>
