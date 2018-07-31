<?php
/**
 * 5th-Avenue mobile header logo output
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

$logo			 = av5_get_option( 'website-logo', array( 'url' => '' ) );
$logo_retina	 = av5_get_option( 'website-retina-logo', array( 'url' => '' ) );
$logo_alt		 = av5_get_option( 'website-alt-logo', array( 'url' => '' ) );
$logo_retina_alt = av5_get_option( 'website-alt-retina-logo', array( 'url' => '' ) );
$logo_name		 = apply_filters( '5avenue_logo_text', get_bloginfo( 'name' ) );
$logo_url		 = apply_filters( '5avenue_url_logo', home_url() );
?>
<div id="<?php echo esc_attr( apply_filters( '5avenue_logo_id', 'logo' ) ); ?>" class="<?php
if ( ! empty( $logo_white['url'] ) && ( av5_get_option_meta( 'header-white-style', false ) || get_theme_mod( 'header_white-style', false ) ) ) {
	echo ' white-logo-on ';
}
?><?php echo esc_attr( apply_filters( '5avenue_logo_class', 'flex-column logo' ) ); ?>">
	<a rel="home" href="<?php echo esc_url( $logo_url ); ?>">

		<?php if ( av5_get_option( 'header-mobile-logo-alternative' ) && $logo_alt ) { ?>
			<?php if ( ! empty( $logo_alt['url'] ) ) : ?>
				<img class="alt-logo" src="<?php echo esc_attr( $logo_alt['url'] ); ?>" alt="<?php echo esc_attr( $logo_name ); ?>" height="<?php echo esc_attr( $logo_alt['height'] ); ?>" width="<?php echo esc_attr( $logo_alt['width'] ); ?>" />
			<?php endif; ?>
			<?php if ( ! empty( $logo_retina_alt['url'] ) ) : ?>
				<img class="alt-logo retina" src="<?php echo esc_attr( $logo_retina_alt['url'] ); ?>" alt="<?php echo esc_attr( $logo_name ); ?>" height="<?php echo esc_attr( $logo_alt['height'] ); ?>" width="<?php echo esc_attr( $logo_alt['width'] ); ?>" style="height:<?php echo esc_attr( $logo_alt['height'] ); ?>px; width:auto;" />
			<?php endif; ?>                           

		<?php } else { ?>
			<?php if ( ! empty( $logo['url'] ) ) : ?>
				<img class="logo" src="<?php echo esc_attr( $logo['url'] ); ?>" alt="<?php echo esc_attr( $logo_name ); ?>" height="<?php echo esc_attr( $logo['height'] ); ?>" width="<?php echo esc_attr( $logo['width'] ); ?>" />
			<?php endif; ?>
			<?php if ( ! empty( $logo_retina['url'] ) ) : ?>
				<img class="logo retina" src="<?php echo esc_attr( $logo_retina['url'] ); ?>" alt="<?php echo esc_attr( $logo_name ); ?>" height="<?php  echo esc_attr( $logo['height'] ); ?>" width="<?php echo esc_attr( $logo['width'] ); ?>" style="height:<?php echo esc_attr( $logo['height'] ); ?>px; width:auto;" />
			<?php endif; ?>                            
		<?php } ?>

		<?php if ( empty( $logo['url'] ) ) : ?>
			<div class="text-logo">
				<h1 class="site-title standard"><?php echo esc_html( $logo_name ); ?></h1>
				<!--<h1 class="site-title retina"><?php echo esc_html( $logo_name ); ?></h1>-->
				<?php if ( av5_get_option( 'logo-tag-line' ) ) : ?>
					<h1 class="logo-h2"><?php echo esc_html( apply_filters( '5avenue_logo_tag_line', get_bloginfo( 'description' ) ) ); ?></h1>
				<?php endif; ?>
			</div>
		<?php endif; ?>

	</a>
</div>
