<?php
/**
 * The template for displaying search results pages.
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header margintop-0 marginbottom-large ">
				<h1 class="page-title margintop-0 sans-serif f3 black-30"><?php printf( __( 'Search Results for: %s', 'vanillamilkshake' ), get_search_query() ); ?></h1>
			</header><!-- .page-header -->
			<div class="height-0025 background-lightgray marginbottom-large"></div>

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post(); ?>

				<?php
				/*
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', 'search' );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'vanillamilkshake' ),
				'next_text'          => __( 'Next page', 'vanillamilkshake' ),
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
