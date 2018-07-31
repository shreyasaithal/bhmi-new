<?php
/**
 * The header for 5th-Avenue theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package 5th-Avenue
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

		<?php
		wp_head();
		if ( av5_get_option( 'google-analytics-code-area', '' ) ) {
			echo av5_get_option( 'google-analytics-code-area', '' ); // WPCS: xss ok.
		}
		?>
	</head>
	<body <?php body_class(); ?>
		data-full-header="<?php echo esc_attr( av5_get_option( 'full-width-header', false ) ? 'true' : 'false' ); ?>"
		data-transparent-header="<?php echo esc_attr( av5_get_option( 'header-over-content', false ) ? 'true' : 'false' ); ?>">
			<?php do_action( 'av5_before_page' ); ?>
		<div id="page-wrap">

			<header id="header" class="<?php echo esc_attr( av5_get_header_class( 'header' ) ); ?>">
				<div class="sticky-header-filler"></div>
				<div class="header-wrap">
					<?php do_action( 'av5_header_wrap' ); ?>
				</div>
			</header>
			<header id="header-mobile" class="<?php echo esc_attr( av5_get_mobile_header_class( 'header-mobile' ) ); ?>">
				<div class="sticky-header-filler"></div>
				<div class="header-mobile-wrap">
					<?php do_action( 'av5_header_mobile_wrap' ); ?>
				</div>
			</header>
