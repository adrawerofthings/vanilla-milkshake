<?php
/**
 * The template for displaying Author bios
 */
?>

<div class="author-info margintop-large">
	<h3 class="author-heading screen-reader-text"><?php _e( 'Published by', 'vanilla-milkshake' ); ?></h3>
		<div class="author-description">

			<div class="lineheight-copy">

				<span class="themecolor marginright-xsmall">&#9670;</span>

				<?php if ( get_the_author_meta( 'description' ) ) : ?>

					<span class="author-bio nested-link">
						<?php the_author_meta( 'description' ); ?>
					</span><!-- .author-bio -->

				<?php else : ?>

					<span class="b f5"><?php echo get_the_author(); ?></span>

				<?php endif; ?>

			</div>

		</div><!-- .author-description -->
		<div class="marginvertical-large">
			<a class="author-link f7 link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php printf( __( 'View all posts by %s', 'vanilla-milkshake' ), get_the_author() ); ?>
			</a>
		</div>
</div><!-- .author-info -->
