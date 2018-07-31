<?php
/**
 * 5th-Avenue theme helpers
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

add_filter( 'av5_get_option_fail', 'av5_get_option_failed', 10, 2 );

if ( ! function_exists( 'av5_is_woocommerce_activated' ) ) {

	/**
	 * Query WooCommerce activation
	 */
	function av5_is_woocommerce_activated() {
		return class_exists( 'WooCommerce' ) ? true : false;
	}
}
if ( ! function_exists( 'av5_is_js_composer_activated' ) ) {

	/**
	 * Query WPBakery Visual Composer activation
	 */
	function av5_is_js_composer_activated() {
		return class_exists( 'WPBakeryShortCode' ) ? true : false;
	}
}
if ( ! function_exists( 'av5_the_title' ) ) {

	/**
	 * Output title for any query
	 */
	function av5_the_title() {

		if ( av5_is_woocommerce_activated() && is_woocommerce() ) {
			if ( is_product() ) {
				the_title();
			} else {
				woocommerce_page_title();
			}
		} elseif ( is_search() ) {
			$s			 = get_search_query();
			$allsearch	 = new WP_Query( "s=$s&showposts=-1" );
			$key		 = esc_html( $s, 1 );
			$count		 = $allsearch->post_count;
			wp_reset_query();
			echo sprintf( _n( '%1$s result for <span>%2$s</span>', '%1$s results for <span>%2$s</span>', $count, '5th-avenue' ), $count, $key ); // WPCS: xss ok.
		} elseif ( is_category() ) {
			single_cat_title();
		} elseif ( is_tax() ) {
			global $wp_query;
			$term = $wp_query->get_queried_object();
			echo esc_html( $term->name );
		} elseif ( is_archive() ) {
			if ( is_tag() ) {
				echo sprintf( esc_html__( 'Posts tagged with &#8216;%s&#8217;', '5th-avenue' ), single_tag_title( '', false ) ); // WPCS: xss ok.
			} elseif ( is_day() ) {
				esc_html_e( 'Archive for', '5th-avenue' );
				echo ' ';
				the_time( 'F jS, Y' );
			} elseif ( is_month() ) {
				esc_html_e( 'Archive for', '5th-avenue' );
				echo ' ';
				the_time( 'F, Y' );
			} elseif ( is_year() ) {
				esc_html_e( 'Archive for', '5th-avenue' );
				echo ' ';
				the_time( 'Y' );
			} elseif ( is_author() ) {
				$author = get_userdata( get_query_var( 'author' ) );
				esc_html_e( 'Author archive for', '5th-avenue' );
				echo ' ';
				echo esc_attr( $author->display_name );
			} elseif ( isset( $_GET['paged'] ) && ! empty( $_GET['paged'] ) ) {
				esc_html_e( 'Blog Archives', '5th-avenue' );
			} else {
				post_type_archive_title();
			}
		} elseif ( is_404() ) {
			esc_html_e( '404', '5th-avenue' );
		} elseif ( is_home() && get_option( 'page_for_posts' ) ) {
			echo apply_filters( 'the_title', get_post( get_option( 'page_for_posts' ) )->post_title ); // WPCS: xss ok.
		} else {
			the_title();
		} // End if().
	}
} // End if().
if ( ! function_exists( 'av5_get_option' ) ) {

	/**
	 * Get value settings theme
	 *
	 * @global array $$opt_name Global variable settings.
	 *
	 * @param string $name Name options.
	 * @param mixed  $default Default value.
	 *
	 * @return mixed
	 */
	function av5_get_option( $name, $default = '' ) {
		global $lid_av5;
		if ( empty( $lid_av5 ) ) {
			$opt_name	 = apply_filters( 'av5_redux_name', 'lid_av5' );
			$lid_av5	 = get_option( $opt_name, array() );
		}
		if ( is_array( $lid_av5 ) && array_key_exists( $name, $lid_av5 ) ) {
			$value = $lid_av5[ $name ];
		} else {
			$value = apply_filters( 'av5_get_option_fail', $default, $name );
		}

		$value = apply_filters( 'av5_option_' . $name, $value, $name, $default );
		return apply_filters( 'av5_get_option', $value, $name, $default );
	}
}
if ( ! function_exists( 'av5_get_option_failed' ) ) {
	/**
	 * Get Default values if value not exist
	 *
	 * @global array $lid_av5
	 * @global \WP_Filesystem $wp_filesystem
	 * @param mixed  $default Default Value.
	 * @param string $name Name attribute.
	 * @return mixed
	 */
	function av5_get_option_failed( $default, $name ) {
		global $lid_av5, $wp_filesystem;
		if ( empty( $lid_av5 ) ) {
			$opt_name	 = apply_filters( 'av5_redux_name', 'lid_av5' );
			$_lid_av5	 = get_option( $opt_name, null );
			$demo_path	 = get_template_directory() . '/inc/demo-data-clean/redux.json';
			if ( is_null( $_lid_av5 ) && file_exists( $demo_path ) ) {
				if ( empty( $wp_filesystem ) ) {
					require_once wp_normalize_path( ABSPATH . '/wp-admin/includes/file.php' );
					WP_Filesystem();
				}
				$content = $wp_filesystem->get_contents( $demo_path );
				if ( ! empty( $content ) ) {
					$result = json_decode( $content, true );
					if ( is_array( $result ) ) {
						update_option( $opt_name, $result );
						set_transient( 'av5_css_file', true );
						$lid_av5 = $result;
						if ( array_key_exists( $name, $lid_av5 ) ) {
							$value = $lid_av5[ $name ];
						}
					}
				}
			}
		}

		return $default;
	}
} // End if().
if ( ! function_exists( 'av5_get_option_attr' ) ) {

	/**
	 * Get value attribute settings theme
	 *
	 * @param string $name Name option.
	 * @param string $attr Name attribute for option.
	 * @param mixed  $default Default value for attribute.
	 * @param array  $default_option Default for option.
	 *
	 * @return mixed
	 */
	function av5_get_option_attr( $name, $attr, $default = '', $default_option = array() ) {
		$value = av5_get_option( $name, $default_option );
		if ( ! empty( $value ) && is_array( $value ) && array_key_exists( $attr, $value ) ) {
			return $value[ $attr ];
		}

		return $default;
	}
}
if ( ! function_exists( 'av5_get_meta' ) ) {

	/**
	 * Get option for overrite
	 *
	 * @param string  $name Name meta option.
	 * @param mixed   $default Default value for attribute.
	 * @param integer $post_id Post id.
	 * @param string  $prefix Prefix for gloabal option.
	 * @param boolean $anyway_meta Retrieves meta value only.
	 *
	 * @return mixed
	 */
	function av5_get_meta( $name, $default = '', $post_id = null, $prefix = null, $anyway_meta = false ) {
		$gl_name = $name;
		if ( empty( $prefix ) ) {
			$prefix = get_query_var( 'av5_post_type', null );
			if ( ! empty( $prefix ) ) {
				$gl_name = sprintf( '%s-%s', $prefix, $name );
			}
		}

		$option = av5_get_option( $gl_name, $default );
		if ( empty( $post_id ) ) {
			// We get the page of the store if it's a store or category of the store.
			if ( ( function_exists( 'is_shop' ) && is_shop() ) || ( function_exists( 'is_product_category' ) && is_product_category() ) ) {
				$post_id = wc_get_page_id( 'shop' );
			} else {
				$post_id = get_the_ID();
			}
		}

		if ( ! empty( $post_id ) ) {
			$meta = get_post_meta( $post_id, 'av5_' . $name );
			if ( is_array( $meta ) && 0 < count( $meta ) ) {
				if ( is_array( $option ) && array_key_exists( 'alpha', $option ) ) {
					$option['color']	 = $meta[0];
					$meta_alpha			 = get_post_meta( $post_id, 'av5_' . $name . '-alpha' );
					if ( 1 < count( $meta_alpha ) ) {
						$option['alpha'] = $meta_alpha[0] / 100;
					}
					$option['rgba'] = av5_hex2rgba( $option['color'], $option['alpha'] );
				} else {
					$option = array_shift( $meta );
				}
			} elseif ( $anyway_meta ) {
				$option = null;
			}
		}

		$option = apply_filters( 'av5_meta_' . $name, $option, $name, $default, $post_id, $prefix, $anyway_meta );
		return apply_filters( 'av5_get_meta', $option, $name, $default, $post_id, $prefix, $anyway_meta );
	}
} // End if().
if ( ! function_exists( 'av5_get_termmeta' ) ) {

	/**
	 * Get option for overrite
	 *
	 * @param string  $name Name meta option.
	 * @param mixed   $default Default value for attribute.
	 * @param integer $post_id Term id.
	 * @param string  $prefix Prefix for gloabal option.
	 * @param boolean $anyway_meta Retrieves meta value only.
	 *
	 * @return mixed
	 */
	function av5_get_termmeta( $name, $default = '', $post_id = null, $prefix = null, $anyway_meta = false ) {
		$gl_name = $name;
		if ( empty( $prefix ) ) {
			$prefix = get_query_var( 'av5_post_type', null );
			if ( ! empty( $prefix ) ) {
				$gl_name = sprintf( '%s-%s', $prefix, $name );
			}
		}

		$option = av5_get_option( $gl_name, $default );
		if ( empty( $post_id ) ) {
			// We get the page of the store if it's a store or category of the store.
			if ( is_category() || is_product_category() ) {
				$post_id = get_queried_object_id();
			}
		}

		if ( ! empty( $post_id ) ) {
			$meta = get_term_meta( $post_id, 'av5_' . $name );
			if ( is_array( $meta ) && 0 < count( $meta ) ) {
				if ( is_array( $option ) && array_key_exists( 'alpha', $option ) ) {
					$option['color']	 = $meta[0];
					$meta_alpha			 = get_post_meta( $post_id, 'av5_' . $name . '-alpha' );
					if ( 1 < count( $meta_alpha ) ) {
						$option['alpha'] = $meta_alpha[0] / 100;
					}
					$option['rgba'] = av5_hex2rgba( $option['color'], $option['alpha'] );
				}

				$option = array_shift( $meta );
			} elseif ( $anyway_meta ) {
				$option = null;
			}
		}

		$option = apply_filters( 'av5_termmeta_' . $name, $option, $name, $default, $post_id, $prefix, $anyway_meta );
		return apply_filters( 'av5_get_termmeta', $option, $name, $default, $post_id, $prefix, $anyway_meta );
	}
} // End if().
if ( ! function_exists( 'av5_get_option_titlearea' ) ) {

	/**
	 * Get options for titlearea
	 *
	 * @param string $name Name options.
	 * @param mixed  $default Default value.
	 * @param mixed  $post_id Current post.
	 * @return mixed
	 */
	function av5_get_option_titlearea( $name, $default = '', $post_id = null ) {
		if ( apply_filters( 'av5_titleare_is_category', is_category() || (class_exists( 'WooCommerce' ) && is_product_category()) ) && av5_get_termmeta( 'titlearea-override', '' ) ) {
			return av5_get_termmeta( $name, $default, null, null, true );
		}
		if ( is_singular() && av5_get_meta( 'titlearea-override', '', $post_id ) ) {
			return av5_get_meta( $name, $default, $post_id, null, true );
		}
		$gl_name = $name;
		$prefix	 = get_query_var( 'av5_post_type', null );
		if ( ! empty( $prefix ) ) {
			$gl_name = sprintf( '%s-%s', $prefix, $name );
		}
		return av5_get_option( $gl_name, $default );
	}
}
if ( ! function_exists( 'av5_get_option_meta' ) ) {

	/**
	 * Get meta options
	 *
	 * @param string $name Name options.
	 * @param mixed  $default Default value.
	 * @param mixed  $post_id Current post.
	 * @return mixed
	 */
	function av5_get_option_meta( $name, $default = '', $post_id = null ) {
		if ( is_singular() ) {
			return av5_get_meta( $name, $default, $post_id, null, true );
		}
		$gl_name = $name;
		$prefix	 = get_query_var( 'av5_post_type', null );
		if ( ! empty( $prefix ) ) {
			$gl_name = sprintf( '%s-%s', $prefix, $name );
		}
		return av5_get_option( $gl_name, $default );
	}
}
if ( ! function_exists( 'av5_get_titlearea_title_color' ) ) {

	/**
	 * Get color option for titlearea
	 *
	 * @param mixed $post_id Current post.
	 * @return string
	 */
	function av5_get_titlearea_title_color( $post_id = null ) {
		$title_color	 = '';
		$_title_color	 = (array) av5_get_option_titlearea( 'titlearea-title-color', array(), $post_id );
		if ( array_key_exists( 'rgba', $_title_color ) ) {
			$_title_color = $_title_color['rgba'];
		} elseif ( array_key_exists( 'color', $_title_color ) ) {
			$_title_color = $_title_color['color'];
		} else {
			$_title_color = '';
		}
		$title_color = 'color:' . $_title_color;

		return $title_color;
	}
}
if ( ! function_exists( 'av5_get_titlearea_subtitle_color' ) ) {

	/**
	 * Get color option for sub titlearea
	 *
	 * @param mixed $post_id Current post.
	 * @return string
	 */
	function av5_get_titlearea_subtitle_color( $post_id = null ) {
		$title_color	 = '';
		$_title_color	 = (array) av5_get_option_titlearea( 'titlearea-subtitle-color', array(), $post_id );
		if ( array_key_exists( 'rgba', $_title_color ) ) {
			$_title_color = $_title_color['rgba'];
		} elseif ( array_key_exists( 'color', $_title_color ) ) {
			$_title_color = $_title_color['color'];
		} else {
			$_title_color = '';
		}
		$title_color = 'color:' . $_title_color;

		return $title_color;
	}
}
if ( ! function_exists( 'av5_get_titlearea_background' ) ) {

	/**
	 * Get background for titlearea
	 *
	 * @param mixed $post_id Current post.
	 * @return string
	 */
	function av5_get_titlearea_background( $post_id = null ) {
		$background	 = '';
		$_background = (array) av5_get_option_titlearea( 'titlearea-background', array(), $post_id );
		$_background = array_filter( $_background );
		if ( ! empty( $_background ) && is_array( $_background ) ) {
			foreach ( $_background as $key => $value ) {
				if ( ! empty( $value ) && 'media' != $key ) {
					if ( 'background-image' == $key ) {
						$background .= $key . ":url('" . $value . "');";
					} else {
						$background .= $key . ':' . $value . ';';
					}
				}
			}
		}

		return $background;
	}
}
if ( ! function_exists( 'av5_get_titlearea_background_image' ) ) {

	/**
	 * Get background image for titlearea
	 *
	 * @param mixed $post_id Current post.
	 * @return string
	 */
	function av5_get_titlearea_background_image( $post_id = null ) {
		$background	 = '';
		$_background = (array) av5_get_option_titlearea( 'titlearea-background', array(), $post_id );
		$_background = array_filter( $_background );
		if ( ! empty( $_background ) && is_array( $_background ) ) {
			foreach ( $_background as $key => $value ) {
				if ( ! empty( $value ) && 'media' != $key ) {
					if ( 'background-image' == $key ) {
						$background .= $key . ":url('" . $value . "');";
					}
				}
			}
		}

		return $background;
	}
}
if ( ! function_exists( 'av5_get_titlearea_hero_overlay_background' ) ) {

	/**
	 * Get background for titlearea
	 *
	 * @param mixed $post_id Current post.
	 * @return string
	 */
	function av5_get_titlearea_hero_overlay_background( $post_id = null ) {
		$overlay_background = '';

		$_overlay_background = av5_get_option_titlearea( 'titlearea-hero-overlay-color', array(), $post_id );
		if ( array_key_exists( 'rgba', $_overlay_background ) ) {
			$_overlay_background = $_overlay_background['rgba'];
		} else {
			$_overlay_background = $_overlay_background['color'];
		}
		$_overlay_background = $_overlay_background['color'];
		$overlay_background	 = 'background:' . $_overlay_background;

		return $overlay_background;
	}
}
if ( ! function_exists( 'av5_hex2rgba' ) ) {

	/**
	 * Field Render Function.
	 * Takes the color hex value and converts to a rgba.
	 *
	 * @since ReduxFramework 3.0.4
	 *
	 * @param string $hex Hex color.
	 * @param float  $alpha Alpha for color.
	 */
	function av5_hex2rgba( $hex, $alpha = '' ) {
		$hex = str_replace( '#', '', $hex );
		if ( strlen( $hex ) == 3 ) {
			$r	 = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
			$g	 = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
			$b	 = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
		} else {
			$r	 = hexdec( substr( $hex, 0, 2 ) );
			$g	 = hexdec( substr( $hex, 2, 2 ) );
			$b	 = hexdec( substr( $hex, 4, 2 ) );
		}
		$rgb = $r . ',' . $g . ',' . $b;

		if ( '' == $alpha ) {
			return $rgb;
		} else {
			$alpha = floatval( $alpha );

			return 'rgba(' . $rgb . ',' . $alpha . ')';
		}
	}
}
if ( ! function_exists( 'av5_get_title_layout' ) ) {

	/**
	 * Get title layout
	 *
	 * @param string $type Theme post type.
	 * @return string
	 */
	function av5_get_title_layout( $type = 'posts' ) {
		$option = null;
		if ( apply_filters( 'av5_titleare_is_category', is_category() || (class_exists( 'WooCommerce' ) && is_product_category()) ) && av5_get_termmeta( 'titlearea-override', '' ) ) {
			$option = av5_get_termmeta( 'titlearea-type', '', null, $type );
		} elseif ( is_singular() && '1' === av5_get_meta( 'titlearea-override', '', null, $type ) ) {
			$option = av5_get_meta( 'titlearea-type', '', null, $type );
		} else {
			$option = av5_get_option( $type . '-titlearea-type', '' );
		}
		$option = apply_filters( 'av5_title_layout_' . $type, $option, $type );
		return apply_filters( 'av5_get_title_layout', $option, $type );
	}
}
if ( ! function_exists( 'av5_get_content_layout' ) ) {

	/**
	 * Get content layout
	 *
	 * @param string $type Theme post type.
	 * @return string
	 */
	function av5_get_content_layout( $type = 'posts' ) {
		$option	 = null;
		if ( is_singular() && $layout	 = av5_get_meta( 'layout', '', null, $type ) ) {
			$option = $layout;
		} else {
			$option = av5_get_option( $type . '-layout', '' );
		}

		$option = apply_filters( 'av5_content_layout_' . $type, $option, $type );
		return apply_filters( 'av5_get_content_layout', $option, $type );
	}
}
if ( ! function_exists( 'av5_get_sidebar' ) ) {

	/**
	 * Get sidebar
	 *
	 * @param string $type Theme post type.
	 */
	function av5_get_sidebar( $type = 'post' ) {
		$option = 'default';
		if ( is_singular() && av5_get_meta( 'layout', '', null, $type ) ) {
			$option = av5_get_meta( 'sidebar', '', null, $type );
		} else {
			$option = av5_get_option( $type . '-sidebar', 'default' );
		}
		$option	 = apply_filters( 'av5_sidebar_' . $type, $option, $type );
		$option	 = apply_filters( 'av5_get_sidebar', $option, $type );
		dynamic_sidebar( $option );
	}
}
if ( ! function_exists( 'av5_get_revolution_alias' ) ) {

	/**
	 * Get Revolution Slider Alias
	 *
	 * @param string $type Theme post type.
	 * @return string
	 */
	function av5_get_revolution_alias( $type = 'post' ) {
		if ( apply_filters( 'av5_titleare_is_category', is_category() || is_product_category() ) && $revolution_alias = av5_get_termmeta( 'revolution-alias', '' ) ) {
			return $revolution_alias;
		}
		if ( is_singular() && $revolution_alias = av5_get_meta( 'revolution-alias', '', null, $type ) ) {
			return $revolution_alias;
		}

		return av5_get_option( $type . '-revolution-alias', '' );
	}
}
if ( ! function_exists( 'av5_woocommerce_breadcrumb' ) ) {

	/**
	 * Get woocommerce breadcrumb
	 */
	function av5_woocommerce_breadcrumb() {
		if ( class_exists( 'WooCommerce' ) ) {
			woocommerce_breadcrumb( array(
				'wrap_before'	 => '',
				'wrap_after'	 => '',
			) );
		}
	}
}
if ( ! function_exists( 'av5_template_header_elements' ) ) {

	/**
	 * Get header element template
	 *
	 * @param string $name Name header elements.
	 */
	function av5_template_headerelements( $name = '' ) {
		get_template_part( 'template-parts/header/elements/' . $name );
	}

	/**
	 * Header element search
	 */
	function av5_template_headerelement_search() {
		av5_template_headerelements( 'search' );
	}

	/**
	 * Header element language
	 */
	function av5_template_headerelement_language() {
		av5_template_headerelements( 'language' );
	}

	/**
	 * Header element currency
	 */
	function av5_template_headerelement_currency() {
		av5_template_headerelements( 'currency' );
	}

	/**
	 * Header element cart
	 */
	function av5_template_headerelement_cart() {
		if ( class_exists( 'WooCommerce' ) ) {
			av5_template_headerelements( 'cart' );
		}
	}

	/**
	 * Header element my account
	 */
	function av5_template_headerelement_myaccount() {
		if ( class_exists( 'WooCommerce' ) ) {
			av5_template_headerelements( 'myaccount' );
		}
	}

	/**
	 * Header element textarea
	 */
	function av5_template_headerelement_textarea1() {
		av5_template_headerelements( 'textarea1' );
	}

	/**
	 * Header element textarea
	 */
	function av5_template_headerelement_textarea2() {
		av5_template_headerelements( 'textarea2' );
	}

	/**
	 * Header element wishlist
	 */
	function av5_template_headerelement_wishlist() {
		av5_template_headerelements( 'wishlist' );
	}

	/**
	 * Header element slideout
	 */
	function av5_template_headerelement_slideout() {
		define( 'AV5_SLIDE_OUT_MENU', true );
		av5_template_headerelements( 'slide-out-menu' );
	}
} // End if().
if ( ! function_exists( 'av5_get_header_class' ) ) {

	/**
	 * Create header classes
	 *
	 * @param string $class Custom class for header.
	 *
	 * @return string
	 */
	function av5_get_header_class( $class = '' ) {
		$classes = array();
		if ( ! empty( $class ) ) {
			$classes[] = $class;
		}
		if ( av5_get_option( 'header-over-content', false ) ) {
			$classes[] = 'transparent';
		}
		if ( av5_get_option( 'header-always-on-top', false ) ) {
			$classes[] = 'always-on-top';
		}
		if ( av5_get_meta( 'header-over-content' ) ) {
			$classes[] = 'transparent force-transparent';
		}
		if ( av5_get_option( 'full-width-header', false ) ) {
			$classes[] = 'full-header';
		}
		if ( av5_get_option( 'enable-sticky-header', false ) ) {
			$classes[] = 'sticky';
			if ( av5_get_option( 'sticky-header-resizing', false ) ) {
				$classes[] = 'sticky-resized';
			}
		}
		if ( get_theme_mod( 'header-main-menu-style' ) ) {
			$classes[] = get_theme_mod( 'header-main-menu-style' );
		}
		if ( get_theme_mod( 'sticky_header_shadow_enable', false ) ) {
			$classes[] = 'sticky-header--shadow-on';
		}
		if ( get_theme_mod( 'sticky_header_border_enable', false ) ) {
			$classes[] = 'sticky-header--border-on';
		}
		if ( get_theme_mod( 'header_shadow_enable', false ) ) {
			$classes[] = 'header--shadow-on';
		}
		if ( get_theme_mod( 'header_border_enable', false ) ) {
			$classes[] = 'header--border-on';
		}
		if ( get_theme_mod( 'header_dropdowns_shadow_enable' ) != 0 ) {
			$classes[] = 'header__drop-downs--shadow-on';
		}
		if ( get_theme_mod( 'header-main-menu-arrows' ) != 0 ) {
			$classes[] = 'menu--arrow-on';
		}
		if ( av5_get_option( 'sticky-header-alt-logo', false ) ) {
			$classes[] = 'sticky-alt-logo';
		}
		if ( av5_get_option( 'header-cart-text-circle', false ) ) {
			$classes[] = 'header_cart_text--circle';
		}
		if ( av5_get_option_meta( 'header-white-style', false ) || get_theme_mod( 'header_white-style', false ) ) {
			$classes[] = 'header-white-style';
		}

		return join( ' ', apply_filters( 'av5_header_class', $classes ) );
	}
} // End if().
if ( ! function_exists( 'av5_get_mobile_header_class' ) ) {

	/**
	 * Create header classes
	 *
	 * @param string $class Custom class for header.
	 *
	 * @return string
	 */
	function av5_get_mobile_header_class( $class = '' ) {
		$classes = array();
		if ( ! empty( $class ) ) {
			$classes[] = $class;
		}
		if ( get_theme_mod( 'header-main-menu-style' ) ) {
			$classes[] = get_theme_mod( 'header-main-menu-style' );
		}

		if ( av5_get_option( 'header-mobile-sticky' ) ) {
			$classes[] = 'sticky';
		}
		if ( get_theme_mod( 'header_mobile_shadow_enable', false ) ) {
			$classes[] = 'header-mobile--shadow-on';
		}
		if ( get_theme_mod( 'header_mobile_border_enable', false ) ) {
			$classes[] = 'header-mobile--border-on';
		}
		if ( av5_get_option( 'header-cart-text-circle', false ) ) {
			$classes[] = 'header_cart_text--circle';
		}

		return join( ' ', apply_filters( 'av5_mobile_header_class', $classes ) );
	}
} // End if().
if ( ! function_exists( 'av5_header_elements' ) ) {

	/**
	 * Set header elements
	 */
	function av5_header_elements() {
		$elements	 = av5_get_option( 'header-elements-sorter', array() );
		$_elements	 = array();
		foreach ( $elements as $element => $fields ) {
			$fields	 = array_keys( $fields );
			$section = '';
			switch ( $element ) {
				case 'Header Left':
					$section = 'left';
					break;
				case 'Header Right':
					$section = 'right';
					break;
				default:
					$section = '';
			}
			foreach ( $fields as $index => $field ) {
				if ( function_exists( 'av5_template_headerelement_' . $field ) ) {
					add_action( 'av5_header_' . $section, 'av5_template_headerelement_' . $field, ( $index + 1 ) * 10 );
				}
			}
		}
	}
} // End if().
av5_header_elements();
if ( ! function_exists( 'av5_content_mobile_topbar' ) ) {

	/**
	 * Create header classes
	 *
	 * @param string  $before Before HTML.
	 * @param string  $after After HTML.
	 * @param boolean $echo Return or echo content.
	 *
	 * @return string
	 */
	function av5_content_mobile_topbar( $before = '', $after = '', $echo = true ) {
		if ( ! av5_get_option( 'header-mobile-topbar-enable', false ) ) {
			return '';
		}
		$content = apply_filters( 'av5_header_mobile_topbar_content', av5_get_option( 'header-mobile-topline-textarea', '' ) );
		if ( empty( $content ) ) {
			return '';
		}
		$content = sprintf( '%s%s%s', $before, $content, $after );
		if ( $echo ) {
			echo apply_filters( 'av5_content_mobile_topbar', $content ); // WPCS: XSS ok.
		}

		return apply_filters( 'av5_content_mobile_topbar', $content );
	}
}
if ( ! function_exists( 'av5_woocommerce_activated' ) ) {

	/**
	 * Check WooCommerce
	 *
	 * @return boolean
	 */
	function av5_woocommerce_activated() {
		return class_exists( 'woocommerce' ) ? true : false;
	}
}
if ( ! function_exists( 'av5_wpml_activated' ) ) {

	/**
	 * Check WPML
	 *
	 * @return boolean
	 */
	function av5_wpml_activated() {
		return function_exists( 'icl_object_id' ) ? true : false;
	}
}
if ( ! function_exists( 'the_excerpt_max_charlength' ) ) {

	/**
	 * Show excerpt with limit char length
	 *
	 * @param int $charlength Char length.
	 */
	function the_excerpt_max_charlength( $charlength ) {
		$excerpt = get_the_excerpt();
		$charlength++;

		if ( mb_strlen( $excerpt ) > $charlength ) {
			$subex	 = mb_substr( $excerpt, 0, $charlength - 5 );
			$exwords = explode( ' ', $subex );
			$excut	 = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
			if ( $excut < 0 ) {
				echo mb_substr( $subex, 0, $excut ); // WPCS: xss ok.
			} else {
				echo apply_filters( 'av5_the_excerpt_max_charlength', $subex, $excerpt, $charlength ); // WPCS: xss ok.
			}
			echo ' ' . esc_html__( '...', '5th-avenue' );
		} else {
			the_excerpt();
		}
	}
}
if ( ! function_exists( 'av5_image_create' ) ) {

	/**
	 * Create new image by size
	 *
	 * @param integer $post_id ID attached file.
	 * @param array   $size Size for create new image.
	 * @param boolean $crop Crop image.
	 * @return boolean|array
	 */
	function av5_image_create( $post_id, $size, $crop = true ) {
		$fullsizepath = get_attached_file( $post_id );
		if ( ! $fullsizepath || ! file_exists( $fullsizepath ) ) {
			return false;
		}
		$editor = wp_get_image_editor( $fullsizepath );
		if ( is_wp_error( $editor ) ) {
			return false;
		}
		$sizes		 = array();
		$s			 = sprintf( '5av_%d_%d', $size[0], $size[1] );
		$sizes[ $s ] = array(
			'width'	 => $size[0],
			'height' => $size[1],
			'crop'	 => $crop,
		);
		$metadata	 = $editor->multi_resize( $sizes );
		if ( is_array( $metadata ) && array_key_exists( $s, $metadata ) ) {
			return $metadata[ $s ];
		}
		return false;
	}
} // End if().
if ( ! function_exists( 'wp_get_lazy_attachment_image' ) ) {

	/**
	 * Get an HTML img element representing an image attachment
	 *
	 * While `$size` will accept an array, it is better to register a size with
	 * add_image_size() so that a cropped version is generated. It's much more
	 * efficient than having to find the closest-sized image and then having the
	 * browser scale down the image.
	 *
	 * @since 2.5.0
	 *
	 * @param int          $attachment_id Image attachment ID.
	 * @param string|array $size          Optional. Image size. Accepts any valid image size, or an array of width
	 *                                    and height values in pixels (in that order). Default 'thumbnail'.
	 * @param bool         $icon          Optional. Whether the image should be treated as an icon. Default false.
	 * @param string|array $attr          Optional. Attributes for the image markup. Default empty.
	 * @param bool         $full          Optional. Adding attributes with a full image. Default true.
	 * @return string HTML img element or empty string on failure.
	 */
	function wp_get_lazy_attachment_image( $attachment_id, $size = 'thumbnail', $icon = false, $attr = '', $full = true ) {
		global $avenue;
		$html	 = '';
		$image	 = wp_get_attachment_image_src( $attachment_id, $size, $icon );
		if ( $image ) {
			list($src, $width, $height) = $image;
			$hwstring	 = image_hwstring( $width, $height );
			$size_class	 = $size;
			if ( is_array( $size_class ) ) {
				$size_class = join( 'x', $size_class );
			}

			$default_attr = array(
				'src'			 => $avenue->uri . '/assets/img/img-loader.jpg',
				'data-src'		 => $src,
				'class'			 => "attachment-$size_class size-$size_class",
				'alt'			 => trim( strip_tags( get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ) ),
				'title'			 => get_post_field( 'post_title', $attachment_id ),
				'data-caption'	 => get_post_field( 'post_excerpt', $attachment_id ),
			);

			$attr = wp_parse_args( $attr, $default_attr );

			if ( $full && empty( $attr['data-large_image'] ) ) {
				$thumbnail_size	 = apply_filters( 'wp_get_lazy_attachment_image_large_size', 'full' );
				$full_size_image = wp_get_attachment_image_src( $attachment_id, $thumbnail_size );
				if ( $full_size_image ) {
					list($src, $width, $height) = $full_size_image;
					$attr['data-large_image']			 = $src;
					$attr['data-large_image_width']	 = absint( $width );
					$attr['data-large_image_height']	 = absint( $height );
				}
			}

			$attr	 = apply_filters( 'wp_get_lazy_attachment_image_attributes', $attr, $attachment_id, $size );
			$attr	 = array_map( 'esc_attr', $attr );
			$html	 = rtrim( "<img $hwstring" );
			foreach ( $attr as $name => $value ) {
				$html .= " $name=" . '"' . $value . '"';
			}
			$html .= ' />';
		} // End if().

		return apply_filters( 'wp_get_lazy_attachment_image', $html, $attr, $attachment_id, $size );
	}
}
if ( ! function_exists( 'av5_placeholder_video_src' ) ) {

	/**
	 * Get the placeholder imagefor video URL.
	 *
	 * @access public
	 * @return string
	 */
	function av5_placeholder_video_src() {
		global $avenue;

		return apply_filters( 'av5_placeholder_video_src', $avenue->uri . '/assets/img/video-placeholder.svg' );
	}
}
if ( ! function_exists( 'av5_remove_action' ) ) {

	/**
	 * Modify remove action function
	 *
	 * @global array $wp_filter
	 * @param string $tag Tag hook.
	 * @param array  $function_to_remove Function name for remove.
	 * @param int    $priority Priority function for remove.
	 * @return boolean
	 */
	function av5_remove_action( $tag, $function_to_remove, $priority = 10 ) {
		if ( ! is_array( $function_to_remove ) ) {
			return remove_action( $tag, $function_to_remove, $priority );
		}
		global $wp_filter;

		if ( isset( $wp_filter[ $tag ] ) ) {
			if ( is_numeric( $priority ) ) {
				if ( isset( $wp_filter[ $tag ]->callbacks[ $priority ] ) ) {
					foreach ( $wp_filter[ $tag ]->callbacks[ $priority ] as $key => $callback ) {
						$function	 = $callback['function'];
						$function	 = $callback['function'];
						if ( is_a( $function[0], strval( $function_to_remove[0] ) ) && $function[1] == $function_to_remove[1] ) {
							return remove_action( $tag, $function, $priority );
						}
					}
				}
			} else {
				foreach ( $wp_filter[ $tag ]->callbacks as $priority => $callbacks ) {
					foreach ( $callbacks as $key => $callback ) {
						$function = $callback['function'];
						if ( is_a( $function[0], strval( $function_to_remove[0] ) ) && $function[1] == $function_to_remove[1] ) {
							return remove_action( $tag, $function, $priority );
						}
					}
				}
			}
		}

		return false;
	}
} // End if().
if ( ! function_exists( 'av5_empty_menu' ) ) {

	/**
	 * Add empty menu
	 */
	function av5_empty_menu() {
		get_template_part( 'inc/options/theme-options-notice' );
	}
} // End if().
if ( ! function_exists( 'av5_exist_menu_in_location' ) ) {

	/**
	 * Check exist memu in menu location
	 *
	 * @param string $location Name theme location menu.
	 * @return boolean
	 */
	function av5_exist_menu_in_location( $location ) {
		if ( ! empty( $location ) ) {
			$menus = get_theme_mod( 'nav_menu_locations', array() );
			if ( array_key_exists( $location, $menus ) ) {
				$menu_object = wp_get_nav_menu_object( $menus[ $location ] );
				return $menu_object->count > 0;
			}			
		}

		return false;
	}

} // End if().
