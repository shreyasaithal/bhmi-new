<?php
/**
 * 5th-Avenue post single
 *
 * @package 5th-Avenue
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

?>
<?php do_action( 'av5_before_post_content' ); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content single-post">

		<?php the_content(); ?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', '5th-avenue' ),
			'after'	 => '</div>',
			'link_before' => '<span class="page-number">',
			'link_after'  => '</span>',
		) );
		?>

		<?php the_comment(); ?>


	</div><!-- .entry-content -->
</article>
<?php if( 'after-content' === av5_get_option( 'blog-post-meta' ) ) { ?>
<div class="post__meta--after">
	<?php do_action( 'av5_after_post_meta' ); ?>
</div>
<?php } ?>
<?php do_action( 'av5_after_post_content' ); ?>
