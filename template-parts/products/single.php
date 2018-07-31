<?php
/**
 * 5th-Avenue WooCommerce product single
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

while ( have_posts() ) : the_post();
	?>

	<?php wc_get_template_part( 'content-single-product-style', av5_get_option( 'product-pages-layout' ) ); ?>

<?php
endwhile; // end of the loop.
