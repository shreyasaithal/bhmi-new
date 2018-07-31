<?php
/**
 * 5th-Avenue post layout on archive, default style
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */
defined( 'ABSPATH' ) || exit;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-md-12 no-padding' ); ?>>
	<div class="content-style-1 <?php if ( 'masonry' !== av5_get_option( 'blog-listing-style' ) ) { ?>align-center<?php } ?>">
		<?php get_template_part( 'template-parts/posts/elements/image' ); ?>
		<?php get_template_part( 'template-parts/posts/elements/categories' ); ?>
		<?php get_template_part( 'template-parts/posts/elements/title' ); ?>
		<?php
		if ( av5_get_option( 'blog-listing-meta-show' ) ) {
			get_template_part( 'template-parts/posts/elements/meta' );
		}
		if ( 'none' != av5_get_option( 'blog-listing-description' ) ) {
			$post_desc_content = '';
			if ( 'excerpt' == av5_get_option( 'blog-listing-description' ) ) {
				$post_desc_content = apply_filters( 'the_excerpt', get_the_excerpt() );
			} else {
				$post_desc_content = apply_filters( 'the_content', get_the_content() );
			}
			if ( $post_desc_content ) {
				$post_desc_content .= wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', '5th-avenue' ),
					'after'	 => '</div>',
					'link_before' => '<span class="page-number">',
					'link_after'  => '</span>',
					'echo'	 => false,
				) );
				echo '<div class="entry-content">' . $post_desc_content . '</div><!-- .entry-content -->';
			}
		}
		if ( av5_get_option( 'blog-listing-readmore-text' ) ) :
			?>
			<div class="blog-listing__read-more"><a href="<?php the_permalink(); ?>"><?php echo av5_get_option( 'blog-listing-readmore-text' ); // WPCS: xss ok.   ?></a></div>
			<?php endif; ?>
	</div>

</article><!-- #-<?php the_ID(); ?> -->
