<?php
/**
 * 5th-Avenue post single
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/posts/content-single', get_post_format() );
	}
} else {
	get_template_part( 'template-parts/posts/content', 'none' );
}
