<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy *
 * @package 5th-Avenue
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment!  ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			printf( // WPCS: XSS OK.
				esc_html( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', '5th-avenue' ) ), number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' // @codingStandardsIgnoreLine WordPress.WP.I18n.MissingSingularPlaceholder
			);
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
				<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', '5th-avenue' ); ?></h2>
				<div class="nav-links">

					<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', '5th-avenue' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', '5th-avenue' ) ); ?></div>

				</div><!-- .nav-links -->
			</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation.  ?>

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'			 => 'ol',
				'short_ping'	 => true,
				'avatar_size'	 => 65,
			) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
				<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', '5th-avenue' ); ?></h2>
				<div class="nav-links">

					<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', '5th-avenue' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', '5th-avenue' ) ); ?></div>

				</div><!-- .nav-links -->
			</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation.  ?>

	<?php endif; // Check for have_comments().  ?>

	<?php
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', '5th-avenue' ); ?></p>
	<?php endif; ?>
	<?php
	if ( comments_open() ) {
		$required_text	 = null;
		$form_style		 = ( ! empty( $options['form-style'] ) ) ? $options['form-style'] : 'default';
		$comment_label	 = ( 'minimal' === $form_style ) ? '<label for="comment">' . esc_html__( 'My comment is..', '5th-avenue' ) . '</label>' : null;
		$args			 = array(
			'id_form'				 => 'commentform',
			'id_submit'				 => 'submit',
			'comment_field'			 => '<div class="row"><textarea id="comment" required name="comment" cols="45" rows="8" aria-required="true"></textarea><span class="bar"></span><label for="comment">' . esc_html__( 'Leave your comment here...', '5th-avenue' ) . '</label></div>',
			'comment_notes_before'	 => '',
			'comment_notes_after'	 => '',
			'fields'				 => apply_filters( 'comment_form_default_fields', array(
					'author' => '<div class="row"> <div class="col-md-4"><input id="author" name="author" type="text" required value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" /><span class="bar"></span><label for="author">' . esc_html__( 'Name', '5th-avenue' ) . '<span class="required">*</span></label></div>',
					'email'	 => '<div class="col-md-4"><input id="email" name="email" type="text" required value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" /><span class="bar"></span><label for="email">' . esc_html__( 'Email', '5th-avenue' ) . '<span class="required">*</span></label></div>',
					'url'	 => '<div class="col-md-4"><input id="url" name="url" type="text" required value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /><span class="bar"></span><label for="url">' . esc_html__( 'Website', '5th-avenue' ) . '</label></div></div>',
				)
			),
		);

		comment_form( $args );
	} // End if().
	?>
</div><!-- #comments -->
