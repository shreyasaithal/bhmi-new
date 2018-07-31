<?php
/**
 * Fonts option theme
 *
 * @package           5th-Avenue\Option
 * @subpackage        Redux
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

$theme_option_sections['fonts-options'] = array(
	'title'	 => esc_html__( 'Font Options', '5th-avenue' ),
	'id'	 => 'fonts',
	'icon'	 => 'el-icon-fontsize',
);

$theme_option_sections['fonts-general'] = array(
	'title'	 => esc_html__( 'Font Options', '5th-avenue' ),
	'id'				 => 'fonts-general',
	'subsection'		 => true,
	'customizer_width'	 => '450px',
	'fields' => array(
		array(
			'id'	 => 'custom_fonts',
			'type'	 => 'custom_fonts',
		),
		array(
			'id'			 => 'font-body',
			'type'			 => 'typography',
			'title'			 => esc_html__( 'Body Font', '5th-avenue' ),
			'subtitle'		 => esc_html__( 'Specify the body font properties.', '5th-avenue' ),
			'google'		 => true,
			'font-backup'	 => true,
			'text-align'	 => false,
			'color'			 => false,
			'letter-spacing' => true,
			'text-transform' => true,
			'all_styles'	 => true, // Enable all Google Font style/weight variations to be added to the page
			'units'			 => 'px', // Defaults to px.
			'default'		 => array(
				'font-size'		 => '15px',
				'line-height'	 => '30px',
				'font-family'	 => 'Poppins',
				'font-weight'	 => '400',
			),
			'output'		 => array( 'body,p' ),
			'compiler'		 => array( 'body,p' ),
		),
		array(
			'id'			 => 'font-blog-post',
			'type'			 => 'typography',
			'title'			 => esc_html__( 'Blog Post Font', '5th-avenue' ),
			'subtitle'		 => esc_html__( 'Specify the blog post font properties.', '5th-avenue' ),
			'google'		 => true,
			'font-backup'	 => true,
			'text-align'	 => false,
			'color'			 => false,
			'letter-spacing' => true,
			'text-transform' => true,
			'all_styles'	 => true, // Enable all Google Font style/weight variations to be added to the page
			'units'			 => 'px', // Defaults to px.
			'default'		 => array(
				'font-size'		 => '16px',
				'line-height'	 => '31px',
				'font-family'	 => 'Poppins',
				'font-weight'	 => '400',
			),
			'output'		 => array( '.single-post article .entry-content, .single-post article .entry-content p' ),
			'compiler'		 => array( '.single-post article .entry-content, .single-post article .entry-content p' ),
		),
		array(
			'id'			 => 'font-blog-listing-title',
			'type'			 => 'typography',
			'title'			 => esc_html__( 'Blog Listing Title Font', '5th-avenue' ),
			'subtitle'		 => esc_html__( 'Specify the blog listing Title font properties.', '5th-avenue' ),
			'google'		 => true,
			'font-backup'	 => true,
			'text-align'	 => false,
			'color'			 => false,
			'letter-spacing' => true,
			'text-transform' => true,
			'all_styles'	 => true, // Enable all Google Font style/weight variations to be added to the page
			'units'			 => 'px', // Defaults to px.
			'default'		 => array(
				'font-size'		 => '33px',
				'line-height'	 => '36px',
				'font-family'	 => 'Cormorant Garamond',
				'font-weight'	 => '600',
			),
			'output'		 => array( '.blog-listing-wrap h2.entry-title, .search h2.entry-title' ),
			'compiler'		 => array( '.blog-listing-wrap h2.entry-title, .search h2.entry-title' ),
		),
		array(
			'id'			 => 'font-widget-title',
			'type'			 => 'typography',
			'title'			 => esc_html__( 'Widgets Title Font', '5th-avenue' ),
			'subtitle'		 => esc_html__( 'Specify the widgets title font properties.', '5th-avenue' ),
			'google'		 => true,
			'font-backup'	 => true,
			'text-align'	 => false,
			'color'			 => false,
			'letter-spacing' => true,
			'text-transform' => true,
			'all_styles'	 => true, // Enable all Google Font style/weight variations to be added to the page
			'units'			 => 'px', // Defaults to px.
			'default'		 => array(
				'font-size'		 => '16px',
				'line-height'	 => '22px',
				'font-family'	 => 'Poppins',
				'font-weight'	 => '600',
			),
			'output'		 => array( '.widget .widget-title, .widget_calendar caption, .AV5_Widget_Popular_Posts .widget--style-featured a.title, .AV5_Widget_Recent_Posts .widget--style-featured a.title', '.widgettitle' ),
			'compiler'		 => array( '.widget .widget-title, .widget_calendar caption, .AV5_Widget_Popular_Posts .widget--style-featured a.title, .AV5_Widget_Recent_Posts .widget--style-featured a.title', '.widgettitle' ),
		),
		array(
			'id'			 => 'font-hero-title',
			'type'			 => 'typography',
			'title'			 => esc_html__( 'Title area Heading Font', '5th-avenue' ),
			'subtitle'		 => esc_html__( 'Specify the font properties for headings in title areas.', '5th-avenue' ),
			'google'		 => true,
			'font-backup'	 => true,
			'text-align'	 => false,
			'color'			 => false,
			'letter-spacing' => true,
			'text-transform' => true,
			'all_styles'	 => true, // Enable all Google Font style/weight variations to be added to the page
			'units'			 => 'px', // Defaults to px.
			'default'		 => array(
				'font-size'		 => '72px',
				'line-height'	 => '78px',
				'font-family'	 => 'Cormorant Garamond',
				'font-weight'	 => '900',
			),
			'output'		 => array( '.title-area-wrap h1.entry-title' ),
			'compiler'		 => array( '.title-area-wrap h1.entry-title' ),
		),
		array(
			'id'			 => 'font-h1',
			'type'			 => 'typography',
			'title'			 => esc_html__( 'H1 Heading Font', '5th-avenue' ),
			'subtitle'		 => esc_html__( 'Specify the H1 Font properties.', '5th-avenue' ),
			'google'		 => true,
			'font-backup'	 => true,
			'text-align'	 => false,
			'color'			 => false,
			'letter-spacing' => true,
			'text-transform' => true,
			'all_styles'	 => true, // Enable all Google Font style/weight variations to be added to the page
			'units'			 => 'px', // Defaults to px.
			'default'		 => array(
				'font-size'		 => '48px',
				'font-family'	 => 'Cormorant Garamond',
				'font-weight'	 => '900',
			),
			'output'		 => array( 'h1', '.pswp__ui .pswp__counter', '.dropcap-letter.h1-dropcap' ),
			'compiler'		 => array( 'h1', '.pswp__ui .pswp__counter', '.dropcap-letter.h1-dropcap' ),
		),
		array(
			'id'			 => 'font-h2',
			'type'			 => 'typography',
			'title'			 => esc_html__( 'H2 Heading Font', '5th-avenue' ),
			'subtitle'		 => esc_html__( 'Specify the H2 Font properties.', '5th-avenue' ),
			'google'		 => true,
			'font-backup'	 => true,
			'text-align'	 => false,
			'color'			 => false,
			'letter-spacing' => true,
			'text-transform' => true,
			'all_styles'	 => true, // Enable all Google Font style/weight variations to be added to the page
			'units'			 => 'px', // Defaults to px.
			'default'		 => array(
				'font-size'		 => '36px',
				'font-family'	 => 'Cormorant Garamond',
				'font-weight'	 => '600',
			),
			'output'		 => array( 'h2', '.dropcap-letter.h2-dropcap', '.cart-empty', '.woocommerce-thankyou-order-received', '.owl-counter' ),
			'compiler'		 => array( 'h2', '.dropcap-letter.h2-dropcap', '.cart-empty', '.woocommerce-thankyou-order-received', '.owl-counter' ),
		),
		array(
			'id'			 => 'font-h3',
			'type'			 => 'typography',
			'title'			 => esc_html__( 'H3 Heading Font', '5th-avenue' ),
			'subtitle'		 => esc_html__( 'Specify the H3 Font properties.', '5th-avenue' ),
			'google'		 => true,
			'font-backup'	 => true,
			'text-align'	 => false,
			'color'			 => false,
			'letter-spacing' => true,
			'text-transform' => true,
			'all_styles'	 => true, // Enable all Google Font style/weight variations to be added to the page
			'units'			 => 'px', // Defaults to px.
			'default'		 => array(
				'font-size'		 => '30px',
				'font-family'	 => 'Cormorant Garamond',
				'font-weight'	 => '600',
			),
			'output'		 => array( 'h3', '.woocommerce-edit-account legend', '.woocommerce-loop-category__title', '.woocommerce #review_form #respond #reply-title', '.woocommerce div.product .woocommerce-tabs .panel h2', '.dropcap-letter.h3-dropcap', '.woocommerce-page .cart-collaterals .cart_totals h2', '.woocommerce .cart-collaterals .cart_totals h2' ),
			'compiler'		 => array( 'h3', '.woocommerce-edit-account legend', '.woocommerce-loop-category__title', '.woocommerce #review_form #respond #reply-title', '.woocommerce div.product .woocommerce-tabs .panel h2', '.dropcap-letter.h3-dropcap', '.woocommerce-page .cart-collaterals .cart_totals h2', '.woocommerce .cart-collaterals .cart_totals h2' ),
		),
		array(
			'id'			 => 'font-h4',
			'type'			 => 'typography',
			'title'			 => esc_html__( 'H4 Heading Font', '5th-avenue' ),
			'subtitle'		 => esc_html__( 'Specify the H4 Font properties.', '5th-avenue' ),
			'google'		 => true,
			'font-backup'	 => true,
			'text-align'	 => false,
			'color'			 => false,
			'letter-spacing' => true,
			'text-transform' => true,
			'all_styles'	 => true, // Enable all Google Font style/weight variations to be added to the page
			'units'			 => 'px', // Defaults to px.
			'default'		 => array(
				'font-size'		 => '26px',
				'font-family'	 => 'Cormorant Garamond',
				'font-weight'	 => '600',
			),
			'output'		 => array( 'h4' ),
			'compiler'		 => array( 'h4' ),
		),
		array(
			'id'			 => 'font-h5',
			'type'			 => 'typography',
			'title'			 => esc_html__( 'H5 Heading Font', '5th-avenue' ),
			'subtitle'		 => esc_html__( 'Specify the H5 Font properties.', '5th-avenue' ),
			'google'		 => true,
			'font-backup'	 => true,
			'text-align'	 => false,
			'color'			 => false,
			'letter-spacing' => true,
			'text-transform' => true,
			'all_styles'	 => true, // Enable all Google Font style/weight variations to be added to the page
			'units'			 => 'px', // Defaults to px.
			'default'		 => array(
				'font-size'		 => '22px',
				'font-family'	 => 'Cormorant Garamond',
				'font-weight'	 => '600',
			),
			'output'		 => array( 'h5' ),
			'compiler'		 => array( 'h5' ),
		),
		array(
			'id'			 => 'font-h6',
			'type'			 => 'typography',
			'title'			 => esc_html__( 'H6 Heading Font', '5th-avenue' ),
			'subtitle'		 => esc_html__( 'Specify the H6 Font properties.', '5th-avenue' ),
			'google'		 => true,
			'font-backup'	 => true,
			'text-align'	 => false,
			'color'			 => false,
			'letter-spacing' => true,
			'text-transform' => true,
			'all_styles'	 => true, // Enable all Google Font style/weight variations to be added to the page
			'units'			 => 'px', // Defaults to px.
			'default'		 => array(
				'font-size'		 => '18px',
				'font-family'	 => 'Cormorant Garamond',
				'font-weight'	 => '600',
			),
			'output'		 => array( 'h6' ),
			'compiler'		 => array( 'h6' ),
		),
		array(
			'id'			 => 'font-small-fancy',
			'type'			 => 'typography',
			'title'			 => esc_html__( 'Small Fancy Heading Font', '5th-avenue' ),
			'subtitle'		 => esc_html__( 'Specify the Small Fancy Heading Font properties.', '5th-avenue' ),
			'google'		 => true,
			'font-backup'	 => true,
			'text-align'	 => false,
			'color'			 => false,
			'letter-spacing' => true,
			'text-transform' => true,
			'all_styles'	 => true, // Enable all Google Font style/weight variations to be added to the page
			'units'			 => 'px', // Defaults to px.
			'default'		 => array(
				'font-size'		 => '12px',
				'font-family'	 => 'Montserrat',
				'letter-spacing' => '12px',
				'font-weight'	 => '400',
			),
			'output'		 => array( '.fancy-title--small h6', '.fancy-title--small p', '.fancy-title--small:not(.wpb_text_column)' ),
			'compiler'		 => array( '.fancy-title--small h6', '.fancy-title--small p', '.fancy-title--small:not(.wpb_text_column)' ),
		),
		array(
			'id'			 => 'font-main-menu',
			'type'			 => 'typography',
			'title'			 => esc_html__( 'Header Menu Font', '5th-avenue' ),
			'subtitle'		 => esc_html__( 'Specify the Header Menu font properties.', '5th-avenue' ),
			'google'		 => true,
			'font-backup'	 => true,
			'text-align'	 => false,
			'color'			 => false,
			'letter-spacing' => true,
			'text-transform' => true,
			'all_styles'	 => true, // Enable all Google Font style/weight variations to be added to the page
			'units'			 => 'px', // Defaults to px.
			'default'		 => array(
				'font-size'		 => '14px',
				'line-height'	 => '14px',
				'font-family'	 => 'Poppins',
				'font-weight'	 => '500',
			),
			'output'		 => array( '.main-navigation li > a', '.header__item__slide-out-menu .text', '#slide-out-menu-content--mobile ul > li > a' ),
			'compiler'		 => array( '.main-navigation li > a', '.header__item__slide-out-menu .text', '#slide-out-menu-content--mobile ul > li > a' ),
		),
		array(
			'id'			 => 'font-main-menu-drop',
			'type'			 => 'typography',
			'title'			 => esc_html__( 'Header SubMenu Font', '5th-avenue' ),
			'subtitle'		 => esc_html__( 'Specify the Submenu Font properties.', '5th-avenue' ),
			'google'		 => true,
			'font-backup'	 => true,
			'text-align'	 => false,
			'color'			 => false,
			'letter-spacing' => true,
			'text-transform' => true,
			'all_styles'	 => true, // Enable all Google Font style/weight variations to be added to the page
			'units'			 => 'px', // Defaults to px.
			'default'		 => array(
				'font-size'		 => '13px',
				'line-height'	 => '13px',
				'font-family'	 => 'Poppins',
				'font-weight'	 => '500',
			),
			'output'		 => array( '.main-navigation ul ul a' ),
			'compiler'		 => array( '.main-navigation ul ul a' ),
		),
		array(
			'id'			 => 'font-slideout-menu',
			'type'			 => 'typography',
			'title'			 => esc_html__( 'Slideout Menu Font', '5th-avenue' ),
			'google'		 => true,
			'font-backup'	 => true,
			'text-align'	 => false,
			'color'			 => true,
			'letter-spacing' => true,
			'text-transform' => true,
			'all_styles'	 => true, // Enable all Google Font style/weight variations to be added to the page
			'units'			 => 'px', // Defaults to px.
			'default'		 => array(
				'font-size'		 => '32px',
				'line-height'	 => '48px',
				'font-family'	 => 'Poppins',
				'font-weight'	 => '400',
			),
			'output'		 => array( '.av5-slide-out-modal .slide-out-menu-additional li.menu-item a' ),
			'compiler'		 => array( '.av5-slide-out-modal .slide-out-menu-additional li.menu-item a' ),
		),
		array(
			'id'			 => 'font-fullscreen-search',
			'type'			 => 'typography',
			'title'			 => esc_html__( 'Fullscreen Search Font', '5th-avenue' ),
			'subtitle'		 => esc_html__( 'Specify the Fullscreen Search Font properties.', '5th-avenue' ),
			'google'		 => true,
			'font-backup'	 => true,
			'text-align'	 => false,
			'color'			 => false,
			'letter-spacing' => true,
			'text-transform' => true,
			'all_styles'	 => true, // Enable all Google Font style/weight variations to be added to the page
			'units'			 => 'px', // Defaults to px.
			'default'		 => array(
				'font-size'		 => '48px',
				'font-family'	 => 'Georgia, serif',
				'font-weight'	 => '600',
			),
			'output'		 => array( '.av5-fullscreen-search .av5-search-bar input.av5-search-input', '.av5-slide-out-modal .av5-search-slideout .av5-search-bar form .av5-search-input' ),
			'compiler'		 => array( '.av5-fullscreen-search .av5-search-bar input.av5-search-input', '.av5-slide-out-modal .av5-search-slideout .av5-search-bar form .av5-search-input' ),
		),
		array(
			'id'			 => 'font-shop-page-title',
			'type'			 => 'typography',
			'title'			 => esc_html__( 'Shop page Product Title', '5th-avenue' ),
			'google'		 => true,
			'font-backup'	 => true,
			'text-align'	 => false,
			'color'			 => false,
			'letter-spacing' => true,
			'text-transform' => true,
			'all_styles'	 => true, // Enable all Google Font style/weight variations to be added to the page
			'units'			 => 'px', // Defaults to px.
			'default'		 => array(
				'font-size'		 => '30px',
				'font-family'	 => 'Cormorant',
				'font-weight'	 => '600',
			),
			'output'		 => array( '.widget_wishlist_content li.mini_wishlist_item > a', '.woocommerce-loop-product__title', '.woocommerce-mini-cart li a.av5-product-title', '.woocommerce table.cart .product-name a', '.woocommerce #content table.cart .product-name a' ),
			'compiler'		 => array( '.widget_wishlist_content li.mini_wishlist_item > a', '.woocommerce-loop-product__title', '.woocommerce-mini-cart li a.av5-product-title', '.woocommerce table.cart .product-name a', '.woocommerce #content table.cart .product-name a' ),
		),
		array(
			'id'			 => 'font-shop-page-price-addtocart',
			'type'			 => 'typography',
			'title'			 => esc_html__( 'Shop page Price and Add to Cart', '5th-avenue' ),
			'google'		 => true,
			'font-backup'	 => true,
			'text-align'	 => false,
			'color'			 => false,
			'letter-spacing' => true,
			'text-transform' => true,
			'all_styles'	 => true, // Enable all Google Font style/weight variations to be added to the page
			'units'			 => 'px', // Defaults to px.
			'default'		 => array(
				'font-size'		 => '18px',
				'font-family'	 => 'Cormorant',
				'font-weight'	 => '700',
			),
			'output'		 => array( '.product-after-shop-loop', '.woocommerce .product-after-shop-loop a.button', '.product-after-shop-loop a.button', '.woocommerce div.product .product-after-shop-loop .price' ),
			'compiler'		 => array( '.product-after-shop-loop', '.woocommerce .product-after-shop-loop a.button', '.product-after-shop-loop a.button', '.woocommerce div.product .product-after-shop-loop .price' ),
		),
		array(
			'id'			 => 'font-product-page-title',
			'type'			 => 'typography',
			'title'			 => esc_html__( 'Product page Product Title', '5th-avenue' ),
			'google'		 => true,
			'font-backup'	 => true,
			'text-align'	 => false,
			'color'			 => false,
			'letter-spacing' => true,
			'text-transform' => true,
			'all_styles'	 => true, // Enable all Google Font style/weight variations to be added to the page
			'units'			 => 'px', // Defaults to px.
			'default'		 => array(
				'font-size'		 => '36px',
				'line-height'	 => '36px',
				'font-family'	 => 'Cormorant',
				'font-weight'	 => '600',
			),
			'output'		 => array( '.woocommerce-page div.product .product_title', '.single-product div.product h1.product_title', '.woocommerce div.product .product_title' ),
			'compiler'		 => array( '.woocommerce-page div.product .product_title', '.single-product div.product h1.product_title', '.woocommerce div.product .product_title' ),
		),
		array(
			'id'			 => 'font-product-page-price-addtocart',
			'type'			 => 'typography',
			'title'			 => esc_html__( 'Product page Price', '5th-avenue' ),
			'google'		 => true,
			'font-backup'	 => true,
			'text-align'	 => false,
			'color'			 => false,
			'letter-spacing' => true,
			'text-transform' => true,
			'all_styles'	 => true, // Enable all Google Font style/weight variations to be added to the page
			'units'			 => 'px', // Defaults to px.
			'default'		 => array(
				'font-size'		 => '26px',
				'font-family'	 => 'Vidaloka',
				'font-weight'	 => '400',
			),
			'output'		 => array( '.woocommerce div.product .price', '.woocommerce .product-bar .price' ),
			'compiler'		 => array( '.woocommerce div.product .price', '.woocommerce .product-bar .price' ),
		),
	),
);

$theme_option_sections['fonts-responsive'] = array(
'title'	 => esc_html__( 'Fonts Resposive', '5th-avenue' ),
'id'				 => 'fonts-responsive',
'subsection'		 => true,
'customizer_width'	 => '450px',
'fields' => array(
		array(
			'id'		 => 'fonts-tablet-h1-hero',
			'type'		 => 'text',
			'title'		 => esc_html__( 'Title area Heading Font tablet', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Set Page Headings font size for tablet (max width 1024), only number no units', '5th-avenue' ),
			'default'	 => '60',
		),
		array(
			'id'		 => 'fonts-tablet-h1',
			'type'		 => 'text',
			'title'		 => esc_html__( 'H1 tablet', '5th-avenue' ),
			'subtitle'		 => esc_html__( 'Set H1 fonts size for tablet (max width 1024), only number no units', '5th-avenue' ),
			'default'	 => '60',
		),
		array(
			'id'		 => 'fonts-tablet-h2',
			'type'		 => 'text',
			'title'		 => esc_html__( 'H2 tablet', '5th-avenue' ),
			'subtitle'		 => esc_html__( 'Set H2 fonts size for tablet (max width 1024), only number no units', '5th-avenue' ),
			'default'	 => '44',
		),
		array(
			'id'		 => 'fonts-tablet-h3',
			'type'		 => 'text',
			'title'		 => esc_html__( 'H3 tablet', '5th-avenue' ),
			'subtitle'		 => esc_html__( 'Set H3 fonts size for tablet (max width 1024), only number no units', '5th-avenue' ),
			'default'	 => '34',
		),
		array(
			'id'		 => 'fonts-tablet-h4',
			'type'		 => 'text',
			'title'		 => esc_html__( 'H4 tablet', '5th-avenue' ),
			'subtitle'		 => esc_html__( 'Set H4 fonts size for tablet (max width 1024), only number no units', '5th-avenue' ),
			'default'	 => '22',
		),
		array(
			'id'		 => 'fonts-tablet-h5',
			'type'		 => 'text',
			'title'		 => esc_html__( 'H5 tablet', '5th-avenue' ),
			'subtitle'		 => esc_html__( 'Set H5 fonts size for tablet (max width 1024), only number no units', '5th-avenue' ),
			'default'	 => '20',
		),
		array(
			'id'		 => 'fonts-mobile-h1-hero',
			'type'		 => 'text',
			'title'		 => esc_html__( 'Title area Heading Font mobile', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Set Page Headings font size for mobile (max width 767), only number no units', '5th-avenue' ),
			'default'	 => '48',
		),
		array(
			'id'		 => 'fonts-mobile-h1',
			'type'		 => 'text',
			'title'		 => esc_html__( 'H1 mobile', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Set H1 fonts size for mobile (max width 767), only number no units', '5th-avenue' ),
			'default'	 => '46',
		),
		array(
			'id'		 => 'fonts-mobile-h2',
			'type'		 => 'text',
			'title'		 => esc_html__( 'H2 mobile', '5th-avenue' ),
			'subtitle'		 => esc_html__( 'Set H2 fonts size for mobile (max width 767), only number no units', '5th-avenue' ),
			'default'	 => '36',
		),
		array(
			'id'		 => 'fonts-mobile-h3',
			'type'		 => 'text',
			'title'		 => esc_html__( 'H3 mobile', '5th-avenue' ),
			'subtitle'		 => esc_html__( 'Set H3 fonts size for mobile (max width 767), only number no units', '5th-avenue' ),
			'default'	 => '30',
		),
		array(
			'id'		 => 'fonts-mobile-h4',
			'type'		 => 'text',
			'title'		 => esc_html__( 'H4 mobile', '5th-avenue' ),
			'subtitle'		 => esc_html__( 'Set H4 fonts size for mobile (max width 767), only number no units', '5th-avenue' ),
			'default'	 => '20',
		),
		array(
			'id'		 => 'fonts-mobile-h5',
			'type'		 => 'text',
			'title'		 => esc_html__( 'H5 mobile', '5th-avenue' ),
			'subtitle'		 => esc_html__( 'Set H5 fonts size for mobile (max width 767), only number no units', '5th-avenue' ),
			'default'	 => '18',
		),
		array(
			'id'		 => 'fonts-xsmobile-h1',
			'type'		 => 'text',
			'title'		 => esc_html__( 'H1 xs mobile', '5th-avenue' ),
			'subtitle'		 => esc_html__( 'Set H1 fonts size for xs mobile (max width 480), only number no units', '5th-avenue' ),
			'default'	 => '38',
		),
		array(
			'id'		 => 'fonts-xsmobile-h2',
			'type'		 => 'text',
			'title'		 => esc_html__( 'H2 xs mobile', '5th-avenue' ),
			'subtitle'		 => esc_html__( 'Set H2 fonts size for xs mobile (max width 480), only number no units', '5th-avenue' ),
			'default'	 => '30',
		),
		array(
			'id'		 => 'fonts-xsmobile-h3',
			'type'		 => 'text',
			'title'		 => esc_html__( 'H3 xs mobile', '5th-avenue' ),
			'subtitle'		 => esc_html__( 'Set H3 fonts size for xs mobile (max width 480), only number no units', '5th-avenue' ),
			'default'	 => '23',
		),
		array(
			'id'		 => 'fonts-xsmobile-h4',
			'type'		 => 'text',
			'title'		 => esc_html__( 'H4 xs mobile', '5th-avenue' ),
			'subtitle'		 => esc_html__( 'Set H4 fonts size for xs mobile (max width 480), only number no units', '5th-avenue' ),
			'default'	 => '20',
		),
	),
);
