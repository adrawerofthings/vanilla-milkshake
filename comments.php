<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
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
<div class="marginvertical-medium height-000625 backgroundcolor-light-gray"></div>
<div id="comments" class="comments-area marginvertical-medium small">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title f5 b sans-serif ">
			<?php
				printf( // WPCS: XSS OK.
					esc_html( _nx( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'vanillamilkshake' ) ),
					number_format_i18n( get_comments_number() ),
					'<span>' . get_the_title() . '</span>'
				);
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'vanillamilkshake' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous xxsmall marginvertical-xsmall"><?php previous_comments_link( '<span class="light-gray">&#9656;</span> ' . esc_html__( 'Older comments', 'vanillamilkshake' ) ); ?></div>
				<div class="nav-next xxsmall marginvertical-xsmall"><?php next_comments_link( '<span class="light-gray">&#9656;</span> ' . esc_html__( 'Newer comments', 'vanillamilkshake' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'vanillamilkshake' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous xxsmall marginvertical-xsmall"><?php previous_comments_link( '<span class="light-gray">&#9656;</span> ' . esc_html__( 'Older comments', 'vanillamilkshake' ) ); ?></div>
				<div class="nav-next xxsmall marginvertical-xsmall"><?php next_comments_link( '<span class="light-gray">&#9656;</span> ' . esc_html__( 'Newer comments', 'vanillamilkshake' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation. ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'vanillamilkshake' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>

</div><!-- #comments -->
<div class="marginvertical-medium height-000625 backgroundcolor-light-gray"></div>
