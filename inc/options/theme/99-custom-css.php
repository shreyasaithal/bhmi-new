<?php
/**
 * CSS option theme
 *
 * @package           5th-Avenue\Option
 * @subpackage        Redux
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

$theme_option_sections['customcss'] = array(
	'title'				 => esc_html__( 'Custom CSS/JS', '5th-avenue' ),
	'id'				 => 'customcss',
	'customizer_width'	 => '500px',
	'icon'				 => 'el el-css',
	'fields'			 => array(
		array(
			'id'		 => 'custom_css_code_area',
			'type'		 => 'ace_editor',
			'title'		 => esc_html__( 'Custom CSS Code', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'You can add your custom CSS to this textarea instead of editing theme files.', '5th-avenue' ),
			'mode'		 => 'css',
			'theme'		 => 'monokai',
			'options'	 => array(
				'minLines' => 30,
			),
			'default'	 => '',
		),
		array(
			'id'		 => 'custom_js_code_area',
			'type'		 => 'ace_editor',
			'title'		 => esc_html__( 'Custom JS Code', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'You can add your custom JS code to this textarea instead of editing theme files.', '5th-avenue' ),
			'mode'		 => 'javascript',
			'theme'		 => 'chrome',
			'options'	 => array(
				'minLines' => 30,
			),
			'default'	 => '',
		),
	),
);
