<?php
/**
 * Basic color customizer
 * Dev note: defaults colors inputted twice below, which is incredily inelegant :/
 */

	/**
	 * Customizer additions.
	 * | http://www.smashingmagazine.com/2013/03/05/the-wordpress-theme-customizer-a-developers-guide/
	 */
	function theme_customize_register( $wp_customize ) {
	  $colors = array();
	  $colors[] = array(
	    'slug'=>'title_bar_color', 
	    'default' => '#FFFF00',
	    'label' => __('Title header bar', 'Theme')
	  );
	  $colors[] = array(
	    'slug'=>'link_color', 
	    'default' => '#1E73BE',
	    'label' => __('Link color', 'Theme')
	  );
	  $colors[] = array(
	    'slug'=>'hover_link_color', 
	    'default' => '#3b9cf1',
	    'label' => __('Hover & focus link color', 'Theme') // cuz focus is like a keyboard hover!
	  );
	  $colors[] = array(
	    'slug'=>'visited_link_color', 
	    'default' => '#134775',
	    'label' => __('Visited link color', 'Theme')
	  );
	  foreach( $colors as $color ) {
	    // SETTINGS
	    $wp_customize->add_setting(
	      $color['slug'], array(
	        'default' => $color['default'],
	        'type' => 'option', 
	        'capability' => 
	        'edit_theme_options'
	      )
	    );
	    // CONTROLS
	    $wp_customize->add_control(
	      new WP_Customize_Color_Control(
	        $wp_customize,
	        $color['slug'], 
	        array('label' => $color['label'], 
	        'section' => 'colors',
	        'settings' => $color['slug'])
	      )
	    );
	  }
	}
	add_action( 'customize_register', 'theme_customize_register' );

	/* Adds colors as inline styles to the HTML's <head> and also falls back to defaults
	 * to minimize CSS overrides */

	function theme_customizer_styles()
	{
		$title_bar_color = get_option('title_bar_color');
		$link_color = get_option('link_color');
		$visited_link_color = get_option('visited_link_color');
		$hover_link_color = get_option('hover_link_color');

	 	echo "<style>";
	 	
	 	echo ".titlebar { background-color: ";
	 	if (empty($title_bar_color)) {
	 		echo "#FFFF00";
 		} else {
 			echo $title_bar_color;
 		}
	 	echo "; }";

	 	echo "a:link, .link:link { color:";
	 	if (empty($link_color)) {
	 		echo "#1E73BE";
 		} else {
 			echo $link_color;
 		}
	 	echo "; }";

	 	echo "a:visited, .link:visited { color: ";
	 	if (empty($visited_link_color)) {
	 		echo "#134775";
 		} else {
 			echo $visited_link_color;
 		}
	 	echo "; }";

	 	echo "a:hover, .link:hover, a:focus, .link:focus { color: ";
	 	if (empty($hover_link_color)) {
	 		echo "#3b9cf1";
 		} else {
 			echo $hover_link_color;
 		}
	 	echo "; }";

	 	echo "a:active { text-decoration: underline; }";
	 	echo "</style>";
	}
	add_action('wp_head', 'theme_customizer_styles', 100);

?>