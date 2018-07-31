<?php
/**
 * 5th-Avenue archive post image
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

?>
<?php if ( has_post_thumbnail() ) : ?>
	<div class="blog-listing__image-wrap">	
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( array( absint( av5_get_option_attr( 'blog-listing-image-size', 'width', array( 'width' => '1110px', 'height' => '706px' ) ) ), absint( av5_get_option_attr( 'blog-listing-image-size', 'height', array( 'width' => '1110px', 'height' => '706px' ) ) ) ) ); ?>
		</a>
	</div>
<?php
endif;
