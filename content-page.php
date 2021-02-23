<?php
/**
 * The template used for displaying page content
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'clear-both clearfix marginbottom-large' ); ?>>

	<header class="entry-header nested-headline-link nested-headline-line-height">
		<?php the_title( '<h1 class="entry-title f3 f2-ns b sans-serif margintop-none marginbottom-xsmall">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content f5 f4-l measure nested-copy-line-height nested-copy-font-weight nested-headline-sansserif nested-headline-line-height nested-img nested-figure nested-embeds nested-hr nested-code nested-list nested-blockquote nested-dt nested-table nested-link">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'vanilla-milkshake' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'vanilla-milkshake' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
