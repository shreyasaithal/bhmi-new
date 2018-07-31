<?php
/**
 * Footer option for cutomizer
 *
 * @package           5th-Avenue\Option
 * @subpackage        Kirki
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

Kirki::add_panel( 'footer_panel', array(
	'priority'		 => 60,
	'title'			 => esc_html__( 'Footer', '5th-avenue' ),
	'description'	 => esc_html__( 'My Description is here', '5th-avenue' ),
) );

/* FOOTER > WIDGETS --------------------------------- */

Kirki::add_section( 'av5_footer_widgets_section', array(
	'priority'	 => 10,
	'title'		 => esc_html__( 'Footer Widgets', '5th-avenue' ),
	'panel'		 => 'footer_panel',
) );


Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'main_footer_widget_text',
	'label'		 => esc_html__( 'Widgets Text Color', '5th-avenue' ),
	'section'	 => 'av5_footer_widgets_section',
	'default'	 => '#9e9e9e',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.site-footer-widgets .widget, .site-footer-widgets .widget p',
			'property'	 => 'color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.site-footer-widgets .widget, .site-footer-widgets .widget p',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );
Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'main_footer_widget_title',
	'label'		 => esc_html__( 'Widgets Title Color', '5th-avenue' ),
	'section'	 => 'av5_footer_widgets_section',
	'default'	 => '#000000',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.site-footer-widgets .widget .widget-title, .widget_calendar table th, .site-footer .widget .widget-title, .site-footer .widget_calendar caption',
			'property'	 => 'color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.site-footer-widgets .widget .widget-title, .widget_calendar table th, .site-footer .widget .widget-title, .site-footer .widget_calendar caption',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );
/* elements arrows cross etc. */
Kirki::add_field( 'av5_theme', array(
	'type'			 => 'color-alpha',
	'settings'		 => 'main_footer_widget_elements_color',
	'label'			 => esc_html__( 'Small elements in Footer Widgets', '5th-avenue' ),
	'description'	 => esc_html__( 'Small elements like arrows, crosses, etc.', '5th-avenue' ),
	'section'		 => 'av5_footer_widgets_section',
	'default'		 => '#000000',
	'priority'		 => 10,
	'output'		 => array(
		array(
			'element'	 => '.site-footer-widgets .widget_product_search .woocommerce-product-search .search-submit span, .site-footer-widgets .widget_search .search-submit span, .site-footer-widgets .vc_toggle_simple .vc_toggle_icon::after, .site-footer-widgets .vc_toggle_simple .vc_toggle_icon::before, .site-footer-widgets .vc_toggle_round.vc_toggle_color_inverted .vc_toggle_icon::after, .site-footer-widgets .vc_toggle_round.vc_toggle_color_inverted .vc_toggle_icon::before, .site-footer-widgets .vc_toggle_round.vc_toggle_color_inverted .vc_toggle_icon::after, .site-footer-widgets .vc_toggle_round.vc_toggle_color_inverted .vc_toggle_icon::before,  .site-footer-widgets .owl-nav .line,  .site-footer-widgets .woocommerce-mini-cart a.remove_from_cart_button:after, .site-footer-widgets .woocommerce-mini-cart a.remove_from_cart_button:before, .site-footer-widgets .av5-product-carousel-shortcode .av5-carousel-thumbnails-wrapper .line',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => '.site-footer-widgets .next-arrow line',
			'property'	 => 'stroke',
		),
		array(
			'element'	 => '.site-footer-widgets .widget_calendar tfoot #next a:after, .site-footer-widgets  .widget_calendar tfoot #prev a:after, .site-footer-widgets .widget_search .search-submit, .site-footer-widgets .widget_product_search .woocommerce-product-search button',
			'property'	 => 'color',
		),
		array(
			'element'	 => '.site-footer-widgets .vc_toggle_round.vc_toggle_color_inverted .vc_toggle_icon, .site-footer-widgets .vc_toggle.vc_toggle_arrow .vc_toggle_icon::after, .site-footer-widgets .vc_toggle.vc_toggle_arrow .vc_toggle_icon::before',
			'property'	 => 'border-color',
		),
	),
	'transport'		 => 'postMessage',
	'js_vars'		 => array(
		array(
			'element'	 => '.site-footer-widgets .widget_product_search .woocommerce-product-search .search-submit span, .site-footer-widgets .widget_search .search-submit span, .site-footer-widgets .vc_toggle_simple .vc_toggle_icon::after, .site-footer-widgets .vc_toggle_simple .vc_toggle_icon::before, .site-footer-widgets .vc_toggle_round.vc_toggle_color_inverted .vc_toggle_icon::after, .site-footer-widgets .vc_toggle_round.vc_toggle_color_inverted .vc_toggle_icon::before, .site-footer-widgets .vc_toggle_round.vc_toggle_color_inverted .vc_toggle_icon::after, .site-footer-widgets .vc_toggle_round.vc_toggle_color_inverted .vc_toggle_icon::before,  .site-footer-widgets .owl-nav .line,  .site-footer-widgets .woocommerce-mini-cart a.remove_from_cart_button:after, .site-footer-widgets .woocommerce-mini-cart a.remove_from_cart_button:before, .site-footer-widgets .av5-product-carousel-shortcode .av5-carousel-thumbnails-wrapper .line',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => '.site-footer-widgets .next-arrow line',
			'function'	 => 'css',
			'property'	 => 'stroke',
		),
		array(
			'element'	 => '.site-footer-widgets .widget_calendar tfoot #next a:after, .site-footer-widgets .widget_calendar tfoot #prev a:after, .site-footer-widgets .widget_search .search-submit, .site-footer-widgets .widget_product_search .woocommerce-product-search button',
			'function'	 => 'css',
			'property'	 => 'color',
		),
		array(
			'element'	 => '.site-footer-widgets .vc_toggle_round.vc_toggle_color_inverted .vc_toggle_icon, .site-footer-widgets .vc_toggle.vc_toggle_arrow .vc_toggle_icon::after, .site-footer-widgets .vc_toggle.vc_toggle_arrow .vc_toggle_icon::before',
			'function'	 => 'css',
			'property'	 => 'border-color',
		),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'main_footer_widget_links',
	'label'		 => esc_html__( 'Widgets Links Color', '5th-avenue' ),
	'section'	 => 'av5_footer_widgets_section',
	'default'	 => '#000000',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.site-footer-widgets .woocommerce-mini-cart li a.av5-product-title, .site-footer-widgets a, .site-footer-widgets .widget_product_categories li a, .site-footer-widgets .widget.widget_meta li a, .site-footer-widgets .widget.widget_categories li a, .site-footer-widgets .widget.widget_archive li a, .site-footer-widgets .widget.widget_pages li a, .site-footer-widgets .simple-social-icons li a, .site-footer-widgets .av5_woocommerce_mini_cart_drop .woocommerce-mini-cart__buttons a.button:not(.checkout), .underline-input .site-footer-widgets .widget .mc4wp-form .mc4wp-form-fields input[type=submit], .site-footer-widgets  .widget_tag_cloud a, .site-footer-widgets  .widget_product_tag_cloud a, .site-footer-widgets  .widget.widget_shopping_cart .woocommerce-mini-cart__buttons a.button:not(.checkout)',
			'property'	 => 'color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.site-footer-widgets .woocommerce-mini-cart li a.av5-product-title, .site-footer-widgets a, .site-footer-widgets .widget_product_categories li a, .site-footer-widgets .widget.widget_meta li a, .site-footer-widgets .widget.widget_categories li a, .site-footer-widgets .widget.widget_archive li a, .site-footer-widgets .widget.widget_pages li a, .site-footer-widgets .simple-social-icons li a, .site-footer-widgets .av5_woocommerce_mini_cart_drop .woocommerce-mini-cart__buttons a.button:not(.checkout), .underline-input .site-footer-widgets .widget .mc4wp-form .mc4wp-form-fields input[type=submit], .site-footer-widgets  .widget_tag_cloud a, .site-footer-widgets  .widget_product_tag_cloud a, .site-footer-widgets  .widget.widget_shopping_cart .woocommerce-mini-cart__buttons a.button:not(.checkout)',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'main_footer_widget_links_hover',
	'label'		 => esc_html__( 'Widgets Links Hover Color', '5th-avenue' ),
	'section'	 => 'av5_footer_widgets_section',
	'default'	 => '#000000',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.site-footer-widgets .woocommerce-mini-cart li a.av5-product-title:hover, .site-footer-widgets a:hover, .site-footer-widgets .widget_product_categories li a:hover, .site-footer-widgets .widget.widget_meta li a:hover, .site-footer-widgets .widget.widget_categories li a:hover, .site-footer-widgets .widget.widget_archive li a:hover, .site-footer-widgets .widget.widget_pages li a:hover, .site-footer-widgets .simple-social-icons li a:hover, .site-footer-widgets .av5_woocommerce_mini_cart_drop .woocommerce-mini-cart__buttons a.button:not(.checkout):hover, .underline-input .site-footer-widgets .widget .mc4wp-form .mc4wp-form-fields input[type=submit]:hover, .site-footer-widgets  .widget.widget_shopping_cart .woocommerce-mini-cart__buttons a.button:not(.checkout):hover',
			'property'	 => 'color',
		),
		array(
			'element'	 => '.site-footer-widgets .widget_tag_cloud a:hover, .site-footer-widgets .widget_product_tag_cloud a:hover, .site-footer-widgets .widget_product_categories li > a:hover:after, .site-footer-widgets .widget_product_categories li.current-cat > a:hover:after, .site-footer-widgets .widget.widget_nav_menu li a:hover:after, .site-footer-widgets .widget.widget_meta li a:hover:after, .site-footer-widgets .widget.widget_categories li a:hover:after, .site-footer-widgets .widget.widget_archive li a:hover:after, .site-footer-widgets .widget.widget_pages li a:hover:after, .site-footer-widgets .widget_product_categories li.current-cat > a:after, .site-footer-widgets .widget.widget_categories li.current_page_item > a:after, .site-footer-widgets .widget.widget_archive li.current_page_item > a:after, .site-footer-widgets .widget.widget_pages li.current_page_item > a:after, .site-footer-widgets .widget.widget_nav_menu li.current_page_item > a:after, .site-footer-widgets .widget.widget_meta li.current_page_item > a:after',
			'property'	 => 'background-color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.site-footer-widgets .woocommerce-mini-cart li a.av5-product-title:hover, .site-footer-widgets a:hover, .site-footer-widgets .widget_product_categories li a:hover, .site-footer-widgets .widget.widget_meta li a:hover, .site-footer-widgets .widget.widget_categories li a:hover, .site-footer-widgets .widget.widget_archive li a:hover, .site-footer-widgets .widget.widget_pages li a:hover, .site-footer-widgets .simple-social-icons li a:hover, .site-footer-widgets .av5_woocommerce_mini_cart_drop .woocommerce-mini-cart__buttons a.button:not(.checkout):hover, .underline-input .site-footer-widgets .widget .mc4wp-form .mc4wp-form-fields input[type=submit]:hover, .site-footer-widgets  .widget.widget_shopping_cart .woocommerce-mini-cart__buttons a.button:not(.checkout):hover',
			'function'	 => 'css',
			'property'	 => 'color',
		),
		array(
			'element'	 => '.site-footer-widgets .widget_tag_cloud a:hover, .site-footer-widgets .widget_product_tag_cloud a:hover, .site-footer-widgets .widget_product_categories li > a:hover:after, .site-footer-widgets .widget_product_categories li.current-cat > a:hover:after, .site-footer-widgets .widget.widget_nav_menu li a:hover:after, .site-footer-widgets .widget.widget_meta li a:hover:after, .site-footer-widgets .widget.widget_categories li a:hover:after, .site-footer-widgets .widget.widget_archive li a:hover:after, .site-footer-widgets .widget.widget_pages li a:hover:after, .site-footer-widgets .widget_product_categories li.current-cat > a:after, .site-footer-widgets .widget.widget_categories li.current_page_item > a:after, .site-footer-widgets .widget.widget_archive li.current_page_item > a:after, .site-footer-widgets .widget.widget_pages li.current_page_item > a:after, .site-footer-widgets .widget.widget_nav_menu li.current_page_item > a:after, .site-footer-widgets .widget.widget_meta li.current_page_item > a:after',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'main_footer_background_overlay',
	'label'		 => esc_html__( 'Widgets Background Overlay Color', '5th-avenue' ),
	'section'	 => 'av5_footer_widgets_section',
	'default'	 => 'rgba(0,0,0,0)',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.site-footer-widgets:after',
			'property'	 => 'background-color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.site-footer-widgets:after',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );
Kirki::add_field( 'av5_theme', array(
	'type'			 => 'switch',
	'settings'		 => 'main_footer_white_style',
	'label'			 => esc_html__( 'Footer widget area White Style', '5th-avenue' ),
	'description'	 => esc_html__( 'Make all text and borders white colored for footer widget area. Useful on dark backgrounds.', '5th-avenue' ),
	'section'		 => 'av5_footer_widgets_section',
	'default'		 => 0,
	'priority'		 => 10,
) );
Kirki::add_field( 'av5_theme', array(
	'type'		 => 'background',
	'settings'	 => 'main_footer_background',
	'label'		 => esc_html__( 'Footer Background', '5th-avenue' ),
	'section'	 => 'av5_footer_widgets_section',
	'default'	 => array(
		'background-color'		 => '#ffffff',
		'background-repeat'		 => 'no-repeat',
		'background-position'	 => 'center-center',
		'background-size'		 => 'cover',
		'background-attachment'	 => 'scroll',
	),
	'priority'	 => 60,
	'output'	 => array(
		array(
			'element'	 => '.site-footer-widgets',
			'property'	 => 'background',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.site-footer-widgets',
			'function'	 => 'css',
			'property'	 => 'background',
		),
	),
) );

/* FOOTER > COPYRIGHT AREA --------------------------------- */

Kirki::add_section( 'av5_footer_copyright_section', array(
	'priority'	 => 60,
	'title'		 => esc_html__( 'Copyright Area', '5th-avenue' ),
	'panel'		 => 'footer_panel',
) );

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'background',
	'settings'	 => 'footer_copyright_background',
	'label'		 => esc_html__( 'Footer Copyright Background', '5th-avenue' ),
	'section'	 => 'av5_footer_copyright_section',
	'default'	 => array(
		'background-color'		 => '#ffffff',
		'background-repeat'		 => 'no-repeat',
		'background-position'	 => 'center-center',
		'background-size'		 => 'cover',
		'background-attachment'	 => 'scroll',
	),
	'priority'	 => 61,
	'output'	 => array(
		array(
			'element'	 => '.site-info-wrap',
			'property'	 => 'background',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.site-info-wrap',
			'property'	 => 'background',
			'function'	 => 'css',
		),
	),
) );
Kirki::add_field( 'av5_theme', array(
	'type'		 => 'dimension',
	'settings'	 => 'footer_copyright_top_padding_settings',
	'label'		 => esc_html__( 'Copyright area top padding', '5th-avenue' ),
	'section'	 => 'av5_footer_copyright_section',
	'default'	 => '30px',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.site-info-wrap',
			'property'	 => 'padding-top',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.site-info-wrap',
			'function'	 => 'css',
			'property'	 => 'padding-top',
		),
	),
) );
Kirki::add_field( 'av5_theme', array(
	'type'		 => 'dimension',
	'settings'	 => 'footer_copyright_bottom_padding_settings',
	'label'		 => esc_html__( 'Copyright area bottom padding', '5th-avenue' ),
	'section'	 => 'av5_footer_copyright_section',
	'default'	 => '140px',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.site-info-wrap',
			'property'	 => 'padding-bottom',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.site-info-wrap',
			'function'	 => 'css',
			'property'	 => 'padding-bottom',
		),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'footer_copyright_social_icons',
	'label'		 => esc_html__( 'Copyright area Social Icons', '5th-avenue' ),
	'section'	 => 'av5_footer_copyright_section',
	'default'	 => '#a0a9ad',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.site-info .simple-social-icons a:not(.button)',
			'property'	 => 'color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.site-info .simple-social-icons a:not(.button)',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );
Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'footer_copyright_social_icons_hover',
	'label'		 => esc_html__( 'Copyright area Social Icons Hover', '5th-avenue' ),
	'section'	 => 'av5_footer_copyright_section',
	'default'	 => '#6b787f',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.site-info .simple-social-icons a:not(.button):hover',
			'property'	 => 'color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.site-info .simple-social-icons a:not(.button):hover',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'footer_copyright_text_color',
	'label'		 => esc_html__( 'Copyright area text color', '5th-avenue' ),
	'section'	 => 'av5_footer_copyright_section',
	'default'	 => '#9e9e9e',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.site-info, .site-info p',
			'property'	 => 'color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.site-info, .site-info p',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );

/* Links */

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'footer_copyright_links_color',
	'label'		 => esc_html__( 'Links Color', '5th-avenue' ),
	'section'	 => 'av5_footer_copyright_section',
	'default'	 => '#000',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.site-info a:not(.button)',
			'property'	 => 'color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.site-info a:not(.button)',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'footer_copyright_links_underline_color',
	'label'		 => esc_html__( 'Links Underline Color', '5th-avenue' ),
	'section'	 => 'av5_footer_copyright_section',
	'default'	 => '#000',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.links__style--underlined-left-to-right-2 .site-info a:after,.link-style--animated-left-2 .site-info a:before',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => '.site-footer .menu-footer-container .menu a:after,.site-info-wrap .menu a:after',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => '.links__style--underlined .site-info-wrap a,.links__style--underlined .site-footer .menu-footer-container .menu a,.links__style--underlined .site-info-wrap .menu a',
			'property'	 => 'box-shadow',
			'prefix'	 => 'inset 0 -1px 0 0 ',
		),
		array(
			'element'	 => '.links__style--underlined-fade .site-info-wrap a,.links__style--underlined-fade .site-footer .menu-footer-container .menu a,.links__style--underlined-fade .site-info-wrap .menu a',
			'property'	 => 'box-shadow',
			'prefix'	 => 'inset 0 -1px 0 0 ',
		),
		array(
			'element'	 => '.links__style--underlined-left-to-right-2 .site-info-wrap a:before,.links__style--underlined-left-to-right-2 .site-footer .menu-footer-container .menu a:before,.links__style--underlined-left-to-right-2 .site-info-wrap .menu a:before',
			'property'	 => 'background-color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.links__style--underlined-left-to-right-2 .site-info a:after,.link-style--animated-left-2 .site-info a:before',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => '.site-footer .menu-footer-container .menu a:after,.site-info-wrap .menu a:after',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => '.links__style--underlined .site-info-wrap a,.links__style--underlined .site-footer .menu-footer-container .menu a,.links__style--underlined .site-info-wrap .menu a',
			'function'	 => 'css',
			'property'	 => 'box-shadow',
			'prefix'	 => 'inset 0 -1px 0 0 ',
		),
		array(
			'element'	 => '.links__style--underlined-fade .site-info-wrap a,.links__style--underlined-fade .site-footer .menu-footer-container .menu a,.links__style--underlined-fade .site-info-wrap .menu a',
			'function'	 => 'css',
			'property'	 => 'box-shadow',
			'prefix'	 => 'inset 0 -1px 0 0 ',
		),
		array(
			'element'	 => '.links__style--underlined-left-to-right-2 .site-info-wrap a:before,.links__style--underlined-left-to-right-2 .site-footer .menu-footer-container .menu a:before,.links__style--underlined-left-to-right-2 .site-info-wrap .menu a:before',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'footer_copyright_links_hover_color',
	'label'		 => esc_html__( 'Links Hover Color', '5th-avenue' ),
	'section'	 => 'av5_footer_copyright_section',
	'default'	 => '#000',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.site-info a:not(.button):hover',
			'property'	 => 'color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.site-info a:not(.button):hover',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );
Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'footer_copyright_links_hover_underline_color',
	'label'		 => esc_html__( 'Links Hover Underline Color', '5th-avenue' ),
	'section'	 => 'av5_footer_copyright_section',
	'default'	 => '#000',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.site-info a:hover:after, .link-style--animated-left-2 .site-info a:hover:before',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => '.links__style--underlined .site-info-wrap a:hover,.links__style--underlined .site-footer .menu-footer-container .menu a:hover,.links__style--underlined .site-info-wrap .menu a:hover',
			'property'	 => 'box-shadow',
			'prefix'	 => 'inset 0 -1px 0 0 ',
		),
		array(
			'element'	 => '.links__style--underlined-left-to-right .site-info-wrap a:after,.links__style--underlined-left-to-right .site-footer .menu-footer-container .menu a:after,.links__style--underlined-left-to-right .site-info-wrap .menu a:after',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => '.links__style--underlined-from-bottom .site-info-wrap a:before,.links__style--underlined-from-bottom .site-footer .menu-footer-container .menu a:before,.links__style--underlined-from-bottom .site-info-wrap .menu a:before',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => '.links__style--underlined-left-to-right-2 .site-info-wrap a:after,.links__style--underlined-left-to-right-2 .site-footer .menu-footer-container .menu a:after,.links__style--underlined-left-to-right-2 .site-info-wrap .menu a:after',
			'property'	 => 'background-color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.site-info a:hover:after, .link-style--animated-left-2 .site-info a:hover:before',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => '.links__style--underlined .site-info-wrap a:hover,.links__style--underlined .site-footer .menu-footer-container .menu a:hover,.links__style--underlined .site-info-wrap .menu a:hover',
			'function'	 => 'css',
			'property'	 => 'box-shadow',
			'prefix'	 => 'inset 0 -1px 0 0 ',
		),
		array(
			'element'	 => '.links__style--underlined-left-to-right .site-info-wrap a:after,.links__style--underlined-left-to-right .site-footer .menu-footer-container .menu a:after,.links__style--underlined-left-to-right .site-info-wrap .menu a:after',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => '.links__style--underlined-from-bottom .site-info-wrap a:before,.links__style--underlined-from-bottom .site-footer .menu-footer-container .menu a:before,.links__style--underlined-from-bottom .site-info-wrap .menu a:before',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => '.links__style--underlined-left-to-right-2 .site-info-wrap a:after,.links__style--underlined-left-to-right-2 .site-footer .menu-footer-container .menu a:after,.links__style--underlined-left-to-right-2 .site-info-wrap .menu a:after',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );

Kirki::add_section( 'av5_footer_newsletter_section', array(
	'priority'	 => 60,
	'title'		 => esc_html__( 'Footer Newsletter', '5th-avenue' ),
	'panel'		 => 'footer_panel',
) );
Kirki::add_field( 'av5_theme', array(
	'type'		 => 'dimension',
	'settings'	 => 'footer_newsletter_t_padding_settings',
	'label'		 => esc_html__( 'Footer Newsletter Top Padding', '5th-avenue' ),
	'section'	 => 'av5_footer_newsletter_section',
	'default'	 => '100px',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.footer-newsletter',
			'property'	 => 'padding-top',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.footer-newsletter',
			'function'	 => 'css',
			'property'	 => 'padding-top',
		),
	),
) );
Kirki::add_field( 'av5_theme', array(
	'type'		 => 'dimension',
	'settings'	 => 'footer_newsletter_b_padding_settings',
	'label'		 => esc_html__( 'Footer Newsletter Bottom Padding', '5th-avenue' ),
	'section'	 => 'av5_footer_newsletter_section',
	'default'	 => '100px',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.footer-newsletter',
			'property'	 => 'padding-bottom',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.footer-newsletter',
			'function'	 => 'css',
			'property'	 => 'padding-bottom',
		),
	),
) );
Kirki::add_field( 'av5_theme', array(
	'type'			 => 'select',
	'settings'		 => 'footer_newsletter_style',
	'label'			 => esc_html__( 'Footer Newsletter Input Style', '5th-avenue' ),
	'description'	 => esc_html__( 'Set style for input, select, textarea and other form elements in newsletter section above the footer.', '5th-avenue' ),
	'section'		 => 'av5_footer_newsletter_section',
	'default'		 => 'flat-input',
	'priority'		 => 10,
	'choices'		 => array(
		'flat-input'		 => esc_html__( 'Flat', '5th-avenue' ),
		'underline-input'	 => esc_html__( 'Underlined', '5th-avenue' ),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color',
	'settings'	 => 'footer_newsletter_button_color',
	'label'		 => esc_html__( 'Footer Newsletter Button Color', '5th-avenue' ),
	'section'	 => 'av5_footer_newsletter_section',
	'default'	 => '#536374',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.footer-newsletter.underline-input .mc4wp-form input[type=submit]',
			'property'	 => 'border-color',
		),
		array(
			'element'	 => '.footer-newsletter.flat-input .mc4wp-form input[type=submit]',
			'property'	 => 'background-color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.footer-newsletter.underline-input .mc4wp-form input[type=submit]',
			'function'	 => 'css',
			'property'	 => 'border-color',
		),
		array(
			'element'	 => '.footer-newsletter.flat-input .mc4wp-form input[type=submit]',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );
Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color',
	'settings'	 => 'footer_newsletter_button_text',
	'label'		 => esc_html__( 'Footer Newsletter Button Text Color', '5th-avenue' ),
	'section'	 => 'av5_footer_newsletter_section',
	'default'	 => '#536374',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.footer-newsletter.underline-input .mc4wp-form input[type=submit]',
			'property'	 => 'color',
		),
		array(
			'element'	 => '.footer-newsletter.flat-input .mc4wp-form input[type=submit]',
			'property'	 => 'color',
		),
		array(
			'element'	 => '.footer-newsletter .mc4wp-form input[type=submit]',
			'property'	 => 'color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.footer-newsletter.underline-input .mc4wp-form input[type=submit]',
			'function'	 => 'css',
			'property'	 => 'color',
		),
		array(
			'element'	 => '.footer-newsletter.flat-input .mc4wp-form input[type=submit]',
			'function'	 => 'css',
			'property'	 => 'color',
		),
		array(
			'element'	 => '.footer-newsletter .mc4wp-form input[type=submit]',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'switch',
	'settings'	 => 'footer_newsletter_btn_padding',
	'label'		 => esc_html__( 'Remove Space between input and button', '5th-avenue' ),
	'section'	 => 'av5_footer_newsletter_section',
	'default'	 => 0,
	'priority'	 => 10,
) );

Kirki::add_field( 'av5_theme', array(
	'type'			 => 'switch',
	'settings'		 => 'footer_newsletter_white_style',
	'label'			 => esc_html__( 'Newsletter White Style', '5th-avenue' ),
	'description'	 => esc_html__( 'Make all text and borders white colored for footer newsletter block. Useful on dark backgrounds.', '5th-avenue' ),
	'section'		 => 'av5_footer_newsletter_section',
	'default'		 => 0,
	'priority'		 => 10,
) );

Kirki::add_field( 'av5_theme', array(
	'type'			 => 'switch',
	'settings'		 => 'footer_newsletter_small_form',
	'label'			 => esc_html__( 'Small/Wide form', '5th-avenue' ),
	'description'	 => esc_html__( 'Enable to decrease newsletter form width', '5th-avenue' ),
	'section'		 => 'av5_footer_newsletter_section',
	'default'		 => 0,
	'priority'		 => 10,
) );

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'footer_newsletter_background_overlay',
	'label'		 => esc_html__( 'Footer Newsletter Background Overlay Color', '5th-avenue' ),
	'section'	 => 'av5_footer_newsletter_section',
	'default'	 => 'rgba(0,0,0,0)',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.footer-newsletter:after',
			'property'	 => 'background-color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.footer-newsletter:after',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'background',
	'settings'	 => 'footer_newsletter_background',
	'label'		 => esc_html__( 'Footer Newsletter Background', '5th-avenue' ),
	'section'	 => 'av5_footer_newsletter_section',
	'default'	 => array(
		'background-color'		 => '#ffffff',
		'background-repeat'		 => 'no-repeat',
		'background-position'	 => 'center-center',
		'background-size'		 => 'cover',
		'background-attachment'	 => 'scroll',
	),
	'priority'	 => 62,
	'output'	 => array(
		array(
			'element' => '.footer-newsletter',
		),
	),
) );
