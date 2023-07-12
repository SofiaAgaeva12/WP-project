<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BlogHub
 */

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
	<?php
		// You can start editing here -- including this comment!
		if ( have_comments() ) :
		?>
			<div class="comment-title-and-comment-list">
				<h2 class="comments-title">
					<?php
						$bloghub_comment_count = get_comments_number();
						if ( '1' === $bloghub_comment_count ) {
							printf(
							/* translators: 1: title. */
								esc_html__( '1 Comment', 'bloghub' ),
								'<span>' . get_the_title() . '</span>'
							);
						} else {
							printf( 
							/* translators: 1: comment count number, 2: title. */
								esc_html( _nx( '%1$s Comments', '%1$s Comments', $bloghub_comment_count, 'comments title', 'bloghub' ) ),
								number_format_i18n( $bloghub_comment_count ),  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								'<span>' . get_the_title() . '</span>'
							);
						}
					?>
				</h2><!-- .comments-title -->
				<ol class="comment-list">
					<?php
						wp_list_comments( array(
							'style'      => 'ol',
							'short_ping' => true,
							'avatar_size' => 100,
							'format' => 'html5',
							'reply_text'        => esc_html__( 'Reply', 'bloghub' ),
						) );
					?>
				</ol><!-- .comment-list -->

				<?php
				bloghub_comments_pagination();
				// If comments are closed and there are comments, let's leave a little note, shall we?
				if ( ! comments_open() ) :
					?>
						<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'bloghub' ); ?></p>
					<?php
				endif; ?>
			</div>
		<?php
		endif; // Check for have_comments().
	?>
	<?php comment_form();?>

</div><!-- #comments -->