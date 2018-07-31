<?php
/**
 * 5th-Avenue post meta
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

global $authordata;

if ( $post && is_singular() ) {
	$authordata	 = get_userdata( $post->post_author ); // @codingStandardsIgnoreLine WordPress.Variables.GlobalVariables.OverrideProhibited It is necessary to forcefully define this variable because it can not be installed so early.
?>
	<div class="post__meta-wrap">
		<div class="date">
			<?php
			$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
			if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
				$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
			}

			$time_string = sprintf( $time_string, get_the_date( DATE_W3C ), get_the_date(), get_the_modified_date( DATE_W3C ), get_the_modified_date()
			);

			// Wrap the time string in a link, and preface it with 'Posted on'.
			echo sprintf( // WPCS: xss ok.
				/* translators: %s: post date */
				__( '<span class="screen-reader-text">Posted on</span> %s', '5th-avenue' ), '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
			);
			?>
		</div>
		<div class="author">
			<span><?php esc_html_e( 'by', '5th-avenue' ); ?></span> <?php the_author_posts_link(); // Author name. ?>
		</div>
			<?php do_action( 'av5_after_meta' ); ?>
	</div>
<?php
}
