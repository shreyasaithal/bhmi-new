<?php
/**
 * 5th-Avenue taxonomy options
 *
 * @package 5th-Avenue
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'av5_options_taxonomy' ) ) {

	/**
	 * Add fields to taxonomy page
	 *
	 * @param array  $configs Fields.
	 * @param string $taxonomy Taxonomy.
	 * @return array
	 */
	function av5_options_taxonomy( $configs = array(), $taxonomy = null ) {
		$prefix = 'av5_';

		$rev_slider_all_aliases = array( '' );
		if ( class_exists( 'RevSlider' ) ) {
			$rev_slider = new RevSlider();

			$rev_sliders = $rev_slider->getAllSliderForAdminMenu();

			foreach ( $rev_sliders as $key => $slider ) {
				$rev_slider_all_aliases[ $slider['alias'] ] = $slider['title'];
			}
		}

		$configs = array_merge( $configs, array(
			array(
				'id'	 => $prefix . 'titlearea-override',
				'type'	 => 'switch',
				'name'	 => esc_html__( 'Use Custom Settings', '5th-avenue' ),
				'desc'	 => esc_html__( 'Enable to use Custom Title Area Settings.', '5th-avenue' ),
			),
			array(
				'id'		 => $prefix . 'titlearea-show',
				'type'		 => 'switch',
				'name'		 => esc_html__( 'Show Title Area', '5th-avenue' ),
				'desc'		 => esc_html__( 'Disable to completely remove title area from page. It insludes title, breadcrumbs and description in hero styled title areas.', '5th-avenue' ),
				'attributes' => array(
					'data-require' => array(
						$prefix . 'titlearea-override' => true,
					),
				),
				'std'		 => true,
			),
			array(
				'id'		 => $prefix . 'titlearea-type',
				'type'		 => 'select',
				'name'		 => esc_html__( 'Page Title Type', '5th-avenue' ),
				'options'	 => array(
					'standard'	 => 'Standard',
					'hero'		 => 'Hero',
					'revslider'	 => 'Slider',
				),
				'attributes' => array(
					'data-require' => array(
						$prefix . 'titlearea-show'		 => true,
						$prefix . 'titlearea-override'	 => true,
					),
				),
				'std'		 => 'standard',
			),
			array(
				'type'		 => 'divider',
				'attributes' => array(
					'data-require' => array(
						$prefix . 'titlearea-show'		 => true,
						$prefix . 'titlearea-override'	 => true,
					),
				),
			),
			array(
				'id'		 => $prefix . 'titlearea-title',
				'type'		 => 'switch',
				'name'		 => esc_html__( 'Show page Title/Heading', '5th-avenue' ),
				'attributes' => array(
					'data-require' => array(
						$prefix . 'titlearea-type'		 => array( 'standard', 'hero' ),
						$prefix . 'titlearea-show'		 => true,
						$prefix . 'titlearea-override'	 => true,
					),
				),
				'std'		 => false,
			),
			array(
				'id'		 => $prefix . 'titlearea-breadcrumbs',
				'type'		 => 'switch',
				'name'		 => esc_html__( 'Show Breadcrumbs', '5th-avenue' ),
				'desc'		 => esc_html__( '* If they are enabled.', '5th-avenue' ),
				'attributes' => array(
					'data-require' => array(
						$prefix . 'titlearea-type'		 => array( 'standard', 'hero' ),
						$prefix . 'titlearea-show'		 => true,
						$prefix . 'titlearea-override'	 => true,
					),
				),
				'on'		 => 'Yes',
				'off'		 => 'No',
				'std'		 => false,
			),
			array(
				'id'		 => $prefix . 'titlearea-text-color-style',
				'type'		 => 'select',
				'name'		 => esc_html__( 'Title Area Text Color Style', '5th-avenue' ),
				'desc'		 => esc_html__( 'Choose the text colors style to fit background image. This option will override heading, additional content and breadcrumbs color settings.', '5th-avenue' ),
				'attributes' => array(
					'data-require' => array(
						$prefix . 'titlearea-type'		 => array( 'hero' ),
						$prefix . 'titlearea-show'		 => true,
						$prefix . 'titlearea-override'	 => true,
					),
				),
				'options'	 => array(
					'default'	 => 'Default',
					'white'		 => 'Light',
				),
				'std'		 => 'default',
			),
			array(
				'id'		 => $prefix . 'titlearea-title-color',
				'type'		 => 'color',
				'name'		 => esc_html__( 'Title color', '5th-avenue' ),
				'attributes' => array(
					'data-require' => array(
						$prefix . 'titlearea-type'		 => array( 'hero' ),
						$prefix . 'titlearea-show'		 => true,
						$prefix . 'titlearea-override'	 => true,
					),
				),
				'std'		 => '#000000',
			),
			array(
				'id'		 => $prefix . 'titlearea-subtitle-color',
				'type'		 => 'color',
				'name'		 => esc_html__( 'Subtitle color', '5th-avenue' ),
				'attributes' => array(
					'data-require' => array(
						$prefix . 'titlearea-type'		 => array( 'hero' ),
						$prefix . 'titlearea-show'		 => true,
						$prefix . 'titlearea-override'	 => true,
					),
				),
				'std'		 => '#000000',
			),
			array(
				'id'		 => $prefix . 'titlearea-text-above',
				'type'		 => 'text',
				'name'		 => esc_html__( 'Header sub title', '5th-avenue' ),
				'desc'		 => esc_html__( 'You can add a short line of text just above the title', '5th-avenue' ),
				'attributes' => array(
					'data-require' => array(
						$prefix . 'titlearea-show'		 => true,
						$prefix . 'titlearea-override'	 => true,
					),
				),
				'std'		 => '',
			),
			array(
				'id'		 => $prefix . 'titlearea-hero-additional-content',
				'type'		 => 'wysiwyg',
				'name'		 => esc_html__( 'Header additional content', '5th-avenue' ),
				'desc'		 => esc_html__( 'You can add any content to the header area including shortcodes.', '5th-avenue' ),
				'attributes' => array(
					'data-require' => array(
						$prefix . 'titlearea-type'		 => array( 'standard', 'hero' ),
						$prefix . 'titlearea-show'		 => true,
						$prefix . 'titlearea-override'	 => true,
					),
				),
				'std'		 => '',
			),
			array(
				'type'		 => 'divider',
				'attributes' => array(
					'data-require' => array(
						$prefix . 'titlearea-type'		 => 'hero',
						$prefix . 'titlearea-show'		 => true,
						$prefix . 'titlearea-override'	 => true,
					),
				),
			),
			array(
				'id'		 => $prefix . 'titlearea-background',
				'type'		 => 'background',
				'name'		 => esc_html__( 'Title Area Background', '5th-avenue' ),
				'desc'		 => esc_html__( 'You can set background image and color for title area.', '5th-avenue' ),
				'attributes' => array(
					'data-require'			 => array(
						$prefix . 'titlearea-type'		 => array( 'hero' ),
						$prefix . 'titlearea-show'		 => true,
						$prefix . 'titlearea-override'	 => true,
					),
					'background-repeat'		 => false,
					'background-attachment'	 => false,
					'background-position'	 => false,
					'background-size'		 => false,
				),
				'std'		 => '',
			),
			array(
				'id'		 => $prefix . 'titlearea-hero-height',
				'type'		 => 'number',
				'name'		 => esc_html__( 'Hero Heading Height', '5th-avenue' ),
				'attributes' => array(
					'data-require' => array(
						$prefix . 'titlearea-type'		 => 'hero',
						$prefix . 'titlearea-show'		 => true,
						$prefix . 'titlearea-override'	 => true,
					),
				),
				'std'		 => 400,
			),
			array(
				'id'		 => $prefix . 'titlearea-revslider-sliders-alias',
				'type'		 => 'select',
				'name'		 => esc_html__( 'Revolution Slider Alias', '5th-avenue' ),
				'desc'		 => esc_html__( 'Choose a Revolutions Slider to use on top of the page.', '5th-avenue' ),
				'attributes' => array(
					'data-require' => array(
						$prefix . 'titlearea-type'		 => 'revslider',
						$prefix . 'titlearea-show'		 => true,
						$prefix . 'titlearea-override'	 => true,
					),
				),
				'options'	 => $rev_slider_all_aliases,
			),
			array(
				'id'		 => $prefix . 'titlearea-hero-effect',
				'type'		 => 'radio',
				'name'		 => esc_html__( 'Hero Heading Effect', '5th-avenue' ),
				'desc'		 => esc_html__( 'None = title area scrolls with content. Fixed =title area stay on the same position, content scrolls over the title area.', '5th-avenue' ),
				'attributes' => array(
					'data-require' => array(
						$prefix . 'titlearea-type'		 => 'hero',
						$prefix . 'titlearea-show'		 => true,
						$prefix . 'titlearea-override'	 => true,
					),
				),
				'options'	 => array(
					'none'		 => 'None',
					'parallax'	 => 'Parallax',
					'parallax2'	 => 'Parallax Bg',
					'fixed'		 => 'Fixed',
				),
				'std'		 => 'parallax',
			),
			array(
				'type'		 => 'divider',
				'attributes' => array(
					'data-require' => array(
						$prefix . 'titlearea-type'		 => 'hero',
						$prefix . 'titlearea-show'		 => true,
						$prefix . 'titlearea-override'	 => true,
					),
				),
			),
			array(
				'id'		 => $prefix . 'titlearea-hero-overlay-color',
				'type'		 => 'color',
				'name'		 => esc_html__( 'Hero Overlay color', '5th-avenue' ),
				'attributes' => array(
					'data-require' => array(
						$prefix . 'titlearea-type'		 => 'hero',
						$prefix . 'titlearea-show'		 => true,
						/* $prefix . 'titlearea-hero-overlay-color-enabled'	=> true, */
						$prefix . 'titlearea-override'	 => true,
					),
				),
				'std'		 => '#000000',
			),
			array(
				'id'			 => $prefix . 'titlearea-hero-overlay-opacity',
				'type'			 => 'slider',
				'name'			 => esc_html__( 'Hero Overlay Opacity %', '5th-avenue' ),
				'attributes'	 => array(
					'data-require' => array(
						$prefix . 'titlearea-show'		 => true,
						$prefix . 'titlearea-override'	 => true,
						/* $prefix . 'titlearea-hero-overlay-color-enabled'	=> true, */
						$prefix . 'titlearea-type'		 => 'hero',
					),
				),
				'min'			 => 0,
				'step'			 => 1,
				'max'			 => 90,
				'display_value'	 => 'text',
				'std'			 => 40,
			),
		) );
		return $configs;
	}
} // End if().

add_filter( 'av5_taxonomy_form_fields', 'av5_options_taxonomy', 10, 2 );
av5_titlearea_in_category::init( apply_filters( 'av5_taxonomy_taxonomy', array( 'category', 'product_cat' ) ) );
