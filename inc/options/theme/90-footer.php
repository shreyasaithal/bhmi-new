<?php
/**
 * Footer option theme
 *
 * @package           5th-Avenue\Option
 * @subpackage        Redux
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

$pages_for_foother			 = get_pages( array(
	'sort_order'	 => 'asc',
	'sort_column'	 => 'post_title',
	'post_type'		 => 'page',
	'post_status'	 => 'publish,private,draft',
) );
$above_footer_area_content_page	 = array();
if ( ! empty( $pages_for_foother ) && is_array( $pages_for_foother ) ) {
	foreach ( $pages_for_foother as $page_for_foother ) {
		$above_footer_area_content_page[ $page_for_foother->ID ] = $page_for_foother->post_title;
	}
	unset( $page_for_foother, $pages_for_foother );
}

$mailchimps_forms = get_posts( array(
	'sort_order'	 => 'asc',
	'sort_column'	 => 'post_name',
	'post_type'		 => 'mc4wp-form',
	'post_status'	 => 'publish,private,draft',
) );
$footer_newsletter_mailchimp_form	 = array();
if ( ! empty( $mailchimps_forms ) && is_array( $mailchimps_forms ) ) {
	foreach ( $mailchimps_forms as $mailchimps_form ) {
		$footer_newsletter_mailchimp_form[ $mailchimps_form->ID ] = $mailchimps_form->post_name;
	}
	unset( $page_for_foother, $pages_for_foother );
}

$theme_option_sections['footer-options'] = array(
	'title'	 => esc_html__( 'Footer Options', '5th-avenue' ),
	'id'	 => 'footer-options',
	'icon'	 => 'el el-website',
	'fields' => array(
		array(
			'id'		 => 'enable-above-footer-area',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Content Area Above Footer', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Enable additional content area where you can create any content that will be shown  above footerr on all pages.', '5th-avenue' ),
			'default'	 => false,
			'on'		 => esc_html__( 'Enabled', '5th-avenue' ),
			'off'		 => esc_html__( 'Disabled', '5th-avenue' ),
		),
		// Full Width Area Above Footer.
		array(
			'id'		 => 'full-width-above-footer-area',
			'type'		 => 'switch',
			'required'	 => array( 'enable-above-footer-area', '=', '1' ),
			'title'		 => esc_html__( 'Full Width Area Above Footer', '5th-avenue' ),
			'default'	 => true,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		array(
			'id'		 => 'above-footer-area-content-type',
			'type'		 => 'button_set',
			'title'		 => esc_html__( 'Above footer additional content area Type', '5th-avenue' ),
			'required'	 => array( 'enable-above-footer-area', '=', '1' ),
			'default'	 => 'area',
			'options'	 => array(
				'page'	 => esc_html__( 'Page ID', '5th-avenue' ),
				'area'	 => esc_html__( 'Text Area', '5th-avenue' ),
			),
		),
		array(
			'id'		 => 'above-footer-area-content-page',
			'type'		 => 'select',
			'title'		 => esc_html__( 'Above footer additional content area', '5th-avenue' ),
			'default'	 => '',
			'options'	 => $above_footer_area_content_page,
			'required'	 => array(
				array( 'enable-above-footer-area', '=', '1' ),
				array( 'above-footer-area-content-type', '=', 'page' ),
			),
		),
		array(
			'id'		 => 'above-footer-area-content',
			'type'		 => 'editor',
			'required'	 => array(
				array( 'enable-above-footer-area', '=', '1' ),
				array( 'above-footer-area-content-type', '=', 'area' ),
			),
			'title'		 => esc_html__( 'Above footer additional content area', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Add any custom content above the footer area to show it on all pages', '5th-avenue' ),
			'default'	 => '',
		),
		array(
			'id'	 => 'divider-footer-newsletter-options',
			'type'	 => 'divide',
		),
		array(
			'id'		 => 'footer-newsletter-enable',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Footer Newsletter', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Enable Mailchimp Newsletter Subscribe form above the footer but below the additional footer content area', '5th-avenue' ),
			'default'	 => false,
			'on'		 => esc_html__( 'Enabled', '5th-avenue' ),
			'off'		 => esc_html__( 'Disabled', '5th-avenue' ),
		),
		array(
			'id'		 => 'footer-newsletter-title',
			'type'		 => 'text',
			'required'	 => array( 'footer-newsletter-enable', '=', '1' ),
			'title'		 => esc_html__( 'Newsletter form title', '5th-avenue' ),
			'default'	 => esc_html__( 'Join Our Newsletter', '5th-avenue' ),
		),
		array(
			'id'		 => 'footer-newsletter-text',
			'type'		 => 'textarea',
			'required'	 => array( 'footer-newsletter-enable', '=', '1' ),
			'title'		 => esc_html__( 'Newsletter form description', '5th-avenue' ),
			'default'	 => esc_html__( 'Sign up for email updates on our latest collections, campaigns and promotions.', '5th-avenue' ),
		),
		array(
			'id'		 => 'footer-newsletter-mailchimp-form',
			'type'		 => 'select',
			'required'	 => array( 'footer-newsletter-enable', '=', '1' ),
			'title'		 => esc_html__( 'Mailchimp form', '5th-avenue' ),
			'default'	 => '',
			'options'	 => $footer_newsletter_mailchimp_form,
		),
		// Full Width Footer Area.
		array(
			'id'		 => 'full-width-footer-area',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Full Width Footer Widget and Copyright Area ', '5th-avenue' ),
			'default'	 => true,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		array(
			'id'		 => 'enable-footer-widget-area',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Footer Widget Area', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Enable footer widget area.', '5th-avenue' ),
			'default'	 => true,
			'on'		 => esc_html__( 'Enabled', '5th-avenue' ),
			'off'		 => esc_html__( 'Disabled', '5th-avenue' ),
		),
		array(
			'id'		 => 'center-footer-widgets',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Horizontaly center content in footer widget', '5th-avenue' ),
			'required'	 => array( 'enable-footer-widget-area', '=', '1' ),
			'default'	 => true,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		array(
			'id'		 => 'center-vertically-footer-widgets',
			'required'	 => array( 'enable-footer-widget-area', '=', '1' ),
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Vertically center widgets', '5th-avenue' ),
			'default'	 => false,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		array(
			'id'		 => 'footer-widget-area-columns',
			'type'		 => 'image_select',
			'required'	 => array( 'enable-footer-widget-area', '=', '1' ),
			'title'		 => esc_html__( 'Footer Widget Columns', '5th-avenue' ),
			'options'	 => array(
				'1'	 => array(
					'alt'	 => esc_html__( 'One Centered Column', '5th-avenue' ),
					'img'	 => get_template_directory_uri() . '/inc/options/assets/img/footer-centered.png',
				),
				'2'	 => array(
					'alt'	 => esc_html__( '2 Columns', '5th-avenue' ),
					'img'	 => get_template_directory_uri() . '/inc/options/assets/img/footer-2x.png',
				),
				'3'	 => array(
					'alt'	 => esc_html__( '3 Columns', '5th-avenue' ),
					'img'	 => get_template_directory_uri() . '/inc/options/assets/img/footer-3x.png',
				),
				'4'	 => array(
					'alt'	 => esc_html__( '4 Columns', '5th-avenue' ),
					'img'	 => get_template_directory_uri() . '/inc/options/assets/img/footer-4x.png',
				),
				'5'	 => array(
					'alt'	 => esc_html__( '4 Columns alt', '5th-avenue' ),
					'img'	 => get_template_directory_uri() . '/inc/options/assets/img/footer-5.png',
				),
				'6'	 => array(
					'alt'	 => esc_html__( '3 Columns alt', '5th-avenue' ),
					'img'	 => get_template_directory_uri() . '/inc/options/assets/img/footer-6.png',
				),
			),
			'default'	 => '1',
		),
		array(
			'id'	 => 'divider-footer-copyright-options',
			'type'	 => 'divide',
		),
		array(
			'id'		 => 'enable-footer-copyright-area',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Footer Copyright', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Enable footer copyright section that will be shown below footer area.', '5th-avenue' ),
			'default'	 => true,
			'on'		 => esc_html__( 'Enabled', '5th-avenue' ),
			'off'		 => esc_html__( 'Disabled', '5th-avenue' ),
		),
		array(
			'id'		 => 'footer-copyright-layout',
			'type'		 => 'image_select',
			'required'	 => array( 'enable-footer-copyright-area', '=', '1' ),
			'title'		 => esc_html__( 'Copyright Area Layout', '5th-avenue' ),
			'options'	 => array(
				'layout-1'	 => array(
					'alt'	 => esc_html__( 'One Centered Column', '5th-avenue' ),
					'img'	 => get_template_directory_uri() . '/inc/options/assets/img/copyright-layout-1.png',
				),
				'layout-2'	 => array(
					'alt'	 => esc_html__( '2 Columns', '5th-avenue' ),
					'img'	 => get_template_directory_uri() . '/inc/options/assets/img/copyright-layout-2.png',
				),
				'layout-3'	 => array(
					'alt'	 => esc_html__( '3 Columns', '5th-avenue' ),
					'img'	 => get_template_directory_uri() . '/inc/options/assets/img/copyright-layout-3.png',
				),
				'layout-4'	 => array(
					'alt'	 => esc_html__( '3 Columns alt', '5th-avenue' ),
					'img'	 => get_template_directory_uri() . '/inc/options/assets/img/copyright-layout-4.png',
				),
			),
			'default'	 => 'layout-1',
		),
		array(
			'id'		 => 'enable-footer-copyright-area-social',
			'type'		 => 'switch',
			'required'	 => array( 'enable-footer-copyright-area', '=', '1' ),
			'title'		 => esc_html__( 'Footer Copyright Area Social Icons', '5th-avenue' ),
			'default'	 => true,
			'on'		 => esc_html__( 'Show', '5th-avenue' ),
			'off'		 => esc_html__( 'Hide', '5th-avenue' ),
		),
		array(
			'id'		 => 'footer-copyright-content',
			'type'		 => 'editor',
			'required'	 => array( 'enable-footer-copyright-area', '=', '1' ),
			'title'		 => esc_html__( 'Footer Copyright Content', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'You can add any content to the copyright area including shortcodes.', '5th-avenue' ),
			'default'	 => '©[the-year] [site-name] · Made with love by <a href="#">Lifeis.Design</a>',
		),
		array(
			'id'	 => 'divider-copyright-options',
			'type'	 => 'divide',
		),
		array(
			'id'		 => 'enable-footer-button',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Footer Button', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Enable button at the right bottom of the screen.', '5th-avenue' ),
			'default'	 => false,
			'on'		 => esc_html__( 'Enabled', '5th-avenue' ),
			'off'		 => esc_html__( 'Disabled', '5th-avenue' ),
		),
		array(
			'id'		 => 'footer-button-text',
			'type'		 => 'textarea',
			'required'	 => array( 'enable-footer-button', '=', '1' ),
			'title'		 => esc_html__( 'Footer button text', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'You can also add an icon here using html.', '5th-avenue' ),
			'default'	 => sprintf( '<i class="fa fa-envelope"></i> &nbsp;%s', esc_html__( 'Contact us!', '5th-avenue' ) ),
		),
		array(
			'id'		 => 'footer-buttons-elusive-icons',
			'type'		 => 'select',
			'data'		 => 'elusive-icons',
			'required'	 => array( 'enable-footer-button', '=', '1' ),
			'title'		 => esc_html__( 'Select Footer Button Icon', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'You can also choose an icon for your footer button from this list. Icon will be displayed before button text.', '5th-avenue' ),
		),
		array(
			'id'		 => 'footer-button-link',
			'type'		 => 'textarea',
			'required'	 => array( 'enable-footer-button', '=', '1' ),
			'title'		 => esc_html__( 'Footer button link', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'You can set any custom link or modal window shortcode.', '5th-avenue' ),
			'default'	 => '[modal-window id="contacts"]',
		),
	),
);
