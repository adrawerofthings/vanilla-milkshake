<?php
/**
 * Custom template tags
 *
 * Eventually, some of the functionality here could be replaced by core features.
 */

if ( ! function_exists( 'vanillamilkshake_comment_nav' ) ) :
/**
 * Display navigation to next/previous comments when applicable.
 */
function vanillamilkshake_comment_nav() {
	// Are there comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
	<nav class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'vanilla-milkshake' ); ?></h2>
		<div class="nav-links">
			<?php
				if ( $prev_link = get_previous_comments_link( __( 'Older Comments', 'vanilla-milkshake' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;

				if ( $next_link = get_next_comments_link( __( 'Newer Comments', 'vanilla-milkshake' ) ) ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
	<?php
	endif;
}
endif;

if ( ! function_exists( 'vanillamilkshake_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the categories, tags.
 */
function vanillamilkshake_entry_meta() {

	if ( is_sticky() && is_home() && ! is_paged() ) {
		printf( '<span class="sticky-post">%s</span>', __( 'Featured', 'vanilla-milkshake' ) );
	}

	$format = get_post_format();
	if ( current_theme_supports( 'post-formats', $format ) ) {
		printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
			sprintf( '<span class="screen-reader-text">%s </span>', _x( 'Format', 'Used before post format.', 'vanilla-milkshake' ) ),
			esc_url( get_post_format_link( $format ) ),
			get_post_format_string( $format )
		);
	}

	if ( 'post' == get_post_type() ) {

		/* divider between author & categories/tags */
		printf('<div class="marginvertical-medium height-xsmall backgroundcolor-white"></div>');
		
		// Author bio.
		if ( is_single() ) :
			get_template_part( 'author-bio' );
		endif;

		/* divider between author & categories/tags */
		printf('<div class="marginvertical-medium height-xsmall backgroundcolor-white"></div>');

		$categories_list = get_the_category_list( ' <span class="themecolor marginhorizontal-xsmall">&#9656;</span> ' );
		if ( $categories_list && vanillamilkshake_categorized_blog() ) {
			printf( '<span class="nested-link f7"><span class="screen-reader-text">%1$s </span><span class="themecolor marginhorizontal-xsmall"> &#9656;</span> %2$s</span>',
				_x( 'Categories', 'Used before category names.', 'vanilla-milkshake' ),
				$categories_list
			);
		}

		$tags_list = get_the_tag_list( '', ' <span class="themecolor marginhorizontal-xsmall">&#9656;</span> ' , '</span>');
		if ( $tags_list ) {
			printf( '<span class="f7 nested-link"><span class="screen-reader-text">%1$s </span><span class="themecolor marginhorizontal-xsmall"> &#9656;</span> %2$s</span>',
				_x( 'Tags', 'Used before tag names.', 'vanilla-milkshake' ),
				$tags_list
			);
		}
	}

	if ( is_attachment() && wp_attachment_is_image() ) {
		// Retrieve attachment metadata.
		$metadata = wp_get_attachment_metadata();

		printf( '<span class="full-size-link"><span class="screen-reader-text">%1$s </span><a href="%2$s">%3$s &times; %4$s</a></span>',
			_x( 'Full size', 'Used before full size attachment link.', 'vanilla-milkshake' ),
			esc_url( wp_get_attachment_url() ),
			$metadata['width'],
			$metadata['height']
		);
	}
	/*
	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<div class="comments-link">';
		comments_popup_link( __( 'Leave a comment', 'vanilla-milkshake' ), __( '1 Comment', 'vanilla-milkshake' ), __( '% Comments', 'vanillamilkshake' ) );
		echo '</div>';
	}*/
}
endif;

/**
 * Determine whether blog/site has more than one category.
 *
 * @return bool True of there is more than one category, false otherwise.
 */
function vanillamilkshake_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'vanillamilkshake_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'vanillamilkshake_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so vanillamilkshake_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so vanillamilkshake_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in {@see vanillamilkshake_categorized_blog()}.
 */
function vanillamilkshake_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'vanillamilkshake_categories' );
}
add_action( 'edit_category', 'vanillamilkshake_category_transient_flusher' );
add_action( 'save_post',     'vanillamilkshake_category_transient_flusher' );
