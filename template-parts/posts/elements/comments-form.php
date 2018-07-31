<?php
/**
 * 5th-Avenue post comments form
 *
 * @package 5th-Avenue
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( comments_open() ) {

	$commenter		 = wp_get_current_commenter();
	$required_text	 = null;
	$form_style		 = ( ! empty( $options['form-style'] ) ) ? $options['form-style'] : 'default';
	$comment_label	 = ( 'minimal' == $form_style ) ? '<label for="comment">' . esc_html_e( 'My comment is..', '5th-avenue' ) . '</label>' : null;
	$args			 = array(
		'id_form'				 => 'commentform',
		'id_submit'				 => 'submit',
		'comment_field'			 => '<div class="row"><textarea id="comment" placeholder="' . esc_html__( 'Leave your comment here...', '5th-avenue' ) . '" required name="comment" cols="45" rows="8" aria-required="true"></textarea><span class="animated-bottom-bar"></span><label for="comment">' . esc_html__( 'Leave your comment here...', '5th-avenue' ) . '</label></div>',
		'comment_notes_before'	 => '',
		'comment_notes_after'	 => '',
		'fields'				 => apply_filters( 'comment_form_default_fields', array(
			'author' => '<div class="row"> <div class="col-md-4"><input id="author" name="author" type="text" placeholder="' . esc_html__( 'Name', '5th-avenue' ) . '" required value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" /><span class="animated-bottom-bar"></span><label for="author">' . esc_html__( 'Name', '5th-avenue' ) . '<span class="required">*</span></label> </div>',
			'email'	 => '<div class="col-md-4"><input id="email" name="email" type="text" placeholder="' . esc_html__( 'Email', '5th-avenue' ) . '" required value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" /><span class="animated-bottom-bar"></span><label for="email">' . esc_html__( 'Email', '5th-avenue' ) . '<span class="required">*</span></label></div>',
			'url'	 => '<div class="col-md-4"><input id="url" name="url" type="text" placeholder="' . esc_html__( 'Website', '5th-avenue' ) . '" required value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /><span class="animated-bottom-bar"></span><label for="url">' . esc_html__( 'Website', '5th-avenue' ) . '</label></div></div>',
			)
		),
	);

	comment_form( $args );
}
