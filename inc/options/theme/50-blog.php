<?php
/**
 * Blog option theme
 *
 * @package           5th-Avenue\Option
 * @subpackage        Redux
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

// -> START Blog Options
$theme_option_sections['blog-options'] = array(
	'title'	 => esc_html__( 'Blog Options', '5th-avenue' ),
	'id'	 => 'blog-options',
	'icon'	 => 'el el-edit',
);
// Blog Listing Options Subsection.
$theme_option_sections['blog-listing'] = array(
	'title'				 => esc_html__( 'Blog Listing', '5th-avenue' ),
	'id'				 => 'blog-listing',
	'subsection'		 => true,
	'customizer_width'	 => '450px',
	'fields'			 => array(
		// Blog Listing options Start.
		// Sidebars configuration.
		array(
			'id'		 => 'posts-layout',
			'type'		 => 'select',
			'title'		 => esc_html__( 'Layout configuration', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Set default page layout.', '5th-avenue' ),
			'options'	 => array(
				'no-sidebar'				 => esc_html__( 'Standard - No Sidebars', '5th-avenue' ),
				'left-sidebar'				 => esc_html__( 'Left Sidebar', '5th-avenue' ),
				'right-sidebar'				 => esc_html__( 'Right Sidebar', '5th-avenue' ),
				'fullwidth'					 => esc_html__( 'Fullwdith - No Sidebars', '5th-avenue' ),
				'fullwidth-left-sidebar'	 => esc_html__( 'Fullwdith - Left Sidebar', '5th-avenue' ),
				'fullwidth-right-sidebar'	 => esc_html__( 'Fullwdith - Right Sidebar', '5th-avenue' ),
			),
			'default'	 => 'no-sidebar',
			'select2'	 => array( 'allowClear' => false ),
		),
		// Sidebar.
		array(
			'id'		 => 'posts-sidebar',
			'required'	 => array(
				'posts-layout',
				'=',
				array( 'left-sidebar', 'right-sidebar', 'fullwidth-left-sidebar', 'fullwidth-right-sidebar' ),
			),
			'type'		 => 'select',
			'data'		 => 'sidebar',
			'title'		 => esc_html__( 'Choose Sidebar', '5th-avenue' ),
		),
		// Sidebar layout.
		array(
			'id'		 => 'posts-sidebar-size',
			'type'		 => 'button_set',
			'title'		 => esc_html__( 'Sidebar size', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Choose sidebar size for blog listing page', '5th-avenue' ),
			'required'	 => array(
				'posts-layout',
				'=',
				array( 'left-sidebar', 'right-sidebar', 'fullwidth-left-sidebar', 'fullwidth-right-sidebar' ),
			),
			'options'	 => array(
				'4'	 => '1/3',
				'3'	 => '1/4',
			),
			'default'	 => '3',
		),
		// Blog Style.
		array(
			'id'		 => 'blog-listing-style',
			'type'		 => 'select',
			'title'		 => esc_html__( 'Blog Style', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Choose blog listing style.', '5th-avenue' ),
			'options'	 => array(
				'classic'	 => esc_html__( 'Default', '5th-avenue' ),
				'masonry'	 => esc_html__( 'Masonry', '5th-avenue' ),
			),
			'default'	 => 'classic',
			'select2'	 => array( 'allowClear' => false ),
		),
		array(
			'id'		 => 'blog-listing-masonry-columns',
			'type'		 => 'button_set',
			'title'		 => esc_html__( 'Masonry blog columns', '5th-avenue' ),
			'required'	 => array( 'blog-listing-style', '=', 'masonry' ),
			'options'	 => array(
				2	 => 2,
				3	 => 3,
				4	 => 4,
			),
			'default'	 => 3,
		),
		array(
			'id'		 => 'blog-listing-align',
			'type'		 => 'button_set',
			'title'		 => esc_html__( 'Align masonry description', '5th-avenue' ),
			'required'	 => array( 'blog-listing-style', '=', 'masonry' ),
			'options'	 => array(
				'left'	 => esc_html__( 'left', '5th-avenue' ),
				'center' => esc_html__( 'center', '5th-avenue' ),
			),
			'default'	 => 'left',
		),
		array(
			'id'		 => 'blog-listing-readmore-style',
			'type'		 => 'select',
			'title'		 => esc_html__( 'Read more link Style', '5th-avenue' ),
			'options'	 => array(
				'underlined' => esc_html__( 'Underlined', '5th-avenue' ),
				'line-left'	 => esc_html__( 'Line on the left', '5th-avenue' ),
			),
			'default'	 => 'underlined',
			'select2'	 => array( 'allowClear' => false ),
		),
		// Hover Animation.
		array(
			'id'		 => 'blog-listing-hover-style',
			'type'		 => 'select',
			'title'		 => esc_html__( 'Hover Style', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Hover style for blog listing item', '5th-avenue' ),
			'options'	 => array(
				''				 => esc_html__( 'None', '5th-avenue' ),
				'move-up'		 => esc_html__( 'Move Up', '5th-avenue' ),
				'zoom-img'		 => esc_html__( 'Image Zoom', '5th-avenue' ),
				'zoom-masked'	 => esc_html__( 'Zoom Masked', '5th-avenue' ),
			),
			'default'	 => '',
			'select2'	 => array( 'allowClear' => false ),
		),
		// Show categories in title area.
		array(
			'id'		 => 'posts-titlearea-meta',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Show Categories in Blog page Title area', '5th-avenue' ),
			'default'	 => true,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		// Show all link in categories in title area.
		array(
			'id'		 => 'posts-titlearea-meta-all',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Show All link in Categories in Blog page Title area', '5th-avenue' ),
			'default'	 => false,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
			'required'	 => array(
				array( 'posts-titlearea-meta', '=', '1' ),
			),
		),
		// Blog listing description.
		array(
			'id'		 => 'blog-listing-description',
			'type'		 => 'select',
			'title'		 => esc_html__( 'Blog listing description', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Choose where to get the post description on blog lsiting', '5th-avenue' ),
			'options'	 => array(
				'none'		 => esc_html__( "Don't show", '5th-avenue' ),
				'excerpt'	 => esc_html__( 'Excerpt', '5th-avenue' ),
				'full'		 => esc_html__( 'Full content (use more tag)', '5th-avenue' ),
			),
			'default'	 => 'excerpt',
			'select2'	 => array( 'allowClear' => false ),
		),
		// Show date in blog listing.
		array(
			'id'		 => 'blog-listing-meta-show',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Show post meta (Date and Author) in blog listing', '5th-avenue' ),
			'default'	 => false,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		// read more link text.
		array(
			'id'		 => 'blog-listing-readmore-text',
			'type'		 => 'text',
			'title'		 => esc_html__( 'Set Read more link text. Leave empty to remove read more link.', '5th-avenue' ),
			'default'	 => esc_html__( 'Read more', '5th-avenue' ),
		),
		// Show category link in blog listing.
		array(
			'id'		 => 'blog-listing-category-show',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Show post category in blog listing', '5th-avenue' ),
			'default'	 => true,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		array(
			'id'			 => 'blog-listing-image-size',
			'type'			 => 'dimensions',
			'units'			 => array( 'px' ), // You can specify a unit value. Possible: px, em, %
			'units_extended' => 'true', // Allow users to select any type of unit.
			'title'			 => esc_html__( 'Max Image Size', '5th-avenue' ),
			'subtitle'		 => esc_html__( 'Max Size for images on blog listing.', '5th-avenue' ),
			'default'		 => array(
				'width'	 => 1400,
				'height' => 700,
			),
		),
		array(
			'id'		 => 'blog-pagination-type',
			'type'		 => 'select',
			'title'		 => esc_html__( 'Pagination Type', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Choose to divide blog posts by pages or load them while scrolling the page', '5th-avenue' ),
			'options'	 => array(
				'default'		 => esc_html__( 'Default', '5th-avenue' ),
				'loadmore'		 => esc_html__( 'Load more button', '5th-avenue' ),
				'infinitescroll' => esc_html__( 'Infinite Scroll', '5th-avenue' ),
			),
			'default'	 => 'default',
			'select2'	 => array( 'allowClear' => false ),
		),
		// Load In Animation.
		array(
			'id'		 => 'blog-loadin-animation',
			'type'		 => 'select',
			'title'		 => esc_html__( 'Load In Animation', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Choose to divide blog posts by pages or load them while scrolling the page', '5th-avenue' ),
			'options'	 => array(
				'none'			 => esc_html__( 'None', '5th-avenue' ),
				'fadein'		 => esc_html__( 'Fade in', '5th-avenue' ),
				'fadeinbottom'	 => esc_html__( 'Fade in from bottom', '5th-avenue' ),
				'leftright'		 => esc_html__( 'Left / Right', '5th-avenue' ),
			),
			'default'	 => 'fadeinbottom',
			'select2'	 => array( 'allowClear' => false ),
		),
		// Search posts only.
		array(
			'id'		 => 'blog-search-posts-only',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Search posts only', '5th-avenue' ),
			'default'	 => false,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
	// Blog Listing options End.
	),
);
// Blog Post Options Subsection.
$theme_option_sections['blog-post']	 = array(
	'title'				 => esc_html__( 'Blog Posts', '5th-avenue' ),
	'id'				 => 'blog-post',
	'subsection'		 => true,
	'customizer_width'	 => '450px',
	'fields'			 => array(
		// Blog Post options Start.
		// Blog post meta.
		array(
			'id'		 => 'blog-post-meta',
			'type'		 => 'select',
			'title'		 => esc_html__( 'Blog post meta', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Choose where to show the post meta', '5th-avenue' ),
			'options'	 => array(
				'none'				 => esc_html__( "Don't show", '5th-avenue' ),
				'below-title'		 => esc_html__( 'Below Title', '5th-avenue' ),
				'above-below-title'	 => esc_html__( 'Above and Below Title', '5th-avenue' ),
				'after-content'		 => esc_html__( 'After Content', '5th-avenue' ),
			),
			'default'	 => 'below-title',
			'select2'	 => array( 'allowClear' => false ),
		),
		// Show date in post.
		array(
			'id'		 => 'blog-post-date-show',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Show post Date and Author name', '5th-avenue' ),
			'default'	 => true,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		// Show tags.
		array(
			'id'		 => 'blog-post-tags',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Show tags', '5th-avenue' ),
			'default'	 => true,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		// Show author bio block.
		array(
			'id'		 => 'blog-post-author-show',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Show Author bio block in post', '5th-avenue' ),
			'default'	 => false,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		// Centered author bio block.
		array(
			'id'		 => 'blog-post-author-centered',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Centered Style for Author bio block in post', '5th-avenue' ),
			'default'	 => false,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		// Show category.
		array(
			'id'		 => 'blog-post-category-show',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Show post categories', '5th-avenue' ),
			'default'	 => true,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		// Next prev post links.
		array(
			'id'		 => 'blog-post-next-prev',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Next and Previous Post Links', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Add links at the bottom of every post page that leads to the next and previous posts.', '5th-avenue' ),
			'default'	 => true,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		// Next prev post white.
		array(
			'id'		 => 'blog-post-next-prev-white',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Next and Previous Links White Colored', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Make text and icons for next prev links white, useful for dark background', '5th-avenue' ),
			'default'	 => true,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		// Next prev post style.
		array(
			'id'		 => 'blog-post-next-prev-style',
			'type'		 => 'select',
			'title'		 => esc_html__( 'Next and Previous Post Links Style', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Choose between simple links or animated with post images', '5th-avenue' ),
			'options'	 => array(
				'next-prev-style--links'			 => esc_html__( 'Default, Links only', '5th-avenue' ),
				'next-prev-style--links-2'			 => esc_html__( 'Links only 2', '5th-avenue' ),
				'next-prev-style--images'			 => esc_html__( 'With post Images', '5th-avenue' ),
				'next-prev-style--images-centered'	 => esc_html__( 'With post Images Centered', '5th-avenue' ),
				'next-prev-style--images-on-hover'	 => esc_html__( 'Post Image on Hover', '5th-avenue' ),
			),
			'default'	 => 'next-prev-style--links',
			'select2'	 => array( 'allowClear' => false ),
		),
		// Next only.
		array(
			'id'		 => 'blog-post-next-only',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Show Next post only', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Do not show previous post link.', '5th-avenue' ),
			'default'	 => false,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		// Social Media Sharing Buttons.
		array(
			'id'		 => 'blog-post-social-share',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Show Social Media Sharing Buttons', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Activate this to enable social sharing buttons on your blog posts.', '5th-avenue' ),
			'default'	 => true,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		// Facebook.
		array(
			'id'		 => 'blog-post-social-facebook',
			'type'		 => 'switch',
			'required'	 => array( 'blog-post-social-share', '=', '1' ),
			'title'		 => esc_html__( '&nbsp;&nbsp;&nbsp;Facebook', '5th-avenue' ),
			'default'	 => true,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		// Twitter.
		array(
			'id'		 => 'blog-post-social-twitter',
			'type'		 => 'switch',
			'required'	 => array( 'blog-post-social-share', '=', '1' ),
			'title'		 => esc_html__( '&nbsp;&nbsp;&nbsp;Twitter', '5th-avenue' ),
			'default'	 => true,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		// Google plus.
		array(
			'id'		 => 'blog-post-social-google',
			'type'		 => 'switch',
			'required'	 => array( 'blog-post-social-share', '=', '1' ),
			'title'		 => esc_html__( '&nbsp;&nbsp;&nbsp;Google', '5th-avenue' ),
			'default'	 => true,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
		// Pinterest.
		array(
			'id'		 => 'blog-post-social-pinterest',
			'type'		 => 'switch',
			'required'	 => array( 'blog-post-social-share', '=', '1' ),
			'title'		 => esc_html__( '&nbsp;&nbsp;&nbsp;Pinterest', '5th-avenue' ),
			'default'	 => true,
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
		),
	// Blog Post options End.
	),
);


$theme_option_sections['posts-meta-options-title'] = array(
	'title'				 => esc_html__( 'Blog Listing Title Area', '5th-avenue' ),
	'id'				 => 'posts-meta-options-title',
	'subsection'		 => true,
	'customizer_width'	 => '450px',
	'fields'			 => array(
		array(
			'id'		 => 'posts-header-white-style',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Blog Header White style', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Make all elements white in header and use white logo image. Useful for transparent header on dark background.', '5th-avenue' ),
			'on'		 => esc_html__( 'Enabled', '5th-avenue' ),
			'off'		 => esc_html__( 'Disabled', '5th-avenue' ),
			'default'	 => false,
		),
		array(
			'id'		 => 'posts-titlearea-show',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Show Title Area', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Enable to show page title', '5th-avenue' ),
			'on'		 => esc_html__( 'Enabled', '5th-avenue' ),
			'off'		 => esc_html__( 'Disabled', '5th-avenue' ),
			'default'	 => true,
		),
		array(
			'id'		 => 'posts-titlearea-type',
			'type'		 => 'select',
			'title'		 => esc_html__( 'Page Title Type', '5th-avenue' ),
			'required'	 => array( 'posts-titlearea-show', '=', '1' ),
			'options'	 => array(
				'standard'	 => esc_html__( 'Standard', '5th-avenue' ),
				'hero'		 => esc_html__( 'Hero', '5th-avenue' ),
				'revslider'	 => esc_html__( 'Slider', '5th-avenue' ),
			),
			'default'	 => 'standard',
		),
		array(
			'id'		 => 'posts-titlearea-title',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Show page title', '5th-avenue' ),
			'required'	 => array(
				array( 'posts-titlearea-type', '!=', 'revslider' ),
				array( 'posts-titlearea-show', '=', '1' ),
			),
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
			'default'	 => true,
		),
		array(
			'id'		 => 'posts-titlearea-text-color-style',
			'type'		 => 'select',
			'title'		 => esc_html__( 'Title Area Text Color Style', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Choose the text colors style to fit background image. This option affect additional content and breadcrumbs.', '5th-avenue' ),
			'required'	 => array(
				array( 'posts-titlearea-type', '=', 'hero' ),
				array( 'posts-titlearea-show', '=', '1' ),
			),
			'options'	 => array(
				'default'	 => esc_html__( 'Default', '5th-avenue' ),
				'white'		 => esc_html__( 'Light', '5th-avenue' ),
			),
			'default'	 => 'default',
		),
		array(
			'id'		 => 'posts-titlearea-title-color',
			'type'		 => 'color_rgba',
			'title'		 => esc_html__( 'Title text color', '5th-avenue' ),
			'required'	 => array(
				array( 'posts-titlearea-type', '=', 'hero' ),
				array( 'posts-titlearea-show', '=', '1' ),
			),
			'default'	 => array(
				'color'	 => '#000000',
				'alpha'	 => '1',
			),
		),
		array(
			'id'		 => 'posts-titlearea-subtitle-color',
			'type'		 => 'color_rgba',
			'title'		 => esc_html__( 'Subtitle text color', '5th-avenue' ),
			'required'	 => array(
				array( 'posts-titlearea-type', '=', 'hero' ),
				array( 'posts-titlearea-show', '=', '1' ),
			),
			'default'	 => array(
				'color'	 => '#000000',
				'alpha'	 => '1',
			),
		),
		array(
			'id'		 => 'posts-titlearea-text-above',
			'type'		 => 'text',
			'title'		 => esc_html__( 'Header sub title', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'You can add a short line of text just above the title', '5th-avenue' ),
			'required'	 => array(
				array( 'posts-titlearea-type', '!=', 'revslider' ),
				array( 'posts-titlearea-show', '=', '1' ),
			),
		),
		array(
			'id'		 => 'posts-titlearea-hero-additional-content',
			'type'		 => 'editor',
			'title'		 => esc_html__( 'Header additional content', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'You can add any content to the header area including shortcodes.', '5th-avenue' ),
			'required'	 => array(
				array( 'posts-titlearea-type', '=', 'hero' ),
				array( 'posts-titlearea-show', '=', '1' ),
			),
		),
		array(
			'id'					 => 'posts-titlearea-background',
			'type'					 => 'background',
			'title'					 => esc_html__( 'Title Area Background', '5th-avenue' ),
			'subtitle'				 => esc_html__( 'You can set background image and color for title area.', '5th-avenue' ),
			'required'				 => array(
				array( 'posts-titlearea-type', '=', 'hero' ),
				array( 'posts-titlearea-show', '=', '1' ),
			),
			'background-repeat'		 => false,
			'background-attachment'	 => false,
			'background-position'	 => false,
			'background-size'		 => false,
		),
		array(
			'id'			 => 'posts-titlearea-hero-height',
			'type'			 => 'dimensions',
			'title'			 => esc_html__( 'Hero Heading Height', '5th-avenue' ),
			'units'			 => array( 'px' ), // You can specify a unit value. Possible: px, em, %.
			'units_extended' => 'true', // Allow users to select any type of unit.
			'required'		 => array(
				array( 'posts-titlearea-type', '=', 'hero' ),
				array( 'posts-titlearea-show', '=', '1' ),
			),
			'width'			 => false,
			'default'		 => array(
				'height' => 600,
			),
		),
		array(
			'id'		 => 'posts-titlearea-hero-effect',
			'type'		 => 'button_set',
			'title'		 => esc_html__( 'Hero Heading Effect', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'None = title area scrolls with content. Fixed title area stay on the same position, content scrolls over the title area.', '5th-avenue' ),
			'required'	 => array(
				array( 'posts-titlearea-type', '=', 'hero' ),
				array( 'posts-titlearea-show', '=', '1' ),
			),
			'options'	 => array(
				'none'		 => esc_html__( 'None', '5th-avenue' ),
				'parallax'	 => esc_html__( 'Parallax', '5th-avenue' ),
				'parallax2'	 => esc_html__( 'Parallax Bg', '5th-avenue' ),
				'fixed'		 => esc_html__( 'Fixed', '5th-avenue' ),
			),
			'default'	 => 'parallax',
		),
		array(
			'id'		 => 'posts-titlearea-revslider-sliders-alias',
			'type'		 => 'select',
			'title'		 => esc_html__( 'Revolution Slider Alias', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Choose a Revolutions Slider to use on top of the page.', '5th-avenue' ),
			'required'	 => array(
				array( 'posts-titlearea-type', '=', 'revslider' ),
				array( 'posts-titlearea-show', '=', '1' ),
			),
			'options'	 => $rev_slider_all_aliases,
		),
		array(
			'id'		 => 'posts-titlearea-hero-overlay-color',
			'type'		 => 'color',
			'title'		 => esc_html__( 'Hero Overlay color', '5th-avenue' ),
			'required'	 => array(
				array( 'posts-titlearea-type', '=', 'hero' ),
				array( 'posts-titlearea-show', '=', '1' ),
			),
			'default'	 => '#000000',
		),
		array(
			'id'			 => 'posts-titlearea-hero-overlay-opacity',
			'type'			 => 'slider',
			'title'			 => esc_html__( 'Hero Overlay Opacity %', '5th-avenue' ),
			'required'		 => array(
				array( 'posts-titlearea-type', '=', 'hero' ),
				array( 'posts-titlearea-show', '=', '1' ),
			),
			'min'			 => 0,
			'step'			 => 1,
			'max'			 => 90,
			'display_value'	 => 'text',
			'default'		 => 40,
		),
	),
);


$theme_option_sections['post-meta-options-title'] = array(
	'title'				 => esc_html__( 'Posts Title Area', '5th-avenue' ),
	'id'				 => 'post-meta-options-title',
	'subsection'		 => true,
	'customizer_width'	 => '450px',
	'fields'			 => array(
		array(
			'id'		 => 'post-titlearea-show',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Show Title Area', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Enable to show page title and breadcrumbs.', '5th-avenue' ),
			'on'		 => esc_html__( 'Enabled', '5th-avenue' ),
			'off'		 => esc_html__( 'Disabled', '5th-avenue' ),
			'default'	 => true,
		),
		array(
			'id'		 => 'post-titlearea-type',
			'type'		 => 'select',
			'title'		 => esc_html__( 'Page Title Type', '5th-avenue' ),
			'required'	 => array( 'post-titlearea-show', '=', '1' ),
			'options'	 => array(
				'standard'	 => esc_html__( 'Standard', '5th-avenue' ),
				'hero'		 => esc_html__( 'Hero', '5th-avenue' ),
				'revslider'	 => esc_html__( 'Slider', '5th-avenue' ),
			),
			'default'	 => 'standard',
		),
		array(
			'id'		 => 'post-titlearea-breadcrumbs',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Show breadcrumbs', '5th-avenue' ),
			'required'	 => array(
				array( 'post-titlearea-type', '!=', 'revslider' ),
				array( 'post-titlearea-show', '=', '1' ),
			),
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
			'default'	 => false,
		),
		array(
			'id'		 => 'post-titlearea-title',
			'type'		 => 'switch',
			'title'		 => esc_html__( 'Show page title', '5th-avenue' ),
			'required'	 => array(
				array( 'post-titlearea-type', '!=', 'revslider' ),
				array( 'post-titlearea-show', '=', '1' ),
			),
			'on'		 => esc_html__( 'Yes', '5th-avenue' ),
			'off'		 => esc_html__( 'No', '5th-avenue' ),
			'default'	 => true,
		),
		array(
			'id'		 => 'post-titlearea-text-color-style',
			'type'		 => 'select',
			'title'		 => esc_html__( 'Title Area Text Color Style', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Choose the text colors style to fit background image. This option affect additional content and breadcrumbs.', '5th-avenue' ),
			'required'	 => array(
				array( 'post-titlearea-type', '=', 'hero' ),
				array( 'post-titlearea-show', '=', '1' ),
			),
			'options'	 => array(
				'default'	 => esc_html__( 'Default', '5th-avenue' ),
				'white'		 => esc_html__( 'Light', '5th-avenue' ),
			),
			'default'	 => 'default',
		),
		array(
			'id'		 => 'post-titlearea-title-color',
			'type'		 => 'color_rgba',
			'title'		 => esc_html__( 'Title text color', '5th-avenue' ),
			'required'	 => array(
				array( 'post-titlearea-type', '=', 'hero' ),
				array( 'post-titlearea-show', '=', '1' ),
			),
			'default'	 => array(
				'color'	 => '#000000',
				'alpha'	 => '1',
			),
		),
		array(
			'id'		 => 'post-titlearea-subtitle-color',
			'type'		 => 'color_rgba',
			'title'		 => esc_html__( 'Subtitle text color', '5th-avenue' ),
			'required'	 => array(
				array( 'post-titlearea-type', '=', 'hero' ),
				array( 'post-titlearea-show', '=', '1' ),
			),
			'default'	 => array(
				'color'	 => '#000000',
				'alpha'	 => '1',
			),
		),
		array(
			'id'		 => 'post-titlearea-text-above',
			'type'		 => 'text',
			'title'		 => esc_html__( 'Header sub title', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'You can add a short line of text just above the title', '5th-avenue' ),
			'required'	 => array(
				array( 'post-titlearea-type', '!=', 'revslider' ),
				array( 'post-titlearea-show', '=', '1' ),
			),
		),
		array(
			'id'		 => 'post-titlearea-hero-additional-content',
			'type'		 => 'editor',
			'title'		 => esc_html__( 'Header additional content', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'You can add any content to the header area including shortcodes.', '5th-avenue' ),
			'required'	 => array(
				array( 'post-titlearea-type', '=', 'hero' ),
				array( 'post-titlearea-show', '=', '1' ),
			),
		),
		array(
			'id'					 => 'post-titlearea-background',
			'type'					 => 'background',
			'title'					 => esc_html__( 'Title Area Background', '5th-avenue' ),
			'subtitle'				 => esc_html__( 'You can set background image and color for title area.', '5th-avenue' ),
			'required'				 => array(
				array( 'post-titlearea-type', '=', 'hero' ),
				array( 'post-titlearea-show', '=', '1' ),
			),
			'background-repeat'		 => false,
			'background-attachment'	 => false,
			'background-position'	 => false,
			'background-size'		 => false,
		),
		array(
			'id'			 => 'post-titlearea-hero-height',
			'type'			 => 'dimensions',
			'title'			 => esc_html__( 'Hero Heading Height', '5th-avenue' ),
			'units'			 => array( 'px' ), // You can specify a unit value. Possible: px, em, %
			'units_extended' => 'true', // Allow users to select any type of unit.
			'required'		 => array(
				array( 'post-titlearea-type', '=', 'hero' ),
				array( 'post-titlearea-show', '=', '1' ),
			),
			'width'			 => false,
			'default'		 => array(
				'height' => 600,
			),
		),
		array(
			'id'		 => 'post-titlearea-hero-effect',
			'type'		 => 'button_set',
			'title'		 => esc_html__( 'Hero Heading Effect', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'None = title area scrolls with content. Fixed title area stay on the same position, content scrolls over the title area.', '5th-avenue' ),
			'required'	 => array(
				array( 'post-titlearea-type', '=', 'hero' ),
				array( 'post-titlearea-show', '=', '1' ),
			),
			'options'	 => array(
				'none'		 => esc_html__( 'None', '5th-avenue' ),
				'parallax'	 => esc_html__( 'Parallax', '5th-avenue' ),
				'parallax2'	 => esc_html__( 'Parallax Bg', '5th-avenue' ),
				'fixed'		 => esc_html__( 'Fixed', '5th-avenue' ),
			),
			'default'	 => 'parallax',
		),
		array(
			'id'		 => 'post-titlearea-revslider-sliders-alias',
			'type'		 => 'select',
			'title'		 => esc_html__( 'Revolution Slider Alias', '5th-avenue' ),
			'subtitle'	 => esc_html__( 'Choose a Revolutions Slider to use on top of the page.', '5th-avenue' ),
			'required'	 => array(
				array( 'post-titlearea-type', '=', 'revslider' ),
				array( 'post-titlearea-show', '=', '1' ),
			),
			'options'	 => $rev_slider_all_aliases,
		),
		array(
			'id'		 => 'post-titlearea-hero-overlay-color',
			'type'		 => 'color',
			'title'		 => esc_html__( 'Hero Overlay color', '5th-avenue' ),
			'required'	 => array(
				array( 'post-titlearea-type', '=', 'hero' ),
				array( 'post-titlearea-show', '=', '1' ),
			),
			'default'	 => '#000000',
		),
		array(
			'id'			 => 'post-titlearea-hero-overlay-opacity',
			'type'			 => 'slider',
			'title'			 => esc_html__( 'Hero Overlay Opacity %', '5th-avenue' ),
			'required'		 => array(
				array( 'post-titlearea-type', '=', 'hero' ),
				array( 'post-titlearea-show', '=', '1' ),
			),
			'min'			 => 0,
			'step'			 => 1,
			'max'			 => 90,
			'display_value'	 => 'text',
			'default'		 => 40,
		),
	),
);

