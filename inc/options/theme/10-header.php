<?php
/**
 * Header option theme
 *
 * @package           5th-Avenue\Option
 * @subpackage        Redux
 * @version 1.0.1
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

$theme_option_sections['header']			 = array(
	'title'	 => esc_html__( 'Header', '5th-avenue' ),
	'id'	 => 'header',
	'icon'	 => 'el el-minus',
);
$theme_option_sections['header-general']	 = array(
	'title'				 => esc_html__( 'General Header Options', '5th-avenue' ),
	'id'				 => 'header-general',
	'subsection'		 => true,
	'customizer_width'	 => '450px',
	'fields'			 => array(
		// General options Start.
		// Header Over Content.
		array(
			'id'		 => 'header-over-content',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Header Over Content', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Use this option for transparent headers. If enabled header will overlay content instead of being placed before it. So you will be able to see i.e. your slideshow through header.', '5th-avenue' ),
			'default'	 => true,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		array(
			'id'		 => 'header-always-on-top',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Header Above Passepartout Frame', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Show header always on top and above passepartout layout framses that can be set in general settings.', '5th-avenue' ),
			'default'	 => true,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		// Full Width Header.
		array(
			'id'		 => 'full-width-header',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Full Width Header', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'You can set the header to be edge to edge rather than contained.', '5th-avenue' ),
			'default'	 => true,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		// Header Paddings.
		array(
			'id'			 => 'header-height',
			'type'			 => 'dimensions',
			'units'			 => array( 'px' ),
			'units_extended' => 'true',
			'title'			 => esc_html__( 'Header Height', '5th-avenue' ),
			'subtitle'		 => esc_html__( 'Use this option to change header height', '5th-avenue' ),
			'width'			 => false,
			'default'		 => array(
				'height' => 95,
			),
		),
		array(
			'id'			 => 'header-side-paddings',
			'type'			 => 'dimensions',
			'units'			 => array( 'px' ), // You can specify a unit value. Possible: px, em, %
			'units_extended' => 'true', // Allow users to select any type of unit.
			'title'			 => esc_html__( 'Header Side Paddings', '5th-avenue' ),
			'subtitle'		 => esc_html__( 'Use this option to change header left and right paddings', '5th-avenue' ),
			'height'		 => false,
			'default'		 => array(
				'width' => 40,
			),
		),
		array(
			'id'			 => 'header-items-spacing',
			'type'			 => 'dimensions',
			'units'			 => array( 'px' ), // You can specify a unit value. Possible: px, em, %
			'units_extended' => 'true', // Allow users to select any type of unit.
			'title'			 => esc_html__( 'Spacing between header items', '5th-avenue' ),
			'height'		 => false,
			'default'		 => array(
				'width' => 6,
			),
		),
		array(
			'id'			 => 'menu-items-spacing',
			'type'			 => 'dimensions',
			'units'			 => array( 'px' ), // You can specify a unit value. Possible: px, em, %
			'units_extended' => 'true', // Allow users to select any type of unit.
			'title'			 => esc_html__( 'Spacing between menu items', '5th-avenue' ),
			'height'		 => false,
			'default'		 => array(
				'width' => 30,
			),
		),
	),
);
$theme_option_sections['header-layout']	 = array(
	'title'				 => esc_html__( 'Header Layout', '5th-avenue' ),
	'id'				 => 'header-layout',
	'subsection'		 => true,
	'customizer_width'	 => '450px',
	'fields'			 => array(
		array(
			'id'		 => 'header-layout-select',
			'type'		 => 'image_select',
			'title'		 => esc_html__( 'Header Layout', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Choose header layout as a starting base for building your header.', '5th-avenue' ),
			'options'	 => array(
				'header-v1'	 => array(
					'alt'	 => esc_html__( 'Layout 1', '5th-avenue' ),
					'img'	 => get_template_directory_uri() . '/inc/options/assets/img/header-v1.png',
				),
				'header-v2'	 => array(
					'alt'	 => esc_html__( 'Layout 2', '5th-avenue' ),
					'img'	 => get_template_directory_uri() . '/inc/options/assets/img/header-v2.png',
				),
				'header-v3'	 => array(
					'alt'	 => esc_html__( 'Layout 3', '5th-avenue' ),
					'img'	 => get_template_directory_uri() . '/inc/options/assets/img/header-v3.png',
				),
				'header-v4'	 => array(
					'alt'	 => esc_html__( 'Layout 4', '5th-avenue' ),
					'img'	 => get_template_directory_uri() . '/inc/options/assets/img/header-v4.png',
				),
				'header-v5'	 => array(
					'alt'	 => esc_html__( 'Layout 5', '5th-avenue' ),
					'img'	 => get_template_directory_uri() . '/inc/options/assets/img/header-v5.png',
				),
			),
			'default'	 => 'header-v1',
		),
		array(
			'id'		 => 'header-elements-sorter',
			'type'		 => 'sorter',
			'title'		 => 'Header Elements',
			'subtitle'	 => 'Organize how you want the element to appear on the header.',
			'options'	 => array(
				'Header Left'	 => array(),
				'Header Right'	 => array(
					'search'	 => 'Search',
					'myaccount'	 => 'My account',
					'wishlist'	 => 'Wishlist',
					'cart'		 => 'Cart',
				),
				'Disabled'		 => array(
					'textarea1'	 => 'Text area 1',
					'textarea2'	 => 'Text area 2',
					'slideout'	 => 'Slide Out Menu',
				),
			),
		),
		array(
			'id'		 => 'header-layout-textarea1',
			'type'		 => 'editor',
			'title'		 => esc_html__( 'Header Additional Text 1', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'You can add additional information in header area. Enable Text 1 block in selector abowe to show this content.', '5th-avenue' ),
		),
		array(
			'id'		 => 'header-layout-textarea2',
			'type'		 => 'editor',
			'title'		 => esc_html__( 'Header Additional Text 2', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'You can add additional information in header area. Enable Text 2 block in selector abowe to show this content.', '5th-avenue' ),
		),
		array(
			'id'		 => 'header-cart-type',
			'type'		 => 'button_set',
			'title'		 => esc_html__( 'Mini Cart Style', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Choose style for mini cart in header', '5th-avenue' ),
			'options'	 => array(
				'drop-down'		 => esc_html__( 'Drop Down', '5th-avenue' ),
				'canvas-slide'	 => esc_html__( 'Slide', '5th-avenue' ),
			),
			'default'	 => 'canvas-slide',
		),
		array(
			'id'		 => 'header-cart-promo-text',
			'type'		 => 'text',
			'title'		 => esc_html__( 'Mini Cart Promo text', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Short promo text at the top of the mini cart', '5th-avenue' ),
			'default'	 => '',
		),
		array(
			'id'		 => 'header-burger-menu-type',
			'type'		 => 'button_set',
			'title'		 => esc_html__( 'Burger Menu Style', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Choose style for burger menu in header', '5th-avenue' ),
			'options'	 => array(
				'header-burger-menu-canvas-slide' => esc_html__( 'Slide', '5th-avenue' ),
			),
			'default'	 => 'header-burger-menu-canvas-slide',
		),
		array(
			'id'		 => 'header-burger-menu-hover',
			'type'		 => 'button_set',
			'required'	 => array( 'header-burger-menu-type', '=', 'header-burger-menu-canvas-slide' ),
			'title'		 => esc_html__( 'Burger menu - show on Hover or Click', '5th-avenue' ),
			'options'	 => array(
				'slideout-menu--hover'	 => esc_html__( 'Hover', '5th-avenue' ),
				'slideout-menu--click'	 => esc_html__( 'Click', '5th-avenue' ),
			),
			'default'	 => 'slideout-menu--click',
		),
		array(
			'id'		 => 'header-burger-menu-icon-style',
			'type'		 => 'button_set',
			'required'	 => array( 'header-burger-menu-type', '=', 'header-burger-menu-canvas-slide' ),
			'title'		 => esc_html__( 'Burger menu icons style', '5th-avenue' ),
			'options'	 => array(
				'av5-menu-icon__style--threelines'	 => esc_html__( 'Three lines', '5th-avenue' ),
				'av5-menu-icon__style--twolines'	 => esc_html__( 'Two lines', '5th-avenue' ),
			),
			'default'	 => 'av5-menu-icon__style--threelines',
		),
		array(
			'id'		 => 'header-burger-menu-text',
			'type'		 => 'text',
			'title'		 => esc_html__( 'Burger menu button text', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Leave empty if you want to show only icon', '5th-avenue' ),
			'default'	 => '',
		),
		array(
			'id'		 => 'header-burger-menu-textarea',
			'type'		 => 'editor',
			'title'		 => esc_html__( 'Burger Menu Additional Content', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'You can add additional content to the header burder (slideout) menu area. Content will appear below menu.', '5th-avenue' ),
		),
		array(
			'id'		 => 'header-login-type',
			'type'		 => 'button_set',
			'title'		 => esc_html__( 'Header Login Style', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Choose style for login link in header', '5th-avenue' ),
			'options'	 => array(
				'header-login-link'			 => esc_html__( 'Link to Page', '5th-avenue' ),
				'header-login-fullscreen'	 => esc_html__( 'Fullscreen Overlay', '5th-avenue' ),
			),
			'default'	 => 'header-login-link',
		),
		array(
			'id'		 => 'header-search-icon-type',
			'type'		 => 'button_set',
			'title'		 => esc_html__( 'Header Search Style', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Choose search input style. Only icon enables various overlay search styles.', '5th-avenue' ),
			'options'	 => array(
				'icon-search' => esc_html__( 'Only Icon', '5th-avenue' ),
			/* 'input-search'		 => esc_html__( 'Search with Input Field', '5th-avenue' ), */
			),
			'default'	 => 'icon-search',
		),
		array(
			'id'		 => 'header-search-type',
			'required'	 => array( 'header-search-icon-type', '=', 'icon-search' ),
			'type'		 => 'button_set',
			'title'		 => esc_html__( 'Search Input Style', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Choose search input style', '5th-avenue' ),
			'options'	 => array(
				'search-slideout'	 => esc_html__( 'Slide from top', '5th-avenue' ),
				'fullscreen-search'	 => esc_html__( 'Fullscreen Search', '5th-avenue' ),
			),
			'default'	 => 'search-slideout',
		),
		array(
			'id'		 => 'header-search-hover',
			'type'		 => 'button_set',
			'title'		 => esc_html__( 'Show search slideout on Hover or Click', '5th-avenue' ),
			'options'	 => array(
				'slideout-search--hover' => esc_html__( 'Hover', '5th-avenue' ),
				'slideout-search--click' => esc_html__( 'Click', '5th-avenue' ),
			),
			'default'	 => 'slideout-search--click',
		),
		array(
			'id'		 => 'header-search-product',
			'type'		 => 'button_set',
			'title'		 => esc_html__( 'Header Search Post Type', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Set whether you would like the site search limited to products, or all content.', '5th-avenue' ),
			'desc'		 => '',
			'options'	 => array(
				'any'		 => esc_html__( 'All', '5th-avenue' ),
				'product'	 => esc_html__( 'Products', '5th-avenue' ),
			),
			'default'	 => 'any',
		),
		array(
			'id'		 => 'header-search-product-cats',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Product categories in search', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Show product categories in fullscreen search', '5th-avenue' ),
			'default'	 => false,
			'required'	 => array( 'header-search-product', '=', 'product' ),
			'on'		 => esc_html__( 'Show', '5th-avenue' ),
			'off'		 => esc_html__( 'Hide', '5th-avenue' ),
		),
		array(
			'id'		 => 'header-cart-counter-show',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Cart Icon Counter', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Show / Hide product counter near cart icon', '5th-avenue' ),
			'default'	 => false,
			'on'		 => esc_html__( 'Show', '5th-avenue' ),
			'off'		 => esc_html__( 'Hide', '5th-avenue' ),
		),
		array(
			'id'		 => 'header-cart-text-circle',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Cart Icon Text with Bg', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Show counter text near for cart or wishlist icons with rounded background', '5th-avenue' ),
			'default'	 => true,
			'on'		 => esc_html__( 'Show', '5th-avenue' ),
			'off'		 => esc_html__( 'Hide', '5th-avenue' ),
		),
		array(
			'id'		 => 'header-cart-text',
			'type'		 => 'text',
			'title'		 => esc_html__( 'Text near Cart Icon', '5th-avenue' ),
			'default'	 => '',
		),
	),
);
$theme_option_sections['header-logo']		 = array(
	'title'				 => esc_html__( 'Logo', '5th-avenue' ),
	'id'				 => 'header-logo',
	'subsection'		 => true,
	'customizer_width'	 => '450px',
	'fields'			 => array(
		array(
			'id'		 => 'website-logo',
			'type'		 => 'media',
			'url'		 => true,
			'title'		 => esc_html__( 'Logo', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Upload your logo here (any size).', '5th-avenue' ),
		),
		array(
			'id'		 => 'website-retina-logo',
			'type'		 => 'media',
			'url'		 => true,
			'title'		 => esc_html__( 'Retina Logo', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Upload the retina version (2x size) of your logo here. This logo will be used on devices with retina display.', '5th-avenue' ),
		),
		array(
			'id'		 => 'website-white-logo',
			'type'		 => 'media',
			'url'		 => true,
			'title'		 => esc_html__( 'White Logo', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Used for white style header', '5th-avenue' ),
		),
		array(
			'id'		 => 'website-white-retina-logo',
			'type'		 => 'media',
			'url'		 => true,
			'title'		 => esc_html__( 'White Retina Logo', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Used for white style header. This logo will be used on devices with retina display.', '5th-avenue' ),
		),
		array(
			'id'		 => 'website-alt-logo',
			'type'		 => 'media',
			'url'		 => true,
			'title'		 => esc_html__( 'Alternative Logo', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'You can use it in sticky header to decrease logo size or when you need to change logo color for sticky header (moving from dark header to light content, etc).', '5th-avenue' ),
		),
		array(
			'id'		 => 'website-alt-retina-logo',
			'type'		 => 'media',
			'url'		 => true,
			'title'		 => esc_html__( 'Alternative Retina Logo', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Upload the retina version (2x size) of your alternative logo here. This logo will be used on devices with retina display.', '5th-avenue' ),
		),
		array(
			'id'			 => 'logo-max-height',
			'type'			 => 'dimensions',
			'units'			 => array( 'px' ), // You can specify a unit value. Possible: px, em, %
			'units_extended' => 'true', // Allow users to select any type of unit.
			'title'			 => esc_html__( 'Logo Max Height', '5th-avenue' ),
			'subtitle'		 => esc_html__( 'You can set a max height for the logo here, and this will resize it on the front end if your logo image is bigger.', '5th-avenue' ),
			'width'			 => false,
			'default'		 => array(
				'height' => 55,
			),
		),
		array(
			'id'			 => 'logo-font-options',
			'type'			 => 'typography',
			'title'			 => esc_html__( 'Logo Font', '5th-avenue' ),
			'subtitle'		 => esc_html__( 'Specify the logo font properties.', '5th-avenue' ),
			'google'		 => true,
			'font-backup'	 => true,
			'text-align'	 => false,
			'color'			 => false,
			'letter-spacing' => true,
			'text-transform' => true,
			'all_styles'	 => false, // Enable all Google Font style/weight variations to be added to the page
			'units'			 => 'px', // Defaults to px.
			'default'		 => array(
				'font-size'		 => '22px',
				'line-height'	 => '22px',
				'font-family'	 => 'Georgia, serif',
				'font-weight'	 => '700',
			),
			'output'		 => array( '#header.header h1.site-title' ),
		),
	),
);
$theme_option_sections['header-sticky']	 = array(
	'title'				 => esc_html__( 'Sticky Header', '5th-avenue' ),
	'id'				 => 'header-sticky',
	'subsection'		 => true,
	'customizer_width'	 => '450px',
	'fields'			 => array(
		array(
			'id'		 => 'enable-sticky-header',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Sticky Header', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Always show header.', '5th-avenue' ),
			'default'	 => true,
			'on'		 => esc_html__( 'Enabled', '5th-avenue' ),
			'off'		 => esc_html__( 'Disabled', '5th-avenue' ),
		),
		array(
			'id'		 => 'sticky-header-resizing',
			'type'		 => 'switch',
			'required'	 => array( 'enable-sticky-header', '=', '1' ),
			'title'		 => esc_html__( 'Sticky header resizing', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Enable the sticky header to resize when scrolling down the page.', '5th-avenue' ),
			'default'	 => true,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		array(
			'id'		 => 'sticky-header-alt-logo',
			'type'		 => 'switch',
			'required'	 => array( 'sticky-header-resizing', '=', '1' ),
			'title'		 => esc_html__( 'Use alternative logo in sticky header', '5th-avenue' ),
			'default'	 => false,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		array(
			'id'			 => 'sticky-header-height',
			'type'			 => 'dimensions',
			'units'			 => array( 'px' ),
			'required'	 => array( 'sticky-header-resizing', '=', '1' ),
			'units_extended' => 'true',
			'title'			 => esc_html__( 'Sticky Header Height', '5th-avenue' ),
			'subtitle'		 => esc_html__( 'Use this option to change sticky header height', '5th-avenue' ),
			'width'			 => false,
			'default'		 => array(
				'height' => 60,
			),
		),
	),
);
$theme_option_sections['header-mobile']	 = array(
	'title'				 => esc_html__( 'Mobile Header', '5th-avenue' ),
	'id'				 => 'header-mobile',
	'subsection'		 => true,
	'customizer_width'	 => '450px',
	'fields'			 => array(
		array(
			'id'		 => 'header-mobile-visibility',
			'type'		 => 'select',
			'title'		 => esc_html__( 'Mobile Header Visibility', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Choose when to replace main header with mobile version', '5th-avenue' ),
			'options'	 => array(
				'mobile-header--mobile'				 => esc_html__( 'Mobile', '5th-avenue' ),
				'mobile-header--tablet-portrait'	 => esc_html__( 'Tablet Portrait', '5th-avenue' ),
				'mobile-header--tablet-landscape'	 => esc_html__( 'Table Landscape', '5th-avenue' ),
				'mobile-header--tiny-desktop'		 => esc_html__( 'Tiny Desktops (1280)', '5th-avenue' ),
			),
			'default'	 => 'mobile-header--tablet-landscape',
		),
		array(
			'id'		 => 'header-mobile-layout',
			'type'		 => 'select',
			'title'		 => esc_html__( 'Mobile Header Layouts', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Choose from predefined mobile header layouts', '5th-avenue' ),
			'options'	 => array(
				'logo-left'		 => esc_html__( 'Logo Left', '5th-avenue' ),
				'logo-menu-left' => esc_html__( 'Logo and Menu Left', '5th-avenue' ),
				'logo-right'	 => esc_html__( 'Logo Right', '5th-avenue' ),
				'menu-left'		 => esc_html__( 'Logo Center, Menu Left', '5th-avenue' ),
				'menu-right'	 => esc_html__( 'Logo Center, Menu Right', '5th-avenue' ),
			),
			'default'	 => 'logo-left',
		),
		array(
			'id'		 => 'header-mobile-sticky',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Sticky header on mobile', '5th-avenue' ),
			'default'	 => false,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		array(
			'id'		 => 'header-mobile-logo-alternative',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Use alternative logo in mobile header', '5th-avenue' ),
			'default'	 => true,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		array(
			'id'		 => 'header-mobile-search-show',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Show search', '5th-avenue' ),
			'default'	 => true,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		array(
			'id'		 => 'mobile-header-search-type',
			'type'		 => 'button_set',
			'title'		 => esc_html__( 'Search Style', '5th-avenue' ),
			'options'	 => array(
				'search-slideout'	 => esc_html__( 'Header Overlay', '5th-avenue' ),
				'fullscreen-search'	 => esc_html__( 'Fullscreen Search', '5th-avenue' ),
			),
			'default'	 => 'fullscreen-search',
		),
		array(
			'id'		 => 'header-mobile-cart-show',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Show cart', '5th-avenue' ),
			'default'	 => true,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		array(
			'id'		 => 'header-mobile-wishlist-show',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Show wishlist', '5th-avenue' ),
			'default'	 => false,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		array(
			'id'		 => 'header-mobile-account-show',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Show login', '5th-avenue' ),
			'default'	 => false,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		array(
			'id'		 => 'header-mobile-topline-textarea',
			'type'		 => 'editor',
			'required'	 => array( 'header-mobile-topbar-enable', '=', '1' ),
			'title'		 => esc_html__( 'Top line content for mobile', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Displayed above the mobile header. You can add your phone number, email, or social icons here. You can use shortcodes.', '5th-avenue' ),
		),
	),
);
