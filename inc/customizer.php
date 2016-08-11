<?php
/**
 * Basic color customizer
 * Dev note: defaults colors inputted twice below, which is incredily inelegant :/
 */

	/**
	 * Customizer additions.
	 * | http://www.smashingmagazine.com/2013/03/05/the-wordpress-theme-customizer-a-developers-guide/
	 */
	function vanillamilkshake_theme_customize_register( $wp_customize ) {
	  $colors = array();
	  $colors[] = array(
	    'slug'=>'theme_color', 
	    'default' => '#006CCC',
	    'label' => __('Title header bar', 'vanillamilkshake')
	  );
	  foreach( $colors as $color ) {
	    // SETTINGS
	    $wp_customize->add_setting(
	      $color['slug'], array(
	        'default' => $color['default'],
	        'type' => 'option', 
	        'capability' => 
	        'edit_theme_options',
	        'sanitize_callback' => 'sanitize_hex_color'
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
	add_action( 'customize_register', 'vanillamilkshake_theme_customize_register' );

	/* Adds colors as inline styles to the HTML's <head> and also falls back to defaults
	 * to minimize CSS overrides */

	function vanillamilkshake_theme_customizer_styles()
	{
		$theme_color = get_option('theme_color');
		if (empty($theme_color)) { $theme_color = "#006CCC"; }
		$hsl_theme_color = hex2hsl($theme_color);

		$theme_color = hsl2hex(array($hsl_theme_color[0], 0.9, 0.4));
		$theme_color_lightest = hsl2hex(array($hsl_theme_color[0], 0.6, 0.97));

	 	echo "<style>";
	 	echo ".backgroundcolor-themecolor { background-color: ".$theme_color.";}";
	 	echo ".backgroundcolor-themecolorlightest { background-color: ".$theme_color_lightest.";}";
	 	echo ".nested-list ul > li:before,
	 		  .wp-caption-text:before,
	 		  .themecolor { color:".$theme_color.";}";
	 	echo ".page-numbers, 
	 			.page-links > a,
				a.more-link,
  				a.more-link:link,
  				a.more-link:visited 
  				{ border: 1px solid ".$theme_color.";}";
	 	echo "</style>";
	}
	add_action('wp_head', 'vanillamilkshake_theme_customizer_styles', 100);

?>