<?php
/**
 * 5th-Avenue header wishlist output
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 * @todo need content output for top line
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="<?php echo esc_attr( apply_filters( 'av5_topline_class', 'topline' ) ); ?>">
	<div class="container">	
		<div class="header-left col-sm-6">

			<?php do_action( 'av5_header_topline_left' ); ?>            

		</div>
		<div class="header-right col-sm-6">

			<?php do_action( 'av5_header_topline_right' ); ?>            

		</div>  
	</div>
</div>
