<?php
/**
 * 5th-Avenue post comments navigation
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

global $max_page;
$cur_page = get_query_var( 'cpage' );

if ( ! $cur_page ) {
	$cur_page = 1;
}
$prevpage	 = intval( $cur_page ) - 1;
$nextpage	 = intval( $cur_page ) + 1;
?>

<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
	<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', '5th-avenue' ); ?></h2>
	<div class="nav-links">
		<?php if ( $prevpage > 0 ) { ?>
			<div class="nav-previous"><?php echo '<a href="' . esc_url( get_comments_pagenum_link( $prevpage ) ) . '" ' . apply_filters( 'previous_comments_link attributes', '' ) . '><span></span>' . preg_replace( '/&([^#])(?! [a-z]{1,8};)/i', '&#038;$1', esc_html__( 'Older Comments', '5th-avenue' ) ) . '</a>'; // WPCS: xss ok. ?></div>
		<?php } ?>
		<?php if ( $nextpage < $max_page ) { ?>
			<div class="nav-next"><?php echo '<a href="' . esc_url( get_comments_pagenum_link( $nextpage, $max_page ) ) . '" ' . apply_filters( 'next_comments_link_attributes', '' ) . '>' . preg_replace( '/&([^#])(?! [a-z]{1,8};)/i', '&#038;$1', esc_html__( 'Newer Comments', '5th-avenue' ) ) . '<span></span></a>'; // WPCS: xss ok. ?></div>
		<?php } ?>
	</div><!-- .nav-links -->
</nav><!-- #comment-nav-above -->


