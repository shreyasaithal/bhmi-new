<?php
/**
 * 5th-Avenue post audio content
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @todo add audio
 */

defined( 'ABSPATH' ) || exit;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php get_template_part( 'template-parts/posts/elements/image' ); ?>
	<?php get_template_part( 'template-parts/posts/elements/categories' ); ?>
	<?php get_template_part( 'template-parts/posts/elements/title' ); ?>
	<div class="blog-listing-meta"><?php get_template_part( 'template-parts/posts/elements/meta' ); ?></div>

	<div class="entry-content">

		<?php the_excerpt(); ?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', '5th-avenue' ),
			'after'	 => '</div>',
		) );
		?>

	</div><!-- .entry-content -->

	<div class="blog-listing__read-more"><a href="<?php get_permalink( $post->ID ) ?>"><span></span>Read more</a></div>
</article><!-- #-<?php the_ID(); ?> -->
