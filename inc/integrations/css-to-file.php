<?php
/**
 * Writes compiled CSS to a file.
 *
 * @package     Kirki
 * @subpackage  CSS Module
 * @copyright   Copyright (c) 2017, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       3.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Handles writing CSS to a file.
 */
class AV5_CSS_To_File {

	/**
	 * This class
	 *
	 * @var \AV5_CSS_To_File
	 */
	protected static $_instance = null;

	/**
	 * Get this class object
	 *
	 * @return \AV5_CSS_To_File
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Constructor.
	 *
	 * @access public
	 * @since 3.0.0
	 */
	public function __construct() {

		// If the file doesn't exist, create it.
		if ( ! $this->is_exist_file() || $this->need_update() ) {
			// If the file-write fails, fallback to inline
			// and cache the failure so we don't try again immediately.
			$this->write_file();
		}
		$opt_name = apply_filters( 'av5_redux_name', 'lid_av5' );
		// add_action( 'redux/options/' . $opt_name . '/import', array( $this, 'update_file' ) ); - Runs each time the file is generated.
		add_action( 'redux/options/' . $opt_name . '/reset', array( $this, 'update_file' ) );
		add_action( 'redux/options/' . $opt_name . '/section/reset', array( $this, 'update_file' ) );
		add_action( 'redux/options/' . $opt_name . '/saved', array( $this, 'update_file' ) );
		add_action( 'customize_save_after', array( $this, 'update_file' ) );
		add_action( 'merlin_after_all_import', array( $this, 'update_file' ) );
		add_action( 'activated_plugin', array( $this, 'update_file' ) );
	}

	/**
	 * Set trigger for update file
	 */
	function update_file() {
		set_transient( 'av5_css_file', true );
	}

	/**
	 * Remove trigger when updated file
	 */
	function updated_file() {
		delete_transient( 'av5_css_file' );
	}

	/**
	 * Check trigger if need update
	 *
	 * @return boolean
	 */
	function need_update() {
		return (bool) get_transient( 'av5_css_file' );
	}

	/**
	 * Check exist dynamic css file
	 *
	 * @return boolean
	 */
	public function is_exist_file() {
		return file_exists( $this->get_path( 'file' ) );
	}

	/**
	 * Gets the path of the CSS file and folder in the filesystem.
	 *
	 * @access protected
	 * @since 3.0.0
	 * @param string $context Can be "file" or "folder". If empty, returns both as array.
	 * @return string|array
	 */
	protected function get_path( $context = '' ) {

		$upload_dir = wp_upload_dir();

		$paths = array(
			'file'	 => wp_normalize_path( $upload_dir['basedir'] . '/av5-css/styles.css' ),
			'folder' => wp_normalize_path( $upload_dir['basedir'] . '/av5-css' ),
		);

		if ( 'file' === $context ) {
			return $paths['file'];
		}
		if ( 'folder' === $context ) {
			return $paths['folder'];
		}
		return $paths;
	}

	/**
	 * Gets the URL of the CSS file in the filesystem.
	 *
	 * @access public
	 * @since 3.0.0
	 * @return string
	 */
	public function get_url() {
		$upload_dir = wp_upload_dir();
		return esc_url_raw( $upload_dir['baseurl'] . '/av5-css/styles.css' );
	}

	/**
	 * Writes the file to disk.
	 *
	 * @access public
	 * @since 3.0.0
	 * @return bool
	 */
	public function write_file() {

		$css = av5_styles( false );

		// If the folder doesn't exist, create it.
		if ( ! file_exists( $this->get_path( 'folder' ) ) ) {
			wp_mkdir_p( $this->get_path( 'folder' ) );
		}

		$filesystem	 = $this->get_filesystem();
		$write_file	 = (bool) $filesystem->put_contents( $this->get_path( 'file' ), $css );
		if ( $write_file ) {
			$this->updated_file();
		}
		return $write_file;
	}

	/**
	 * Gets the WP_Filesystem object.
	 *
	 * @access protected
	 * @since 3.0.0
	 * @return object
	 */
	protected function get_filesystem() {

		// The Wordpress filesystem.
		global $wp_filesystem;

		if ( empty( $wp_filesystem ) ) {
			require_once wp_normalize_path( ABSPATH . '/wp-admin/includes/file.php' );
			WP_Filesystem();
		}

		return $wp_filesystem;
	}

}

AV5_CSS_To_File::instance();
