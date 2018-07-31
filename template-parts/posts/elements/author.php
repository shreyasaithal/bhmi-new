<?php
/**
 * 5th-Avenue post author block
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;
if ( ! get_the_author_meta(  'description' ) ) {
	return;
}
?>
<div class="single-post__about-author<?php if ( av5_get_option( 'blog-post-author-centered' ) ) { ?> align-center <?php } ?>">
	<?php echo get_avatar( get_the_author_meta( 'ID' ), 85 ); ?>
	<div class="about-author__name">
		<h3><?php the_author_posts_link(); // Author name.	     ?></h3>
		<div class="about-author__description">
			<?php the_author_meta( 'description' ); // Author bio description.      ?>
			<?php do_action( 'av5_post_author_additional_description' ) ?>
		</div>

	</div>
</div>
