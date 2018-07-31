<?php
/**
 * 5th-Avenue copyright layout
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="site-info-wrap">
	<div class="site-info container align-center">
		<div class="row">
			<?php wp_nav_menu( array( 'menu' => 'footer-copyright-menu', 'theme_location' => 'footer-copyright-menu', 'fallback_cb' => false ) ); ?>                                      
			<?php if ( av5_get_option( 'footer-copyright-content' ) ) { ?><div class="copyright-text"><?php echo do_shortcode( av5_get_option( 'footer-copyright-content' ) ); ?></div><?php } ?>                                        
			<?php
			if ( av5_get_option( 'enable-footer-copyright-area-social' ) ) {
				echo do_shortcode( '[av5_social]' );
			}
			?>
		</div>
	</div><!-- .site-info -->
</div>
