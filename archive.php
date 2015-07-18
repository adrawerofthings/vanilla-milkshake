<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header margintop-none marginbottom-large ">
				<?php
					the_archive_title( '<h1 class="page-title margintop-none sans-serif f3 black-54">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<div class="height-0025 backgroundcolor-light-gray marginbottom-large"></div>

			<?php if ( is_paged() ) :
				// Previous/next page navigation.
				the_posts_pagination( array(
					'prev_text'          => __( '&#8592;', 'vanillamilkshake' ),
					'next_text'          => __( '&#8594;', 'vanillamilkshake' ),
					'mid_size'			 => 2,
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vanillamilkshake' ) . ' </span>',
				) );
			endif; ?>

			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( '&#8592;', 'vanillamilkshake' ),
				'next_text'          => __( '&#8594;', 'vanillamilkshake' ),
				'mid_size'			 => 2,
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vanillamilkshake' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php get_footer(); ?>
