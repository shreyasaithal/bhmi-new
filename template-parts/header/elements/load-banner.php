<?php
/**
 * 5th-Avenue load banner content
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

?>
<div id="av5-load-banner-content" class="modal-av5-load-banner" style="display:none;">
<?php echo do_shortcode( av5_get_option( 'load-banner-content' ) ); // WPCS: xss ok.?>
</div><!-- end of load banner -->
