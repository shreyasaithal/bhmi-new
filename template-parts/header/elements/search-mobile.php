<?php
/**
 * 5th-Avenue mobile header search
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="header-item search header__item__search--<?php echo esc_attr( av5_get_option( 'mobile-header-search-type' ) ); ?> slideout-search--click" <?php if ( 'fullscreen-search' == av5_get_option( 'mobile-header-search-type' ) ) { ?> data-av5-overlay="#fullscreen-search" <?php } ?>>
	<i  class="icon-5ave-search-3 header-icon"></i>
	<?php
	if ( 'fullscreen-search' == av5_get_option( 'mobile-header-search-type' ) && 'fullscreen-search' != av5_get_option( 'header-search-type' ) ) {
		?>	
		<!-- close button -->
		<div  class="av5-overlay-close"><i class="ss-delete"></i></div>
		<div id="fullscreen-search" class="av5-fullscreen-search" style="display:none;">
			<div class="search-wrap" data-ajaxurl="">
				<div class="av5-search-bar">
					<form method="GET" class="ajax-search-form" action="<?php echo esc_url( home_url() ); ?>/">
						<?php if ( 'product' === av5_get_option( 'header-search-product' ) && av5_get_option( 'header-search-product-cats' ) ) : ?>
							<?php $cats = get_terms( array( 'taxonomy' => 'product_cat', 'hierarchical' => false ) ); ?>
							<?php if ( $cats && ! is_wp_error( $cats ) ) : ?>
								<div class="product-cats">
									<label>
										<input type="radio" name="product_cat" value="" checked="checked">
										<span class="line-hover"><?php esc_html_e( 'All Categories', '5th-avenue' ) ?></span>
									</label>

									<?php foreach ( $cats as $cat ) : ?>
										<label>
											<input type="radio" name="product_cat" value="<?php echo esc_attr( $cat->slug ); ?>">
											<span class="line-hover"><?php echo esc_html( $cat->name ); ?></span>
										</label>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
							<input type="hidden" name="product_type" value="product">
						<?php endif; ?>
						<!--Search Icon -->
						<button type="submit" class="search-submit"><i class="icon-5ave-search-3"></i></button>
						<!-- Search Input -->
						<input  class="av5-search-input" type="text" name="s" placeholder="<?php esc_attr_e( 'Type here to Search', '5th-avenue' ); ?>" autocomplete="off">
						<input type="hidden" name="post_type" value="" />
					</form>
				</div>
			</div>
		</div>
		<?php
	} else {
		?>	
		<div id="slideout-search-mobile" class="av5-search-slideout" style="display:none">
			<span class="big_cross_icon slideout_close"></span>
			<div class="search-wrap" data-ajaxurl="">
				<div class="av5-search-bar">
					<form method="GET" class="ajax-search-form" action="<?php echo esc_url( home_url() ); ?>/">
						<!-- Search Input -->
						<input class="av5-search-input" type="text" name="s" placeholder="<?php esc_attr_e( 'Type here to Search', '5th-avenue' ); ?>" autocomplete="off">
						<i class="icon-5ave-search-3"></i>
						<button type="submit" class="search-submit"><?php esc_attr_e( 'Search', '5th-avenue' ); ?></button>
						<input type="hidden" name="post_type" value="" />
					</form>
				</div>
			</div>
		</div>
	<?php } // End if(). ?>
</div>


