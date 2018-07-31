<?php
/**
 * Demo option theme
 *
 * @package           5th-Avenue\Option
 * @subpackage        Redux
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

$theme_option_sections['demo'] = array(
	'id'	 => 'wbc_importer_section',
	'title'	 => esc_html__( 'Demo Importer', '5th-avenue' ),
	'desc'	 => sprintf( '<span class="va-admin__warning-text"><span>%1$s</span> %2$s</span> <p>%3$s</p><p>%4$s</p>', esc_html__( 'Warning!', '5th-avenue' ), esc_html__( 'DO NOT INSTALL demo content on your live website! It will corrupt your existing data!', '5th-avenue' ), esc_html__( 'We suggest to install demo content on clean WordPress setup only.', '5th-avenue' ), esc_html__( 'We do not take any responsibility and we are not liable for any damage or data loss caused through use of demo importer.', '5th-avenue' ) ),
	'icon'	 => 'el-icon-website',
	'fields' => array(
		array(
			'id'	 => 'wbc_demo_importer',
			'type'	 => 'wbc_importer',
		),
	),
);
