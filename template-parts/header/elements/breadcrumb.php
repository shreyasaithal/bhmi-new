<?php
/**
 * 5th-Avenue breadcrumb
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

if ( function_exists( 'yoast_breadcrumb' ) ) {
	yoast_breadcrumb( '<div class="av5-breadcrumbs"><p id="breadcrumbs">', '</p></div>' );
} else {
	?>
	<div class="row av5-breadcrumbs">
		<?php do_action( 'av5_breadcrumb' ); ?>
	</div>
	<?php
}

