<?php
/**
 * 5th-Avenue single
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

if ( have_posts() ) : ?>

	<?php /* Start the Loop */ ?>

	<?php while ( have_posts() ) : the_post(); ?>		

		<?php get_template_part( 'template-parts/pages/content', 'single' ); ?>

	<?php endwhile; ?>

<?php else : ?>

	<?php get_template_part( 'template-parts/pages/content', 'none' ); ?>

<?php
endif;
