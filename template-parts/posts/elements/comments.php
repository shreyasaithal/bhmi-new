<?php
/**
 * 5th-Avenue post comments
 *
 * @package 5th-Avenue
 * @version 1.0.0
 * @author lifeis.design
 */

defined( 'ABSPATH' ) || exit;
$post_comments = get_comments( array( 'post_id' => get_the_ID() ) );
if ( $post_comments ) : ?>
	<div id="comments" class="comments-area">
		<h2 class="comments-title">
			<?php
			printf( // WPCS: XSS OK.
			esc_html( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', '5th-avenue' ) ), number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' // @codingStandardsIgnoreLine WordPress.WP.I18n.MissingSingularPlaceholder
			);
			?>
		</h2>

		<?php
		global $max_page;
		$max_page = intval( get_comment_pages_count( $post_comments ) ) + 1;

		if ( $max_page > 1 && get_option( 'page_comments' ) ) {
			get_template_part( 'template-parts/posts/elements/comments-navigation' );
		}
		?>

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'			 => 'ol',
				'short_ping'	 => true,
				'avatar_size'	 => 65,
			), $post_comments );
			?>
		</ol><!-- .comment-list -->

		<?php
		if ( $max_page > 1 && get_option( 'page_comments' ) ) {
			get_template_part( 'template-parts/posts/elements/comments-navigation' );
		}
		?>
	</div><!-- #comments -->
<?php endif; // Check for have_comments().  ?>

<?php
// If comments are closed and there are comments, let's leave a little note, shall we?
if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
	<div id="comments" class="comments-area">
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', '5th-avenue' ); ?></p>
	</div><!-- #comments -->
<?php
endif;
