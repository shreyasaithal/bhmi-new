<?php
/**
 * 5th-Avenue post tag element
 *
 * Translators: used between list items, there is a space after the comma
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

$tags_list = get_the_tag_list( '', '' );

if ( $tags_list ) {
	?>
	<div class="single-post__tags">
		<?php echo wp_kses_post( $tags_list ); ?>
	</div>
	<?php
}
