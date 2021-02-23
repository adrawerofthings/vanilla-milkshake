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
	 * | updated unclosed tags edge case by using preg_match_all from: http://wordpress.stackexchange.com/questions/141125/allow-html-in-excerpt/141136#141136
	 */
	function vanillamilkshake_improved_trim_excerpt($text) { // Fakes an excerpt if needed
	  global $post;
	  $link = '';
	  if ( '' == $text ) {
	  	$readmorestring =  __( 'Continue reading', 'vanilla-milkshake' );
	    $text = get_the_content($readmorestring);
	    $text = apply_filters('the_content', $text);
	    $text = str_replace('\]\]\>', ']]&gt;', $text);
	    $excerpt_length = 65;

        $link = sprintf( '<p class="margintop-large margintop-xlarge-l clear-both"><a href="%1$s#s" class="more-link">%2$s</a><p>',
			esc_url( get_permalink( get_the_ID() ) ),
			$readmorestring . '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>'
			);

	    preg_match_all('/(<[^>]+>|[^<>\s]+)\s*/u', $text, $words);

	    $count = 0;
	    $excerptoutput = "";

	    foreach ($words[0] as $word) {
            if ($count >= $excerpt_length) {
                $excerptoutput .= trim($word);
                $excerptoutput .= '&hellip;';
                $excerptoutput = trim(force_balance_tags($excerptoutput));
                $excerptoutput .= $link;
                $text = $excerptoutput;
                break;
            }
            $count++;
            $excerptoutput .= $word;
        }

	  }
	  return $text;
	}
	remove_filter('get_the_excerpt', 'wp_trim_excerpt');
	add_filter('get_the_excerpt', 'vanillamilkshake_improved_trim_excerpt');
?>
