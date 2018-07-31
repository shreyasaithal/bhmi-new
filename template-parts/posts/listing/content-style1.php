<?php
/**
 * 5th-Avenue post layout on archive, style 1
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-md-12 no-padding' ); ?>>
	<div class="content-style-1 align-center">
		<?php get_template_part( 'template-parts/posts/elements/image' ); ?>
		<?php get_template_part( 'template-parts/posts/elements/categories' ); ?>			
		<?php get_template_part( 'template-parts/posts/elements/title' ); ?>			
		<?php
		if ( av5_get_option( 'blog-listing-meta-show' ) ) {
			get_template_part( 'template-parts/posts/elements/meta' );
		}
		if ( 'excerpt' == av5_get_option( 'blog-listing-description' ) && has_excerpt() || 'full' == av5_get_option( 'blog-listing-description' ) ) : ?>
			<div class="entry-content">
				<?php
				if ( 'excerpt' == av5_get_option( 'blog-listing-description' ) && has_excerpt() ) {
					the_excerpt();
				} elseif ( 'full' == av5_get_option( 'blog-listing-description' ) ) {
					the_content();
				}
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', '5th-avenue' ),
					'after'	 => '</div>',
					'link_before' => '<span class="page-number">',
					'link_after'  => '</span>',
				) );
				?>
			</div><!-- .entry-content -->
		<?php
		endif;
		if ( av5_get_option( 'blog-listing-readmore-text' ) ) : ?>
			<div class="blog-listing__read-more"><a href="<?php the_permalink(); ?>"><?php echo av5_get_option( 'blog-listing-readmore-text' ); // WPCS: xss ok. ?></a></div>
		<?php endif; ?>
	</div>

</article><!-- #-<?php the_ID(); ?> -->
