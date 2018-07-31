<?php
/**
 * Social option theme
 *
 * @package           5th-Avenue\Option
 * @subpackage        Redux
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

$theme_option_sections['social-options'] = array(
	'title'	 => esc_html__( 'Social Options', '5th-avenue' ),
	'id'	 => 'social-options',
	'icon'	 => 'el el-twitter',
	'fields' => array(
		array(
			'id'		 => 'social-url-twitter',
			'type'		 => 'text',
			'title'		 => esc_html__( 'Twitter URL', '5th-avenue' ),
			'default'	 => '',
		),
		array(
			'id'		 => 'social-url-facebook',
			'type'		 => 'text',
			'title'		 => esc_html__( 'Facebook URL', '5th-avenue' ),
			'default'	 => '',
		),
		array(
			'id'		 => 'social-url-google',
			'type'		 => 'text',
			'title'		 => esc_html__( 'Google+ URL', '5th-avenue' ),
			'default'	 => '',
		),
		array(
			'id'		 => 'social-url-vimeo',
			'type'		 => 'text',
			'title'		 => esc_html__( 'Vimeo URL', '5th-avenue' ),
			'default'	 => '',
		),
		array(
			'id'		 => 'social-url-instagram',
			'type'		 => 'text',
			'title'		 => esc_html__( 'Instagram URL', '5th-avenue' ),
			'default'	 => '',
		),
		array(
			'id'		 => 'social-url-youtube',
			'type'		 => 'text',
			'title'		 => esc_html__( 'Youtube URL', '5th-avenue' ),
			'default'	 => '',
		),
		array(
			'id'		 => 'social-url-vk',
			'type'		 => 'text',
			'title'		 => esc_html__( 'VK URL', '5th-avenue' ),
			'default'	 => '',
		),
		array(
			'id'		 => 'social-url-pinterest',
			'type'		 => 'text',
			'title'		 => esc_html__( 'Pinterest URL', '5th-avenue' ),
			'default'	 => '',
		),
	),
);
