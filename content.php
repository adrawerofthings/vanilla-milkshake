<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'clear-both clearfix marginbottom-medium' ); ?>>
	<header class="entry-header position-relative">
		<?php
		if ( is_home() ) {
			echo '<h2 class="margintop-none marginbottom-xsmall">';
		} else {
			echo '<h1 class="margintop-none marginbottom-xsmall">';
		} ?>
		<span class="entry-title f4 b sans-serif">
			<?php
			if ( is_sticky() ) {
				echo '<span aria-hidden="true" data-icon="&#x2605;"></span><span class="screen-reader-text">Featured: </span>';
			} ?>
			<?php
				/* no title edge case */
				if (get_the_title() == "") : 
				?>
					<a href="<?php echo get_permalink(); ?>">
						<?php printf( __( 'Untitled', 'vanillamilkshake' ) ); ?>
					</a>
				<?php
				else :
					the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' );
				endif;
				?>
		</span>
		<?php
		if ( is_home() ) {
			echo '</h2>';
		} else {
			echo '</h1>';
		} ?>
		<?php

			$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

			/* Can list both publish and last modified time... stick with just the former for now so commenting out 
			if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
				$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
			}
			*/

			$time_string = sprintf( $time_string,
				esc_attr( get_the_date( 'c' ) ),
				get_the_date(),
				esc_attr( get_the_modified_date( 'c' ) ),
				get_the_modified_date()
			);

			$author = get_the_author();

			printf( '<div class="posted-on small black-54 marginbottom-medium"><span class="screen-reader-text">%1$s </span>%2$s by %3$s</div>',
				_x( 'Posted on', 'Used before publish date.', 'vanillamilkshake' ),
				$time_string,
				$author
			);
		?>
	</header><!-- .entry-header -->

	<div class="entry-content lineheight-copy">
		<?php
			if ( is_single() ) :
				/* translators: %s: Name of current post */
				the_content( sprintf(
					__( 'Continue reading %s', 'vanillamilkshake' ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				) );

				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'vanillamilkshake' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'vanillamilkshake' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) );
			else :
				/* translators: %s: Name of current post */
				the_excerpt();

				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'vanillamilkshake' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'vanillamilkshake' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) );

				/* link for manual excerpt, wish this was automatic and not manually added here :( */
				if ( has_excerpt() ) {
					$readmorestring =  __( 'Continue reading', 'vanillamilkshake' );					
		         	printf( '<p class="clear-both"><a href="' . esc_url( get_permalink() ) . '" class="more-link">' . $readmorestring . '<span class="screen-reader-text">' . get_the_title() . '</span></a><p>' );
				}
			endif;
		?>

	</div><!-- .entry-content -->

	<!-- disabling for V1; may tackle at a later stage
	<?php
		// Author bio.
		if ( is_single() && get_the_author_meta( 'description' ) ) :
			get_template_part( 'author-bio' );
		endif;
	?> -->
	<?php if ( is_single() ) : ?>
		<footer class="entry-footer clear-both">
			<?php vanillamilkshake_entry_meta(); ?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
