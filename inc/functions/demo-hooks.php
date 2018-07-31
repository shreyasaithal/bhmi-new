<?php
/**
 * Hooks for Demo site
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'av5_demo_layout_get_attr' ) ) {

	/**
	 * Demo funciton replace value theme settings
	 *
	 * @param mixed  $value Value.
	 * @param string $type Type content page.
	 * @return mixed
	 */
	function av5_demo_layout_get_attr( $value, $type = 'posts' ) {
		$key_layout	 = sprintf( '%s-layout', $type );
		$exp_time	 = 1 * 24 * 60 * 60;
		if ( array_key_exists( 'layout', $_GET ) ) { // WPCS: input var ok.
			$_value = strip_tags( $_GET['layout'] );  // @codingStandardsIgnoreLine WordPress.VIP.ValidatedSanitizedInput.InputNotValidated
			if ( ! empty( $_value ) ) {
				setcookie( $key_layout, $_value, time() + $exp_time, '/' ); // @codingStandardsIgnoreLine WordPress.VIP.RestrictedFunctions.cookies
				$value = $_value;
			} else {
				setcookie( $key_layout, '', time() - $exp_time, '/' ); // @codingStandardsIgnoreLine WordPress.VIP.RestrictedFunctions.cookies
			}
		} elseif ( array_key_exists( $key_layout, $_GET ) ) { // WPCS: input var ok.
			$_value = strip_tags( $_GET[ $key_layout ] );  // @codingStandardsIgnoreLine WordPress.VIP.ValidatedSanitizedInput.InputNotValidated
			if ( ! empty( $_value ) ) {
				setcookie( $key_layout, $_value, time() + $exp_time, '/' ); // @codingStandardsIgnoreLine WordPress.VIP.RestrictedFunctions.cookies
				$value = $_value;
			} else {
				setcookie( $key_layout, '', time() - $exp_time, '/' ); // @codingStandardsIgnoreLine WordPress.VIP.RestrictedFunctions.cookies
			}
		} elseif ( array_key_exists( $key_layout, $_COOKIE ) ) { // WPCS: input var ok.
			$value = strip_tags( $_COOKIE[ $key_layout ] );  // @codingStandardsIgnoreLine WordPress.VIP.ValidatedSanitizedInput.InputNotValidated
		}

		return $value;
	}
} // End if().

add_filter( 'av5_get_content_layout', 'av5_demo_layout_get_attr', 10, 2 );


if ( ! function_exists( 'av5_demo_option_get_attr' ) ) {

	/**
	 * Demo funciton replace value theme settings
	 *
	 * @param mixed  $value Value.
	 * @param string $name Name option.
	 * @return mixed
	 */
	function av5_demo_option_get_attr( $value, $name ) {
		$attrs = array(
			'page-sidebar-size'				 => 'page-sidebar-size',
			'products-sidebar-size'			 => 'products-sidebar-size',
			'blog-listing-style'			 => 'blog-listing-style',
			'blog-listing-masonry-columns'	 => 'blog-listing-masonry-columns',
			'shop-page-product-filters'		 => 'shop-page-product-filters',
			'woocommerce_catalog_columns'	 => 'woocommerce-catalog-columns',
		);
		if ( array_key_exists( $name, $attrs ) ) {
			$attr = $attrs[ $name ];
			if ( ! is_array( $attr ) ) {
				$attr = array( $attr );
			}
			foreach ( $attr as $_attr ) {
				if ( array_key_exists( $_attr, $_GET ) ) { // WPCS: input var ok.
					$_value = strip_tags( $_GET[ $_attr ] );  // @codingStandardsIgnoreLine WordPress.VIP.ValidatedSanitizedInput.InputNotValidated
					if ( 0 < strlen( $_value ) ) {
						setcookie( $_attr, $_value, time() + 7 * 24 * 60 * 60, '/' ); // @codingStandardsIgnoreLine WordPress.VIP.RestrictedFunctions.cookies
						$value = $_value;
						break;
					} else {
						setcookie( $_attr, '', time() - 7 * 24 * 60 * 60, '/' ); // @codingStandardsIgnoreLine WordPress.VIP.RestrictedFunctions.cookies
					}
				} elseif ( array_key_exists( $_attr, $_COOKIE ) ) { // WPCS: input var ok.
					$_value = strip_tags( $_COOKIE[ $_attr ] );  // @codingStandardsIgnoreLine WordPress.VIP.ValidatedSanitizedInput.InputNotValidated
					if ( ! empty( $_value ) ) {
						$value = $_value;
						break;
					} else {
						setcookie( $_attr, '', time() - 7 * 24 * 60 * 60, '/' ); // @codingStandardsIgnoreLine WordPress.VIP.RestrictedFunctions.cookies
					}
				}
			}
		}

		return $value;
	}
} // End if().

add_filter( 'av5_get_option', 'av5_demo_option_get_attr', 10, 2 );

if ( ! function_exists( 'av5_demo_catalog_columns_get_attr' ) ) {

	/**
	 * Update columns for demo site
	 *
	 * @param int $value Columns for product listiong page.
	 * @return int
	 */
	function av5_demo_catalog_columns_get_attr( $value ) {
		return av5_demo_option_get_attr( $value, 'woocommerce_catalog_columns' );
	}
}

add_filter( 'woocommerce_catalog_columns', 'av5_demo_catalog_columns_get_attr' ); // Legacy filter handling.
