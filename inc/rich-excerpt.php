<?php
/**
 * Rich excerpts that allow for media and embeds
 * This is the only function in this theme that's truly custom code
 */


	/** 
	 * Allowing HTML (images!) in excerpts
	 * | code from: http://aaronrussell.co.uk/legacy/improving-wordpress-the_excerpt/
	 * | plus bits and pieces from template-tags.php in 2015 theme
	 * | updated bugs by applying: https://web.archive.org/web/20100123185020/http://palehorseinformation.com/2009/12/23/fixing-the-wordpress-excerpt
	 */
	function vanillamilkshake_improved_trim_excerpt($text) { // Fakes an excerpt if needed
	  global $post;
	  if ( '' == $text ) {
	  	$readmorestring =  __( 'Continue reading', 'vanillamilkshake' );
	    $text = get_the_content($readmorestring);
	    // $text = strip_shortcodes( $text ); have to disable, messes up on <figure>
	    $text = apply_filters('the_content', $text);
	    /* $text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text); */
	    $text = str_replace('\]\]\>', ']]&gt;', $text);
	    // $text = strip_tags($text, '<p><img><img/><i><em><strong><figure><figcaption><blockquote><a><iframe><sub><sup><pre><code>');
	    $excerpt_length = 72;
	    $words = explode(' ', $text, $excerpt_length + 1);
	    $link = sprintf( '<p class="clear-both"><a href="%1$s#s" class="more-link">%2$s</a><p>',
			esc_url( get_permalink( get_the_ID() ) ),
			$readmorestring . '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>'
			);
	    if ( (count($words) > $excerpt_length) ) {
	      array_pop($words);
	      $text = implode(' ', $words);
	      $text = $text . '&hellip;';
	      $text = force_balance_tags( $text );
	      $text = $text . $link;
	    }
	  }
	  return $text;
	}
	remove_filter('get_the_excerpt', 'wp_trim_excerpt');
	add_filter('get_the_excerpt', 'vanillamilkshake_improved_trim_excerpt');
?>