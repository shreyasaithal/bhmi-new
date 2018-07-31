<?php
/**
 * 5th-Avenue style functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package 5th-Avenue
 * @version 1.0.1
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'av5_custom_upload_mimes' ) ) {

	/**
	 * Add mime for upload custom fonts
	 *
	 * @param array $mime_types Allowed upload files.
	 * @return array
	 */
	function av5_custom_upload_mimes( $mime_types = array() ) {
		$mime_types['ttf']	 = 'font/ttf';
		$mime_types['otf']	 = 'font/otf';
		$mime_types['woff']	 = 'application/font-woff';

		return $mime_types;
	}

	add_filter( 'upload_mimes', 'av5_custom_upload_mimes' );
}

if ( ! function_exists( 'av5_custom_scripts' ) ) {

	/**
	 * Add custon JS in page
	 */
	function av5_custom_scripts() {
		$js = av5_get_option( 'custom_js_code_area', '' );
		if ( ! empty( $js ) ) {
			echo '<script>';
			echo av5_get_option( 'custom_js_code_area', '' ); // WPCS: xss ok.
			echo '</script>';
		}
	}

	add_action( 'wp_footer', 'av5_custom_scripts', 100 );
}

if ( ! function_exists( 'av5_styles' ) ) {

	/**
	 * Add custon style in page
	 *
	 * @return string
	 */
	function av5_styles() {
		$output_css = '';
		if ( class_exists( 'Redux' ) && function_exists( 'av5_styles_redux' ) ) {
			$output_css .= ' /*Redux*/ ' . av5_styles_redux();
		}
		$output_css .= ' /*Theme*/ ' . av5_styles_theme();
		if ( class_exists( 'Kirki' ) ) {
			$output_css .= ' /*Kirki*/ ' . av5_styles_kirki();
		}

		$value = av5_get_option( 'custom_css_code_area', '' );
		if ( ! empty( $value ) ) {
			$output_css .= $value;
		}
		if ( ! empty( $output_css ) ) {
			$output_css	 = preg_replace( '/[\r\n\t ]{2,}/', ' ', $output_css );
			$output_css	 = preg_replace( '/\s+(\:|\;|\{|\})\s+/', '\1', $output_css );
		}

		return $output_css;
	}
} // End if().

if ( ! function_exists( 'av5_styles_kirki' ) ) {

	/**
	 * Get Styles from kirki plugin
	 *
	 * @return string
	 */
	function av5_styles_kirki() {
		$configs = Kirki::$config;
		$_styles = '';

		if ( get_theme_mod( 'footer_newsletter_btn_padding' ) ) {
			$_styles .= '.footer-newsletter .mc4wp-form input[type=text], .footer-newsletter .mc4wp-form input[type=email] { margin-right: 0px;}';
		}
		if ( get_theme_mod( 'footer_newsletter_small_form' ) ) {
			$_styles .= '
                    .footer-newsletter input {
                        max-width:300px;
                    }';
		}
		if ( get_theme_mod( 'header-height' ) ) {
			$_styles .= '
                    .footer-newsletter input {
                        max-width:300px;
                    }';
		}
		foreach ( $configs as $config_id => $args ) {
			if ( isset( $args['disable_output'] ) && true === $args['disable_output'] ) {
				continue;
			}
			$styles = Kirki_Modules_CSS::loop_controls( $config_id );

			$_styles .= apply_filters( "kirki/{$config_id}/dynamic_css", $styles );
		}

		return $_styles;
	}
} // End if().

if ( ! class_exists( 'av5_Redux_Output' ) && class_exists( 'Redux' ) ) {

	/**
	 * Get Styles from Redux plugin
	 */
	class av5_Redux_Output { // @codingStandardsIgnoreLine PEAR.NamingConventions.ValidClassName.StartWithCapital

		/**
		 * Fields
		 *
		 * @var array
		 */
		public static $fields	 = array();
		/**
		 * User dir
		 *
		 * @var string
		 */
		public static $_dir;
		/**
		 * Option values
		 *
		 * @var array
		 */
		public $options			 = array();
		/**
		 * CSS that get auto-appended to the header
		 *
		 * @var string
		 */
		public $outputCSS		 = null; // @codingStandardsIgnoreLine WordPress.NamingConventions.ValidVariableName.MemberNotSnakeCase
		/**
		 * CSS that get sent to the compiler hook
		 *
		 * @var string
		 */
		public $compilerCSS		 = null; // @codingStandardsIgnoreLine WordPress.NamingConventions.ValidVariableName.MemberNotSnakeCase
		/**
		 * Argements for fields
		 *
		 * @var array
		 */
		public $args			 = array();
		/**
		 * Values to generate google font CSS
		 *
		 * @var string
		 */
		public $typography		 = null;

		/**
		 * Create class for get option from Redux
		 *
		 * @param string $opt_name Name prefix theme options.
		 */
		function __construct( $opt_name ) {
			$this->args					 = Redux::getArgs( $opt_name );
			$this->options				 = get_option( $opt_name, array() );
			$this->args['compiler']	 = true;
			$this->args['output']		 = true;
			if ( array_key_exists( $opt_name, Redux::$fields ) ) {
				self::$fields = Redux::$fields[ $opt_name ];
			}
			self::$_dir = ReduxFramework::$_dir;
		}

		/**
		 * Enqueue CSS and Google fonts for front end
		 *
		 * @since       1.0.0
		 * @access      public
		 * @return      void
		 */
		public function _enqueue_output() {
			$fields = self::$fields;
			foreach ( $fields as $fieldk => $field ) {
				if ( isset( $field['type'] ) && 'callback' != $field['type'] ) {
					$field_class = "ReduxFramework_{$field['type']}";
					if ( ! class_exists( $field_class ) ) {

						if ( ! isset( $field['compiler'] ) ) {
							$field['compiler'] = '';
						}

						/**
						 * Field class file
						 * filter 'redux/{opt_name}/field/class/{field.type}
						 *
						 * @param       string        field class file
						 * @param array $field field config data
						 */
						$class_file = apply_filters( "redux/{$this->args['opt_name']}/field/class/{$field['type']}", self::$_dir . "inc/fields/{$field['type']}/field_{$field['type']}.php", $field );

						if ( $class_file && file_exists( $class_file ) && ! class_exists( $field_class ) ) {
							require_once $class_file;
						}
					}

					if ( ! empty( $this->options[ $field['id'] ] ) && class_exists( $field_class ) && method_exists( $field_class, 'output' ) && $this->_can_output_css( $field ) ) {
						$field = apply_filters( "redux/field/{$this->args['opt_name']}/output_css", $field );

						if ( ! empty( $field['output'] ) && ! is_array( $field['output'] ) ) {
							$field['output'] = array( $field['output'] );
						}

						$value	 = isset( $this->options[ $field['id'] ] ) ? $this->options[ $field['id'] ] : '';
						$enqueue = new $field_class( $field, $value, $this );

						if ( ( ( isset( $field['output'] ) && ! empty( $field['output'] ) ) || ( isset( $field['compiler'] ) && ! empty( $field['compiler'] ) ) || 'typography' == $field['type'] || 'icon_select' == $field['type'] ) ) {
							$enqueue->output();
						}
					}
				} // End if().
			} // End foreach().

			if ( ! empty( $this->typography ) && ! empty( $this->typography ) && filter_var( $this->args['output'], FILTER_VALIDATE_BOOLEAN ) ) {
				$typography	 = new ReduxFramework_typography( null, null, $this );
				if ( ! array_key_exists( 'disable_google_fonts_link', $this->args ) || ! $this->args['disable_google_fonts_link'] ) {
					update_option( $this->args['opt_name'] . '-redux-fonts-link', $typography->makeGoogleWebfontLink( $this->typography ) );
				}
			} // End if().
		}

		/**
		 * Can Output CSS
		 * Check if a field meets its requirements before outputting to CSS
		 *
		 * @param string $field Name field.
		 * @return boolean
		 */
		public function _can_output_css( $field ) {
			$return = true;

			$field = apply_filters( "redux/field/{$this->args['opt_name']}/_can_output_css", $field );
			if ( isset( $field['force_output'] ) && true == $field['force_output'] ) {
				return $return;
			}

			if ( ! empty( $field['required'] ) ) {
				if ( isset( $field['required'][0] ) ) {
					if ( ! is_array( $field['required'][0] ) && count( $field['required'] ) == 3 ) {
						$parent_value	 = $this->options[ $field['required'][0] ];
						$check_value	 = $field['required'][2];
						$operation		 = $field['required'][1];
						$return			 = $this->compareValueDependencies( $parent_value, $check_value, $operation );
					} else if ( is_array( $field['required'][0] ) ) {
						foreach ( $field['required'] as $required ) {
							if ( ! is_array( $required[0] ) && count( $required ) == 3 ) {
								$parent_value	 = $this->options[ $required[0] ];
								$check_value	 = $required[2];
								$operation		 = $required[1];
								$return			 = $this->compareValueDependencies( $parent_value, $check_value, $operation );
							}
							if ( ! $return ) {
								return $return;
							}
						}
					}
				}
			}

			return $return;
		}

		/**
		 * Compare data for required field
		 *
		 * @param mixed  $parent_value Parent value.
		 * @param mixed  $check_value Check Value.
		 * @param string $operation Operation for compare.
		 * @return boolean
		 */
		private function compareValueDependencies( $parent_value, $check_value, $operation ) { // @codingStandardsIgnoreLine WordPress.NamingConventions.ValidFunctionName.MethodNameInvalid
			$return = false;
			switch ( $operation ) {
				case '=':
				case 'equals':
					$data['operation'] = '=';

					if ( is_array( $parent_value ) ) {
						foreach ( $parent_value as $idx => $val ) {
							if ( is_array( $check_value ) ) {
								foreach ( $check_value as $i => $v ) {
									if ( $val == $v ) {
										$return = true;
									}
								}
							} else {
								if ( $val == $check_value ) {
									$return = true;
								}
							}
						}
					} else {
						if ( is_array( $check_value ) ) {
							foreach ( $check_value as $i => $v ) {
								if ( $parent_value == $v ) {
									$return = true;
								}
							}
						} else {
							if ( $parent_value == $check_value ) {
								$return = true;
							}
						}
					}
					break;

				case '!=':
				case 'not':
					$data['operation'] = '!==';
					if ( is_array( $parent_value ) ) {
						foreach ( $parent_value as $idx => $val ) {
							if ( is_array( $check_value ) ) {
								foreach ( $check_value as $i => $v ) {
									if ( $val != $v ) {
										$return = true;
									}
								}
							} else {
								if ( $val != $check_value ) {
									$return = true;
								}
							}
						}
					} else {
						if ( is_array( $check_value ) ) {
							foreach ( $check_value as $i => $v ) {
								if ( $parent_value != $v ) {
									$return = true;
								}
							}
						} else {
							if ( $parent_value != $check_value ) {
								$return = true;
							}
						}
					}
					break;
				case '>':
				case 'greater':
				case 'is_larger':
					$data['operation'] = '>';
					if ( $parent_value > $check_value ) {
						$return = true;
					}
					break;
				case '>=':
				case 'greater_equal':
				case 'is_larger_equal':
					$data['operation'] = '>=';
					if ( $parent_value >= $check_value ) {
						$return = true;
					}
					break;
				case '<':
				case 'less':
				case 'is_smaller':
					$data['operation'] = '<';
					if ( $parent_value < $check_value ) {
						$return = true;
					}
					break;
				case '<=':
				case 'less_equal':
				case 'is_smaller_equal':
					$data['operation'] = '<=';
					if ( $parent_value <= $check_value ) {
						$return = true;
					}
					break;
				case 'contains':
					if ( is_array( $parent_value ) ) {
						$parent_value = implode( ',', $parent_value );
					}

					if ( is_array( $check_value ) ) {
						foreach ( $check_value as $idx => $opt ) {
							if ( strpos( $parent_value, (string) $opt ) !== false ) {
								$return = true;
							}
						}
					} else {
						if ( strpos( $parent_value, (string) $check_value ) !== false ) {
							$return = true;
						}
					}

					break;
				case 'doesnt_contain':
				case 'not_contain':
					if ( is_array( $parent_value ) ) {
						$parent_value = implode( ',', $parent_value );
					}

					if ( is_array( $check_value ) ) {
						foreach ( $check_value as $idx => $opt ) {
							if ( strpos( $parent_value, (string) $opt ) === false ) {
								$return = true;
							}
						}
					} else {
						if ( strpos( $parent_value, (string) $check_value ) === false ) {
							$return = true;
						}
					}

					break;
				case 'is_empty_or':
					if ( empty( $parent_value ) || $parent_value == $check_value ) {
						$return = true;
					}
					break;
				case 'not_empty_and':
					if ( ! empty( $parent_value ) && $parent_value != $check_value ) {
						$return = true;
					}
					break;
				case 'is_empty':
				case 'empty':
				case '! isset':
					if ( empty( $parent_value ) ) {
						$return = true;
					}
					break;
				case 'not_empty':
				case '! empty':
				case 'isset':
					if ( ! empty( $parent_value ) ) {
						$return = true;
					}
					break;
			} // End switch().

			return $return;
		}

	}

} // End if().

if ( ! function_exists( 'av5_styles_redux' ) && class_exists( 'av5_Redux_Output' ) ) {

	/**
	 * Get Redux Style
	 *
	 * @return string
	 */
	function av5_styles_redux() {
		$opt_name	 = apply_filters( 'av5_redux_name', 'lid_av5' );
		$aro		 = new av5_Redux_Output( $opt_name );
		$aro->_enqueue_output();

		return $aro->outputCSS . $aro->compilerCSS; // @codingStandardsIgnoreLine WordPress.NamingConventions.ValidVariableName.NotSnakeCaseMemberVar
	}
}

if ( ! function_exists( 'av5_styles_theme' ) ) {

	/**
	 * Create theme Style
	 *
	 * @return string
	 */
	function av5_styles_theme() {
		$output_css = '';

		$sidebar_size = av5_get_option( 'sidebar-size-for-pages', 33 );

		$value = absint( av5_get_option( 'website-width-slider', 1170 ) );
		if ( 1170 !== $value ) {
			$value_cont	 = $value - 30;
			$value_boxed = $value + 30;
			$output_css .= '
				.layout-boxed #page-wrap { max-width:' . $value_boxed . 'px; }
                                .layout-passepartout .container { max-width:' . $value . 'px; }
				.container { max-width:' . $value . 'px; }				
			';
		}
		if ( 'none' === av5_get_option( 'blog-loadin-animation', 'fadeinbottom' ) ) {
			$output_css .= 'article.post{ visibility: visible; }';
		}

		if ( av5_get_option( 'grid-banner-background-1' ) ) {
			$output_css .= '.grid-products-banner-1 .grid-products-wrapper > div{ 
                                background-color: ' . av5_get_option_attr( 'grid-banner-background-1', 'background-color' ) . ';
                                }';
			if ( av5_get_option_attr( 'grid-banner-background-1', 'background-image' ) ) {
				$output_css .= '.grid-products-banner-1 .grid-products-wrapper > div{ 
                                background-image: url("' . av5_get_option_attr( 'grid-banner-background-1', 'background-image' ) . '");
                                background-repeat: ' . av5_get_option_attr( 'grid-banner-background-1', 'background-repeat' ) . ';
                                background-position: ' . av5_get_option_attr( 'grid-banner-background-1', 'background-position' ) . ';
                                background-size: ' . av5_get_option_attr( 'grid-banner-background-1', 'background-size' ) . ';
                                background-attachment: ' . av5_get_option_attr( 'grid-banner-background-1', 'background-attachment' ) . ';
                                }';
			}
		}

		if ( av5_get_option( 'grid-banner-background-2' ) ) {
			$output_css .= '.grid-products-banner-2 .grid-products-wrapper > div{ 
                                background-color: ' . av5_get_option_attr( 'grid-banner-background-2', 'background-color' ) . ';
                                }';
			if ( av5_get_option_attr( 'grid-banner-background-2', 'background-image' ) ) {
				$output_css .= '.grid-products-banner-2 .grid-products-wrapper > div{ 
                                background-image: url("' . av5_get_option_attr( 'grid-banner-background-2', 'background-image' ) . '");
                                background-repeat: ' . av5_get_option_attr( 'grid-banner-background-2', 'background-repeat' ) . ';
                                background-position: ' . av5_get_option_attr( 'grid-banner-background-2', 'background-position' ) . ';
                                background-size: ' . av5_get_option_attr( 'grid-banner-background-2', 'background-size' ) . ';
                                background-attachment: ' . av5_get_option_attr( 'grid-banner-background-2', 'background-attachment' ) . ';
                                }';
			}
		}

		$output_css .= '#header.header .flex-column.logo img { max-height: ' . av5_get_option_attr( 'logo-max-height', 'height', '55px' ) . '; }';

		$value = av5_get_option( 'header-items-spacing', array( 'width' => '5px', 'units' => 'px' ) );
		if ( isset( $value['width'] ) ) {
			if ( isset( $value['units'] ) ) {
				$value['width'] = str_replace( $value['units'], '', $value['width'] );
			}
			$value = absint( $value['width'] ) / 2;
			$output_css .= '.header-right .header-item, .header-left .header-item { margin-left: ' . $value . 'px; margin-right: ' . $value . 'px; }';
		}

		$value = av5_get_option( 'menu-items-spacing', array( 'width' => '10px', 'units' => 'px' ) );
		if ( isset( $value['width'] ) ) {
			if ( isset( $value['units'] ) ) {
				$value['width'] = str_replace( $value['units'], '', $value['width'] );
			}
			$value = absint( $value['width'] ) / 2;
			$output_css .= '.main-navigation .nav-menu > li { padding-left: ' . $value . 'px; padding-right: ' . $value . 'px; }';
		}

		$value = av5_get_option_attr( 'header-side-paddings', 'width', '40px' );
		if ( ! empty( $value ) ) {
			$output_css .= '#header.header .container { padding-left: ' . $value . '; padding-right: ' . $value . '; }';
		}

		$value = av5_get_option( 'header-height', array( 'height' => '95' ) );
		if ( isset( $value['height'] ) ) {
			$h_value = absint( $value['height'] );
			$output_css .= '.sticky .sticky-header-filler, .header-main, body[data-transparent-header="true"].woocommerce div.product .product-info-background .empty-space { height: ' . $value['height'] . '; }';
			if ( av5_get_option( 'header-layout-select' ) == 'header-v4' ) {
				$h_value = $h_value + 42;
				$output_css .= '.sticky .sticky-header-filler, body[data-transparent-header="true"].woocommerce div.product .product-info-background .empty-space { height: ' . $h_value . 'px; }';
			}
		}
		$value = av5_get_option( 'sticky-header-height', array( 'height' => '60' ) );
		if ( isset( $value['height'] ) && av5_get_option( 'sticky-header-resizing') ) {
			$h_value = absint( $value['height'] );
			$output_css .= '#header.header.sticky-resized.is-sticky .header-main { height: ' . $value['height'] . '; }';
		}
		$value = av5_get_option_attr( 'logo-max-height', 'height', '60px' );
		if ( ! empty( $value ) ) {
			$output_css .= '#header.header .flex-column.logo { max-height: ' . $value . '; }';
		}
		$value = av5_get_option( 'shop-page-products-max-width' );
		if ( $value ) {
			$output_css .= '.woocommerce ul.products .product .grid-products-wrapper { max-width: ' . $value . 'px; margin: 0 auto; }';
		}

		if ( av5_get_option( 'load-banner-background' ) ) {
			$output_css .= '.modal-av5-load-banner{ 
								background-color: ' . av5_get_option_attr( 'load-banner-background', 'background-color' ) . ';
							}';
			if ( av5_get_option_attr( 'load-banner-background', 'background-image' ) ) {
				$output_css .= '.modal-av5-load-banner{ 
									background-image: url("' . av5_get_option_attr( 'load-banner-background', 'background-image' ) . '");
									background-repeat: ' . av5_get_option_attr( 'load-banner-background', 'background-repeat' ) . ';
									background-position: ' . av5_get_option_attr( 'load-banner-background', 'background-position' ) . ';
									background-size: ' . av5_get_option_attr( 'load-banner-background', 'background-size' ) . ';
									background-attachment: ' . av5_get_option_attr( 'load-banner-background', 'background-attachment' ) . ';
								}';
			}
		}

		/* FONTS RESPONSIVE */
		$h1_hero_value		 = absint( av5_get_option_attr( 'font-hero-title', 'font-size' ) );
		$h1_value			 = absint( av5_get_option_attr( 'font-h1', 'font-size' ) );
		$h2_value			 = absint( av5_get_option_attr( 'font-h2', 'font-size' ) );
		$h3_value			 = absint( av5_get_option_attr( 'font-h3', 'font-size' ) );
		$h4_value			 = absint( av5_get_option_attr( 'font-h4', 'font-size' ) );
		$blog_listing		 = absint( av5_get_option_attr( 'font-blog-listing-title', 'font-size' ) );
		$product_page		 = absint( av5_get_option_attr( 'font-product-page-title', 'font-size' ) );
		$shop_page			 = absint( av5_get_option_attr( 'font-shop-page-title', 'font-size' ) );
		$product_page_price	 = absint( av5_get_option_attr( 'font-product-page-price-addtocart', 'font-size' ) );
        $main_menu_value		 = absint( av5_get_option_attr( 'font-main-menu', 'line-height' ) );
		
		$fonts_tablet_h1_hero = av5_get_option ( 'fonts-tablet-h1-hero' ) ?: 60;
		$fonts_tablet_h1 = av5_get_option ( 'fonts-tablet-h1' ) ?: 60;
		$fonts_tablet_h2 = av5_get_option ( 'fonts-tablet-h2' ) ?: 44;
		$fonts_tablet_h3 = av5_get_option ( 'fonts-tablet-h3' ) ?: 34;
		$fonts_tablet_h4 = av5_get_option ( 'fonts-tablet-h4' ) ?: 22;
		$fonts_tablet_h5 = av5_get_option ( 'fonts-tablet-h5' ) ?: 20;
		
		$fonts_mobile_h1_hero = av5_get_option ( 'fonts-mobile-h1-hero' ) ?: 48;
		$fonts_mobile_h1 = av5_get_option ( 'fonts-mobile-h1' ) ?: 46;
		$fonts_mobile_h2 = av5_get_option ( 'fonts-mobile-h2' ) ?: 36;
		$fonts_mobile_h3 = av5_get_option ( 'fonts-mobile-h3' ) ?: 30;
		$fonts_mobile_h4 = av5_get_option ( 'fonts-mobile-h4' ) ?: 20;
		$fonts_mobile_h5 = av5_get_option ( 'fonts-mobile-h5' ) ?: 18;

		$fonts_xsmobile_h1 = av5_get_option ( 'fonts-xsmobile-h1' ) ?: 38;
		$fonts_xsmobile_h2 = av5_get_option ( 'fonts-xsmobile-h2' ) ?: 30;
		$fonts_xsmobile_h3 = av5_get_option ( 'fonts-xsmobile-h3' ) ?: 23;
		$fonts_xsmobile_h4 = av5_get_option ( 'fonts-xsmobile-h4' ) ?: 20;
		
		$mobile_fonts	 = '';
		$mobile_xs_fonts = '';
		$table_xs_fonts	 = '';
		$tablet_fonts	 = '';
		$desktop_fonts	 = '';
		$mobile_xxs_fonts = '';

		if ( $h2_value > 38 || $h1_value > 38 ) {
			$output_css .= '@media only screen and (max-width: 1200px) and (min-width: 1024px){ .grid-products-banner-wrapper h1, .grid-products-banner-wrapper h2{font-size: 38px; line-height:1;} }';
		}
        $output_css .= '#slide-out-menu-content--mobile .fa-angle-down { line-height:' . $main_menu_value . 'px }';
		if ( $shop_page > 22 ) {
			$output_css .= '.woocommerce-mini-cart li.woocommerce-mini-cart-item a.av5-product-title, .woocommerce table.shop_table.cart .product-name a, .woocommerce #content table.shop_table.cart .product-name a { font-size:22px; line-height:1; }';
		}
		if ( $blog_listing > 30 ) {
			$output_css .= '.blog-listing-wrap.av5-blog-shortcode h2.entry-title { font-size: 33px; line-height:1.2;}';
		}
		
		if( $product_page > 42 ){
			$output_css .= '.woocommerce div.product .product_title { font-size: 42px; line-height:1;}';
		}
		if( $product_page > 38 ){
			$desktop_fonts .= '.woocommerce-page div.product .product_title, .single-product div.product h1.product_title, .woocommerce div.product .product_title { font-size: 38px; line-height:1;}';
		}
		if ( $desktop_fonts ) {
			$output_css .= '@media only screen and (max-width: 1400px) and (min-width: 1024px){' . $desktop_fonts . '}';
		}
		/* tablet fonts */
		if ( $shop_page > 24 ) {
			$tablet_fonts .= '.woocommerce ul.products.mobile-columns-2 .product-details .woocommerce-loop-product__title { font-size: 1.5em; line-height: 1em;}';
		}

		$tablet_fonts .= '.title-area-wrap h1.entry-title, .title-area-hero h1 { font-size: '. $fonts_tablet_h1_hero .'px; line-height:1.1;}';
		$tablet_fonts .= 'h1 {font-size: '. $fonts_tablet_h1 .'px; line-height:1;}';
		$tablet_fonts .= 'h2 {font-size: '. $fonts_tablet_h2 .'px; line-height:1;}';
		$tablet_fonts .= 'h3,.woocommerce-loop-category__title, .woocommerce #review_form #respond #reply-title, .woocommerce div.product .woocommerce-tabs .panel h2, .dropcap-letter.h3-dropcap, .woocommerce-page .cart-collaterals .cart_totals h2, .woocommerce .cart-collaterals .cart_totals h2 {font-size: '. $fonts_tablet_h3 .'px; line-height:1.1;}';
		$tablet_fonts .= 'h4 {font-size: '. $fonts_tablet_h4 .'px; line-height:1.1;}';
		$tablet_fonts .= 'h5 {font-size: '. $fonts_tablet_h5 .'px; line-height:1.1;}';
		
		if ( $h2_value > 36 || $h1_value > 36 ) {
			$tablet_fonts .= '.grid-products-banner-wrapper h1, .grid-products-banner-wrapper h2{font-size: 36px; line-height:1;}';
		}
		if ( $h1_value > 48 ) {
			$tablet_fonts .= '.av5-banner h1 {font-size: 48px; line-height:1.2;}';
		}
		if ( $tablet_fonts ) {
			$output_css .= '@media only screen and (max-width: 1024px){' . $tablet_fonts . '}';
		}

		/* mobile fonts */

		if ( $product_page_price > 20 ) {
			$mobile_fonts .= '.woocommerce div.product .price { font-size: 20px; line-height: 1.3;}';
		}
		$mobile_fonts .= '.title-area-wrap h1.entry-title, .title-area-hero h1 { font-size: '. $fonts_mobile_h1_hero .'px; line-height:1.1;}';
		$mobile_fonts .= 'h1 { font-size: '. $fonts_mobile_h1 .'px; line-height:1;}';
		$mobile_fonts .= 'h2 { font-size: '. $fonts_mobile_h2 .'px; line-height:1;}';
		$mobile_fonts .= 'h3, .woocommerce-loop-category__title, .woocommerce #review_form #respond #reply-title, .woocommerce div.product .woocommerce-tabs .panel h2, .dropcap-letter.h3-dropcap, .woocommerce-page .cart-collaterals .cart_totals h2, .woocommerce .cart-collaterals .cart_totals h2 { font-size: '. $fonts_mobile_h3 .'px; line-height:1.1;}';
		$mobile_fonts .= 'h4 { font-size: '. $fonts_mobile_h4 .'px; line-height:1.2;}';
		$mobile_fonts .= 'h5 { font-size: '. $fonts_mobile_h5 .'px; line-height:1.2;}';

		if ( $blog_listing > 24 ) {
			$mobile_fonts .= '.blog-listing-wrap.masonry-columns--4 h2.entry-title, .search .masonry-columns--4 h2.entry-title { font-size: 24px; line-height:1.2;}';
		}
		if ( $product_page > 33 ) {
			$mobile_fonts .= '.woocommerce-page div.product .product_title, .single-product div.product h1.product_title, .woocommerce div.product .product_title { font-size: 33px; line-height:1;}';
		}
		if ( $shop_page > 21 ) {
			$mobile_fonts .= '.woocommerce ul.products.mobile-columns-2 .product-details .woocommerce-loop-product__title { font-size: 1.3em; line-height: 1em;}';
		}
		if ( $mobile_fonts ) {
			$output_css .= '@media only screen and (max-width: 767px){' . $mobile_fonts . '}';
		}

		/* mobile xs fonts */

		if ( $product_page_price > 20 ) {
			$mobile_xs_fonts .= '.woocommerce div.product .price { font-size: 20px; line-height: 1;}';
		}
		if ( $shop_page > 17 ) {
			$mobile_xs_fonts .= '.woocommerce ul.products.mobile-columns-2 .product-details .woocommerce-loop-product__title { font-size: 1.2em; line-height: 1em;}';
		}

		$mobile_xs_fonts .= 'h1,.title-area-wrap h1.entry-title,.title-area-hero h1 {font-size: '. $fonts_xsmobile_h1 .'px;line-height:1;}';
		$mobile_xs_fonts .= 'h2 {font-size: '. $fonts_xsmobile_h2 .'px;line-height:1.1;}';
		$mobile_xs_fonts .= 'h3,.woocommerce-loop-category__title, .woocommerce #review_form #respond #reply-title, .woocommerce div.product .woocommerce-tabs .panel h2, .dropcap-letter.h3-dropcap, .woocommerce-page .cart-collaterals .cart_totals h2, .woocommerce .cart-collaterals .cart_totals h2 {font-size: '. $fonts_xsmobile_h3 .'px;line-height:1.1;}';
		$mobile_xs_fonts .= 'h4 {font-size: '. $fonts_xsmobile_h4 .'px;line-height:1.2;}';
		
		if ( $mobile_xs_fonts ) {
			$output_css .= '@media only screen and (max-width: 480px){' . $mobile_xs_fonts . '}';
		}

		/* mobile xxs fonts */
		if ( $blog_listing > 20 ) {
			$mobile_xxs_fonts .= '.blog-listing-wrap h2.entry-title, .search h2.entry-title { font-size: 20px; line-height:1;}';
		}		
		if ( $shop_page > 18 ) {
			$mobile_xxs_fonts .= '.woocommerce-mini-cart li.woocommerce-mini-cart-item a.av5-product-title, .woocommerce table.shop_table.cart .product-name a, .woocommerce #content table.shop_table.cart .product-name a { font-size:18px; line-height:1; }';
		}
		if ( $mobile_xxs_fonts ) {
			$output_css .= '@media only screen and (max-width: 360px){' . $mobile_xxs_fonts . '}';
		}
		return $output_css;
	}
} // End if().

if ( ! function_exists( 'av5_styles_css' ) ) {

	/**
	 * Check dynamic style and create dynamic css.
	 */
	function av5_styles_css() {
		$opt_name = apply_filters( 'av5_redux_name', 'lid_av5' );
		$google_fonts = get_option( $opt_name . '-redux-fonts-link' );
		if ( empty( $google_fonts ) && ! class_exists( 'Redux' ) ) {
			$google_fonts = '//fonts.googleapis.com/css?family=Arial, sans-serif:700|Poppins:100,200,300,400,500,600,700,800,900,100italic,200italic,300italic,400italic,500italic,600italic,700italic,800italic,900italic|butler_bold-webfont|butler_medium-webfont|butler_regular-webfont|Cormorant Garamond:300,400,500,600,700,300italic,400italic,500italic,600italic,700italic|Cormorant:300,400,500,600,700,300italic,400italic,500italic,600italic,700italic|Vidaloka:400&#038;subset=latin&#038;ver=4.9.6';
		}
		if ( $google_fonts ) {
			wp_enqueue_style( 'redux-google-fonts-' . $opt_name, $google_fonts );
		}
		$css = AV5_CSS_To_File::instance();
		if ( $css->is_exist_file() ) {
			wp_enqueue_style( 'av5-style-dynamic', $css->get_url() );
		} else {
			$styles = av5_styles();
			if ( ! empty( $styles ) ) {
				wp_add_inline_style( 'av5-main' . (is_rtl() ? '-rtl' : ''), $styles );
			}
		}
	}

	add_action( 'wp_enqueue_scripts', 'av5_styles_css', 200 );
}


require_once get_template_directory() . '/inc/integrations/css-to-file.php';
