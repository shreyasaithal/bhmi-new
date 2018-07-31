<?php
/**
 * 5th-Avenue post single audio
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @todo add audio
 */

defined( 'ABSPATH' ) || exit;

?>
<?php do_action( 'av5_before_post_content' ); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content single-page">

		<?php the_content(); ?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', '5th-avenue' ),
			'after'	 => '</div>',
		) );
		?>

		<?php the_comment(); ?>


	</div><!-- .entry-content -->
</article>
<div class="post__meta--after">
	<?php do_action( 'av5_after_post_meta' ); ?>
</div>
<?php do_action( 'av5_after_post_content' ); ?>
