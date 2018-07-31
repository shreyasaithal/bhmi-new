<?php
/**
 * 5th-Avenue archive
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

if ( have_posts() ) :
	$blog_classes = 'blog-listing-wrap blog-listing--classic';
	if ( av5_get_option( 'blog-loadin-animation' ) !== 'none' ) {
		$blog_classes .= ' reveal--on reveal-animation--' . av5_get_option( 'blog-loadin-animation' );
	}
	if ( av5_get_option( 'blog-listing-readmore-style' ) ) {
		$blog_classes .= ' read_more-style--' . av5_get_option( 'blog-listing-readmore-style' );
	}
	if ( av5_get_option( 'blog-listing-hover-style' ) ) {
		$blog_classes .= ' hover-style--' . av5_get_option( 'blog-listing-hover-style' );
	}
	?>
	<div id="post-list" class="<?php echo esc_attr( $blog_classes ); ?>">

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/posts/listing/content', av5_get_meta( 'layout_for_listing' ) ); ?>

		<?php endwhile; ?>


	</div>
	<?php get_template_part( 'template-parts/posts/elements/navigation', 'archive' ); ?>
<?php else : ?>

	<?php get_template_part( 'template-parts/posts/content', 'none' ); ?>

<?php endif; ?>
