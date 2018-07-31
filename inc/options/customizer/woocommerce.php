<?php
/**
 * WooCommerce option theme for cutomizer
 *
 * @package           5th-Avenue\Option
 * @subpackage        Kirki
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

Kirki::add_panel( 'woocommerce_panel', array(
	'priority'		 => 50,
	'title'			 => esc_html__( 'VA WooCommerce', '5th-avenue' ),
	'description'	 => esc_html__( 'My Description is here', '5th-avenue' ),
) );

/* WOOCOMMERCE > PRODUCTS --------------------------------- */

Kirki::add_section( 'av5_woocommerce_general_section', array(
	'priority'	 => 10,
	'title'		 => esc_html__( 'General', '5th-avenue' ),
	'panel'		 => 'woocommerce_panel',
) );
Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color',
	'settings'	 => 'product_page_price_color',
	'label'		 => esc_html__( 'Price Color', '5th-avenue' ),
	'section'	 => 'av5_woocommerce_general_section',
	'default'	 => '#b58672',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => array( '.woocommerce div.product .price', '.woocommerce .product-after-shop-loop .product-price .price', '.woocommerce .product-bar .price', '.woocommerce-mini-cart__total .woocommerce-Price-amount', '.woocommerce #content table.cart .product-subtotal', '.woocommerce-page #content table.cart .product-subtotal', '.cart-collaterals .cart_totals .shop_table .order-total .woocommerce-Price-amount', '.woocommerce table.shop_table .order-total th', '.woocommerce-checkout-review-order-table .order-total .woocommerce-Price-amount', '.cart-collaterals .cart_totals .shop_table .order-total .woocommerce-Price-amount' ),
			'property'	 => 'color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => array( '.woocommerce div.product .price', '.woocommerce .product-after-shop-loop .product-price .price', '.woocommerce .product-bar .price', '.woocommerce-mini-cart__total .woocommerce-Price-amount', '.woocommerce #content table.cart .product-subtotal', '.woocommerce-page #content table.cart .product-subtotal', '.cart-collaterals .cart_totals .shop_table .order-total .woocommerce-Price-amount', '.woocommerce table.shop_table .order-total th', '.woocommerce-checkout-review-order-table .order-total .woocommerce-Price-amount', '.cart-collaterals .cart_totals .shop_table .order-total .woocommerce-Price-amount' ),
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );
Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color',
	'settings'	 => 'product_rating_color',
	'label'		 => esc_html__( 'Product Rating', '5th-avenue' ),
	'section'	 => 'av5_woocommerce_general_section',
	'default'	 => '#536374',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.woocommerce p.stars.selected a:not(.active):before, .woocommerce .star-rating span, .woocommerce p.stars.selected a.active::before',
			'property'	 => 'color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.woocommerce p.stars.selected a:not(.active):before, .woocommerce .star-rating span, .woocommerce p.stars.selected a.active::before',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );
/* labels */
Kirki::add_field( 'av5_theme', array(
	'type'		 => 'select',
	'settings'	 => 'product_labels_style',
	'label'		 => esc_html__( 'Product Labels Style', '5th-avenue' ),
	'section'	 => 'av5_woocommerce_general_section',
	'default'	 => 'naked',
	'priority'	 => 10,
	'choices'	 => array(
		'rounded'	 => esc_html__( 'Rounded', '5th-avenue' ),
		'square'	 => esc_html__( 'Square', '5th-avenue' ),
		'naked'		 => esc_html__( 'Naked', '5th-avenue' ),
	),
) );
Kirki::add_field( 'av5_theme', array(
	'type'				 => 'color',
	'settings'			 => 'product_labels_bg',
	'label'				 => esc_html__( 'Product Labels Background', '5th-avenue' ),
	'section'			 => 'av5_woocommerce_general_section',
	'default'			 => '#d3ba9c',
	'priority'			 => 10,
	'output'			 => array(
		array(
			'element'	 => '.sale-label__style--square span.onsale, .sale-label__style--rounded span.onsale',
			'property'	 => 'background-color',
		),
	),
	'transport'			 => 'postMessage',
	'js_vars'			 => array(
		array(
			'element'	 => '.sale-label__style--square span.onsale, .sale-label__style--rounded span.onsale',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
	'active_callback'	 => array(
		array(
			'setting'	 => 'product_labels_style',
			'operator'	 => '!=',
			'value'		 => 'naked',
		),
	),
) );
Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color',
	'settings'	 => 'product_labels_color',
	'label'		 => esc_html__( 'Product Labels Text Color', '5th-avenue' ),
	'section'	 => 'av5_woocommerce_general_section',
	'default'	 => '#484848',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.sale-label__style--square span.onsale, .sale-label__style--rounded span.onsale, .sale-label__style--naked ul.products .product .onsale, .woocommerce span.onsale',
			'property'	 => 'color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.sale-label__style--square span.onsale, .sale-label__style--rounded span.onsale, .sale-label__style--naked ul.products .product .onsale, .woocommerce span.onsale',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );

/* cart page */
Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color',
	'settings'	 => 'cart_totals_bg',
	'label'		 => esc_html__( 'Cart Totals Background', '5th-avenue' ),
	'section'	 => 'av5_woocommerce_general_section',
	'default'	 => '#f9f9f9',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.woocommerce .cart-collaterals .cart_totals, .woocommerce-page .cart-collaterals .cart_totals, form.track_order, .woocommerce-checkout .woocommerce-checkout-review-order',
			'property'	 => 'background-color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.woocommerce .cart-collaterals .cart_totals, .woocommerce-page .cart-collaterals .cart_totals, form.track_order, .woocommerce-checkout .woocommerce-checkout-review-order',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );
Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'cart_totals_border',
	'label'		 => esc_html__( 'Cart Totals Border', '5th-avenue' ),
	'section'	 => 'av5_woocommerce_general_section',
	'default'	 => '#dedede',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.woocommerce .cart-collaterals .cart_totals, .woocommerce-page .cart-collaterals .cart_totals, form.track_order, .woocommerce-checkout .woocommerce-checkout-review-order',
			'property'	 => 'border-color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.woocommerce .cart-collaterals .cart_totals, .woocommerce-page .cart-collaterals .cart_totals, form.track_order, .woocommerce-checkout .woocommerce-checkout-review-order',
			'function'	 => 'css',
			'property'	 => 'border-color',
		),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'dimension',
	'settings'	 => 'cart_totals_border_size',
	'label'		 => esc_html__( 'Totals Border Size', '5th-avenue' ),
	'section'	 => 'av5_woocommerce_general_section',
	'default'	 => '1px',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.woocommerce .cart-collaterals .cart_totals, .woocommerce-page .cart-collaterals .cart_totals, form.track_order, .woocommerce-checkout .woocommerce-checkout-review-order',
			'property'	 => 'border-width',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.woocommerce .cart-collaterals .cart_totals, .woocommerce-page .cart-collaterals .cart_totals, form.track_order, .woocommerce-checkout .woocommerce-checkout-review-order',
			'function'	 => 'css',
			'property'	 => 'border-width',
		),
	),
) );

Kirki::add_section( 'av5_woocommerce_shop_page_section', array(
	'priority'	 => 20,
	'title'		 => esc_html__( 'Shop page', '5th-avenue' ),
	'panel'		 => 'woocommerce_panel',
) );

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color',
	'settings'	 => 'shop_page_products_bg_color',
	'label'		 => esc_html__( 'Grid products background color', '5th-avenue' ),
	'section'	 => 'av5_woocommerce_shop_page_section',
	'default'	 => '',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.woocommerce ul.products .product',
			'property'	 => 'background-color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.woocommerce ul.products .product',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );
Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color',
	'settings'	 => 'product_page_addtocart_color',
	'label'		 => esc_html__( 'Grid Add to Cart Link', '5th-avenue' ),
	'section'	 => 'av5_woocommerce_shop_page_section',
	'default'	 => '#b58672',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => array( '.woocommerce .product-after-shop-loop a.button', '.product-category span.button', '.product-category span.button:hover', '.woocommerce .product-after-shop-loop .product-buttons a', '.woocommerce .product-after-shop-loop .product-buttons a:hover', '.woocommerce .product-after-shop-loop .product-buttons a:focus', '.woocommerce div.product-after-shop-loop .product-buttons', '.woocommerce .product-after-shop-loop .product-buttons a:active', '.product-category span.button' ),
			'property'	 => 'color',
		),
		array(
			'element'	 => '.product-category span.button:after, .product-category span.button:hover:after',
			'property'	 => 'background-color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => array( '.woocommerce .product-after-shop-loop a.button', '.product-category span.button', '.product-category span.button:hover', '.woocommerce .product-after-shop-loop .product-buttons a', '.woocommerce .product-after-shop-loop .product-buttons a:hover', '.woocommerce .product-after-shop-loop .product-buttons a:focus', '.woocommerce div.product-after-shop-loop .product-buttons', '.woocommerce .product-after-shop-loop .product-buttons a:active', '.product-category span.button' ),
			'function'	 => 'css',
			'property'	 => 'color',
		),
		array(
			'element'	 => '.product-category span.button:after, .product-category span.button:hover:after',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color',
	'settings'	 => 'product_desc_categories_color',
	'label'		 => esc_html__( 'Product Description Category', '5th-avenue' ),
	'section'	 => 'av5_woocommerce_shop_page_section',
	'default'	 => '#b58672',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => array( '.woocommerce ul.products div.product-details .posted_in  a', '.woocommerce div.product-details .posted_in a:hover' ),
			'property'	 => 'color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => array( '.woocommerce ul.products div.product-details .posted_in a', '.woocommerce div.product-details .posted_in a:hover' ),
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );




Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color',
	'settings'	 => 'product_grid_product_title_color',
	'label'		 => esc_html__( 'Product Title Color on Listing', '5th-avenue' ),
	'section'	 => 'av5_woocommerce_shop_page_section',
	'default'	 => '#536374',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => array( '.woocommerce ul.products .product-details .woocommerce-loop-product__title a', '.woocommerce ul.products .product-details .woocommerce-loop-product__title a:hover', '.products .product .product-additional a', '.products .product .product-additional a span', '.products .product .product-additional a:hover span', '.products .product .product-additional a:hover', '.woocommerce-mini-cart li a.av5-product-title', '.woocommerce-mini-cart li a.av5-product-title:hover' ),
			'property'	 => 'color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => array( '.woocommerce ul.products .product-details .woocommerce-loop-product__title a', '.woocommerce ul.products .product-details .woocommerce-loop-product__title a:hover', '.products .product .product-additional a', '.products .product .product-additional a span', '.products .product .product-additional a:hover span', '.products .product .product-additional a:hover', '.woocommerce-mini-cart li a.av5-product-title', '.woocommerce-mini-cart li a.av5-product-title:hover' ),
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color',
	'settings'	 => 'product_filters_link_color',
	'label'		 => esc_html__( 'Product Filters Link Color', '5th-avenue' ),
	'section'	 => 'av5_woocommerce_shop_page_section',
	'default'	 => '#536374',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.av5-slide-out-left-button.av5-products-filter-title .av5-filter-icon span:before, .av5-slide-out-left-button.av5-products-filter-title .av5-filter-icon span',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => '.woocommerce .av5-products-filter .av5-products-filter-area.widget_price_filter button, .woocommerce .av5-products-filter-wrap .av5-products-filter.av5-products-filter-clear a.button, .woocommerce .av5-products-filter .av5-products-filter-area.widget_price_filter a.button, .av5-products-filter-wrap .av5-products-filter.av5-products-filter-clear a.button, a.av5-slide-out-left-button.av5-products-filter-title, .av5-slide-out-left-button.av5-products-filter-title .av5-filter-icon span:before, .av5-slide-out-left-button.av5-products-filter-title .av5-filter-icon span, .av5-products-filter-title, .av5-products-filter-wrap div.av5-products-filter .av5-products-filter-title, form.woocommerce-ordering select, div.av5-products-filter-wrap .av5-products-filter .av5-products-filter-area button, div.av5-products-filter-wrap div.av5-products-filter .av5-products-filter-title, div.av5-products-filter-wrap .av5-products-filter div.av5-products-filter-area.widget_price_filter button',
			'property'	 => 'color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.woocommerce .av5-products-filter .av5-products-filter-area.widget_price_filter button, .woocommerce .av5-products-filter-wrap .av5-products-filter.av5-products-filter-clear a.button, .woocommerce .av5-products-filter .av5-products-filter-area.widget_price_filter a.button, .av5-products-filter-wrap .av5-products-filter.av5-products-filter-clear a.button, a.av5-slide-out-left-button.av5-products-filter-title, .av5-slide-out-left-button.av5-products-filter-title .av5-filter-icon span:before, .av5-slide-out-left-button.av5-products-filter-title .av5-filter-icon span, .av5-products-filter-title, .av5-products-filter-wrap div.av5-products-filter .av5-products-filter-title, form.woocommerce-ordering select, div.av5-products-filter-wrap .av5-products-filter .av5-products-filter-area button, div.av5-products-filter-wrap div.av5-products-filter .av5-products-filter-title, div.av5-products-filter-wrap .av5-products-filter div.av5-products-filter-area.widget_price_filter button',
			'function'	 => 'css',
			'property'	 => 'color',
		),
		array(
			'element'	 => '.av5-slide-out-left-button.av5-products-filter-title .av5-filter-icon span:before, .av5-slide-out-left-button.av5-products-filter-title .av5-filter-icon span',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );
Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color',
	'settings'	 => 'product_filters_link_color_hover',
	'label'		 => esc_html__( 'Product Filters Link Color Hover', '5th-avenue' ),
	'section'	 => 'av5_woocommerce_shop_page_section',
	'default'	 => '#536374',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.av5-slide-out-left-button.av5-products-filter-title:hover .av5-filter-icon span:before, .av5-slide-out-left-button.av5-products-filter-title:hover .av5-filter-icon span',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => '.woocommerce .av5-products-filter .av5-products-filter-area.widget_price_filter button:hover, .woocommerce .av5-products-filter-wrap .av5-products-filter.av5-products-filter-clear a.button:hover, .woocommerce .av5-products-filter .av5-products-filter-area.widget_price_filter a.button:hover, .av5-products-filter-wrap .av5-products-filter.av5-products-filter-clear a.button:hover, a.av5-slide-out-left-button.av5-products-filter-title:hover, div.av5-products-filter-wrap .av5-products-filter .av5-products-filter-area button:hover, div.av5-products-filter-wrap div.av5-products-filter .av5-products-filter-title:hover, div.av5-products-filter-wrap .av5-products-filter div.av5-products-filter-area.widget_price_filter button:hover',
			'property'	 => 'color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.av5-slide-out-left-button.av5-products-filter-title:hover .av5-filter-icon span:before, .av5-slide-out-left-button.av5-products-filter-title:hover .av5-filter-icon span',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => '.woocommerce .av5-products-filter .av5-products-filter-area.widget_price_filter button:hover, .woocommerce .av5-products-filter-wrap .av5-products-filter.av5-products-filter-clear a.button:hover, .av5-products-filter-wrap .av5-products-filter.av5-products-filter-clear a.button:hover, .woocommerce .av5-products-filter .av5-products-filter-area.widget_price_filter a.button:hover, a.av5-slide-out-left-button.av5-products-filter-title:hover, div.av5-products-filter-wrap .av5-products-filter .av5-products-filter-area button:hover, div.av5-products-filter-wrap div.av5-products-filter .av5-products-filter-title:hover, div.av5-products-filter-wrap .av5-products-filter div.av5-products-filter-area.widget_price_filter button:hover',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'switch',
	'settings'	 => 'shop_page_banner_border',
	'label'		 => esc_html__( 'Shop Page grid Banners Border', '5th-avenue' ),
	'section'	 => 'av5_woocommerce_shop_page_section',
	'default'	 => 0,
	'priority'	 => 10,
) );

Kirki::add_field( 'av5_theme', array(
	'type'				 => 'color',
	'settings'			 => 'shop_page_banner_border_color',
	'label'				 => esc_html__( 'Grid Banner Border Color', '5th-avenue' ),
	'section'			 => 'av5_woocommerce_shop_page_section',
	'default'			 => '#536374',
	'priority'			 => 10,
	'output'			 => array(
		array(
			'element'	 => '.grid-products-banner .dashed_border .banner-content',
			'property'	 => 'border-color',
		),
	),
	'transport'			 => 'postMessage',
	'js_vars'			 => array(
		array(
			'element'	 => '.grid-products-banner .dashed_border .banner-content',
			'function'	 => 'css',
			'property'	 => 'border-color',
		),
	),
	'active_callback'	 => array(
		array(
			'setting'	 => 'shop_page_banner_border',
			'operator'	 => '==',
			'value'		 => true,
		),
	),
) );


Kirki::add_section( 'av5_woocommerce_product_page_section', array(
	'priority'	 => 30,
	'title'		 => esc_html__( 'Product page', '5th-avenue' ),
	'panel'		 => 'woocommerce_panel',
) );

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color',
	'settings'	 => 'product_page_info_background_color',
	'label'		 => esc_html__( 'Product Info Background Color', '5th-avenue' ),
	'section'	 => 'av5_woocommerce_product_page_section',
	'default'	 => '#f8f7f7',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.woocommerce div.product .product-info-background, .av5-quickview__wrapper div.product div.images, .pswp__bg',
			'property'	 => 'background-color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.woocommerce div.product .product-info-background, .av5-quickview__wrapper div.product div.images, .pswp__bg',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color',
	'settings'	 => 'product_page_related_background_color',
	'label'		 => esc_html__( 'Related Products Section Background Color', '5th-avenue' ),
	'section'	 => 'av5_woocommerce_product_page_section',
	'default'	 => '#f8f7f7',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => array( '.woocommerce .related.products', '.related.products .product .product-additional' ),
			'property'	 => 'background-color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => array( '.woocommerce .related.products', '.related.products .product .product-additional' ),
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );
Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color',
	'settings'	 => 'product_page_tabs_link_color',
	'label'		 => esc_html__( 'Product page Tabs Link', '5th-avenue' ),
	'section'	 => 'av5_woocommerce_product_page_section',
	'default'	 => '#6b787f',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.woocommerce div.product .woocommerce-tabs ul.tabs li a, .woocommerce div.product .woocommerce-tabs .woocommerce-Tabs-panel-container ul.wc-tabs li a',
			'property'	 => 'color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.woocommerce div.product .woocommerce-tabs ul.tabs li a, .woocommerce div.product .woocommerce-tabs .woocommerce-Tabs-panel-container ul.wc-tabs li a',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );
Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color',
	'settings'	 => 'product_page_tabs_link_hover_color',
	'label'		 => esc_html__( 'Product page Tabs Active', '5th-avenue' ),
	'section'	 => 'av5_woocommerce_product_page_section',
	'default'	 => '#b58672',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.woocommerce div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce div.product .woocommerce-tabs ul.tabs li a:hover, .woocommerce div.product .woocommerce-tabs ul.wc-tabs li.active a, .woocommerce div.product .woocommerce-tabs ul.wc-tabs li a:hover',
			'property'	 => 'color',
		),
		array(
			'element'	 => '.tabs .tab-slide, .woocommerce div.product .woocommerce-tabs .woocommerce-Tabs-panel-container ul.wc-tabs li.active a:before',
			'property'	 => 'background-color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.woocommerce div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce div.product .woocommerce-tabs ul.tabs li a:hover, .woocommerce div.product .woocommerce-tabs ul.wc-tabs li.active a, .woocommerce div.product .woocommerce-tabs ul.wc-tabs li a:hover',
			'function'	 => 'css',
			'property'	 => 'color',
		),
		array(
			'element'	 => '.tabs .tab-slide, .woocommerce div.product .woocommerce-tabs .woocommerce-Tabs-panel-container ul.wc-tabs li.active a:before',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );

/* wishlist */

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color',
	'settings'	 => 'product_page_wishlist_icon_color',
	'label'		 => esc_html__( 'Wishlist Icon Color', '5th-avenue' ),
	'section'	 => 'av5_woocommerce_product_page_section',
	'default'	 => '#cacaca',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.tinv-wishlist .tinvwl_add_to_wishlist_button.tinvwl-icon-heart:before, .tinv-wishlist .tinvwl_add_to_wishlist_button.tinvwl-icon-heart-plus:before, .tinv-wishlist  a.button.tinvwl_add_to_wishlist_button:before, .woocommerce .products .product a.button.tinvwl_add_to_wishlist_button:before, .woocommerce-page .products .product a.button.tinvwl_add_to_wishlist_button:before, .woocommerce ul.products li.product a.button.tinvwl-icon-heart.tinvwl_add_to_wishlist_button:before, .woocommerce-page ul.products li.product a.button.tinvwl-icon-heart.tinvwl_add_to_wishlist_button:before, .woocommerce ul.products li.product a.button.tinvwl-icon-heart-plus.tinvwl_add_to_wishlist_button:before, .woocommerce-page ul.products li.product a.button.tinvwl-icon-heart-plus.tinvwl_add_to_wishlist_button:before',
			'property'	 => 'color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.tinv-wishlist .tinvwl_add_to_wishlist_button.tinvwl-icon-heart:before, .tinv-wishlist .tinvwl_add_to_wishlist_button.tinvwl-icon-heart-plus:before, .tinv-wishlist  a.button.tinvwl_add_to_wishlist_button:before, .woocommerce .products .product a.button.tinvwl_add_to_wishlist_button:before, .woocommerce-page .products .product a.button.tinvwl_add_to_wishlist_button:before, .woocommerce ul.products li.product a.button.tinvwl-icon-heart.tinvwl_add_to_wishlist_button:before, .woocommerce-page ul.products li.product a.button.tinvwl-icon-heart.tinvwl_add_to_wishlist_button:before, .woocommerce ul.products li.product a.button.tinvwl-icon-heart-plus.tinvwl_add_to_wishlist_button:before, .woocommerce-page ul.products li.product a.button.tinvwl-icon-heart-plus.tinvwl_add_to_wishlist_button:before',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );


Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color',
	'settings'	 => 'product_page_wishlist_icon_hover_color',
	'label'		 => esc_html__( 'Wishlist Icon Hover Color', '5th-avenue' ),
	'section'	 => 'av5_woocommerce_product_page_section',
	'default'	 => '#000000;',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.tinv-wishlist .tinvwl_add_to_wishlist_button.tinvwl-icon-heart:hover:before, .tinv-wishlist .tinvwl_add_to_wishlist_button.tinvwl-icon-heart-plus:hover:before, .tinv-wishlist  a.button.tinvwl_add_to_wishlist_button:hover:before, .woocommerce .products .product a.button.tinvwl_add_to_wishlist_button:hover:before, .woocommerce-page .products .product a.button.tinvwl_add_to_wishlist_button:hover:before, .woocommerce ul.products li.product a.button.tinvwl-icon-heart.tinvwl_add_to_wishlist_button:hover:before, .woocommerce-page ul.products li.product a.button.tinvwl-icon-heart.tinvwl_add_to_wishlist_button:hover:before, .woocommerce ul.products li.product a.button.tinvwl-icon-heart-plus.tinvwl_add_to_wishlist_button:hover:before, .woocommerce-page ul.products li.product a.button.tinvwl-icon-heart-plus.tinvwl_add_to_wishlist_button:hover:before, .woocommerce .products .product a.button.tinvwl_add_to_wishlist_button.tinvwl-product-in-list:before, .woocommerce-page .products .product a.button.tinvwl_add_to_wishlist_button.tinvwl-product-in-list:before, .woocommerce ul.products li.product a.button.tinvwl-icon-heart.tinvwl_add_to_wishlist_button.tinvwl-product-in-list:before, .woocommerce-page ul.products li.product a.button.tinvwl-icon-heart.tinvwl_add_to_wishlist_button.tinvwl-product-in-list:before, .woocommerce ul.products li.product a.button.tinvwl-icon-heart-plus.tinvwl_add_to_wishlist_button.tinvwl-product-in-list:before, .woocommerce-page ul.products li.product a.button.tinvwl-icon-heart-plus.tinvwl_add_to_wishlist_button.tinvwl-product-in-list:before, .tinv-wishlist  .tinvwl_add_to_wishlist_button.tinvwl-product-in-list:before,.tinv-wishlist .tinvwl_add_to_wishlist_button.tinvwl-product-in-list:before',
			'property'	 => 'color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.tinv-wishlist .tinvwl_add_to_wishlist_button.tinvwl-icon-heart:hover:before, .tinv-wishlist .tinvwl_add_to_wishlist_button.tinvwl-icon-heart-plus:hover:before, .tinv-wishlist  a.button.tinvwl_add_to_wishlist_button:hover:before, .woocommerce .products .product a.button.tinvwl_add_to_wishlist_button:hover:before, .woocommerce-page .products .product a.button.tinvwl_add_to_wishlist_button:hover:before, .woocommerce ul.products li.product a.button.tinvwl-icon-heart.tinvwl_add_to_wishlist_button:hover:before, .woocommerce-page ul.products li.product a.button.tinvwl-icon-heart.tinvwl_add_to_wishlist_button:hover:before, .woocommerce ul.products li.product a.button.tinvwl-icon-heart-plus.tinvwl_add_to_wishlist_button:hover:before, .woocommerce-page ul.products li.product a.button.tinvwl-icon-heart-plus.tinvwl_add_to_wishlist_button:hover:before, .woocommerce .products .product a.button.tinvwl_add_to_wishlist_button.tinvwl-product-in-list:before, .woocommerce-page .products .product a.button.tinvwl_add_to_wishlist_button.tinvwl-product-in-list:before, .woocommerce ul.products li.product a.button.tinvwl-icon-heart.tinvwl_add_to_wishlist_button.tinvwl-product-in-list:before, .woocommerce-page ul.products li.product a.button.tinvwl-icon-heart.tinvwl_add_to_wishlist_button.tinvwl-product-in-list:before, .woocommerce ul.products li.product a.button.tinvwl-icon-heart-plus.tinvwl_add_to_wishlist_button.tinvwl-product-in-list:before, .woocommerce-page ul.products li.product a.button.tinvwl-icon-heart-plus.tinvwl_add_to_wishlist_button.tinvwl-product-in-list:before, .tinv-wishlist  .tinvwl_add_to_wishlist_button.tinvwl-product-in-list:before,.tinv-wishlist .tinvwl_add_to_wishlist_button.tinvwl-product-in-list:before',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );
Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'product_page_wishlist_btn_color',
	'label'		 => esc_html__( 'Wishlist Listing Background Color', '5th-avenue' ),
	'section'	 => 'av5_woocommerce_product_page_section',
	'default'	 => '#ffffff',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.woocommerce .products .product .tinvwl-above_thumb-add-to-cart .tinvwl_add_to_wishlist_button.no-txt.button,.woocommerce ul.products li .tinvwl-above_thumb-add-to-cart .tinvwl_add_to_wishlist_button.no-txt.button, .woocommerce ul.products li.product .tinvwl-above_thumb-add-to-cart .tinvwl_add_to_wishlist_button.no-txt.button',
			'property'	 => 'background-color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.woocommerce .products .product .tinvwl-above_thumb-add-to-cart .tinvwl_add_to_wishlist_button.no-txt.button,.woocommerce ul.products li .tinvwl-above_thumb-add-to-cart .tinvwl_add_to_wishlist_button.no-txt.button, .woocommerce ul.products li.product .tinvwl-above_thumb-add-to-cart .tinvwl_add_to_wishlist_button.no-txt.button',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );


Kirki::add_field( 'av5_theme', array(
	'type'		 => 'select',
	'settings'	 => 'product_page_swatches_style',
	'label'		 => esc_html__( 'Swatches Style', '5th-avenue' ),
	'section'	 => 'av5_woocommerce_product_page_section',
	'default'	 => 'rounded',
	'priority'	 => 10,
	'choices'	 => array(
		'rounded'	 => esc_html__( 'Rounded', '5th-avenue' ),
		'square'	 => esc_html__( 'Square', '5th-avenue' ),
	),
) );
