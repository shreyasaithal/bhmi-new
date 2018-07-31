<?php
/**
 * 5th-Avenue header WooCommerce login and register form modal
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

if( ! is_account_page() ){ 
?>
<div id="av5_fullscreen_login" class="woocommerce" style="display: none;">            
	<?php wc_get_template( 'myaccount/form-login.php', array( 'hide_notice' => true ) ); ?>
</div>
<?php } ?>