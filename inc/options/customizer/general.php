<?php
/**
 * General option theme for cutomizer
 *
 * @package           5th-Avenue\Option
 * @subpackage        Redux
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

Kirki::add_panel( 'general_panel', array(
	'priority'		 => 10,
	'title'			 => esc_html__( 'General', '5th-avenue' ),
	'description'	 => esc_html__( 'My Description is here', '5th-avenue' ),
) );

/* GENERAL > BACKGROUND --------------------------------- */

Kirki::add_section( 'av5_background_settings', array(
	'priority'	 => 11,
	'title'		 => esc_html__( 'Website Background', '5th-avenue' ),
	'panel'		 => 'general_panel',
) );

Kirki::add_field( 'av5_theme', array(
	'type'			 => 'background',
	'settings'		 => 'general_website_background',
	'label'			 => esc_html__( 'Website Background', '5th-avenue' ),
	'description'	 => esc_html__( 'Background outside the content area if boxed layout is selected', '5th-avenue' ),
	'section'		 => 'av5_background_settings',
	'default'		 => array(
		'background-color'		 => '#ffffff',
		'background-image'		 => '',
		'background-repeat'		 => 'no-repeat',
		'background-position'	 => 'left-top',
		'background-size'		 => 'cover',
		'background-attachment'	 => 'scroll',
	),
	'priority'		 => 10,
	'output'		 => array(
		array(
			'element'	 => 'body, .site-content',
			'property'	 => 'background',
		),
	),
	'transport'		 => 'postMessage',
	'js_vars'		 => array(
		array(
			'element'	 => 'body, .site-content',
			'function'	 => 'css',
			'property'	 => 'background',
		),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'			 => 'background',
	'settings'		 => 'general_boxed_website_background',
	'label'			 => esc_html__( 'Boxed Layout Content Background', '5th-avenue' ),
	'description'	 => esc_html__( 'Content area background for boxed layout.', '5th-avenue' ),
	'section'		 => 'av5_background_settings',
	'default'		 => array(
		'background-color'		 => '#ffffff',
		'background-image'		 => '',
		'background-repeat'		 => 'no-repeat',
		'background-position'	 => 'left-top',
		'background-size'		 => 'cover',
		'background-attachment'	 => 'fixed',
	),
	'priority'		 => 10,
	'output'		 => array(
		array(
			'element'	 => 'body.layout-boxed .site-content',
			'property'	 => 'background',
		),
	),
	'transport'		 => 'postMessage',
	'js_vars'		 => array(
		array(
			'element'	 => 'body.layout-boxed .site-content',
			'function'	 => 'css',
			'property'	 => 'background',
		),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'			 => 'color',
	'settings'		 => 'general_passportout_frame_color',
	'label'			 => esc_html__( 'Passepartout Frame Color', '5th-avenue' ),
	'description'	 => esc_html__( 'Color of the border around the page for Ppassepartout website layout.', '5th-avenue' ),
	'section'		 => 'av5_background_settings',
	'default'		 => '#fff',
	'priority'		 => 10,
	'output'		 => array(
		array(
			'element'	 => 'body.layout-passepartout .passepartout-wrap, .body.layout-passepartout',
			'property'	 => 'background-color',
		),
	),
	'transport'		 => 'postMessage',
	'js_vars'		 => array(
		array(
			'element'	 => 'body.layout-passepartout .passepartout-wrap, .body.layout-passepartout',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );
Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color',
	'settings'	 => 'general_modals_background',
	'label'		 => esc_html__( 'Fullscreen modal Background Color', '5th-avenue' ),
	'section'	 => 'av5_background_settings',
	'default'	 => '#ffffff',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.av5-overlay-modal:not(.av5-overlay-quickview-small):not(.av5-overlay-video-content-small) .av5-overlay-wrap',
			'property'	 => 'background-color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.av5-overlay-modal:not(.av5-overlay-quickview-small):not(.av5-overlay-video-content-small) .av5-overlay-wrap',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );

/* GENERAL > STYLES --------------------------------- */

Kirki::add_section( 'av5_styles_settings', array(
	'priority'	 => 12,
	'title'		 => esc_html__( 'Styles', '5th-avenue' ),
	'panel'		 => 'general_panel',
) );

/* Main Colors */

Kirki::add_field( 'av5_styles_colors_title', array(
	'type'		 => 'custom',
	'settings'	 => 'custom_title_general_styles_colors',
	'label'		 => '',
	'section'	 => 'av5_styles_settings',
	'default'	 => '<div class="options-title-divider">Main Colors</div>',
) );
Kirki::add_field( 'av5_theme', array(
	'type'		 => 'switch',
	'settings'	 => 'general_vertical_line',
	'label'		 => esc_html__( 'Show vertical line above headings across website.', '5th-avenue' ),
	'section'	 => 'av5_styles_settings',
	'default'	 => 0,
	'priority'	 => 10,
) );
Kirki::add_field( 'av5_theme', array(
	'type'			 => 'color',
	'settings'		 => 'general_text_color',
	'label'			 => esc_html__( 'Text Color', '5th-avenue' ),
	'description'	 => esc_html__( 'Website (body) text color', '5th-avenue' ),
	'section'		 => 'av5_styles_settings',
	'default'		 => '#9e9e9e',
	'priority'		 => 10,
	'output'		 => array(
		array(
			'element'	 => 'body, button, input, select, textarea',
			'property'	 => 'color',
		),
	),
	'transport'		 => 'postMessage',
	'js_vars'		 => array(
		array(
			'element'	 => 'body, button, input, select, textarea',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'general_headings_color',
	'label'		 => esc_html__( 'Headings Color', '5th-avenue' ),
	'section'	 => 'av5_styles_settings',
	'default'	 => '#000000',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => array( 'h1', '.pswp__ui .pswp__counter' ),
			'property'	 => 'color',
		),
		array(
			'element'	 => 'h2, .owl-conter-current, .cart-empty, .av5-fullscreen-search .av5-search-bar input.av5-search-input, .av5-slide-out-modal .av5-search-slideout .av5-search-bar form .av5-search-input, .av5-fullscreen-search button, .av5-fullscreen-search button:hover',
			'property'	 => 'color',
		),
		array(
			'element'	 => 'h3, .woocommerce-edit-account legend, .woocommerce-thankyou-order-received, .woocommerce-thankyou-order-details li, .woocommerce table.shop_table th, .woocommerce-page table.shop_table th, .woocommerce .shop_table.woocommerce-checkout-review-order-table tbody td',
			'property'	 => 'color',
		),
		array(
			'element'	 => 'h4, strong, .woocommerce-page table.cart .product-subtotal, .woocommerce table.cart .product-subtotal',
			'property'	 => 'color',
		),
		array(
			'element'	 => 'h5',
			'property'	 => 'color',
		),
		array(
			'element'	 => 'h6',
			'property'	 => 'color',
		),
		array(
			'element'	 => '.woocommerce #review_form #respond #reply-title, .woocommerce div.product .woocommerce-tabs .panel h2',
			'property'	 => 'color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => array( 'h1', '.pswp__ui .pswp__counter' ),
			'function'	 => 'css',
			'property'	 => 'color',
		),
		array(
			'element'	 => 'h2, .owl-conter-current, .cart-empty, .av5-fullscreen-search .av5-search-bar input.av5-search-input, .av5-slide-out-modal .av5-search-slideout .av5-search-bar form .av5-search-input, .av5-fullscreen-search button, .av5-fullscreen-search button:hover',
			'function'	 => 'css',
			'property'	 => 'color',
		),
		array(
			'element'	 => 'h3, .woocommerce-edit-account legend, .woocommerce-thankyou-order-received, .woocommerce-thankyou-order-details li, .woocommerce table.shop_table th, .woocommerce-page table.shop_table th, .woocommerce .shop_table.woocommerce-checkout-review-order-table tbody td ',
			'function'	 => 'css',
			'property'	 => 'color',
		),
		array(
			'element'	 => 'h4, strong, .woocommerce-page table.cart .product-subtotal, .woocommerce table.cart .product-subtotal',
			'function'	 => 'css',
			'property'	 => 'color',
		),
		array(
			'element'	 => 'h5',
			'function'	 => 'css',
			'property'	 => 'color',
		),
		array(
			'element'	 => 'h6',
			'function'	 => 'css',
			'property'	 => 'color',
		),
		array(
			'element'	 => '.woocommerce #review_form #respond #reply-title, .woocommerce div.product .woocommerce-tabs .panel h2',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );


Kirki::add_field( 'av5_theme', array(
	'type'			 => 'color-alpha',
	'settings'		 => 'general_subheadings_color',
	'label'			 => esc_html__( 'Subheadings Color', '5th-avenue' ),
	'description'	 => esc_html__( 'Small headings i.e. above main heading in title area.', '5th-avenue' ),
	'section'		 => 'av5_styles_settings',
	'default'		 => '#000000',
	'priority'		 => 10,
	'output'		 => array(
		array(
			'element'	 => '.page-heading--subtitle',
			'property'	 => 'color',
		),
	),
	'transport'		 => 'postMessage',
	'js_vars'		 => array(
		array(
			'element'	 => '.page-heading--subtitle',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'			 => 'color-alpha',
	'settings'		 => 'general_accent_color',
	'label'			 => esc_html__( 'Small accent Color', '5th-avenue' ),
	'description'	 => esc_html__( 'Blog listing and widget categories, blockquites, calendar selected date, etc.', '5th-avenue' ),
	'section'		 => 'av5_styles_settings',
	'default'		 => '#b8956d',
	'priority'		 => 10,
	'output'		 => array(
		array(
			'element'	 => '.widget_calendar table tr #today, .single-post article .entry-content blockquote p, blockquote p, blockquote, .widget.AV5_Widget_Recent_Posts .post-categories a, .widget.AV5_Widget_Popular_Posts .post-categories a, .blog-listing-wrap .single-post-cats a, .blog-listing-wrap .single-post-cats, .blog-listing-wrap .blog-listing-meta a, .blog-listing-wrap .blog-listing-meta',
			'property'	 => 'color',
		),
		array(
			'element'	 => '.page-heading-text > .single-post-cats .post-categories li a, .widget_calendar tbody td a',
			'property'	 => 'background-color',
		),
	),
	'transport'		 => 'postMessage',
	'js_vars'		 => array(
		array(
			'element'	 => '.product-navigation .product-navigation-previous i:before, .widget_calendar table tr #today, .single-post article .entry-content blockquote p, blockquote p, blockquote, .widget.AV5_Widget_Recent_Posts .post-categories a, .widget.AV5_Widget_Popular_Posts .post-categories a, .blog-listing-wrap .single-post-cats a, .blog-listing-wrap .single-post-cats, .blog-listing-wrap .blog-listing-meta a, .blog-listing-wrap .blog-listing-meta',
			'function'	 => 'css',
			'property'	 => 'color',
		),
		array(
			'element'	 => '.page-heading-text > .single-post-cats .post-categories li a, .widget_calendar tbody td a',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );
/* elements arrows cross etc. */
Kirki::add_field( 'av5_theme', array(
	'type'			 => 'color-alpha',
	'settings'		 => 'general_small_elements_color',
	'label'			 => esc_html__( 'Small elements color', '5th-avenue' ),
	'description'	 => esc_html__( 'Small elements like arrows, crosses, etc.', '5th-avenue' ),
	'section'		 => 'av5_styles_settings',
	'default'		 => '#000000',
	'priority'		 => 10,
	'output'		 => array(
		array(
			'element'	 => '#toTop .line, .next-prev-navigation .line, .up-sells.products .products > .owl-nav .line, .related.products .products > .owl-nav .line, .wpb-js-composer .vc_tta.vc_general.av5-tab-underlined .vc_tta-tab > a:before, .wpb-js-composer .av5-tab-underlined .vc_tta-tab > a:before, ul.av5-list__style--lines li:before, .av5-list__style--lines ul li:before, .product-navigation i:after, .widget_product_search .woocommerce-product-search .search-submit span, .widget_search .search-submit span, .vc_toggle_simple .vc_toggle_icon::after, .vc_toggle_simple .vc_toggle_icon::before,.vc_toggle_round.vc_toggle_color_inverted .vc_toggle_icon::after, .vc_toggle_round.vc_toggle_color_inverted .vc_toggle_icon::before,.vc_toggle_round.vc_toggle_color_inverted .vc_toggle_icon::after, .vc_toggle_round.vc_toggle_color_inverted .vc_toggle_icon::before, .av5-carousel-thumbnails-wrapper + .preview-carousel-dots li, .owl-nav .line, .slideout_close .line, .av5-overlay-modal .av5-overlay-close::after, .av5-overlay-modal .av5-overlay-close::before, .av5-slide-out-modal .big_cross_icon:after, .av5-slide-out-modal .big_cross_icon:before, .owl-carousel.owl-product-thumbnail-vertical .owl-item:before, .av5-carousel-thumbnails-wrapper .line, .av5-product-carousel-shortcode .av5-carousel-thumbnails-wrapper .line',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => '.next-arrow line',
			'property'	 => 'stroke',
		),
		array(
			'element'	 => '.wpb-js-composer .vc_tta.vc_general.av5-tab-underlined .vc_tta-tab.vc_active>a, .av5-product-share li a, .av5-fullscreen-search button > i, .product-navigation  i:before, .widget_search .search-submit, .widget_product_search .woocommerce-product-search button, .av5-slide-out-modal .av5_woocommerce_mini_cart_drop a.slideout_close, .av5-slide-out-modal .av5_woocommerce_mini_cart_drop a.slideout_close:hover',
			'property'	 => 'color',
		),
		array(
			'element'	 => '.woocommerce-checkout-review-order .woocommerce-checkout-payment, .vc_toggle_round.vc_toggle_color_inverted .vc_toggle_icon, .vc_toggle.vc_toggle_arrow .vc_toggle_icon::after, .vc_toggle.vc_toggle_arrow .vc_toggle_icon::before',
			'property'	 => 'border-color',
		),
	),
	'transport'		 => 'postMessage',
	'js_vars'		 => array(
		array(
			'element'	 => '#toTop .line, .next-prev-navigation .line, .up-sells.products .products > .owl-nav .line, .related.products .products > .owl-nav .line, .wpb-js-composer .vc_tta.vc_general.av5-tab-underlined .vc_tta-tab > a:before, .wpb-js-composer .av5-tab-underlined .vc_tta-tab > a:before, ul.av5-list__style--lines li:before, .av5-list__style--lines ul li:before, .product-navigation i:after, .widget_product_search .woocommerce-product-search .search-submit span, .widget_search .search-submit span, .vc_toggle_simple .vc_toggle_icon::after, .vc_toggle_simple .vc_toggle_icon::before,.vc_toggle_round.vc_toggle_color_inverted .vc_toggle_icon::after, .vc_toggle_round.vc_toggle_color_inverted .vc_toggle_icon::before, .vc_toggle_round.vc_toggle_color_inverted .vc_toggle_icon::after, .vc_toggle_round.vc_toggle_color_inverted .vc_toggle_icon::before, .av5-carousel-thumbnails-wrapper + .preview-carousel-dots li, .owl-nav .line, .slideout_close .line, .av5-overlay-modal .av5-overlay-close::after, .av5-overlay-modal .av5-overlay-close::before, .av5-slide-out-modal .big_cross_icon:after, .av5-slide-out-modal .big_cross_icon:before, .owl-carousel.owl-product-thumbnail-vertical .owl-item:before, .av5-carousel-thumbnails-wrapper .line, .av5-product-carousel-shortcode .av5-carousel-thumbnails-wrapper .line',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => '.next-arrow line',
			'function'	 => 'css',
			'property'	 => 'stroke',
		),
		array(
			'element'	 => '.wpb-js-composer .vc_tta.vc_general.av5-tab-underlined .vc_tta-tab.vc_active>a, .av5-product-share li a, .av5-fullscreen-search button > i, .product-navigation i:before, .widget_search .search-submit, .widget_product_search .woocommerce-product-search button,.av5-slide-out-modal .av5_woocommerce_mini_cart_drop a.slideout_close, .av5-slide-out-modal .av5_woocommerce_mini_cart_drop a.slideout_close:hover',
			'function'	 => 'css',
			'property'	 => 'color',
		),
		array(
			'element'	 => '.woocommerce-checkout-review-order .woocommerce-checkout-payment, .vc_toggle_round.vc_toggle_color_inverted .vc_toggle_icon, .vc_toggle.vc_toggle_arrow .vc_toggle_icon::after, .vc_toggle.vc_toggle_arrow .vc_toggle_icon::before',
			'function'	 => 'css',
			'property'	 => 'border-color',
		),
	),
) );
/* Buttons */

Kirki::add_field( 'av5_styles_buttons_title', array(
	'type'		 => 'custom',
	'settings'	 => 'custom_title_general_styles_buttons',
	'label'		 => '',
	'section'	 => 'av5_styles_settings',
	'default'	 => '<div class="options-title-divider">Buttons</div>',
) );
Kirki::add_field( 'av5_theme', array(
	'type'		 => 'switch',
	'settings'	 => 'general_primary_shadow_hover',
	'label'		 => esc_html__( 'Primary Button Shadow on Hover', '5th-avenue' ),
	'section'	 => 'av5_styles_settings',
	'default'	 => 0,
	'priority'	 => 10,
) );
Kirki::add_field( 'av5_theme', array(
	'type'				 => 'color-alpha',
	'settings'			 => 'general_primary_button_shadow_color',
	'label'				 => esc_html__( 'Primary Button Shadow Color', '5th-avenue' ),
	'section'			 => 'av5_styles_settings',
	'default'			 => 'rgba(0, 0, 0, 0.3)',
	'priority'			 => 10,
	'transport'			 => 'postMessage',
	'output'			 => array(
		array(
			'element'	 => '.buttons-primary__shadow-hover .woocommerce #respond input#submit:hover, .buttons-primary__shadow-hover .woocommerce a.button:hover, .buttons-primary__shadow-hover .woocommerce button.button:hover,.buttons-primary__shadow-hover .woocommerce input.button:hover,.woocommerce.buttons-primary__shadow-hover #respond input#submit:hover,.woocommerce.buttons-primary__shadow-hover a.button:hover, .woocommerce.buttons-primary__shadow-hover button.button:hover,.woocommerce.buttons-primary__shadow-hover input.button:hover,.buttons-primary__shadow-hover button:hover,.buttons-primary__shadow-hover .button:hover,.buttons-primary__shadow-hover a.button:hover,.buttons-primary__shadow-hover input[type="button"]:hover,.buttons-primary__shadow-hover input[type="reset"]:hover,.buttons-primary__shadow-hover input[type="submit"]:hover,.av5-btn--shadow-hover-colored:hover',
			'property'	 => 'box-shadow',
			'prefix'	 => '0 15px 45px 0px ',
		),
		array(
			'element'	 => '.buttons-primary__shadow-hover .woocommerce #respond input#submit:hover, .buttons-primary__shadow-hover .woocommerce a.button:hover, .buttons-primary__shadow-hover .woocommerce button.button:hover, .buttons-primary__shadow-hover .woocommerce input.button:hover,.woocommerce.buttons-primary__shadow-hover #respond input#submit:hover, .woocommerce.buttons-primary__shadow-hover a.button:hover, .woocommerce.buttons-primary__shadow-hover button.button:hover, .woocommerce.buttons-primary__shadow-hover input.button:hover,.buttons-primary__shadow-hover button:hover,.buttons-primary__shadow-hover .button:hover,.buttons-primary__shadow-hover a.button:hover,.buttons-primary__shadow-hover input[type="button"]:hover,.buttons-primary__shadow-hover input[type="reset"]:hover,.buttons-primary__shadow-hover input[type="submit"]:hover,.av5-btn--shadow-hover-colored:hover',
			'property'	 => '-webkit-box-shadow',
			'prefix'	 => '0 15px 45px 0px ',
		),
		array(
			'element'	 => '.buttons-primary__shadow-hover .woocommerce #respond input#submit:hover, .buttons-primary__shadow-hover .woocommerce a.button:hover, .buttons-primary__shadow-hover .woocommerce button.button:hover, .buttons-primary__shadow-hover .woocommerce input.button:hover,.woocommerce.buttons-primary__shadow-hover #respond input#submit:hover, .woocommerce.buttons-primary__shadow-hover a.button:hover, .woocommerce.buttons-primary__shadow-hover button.button:hover, .woocommerce.buttons-primary__shadow-hover input.button:hover,.buttons-primary__shadow-hover button:hover,.buttons-primary__shadow-hover .button:hover,.buttons-primary__shadow-hover a.button:hover,.buttons-primary__shadow-hover input[type="button"]:hover,.buttons-primary__shadow-hover input[type="reset"]:hover,.buttons-primary__shadow-hover input[type="submit"]:hover,.av5-btn--shadow-hover-colored:hover',
			'property'	 => '-moz-box-shadow',
			'prefix'	 => '0 15px 45px 0px ',
		),
	),
	'js_vars'			 => array(
		array(
			'element'	 => '.buttons-primary__shadow-hover .woocommerce #respond input#submit:hover, .buttons-primary__shadow-hover .woocommerce a.button:hover, .buttons-primary__shadow-hover .woocommerce button.button:hover,.buttons-primary__shadow-hover .woocommerce input.button:hover,.woocommerce.buttons-primary__shadow-hover #respond input#submit:hover,.woocommerce.buttons-primary__shadow-hover a.button:hover, .woocommerce.buttons-primary__shadow-hover button.button:hover,.woocommerce.buttons-primary__shadow-hover input.button:hover,.buttons-primary__shadow-hover button:hover,.buttons-primary__shadow-hover .button:hover,.buttons-primary__shadow-hover a.button:hover,.buttons-primary__shadow-hover input[type="button"]:hover,.buttons-primary__shadow-hover input[type="reset"]:hover,.buttons-primary__shadow-hover input[type="submit"]:hover,.av5-btn--shadow-hover-colored:hover',
			'property'	 => 'box-shadow',
			'prefix'	 => '0 15px 45px 0px ',
		),
		array(
			'element'	 => '.buttons-primary__shadow-hover .woocommerce #respond input#submit:hover, .buttons-primary__shadow-hover .woocommerce a.button:hover, .buttons-primary__shadow-hover .woocommerce button.button:hover, .buttons-primary__shadow-hover .woocommerce input.button:hover,.woocommerce.buttons-primary__shadow-hover #respond input#submit:hover, .woocommerce.buttons-primary__shadow-hover a.button:hover, .woocommerce.buttons-primary__shadow-hover button.button:hover, .woocommerce.buttons-primary__shadow-hover input.button:hover,.buttons-primary__shadow-hover button:hover,.buttons-primary__shadow-hover .button:hover,.buttons-primary__shadow-hover a.button:hover,.buttons-primary__shadow-hover input[type="button"]:hover,.buttons-primary__shadow-hover input[type="reset"]:hover,.buttons-primary__shadow-hover input[type="submit"]:hover,.av5-btn--shadow-hover-colored:hover',
			'property'	 => '-webkit-box-shadow',
			'prefix'	 => '0 15px 45px 0px ',
		),
		array(
			'element'	 => '.buttons-primary__shadow-hover .woocommerce #respond input#submit:hover, .buttons-primary__shadow-hover .woocommerce a.button:hover, .buttons-primary__shadow-hover .woocommerce button.button:hover, .buttons-primary__shadow-hover .woocommerce input.button:hover,.woocommerce.buttons-primary__shadow-hover #respond input#submit:hover, .woocommerce.buttons-primary__shadow-hover a.button:hover, .woocommerce.buttons-primary__shadow-hover button.button:hover, .woocommerce.buttons-primary__shadow-hover input.button:hover,.buttons-primary__shadow-hover button:hover,.buttons-primary__shadow-hover .button:hover,.buttons-primary__shadow-hover a.button:hover,.buttons-primary__shadow-hover input[type="button"]:hover,.buttons-primary__shadow-hover input[type="reset"]:hover,.buttons-primary__shadow-hover input[type="submit"]:hover,.av5-btn--shadow-hover-colored:hover',
			'property'	 => '-moz-box-shadow',
			'prefix'	 => '0 15px 45px 0px ',
		),
	),
	'active_callback'	 => array(
		array(
			'setting'	 => 'general_primary_shadow_hover',
			'operator'	 => '==',
			'value'		 => true,
		),
	),
) );


Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'general_primary_button_color',
	'label'		 => esc_html__( 'Primary Button Color', '5th-avenue' ),
	'section'	 => 'av5_styles_settings',
	'default'	 => '#222222',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => 'button, .button, .entry-content .button, .entry-content a.button, a.button, input[type="button"], input[type="reset"], input[type="submit"], .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button',
			'property'	 => 'border-color',
		),
		array(
			'element'	 => 'button, .button, .entry-content .button, .entry-content a.button, a.button, input[type="button"], input[type="reset"], input[type="submit"], .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, a.button:after',
			'property'	 => 'background-color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => 'button, .button, .entry-content .button, .entry-content a.button, a.button, input[type="button"], input[type="reset"], input[type="submit"], .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button',
			'function'	 => 'css',
			'property'	 => 'border-color',
		),
		array(
			'element'	 => array( 'button', '.button', '.entry-content .button', '.entry-content a.button', 'a.button, input[type="button"]', 'input[type="reset"]', 'input[type="submit"]', '.woocommerce #respond input#submit', '.woocommerce a.button', '.woocommerce button.button', '.woocommerce input.button', 'a.button:after' ),
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'general_primary_button_text_color',
	'label'		 => esc_html__( 'Primary Button Text Color', '5th-avenue' ),
	'section'	 => 'av5_styles_settings',
	'default'	 => '#ffffff',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => 'button, .button, .entry-content .button, .entry-content a.button, a.button, input[type="button"], input[type="reset"], input[type="submit"], .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button',
			'property'	 => 'color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => array( 'button, .button', '.entry-content .button', '.entry-content a.button', 'a.button, input[type="button"]', 'input[type="reset"]', 'input[type="submit"]', '.woocommerce #respond input#submit', '.woocommerce a.button', '.woocommerce button.button', '.woocommerce input.button' ),
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'general_primary_button_hover_color',
	'label'		 => esc_html__( 'Primary Button Hover Color', '5th-avenue' ),
	'section'	 => 'av5_styles_settings',
	'default'	 => '#b8a286',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => 'button:hover, .button:hover,.entry-content .button:hover, .entry-content a.button:hover, a.button:hover,  input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover',
			'property'	 => 'border-color',
		),
		array(
			'element'	 => 'button:hover, .button:hover,.entry-content .button:hover, .entry-content a.button:hover, a.button:hover,  input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, a.button:hover:after, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover',
			'property'	 => 'background-color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => 'button:hover, .button:hover,.entry-content .button:hover, .entry-content a.button:hover, a.button:hover,  input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover',
			'function'	 => 'css',
			'property'	 => 'border-color',
		),
		array(
			'element'	 => 'button:hover, .button:hover,.entry-content .button:hover, .entry-content a.button:hover, a.button:hover,  input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, a.button:hover:after, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );
Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'general_primary_button_text_hover_color',
	'label'		 => esc_html__( 'Primary Button Text Hover Color', '5th-avenue' ),
	'section'	 => 'av5_styles_settings',
	'default'	 => '#ffffff',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => 'button:hover, .button:hover,.entry-content .button:hover, .entry-content a.button:hover, a.button:hover,  input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover',
			'property'	 => 'color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => 'button:hover, .button:hover,.entry-content .button:hover, .entry-content a.button:hover, a.button:hover,  input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'			 => 'select',
	'settings'		 => 'general_secondary_button_styles',
	'label'			 => esc_html__( 'Secondary Button Style', '5th-avenue' ),
	'description'	 => esc_html__( 'Set style for all Secondary buttons across website.', '5th-avenue' ),
	'help'			 => '',
	'section'		 => 'av5_styles_settings',
	'default'		 => 'underlined',
	'priority'		 => 10,
	'choices'		 => array(
		'fade-hover' => esc_html__( 'Flat Fade Hover', '5th-avenue' ),
		'underlined' => esc_html__( 'Double Underline', '5th-avenue' ),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'general_secondary_button_color',
	'label'		 => esc_html__( 'Secondary Button Color', '5th-avenue' ),
	'section'	 => 'av5_styles_settings',
	'default'	 => '#222222',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => array( 'a.button.secondary', 'a.button.av5-btn-color--secondary', '.buttons-secondary__style--underlined .woocommerce .actions > .button', '.av5-slide-out-modal .av5-search-slideout .av5-search-bar .search-submit', '.buttons-secondary__style--underlined.woocommerce .woocommerce-pagination a.morescroll-button', '.buttons-secondary__style--underlined .navigation.posts-navigation a.morescroll-button' ),
			'property'	 => 'border-color',
		),
		array(
			'element'	 => array( 'a.button.secondary', 'a.button.av5-btn-color--secondary', '.buttons-secondary__style--underlined .woocommerce .actions > .button:after', 'a.button.av5-btn-color--secondary:after' ),
			'property'	 => 'background-color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => array( 'a.button.secondary', 'a.button.av5-btn-color--secondary', '.buttons-secondary__style--underlined .woocommerce .actions > .button', '.av5-slide-out-modal .av5-search-slideout .av5-search-bar .search-submit', '.buttons-secondary__style--underlined.woocommerce .woocommerce-pagination a.morescroll-button', '.buttons-secondary__style--underlined .navigation.posts-navigation a.morescroll-button' ),
			'function'	 => 'css',
			'property'	 => 'border-color',
		),
		array(
			'element'	 => array( 'a.button.secondary', 'a.button.av5-btn-color--secondary', '.buttons-secondary__style--underlined .woocommerce .actions > .button:after', 'a.button.av5-btn-color--secondary:after' ),
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );
Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'general_secondary_button_text_color',
	'label'		 => esc_html__( 'Secondary Button Text Color', '5th-avenue' ),
	'section'	 => 'av5_styles_settings',
	'default'	 => '#ffffff',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => array( 'a.button.secondary', 'a.button.av5-btn-color--secondary', '.buttons-secondary__style--underlined .woocommerce .actions > .button', '.buttons-secondary__style--underlined.woocommerce .woocommerce-pagination a.morescroll-button', '.buttons-secondary__style--underlined .navigation.posts-navigation a.morescroll-button' ),
			'property'	 => 'color',
		),
		array(
			'element'	 => '.av5-slide-out-modal .av5-search-slideout .av5-search-bar .search-submit',
			'property'	 => 'color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => array( 'a.button.secondary', 'a.button.av5-btn-color--secondary', '.buttons-secondary__style--underlined .woocommerce .actions > .button', '.buttons-secondary__style--underlined.woocommerce .woocommerce-pagination a.morescroll-button', '.buttons-secondary__style--underlined .navigation.posts-navigation a.morescroll-button' ),
			'function'	 => 'css',
			'property'	 => 'color',
		),
		array(
			'element'	 => '.av5-slide-out-modal .av5-search-slideout .av5-search-bar .search-submit',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'general_secondary_button_hover_color',
	'label'		 => esc_html__( 'Secondary Button Hover Color', '5th-avenue' ),
	'section'	 => 'av5_styles_settings',
	'default'	 => '#000000',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => array( 'a.button.secondary:hover', 'a.button.av5-btn-color--secondary:hover', '.buttons-secondary__style--underlined .woocommerce .actions > .button:hover', '.av5-slide-out-modal .av5-search-slideout .av5-search-bar .search-submit:hover', '.buttons-secondary__style--underlined.woocommerce .woocommerce-pagination a.morescroll-button:hover', '.buttons-secondary__style--underlined .navigation.posts-navigation a.morescroll-button:hover' ),
			'property'	 => 'border-color',
		),
		array(
			'element'	 => array( '.woocommerce-pagination .line-preloader:after', 'a.button.secondary:hover', '.buttons-secondary__style--underlined .woocommerce .actions > .button:hover:after', 'a.button.av5-btn-color--secondary:hover', 'a.button.av5-btn-color--secondary:hover:after' ),
			'property'	 => 'background-color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => array( 'a.button.secondary:hover', 'a.button.av5-btn-color--secondary:hover', '.av5-slide-out-modal .av5-search-slideout .av5-search-bar .search-submit:hover', '.buttons-secondary__style--underlined.woocommerce .woocommerce-pagination a.morescroll-button:hover', '.buttons-secondary__style--underlined .navigation.posts-navigation a.morescroll-button:hover' ),
			'function'	 => 'css',
			'property'	 => 'border-color',
		),
		array(
			'element'	 => array( '.woocommerce-pagination .line-preloader:after', 'a.button.secondary:hover', '.buttons-secondary__style--underlined .woocommerce .actions > .button:hover:after', 'a.button.av5-btn-color--secondary:hover', 'a.button.av5-btn-color--secondary:hover:after' ),
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'general_secondary_button_text_hover_color',
	'label'		 => esc_html__( 'Secondary Button Text Hover Color', '5th-avenue' ),
	'section'	 => 'av5_styles_settings',
	'default'	 => '#ffffff',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => array( 'a.button.secondary:hover', 'a.button.av5-btn-color--secondary:hover', '.buttons-secondary__style--underlined .woocommerce .actions > .button:hover', '.av5-slide-out-modal .av5-search-slideout .av5-search-bar .search-submit:hover', '.buttons-secondary__style--underlined.woocommerce .woocommerce-pagination a.morescroll-button:hover', '.buttons-secondary__style--underlined .navigation.posts-navigation a.morescroll-button:hover' ),
			'property'	 => 'color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => array( 'a.button.secondary:hover', 'a.button.av5-btn-color--secondary:hover', '.buttons-secondary__style--underlined .woocommerce .actions > .button:hover:after', '.av5-slide-out-modal .av5-search-slideout .av5-search-bar .search-submit:hover', '.buttons-secondary__style--underlined.woocommerce .woocommerce-pagination a.morescroll-button:hover', '.buttons-secondary__style--underlined .navigation.posts-navigation a.morescroll-button:hover' ),
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );


/* Links */

Kirki::add_field( 'av5_styles_links_title', array(
	'type'		 => 'custom',
	'settings'	 => 'custom_title_general_styles_links',
	'label'		 => '',
	'section'	 => 'av5_styles_settings',
	'default'	 => '<div class="options-title-divider">Links</div>',
) );
Kirki::add_field( 'av5_theme', array(
	'type'			 => 'select',
	'settings'		 => 'general_links_style',
	'label'			 => esc_html__( 'Links Style', '5th-avenue' ),
	'description'	 => esc_html__( 'Set style for links', '5th-avenue' ),
	'section'		 => 'av5_styles_settings',
	'default'		 => 'simple',
	'priority'		 => 10,
	'choices'		 => array(
		'simple'					 => esc_html__( 'Simple, Color Hover', '5th-avenue' ),
		'underlined'				 => esc_html__( 'Always Underlined', '5th-avenue' ),
		'underlined-from-bottom'	 => esc_html__( 'Underline, Appear from bottom', '5th-avenue' ),
		'underlined-left-to-right'	 => esc_html__( 'Underline, Animated Left to Right', '5th-avenue' ),
		'underlined-left-to-right-2' => esc_html__( 'Underline, Animated Left to Right 2', '5th-avenue' ),
		'underlined-fade'			 => esc_html__( 'Underlined, Hide on hover', '5th-avenue' ),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'general_links_color',
	'label'		 => esc_html__( 'Links Color', '5th-avenue' ),
	'section'	 => 'av5_styles_settings',
	'default'	 => '#000',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => 'a:not(.button),.widget_product_categories li a, .widget.widget_meta li a, .widget.widget_categories li a, .widget.widget_archive li a, .widget.widget_pages li a, .simple-social-icons li a, form.checkout_coupon .button, .woocommerce-cart .actions .coupon .button, .av5_woocommerce_mini_cart_drop .woocommerce-mini-cart__buttons a.button:not(.checkout),.underline-input .widget .mc4wp-form .mc4wp-form-fields input[type=submit], .widget_tag_cloud a, .widget_product_tag_cloud a, .widget.widget_shopping_cart .woocommerce-mini-cart__buttons a.button:not(.checkout)',
			'property'	 => 'color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => 'a,.widget_product_categories li a, .widget.widget_meta li a, .widget.widget_categories li a, .widget.widget_archive li a, .widget.widget_pages li a, .simple-social-icons li a, form.checkout_coupon .button, .woocommerce-cart .actions .coupon .button, .av5_woocommerce_mini_cart_drop .woocommerce-mini-cart__buttons a.button:not(.checkout),.underline-input .widget .mc4wp-form .mc4wp-form-fields input[type=submit], .widget_tag_cloud a, .widget_product_tag_cloud a, .widget.widget_shopping_cart .woocommerce-mini-cart__buttons a.button:not(.checkout)',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'general_links_underline_color',
	'label'		 => esc_html__( 'Links Underline Color', '5th-avenue' ),
	'section'	 => 'av5_styles_settings',
	'default'	 => '#000',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => 'a:not(.button):after, .link-style--animated-left-2 a:before, .read_more-style--line-left .blog-listing__read-more a:before',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => ' .single-post__tags a:after, .widget_tag_cloud a:after,  .widget_product_tag_cloud a:after, .comments-area .comment-list .reply a:after, .comments-area .comment-list .comment-author a:after, .comments-area .comment-list .comment-metadata a:after, a.av5-popup-link:after, .av5-breadcrumbs a:after, .woocommerce-breadcrumb a:after, .title-area-wrap .categories-list li a:after,  .post__meta-wrap a:after,  .post__meta--after a:after, .title-area-wrap .categories-list a:after, .post__meta--after a:after, .site-info-wrap .menu a:after, .logged-in-as a:after, .about-author__description a:after, .comment-content a:after, .entry-content p a:not(.button):after',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => '.links__style--underlined .woocommerce-product-details__short-description a,.links__style--underlined .single-post__tags a,.links__style--underlined .widget_recent_comments a,.links__style--underlined .widget_recent_entries a,.links__style--underlined a.av5-popup-link,.links__style--underlined .woocommerce-product-details__short-description a,.links__style--underlined .post__meta-wrap a, .links__style--underlined .title-area-wrap .categories-list a,.links__style--underlined .title-area-wrap .categories-list li a,.links__style--underlined .site-info-wrap a,.links__style--underlined .widget.widget_text a,.links__style--underlined .site-info-wrap .menu a,.links__style--underlined .logged-in-as a,.links__style--underlined .about-author__description a,.links__style--underlined .comment-content a,.links__style--underlined .entry-content p a:not(.button)',
			'property'	 => 'box-shadow',
			'prefix'	 => 'inset 0 -1px 0 0 ',
		),
		array(
			'element'	 => '.links__style--underlined-fade .tinv-wishlist a:not(.button), .links__style--underlined-fade .av5-overlay-wrap a, .links__style--underlined-fade .woocommerce-error a,.links__style--underlined-fade .woocommerce-message a,.links__style--underlined-fade .title-area-wrap .additional-content a,.links__style--underlined-fade .woocommerce-info a, .links__style--underlined-fade a.av5-popup-link,.links__style--underlined-fade .av5-breadcrumbs a:hover,.links__style--underlined-fade .woocommerce-breadcrumb a:hover,.links__style--underlined-fade .comments-area .comment-list .reply a:hover,.links__style--underlined-fade .comments-area .comment-list .comment-author a:hover,.links__style--underlined-fade .comments-area .comment-list .comment-metadata a:hover,.links__style--underlined-fade .woocommerce-product-details__short-description a,.links__style--underlined-fade .single-post__tags a,.links__style--underlined-fade .widget_recent_comments a,.links__style--underlined-fade .widget_recent_entries a,.links__style--underlined-fade .woocommerce-product-details__short-description a,.links__style--underlined-fade .title-area-wrap .categories-list li a, .links__style--underlined-fade .post__meta-wrap a, .links__style--underlined-fade .post__meta--after a,.links__style--underlined-fade .title-area-wrap .categories-list a,.links__style--underlined-fade .site-info-wrap a,.links__style--underlined-fade .widget.widget_text a,.links__style--underlined-fade .site-info-wrap .menu a,.links__style--underlined-fade .logged-in-as a,.links__style--underlined-fade .about-author__description a,.links__style--underlined-fade .comment-content a,.links__style--underlined-fade .entry-content p a:not(.button)',
			'property'	 => 'box-shadow',
			'prefix'	 => 'inset 0 -1px 0 0 ',
		),
		array(
			'element'	 => '.links__style--underlined-left-to-right-2 .woocommerce-product-details__short-description a:before,.links__style--underlined-left-to-right-2 .single-post__tags a:before,.links__style--underlined-left-to-right-2 .comments-area .comment-list .reply a:before,.links__style--underlined-left-to-right-2 .comments-area .comment-list .comment-author a:before,.links__style--underlined-left-to-right-2 .comments-area .comment-list .comment-metadata a:before,.links__style--underlined-left-to-right-2 a.av5-popup-link:before,.links__style--underlined-left-to-right-2 .title-area-wrap .categories-list li a:before, .links__style--underlined-left-to-right-2 .post__meta-wrap a:before, .links__style--underlined-left-to-right-2 .post__meta--after a:before,.links__style--underlined-left-to-right-2 .title-area-wrap .categories-list a:before,.links__style--underlined-left-to-right-2 .post__meta--after a:before,.links__style--underlined-left-to-right-2 .site-info-wrap a:before,.links__style--underlined-left-to-right-2 .widget.widget_text a:before,.links__style--underlined-left-to-right-2 .site-info-wrap .menu a:before,.links__style--underlined-left-to-right-2 .logged-in-as a:before,.links__style--underlined-left-to-right-2 .about-author__description a:before,.links__style--underlined-left-to-right-2 .comment-content a:before,.links__style--underlined-left-to-right-2 .entry-content p a:not(.button):before',
			'property'	 => 'background-color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => 'a:after, .link-style--animated-left-2 a:before, .read_more-style--line-left .blog-listing__read-more a:before',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => ' .single-post__tags a:after, .widget_tag_cloud a:after,  .widget_product_tag_cloud a:after, .comments-area .comment-list .reply a:after, .comments-area .comment-list .comment-author a:after, .comments-area .comment-list .comment-metadata a:after, a.av5-popup-link:after, .av5-breadcrumbs a:after, .woocommerce-breadcrumb a:after, .title-area-wrap .categories-list li a:after,  .post__meta-wrap a:after,  .post__meta--after a:after, .title-area-wrap .categories-list a:after, .post__meta--after a:after, .site-info-wrap .menu a:after, .logged-in-as a:after, .about-author__description a:after, .comment-content a:after, .entry-content p a:not(.button):after',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => '.links__style--underlined .woocommerce-product-details__short-description a,.links__style--underlined .single-post__tags a,.links__style--underlined .widget_recent_comments a,.links__style--underlined .widget_recent_entries a,.links__style--underlined a.av5-popup-link,.links__style--underlined .woocommerce-product-details__short-description a,.links__style--underlined .post__meta-wrap a, .links__style--underlined .title-area-wrap .categories-list a,.links__style--underlined .title-area-wrap .categories-list li a,.links__style--underlined .site-info-wrap a,.links__style--underlined .widget.widget_text a,.links__style--underlined .site-info-wrap .menu a,.links__style--underlined .logged-in-as a,.links__style--underlined .about-author__description a,.links__style--underlined .comment-content a,.links__style--underlined .entry-content p a:not(.button)',
			'function'	 => 'css',
			'property'	 => 'box-shadow',
			'prefix'	 => 'inset 0 -1px 0 0 ',
		),
		array(
			'element'	 => '.links__style--underlined-fade .tinv-wishlist a:not(.button), .links__style--underlined-fade .av5-overlay-wrap a, .links__style--underlined-fade .woocommerce-error a,.links__style--underlined-fade .woocommerce-message a,.links__style--underlined-fade .title-area-wrap .additional-content a,.links__style--underlined-fade .woocommerce-info a,.links__style--underlined-fade a.av5-popup-link,.links__style--underlined-fade .av5-breadcrumbs a:hover,.links__style--underlined-fade .woocommerce-breadcrumb a:hover,.links__style--underlined-fade .comments-area .comment-list .reply a:hover,.links__style--underlined-fade .comments-area .comment-list .comment-author a:hover,.links__style--underlined-fade .comments-area .comment-list .comment-metadata a:hover,.links__style--underlined-fade .woocommerce-product-details__short-description a,.links__style--underlined-fade .single-post__tags a,.links__style--underlined-fade .widget_recent_comments a,.links__style--underlined-fade .widget_recent_entries a,.links__style--underlined-fade .woocommerce-product-details__short-description a,.links__style--underlined-fade .title-area-wrap .categories-list li a, .links__style--underlined-fade .post__meta-wrap a, .links__style--underlined-fade .post__meta--after a,.links__style--underlined-fade .title-area-wrap .categories-list a,.links__style--underlined-fade .site-info-wrap a,.links__style--underlined-fade .widget.widget_text a,.links__style--underlined-fade .site-info-wrap .menu a,.links__style--underlined-fade .logged-in-as a,.links__style--underlined-fade .about-author__description a,.links__style--underlined-fade .comment-content a,.links__style--underlined-fade .entry-content p a:not(.button)',
			'function'	 => 'css',
			'property'	 => 'box-shadow',
			'prefix'	 => 'inset 0 -1px 0 0 ',
		),
		array(
			'element'	 => '.links__style--underlined-left-to-right-2 .woocommerce-product-details__short-description a:before,.links__style--underlined-left-to-right-2 .single-post__tags a:before,.links__style--underlined-left-to-right-2 .comments-area .comment-list .reply a:before,.links__style--underlined-left-to-right-2 .comments-area .comment-list .comment-author a:before,.links__style--underlined-left-to-right-2 .comments-area .comment-list .comment-metadata a:before,.links__style--underlined-left-to-right-2 a.av5-popup-link:before,.links__style--underlined-left-to-right-2 .title-area-wrap .categories-list li a:before, .links__style--underlined-left-to-right-2 .post__meta-wrap a:before, .links__style--underlined-left-to-right-2 .post__meta--after a:before,.links__style--underlined-left-to-right-2 .title-area-wrap .categories-list a:before,.links__style--underlined-left-to-right-2 .post__meta--after a:before,.links__style--underlined-left-to-right-2 .site-info-wrap a:before,.links__style--underlined-left-to-right-2 .widget.widget_text a:before,.links__style--underlined-left-to-right-2 .site-info-wrap .menu a:before,.links__style--underlined-left-to-right-2 .logged-in-as a:before,.links__style--underlined-left-to-right-2 .about-author__description a:before,.links__style--underlined-left-to-right-2 .comment-content a:before,.links__style--underlined-left-to-right-2 .entry-content p a:not(.button):before',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'general_links_hover_color',
	'label'		 => esc_html__( 'Links Hover Color', '5th-avenue' ),
	'section'	 => 'av5_styles_settings',
	'default'	 => '#000',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => 'a:not(.button):hover, .comments-area .comment-list .comment-metadata a:hover, .simple-social-icons li a:hover, form.checkout_coupon .button:hover, .woocommerce-cart .actions .coupon .button:hover, .av5_woocommerce_mini_cart_drop .woocommerce-mini-cart__buttons a.button:not(.checkout):hover, .underline-input .widget .mc4wp-form .mc4wp-form-fields input[type=submit]:hover, .widget.widget_shopping_cart .woocommerce-mini-cart__buttons a.button:not(.checkout):hover, .widget_product_categories li > a:hover, .widget_product_categories li.current-cat > a, .widget.widget_nav_menu li.current_page_item > a, .widget.widget_meta li.current_page_item > a, .widget.widget_categories li.current_page_item > a, .widget.widget_archive li.current_page_item > a, .widget.widget_pages li.current_page_item > a, .widget.widget_nav_menu li a:hover, .widget.widget_meta li a:hover, .widget.widget_categories li a:hover, .widget.widget_archive li a:hover, .widget.widget_pages li a:hover',
			'property'	 => 'color',
		),
		array(
			'element'	 => '.widget_tag_cloud a:hover, .widget_product_tag_cloud a:hover, .widget_product_categories li > a:hover:after, .widget_product_categories li.current-cat > a:hover:after, .widget.widget_nav_menu li a:hover:after, .widget.widget_meta li a:hover:after, .widget.widget_categories li a:hover:after, .underline-input .widget.widget_archive li a:hover:after, .widget.widget_pages li a:hover:after, .widget_product_categories li.current-cat > a:after, .widget.widget_categories li.current_page_item > a:after, .widget.widget_archive li.current_page_item > a:after, .widget.widget_pages li.current_page_item > a:after, .widget.widget_nav_menu li.current_page_item > a:after, .widget.widget_meta li.current_page_item > a:after',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => '.av5-slide-out-modal .product-cats input:checked+span, .av5-fullscreen-search .product-cats input:checked+span, .av5-slide-out-modal .product-cats label span:hover, .av5-fullscreen-search .product-cats label span:hover',
			'property'	 => 'color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => 'a:not(.button):hover, .comments-area .comment-list .comment-metadata a:hover, .simple-social-icons li a:hover, form.checkout_coupon .button:hover, .woocommerce-cart .actions .coupon .button:hover, .av5_woocommerce_mini_cart_drop .woocommerce-mini-cart__buttons a.button:not(.checkout):hover, .underline-input .widget .mc4wp-form .mc4wp-form-fields input[type=submit]:hover, .widget.widget_shopping_cart .woocommerce-mini-cart__buttons a.button:not(.checkout):hover, .widget_product_categories li > a:hover, .widget_product_categories li.current-cat > a, .widget.widget_nav_menu li.current_page_item > a, .widget.widget_meta li.current_page_item > a, .widget.widget_categories li.current_page_item > a, .widget.widget_archive li.current_page_item > a, .widget.widget_pages li.current_page_item > a, .widget.widget_nav_menu li a:hover, .widget.widget_meta li a:hover, .widget.widget_categories li a:hover, .widget.widget_archive li a:hover, .widget.widget_pages li a:hover',
			'function'	 => 'css',
			'property'	 => 'color',
		),
		array(
			'element'	 => '.widget_tag_cloud a:hover, .widget_product_tag_cloud a:hover, .widget_product_categories li > a:hover:after, .widget_product_categories li.current-cat > a:hover:after, .widget.widget_nav_menu li a:hover:after, .widget.widget_meta li a:hover:after, .widget.widget_categories li a:hover:after, .underline-input .widget.widget_archive li a:hover:after, .widget.widget_pages li a:hover:after, .widget_product_categories li.current-cat > a:after, .widget.widget_categories li.current_page_item > a:after, .widget.widget_archive li.current_page_item > a:after, .widget.widget_pages li.current_page_item > a:after, .widget.widget_nav_menu li.current_page_item > a:after, .widget.widget_meta li.current_page_item > a:after',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => '.av5-slide-out-modal .product-cats input:checked+span, .av5-fullscreen-search .product-cats input:checked+span, .av5-slide-out-modal .product-cats label span:hover, .av5-fullscreen-search .product-cats label span:hover',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );
Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'general_links_hover_underline_color',
	'label'		 => esc_html__( 'Links Hover Underline Color', '5th-avenue' ),
	'section'	 => 'av5_styles_settings',
	'default'	 => '#000',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => 'a:hover:after, .link-style--animated-left-2 a:hover:before, .read_more-style--line-left .blog-listing__read-more a:hover:before',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => '.links__style--underlined .woocommerce-product-details__short-description a:hover,.links__style--underlined .single-post__tags a:hover,.links__style--underlined .widget_recent_comments a:hover,.links__style--underlined .widget_recent_entries a:hover,.links__style--underlined a.av5-popup-link:hover,.links__style--underlined .av5-breadcrumbs a:hover,.links__style--underlined .woocommerce-breadcrumb a:hover,.links__style--underlined .woocommerce-product-details__short-description a:hover,.links__style--underlined .title-area-wrap .categories-list li a:hover, .links__style--underlined .post__meta-wrap a:hover, .links__style--underlined .post__meta--after a:hover,.links__style--underlined .title-area-wrap .categories-list a:hover,.links__style--underlined .site-info-wrap a:hover,.links__style--underlined .widget.widget_text a:hover,.links__style--underlined .site-info-wrap .menu a:hover,.links__style--underlined .logged-in-as a:hover,.links__style--underlined .about-author__description a:hover,.links__style--underlined .comment-content a:hover,.links__style--underlined .entry-content p a:not(.button):hover,.links__style--underlined .comments-area .comment-list .reply a:hover,.links__style--underlined .comments-area .comment-list .comment-author a:hover,.links__style--underlined .comments-area .comment-list .comment-metadata a:hover',
			'property'	 => 'box-shadow',
			'prefix'	 => 'inset 0 -1px 0 0 ',
		),
		array(
			'element'	 => '.links__style--underlined-left-to-right .woocommerce-product-details__short-description a:after,.links__style--underlined-left-to-right .single-post__tags a:after,.links__style--underlined-left-to-right a.av5-popup-link:after,.links__style--underlined-left-to-right .woocommerce-product-details__short-description a:after,.links__style--underlined-left-to-right .title-area-wrap .categories-list li a:after, .links__style--underlined-left-to-right .post__meta-wrap a:after, .links__style--underlined-left-to-right .post__meta--after a:after,.links__style--underlined-left-to-right .title-area-wrap .categories-list a:after,.links__style--underlined-left-to-right .site-info-wrap a:after,.links__style--underlined-left-to-right .widget.widget_text a:after,.links__style--underlined-left-to-right .site-info-wrap .menu a:after,.links__style--underlined-left-to-right .logged-in-as a:after,.links__style--underlined-left-to-right .about-author__description a:after,.links__style--underlined-left-to-right .comment-content a:after,.links__style--underlined-left-to-right .entry-content p a:not(.button):after,.links__style--underlined-left-to-right .comments-area .comment-list .reply a:after,.links__style--underlined-left-to-right .comments-area .comment-list .comment-author a:after,.links__style--underlined-left-to-right .comments-area .comment-list .comment-metadata a:after',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => '.links__style--underlined-from-bottom .woocommerce-product-details__short-description a:before,.links__style--underlined-from-bottom .single-post__tags a:before,.links__style--underlined-from-bottom a.av5-popup-link:before,.links__style--underlined-from-bottom .woocommerce-product-details__short-description a:before,.links__style--underlined-from-bottom .post__meta-wrap a:before, .links__style--underlined-from-bottom .post__meta--after a:before,.links__style--underlined-from-bottom .title-area-wrap .categories-list a:before,.links__style--underlined-from-bottom .title-area-wrap .categories-list li a:before, .links__style--underlined-from-bottom .site-info-wrap a:before,.links__style--underlined-from-bottom .widget.widget_text a:before,.links__style--underlined-from-bottom .site-info-wrap .menu a:before,.links__style--underlined-from-bottom .logged-in-as a:before,.links__style--underlined-from-bottom .about-author__description a:before,.links__style--underlined-from-bottom .comment-content a:before,.links__style--underlined-from-bottom .entry-content p a:before,.links__style--underlined-from-bottom .comments-area .comment-list .reply a:before,.links__style--underlined-from-bottom .comments-area .comment-list .comment-author a:before,.links__style--underlined-from-bottom .comments-area .comment-list .comment-metadata a:before',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => '.links__style--underlined-left-to-right-2 .woocommerce-product-details__short-description a:after,.links__style--underlined-left-to-right-2 .single-post__tags a:after,.links__style--underlined-left-to-right-2 a.av5-popup-link:after,.links__style--underlined-left-to-right-2 .woocommerce-product-details__short-description a:after,.links__style--underlined-left-to-right-2 .title-area-wrap .categories-list li a:after, .links__style--underlined-left-to-right-2 .post__meta-wrap a:after, .links__style--underlined-left-to-right-2 .post__meta--after a:after,.links__style--underlined-left-to-right-2 .title-area-wrap .categories-list a:after,.links__style--underlined-left-to-right-2 .site-info-wrap a:after,.links__style--underlined-left-to-right-2 .widget.widget_text a:after,.links__style--underlined-left-to-right-2 .site-info-wrap .menu a:after,.links__style--underlined-left-to-right-2 .logged-in-as a:after,.links__style--underlined-left-to-right-2 .about-author__description a:after,.links__style--underlined-left-to-right-2 .comment-content a:after,.links__style--underlined-left-to-right-2 .entry-content p a:after,.links__style--underlined-left-to-right-2 .comments-area .comment-list .reply a:after,.links__style--underlined-left-to-right-2 .comments-area .comment-list .comment-author a:after,.links__style--underlined-left-to-right-2 .comments-area .comment-list .comment-metadata a:after',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => '.av5-slide-out-modal .product-cats input:checked+span:after, .av5-fullscreen-search .product-cats input:checked+span:after, .av5-slide-out-modal .product-cats label span:after, .av5-fullscreen-search .product-cats label span:after, .av5-slide-out-modal .product-cats input:checked+span:hover:after, .av5-fullscreen-search .product-cats input:checked+span:hover:after, .av5-slide-out-modal .product-cats label span:hover:after, .av5-fullscreen-search .product-cats label span:hover:after',
			'property'	 => 'background-color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => 'a:hover:after, .link-style--animated-left-2 a:hover:before, .read_more-style--line-left .blog-listing__read-more a:hover:before',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => '.links__style--underlined .woocommerce-product-details__short-description a:hover,.links__style--underlined .single-post__tags a:hover,.links__style--underlined .widget_recent_comments a:hover,.links__style--underlined .widget_recent_entries a:hover,.links__style--underlined a.av5-popup-link:hover,.links__style--underlined .av5-breadcrumbs a:hover,.links__style--underlined .woocommerce-breadcrumb a:hover,.links__style--underlined .woocommerce-product-details__short-description a:hover,.links__style--underlined .title-area-wrap .categories-list li a:hover, .links__style--underlined .post__meta-wrap a:hover, .links__style--underlined .post__meta--after a:hover,.links__style--underlined .title-area-wrap .categories-list a:hover,.links__style--underlined .site-info-wrap a:hover,.links__style--underlined .widget.widget_text a:hover,.links__style--underlined .site-info-wrap .menu a:hover,.links__style--underlined .logged-in-as a:hover,.links__style--underlined .about-author__description a:hover,.links__style--underlined .comment-content a:hover,.links__style--underlined .entry-content p a:not(.button):hover,.links__style--underlined .comments-area .comment-list .reply a:hover,.links__style--underlined .comments-area .comment-list .comment-author a:hover,.links__style--underlined .comments-area .comment-list .comment-metadata a:hover',
			'function'	 => 'css',
			'property'	 => 'box-shadow',
			'prefix'	 => 'inset 0 -1px 0 0 ',
		),
		array(
			'element'	 => '.links__style--underlined-left-to-right .woocommerce-product-details__short-description a:after,.links__style--underlined-left-to-right .single-post__tags a:after,.links__style--underlined-left-to-right a.av5-popup-link:after,.links__style--underlined-left-to-right .woocommerce-product-details__short-description a:after,.links__style--underlined-left-to-right .title-area-wrap .categories-list li a:after, .links__style--underlined-left-to-right .post__meta-wrap a:after, .links__style--underlined-left-to-right .post__meta--after a:after,.links__style--underlined-left-to-right .title-area-wrap .categories-list a:after,.links__style--underlined-left-to-right .site-info-wrap a:after,.links__style--underlined-left-to-right .widget.widget_text a:after,.links__style--underlined-left-to-right .site-info-wrap .menu a:after,.links__style--underlined-left-to-right .logged-in-as a:after,.links__style--underlined-left-to-right .about-author__description a:after,.links__style--underlined-left-to-right .comment-content a:after,.links__style--underlined-left-to-right .entry-content p a:not(.button):after,.links__style--underlined-left-to-right .comments-area .comment-list .reply a:after,.links__style--underlined-left-to-right .comments-area .comment-list .comment-author a:after,.links__style--underlined-left-to-right .comments-area .comment-list .comment-metadata a:after',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => '.links__style--underlined-from-bottom .woocommerce-product-details__short-description a:before,.links__style--underlined-from-bottom .single-post__tags a:before,.links__style--underlined-from-bottom a.av5-popup-link:before,.links__style--underlined-from-bottom .woocommerce-product-details__short-description a:before,.links__style--underlined-from-bottom .post__meta-wrap a:before, .links__style--underlined-from-bottom .post__meta--after a:before,.links__style--underlined-from-bottom .title-area-wrap .categories-list a:before,.links__style--underlined-from-bottom .title-area-wrap .categories-list li a:before, .links__style--underlined-from-bottom .site-info-wrap a:before,.links__style--underlined-from-bottom .widget.widget_text a:before,.links__style--underlined-from-bottom .site-info-wrap .menu a:before,.links__style--underlined-from-bottom .logged-in-as a:before,.links__style--underlined-from-bottom .about-author__description a:before,.links__style--underlined-from-bottom .comment-content a:before,.links__style--underlined-from-bottom .entry-content p a:before,.links__style--underlined-from-bottom .comments-area .comment-list .reply a:before,.links__style--underlined-from-bottom .comments-area .comment-list .comment-author a:before,.links__style--underlined-from-bottom .comments-area .comment-list .comment-metadata a:before',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => '.links__style--underlined-left-to-right-2 .woocommerce-product-details__short-description a:after,.links__style--underlined-left-to-right-2 .single-post__tags a:after,.links__style--underlined-left-to-right-2 a.av5-popup-link:after,.links__style--underlined-left-to-right-2 .woocommerce-product-details__short-description a:after,.links__style--underlined-left-to-right-2 .title-area-wrap .categories-list li a:after, .links__style--underlined-left-to-right-2 .post__meta-wrap a:after, .links__style--underlined-left-to-right-2 .post__meta--after a:after,.links__style--underlined-left-to-right-2 .title-area-wrap .categories-list a:after,.links__style--underlined-left-to-right-2 .site-info-wrap a:after,.links__style--underlined-left-to-right-2 .widget.widget_text a:after,.links__style--underlined-left-to-right-2 .site-info-wrap .menu a:after,.links__style--underlined-left-to-right-2 .logged-in-as a:after,.links__style--underlined-left-to-right-2 .about-author__description a:after,.links__style--underlined-left-to-right-2 .comment-content a:after,.links__style--underlined-left-to-right-2 .entry-content p a:after,.links__style--underlined-left-to-right-2 .comments-area .comment-list .reply a:after,.links__style--underlined-left-to-right-2 .comments-area .comment-list .comment-author a:after,.links__style--underlined-left-to-right-2 .comments-area .comment-list .comment-metadata a:after',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => '.av5-slide-out-modal .product-cats input:checked+span:after, .av5-fullscreen-search .product-cats input:checked+span:after, .av5-slide-out-modal .product-cats label span:after, .av5-fullscreen-search .product-cats label span:after, .av5-slide-out-modal .product-cats input:checked+span:hover:after, .av5-fullscreen-search .product-cats input:checked+span:hover:after, .av5-slide-out-modal .product-cats label span:hover:after, .av5-fullscreen-search .product-cats label span:hover:after',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );

/* Inputs */

Kirki::add_field( 'av5_styles_inputs_title', array(
	'type'		 => 'custom',
	'settings'	 => 'custom_title_general_styles_inputs',
	'label'		 => '',
	'section'	 => 'av5_styles_settings',
	'default'	 => '<div class="options-title-divider">Inputs</div>',
) );

Kirki::add_field( 'av5_theme', array(
	'type'			 => 'select',
	'settings'		 => 'general_input_styles',
	'label'			 => esc_html__( 'Global Input Style', '5th-avenue' ),
	'description'	 => esc_html__( 'Set style for all input, select, textarea and other form elements across website.', '5th-avenue' ),
	'help'			 => '',
	'section'		 => 'av5_styles_settings',
	'default'		 => 'flat-input',
	'priority'		 => 10,
	'choices'		 => array(
		'flat-input'		 => esc_html__( 'Flat', '5th-avenue' ),
		'underline-input'	 => esc_html__( 'Underlined', '5th-avenue' ),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'general_input_border_color',
	'label'		 => esc_html__( 'Input Border Color', '5th-avenue' ),
	'section'	 => 'av5_styles_settings',
	'default'	 => '#cacaca',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => 'input, select, textarea, .input-group .form-control, .select2-container, .select2-choice, .flat-input .av5-products-filter, input:not([type="submit"]), .tawcvs-swatches .swatch-label, .swatches--style-square .tawcvs-swatches .swatch-label',
			'property'	 => 'border-color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => 'input, select, textarea, .input-group .form-control, .select2-container, .select2-choice, .flat-input .av5-products-filter, input:not([type="submit"]), .tawcvs-swatches .swatch-label, .swatches--style-square .tawcvs-swatches .swatch-label',
			'function'	 => 'css',
			'property'	 => 'border-color',
		),
	),
) );
Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'general_input_hover_border_color',
	'label'		 => esc_html__( 'Input Hover & Focus Border Color', '5th-avenue' ),
	'section'	 => 'av5_styles_settings',
	'default'	 => '#000',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => 'input:focus, .tawcvs-swatches .swatch:hover, .tawcvs-swatches .swatch.selected, .input-group .form-control:hover,.input-group .form-control:focus, select:focus, .select2-container:focus, .select2-choice:focus, select:hover, .select2-container:hover, .select2-choice:hover, input[type="radio"]:checked, input[type="checkbox"]:checked, input[type="radio"]:focus, input[type="checkbox"]:focus, input[type="radio"]:hover, input[type="checkbox"]:hover, input:focus, input:hover, input[type="text"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="password"]:focus, input[type="tel"]:focus, input[type="search"]:focus, textarea:focus, input[type="text"]:hover, input[type="email"]:hover, input[type="url"]:hover, input[type="password"]:hover, input[type="tel"]:hover, input[type="search"]:hover, textarea:hover, .flat-input .av5-products-filter:hover',
			'property'	 => 'border-color',
		),
		array(
			'element'	 => 'input[type="radio"]:checked, input[type="checkbox"]:checked, .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider span.ui-slider-handle, .woocommerce .widget_price_filter .ui-slider span.ui-slider-range, .tawcvs-swatches .swatch-label:hover, .tawcvs-swatches .swatch-label.selected, .swatches--style-square .tawcvs-swatches .swatch-label.selected, .swatches--style-square .tawcvs-swatches .swatch.selected, .swatches--style-square .tawcvs-swatches .swatch-label:hover, .swatches--style-square .tawcvs-swatches .swatch:hover',
			'property'	 => 'background-color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => 'input:focus, .tawcvs-swatches .swatch:hover, .tawcvs-swatches .swatch.selected, .input-group .form-control:hover,.input-group .form-control:focus, select:focus, .select2-container:focus, .select2-choice:focus, select:hover, .select2-container:hover, .select2-choice:hover, input[type="radio"]:checked, input[type="checkbox"]:checked, input[type="radio"]:focus, input[type="checkbox"]:focus, input[type="radio"]:hover, input[type="checkbox"]:hover, input:focus, input:hover, input[type="text"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="password"]:focus, input[type="tel"]:focus, input[type="search"]:focus, textarea:focus, input[type="text"]:hover, input[type="email"]:hover, input[type="url"]:hover, input[type="password"]:hover, input[type="tel"]:hover, input[type="search"]:hover, textarea:hover, .flat-input .av5-products-filter:hover',
			'function'	 => 'css',
			'property'	 => 'border-color',
		),
		array(
			'element'	 => 'input[type="radio"]:checked, input[type="checkbox"]:checked, .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider span.ui-slider-handle, .woocommerce .widget_price_filter .ui-slider span.ui-slider-range, .tawcvs-swatches .swatch-label:hover, .tawcvs-swatches .swatch-label.selected, .swatches--style-square .tawcvs-swatches .swatch-label.selected, .swatches--style-square .tawcvs-swatches .swatch.selected, .swatches--style-square .tawcvs-swatches .swatch-label:hover, .swatches--style-square .tawcvs-swatches .swatch:hover',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );
Kirki::add_field( 'av5_theme', array(
	'type'			 => 'color-alpha',
	'settings'		 => 'general_input_bg_color',
	'label'			 => esc_html__( 'Input Background Color', '5th-avenue' ),
	'description'	 => esc_html__( '* Only for input style with background.', '5th-avenue' ),
	'section'		 => 'av5_styles_settings',
	'default'		 => '#fff',
	'priority'		 => 10,
	'output'		 => array(
		array(
			'element'	 => 'input, select, textarea, .input-group .form-control, .select2-container, .select2-choice, .flat-input .av5-products-filter, input:not([type="submit"]),  .swatches--style-square .tawcvs-swatches .swatch-label, .swatches--style-square .tawcvs-swatches .swatch, .tawcvs-swatches .swatch',
			'property'	 => 'background-color',
		),
	),
	'transport'		 => 'postMessage',
	'js_vars'		 => array(
		array(
			'element'	 => 'input, select, textarea, .input-group .form-control, .select2-container, .select2-choice, .flat-input .av5-products-filter, input:not([type="submit"]),  .swatches--style-square .tawcvs-swatches .swatch-label, .swatches--style-square .tawcvs-swatches .swatch, .tawcvs-swatches .swatch',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'general_input_text_color',
	'label'		 => esc_html__( 'Input Text Color', '5th-avenue' ),
	'section'	 => 'av5_styles_settings',
	'default'	 => '#737373',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => 'input:focus',
			'property'	 => 'color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => 'input:focus',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'general_label_color',
	'label'		 => esc_html__( 'Label Color', '5th-avenue' ),
	'section'	 => 'av5_styles_settings',
	'default'	 => '#222222',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => 'label',
			'property'	 => 'color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => 'label',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'general_input_placeholder_text_color',
	'label'		 => esc_html__( 'Input Placeholder Text Color', '5th-avenue' ),
	'section'	 => 'av5_styles_settings',
	'default'	 => '#cacaca',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '::-webkit-input-placeholder',
			'property'	 => 'color',
		),
		array(
			'element'	 => 'inpu::-moz-placeholder',
			'property'	 => 'color',
		),
		array(
			'element'	 => ':-ms-input-placeholder',
			'property'	 => 'color',
		),
		array(
			'element'	 => ':-moz-placeholder',
			'property'	 => 'color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '::-webkit-input-placeholder',
			'function'	 => 'css',
			'property'	 => 'color',
		),
		array(
			'element'	 => '::-moz-placeholder',
			'function'	 => 'css',
			'property'	 => 'color',
		),
		array(
			'element'	 => ':-ms-input-placeholder',
			'function'	 => 'css',
			'property'	 => 'color',
		),
		array(
			'element'	 => ':-moz-placeholder',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );
