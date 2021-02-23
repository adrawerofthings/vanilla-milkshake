<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'clear-both clearfix marginbottom-xlarge marginbottom-xxlarge-l' ); ?>>
	<header class="entry-header nested-headline-link position-relative">

		<?php
			$igc=0;
			foreach((get_the_category()) as $category) {
					if ($category->cat_name != 'Uncategorized') {
					if($igc != 0) { echo ' &#903; '; }; $igc++;
						echo '<a class="themecolor b texttransform-uppercase f7" href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s", 'vanilla-milkshake' ), $category->name ) . '">' . $category->name.'</a>';
				}
			}
		?>

		<?php
		if ( is_home() ) {
			echo '<h2 class="marginvertical-medium lineheight-title f3 f2-ns b sans-serif">';
		} else {
			echo '<h1 class="marginvertical-medium lineheight-title f3 f2-ns b sans-serif">';
		} ?>
			<?php
			if ( is_sticky() ) {
				echo '<span aria-hidden="true" data-icon="&#x2605;"></span><span class="screen-reader-text">Featured: </span>';
			} ?>
			<?php
				/* no title edge case */
				if (get_the_title() == "") :
				?>
					<a href="<?php echo get_permalink(); ?>">
						<?php printf( __( 'Untitled', 'vanilla-milkshake' ) ); ?>
					</a>
				<?php
				else :
					the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' );
				endif;
				?>
		<?php
		if ( is_home() ) {
			echo '</h2>';
		} else {
			echo '</h1>';
		} ?>

		<div class="posted-on serif i f6 black70 nested-link marginvertical-medium">
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

				$authorname = get_the_author();
				$authorlink = '<a href="'.get_author_posts_url(get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' )).'">';
				$author = $authorlink.$authorname.'</a>';

				printf( '<span class="screen-reader-text">%1$s </span>%2$s by %3$s',
					_x( 'Posted on', 'Used before publish date.', 'vanilla-milkshake' ),
					$time_string,
					$author
				);
			?>

		</div>

	</header><!-- .entry-header -->

	<div class="f5 f4-l measure nested-copy-line-height nested-copy-font-weight nested-headline-sansserif nested-headline-line-height nested-img nested-figure nested-embeds nested-hr nested-code nested-list nested-blockquote nested-dt nested-table nested-link nested-form">
		<?php
			if ( is_single() ) :
				/* translators: %s: Name of current post */
				the_content( sprintf(
					__( 'Continue reading %s', 'vanilla-milkshake' ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				) );

				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'vanilla-milkshake' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'vanilla-milkshake' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) );
			else :
				/* translators: %s: Name of current post */
				the_excerpt();

				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'vanilla-milkshake' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'vanilla-milkshake' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) );

				/* link for manual excerpt, wish this was automatic and not manually added here :( */
				if ( has_excerpt() ) {
					$readmorestring =  __( 'Continue reading', 'vanilla-milkshake' );
		         	printf( '<p class="clear-both margintop-large margintop-xlarge-l"><a href="' . esc_url( get_permalink() ) . '" class="more-link">' . $readmorestring . '<span class="screen-reader-text">' . get_the_title() . '</span></a><p>' );
				}
			endif;
		?>

	</div><!-- .entry-content -->

	<?php if ( is_single() ) : ?>
		<footer class="entry-footer margintop-xlarge clear-both">
			<?php vanillamilkshake_entry_meta(); ?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
