<?php
/**
 * 5th-Avenue post navigation
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

$next_post	 = get_next_post(); // @codingStandardsIgnoreLine WordPress.VIP.RestrictedFunctions.get_adjacent_post
$prev_post	 = get_previous_post(); // @codingStandardsIgnoreLine WordPress.VIP.RestrictedFunctions.get_adjacent_post
$nav_style	 = av5_get_option( 'blog-post-next-prev-style' );
$nav_width	 = '';

if ( empty( $prev_post ) && empty( $next_post ) ) {
	return;
}

$with_images = false;
if ( in_array( $nav_style, array( 'next-prev-style--images', 'next-prev-style--images-centered', 'next-prev-style--images-on-hover' ) ) ) {
	$with_images = true;
	$nav_width = 'av5_force_fullwidth';
}
?>
<nav role="navigation" id="nav-below" class="post-navigation <?php echo esc_attr( $nav_width ) ?> next-prev-navigation <?php
echo esc_attr( $nav_style );
if ( av5_get_option( 'blog-post-next-prev-white' ) ) {
	echo esc_attr( ' white-style ' );
}
?>">
	<div class="row">
		<?php if ( ! empty( $prev_post ) && av5_get_option( 'blog-post-next-only' ) == false ) { ?>	
			<div class="nav-previous <?php if ( empty( $next_post ) ) { ?>empty-next-post<?php } ?>"><a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" rel="prev"></a>
				<?php
				if ( av5_get_titlearea_background_image( $prev_post->ID ) && $with_images ) {
					echo '<div class="post-bg-img" style="' . av5_get_titlearea_background( $prev_post->ID ) . '" ></div>'; // WPCS: xss ok.
				} else if ( has_post_thumbnail( $prev_post->ID ) && $with_images ) {
					// Featured image.
					$post_thumbnail_id	 = get_post_thumbnail_id( $prev_post->ID );
					$post_thumbnail_url	 = wp_get_attachment_url( $post_thumbnail_id );
					echo '<div class="post-bg-img" style="background-image: url(' . $post_thumbnail_url . ');" ></div>'; // WPCS: xss ok.
				}
				?>                
				<div class="nav-text">
					<div class="nav-previous-text"><?php esc_html_e( 'Previous Post', '5th-avenue' ); ?></div>
					<h3 class="nav-title"><?php echo esc_html( $prev_post->post_title ) ?></h3>
				</div>
				<svg class="next-arrow" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 39 12"><line x1="23" y1="-0.5" x2="29.5" y2="6.5" stroke="#ffffff;"></line><line x1="23" y1="12.5" x2="29.5" y2="5.5" stroke="#ffffff;"></line></svg>
				<span class="line"></span>
			</div>
		<?php } ?>
		<?php if ( ! empty( $next_post ) ) : ?>
			<div class="nav-next <?php if ( empty( $prev_post ) || av5_get_option( 'blog-post-next-only' ) ) : ?>empty-prev-post<?php endif ?>"><a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" rel="next"></a>
				<?php
				if ( av5_get_titlearea_background_image( $next_post->ID ) && $with_images ) {
					echo '<div class="post-bg-img" style="' . av5_get_titlearea_background( $next_post->ID ) . '" ></div>'; // WPCS: xss ok.
				} else if ( has_post_thumbnail( $next_post->ID ) && $with_images ) {
					// Featured image.
					$post_thumbnail_id	 = get_post_thumbnail_id( $next_post->ID );
					$post_thumbnail_url	 = wp_get_attachment_url( $post_thumbnail_id );
					echo '<div class="post-bg-img" style="background-image: url(' . $post_thumbnail_url . ');" ></div>'; // WPCS: xss ok.
				}
				?>
				<div class="nav-text">
					<div class="nav-next-text"><?php esc_html_e( 'Next Post', '5th-avenue' ); ?></div>
					<h3 class="nav-title"><?php echo esc_attr( $next_post->post_title ); ?></h3>
				</div>
				<svg class="next-arrow" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 39 12"><line x1="23" y1="-0.5" x2="29.5" y2="6.5" stroke="#ffffff;"></line><line x1="23" y1="12.5" x2="29.5" y2="5.5" stroke="#ffffff;"></line></svg>
				<span class="line"></span>

			</div>
		</div><!-- .row -->
	<?php endif; ?>
</nav>
