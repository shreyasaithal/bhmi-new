<?php
/**
 * 5th-Avenue preloader content output
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;
$logo_name			 = apply_filters( '5avenue_logo_text', get_bloginfo( 'name' ) );
$logo					 = av5_get_option( 'website-logo', array( 'url' => '' ) );
$logo_retina			 = av5_get_option( 'website-retina-logo', array( 'url' => '' ) );
$custom_preloader_image	 = av5_get_option( 'page-preloader-image', array( 'url' => '' ) );
?>
<div id="av5-home-preloader" class="av5-preloader-style-<?php echo esc_attr( av5_get_option( 'page-preloader-style' ) ); ?>">
	<div class="av5-preloader-wrap">
		<?php if ( av5_get_option( 'page-preloader-image-select' ) == 'custom' ) { ?>
			<img src="<?php echo esc_attr( $custom_preloader_image['url'] ); ?>" alt="<?php echo esc_attr( $logo_name ); ?>" />                       
		<?php } elseif ( av5_get_option( 'page-preloader-image-select' ) == 'logo' ) { ?>
			<?php if ( ! empty( $logo['url'] ) ) { ?>
			<img class="logo" alt="<?php echo esc_attr( $logo_name ); ?>" src="<?php echo esc_url( esc_attr( $logo['url'] ) ); ?>" height="<?php echo esc_attr( $logo['height'] ); ?>" width="<?php echo esc_attr( $logo['width'] ); ?>" />
			<?php } if ( ! empty( $logo_retina['url'] ) ) { ?>
				<img class="logo retina" src="<?php echo esc_url( esc_attr( $logo_retina['url'] ) ); ?>" height="<?php echo esc_attr( $logo_retina['height'] ); ?>" alt="<?php echo esc_attr( $logo_name ); ?>" width="<?php echo esc_attr( $logo_retina['width'] ); ?>" />
			<?php
}
}
if ( av5_get_option( 'page-preloader-style' ) == '2' ) {
	?>
	<span class="line-preloader"></span>
<?php } ?>
	</div>
</div>
