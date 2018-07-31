<?php
/**
 * 5th-Avenue archive post meta
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="blog-listing-meta">
	<div class="date">
		<?php
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string, get_the_date( DATE_W3C ), get_the_date(), get_the_modified_date( DATE_W3C ), get_the_modified_date()
		);

		// Wrap the time string in a link, and preface it with 'Posted on'.
		echo sprintf(
			/* Translators: %s: post date */
			__( '<span class="screen-reader-text">Posted on</span> %s', '5th-avenue' ), '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>' // @codingStandardsIgnoreLine WordPress.XSS.EscapeOutput.OutputNotEscaped
		);
		?>
	</div>
	<div class="author">
		<span><?php esc_html_e( 'by', '5th-avenue' ); ?></span> <?php the_author_posts_link(); // Author name.    ?>
	</div>
	<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) { ?>
		<div class="comments-link">
			<?php echo '<div class="label">' . esc_attr( esc_html__( 'Comments', '5th-avenue' ) ) . '</div>'; ?>
			<span class="comments-link"><?php comments_popup_link( esc_html__( 'Leave a comment', '5th-avenue' ), esc_html__( '1 Comment', '5th-avenue' ), esc_html__( '% Comments', '5th-avenue' ) ); ?></span>
		</div>
	</div>
	<?php
}
