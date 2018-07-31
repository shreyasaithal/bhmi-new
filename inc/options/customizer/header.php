<?php
/**
 * General Settings for cutomizer.
 *
 * @package           5th-Avenue\Option
 * @subpackage        Redux
 * @version 1.0.1
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

Kirki::add_panel( 'header_panel', array(
	'priority'		 => 20,
	'title'			 => esc_html__( 'Header', '5th-avenue' ),
	'description'	 => esc_html__( 'My Description is here', '5th-avenue' ),
) );

Kirki::add_section( 'av5_header_general_section', array(
	'priority'	 => 10,
	'title'		 => esc_html__( 'Header General', '5th-avenue' ),
	'panel'		 => 'header_panel',
) );


Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'header_background_color',
	'label'		 => esc_html__( 'Header Background Color', '5th-avenue' ),
	'section'	 => 'av5_header_general_section',
	'default'	 => '#fff',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '#header.header .header-main',
			'property'	 => 'background-color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '#header.header .header-main',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );
Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'header_menu_below_background_color',
	'label'		 => esc_html__( 'Menu below header Background Color', '5th-avenue' ),
	'section'	 => 'av5_header_general_section',
	'default'	 => '#fff',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '#header.header .menu-under-header--wrapper',
			'property'	 => 'background-color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '#header.header .menu-under-header--wrapper',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'			 => 'switch',
	'settings'		 => 'header_white-style',
	'label'			 => esc_html__( 'Header White Style', '5th-avenue' ),
	'description'	 => esc_html__( 'This will override color settings for all header elements for all pages.', '5th-avenue' ),
	'section'		 => 'av5_header_general_section',
	'default'		 => 0,
	'priority'		 => 10,
) );

Kirki::add_field( 'av5_theme', array(
	'type'			 => 'switch',
	'settings'		 => 'header_shadow_enable',
	'label'			 => esc_html__( 'Show Header Shadow', '5th-avenue' ),
	'description'	 => esc_html__( 'Shadow below the header', '5th-avenue' ),
	'section'		 => 'av5_header_general_section',
	'default'		 => 0,
	'priority'		 => 10,
) );

Kirki::add_field( 'av5_theme', array(
	'type'				 => 'color-alpha',
	'settings'			 => 'header_shadow_color',
	'label'				 => esc_html__( 'Header Shadow Color', '5th-avenue' ),
	'section'			 => 'av5_header_general_section',
	'default'			 => 'rgba(0, 0, 0, 0.3)',
	'priority'			 => 10,
	'transport'			 => 'postMessage',
	'output'			 => array(
		array(
			'element'	 => '#header.header.header--shadow-on .header-main',
			'property'	 => 'box-shadow',
			'prefix'	 => '-2px 2px 55px -20px ',
		),
	),
	'js_vars'			 => array(
		array(
			'element'	 => '#header.header.header--shadow-on .header-main',
			'property'	 => 'box-shadow',
			'prefix'	 => '-2px 2px 55px -20px ',
		),
	),
	'active_callback'	 => array(
		array(
			'setting'	 => 'header_shadow_enable',
			'operator'	 => '==',
			'value'		 => true,
		),
	),
) );


Kirki::add_field( 'av5_theme', array(
	'type'			 => 'switch',
	'settings'		 => 'header_border_enable',
	'label'			 => esc_html__( 'Show Header Border', '5th-avenue' ),
	'description'	 => esc_html__( 'Border below the header', '5th-avenue' ),
	'section'		 => 'av5_header_general_section',
	'default'		 => 0,
	'priority'		 => 10,
) );

Kirki::add_field( 'av5_theme', array(
	'type'				 => 'color-alpha',
	'settings'			 => 'header_border_color',
	'label'				 => esc_html__( 'Header Border Color', '5th-avenue' ),
	'description'		 => esc_html__( 'Color of the border below the header.', '5th-avenue' ),
	'section'			 => 'av5_header_general_section',
	'default'			 => '#e0e0e0',
	'priority'			 => 10,
	'transport'			 => 'postMessage',
	'output'			 => array(
		array(
			'element'	 => '#header.header.header--border-on .header-main',
			'property'	 => 'border-bottom',
			'prefix'	 => ' solid 1px',
		),
	),
	'js_vars'			 => array(
		array(
			'element'	 => '#header.header.header--border-on .header-main',
			'property'	 => 'border-bottom',
			'prefix'	 => ' solid 1px',
		),
	),
	'active_callback'	 => array(
		array(
			'setting'	 => 'header_border_enable',
			'operator'	 => '==',
			'value'		 => true,
		),
	),
) );


/* Header Text */
Kirki::add_field( 'av5_header_text_title', array(
	'type'		 => 'custom',
	'settings'	 => 'custom_title_header_text',
	'label'		 => '',
	'section'	 => 'av5_header_general_section',
	'default'	 => '<div class="options-title-divider">Text</div>',
) );

Kirki::add_field( 'av5_theme', array(
	'type'			 => 'color-alpha',
	'settings'		 => 'header_text_color',
	'label'			 => esc_html__( 'Header Text Color', '5th-avenue' ),
	'description'	 => esc_html__( 'Color of the text for additional content blocks and other text elements.', '5th-avenue' ),
	'section'		 => 'av5_header_general_section',
	'default'		 => '#737373',
	'priority'		 => 10,
	'output'		 => array(
		array(
			'element'	 => array( '.header-item .text', 'header .header-item:not(.additional-text) a .text', 'header .header-item.wishlist > span', 'header .header-item.wishlist .wishlist_products_counter_number', 'header .header-item.wishlist .wishlist_products_counter > span', 'header .header-item.additional-text', '.header-main .header-item.additional-text' ),
			'property'	 => 'color',
		),
	),
	'transport'		 => 'postMessage',
	'js_vars'		 => array(
		array(
			'element'	 => array( '.header-item .text', 'header .header-item:not(.additional-text) a .text', 'header .header-item.wishlist > span', 'header .header-item.wishlist .wishlist_products_counter_number', 'header .header-item.wishlist .wishlist_products_counter > span', 'header .header-item.additional-text', '.header-main .header-item.additional-text' ),
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'header_text_bg_color',
	'label'		 => esc_html__( 'Text with Rounded Bg Color', '5th-avenue' ),
	'section'	 => 'av5_header_general_section',
	'default'	 => '#eaeaea',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => array( '.header_cart_text--circle .header__item.cart .widget_shopping_cart_counter.text', '.header_cart_text--circle .wishlist_products_counter_number' ),
			'property'	 => 'background-color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => array( '.header_cart_text--circle .header__item.cart .widget_shopping_cart_counter.text', '.header_cart_text--circle .wishlist_products_counter_number' ),
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'			 => 'color-alpha',
	'settings'		 => 'header_links_color',
	'label'			 => esc_html__( 'Header Links Color', '5th-avenue' ),
	'description'	 => esc_html__( 'Color of the links in header content areas.', '5th-avenue' ),
	'section'		 => 'av5_header_general_section',
	'default'		 => '#000',
	'priority'		 => 10,
	'output'		 => array(
		array(
			'element'	 => '#header.header .header-main .header-item.additional-text a',
			'property'	 => 'color',
		),
	),
	'transport'		 => 'postMessage',
	'js_vars'		 => array(
		array(
			'element'	 => '#header.header .header-main .header-item.additional-text a',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'			 => 'color-alpha',
	'settings'		 => 'header_links_hover_color',
	'label'			 => esc_html__( 'Header Links Hover Color', '5th-avenue' ),
	'description'	 => esc_html__( 'Color of the links hover state in header content areas.', '5th-avenue' ),
	'section'		 => 'av5_header_general_section',
	'default'		 => '#000',
	'priority'		 => 10,
	'output'		 => array(
		array(
			'element'	 => '#header.header .header-main .header-item.additional-text a:hover',
			'property'	 => 'color',
		),
	),
	'transport'		 => 'postMessage',
	'js_vars'		 => array(
		array(
			'element'	 => '#header.header .header-main .header-item.additional-text a:hover',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );



/* Header Icons */
Kirki::add_field( 'av5_header_icons_title', array(
	'type'		 => 'custom',
	'settings'	 => 'custom_title_header_icons',
	'label'		 => '',
	'section'	 => 'av5_header_general_section',
	'default'	 => '<div class="options-title-divider">Icons</div>',
) );

/* todo! Add hamburger settings (in styles.php) */
Kirki::add_field( 'av5_theme', array(
	'type'			 => 'color-alpha',
	'settings'		 => 'header-icons-color',
	'label'			 => esc_html__( 'Header Icons Color', '5th-avenue' ),
	'description'	 => esc_html__( 'Choose color of the header elements icons.', '5th-avenue' ),
	'section'		 => 'av5_header_general_section',
	'default'		 => '#000000',
	'priority'		 => 10,
	'output'		 => array(
		array(
			'element'	 => array( '#header.header .header-main .header-item .header-icon', '#header.header .header-main .header-item.wishlist a.wishlist_products_counter:before', '.header-item.wishlist .wishlist_products_counter .wishlist-icon:before,.header-item.wishlist a.wishlist_products_counter:before', 'div.wishlist_products_counter.top_wishlist-font-icon.wishlist-counter-with-products i.wishlist-icon:before' ),
			'property'	 => 'color',
		),
		array(
			'element'	 => '#header.header .header-main .header-item .hamburger-menu-icon-small span',
			'property'	 => 'background-color',
		),
	),
	'transport'		 => 'postMessage',
	'js_vars'		 => array(
		array(
			'element'	 => array( '#header.header .header-main .header-item .header-icon', '#header.header .header-main .header-item.wishlist a.wishlist_products_counter:before', '.header-item.wishlist .wishlist_products_counter .wishlist-icon:before,.header-item.wishlist a.wishlist_products_counter:before', 'div.wishlist_products_counter.top_wishlist-font-icon.wishlist-counter-with-products i.wishlist-icon:before' ),
			'function'	 => 'css',
			'property'	 => 'color',
		),
		array(
			'element'	 => '#header.header .header-main .header-item .hamburger-menu-icon-small span',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );


Kirki::add_field( 'av5_theme', array(
	'type'			 => 'color-alpha',
	'settings'		 => 'header-icons-hover-color',
	'label'			 => esc_html__( 'Header Icons Hover Color', '5th-avenue' ),
	'description'	 => esc_html__( 'Choose hover color of the header elements icons.', '5th-avenue' ),
	'section'		 => 'av5_header_general_section',
	'default'		 => 'rgba(0, 0, 0, 0.6)',
	'priority'		 => 10,
	'output'		 => array(
		array(
			'element'	 => array( '#header.header .header-main .header-item:hover .header-icon', '#header.header .header-main .header-item.wishlist:hover a.wishlist_products_counter:before', '.header-item.wishlist:hover .wishlist_products_counter .wishlist-icon:before,.header-item.wishlist:hover a.wishlist_products_counter:before' ),
			'property'	 => 'color',
		),
		array(
			'element'	 => '#header.header .header-main .header-item:hover .hamburger-menu-icon-small span',
			'property'	 => 'background-color',
		),
	),
	'transport'		 => 'postMessage',
	'js_vars'		 => array(
		array(
			'element'	 => array( '#header.header .header-main .header-item:hover .header-icon', '#header.header .header-main .header-item.wishlist:hover a.wishlist_products_counter:before', '.header-item.wishlist:hover .wishlist_products_counter .wishlist-icon:before,.header-item.wishlist:hover a.wishlist_products_counter:before' ),
			'function'	 => 'css',
			'property'	 => 'color',
		),
		array(
			'element'	 => '#header.header .header-main .header-item:hover .hamburger-menu-icon-small span',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );


/* HEADER > MENU STYLES --------------------------------- */

Kirki::add_section( 'av5_header_menu_section', array(
	'priority'	 => 10,
	'title'		 => esc_html__( 'Menu Styles', '5th-avenue' ),
	'panel'		 => 'header_panel',
) );

Kirki::add_field( 'av5_theme', array(
	'type'			 => 'select',
	'settings'		 => 'header-main-menu-style',
	'label'			 => esc_html__( 'Choose Menu style and hover', '5th-avenue' ),
	'description'	 => esc_html__( 'You can choose between various predefined animations for menu items.', '5th-avenue' ),
	'help'			 => '',
	'section'		 => 'av5_header_menu_section',
	'default'		 => 'simple-menu',
	'priority'		 => 10,
	'transport'		 => 'postMessage',
	'choices'		 => array(
		'simple-menu'								 => esc_html__( 'Simple Color Hover', '5th-avenue' ),
		'underline-menu-style'						 => esc_html__( 'Underline', '5th-avenue' ),
		'anim-underline-menu-style strikethrough'	 => esc_html__( 'Strikethrough', '5th-avenue' ),
		'anim-underline-menu-style'					 => esc_html__( 'Animated Underline', '5th-avenue' ),
		'underline-from-bottom-menu-style'			 => esc_html__( 'Animated Underline from Bottom', '5th-avenue' ),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'			 => 'switch',
	'settings'		 => 'header-main-menu-arrows',
	'label'			 => esc_html__( 'Menu Arrow', '5th-avenue' ),
	'description'	 => esc_html__( 'Show arrow for menu items with child items (drop down)', '5th-avenue' ),
	'section'		 => 'av5_header_menu_section',
	'default'		 => 1,
	'priority'		 => 10,
	'transport'		 => 'refresh',
) );

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'header-menu-color',
	'label'		 => esc_html__( 'Header Menu Text Color', '5th-avenue' ),
	'section'	 => 'av5_header_menu_section',
	'default'	 => '#000000',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.main-navigation .nav-menu > li > a, #slide-out-menu-content--mobile ul li a, #slide-out-menu-content--mobile .fa-angle-down',
			'property'	 => 'color',
		),
		array(
			'element'	 => '.menu--arrow-on .main-navigation>ul>li.menu-item-has-children:after',
			'property'	 => 'color',
		),
		array(
			'element'	 => '.header-item.slide-out-menu .text',
			'property'	 => 'color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.main-navigation .nav-menu > li > a, #slide-out-menu-content--mobile ul li a, #slide-out-menu-content--mobile .fa-angle-down',
			'function'	 => 'css',
			'property'	 => 'color',
		),
		array(
			'element'	 => '.menu--arrow-on .main-navigation>ul>li.menu-item-has-children:after',
			'function'	 => 'css',
			'property'	 => 'color',
		),
		array(
			'element'	 => '.header-item.slide-out-menu .text',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );


Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'header-menu-hover-color',
	'label'		 => esc_html__( 'Header Menu Text Hover Color', '5th-avenue' ),
	'section'	 => 'av5_header_menu_section',
	'default'	 => '#000000',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.main-navigation .nav-menu > li > a:hover, #slide-out-menu-content--mobile ul li.current_page_item > a, #slide-out-menu-content--mobile li.current_page_item .fa-angle-down',
			'property'	 => 'color',
		),
		array(
			'element'	 => '.main-navigation .nav-menu > li.current_page_item > a',
			'property'	 => 'color',
		),
		array(
			'element'	 => '.menu--arrow-on .main-navigation>ul>li.menu-item-has-children:hover:after',
			'property'	 => 'color',
		),
		array(
			'element'	 => '.menu--arrow-on .main-navigation>ul>li.current_page_item.menu-item-has-children:after',
			'property'	 => 'color',
		),
		array(
			'element'	 => '.main-navigation .nav-menu > li:hover > a',
			'property'	 => 'color',
		),
		array(
			'element'	 => '.header-item.slide-out-menu:hover .text',
			'property'	 => 'color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.main-navigation .nav-menu > li > a:hover, #slide-out-menu-content--mobile ul li.current_page_item > a, #slide-out-menu-content--mobile li.current_page_item .fa-angle-down',
			'function'	 => 'css',
			'property'	 => 'color',
		),
		array(
			'element'	 => '.main-navigation .nav-menu > li.current_page_item > a',
			'function'	 => 'css',
			'property'	 => 'color',
		),
		array(
			'element'	 => '.menu--arrow-on .main-navigation>ul>li.menu-item-has-children:hover:after',
			'function'	 => 'css',
			'property'	 => 'color',
		),
		array(
			'element'	 => '.menu--arrow-on .main-navigation>ul>li.current_page_item.menu-item-has-children:after',
			'function'	 => 'css',
			'property'	 => 'color',
		),
		array(
			'element'	 => '.main-navigation .nav-menu > li:hover > a',
			'function'	 => 'css',
			'property'	 => 'color',
		),
		array(
			'element'	 => '.header-item.slide-out-menu:hover .text',
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'			 => 'color-alpha',
	'settings'		 => 'header-menu-underline-color',
	'label'			 => esc_html__( 'Header Menu Underline Color', '5th-avenue' ),
	'description'	 => esc_html__( '* For menu styles with underline', '5th-avenue' ),
	'section'		 => 'av5_header_menu_section',
	'default'		 => '#222222',
	'priority'		 => 10,
	'output'		 => array(
		array(
			'element'	 => '.main-navigation .nav-menu > li > a:after',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => '.main-navigation .nav-menu > li > a:hover:after',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => '.main-navigation .nav-menu > li.current_page_item > a:after',
			'property'	 => 'background-color',
		),
	),
	'transport'		 => 'postMessage',
	'js_vars'		 => array(
		array(
			'element'	 => '.main-navigation .nav-menu > li > a:after',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => '.main-navigation .nav-menu > li > a:hover:after',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => '.main-navigation .nav-menu > li.current_page_item > a:after',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );

/* Header Submenu  */

Kirki::add_field( 'av5_header_submenu_title', array(
	'type'		 => 'custom',
	'settings'	 => 'custom_title_header_submenu',
	'label'		 => '',
	'section'	 => 'av5_header_menu_section',
	'default'	 => '<div class="options-title-divider">Submenu</div>',
) );


Kirki::add_field( 'av5_theme', array(
	'type'			 => 'color-alpha',
	'settings'		 => 'header_dropdowns_background_color',
	'label'			 => esc_html__( 'Header Drop Downs Background', '5th-avenue' ),
	'description'	 => esc_html__( 'Color of the submenu and header items drop down background.', '5th-avenue' ),
	'section'		 => 'av5_header_menu_section',
	'default'		 => '#fff',
	'priority'		 => 10,
	'output'		 => array(
		array(
			'element'	 => '.main-navigation ul:not(.product_list_widget) ul',
			'property'	 => 'background-color',
		),
	),
	'transport'		 => 'postMessage',
	'js_vars'		 => array(
		array(
			'element'	 => '.main-navigation ul:not(.product_list_widget) ul',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'switch',
	'settings'	 => 'header_dropdowns_shadow_enable',
	'label'		 => esc_html__( 'Show shadow for header Drop Downs', '5th-avenue' ),
	'section'	 => 'av5_header_menu_section',
	'default'	 => '1',
	'priority'	 => 10,
) );

Kirki::add_field( 'av5_theme', array(
	'type'				 => 'color-alpha',
	'settings'			 => 'header_dropdowns_shadow_color',
	'label'				 => esc_html__( 'Header Drop Downs Shadow', '5th-avenue' ),
	'description'		 => esc_html__( 'Color of the submenu and header items drop down shadow.', '5th-avenue' ),
	'section'			 => 'av5_header_menu_section',
	'default'			 => 'rgba(0, 0, 0, 0.07)',
	'priority'			 => 10,
	'transport'			 => 'postMessage',
	'output'			 => array(
		array(
			'element'	 => '.header__drop-downs--shadow-on .main-navigation ul ul',
			'property'	 => 'box-shadow',
			'prefix'	 => '0 8px 59px -5px ',
		),
	),
	'transport'			 => 'postMessage',
	'js_vars'			 => array(
		array(
			'element'	 => '.header__drop-downs--shadow-on .main-navigation ul ul',
			'property'	 => 'box-shadow',
			'prefix'	 => '0 8px 59px -5px ',
		),
	),
	'active_callback'	 => array(
		array(
			'setting'	 => 'header_dropdowns_shadow_enable',
			'operator'	 => '==',
			'value'		 => true,
		),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'header_submenu_text_color',
	'label'		 => esc_html__( 'Header Submenu Text', '5th-avenue' ),
	'section'	 => 'av5_header_menu_section',
	'default'	 => '#737373',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => array( '.av5-slide-out-modal .slide-out-menu-additional li.menu-item a', '.main-navigation ul ul a', '#slide-out-menu-content--mobile .fa-angle-down','#slide-out-menu-content--mobile ul li a', '.slideout-anim-underline-menu-style .av5-slide-out-modal .slide-out-menu-additional li.menu-item a' ),
			'property'	 => 'color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => array( '.av5-slide-out-modal .slide-out-menu-additional li.menu-item a', '.main-navigation ul ul a', '#slide-out-menu-content--mobile .fa-angle-down','#slide-out-menu-content--mobile ul li a', '.slideout-anim-underline-menu-style .av5-slide-out-modal .slide-out-menu-additional li.menu-item a' ),
			'function'	 => 'css',
			'property'	 => 'color',
		),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'header_submenu_text_hover_color',
	'label'		 => esc_html__( 'Header Submenu Text Hover', '5th-avenue' ),
	'section'	 => 'av5_header_menu_section',
	'default'	 => '#737373',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.main-navigation ul ul a:hover',
			'property'	 => 'color',
		),
		array(
			'element'	 => '.av5-slide-out-modal .slide-out-menu-additional li.menu-item a:hover',
			'property'	 => 'color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '.main-navigation ul ul a:hover',
			'function'	 => 'css',
			'property'	 => 'color',
		),
		array(
			'element'	 => '.av5-slide-out-modal .slide-out-menu-additional li.menu-item a:hover',
			'property'	 => 'color',
		),
	),
) );
Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'header_submenu_item_underline_hover_color',
	'label'		 => esc_html__( 'Header Submenu Item Underline Hover', '5th-avenue' ),
	'section'	 => 'av5_header_menu_section',
	'default'	 => '#b58672',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => array( '.main-navigation ul ul a:after', '.slideout-anim-underline-menu-style .av5-slide-out-modal .slide-out-menu-additional li.menu-item a:after' ),
			'property'	 => 'background',
		),
		array(
			'element'	 => array( '.av5-slide-out-modal .slide-out-menu-additional li.menu-item a:hover:after', '.av5-slide-out-modal .slide-out-menu-additional li.menu-item a:after', '.main-navigation ul ul a:after', '.main-navigation ul ul a:hover:after' ),
			'property'	 => 'background-color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => array( '.av5-slide-out-modal .slide-out-menu-additional li.menu-item a:hover:after', '.av5-slide-out-modal .slide-out-menu-additional li.menu-item a:after', '.main-navigation ul ul a:after', '.main-navigation ul ul a:hover:after' ),
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
		array(
			'element'	 => array( '.main-navigation ul ul a:after', '.slideout-anim-underline-menu-style .av5-slide-out-modal .slide-out-menu-additional li.menu-item a:after' ),
			'function'	 => 'css',
			'property'	 => 'background',
		),
	),
) );

Kirki::add_section( 'av5_header_sticky_section', array(
	'priority'	 => 10,
	'title'		 => esc_html__( 'Sticky Header', '5th-avenue' ),
	'panel'		 => 'header_panel',
) );
Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'sticky_header_background_color',
	'label'		 => esc_html__( 'Header Background Color', '5th-avenue' ),
	'section'	 => 'av5_header_sticky_section',
	'default'	 => '#fff',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '#header.header.is-sticky .header-main',
			'property'	 => 'background-color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '#header.header.is-sticky .header-main',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );
Kirki::add_field( 'av5_theme', array(
	'type'			 => 'switch',
	'settings'		 => 'sticky_header_shadow_enable',
	'label'			 => esc_html__( 'Show Sticky Header Shadow', '5th-avenue' ),
	'description'	 => esc_html__( 'Shadow below the sticky header', '5th-avenue' ),
	'section'		 => 'av5_header_sticky_section',
	'default'		 => 1,
	'priority'		 => 10,
) );

Kirki::add_field( 'av5_theme', array(
	'type'				 => 'color-alpha',
	'settings'			 => 'sticky_header_shadow_color',
	'label'				 => esc_html__( 'Header Shadow Color', '5th-avenue' ),
	'section'			 => 'av5_header_sticky_section',
	'default'			 => 'rgba(0, 0, 0, 0.3)',
	'priority'			 => 10,
	'transport'			 => 'postMessage',
	'output'			 => array(
		array(
			'element'	 => '#header.header.is-sticky.sticky-header--shadow-on .header-main',
			'property'	 => 'box-shadow',
			'prefix'	 => '-2px 2px 55px -20px ',
		),
	),
	'js_vars'			 => array(
		array(
			'element'	 => '#header.header.is-sticky.sticky-header--shadow-on .header-main',
			'property'	 => 'box-shadow',
			'prefix'	 => '-2px 2px 55px -20px ',
		),
	),
	'active_callback'	 => array(
		array(
			'setting'	 => 'sticky_header_shadow_enable',
			'operator'	 => '==',
			'value'		 => true,
		),
	),
) );


Kirki::add_field( 'av5_theme', array(
	'type'			 => 'switch',
	'settings'		 => 'sticky_header_border_enable',
	'label'			 => esc_html__( 'Show Header Border', '5th-avenue' ),
	'description'	 => esc_html__( 'Border below the header', '5th-avenue' ),
	'section'		 => 'av5_header_sticky_section',
	'default'		 => 1,
	'priority'		 => 10,
) );

Kirki::add_field( 'av5_theme', array(
	'type'				 => 'color-alpha',
	'settings'			 => 'sticky_header_border_color',
	'label'				 => esc_html__( 'Header Border Color', '5th-avenue' ),
	'description'		 => esc_html__( 'Color of the border below the header.', '5th-avenue' ),
	'section'			 => 'av5_header_sticky_section',
	'default'			 => '#e0e0e0',
	'priority'			 => 10,
	'transport'			 => 'postMessage',
	'output'			 => array(
		array(
			'element'	 => '#header.header.is-sticky.sticky-header--border-on .header-main',
			'property'	 => 'border-bottom',
			'prefix'	 => ' solid 1px',
		),
	),
	'js_vars'			 => array(
		array(
			'element'	 => '#header.header.is-sticky.sticky-header--border-on .header-main',
			'property'	 => 'border-bottom',
			'prefix'	 => ' solid 1px',
		),
	),
	'active_callback'	 => array(
		array(
			'setting'	 => 'sticky_header_border_enable',
			'operator'	 => '==',
			'value'		 => true,
		),
	),
) );


/* HEADER > MOBILE  --------------------------------- */

Kirki::add_section( 'av5_header_mobile_section', array(
	'priority'	 => 10,
	'title'		 => esc_html__( 'Mobile', '5th-avenue' ),
	'panel'		 => 'header_panel',
) );



Kirki::add_field( 'av5_theme', array(
	'type'		 => 'color-alpha',
	'settings'	 => 'header_mobile_background_color',
	'label'		 => esc_html__( 'Header Background Color', '5th-avenue' ),
	'section'	 => 'av5_header_mobile_section',
	'default'	 => '#fff',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '#header-mobile .header-mobile-wrap',
			'property'	 => 'background-color',
		),
	),
	'transport'	 => 'postMessage',
	'js_vars'	 => array(
		array(
			'element'	 => '#header-mobile .header-mobile-wrap',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'			 => 'switch',
	'settings'		 => 'header_mobile_shadow_enable',
	'label'			 => esc_html__( 'Show Header Shadow', '5th-avenue' ),
	'description'	 => esc_html__( 'Shadow below the header', '5th-avenue' ),
	'section'		 => 'av5_header_mobile_section',
	'default'		 => 0,
	'priority'		 => 10,
) );

Kirki::add_field( 'av5_theme', array(
	'type'				 => 'color-alpha',
	'settings'			 => 'header_mobile_shadow_color',
	'label'				 => esc_html__( 'Mobile Header Shadow Color', '5th-avenue' ),
	'section'			 => 'av5_header_mobile_section',
	'default'			 => 'rgba(0, 0, 0, 0.3)',
	'priority'			 => 10,
	'transport'			 => 'postMessage',
	'output'			 => array(
		array(
			'element'	 => '#header-mobile.header-mobile--shadow-on .header-mobile-wrap',
			'property'	 => 'box-shadow',
			'prefix'	 => '-2px 2px 55px -20px ',
		),
	),
	'js_vars'			 => array(
		array(
			'element'	 => '#header-mobile.header-mobile--shadow-on .header-mobile-wrap',
			'property'	 => 'box-shadow',
			'prefix'	 => '-2px 2px 55px -20px ',
		),
	),
	'active_callback'	 => array(
		array(
			'setting'	 => 'header_mobile_shadow_enable',
			'operator'	 => '==',
			'value'		 => true,
		),
	),
) );

Kirki::add_field( 'av5_theme', array(
	'type'			 => 'switch',
	'settings'		 => 'header_mobile_border_enable',
	'label'			 => esc_html__( 'Show Mobile Header Border', '5th-avenue' ),
	'description'	 => esc_html__( 'Border below the Mobile header', '5th-avenue' ),
	'section'		 => 'av5_header_mobile_section',
	'default'		 => 0,
	'priority'		 => 10,
) );


Kirki::add_field( 'av5_theme', array(
	'type'				 => 'color-alpha',
	'settings'			 => 'header_mobile_border_color',
	'label'				 => esc_html__( 'Header Border Color', '5th-avenue' ),
	'description'		 => esc_html__( 'Color of the border below the header.', '5th-avenue' ),
	'section'			 => 'av5_header_mobile_section',
	'default'			 => '#e0e0e0',
	'priority'			 => 10,
	'transport'			 => 'postMessage',
	'output'			 => array(
		array(
			'element'	 => '#header-mobile.header-mobile--border-on',
			'property'	 => 'border-bottom',
			'prefix'	 => ' solid 1px',
		),
	),
	'js_vars'			 => array(
		array(
			'element'	 => '#header-mobile.header-mobile--border-on',
			'property'	 => 'border-bottom',
			'prefix'	 => ' solid 1px',
		),
	),
	'active_callback'	 => array(
		array(
			'setting'	 => 'header_mobile_border_enable',
			'operator'	 => '==',
			'value'		 => true,
		),
	),
) );




/* Mobile Header Icons */
Kirki::add_field( 'av5_header_mobile_icons_title', array(
	'type'		 => 'custom',
	'settings'	 => 'custom_title_header_mobile_icons',
	'label'		 => '',
	'section'	 => 'av5_header_mobile_section',
	'default'	 => '<div class="options-title-divider">Icons</div>',
) );


Kirki::add_field( 'av5_theme', array(
	'type'			 => 'color-alpha',
	'settings'		 => 'header_mobile_icons_color',
	'label'			 => esc_html__( 'Header Icons Color', '5th-avenue' ),
	'description'	 => esc_html__( 'Choose color of the header elements icons.', '5th-avenue' ),
	'section'		 => 'av5_header_mobile_section',
	'default'		 => '#000000',
	'priority'		 => 10,
	'output'		 => array(
		array(
			'element'	 => array( '#header-mobile .header-item .header-icon', '#header-mobile .header-item.wishlist a.wishlist_products_counter:before' ),
			'property'	 => 'color',
		),
		array(
			'element'	 => '#header-mobile .header-item .hamburger-menu-icon-small span',
			'property'	 => 'background-color',
		),
	),
	'transport'		 => 'postMessage',
	'js_vars'		 => array(
		array(
			'element'	 => array( '#header-mobile .header-item .header-icon', '#header-mobile .header-item.wishlist a.wishlist_products_counter:before' ),
			'function'	 => 'css',
			'property'	 => 'color',
		),
		array(
			'element'	 => '#header-mobile .header-item .hamburger-menu-icon-small span',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );


Kirki::add_field( 'av5_theme', array(
	'type'			 => 'color-alpha',
	'settings'		 => 'header_mobile_icons_hover_color',
	'label'			 => esc_html__( 'Header Icons Hover Color', '5th-avenue' ),
	'description'	 => esc_html__( 'Choose hover color of the header elements icons.', '5th-avenue' ),
	'section'		 => 'av5_header_mobile_section',
	'default'		 => 'rgba(0, 0, 0, 0.6)',
	'priority'		 => 10,
	'output'		 => array(
		array(
			'element'	 => array( '#header-mobile .header-item:hover .header-icon', '#header-mobile .header-item.wishlist:hover a.wishlist_products_counter:before' ),
			'property'	 => 'color',
		),
		array(
			'element'	 => '#header-mobile .header-item:hover .hamburger-menu-icon-small span',
			'property'	 => 'background-color',
		),
	),
	'transport'		 => 'postMessage',
	'js_vars'		 => array(
		array(
			'element'	 => array( '#header-mobile .header-item:hover .header-icon', '#header-mobile .header-item.wishlist:hover a.wishlist_products_counter:before' ),
			'function'	 => 'css',
			'property'	 => 'color',
		),
		array(
			'element'	 => '#header-mobile .header-item:hover .hamburger-menu-icon-small span',
			'function'	 => 'css',
			'property'	 => 'background-color',
		),
	),
) );
