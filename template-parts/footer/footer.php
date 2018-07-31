<?php
/**
 * 5th-Avenue footer
 *
 * Including additional footer, newsletter, widgets and copyright areas
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

if ( ! av5_get_meta( 'footer-disabled', false ) ) { ?>

	<?php if ( av5_get_option( 'enable-above-footer-area' ) ) { ?>
		<!-- Additional content area above the footer -->
		<div id="above-footer-content-area" class="above-footer-content-area" data-full-width="<?php echo esc_attr( av5_get_option( 'full-width-above-footer-area' ) ) ?>">
			<div class="container">
				<div class="row">
					<?php
					$content = '';
					if ( 'page' == av5_get_option( 'above-footer-area-content-type' ) ) {
						$av5_page_additional = get_page( av5_get_option( 'above-footer-area-content-page' ) );
						if ( ! empty( $av5_page_additional ) ) {
							$content = $av5_page_additional->post_content;
						}
					} else {
						$content = av5_get_option( 'above-footer-area-content' );
					}
					echo do_shortcode( $content );
					?>
				</div>
			</div>
		</div>
		<!-- End of Additional content area above the footer -->
	<?php } ?>

	<?php if ( av5_get_option( 'footer-newsletter-enable' ) ) { ?>
		<!-- Footer Newsletter block -->
		<div id="footer-newsletter" class="footer-newsletter align-center <?php echo esc_attr( get_theme_mod( 'footer_newsletter_style', 'underline-input' ) ); ?>" >
			<div class="container-fluid <?php if ( get_theme_mod( 'footer_newsletter_white_style' ) ) { ?> white-style <?php } ?>">
				<div class="row">
					<div class="col-md-12">
						<h2><?php echo av5_get_option( 'footer-newsletter-title' ); // WPCS: xss ok. ?></h2>
						<p><?php echo av5_get_option( 'footer-newsletter-text' ); // WPCS: xss ok. ?></p>
						<?php
						if ( av5_get_option( 'footer-newsletter-mailchimp-form' ) ) {
							echo do_shortcode( sprintf( '[mc4wp_form id="%s"]', esc_attr( av5_get_option( 'footer-newsletter-mailchimp-form' ) ) ) );
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<!-- End of Footer Newsletter block -->		
	<?php } ?>
<?php } // End if(). ?>
<?php if ( ! av5_get_meta( 'copyright-disabled', false ) && (av5_get_option( 'enable-footer-copyright-area' ) || av5_get_option( 'enable-footer-widget-area' )) ) { ?>
	<!-- Footer Area -->
	<footer id="colophon" class="site-footer" role="contentinfo" data-full-width="<?php echo esc_attr( av5_get_option( 'full-width-footer-area' ) ); ?>">
		<?php if ( ! av5_get_meta( 'footer-disabled', false ) && av5_get_option( 'enable-footer-widget-area' ) ) { ?>
			<!-- Footer Widgets -->
			<div class="site-footer-widgets <?php if ( av5_get_option( 'center-footer-widgets' ) ) { ?>align-center<?php } ?>">
				<div class="container">
					<div class="row <?php if ( av5_get_option( 'center-vertically-footer-widgets' ) ) { ?> flex-vertical-align <?php } ?>">

						<?php
						$footer_columns = ( ! empty( av5_get_option( 'footer-widget-area-columns' ) ) ) ? av5_get_option( 'footer-widget-area-columns' ) : '4';
						switch ( $footer_columns ) {
							case '1':
								$footer_column_class	 = 'col-md-12';
								break;
							case '2':
								$footer_column_class	 = 'col-md-6';
								break;
							case '3':
								$footer_column_class	 = 'col-md-4';
								break;
							case '5':
								$footer_column_class	 = 'footer-5-small';
								$footer_column_class2	 = 'footer-5-wide';
								break;
							case '6':
								$footer_column_class	 = 'col-md-3';
								$footer_column_class2	 = 'col-md-6';
								break;
							case '4':
							default:
								$footer_column_class	 = 'col-md-3';
								break;
						}
?>
						<div class="<?php echo esc_attr( ( '5' == $footer_columns ) ? $footer_column_class2 : $footer_column_class ); ?>">
							<!-- Footer widget area 1 -->
							<?php if ( ! ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 'Footer Area 1' ) ) ) : ?>	
								<div class="widget">		
									<h4 class="widgettitle">Widget Area 1</h4>
									<p class="no-widget-added"><a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>">Click here to assign a widget to this area.</a></p>
								</div>
							<?php endif; ?>
						</div><!-- end of widget area 1 -->

						<?php if ( in_array( $footer_columns, array( '2', '3', '4', '5', '6' ) ) ) { ?>
						<div class="<?php echo esc_attr( ( '6' == $footer_columns ) ? $footer_column_class2 : $footer_column_class ); ?>">
								<!-- Footer widget area 2 -->
								<?php if ( ! ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 'Footer Area 2' ) ) ) : ?>	
									<div class="widget">			
										<h4 class="widgettitle">Widget Area 2</h4>
										<p class="no-widget-added"><a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>">Click here to assign a widget to this area.</a></p>
									</div>
								<?php endif; ?>					     
							</div><!-- end of widget area 2 -->
						<?php } ?>

						<?php if ( in_array( $footer_columns, array( '3', '4', '5', '6' ) ) ) { ?>
							<div class="<?php echo esc_attr( $footer_column_class ); ?>">
								<!-- Footer widget area 3 -->
								<?php if ( ! ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 'Footer Area 3' ) ) ) : ?>		
									<div class="widget">
										<h4 class="widgettitle">Widget Area 3</h4>
										<p class="no-widget-added"><a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>">Click here to assign a widget to this area.</a></p>
									</div>		   
								<?php endif; ?>
							</div><!-- end of widget area 3 -->
						<?php } ?>

						<?php if ( in_array( $footer_columns, array( '4', '5' ) ) ) { ?>
							<div class="<?php echo esc_attr( $footer_column_class ); ?>">
								<!-- Footer widget area 4 -->
								<?php if ( ! ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 'Footer Area 4' ) ) ) : ?>	
									<div class="widget">		
										<h4>Widget Area 4</h4>
										<p class="no-widget-added"><a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>">Click here to assign a widget to this area.</a></p>
									</div><!--/widget-->	
								<?php endif; ?>
							</div><!-- end of widget area 3 -->
						<?php } ?>
					</div>
				</div>
			</div>
			<!-- End of Footer Widgets -->
		<?php } // End if(). ?> 
		<?php if ( defined( 'AV5C_PATH' ) ) { ?>
			<?php if ( av5_get_option( 'enable-footer-copyright-area' ) ) { ?>            
				<!-- Copyright area --> 
				<?php get_template_part( 'template-parts/footer/copyright/copyright', av5_get_option( 'footer-copyright-layout' ) ); ?>
				<!-- End of copyright area -->  
			<?php } ?>       
		<?php } else { 
			echo '<div class="site-info-wrap"><div class="site-info container align-center"><div class="row"><div class="copyright-text">'. esc_html__('&#169;', '5th-avenue') .''. date( 'Y' ) .' '. get_bloginfo( 'name' ).'</div></div></div><!-- .site-info --></div>';
		} ?>   
	</footer><!-- #colophon -->
<?php } // End if(). ?><!-- End of Footer area -->
<!-- Footer Button -->
<?php if ( av5_get_option( 'enable-footer-button' ) ) : ?>
	<a class="footer-fixed-button hidden-xs" href="<?php echo esc_url( av5_get_option( 'footer-button-link' ) ); ?>">
		<?php if ( av5_get_option( 'footer-buttons-elusive-icons' ) ) { ?><i class="<?php echo esc_attr( av5_get_option( 'footer-buttons-elusive-icons' ) ); ?>"></i> <?php } ?>
		<span><?php echo do_shortcode( av5_get_option( 'footer-button-text' ) ) ?></span>	
	</a>
<?php endif; ?>	
<!-- End of Footer Button -->

<!-- To Top -->
<?php if ( av5_get_option( 'back-to-top-button' ) ) { ?>
	<div id="toTop"><svg class="next-arrow" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 39 12"><line x1="23" y1="-0.5" x2="29.5" y2="6.5" stroke="#ffffff;"></line><line x1="23" y1="12.5" x2="29.5" y2="5.5" stroke="#ffffff;"></line></svg><span class="line"></span></div>
	<?php } ?>
