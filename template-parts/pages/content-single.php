<?php
/**
 * 5th-Avenue single content
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="entry-content single-page">

<?php the_content(); ?>

	<?php
	wp_link_pages( array(
		'before' => '<div class="page-links">' . esc_html__( 'Pages:', '5th-avenue' ),
		'after'	 => '</div>',
		'link_before' => '<span class="page-number">',
		'link_after'  => '</span>',
	) );
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
	?>


</div><!-- .entry-content -->
