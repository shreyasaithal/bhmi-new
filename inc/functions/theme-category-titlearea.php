<?php
/**
 * 5th-Avenue title area for categories
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

/**
 * Title area for categories
 */
class av5_titlearea_in_category { // @codingStandardsIgnoreLine PEAR.NamingConventions.ValidClassName.Invalid

	/**
	 * List taxonomys for use custom meta
	 *
	 * @var array
	 */
	static $taxonomys = array();

	/**
	 * Init Title area for categories
	 *
	 * @param array $taxonomys List taxonomys for use custom meta.
	 * @return boolean
	 */
	public static function init( $taxonomys = array( 'category' ) ) {
		if ( ! class_exists( 'RW_Meta_Box' ) || ! class_exists( 'RWMB_Field' ) ) {
			return false;
		}
		self::$taxonomys = $taxonomys;
		foreach ( $taxonomys as $taxonomy ) {
			add_action( "{$taxonomy}_edit_form_fields", array( __CLASS__, 'edit_form_fields' ), 10, 2 );
			add_action( "{$taxonomy}_add_form_fields", array( __CLASS__, 'add_form_fields' ) );
			add_action( "delete_{$taxonomy}", array( __CLASS__, 'delete_term' ) );
			add_action( "create_{$taxonomy}", array( __CLASS__, 'save_category_fields' ), 10, 2 );
			add_action( "edit_{$taxonomy}", array( __CLASS__, 'save_category_fields' ), 10, 2 );
		}
		self::global_hooks();
	}

	/**
	 * Delete meta if deleted term
	 *
	 * @param int $post_id Term ID.
	 */
	public static function delete_term( $post_id ) {
		$term_id = absint( $term_id );
		$fields	 = self::form_fields( $taxonomy );
		foreach ( $fields as $field ) {
			$id = $field['id'];
			delete_term_meta( $post_id, $id );
		}
	}

	/**
	 * Save meta if saved term
	 *
	 * @param int    $post_id Term ID.
	 * @param string $tt_id Not used.
	 */
	public static function save_category_fields( $post_id, $tt_id = '' ) {
		$fields = self::form_fields();
		foreach ( $fields as $field ) {
			$id		 = $field['id'];
			$name	 = $field['field_name'];
			$single	 = ! $field['multiple'];
			$old	 = $field['std'];
			$new	 = isset( $_POST[ $name ] ) ? $_POST[ $name ] : ( $single ? '' : array() ); // @codingStandardsIgnoreLine WordPress.VIP.ValidatedSanitizedInput.InputNotValidated
			$_meta	 = get_term_meta( $post_id, $id, false );
			if ( ! empty( $_meta ) ) {
				$old = array_shift( $_meta );
			}

			$new = RWMB_Field::call( $field, 'value', $new, $old, $post_id );
			$new = RWMB_Field::filter( 'sanitize', $new, $field );

			$new = RWMB_Field::filter( 'value', $new, $field, $old );

			// Filter to allow the field to be modified.
			$field = RWMB_Field::filter( 'field', $field, $field, $new, $old );

			update_term_meta( $post_id, $id, $new, $old );
		}
	}

	/**
	 * Add global hooks.
	 */
	public static function global_hooks() {
		// Enqueue common styles and scripts.
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'enqueue' ) );

		// Add additional actions for fields.
		$fields = self::form_fields();
		foreach ( $fields as $field ) {
			RWMB_Field::call( $field, 'add_actions' );
		}
	}

	/**
	 * Check if we're on the right edit screen.
	 *
	 * @param WP_Screen $screen Screen object. Optional. Use current screen object by default.
	 *
	 * @return bool
	 */
	public static function is_edit_screen( $screen = null ) {
		if ( ! ( $screen instanceof WP_Screen ) ) {
			$screen = get_current_screen();
		}

		return in_array( $screen->base, array( 'edit-tags', 'term' ) ) && in_array( $screen->taxonomy, self::$taxonomys );
	}

	/**
	 * Enqueue common scripts and styles.
	 */
	public static function enqueue() {
		if ( is_admin() && ! self::is_edit_screen() ) {
			return;
		}

		wp_enqueue_style( 'rwmb', RWMB_CSS_URL . 'style.css', array(), RWMB_VER );
		if ( is_rtl() ) {
			wp_enqueue_style( 'rwmb-rtl', RWMB_CSS_URL . 'style-rtl.css', array(), RWMB_VER );
		}

		wp_enqueue_script( 'rwmb', RWMB_JS_URL . 'script.js', array( 'jquery' ), RWMB_VER, true );

		// Enqueue scripts and styles for fields.
		$fields = self::form_fields();
		foreach ( $fields as $field ) {
			RWMB_Field::call( $field, 'admin_enqueue_scripts' );
		}
	}

	/**
	 * Create meta field with RWMB_Field
	 *
	 * @param int   $post_id  Term ID.
	 * @param mixed $saved Saved current value?.
	 * @param array $field Arguments for fields.
	 * @return string|array
	 */
	public static function meta( $post_id, $saved, $field ) {
		/**
		 * For special fields like 'divider', 'heading' which don't have ID, just return empty string
		 * to prevent notice error when displaying fields.
		 */
		if ( empty( $field['id'] ) ) {
			return '';
		}

		if ( $saved ) {
			$_meta = get_term_meta( $post_id, $field['id'], false );
			if ( ! empty( $_meta ) ) {
				$meta = array_shift( $_meta );
			} else {
				$meta = $field['std'];
			}
		} else {
			$meta = $field['std'];
		}

		// Ensure multiple fields are arrays.
		if ( $field['multiple'] ) {
			$meta = (array) $meta;
		}
		// Escape attributes.
		$meta = RWMB_Field::call( $field, 'esc_meta', $meta );

		// Make sure meta value is an array for multiple fields.
		if ( $field['multiple'] && ( empty( $meta ) || ! is_array( $meta ) ) ) {
			$meta = array();
		}

		return $meta;
	}

	/**
	 * Description
	 *
	 * @param array $field Arguments for fields.
	 * @return string
	 */
	protected static function description( $field ) {
		$id = $field['id'] ? ' id="' . esc_attr( $field['id'] ) . '-description"' : '';
		return $field['desc'] ? "<p{$id} class='description'>{$field['desc']}</p>" : '';
	}

	/**
	 * Check form field arguments.
	 *
	 * @param string $taxonomy Current Taxonomy.
	 * @return array
	 */
	public static function form_fields( $taxonomy = null ) {
		$fields	 = apply_filters( 'av5_taxonomy_form_fields', array(), $taxonomy );
		$fields	 = RW_Meta_Box::normalize_fields( $fields );
		return $fields;
	}

	/**
	 * Create Edit form Field
	 *
	 * @param \WP_Term $tag Current Term.
	 * @param string   $taxonomy Current Taxonomy.
	 */
	public static function edit_form_fields( $tag, $taxonomy ) {
		$fields = self::form_fields( $taxonomy );
		foreach ( $fields as $field ) {
			$type	 = isset( $field['type'] ) ? $field['type'] : 'input';
			$meta	 = self::meta( $tag->term_id, true, $field );

			printf( '<!-- %1$s --><tr class="form-field term-%1$s-wrap rwmb-%1$s-wrapper">', esc_attr( $type ) );
			$field_label = ''; // '&nbsp;';
			if ( $field['name'] ) {
				$field_label = sprintf( '<label for="%s">%s</label>', esc_attr( $field['id'] ), $field['name'] ); // WPCS: xss ok.
			}
			echo sprintf( '<th scope="row">%s</th>', $field_label ); // WPCS: xss ok.
			echo '<td>';
			$field_html	 = RWMB_Field::call( $field, 'html', $meta );
			$field_html	 = RWMB_Field::filter( 'html', $field_html, $field, $meta );
			echo RWMB_Field::filter( 'wrapper_html', $field_html, $field, $meta ); // WPCS: xss ok.
			echo self::description( $field ); // WPCS: xss ok.
			echo '</td>';
			echo "</tr>\n";
		}
	}

	/**
	 * Create Add form Field
	 *
	 * @param string $taxonomy Current Taxonomy.
	 */
	public static function add_form_fields( $taxonomy ) {
		$fields = self::form_fields( $taxonomy );
		foreach ( $fields as $field ) {
			$type	 = isset( $field['type'] ) ? $field['type'] : 'input';
			$meta	 = self::meta( 0, false, $field );

			printf( '<div class="form-field term-%1$s-wrap rwmb-%1$s-wrapper">', esc_attr( $type ) );
			$field_label = '';
			if ( $field['name'] ) {
				echo sprintf( '<label for="%s">%s</label>', esc_attr( $field['id'] ), $field['name'] ); // WPCS: xss ok.
			}
			$field_html	 = RWMB_Field::call( $field, 'html', $meta );
			echo RWMB_Field::filter( 'html', $field_html, $field, $meta ); // WPCS: xss ok.
			$html		 = RWMB_Field::filter( 'wrapper_html', $field_html, $field, $meta );
			echo self::description( $field ); // WPCS: xss ok.
			echo "</div>\n";
		}
	}

}
