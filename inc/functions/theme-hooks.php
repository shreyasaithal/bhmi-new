<?php
/**
 * 5th-Avenue theme hooks
 *
 * @package 5th-Avenue
 * @version 1.0.1
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;


add_action( 'admin_menu', 'av5_add_empty_menu', 50 );
add_action( 'admin_print_styles', 'av5_merlin_enqueue' );
add_action( 'av5_after_post_content', 'av5_post_comments', 50 );
add_action( 'av5_after_post_content', 'av5_post_comments_form', 60 );
add_action( 'av5_breadcrumb', 'av5_woocommerce_breadcrumb' );
add_action( 'av5_fullscreen_menu', 'av5_fullscreen_menu' );
add_action( 'av5_header_logo', 'av5_header_logo' );
add_action( 'av5_header_logo_mobile', 'av5_header_logo_mobile' );
add_action( 'av5_header_menu_left', 'av5_header_menu_left' );
add_action( 'av5_header_menu_right', 'av5_header_menu_right' );
add_action( 'av5_header_mobile_wrap', 'av5_template_header_mobile', 50 );
add_action( 'av5_header_wrap', 'av5_template_header', 50 );
add_action( 'av5_slideout_menu', 'av5_slideout_menu' );
add_action( 'av5_slideout_menu_mobile', 'av5_slideout_menu_mobile' );
add_action( 'av5_title_area_after_title', 'av5_title_area_post_catmeta', 40 );
add_action( 'av5_title_area_after_title', 'av5_template_breadcrumb', 60 );
add_action( 'av5_title_area_hero_after_title', 'av5_title_area_post_catmeta', 40 );
add_action( 'av5_title_area_hero_after_title', 'av5_template_breadcrumb', 60 );
add_action( 'redux/page/' . apply_filters( 'av5_redux_name', 'lid_av5' ) . '/enqueue', 'av5_redux_enqueue' );
add_action( 'wp', 'av5_post_meta_layout' );
add_action( 'wp_footer', 'av5_fullscreenm_modal' );
add_action( 'wp_footer', 'av5_load_banner' );
add_action( 'wp_footer', 'av5_myaccount_modal' );
add_filter( 'body_class', 'av5_get_body_classes' );
add_filter( 'excerpt_more', 'av5_blog_excerpt_more' );
add_filter( 'image_downsize', 'av5_image_downsize', 10, 3 );
add_filter( 'image_get_intermediate_size', 'av5_image_resize', 10, 3 );
add_filter( 'pre_get_posts', 'av5_search_posts_only' );
add_filter( 'redux_custom_widget_args', 'av5_custom_widget_args' );
add_filter( 'wp_image_editors', 'av5_change_graphic_lib' );
add_filter( 'the_content', 'av5_the_content_filter' );
add_filter( 'comment_form_fields', 'av5_comment_form_fields_new_order' );
if ( defined( 'WPB_VC_VERSION' ) ) {
	add_action( 'wp_head', 'av5_vc_header_style', 1000 );
}
if ( av5_get_option( 'enable-page-transitions', false ) ) {
	add_action( 'av5_before_page', 'av5_template_preloader', 10 );
	add_filter( 'body_class', 'av5_class_preloader', 10 );
}
if ( av5_get_option( 'blog-post-tags' ) ) {
	add_action( 'av5_after_post_content', 'av5_post_tags', 10 );
}
if ( av5_get_option( 'blog-post-author-show' ) ) {
	add_action( 'av5_after_post_content', 'av5_post_author_bio', 30 );
}
if ( av5_get_option( 'blog-post-next-prev' ) ) {
	add_action( 'av5_after_post_content', 'av5_post_navigation', 40 );
}

if ( ! function_exists( 'av5_change_graphic_lib' ) ) {

	/**
	 * Change Gaphic Library
	 *
	 * @param array $array Current order list graphic lib.
	 * @return array
	 */
	function av5_change_graphic_lib( $array ) {
		return array( 'WP_Image_Editor_GD', 'WP_Image_Editor_Imagick' );
	}
}
if ( ! function_exists( 'av5_post_meta' ) ) {

	/**
	 * Meta
	 */
	function av5_post_meta() {
		if ( av5_get_option( 'blog-post-date-show' ) && is_single() ) {
			get_template_part( 'template-parts/posts/elements/post-meta' );
		}
	}
}
if ( ! function_exists( 'av5_post_meta_layout' ) ) {

	/**
	 * Post meta layout
	 */
	function av5_post_meta_layout() {
		if ( is_single() ) {
			switch ( av5_get_option( 'blog-post-meta' ) ) {
				case'after-content':
					add_action( 'av5_after_post_meta', 'av5_post_meta', 5 );
					add_action( 'av5_after_post_meta', 'av5_post_cats', 10 );
					break;
				case'below-title':
					add_action( 'av5_after_meta', 'av5_post_cats', 10 );
					add_action( 'av5_title_area_after_title', 'av5_post_meta', 10 );
					add_action( 'av5_title_area_hero_after_title', 'av5_post_meta', 10 );
					break;
				case'above-below-title':
					add_action( 'av5_title_area_before_title', 'av5_post_cats', 10 );
					add_action( 'av5_title_area_hero_before_title', 'av5_post_cats', 10 );
					add_action( 'av5_title_area_after_title', 'av5_post_meta', 10 );
					add_action( 'av5_title_area_hero_after_title', 'av5_post_meta', 10 );
					break;
			}
		}
	}
}
if ( ! function_exists( 'av5_post_cats' ) ) {

	/**
	 * Categories
	 */
	function av5_post_cats() {
		if ( av5_get_option( 'blog-post-category-show' ) ) {
			get_template_part( 'template-parts/posts/elements/categories' );
		}
	}
}
if ( ! function_exists( 'av5_post_tags' ) ) {

	/**
	 * Tags
	 */
	function av5_post_tags() {
		get_template_part( 'template-parts/posts/elements/tags' );
	}
}
if ( ! function_exists( 'av5_post_author_bio' ) ) {

	/**
	 * Author bio.
	 */
	function av5_post_author_bio() {
		get_template_part( 'template-parts/posts/elements/author' );
	}
}
if ( ! function_exists( 'av5_post_navigation' ) ) {

	/**
	 * Navigation.
	 */
	function av5_post_navigation() {
		get_template_part( 'template-parts/posts/elements/navigation' );
	}
}
if ( ! function_exists( 'av5_post_comments' ) ) {

	/**
	 * Comments list.
	 */
	function av5_post_comments() {
		get_template_part( 'template-parts/posts/elements/comments' );
	}
}
if ( ! function_exists( 'av5_post_comments_form' ) ) {

	/**
	 * Comments form.
	 */
	function av5_post_comments_form() {
		get_template_part( 'template-parts/posts/elements/comments-form' );
	}
}
if ( ! function_exists( 'av5_title_area_post_catmeta' ) ) {

	/**
	 * Get categorie meta for title area
	 *
	 * @param string $post_type Theme post type.
	 */
	function av5_title_area_post_catmeta( $post_type = 'posts' ) {
		if ( ( is_home() || is_category() ) && ! ( av5_is_woocommerce_activated() && ( is_shop() || is_product_category() ) ) ) {
			$product_meta = av5_get_option_titlearea( 'titlearea-meta', false );
			if ( $product_meta ) {
				get_template_part( 'template-parts/title/elements/categories' );
			}
		}
	}
}
if ( ! function_exists( 'av5_template_preloader' ) ) {

	/**
	 * Preloader & page transition
	 */
	function av5_template_preloader() {
		get_template_part( 'template-parts/header/elements/preloader' );
	}
}
if ( ! function_exists( 'av5_class_preloader' ) ) {

	/**
	 * Add classes for preloader
	 *
	 * @param array $classes Current classes.
	 * @return string
	 */
	function av5_class_preloader( $classes ) {
		$classes[]	 = 'av5-preloader';
		$classes[]	 = 'page-transitions';
		return $classes;
	}
}
if ( ! function_exists( 'av5_myaccount_modal' ) ) {

	/**
	 * Show modal for login
	 */
	function av5_myaccount_modal() {
		$elements		 = av5_get_option( 'header-elements-sorter', array() );
		$exist_in_header = false;
		if ( ! empty( $elements ) && is_array( $elements ) ) {
			foreach ( $elements as $value ) {
				if ( is_array( $value ) && in_array( 'myaccount', array_keys( $value ) ) ) {
					$exist_in_header = true;
					break;
				}
			}
		}
		if ( av5_is_woocommerce_activated() && ( ! is_user_logged_in() && ( av5_get_option( 'header-mobile-account-show', false ) || $exist_in_header ) ) ) {
			get_template_part( 'template-parts/header/elements/myaccount', 'modal' );
		}
	}
}
if ( ! function_exists( 'av5_fullscreenm_modal' ) ) {

	/**
	 * Show modal for login
	 */
	function av5_fullscreenm_modal() {
		$elements		 = av5_get_option( 'header-elements-sorter', array() );
		$exist_in_header = false;
		if ( ! empty( $elements ) && is_array( $elements ) && 'header-burger-menu-fullscreen' == av5_get_option( 'header-burger-menu-type' ) ) {
			foreach ( $elements as $value ) {
				if ( is_array( $value ) && in_array( 'fullscreenm', array_keys( $value ) ) ) {
					$exist_in_header = true;
					break;
				}
			}
		}
		get_template_part( 'template-parts/header/elements/full-screen-menu', 'modal' );
	}
}
if ( ! function_exists( 'av5_load_banner' ) ) {

	/**
	 * Show load banner
	 */
	function av5_load_banner() {
		$enable = av5_get_option( 'enable-load-banner', false );
		if ( $enable && 'one' == av5_get_option( 'load-banner-many-times', 'one' ) ) {
			$enable = ! isset( $_COOKIE['av5_load_banner_activity'] );
		}

		if ( $enable ) {
			get_template_part( 'template-parts/header/elements/load-banner' );
		}
	}
}
if ( ! function_exists( 'av5_merlin_enqueue' ) ) {

	/**
	 * Add redux css for theme
	 */
	function av5_merlin_enqueue() {
		global $avenue;
		if ( ! wp_style_is( 'merlin' ) ) {
			return false;
		}
		$suffix_style = defined( 'STYLE_DEBUG' ) && STYLE_DEBUG || ! av5_get_option( 'min-css' ) ? '' : '.min';
		wp_enqueue_style( 'av5-merlin', $avenue->uri . '/assets/css/merlin-admin' . $suffix_style . '.css', array( 'merlin' ), $avenue->version, 'all' );
	}
}
if ( ! function_exists( 'av5_search_posts_only' ) ) {

	/**
	 * Search posts only
	 *
	 * @param \WP_Query $query WP Query.
	 * @return \WP_Query
	 */
	function av5_search_posts_only( $query ) {
		if ( $query->is_search && av5_get_option( 'blog-search-posts-only' ) ) {
			$query->set( 'post_type', 'post' );
		}
		return $query;
	}
}
if ( ! function_exists( 'av5_the_content_filter' ) ) {
	
	/**
	 * Fix auto p for shortcodes
	 */	
	function av5_the_content_filter($content) {
		$block = join("|",array("av5_banner_image"));
		$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
		$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);
		return $rep;
	}
}
if ( ! function_exists( 'av5_template_header' ) ) {

	/**
	 * Get header template
	 */
	function av5_template_header() {
		$header_template = apply_filters( 'av5_get_template_header', av5_get_option( 'header-layout-select', 'header-v1' ) );
		get_template_part( 'template-parts/header/' . $header_template );
	}
}
if ( ! function_exists( 'av5_template_breadcrumb' ) ) {

	/**
	 * Get template breadcrumb
	 */
	function av5_template_breadcrumb() {
		$breadcrumbs = av5_get_option_titlearea( 'titlearea-breadcrumbs', false );
		if ( $breadcrumbs ) {
			get_template_part( 'template-parts/header/elements/breadcrumb' );
		}
	}
}
if ( ! function_exists( 'av5_header_menu_left' ) ) {

	/**
	 * Menu for header left
	 */
	function av5_header_menu_left() {
		$walker = '';
		if ( class_exists( 'av5_walker' ) ) {
			$walker = new av5_walker();
		}
		wp_nav_menu( array(
			'theme_location'	 => 'header-menu-left',
			'container_class'	 => 'header-menu header-menu-left',
			'menu_class'		 => 'av5-menu',
			'fallback_cb'		 => '',
			'container'			 => '',
			'link_before'		 => '',
			'link_after'		 => '',
			'items_wrap'		 => '%3$s',
			'walker'			 => $walker,
		) );
	}
}
if ( ! function_exists( 'av5_header_menu_right' ) ) {

	/**
	 * Menu for header right
	 */
	function av5_header_menu_right() {
		$walker = '';
		if ( class_exists( 'av5_walker' ) ) {
			$walker = new av5_walker();
		}
		wp_nav_menu( array(
			'theme_location'	 => 'header-menu-right',
			'container_class'	 => 'header-menu header-menu-right',
			'menu_class'		 => 'av5-menu',
			'fallback_cb'		 => '',
			'container'			 => '',
			'link_before'		 => '',
			'link_after'		 => '',
			'items_wrap'		 => '%3$s',
			'walker'			 => $walker,
		) );
	}
}
if ( ! function_exists( 'av5_slideout_menu' ) ) {

	/**
	 * Menu for menu slideout
	 *
	 * @param string $side Position slideout.
	 */
	function av5_slideout_menu( $side = 'left' ) {
		$walker = '';
		if ( class_exists( 'av5_walker' ) ) {
			$walker = new av5_walker();
		}
		wp_nav_menu( array(
			'theme_location'	 => 'slideout-menu',
			'container_id'		 => 'slide-out-menu-panel',
			'container_class'	 => 'slide-out-menu',
			'menu_class'		 => 'av5-menu',
			'fallback_cb'		 => '',
			'container'			 => '',
			'link_before'		 => '',
			'link_after'		 => '',
			'items_wrap'		 => '%3$s',
			'walker'			 => $walker,
		) );
	}
}
if ( ! function_exists( 'av5_slideout_menu_mobile' ) ) {

	/**
	 * Menu for menu slideout mobile
	 *
	 * @param string $side Position slideout.
	 */
	function av5_slideout_menu_mobile( $side = 'left' ) {
		$walker = '';
		if ( class_exists( 'av5_walker' ) ) {
			$walker = new av5_walker();
		}
		wp_nav_menu( array(
			'theme_location'	 => 'mobile-slideout-menu',
			'container_id'		 => 'mobile-slide-out-menu-panel',
			'container_class'	 => 'slide-out-menu-mobile',
			'menu_class'		 => 'av5-menu',
			'fallback_cb'		 => '',
			'container'			 => '',
			'link_before'		 => '',
			'link_after'		 => '',
			'items_wrap'		 => '%3$s',
			'walker'			 => $walker,
		) );
	}
}
if ( ! function_exists( 'av5_fullscreen_menu' ) ) {

	/**
	 * Menu for Fullscreen menu
	 */
	function av5_fullscreen_menu() {
		$walker = '';
		if ( class_exists( 'av5_walker_full_screen' ) ) {
			$walker = new av5_walker_full_screen();
		}
		wp_nav_menu( array(
			'theme_location'	 => 'slideout-menu',
			'container_id'		 => 'slide-out-menu-panel',
			'container_class'	 => 'slide-out-menu',
			'menu_class'		 => 'av5-menu',
			'fallback_cb'		 => '',
			'container'			 => '',
			'link_before'		 => '',
			'link_after'		 => '',
			'items_wrap'		 => '%3$s',
			'walker'			 => $walker,
		) );
	}
}
if ( ! function_exists( 'av5_header_logo' ) ) {

	/**
	 * Set header logo
	 */
	function av5_header_logo() {
		get_template_part( 'template-parts/header/elements/logo' );
	}
}
if ( ! function_exists( 'av5_header_logo_mobile' ) ) {

	/**
	 * Set header logo mobile
	 */
	function av5_header_logo_mobile() {
		get_template_part( 'template-parts/header/mobile/logo' );
	}
}
if ( ! function_exists( 'av5_template_header_mobile' ) ) {

	/**
	 * Mobile Header
	 */
	function av5_template_header_mobile() {
		$header_template = apply_filters( 'av5_get_template_header_mobile', av5_get_option( 'header-mobile-layout', 'logo-left' ) );
		get_template_part( 'template-parts/header/mobile/' . $header_template );
	}
}
if ( ! function_exists( 'av5_get_body_classes' ) ) {

	/**
	 * Create body classes
	 *
	 * @param array $classes Wordpress classes for body.
	 * @return array
	 */
	function av5_get_body_classes( $classes ) {
		if ( ! is_array( $classes ) ) {
			$classes = array();
		}
		$classes[]	 = av5_get_option( 'website-layout' );
		$classes[]	 = av5_get_option( 'header-mobile-menu-display-type', 'mobile-header-canvas-slide' );
		$classes[]	 = av5_get_option( 'header-mobile-visibility', 'tablet-landscape' );

		if ( get_theme_mod( 'general_input_styles' ) ) {
			$classes[] = get_theme_mod( 'general_input_styles' );
		} else {
			$classes[] = 'flat-input';
		}
		if ( av5_get_option( 'header-layout-select' ) == 'header-v4' ) {
			$classes[] = 'header-layout-4';
		}
		if ( get_theme_mod( 'header-main-menu-style' ) ) {
			$classes[] = 'slideout-' . get_theme_mod( 'header-main-menu-style' );
		}
		if ( av5_get_option( 'mini-cart-show-when-added' ) ) {
			$classes[] = 'mini-cart-show-when-added';
		}
		if ( ! av5_get_option_titlearea( 'titlearea-show', true ) ) {
			$classes[] = 'titlearea--disabled';
		}
		if ( get_theme_mod( 'product_page_swatches_style' ) ) {
			$classes[] = ' swatches--style-' . get_theme_mod( 'product_page_swatches_style' );
		}
		if ( ! get_theme_mod( 'shop_page_banner_border' ) ) {
			$classes[] = ' grid-banners--border-hide';
		}
		if ( get_theme_mod( 'general_links_style' ) ) {
			$classes[] = ' links__style--' . get_theme_mod( 'general_links_style' );
		} else {
			$classes[] = ' links__style--simple';
		}
		if ( get_theme_mod( 'general_primary_button_styles' ) ) {
			$classes[] = ' buttons-primary__style--' . get_theme_mod( 'general_primary_button_styles' );
		}
		if ( get_theme_mod( 'general_primary_shadow_hover' ) ) {
			$classes[] = ' buttons-primary__shadow-hover';
		}
		if ( get_theme_mod( 'general_secondary_button_styles' ) ) {
			$classes[] = ' buttons-secondary__style--' . get_theme_mod( 'general_secondary_button_styles' );
		}
		if ( get_theme_mod( 'general_vertical_line' ) ) {
			$classes[] = ' vertical_line--show';
		}
		if ( get_theme_mod( 'product_labels_style' ) ) {
			$classes[] = ' sale-label__style--' . get_theme_mod( 'product_labels_style' );
		}
		if ( av5_get_option( 'shop-page-product-filters-position' ) ) {
			$classes[] = ' product-filters__layout--' . av5_get_option( 'shop-page-product-filters-position' );
		}
		if ( av5_get_option( 'shop-page-quickview-button-sticky' ) ) {
			$classes[] = ' quick-view__button-sticky';
		}
		if ( av5_get_option( 'animated-notices', false ) ) {
			$classes[] = ' animated-notices';
		}
		if ( av5_get_option( 'layout-passepartout-frame' ) ) {
			 $classes[] = ' layout-passepartout--show-always';
		}
		if ( av5_get_option( 'website-layout' ) === 'layout-passepartout' && av5_get_option( 'layout-passepartout-frame-modals', true ) ) {
			$classes[] = ' layout-passepartout--affect-modals';
		}
		if ( av5_get_option( 'website-layout' ) === 'layout-passepartout' && av5_get_option( 'layout-passepartout-horizontal', false ) ) {
			$classes[] = ' passepartout-horizontal';
		}
		if ( av5_get_option( 'carousel-arrows-position' ) ) {
			$classes[] = 'carousel-arrows--' . av5_get_option( 'carousel-arrows-position' );
		}
		if ( ! av5_get_option( 'back-to-top-button-mobile', false ) ) {
			$classes[] = 'back-to-top--mobile-hide';
		}

		$classes = array_map( 'esc_attr', $classes );

		return apply_filters( 'av5_body_class', $classes );
	}
} // End if().
if ( ! function_exists( 'av5_blog_excerpt_more' ) ) {

	/**
	 * Excerpt ending.
	 *
	 * @return string
	 */
	function av5_blog_excerpt_more() {
		$text = esc_html__( ' ...', '5th-avenue' );
		return $text;
	}
}
if ( ! function_exists( 'av5_image_resize' ) ) {

	/**
	 * Creating non-existing thumbnails for images
	 *
	 * @param array        $data Data for thumbnail image.
	 * @param integer      $post_id ID image.
	 * @param array|string $size Size for imgae.
	 * @return array
	 */
	function av5_image_resize( $data, $post_id, $size ) {
		if ( is_array( $size ) && 0 < $size[0] && 0 < $size[1] ) {
			$exist		 = false;
			$imagedata	 = array();
			if ( $data['width'] == $size[0] && $data['height'] == $size[1] ) {
				$imagedata = wp_get_attachment_metadata( $post_id );
				foreach ( $imagedata['sizes'] as $_size => $_data ) {
					$exist = $exist || ( $_data['width'] == $size[0] && $_data['height'] == $size[1] );
				}
			}
			if ( ! $exist ) {
				$metadata = av5_image_create( $post_id, $size );
				if ( is_array( $metadata ) ) {
					if ( ! array_key_exists( 'sizes', $imagedata ) ) {
						$imagedata = wp_get_attachment_metadata( $post_id );
					}
					$s = sprintf( '5av_%d_%d', $size[0], $size[1] );

					$imagedata['sizes'][ $s ]	 = $metadata;
					wp_update_attachment_metadata( $post_id, $imagedata );
					av5_remove_action( 'image_get_intermediate_size', 'av5_image_resize', 10 );
					$data						 = image_get_intermediate_size( $post_id, $size );
					add_filter( 'image_get_intermediate_size', 'av5_image_resize', 10, 3 );
				}
			}
		} // End if().

		return $data;
	}
} // End if().
if ( ! function_exists( 'av5_image_downsize' ) ) {

	/**
	 * Check if exist image with this size
	 *
	 * @param boolean $out Not used.
	 * @param integer $post_id ID attached file.
	 * @param array   $size Size for create new image.
	 * @return boolean
	 */
	function av5_image_downsize( $out, $post_id, $size ) {
		if ( is_array( $size ) && 0 < $size[0] && 0 < $size[1] ) {
			$exist		 = false;
			$imagedata	 = wp_get_attachment_metadata( $post_id );
			if ( array_key_exists( 'sizes', (array) $imagedata ) && ! empty( $imagedata['sizes'] ) && is_array( $imagedata['sizes'] ) ) {
				foreach ( $imagedata['sizes'] as $_size => $_data ) {
					$exist = $exist || ( $_data['width'] == $size[0] && $_data['height'] == $size[1] ) || sprintf( '5av_%d_%d', $size[0], $size[1] ) == $_size;
				}
			}
			if ( ! $exist ) {
				$metadata = av5_image_create( $post_id, $size );
				if ( is_array( $metadata ) ) {
					if ( ! array_key_exists( 'sizes', $imagedata ) ) {
						$imagedata = wp_get_attachment_metadata( $post_id );
					}
					$s = sprintf( '5av_%d_%d', $size[0], $size[1] );

					$imagedata['sizes'][ $s ] = $metadata;
					wp_update_attachment_metadata( $post_id, $imagedata );
				}
			}
		} // End if().

		return $out;
	}
} // End if().
if ( ! function_exists( 'av5_custom_widget_args' ) ) {

	/**
	 * Update custom widget arguments
	 *
	 * @param array $options Current arguments.
	 * @return array
	 */
	function av5_custom_widget_args( $options = array() ) {
		$options['before_widget']	 = '<aside id="%1$s" class="widget %2$s">';
		$options['after_widget']	 = '</aside>';
		$options['before_title']	 = '<h2 class="widget-title">';
		$options['after_title']	 = '</h2>';
		return $options;
	}
}
if ( ! function_exists( 'av5_add_empty_menu' ) ) {

	/**
	 * Add empty menu
	 */
	function av5_add_empty_menu() {
		if ( ! class_exists( 'ReduxFramework' ) ) {
			call_user_func( 'add_menu_page', esc_html__( '5th Avenue', '5th-avenue' ), esc_html__( '5th Avenue', '5th-avenue' ), 'manage_options', '_lid_options', 'av5_empty_menu', get_template_directory_uri() . '/assets/img/admin-icon.svg', 25 );
		}
	}
} // End if().
if ( ! function_exists( 'av5_vc_header_style' ) ) {

	/**
	 * Header style for custom content with visual composer
	 */
	function av5_vc_header_style() {
		if ( av5_get_option( 'enable-above-footer-area' ) && 'page' == av5_get_option( 'above-footer-area-content-type' ) ) {
			$id = absint( av5_get_option( 'above-footer-area-content-page' ) );
			if ( ! empty( $id ) ) {
				$shortcodes_custom_css	 = get_post_meta( $id, '_wpb_shortcodes_custom_css', true );
				$post_custom_css		 = get_post_meta( $id, '_wpb_post_custom_css', true );
				if ( ! empty( $shortcodes_custom_css ) || ! empty( $post_custom_css ) ) {
					echo '<style type="text/css" data-type="vc_shortcodes-custom-foother-css">';
					echo strip_tags( $shortcodes_custom_css ); // WPCS: xss ok.
					echo strip_tags( $post_custom_css ); // WPCS: xss ok.
					echo '</style>';
				}
			}
		}
	}
}
if ( ! function_exists( 'av5_redux_enqueue' ) ) {

	/**
	 * Add redux css for theme
	 */
	function av5_redux_enqueue() {
		global $avenue;
		if ( ! wp_style_is( 'redux-admin-css' ) ) {
			return false;
		}
		$suffix_style = defined( 'STYLE_DEBUG' ) && STYLE_DEBUG || ! av5_get_option( 'min-css' ) ? '' : '.min';
		wp_enqueue_style( 'av5-redux-admin', $avenue->uri . '/assets/css/redux-admin' . $suffix_style . '.css', array( 'redux-admin-css' ), $avenue->version, 'all' );
	}
}
if ( ! function_exists( 'av5_website_layout_psprt' ) ) {

	/**
	 * Get website layout pasport
	 */
	function av5_website_layout_psprt() {
		?><span class="passepartout-wrap line-top"></span><span class="passepartout-wrap line-bottom"></span><span class="passepartout-wrap line-left"></span><span class="passepartout-wrap line-right"></span><?php
	}

	if ( 'layout-passepartout' === av5_get_option( 'website-layout' ) ) {
		add_action( 'av5_before_page', 'av5_website_layout_psprt', 11 );
	}
}

if ( ! function_exists( 'av5_comment_form_fields_new_order' ) ) {

	/**
	 * Reorder woo review fields
	 *
	 * @param array $fields Fields for review.
	 * @return array
	 */
	function av5_comment_form_fields_new_order( $fields ) {
		$_fields = array();
		foreach ( array( 'author', 'email', 'url' ) as $key ) {
			if ( array_key_exists( $key, $fields ) ) {
				$_fields[ $key ] = $fields[ $key ];
				unset( $fields[ $key ] );
			}
		}
		$_fields = array_merge( $_fields, $fields );
		return $_fields;
	}
}