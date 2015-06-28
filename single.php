<?php
/**
 * The template for displaying all single posts and attachments
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			/*
			 * Include the post format-specific template for the content. If you want to
			 * use this in a child theme, then include a file called called content-___.php
			 * (where ___ is the post format) and that will be used instead.
			 */
			get_template_part( 'content', get_post_format() );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

			// Previous/next post navigation.
			the_post_navigation( array(
				'next_text' => '<div class="button button--xsmall width-100p margintop-small"><span class="meta-nav" aria-hidden="true"><div class="i serif marginbottom-small">' . __( 'Next post', 'vanillamilkshake' ) . '</div></span> ' .
					'<span class="screen-reader-text">' . __( 'Next post', 'vanillamilkshake' ) . '</span> ' .
					'<span class="post-title">%title</span></div>',
				'prev_text' => '<div class="button button--xsmall width-100p margintop-small"><span class="meta-nav" aria-hidden="true"><div class="i serif marginbottom-small">' . __( 'Previous post', 'vanillamilkshake' ) . '</div></span> ' .
					'<span class="screen-reader-text">' . __( 'Previous post', 'vanillamilkshake' ) . '</span> ' .
					'<span class="post-title">%title</span></div>',
			) );

		// End the loop.
		endwhile;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
