<?php
/**
 * Pages option theme
 *
 * @package           5th-Avenue\Option
 * @subpackage        Redux
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

$rev_slider_all_aliases = array( '' );
if ( class_exists( 'RevSlider' ) ) {
	$rev_slider = new RevSlider();

	$rev_slider_all_aliases = $rev_slider->getAllSliderAliases();
}

$theme_option_sections['pages']		 = array(
	'title'	 => esc_html__( 'Pages', '5th-avenue' ),
	'id'	 => 'pages',
	'icon'	 => 'el el-shopping-cart',
);
$theme_option_sections['page-layout']	 = array(
	'title'				 => esc_html__( 'Pages Layout', '5th-avenue' ),
	'id'				 => 'page-layout-configuration',
	'subsection'		 => true,
	'customizer_width'	 => '450px',
	'fields'			 => array(
		// Sidebars configuration.
		array(
			'id'		 => 'page-layout',
			'type'		 => 'select',
			'title'		 => esc_html__( 'Layout configuration', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Set default page layout.', '5th-avenue' ),
			'options'	 => array(
				'no-sidebar'				 => esc_html__( 'Standard - No Sidebars', '5th-avenue' ),
				'left-sidebar'				 => esc_html__( 'Left Sidebar', '5th-avenue' ),
				'right-sidebar'				 => esc_html__( 'Right Sidebar', '5th-avenue' ),
				'fullwidth'					 => esc_html__( 'Fullwdith - No Sidebars', '5th-avenue' ),
				'fullwidth-left-sidebar'	 => esc_html__( 'Fullwdith - Left Sidebar', '5th-avenue' ),
				'fullwidth-right-sidebar'	 => esc_html__( 'Fullwdith - Right Sidebar', '5th-avenue' ),
			),
			'default'	 => 'no-sidebar',
			'select2'	 => array( 'allowClear' => false ),
		),
		// Sidebar.
		array(
			'id'		 => 'page-sidebar',
			'required'	 => array(
				'pages-layout-configuration',
				'=',
				array( 'left-sidebar', 'right-sidebar', 'fullwidth-left-sidebar', 'fullwidth-right-sidebar' ),
			),
			'type'		 => 'select',
			'data'		 => 'sidebar',
			'title'		 => esc_html__( 'Choose Sidebar', '5th-avenue' ),
		),
		// Sidebar layout.
		array(
			'id'		 => 'page-sidebar-size',
			'type'		 => 'button_set',
			'title'		 => esc_html__( 'Sidebar size for pages', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Choose sidebar size for pages', '5th-avenue' ),
			'options'	 => array(
				'4'	 => '1/3',
				'3'	 => '1/4',
			),
			'default'	 => '4',
		),

	),
);

$theme_option_sections['page-meta-options-title'] = array(
	'title'				 => esc_html__( 'Title Area Settings', '5th-avenue' ),
	'id'				 => 'page-meta-options-title',
	'subsection'		 => true,
	'customizer_width'	 => '450px',
	'fields'			 => array(
		array(
			'id'		 => 'page-titlearea-show',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Show Title Area', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Enable to show page title and breadcrumbs.', '5th-avenue' ),
			'on'		 => esc_html__( 'Enabled', '5th-avenue' ),
			'off'		 => esc_html__( 'Disabled', '5th-avenue' ),
			'default'	 => true,
		),
		array(
			'id'		 => 'page-titlearea-type',
			'type'		 => 'select',
			'title'		 => esc_html__( 'Page Title Type', '5th-avenue' ),
			'required'	 => array( 'page-titlearea-show', '=', '1' ),
			'options'	 => array(
				'standard'	 => esc_html__( 'Standard', '5th-avenue' ),
				'hero'		 => esc_html__( 'Hero', '5th-avenue' ),
				'revslider'	 => esc_html__( 'Slider', '5th-avenue' ),
			),
			'default'	 => 'standard',
		),
		array(
			'id'		 => 'page-titlearea-breadcrumbs',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Show breadcrumbs', '5th-avenue' ),
			'required'	 => array(
				array( 'page-titlearea-type', '!=', 'revslider' ),
				array( 'page-titlearea-show', '=', '1' ),
			),
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
			'default'	 => false,
		),
		array(
			'id'		 => 'page-titlearea-title',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Show page title', '5th-avenue' ),
			'required'	 => array(
				array( 'page-titlearea-type', '!=', 'revslider' ),
				array( 'page-titlearea-show', '=', '1' ),
			),
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
			'default'	 => true,
		),
		array(
			'id'		 => 'page-titlearea-text-color-style',
			'type'		 => 'select',
			'title'		 => esc_html__( 'Title Area Text Color Style', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Choose the text colors style to fit background image. This option affect additional content and breadcrumbs.', '5th-avenue' ),
			'required'	 => array(
				array( 'page-titlearea-type', '=', 'hero' ),
				array( 'page-titlearea-show', '=', '1' ),
			),
			'options'	 => array(
				'default'	 => esc_html__( 'Default', '5th-avenue' ),
				'white'		 => esc_html__( 'Light', '5th-avenue' ),
			/* 'dark'		 => esc_html__( 'Dark', '5th-avenue' ), */
			),
			'default'	 => 'default',
		),
		array(
			'id'		 => 'page-titlearea-title-color',
			'type'		 => 'color_rgba',
			'title'		 => esc_html__( 'Title text color', '5th-avenue' ),
			'required'	 => array(
				array( 'page-titlearea-type', '=', 'hero' ),
				array( 'page-titlearea-show', '=', '1' ),
			),
			'default'	 => array(
				'color'	 => '#000000',
				'alpha'	 => '1',
			),
		),
		array(
			'id'		 => 'page-titlearea-subtitle-color',
			'type'		 => 'color_rgba',
			'title'		 => esc_html__( 'Subtitle text color', '5th-avenue' ),
			'required'	 => array(
				array( 'page-titlearea-type', '=', 'hero' ),
				array( 'page-titlearea-show', '=', '1' ),
			),
			'default'	 => array(
				'color'	 => '#000000',
				'alpha'	 => '1',
			),
		),
		array(
			'id'		 => 'page-titlearea-text-above',
			'type'		 => 'text',
			'title'		 => esc_html__( 'Header sub title', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'You can add a short line of text just above the title', '5th-avenue' ),
			'required'	 => array(
				array( 'page-titlearea-type', '!=', 'revslider' ),
				array( 'page-titlearea-show', '=', '1' ),
			),
		),
		array(
			'id'		 => 'page-titlearea-hero-additional-content',
			'type'		 => 'editor',
			'title'		 => esc_html__( 'Header additional content', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'You can add any content to the header area including shortcodes.', '5th-avenue' ),
			'required'	 => array(
				array( 'page-titlearea-type', '=', 'hero' ),
				array( 'page-titlearea-show', '=', '1' ),
			),
		),
		array(
			'id'					 => 'page-titlearea-background',
			'type'					 => 'background',
			'title'					 => esc_html__( 'Title Area Background', '5th-avenue' ),
			'subtitle'				 => esc_html__( 'You can set background image and color for title area.', '5th-avenue' ),
			'required'				 => array(
				array( 'page-titlearea-type', '=', 'hero' ),
				array( 'page-titlearea-show', '=', '1' ),
			),
			'background-repeat'		 => false,
			'background-attachment'	 => false,
			'background-position'	 => false,
			'background-size'		 => false,
		),
		array(
			'id'			 => 'page-titlearea-hero-height',
			'type'			 => 'dimensions',
			'title'			 => esc_html__( 'Hero Heading Height', '5th-avenue' ),
			'units'			 => array( 'px' ), // You can specify a unit value. Possible: px, em, %.
			'units_extended' => 'true', // Allow users to select any type of unit.
			'required'		 => array(
				array( 'page-titlearea-type', '=', 'hero' ),
				array( 'page-titlearea-show', '=', '1' ),
			),
			'width'			 => false,
			'default'		 => array(
				'height' => 600,
			),
		),
		array(
			'id'		 => 'page-titlearea-hero-effect',
			'type'		 => 'button_set',
			'title'		 => esc_html__( 'Hero Heading Effect', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'None = title area scrolls with content. Fixed =title area stay on the same position, content scrolls over the title area.', '5th-avenue' ),
			'required'	 => array(
				array( 'page-titlearea-type', '=', 'hero' ),
				array( 'page-titlearea-show', '=', '1' ),
			),
			'options'	 => array(
				'none'		 => esc_html__( 'None', '5th-avenue' ),
				'parallax'	 => esc_html__( 'Parallax', '5th-avenue' ),
				'parallax2'	 => esc_html__( 'Parallax Bg', '5th-avenue' ),
				'fixed'		 => esc_html__( 'Fixed', '5th-avenue' ),
			),
			'default'	 => 'parallax',
		),
		array(
			'id'		 => 'page-titlearea-revslider-sliders-alias',
			'type'		 => 'select',
			'title'		 => esc_html__( 'Revolution Slider Alias', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Choose a Revolutions Slider to use on top of the page.', '5th-avenue' ),
			'required'	 => array(
				array( 'page-titlearea-type', '=', 'revslider' ),
				array( 'page-titlearea-show', '=', '1' ),
			),
			'options'	 => $rev_slider_all_aliases,
		),
		array(
			'id'		 => 'page-titlearea-hero-overlay-color',
			'type'		 => 'color',
			'title'		 => esc_html__( 'Hero Overlay color', '5th-avenue' ),
			'required'	 => array(
				array( 'page-titlearea-type', '=', 'hero' ),
				array( 'page-titlearea-show', '=', '1' ),
			),
			'default'	 => '#000000',
		),
		array(
			'id'			 => 'page-titlearea-hero-overlay-opacity',
			'type'			 => 'slider',
			'title'			 => esc_html__( 'Hero Overlay Opacity %', '5th-avenue' ),
			'required'		 => array(
				array( 'page-titlearea-type', '=', 'hero' ),
				array( 'page-titlearea-show', '=', '1' ),
			),
			'min'			 => 0,
			'step'			 => 1,
			'max'			 => 90,
			'display_value'	 => 'text',
			'default'		 => 40,
		),
	),
);

