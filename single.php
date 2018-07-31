<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package 5th-Avenue
 */

defined( 'ABSPATH' ) || exit;

set_query_var( 'av5_post_type', 'post' );
set_query_var( 'av5_singular', 'single' );

get_header();

get_template_part( 'template-parts/title/title', av5_get_title_layout( 'post' ) );
?>
<div id="primary" class="content-area">
	<?php get_template_part( 'template-parts/layouts/layout', av5_get_content_layout( 'post' ) ); ?>
</div><!-- #primary -->
<?php
get_footer();
