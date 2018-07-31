<?php
/**
 * 5th-Avenue post layout on archive, style 3 left
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'row' ); ?>>
	<div class="content-style-3 content-position-left row align-center">
		<div class="col-md-7 no-padding-mobile">
			<?php get_template_part( 'template-parts/posts/elements/image' ); ?>
		</div>
		<div class="col-md-5 no-padding-mobile">
			<?php
			get_template_part( 'template-parts/posts/elements/categories' );

			if ( av5_get_option( 'blog-listing-meta-show' ) ) {
				get_template_part( 'template-parts/posts/elements/meta' );
			}
			?>
			<div class="entry-content">
				<h4>
					<?php
					if ( 'excerpt' == av5_get_option( 'blog-listing-description' ) && has_excerpt() ) {
						the_excerpt();
					} elseif ( 'full' == av5_get_option( 'blog-listing-description' ) ) {
						the_content();
					} else {
						if ( has_excerpt() ) {
							the_excerpt();
						} else {
							the_content();
						}
					}
					?>
				</h4>
				<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', '5th-avenue' ),
					'after'	 => '</div>',
					'link_before' => '<span class="page-number">',
					'link_after'  => '</span>',
				) );
				?>
			</div><!-- .entry-content -->
			<?php if ( av5_get_option( 'blog-listing-readmore-text' ) ) : ?>
				<div class="blog-listing__read-more"><a href="<?php the_permalink(); ?>"><?php echo av5_get_option( 'blog-listing-readmore-text' ); // WPCS: xss ok. ?></a></div>
			<?php endif; ?>

		</div>
	</div>

</article><!-- #-<?php the_ID(); ?> -->
