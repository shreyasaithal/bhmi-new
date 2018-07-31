<?php
/**
 * 5th-Avenue arhive masonry style
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

if ( have_posts() ) :
	$blog_classes = 'blog-listing-wrap blog-listing--masonry';

	if ( av5_get_option( 'blog-listing-hover-style' ) ) {
		$blog_classes .= ' hover-style--' . av5_get_option( 'blog-listing-hover-style' );
	}
	if ( av5_get_option( 'blog-listing-align' ) ) {
		$blog_classes .= ' align-' . av5_get_option( 'blog-listing-align' );
	} else {
		$blog_classes .= ' align-center';
	}
	if ( av5_get_option( 'blog-listing-masonry-columns' ) ) {
		$blog_classes .= ' masonry-columns--' . av5_get_option( 'blog-listing-masonry-columns' );
	}
	if ( av5_get_option( 'blog-listing-readmore-style' ) ) {
		$blog_classes .= ' read_more-style--' . av5_get_option( 'blog-listing-readmore-style' );
	}
	?>
	<div id="post-list" class="<?php echo esc_attr( $blog_classes ) ?>">

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/posts/listing/content', av5_get_content_layout( 'posts' ) ); ?>

		<?php endwhile; ?>

	</div>
	<?php get_template_part( 'template-parts/posts/elements/navigation', 'archive' ); ?>
<?php else : ?>

	<?php get_template_part( 'template-parts/posts/content', 'none' ); ?>

<?php endif; ?>
