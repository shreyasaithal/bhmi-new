<?php
/**
 * 5th-Avenue meta options
 *
 * @package 5th-Avenue
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( class_exists( 'RWMB_Text_Field' ) ) {


	if ( ! function_exists( 'av5_options_meta_boxes' ) ) {
		/**
		 * Adds elements for meta data
		 *
		 * @global array $wp_registered_sidebars
		 * @param array $meta_boxes Exist meta box.
		 * @return array
		 */
		function av5_options_meta_boxes( $meta_boxes ) {
			$meta_boxes = array();

			$prefix = 'av5_';

			$rev_slider_all_aliases = array( '' );
			if ( class_exists( 'RevSlider' ) ) {
				$rev_slider = new RevSlider();

				$rev_sliders = $rev_slider->getAllSliderForAdminMenu();

				foreach ( $rev_sliders as $key => $slider ) {
					$rev_slider_all_aliases[ $slider['alias'] ] = $slider['title'];
				}
			}

			global $wp_registered_sidebars;

			$sidebars		 = array();
			$all_sidebars	 = $wp_registered_sidebars;

			$db = get_theme_mod( 'redux-widget-areas' );

			if ( ! empty( $db ) ) {
				foreach ( $db as $key => $name ) {
					$all_sidebars[ sanitize_key( $name ) ] = array(
						'name'	 => $name,
						'id'	 => sanitize_key( $name ),
					);
				}
			}

			foreach ( $all_sidebars as $key => $value ) {
				$sidebars[ $key ] = $value['name'];
			}

			$meta_boxes[] = array(
				'id'		 => 'post-sidebar-f-listing',
				'title'		 => esc_html__( 'Layout for Listing', '5th-avenue' ),
				'pages'		 => array( 'post' ),
				'context'	 => 'normal',
				'priority'	 => 'default',
				'show_names' => true,
				'fields'	 => array(
					array(
						'id'		 => $prefix . 'layout_for_listing',
						'type'		 => 'image_select',
						'name'		 => '',
						'options'	 => apply_filters( 'av5_layout_for_listing_options', array(
							'style1'		 => get_template_directory_uri() . '/inc/options/assets/img/metabox-blog-listing-1.jpg',
							'style2'		 => get_template_directory_uri() . '/inc/options/assets/img/metabox-blog-listing-2.jpg',
							'style3'		 => get_template_directory_uri() . '/inc/options/assets/img/metabox-blog-listing-3.jpg',
							'style3-left'	 => get_template_directory_uri() . '/inc/options/assets/img/metabox-blog-listing-3-1.jpg',
							'style4'		 => get_template_directory_uri() . '/inc/options/assets/img/metabox-blog-listing-4.jpg',
							'style5'		 => get_template_directory_uri() . '/inc/options/assets/img/metabox-blog-listing-5.jpg',
							'style6'		 => get_template_directory_uri() . '/inc/options/assets/img/metabox-blog-listing-6.jpg',
							'style6-left'	 => get_template_directory_uri() . '/inc/options/assets/img/metabox-blog-listing-6-1.jpg',
							'style7'		 => get_template_directory_uri() . '/inc/options/assets/img/metabox-blog-listing-7.jpg',
						) ),
						'std'		 => '',
						'inline'	 => false,
					),
				),
			);

			$meta_boxes[] = array(
				'id'		 => 'post-sidebar',
				'title'		 => esc_html__( 'Layout', '5th-avenue' ),
				'pages'		 => array( 'post', 'page', 'product' ),
				'context'	 => 'side',
				'priority'	 => 'low',
				'show_names' => false,
				'fields'	 => array(
					array(
						'id'		 => $prefix . 'layout',
						'type'		 => 'select',
						'name'		 => 'Page layout',
						'options'	 => array(
							''							 => esc_html__( 'Use global', '5th-avenue' ),
							'no-sidebar'				 => esc_html__( 'Standard - No Sidebars', '5th-avenue' ),
							'left-sidebar'				 => esc_html__( 'Left Sidebar', '5th-avenue' ),
							'right-sidebar'				 => esc_html__( 'Right Sidebar', '5th-avenue' ),
							'fullwidth'					 => esc_html__( 'Fullwdith - No Sidebars', '5th-avenue' ),
							'fullwidth-left-sidebar'	 => esc_html__( 'Fullwdith - Left Sidebar', '5th-avenue' ),
							'fullwidth-right-sidebar'	 => esc_html__( 'Fullwdith - Right Sidebar', '5th-avenue' ),
						),
						'std'		 => '',
					),
					array(
						'id'		 => $prefix . 'sidebar',
						'type'		 => 'select',
						'name'		 => 'Sidebar Instance',
						'options'	 => $sidebars,
					),
				),
			);

			$meta_boxes[]	 = array(
				'id'		 => $prefix . 'product-additional-grid-settings',
				'title'		 => esc_html__( 'Shop page settings', '5th-avenue' ),
				'pages'		 => array( 'product' ),
				'context'	 => 'normal',
				'fields'	 => array(
					array(
						'id'	 => $prefix . 'product-additional-grid-description',
						'type'	 => 'text',
						'size'	 => 130,
						'name'	 => 'Additional text on shop page',
						'desc'	 => esc_html__( 'Add short description below product title on shop page.', '5th-avenue' ),
						'std'	 => '',
					),
				),
			);
			$meta_boxes[]	 = array(
				'id'		 => $prefix . 'product-page-settings',
				'title'		 => esc_html__( 'Product page Settings', '5th-avenue' ),
				'pages'		 => array( 'product' ),
				'context'	 => 'normal',
				'fields'	 => array(
					array(
						'id'		 => $prefix . 'gallery_video',
						'type'		 => 'text',
						'name'		 => 'Product Video',
						'desc'		 => esc_html__( 'Add a direct URL from YouTube, Vimeo or vzaar.', '5th-avenue' ),
						'pattern'	 => '/^(http[s]*\:)*\/\/(www\.)*(youtube\.com|youtu\.be|vimeo\.com|vzaar\.com\/videos|vzaar\.tv|vzaar\.me|.*\.vzaar\.me)\/.*/i',
					),
					array(
						'id'	 => $prefix . 'product-page-content-after-tabs',
						'type'	 => 'switch',
						'name'	 => 'Show page content after tabs',
						'style'	 => 'rounded',
						'on'	 => 'Enabled',
						'off'	 => 'Disabled',
						'std'	 => false,
					),
					array(
						'id'	 => $prefix . 'product-page-second-description-content',
						'type'	 => 'wysiwyg',
						'name'	 => 'Additional Short descrition',
						'desc'	 => esc_html__( 'Content area for second product short description on product page. Used for the left side on layout with centered product image.', '5th-avenue' ),
						'std'	 => '',
					),
					array(
						'id'		 => $prefix . 'product-page-description-content',
						'type'		 => 'wysiwyg',
						'name'		 => 'Description tab content',
						'desc'		 => esc_html__( 'Add content for Description tab on product page if main content is displayed after tabs.', '5th-avenue' ),
						'attributes' => array(
							'data-require' => array(
								$prefix . 'product-page-content-after-tabs' => true,
							),
						),
						'std'		 => '',
					),
				),
			);
			$meta_boxes[]	 = array(
				'id'		 => $prefix . 'general-settings',
				'title'		 => esc_html__( 'Page General Settings', '5th-avenue' ),
				'pages'		 => array( 'post', 'page', 'product' ),
				'context'	 => 'normal',
				'fields'	 => array(
					array(
						'id'	 => $prefix . 'header-white-style',
						'type'	 => 'switch',
						'name'	 => esc_html__( 'Header White style', '5th-avenue' ),
						'desc'	 => esc_html__( 'Make all elements white in header and use white logo image. Useful for transparent header on dark background.', '5th-avenue' ),
						'on'	 => 'Enabled',
						'off'	 => 'Disabled',
						'std'	 => false,
					),
					array(
						'id'	 => $prefix . 'header-over-content',
						'type'	 => 'switch',
						'name'	 => esc_html__( 'Force Transparent Header', '5th-avenue' ),
						'std'	 => false,
					),
					array(
						'id'	 => $prefix . 'footer-disabled',
						'type'	 => 'switch',
						'name'	 => esc_html__( 'Hide Footer', '5th-avenue' ),
						'desc'	 => esc_html__( 'Disable footer on this page.', '5th-avenue' ),
						'std'	 => false,
					),
					array(
						'id'	 => $prefix . 'copyright-disabled',
						'type'	 => 'switch',
						'name'	 => esc_html__( 'Hide Copyright Area', '5th-avenue' ),
						'desc'	 => esc_html__( 'Disable copyright area on this page.', '5th-avenue' ),
						'std'	 => false,
					),
				),
			);
			$meta_boxes[]	 = array(
				'id'		 => $prefix . 'titlearea',
				'title'		 => esc_html__( 'Title Area Settings', '5th-avenue' ),
				'pages'		 => array( 'post', 'page' ),
				'context'	 => 'normal',
				'fields'	 => array(
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
						'type'		 => 'backgroundext',
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
								$prefix . 'titlearea-type'		 => 'hero',
							),
						),
						'min'			 => 0,
						'step'			 => 1,
						'max'			 => 90,
						'display_value'	 => 'text',
						'std'			 => 40,
					),
				),
			);

			$meta_boxes[] = array(
				'id'		 => $prefix . 'popup-link-builder',
				'title'		 => esc_html__( 'Popup Link Builder', '5th-avenue' ),
				'pages'		 => array( 'product' ),
				'context'	 => 'normal',
				'fields'	 => array(
					array(
						'id'		 => $prefix . 'popup-link',
						'type'		 => 'wysiwyg_w_input',
						'std'		 => '',
						'clone'		 => true,
						'add_button' => esc_html__( '+', '5th-avenue' ),
						'options'	 => array(
							'textarea_rows'	 => 4,
							'teeny'			 => false,
						),
						'inputs'	 => array(
							'label'	 => esc_html__( 'Label', '5th-avenue' ),
							'slug'	 => esc_html__( 'Slug', '5th-avenue' ),
						),
						'std'		 => array(
							array(
								'content'	 => '',
								'label'		 => '',
								'slug'		 => '',
							),
						),
					),
				),
			);

			return $meta_boxes;
		}

		add_filter( 'rwmb_meta_boxes', 'av5_options_meta_boxes' );
	} // End if().

	if ( ! function_exists( 'av5_admin_slider_wrapper_html' ) ) {
		/**
		 * Adde wrapper for slider
		 *
		 * @param strin $html Content.
		 * @param array $field Field data.
		 * @return strin
		 */
		function av5_admin_slider_wrapper_html( $html, $field ) {
			if ( array_key_exists( 'attributes', $field ) ) {
				return sprintf( '<div style="display:none;" %s></div>', RWMB_Field::render_attributes( $field['attributes'] ) ) . $html;
			}

			return $html;
		}

		add_filter( 'rwmb_slider_html', 'av5_admin_slider_wrapper_html', 100, 2 );
		add_filter( 'rwmb_wysiwyg_html', 'av5_admin_slider_wrapper_html', 100, 2 );
		add_filter( 'rwmb_select_html', 'av5_admin_slider_wrapper_html', 100, 2 );
		add_filter( 'rwmb_divider_html', 'av5_admin_slider_wrapper_html', 100, 2 );
	}

	if ( ! function_exists( 'av5_meta_style' ) ) {

		/**
		 * Add admin css for metabox
		 */
		function av5_meta_style() {
			if ( wp_style_is( 'rwmb' ) ) {
				wp_enqueue_style( 'rwmb-av5', get_template_directory_uri() . '/inc/options/assets/css/meta-box.css' );
			}
		}

		add_action( 'admin_enqueue_scripts', 'av5_meta_style', 20 );
	}
} // End if().
