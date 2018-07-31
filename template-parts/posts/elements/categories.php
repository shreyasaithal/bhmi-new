<?php
/**
 * 5th-Avenue post categories
 *
 * @package 5th-Avenue
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

/* translators: used between list items, there is a space after the comma */
$categories_list = get_the_category_list( '' );

if ( $categories_list ) {
	?>
	<div class="single-post-cats">
		<?php echo wp_kses_post( $categories_list ); ?>
	</div>
	<?php
}
