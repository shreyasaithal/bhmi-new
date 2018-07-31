<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package 5th-Avenue
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! ( av5_is_woocommerce_activated() && is_account_page() ) || ( av5_is_woocommerce_activated() && is_account_page() && is_user_logged_in()) ) {
	get_template_part( 'template-parts/footer/footer' );
}
?>
<div class="slide-out-shadow slideout_close" ></div>
</div><!-- #page wrap -->
<?php wp_footer(); ?>
</body>
</html>
