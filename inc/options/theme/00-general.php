<?php
/**
 * General option theme
 *
 * @package           5th-Avenue\Option
 * @subpackage        Redux
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

$theme_option_sections['general']				 = array(
	'title'				 => esc_html__( 'General', '5th-avenue' ),
	'id'				 => 'general',
	'customizer_width'	 => '400px',
	'icon'				 => 'el el-home',
);
$theme_option_sections['general-general']		 = array(
	'title'				 => esc_html__( 'General', '5th-avenue' ),
	'id'				 => 'general-general',
	'subsection'		 => true,
	'customizer_width'	 => '450px',
	'fields'			 => array(
		array(
			'id'			 => 'website-width-slider',
			'type'			 => 'slider',
			'title'			 => esc_html__( 'Content Max-Width', '5th-avenue' ),
			'subtitle'		 => esc_html__( 'Set the maximum width for content area.', '5th-avenue' ),
			'default'		 => 1400,
			'min'			 => 1170,
			'step'			 => 10,
			'max'			 => 2000,
			'display_value'	 => 'text',
		),
		array(
			'id'		 => 'website-layout',
			'type'		 => 'image_select',
			'title'		 => esc_html__( 'Website Layout', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Select the website layout type', '5th-avenue' ),
			'options'	 => array(
				'layout-full-width'		 => array(
					'alt'	 => esc_html__( 'Normal', '5th-avenue' ),
					'title'	 => esc_html__( 'Normal', '5th-avenue' ),
					'img'	 => get_template_directory_uri() . '/inc/options/assets/img/website-fullwidth-option.jpg',
				),
				'layout-passepartout'	 => array(
					'alt'	 => esc_html__( 'Passepartout', '5th-avenue' ),
					'title'	 => esc_html__( 'Passepartout', '5th-avenue' ),
					'img'	 => get_template_directory_uri() . '/inc/options/assets/img/website-passportout-option.jpg',
				),
			),
			'default'	 => 'layout-full-width',
		),
		array(
			'id'		 => 'layout-passepartout-frame',
			'type'		 => 'switch',
			'required'	 => array( 'website-layout', '=', 'layout-passepartout' ),
			'title'		 => esc_html__( 'Always show Frame on top of the page', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'If you enable this, top and bottom borders will be visible even when you are scrolling the page.', '5th-avenue' ),
			'default'	 => true,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		array(
			'id'		 => 'layout-passepartout-horizontal',
			'type'		 => 'switch',
			'required'	 => array( 'website-layout', '=', 'layout-passepartout' ),
			'title'		 => esc_html__( 'Show horizontal section borders', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Show horizontal dividers between website section (footer, copyright, etc) additionally to website passepartout frame', '5th-avenue' ),
			'default'	 => false,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		array(
			'id'		 => 'layout-passepartout-frame-modals',
			'type'		 => 'switch',
			'required'	 => array( 'website-layout', '=', 'layout-passepartout' ),
			'title'		 => esc_html__( 'Show frame in fullscreen modals', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'This will affect fullscreen search, login, cart, menu etc.', '5th-avenue' ),
			'default'	 => true,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		array(
			'id'		 => 'has-nice-scroll',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Styled Scrollbar', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Toggle whether or not to enable the styled scrollbar - turning this on will lower scrolling performance', '5th-avenue' ),
			'default'	 => false,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		array(
			'id'		 => 'smooth-scroll',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Smooth Scroll', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Turning this on will lower scrolling performance', '5th-avenue' ),
			'default'	 => false,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		array(
			'id'		 => 'smooth-scroll-links',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Smooth Scroll Links', '5th-avenue' ),
			'default'	 => false,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		array(
			'id'		 => 'back-to-top-button',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Show Back to Top', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Show back to top button that appears in the bottom right corner of the screen.', '5th-avenue' ),
			'default'	 => false,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		array(
			'id'		 => 'back-to-top-button-mobile',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Show Back to Top on Mobile', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Show back to top button on screen resolutions below 768px', '5th-avenue' ),
			'default'	 => false,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		array(
			'id'		 => 'carousel-arrows-position',
			'type'		 => 'select',
			'title'		 => esc_html__( 'Carousel Arrows', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'CHoose position of arrows in all carousel sliders across website.', '5th-avenue' ),
			'options'	 => array(
				'disabled'		 => esc_html__( 'Disabled', '5th-avenue' ),
				'inside'		 => esc_html__( 'Inside carousel', '5th-avenue' ),
				'half-outside'	 => esc_html__( 'Partially outside carousel', '5th-avenue' ),
			),
			'default'	 => 'inside',
		),
		array(
			'id'		 => 'min-js',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Use minifier javascript', '5th-avenue' ),
			'default'	 => true,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		array(
			'id'		 => 'min-css',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Use minifier css', '5th-avenue' ),
			'default'	 => true,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
	),
);
$theme_option_sections['general-preloader']	 = array(
	'title'				 => esc_html__( 'Preloader', '5th-avenue' ),
	'id'				 => 'general-preloader',
	'subsection'		 => true,
	'customizer_width'	 => '450px',
	'fields'			 => array(
		array(
			'id'		 => 'enable-page-transitions',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Page Transitions', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Enable the transition animation that occurs upon changing pages.', '5th-avenue' ),
			'default'	 => 1,
			'on'		 => esc_html__( 'Enabled', '5th-avenue' ),
			'off'		 => esc_html__( 'Disabled', '5th-avenue' ),
		),
		array(
			'id'		 => 'page-preloader-style',
			'type'		 => 'select',
			'required'	 => array( 'enable-page-transitions', '=', '1' ),
			'title'		 => esc_html__( 'Page Preloader Style', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Select which style of transition to show across the site, for preloading, page transitions, and other loading indicators.', '5th-avenue' ),
			'options'	 => array(
				'1'	 => esc_html__( 'Top Progress Bar', '5th-avenue' ),
				'2'	 => esc_html__( 'Simple Animated Line, Centered', '5th-avenue' ),
				'3'	 => esc_html__( 'No Preloader', '5th-avenue' ),
			),
			'default'	 => '3',
		),
		array(
			'id'		 => 'page-preloader-image-select',
			'type'		 => 'select',
			'title'		 => esc_html__( 'Preloader Image', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'You can show your website logo or any custom image when website is loading', '5th-avenue' ),
			'options'	 => array(
				'logo'	 => esc_html__( 'Website Logo', '5th-avenue' ),
				'custom' => esc_html__( 'Custom Image', '5th-avenue' ),
				'none'	 => esc_html__( 'None', '5th-avenue' ),
			),
			'default'	 => 'none',
			'required'	 => array( 'enable-page-transitions', '=', '1' ),
		),
		array(
			'id'		 => 'page-preloader-image',
			'type'		 => 'media',
			'url'		 => true,
			'title'		 => esc_html__( 'Upload Preloader Image', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Upload image to show when website is loading.', '5th-avenue' ),
			'required'	 => array( 'page-preloader-image-select', '=', 'custom' ),
		),
	),
);
/**
 * Load Banner
$theme_option_sections['general-load-banner']	 = array(
	'title'				 => esc_html__( 'Load Banner', '5th-avenue' ),
	'id'				 => 'general-load-banner',
	'subsection'		 => true,
	'customizer_width'	 => '450px',
	'fields'			 => array(
		array(
			'id'		 => 'enable-load-banner',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Load Banner', '5th-avenue' ),
			'default'	 => 0,
			'on'		 => esc_html__( 'Enabled', '5th-avenue' ),
			'off'		 => esc_html__( 'Disabled', '5th-avenue' ),
		),
		array(
			'id'		 => 'load-banner-many-times',
			'type'		 => 'select',
			'title'		 => esc_html__( 'how many times to show for one user', '5th-avenue' ),
			'options'	 => array(
				'one'		 => esc_html__( 'Just one time', '5th-avenue' ),
				'everytime'	 => esc_html__( 'Everytime', '5th-avenue' ),
				'random'	 => esc_html__( 'Random solution', '5th-avenue' ),
			),
			'default'	 => 'one',
			'required'	 => array( 'enable-load-banner', '=', '1' ),
		),
		array(
			'id'		 => 'load-banner-timeout',
			'type'		 => 'text',
			'title'		 => esc_html__( 'Timeout', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Pause between the loaded page and the appearance of the banner', '5th-avenue' ),
			'default'	 => '1000',
			'required'	 => array( 'enable-load-banner', '=', '1' ),
		),
		array(
			'id'		 => 'load-banner-background',
			'type'		 => 'background',
			'title'		 => esc_html__( 'Banner Background', '5th-avenue' ),
			'default'	 => array(
				'background-color'		 => '#ffffff',
				'background-repeat'		 => 'no-repeat',
				'background-position'	 => 'center center',
				'background-size'		 => 'cover',
				'background-attachment'	 => 'scroll',
			),
			'required'	 => array( 'enable-load-banner', '=', '1' ),
		),
		array(
			'id'		 => 'load-banner-content',
			'type'		 => 'editor',
			'url'		 => true,
			'title'		 => esc_html__( 'Banner Content', '5th-avenue' ),
			'required'	 => array( 'enable-load-banner', '=', '1' ),
		),
	),
);*/
$theme_option_sections['general-analytics']	 = array(
	'title'				 => esc_html__( 'Google Analytics', '5th-avenue' ),
	'id'				 => 'general-analytics',
	'subsection'		 => true,
	'customizer_width'	 => '450px',
	'fields'			 => array(
		array(
			'id'		 => 'google-analytics-code-area',
			'type'		 => 'ace_editor',
			'title'		 => esc_html__( 'Google Analitycs', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Paste your Google Analytics (or other) tracking code here. This will be added into the footer of the theme.', '5th-avenue' ),
			'mode'		 => 'javascript',
			'theme'		 => 'chrome',
			'options'	 => array(
				'minLines' => 20,
			),
			'default'	 => '',
		),
	),
);
