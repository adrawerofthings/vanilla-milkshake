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
	    'label' => __('Main theme color', 'vanilla-milkshake')
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
	    $wp_customize->add_setting( 
	      'bg_color', array(
	      'type' => 'option',
	      'capability' => 'edit_theme_options',
	      'sanitize_callback' => 'sanitize_key'
	    ) );
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
	    $wp_customize->add_control( 
	      'bg_color', array(
	      	'type' => 'checkbox',
	      	'section' => 'colors', // Add a default or your own section
	      	'label' => __( 'White background (less accessible)?', 'vanilla-milkshake' ),
	    ) );

	  }
	}
	add_action( 'customize_register', 'vanillamilkshake_theme_customize_register' );

	/* Adds colors as inline styles to the HTML's <head> and also falls back to defaults
	 * to minimize CSS overrides */

	function vanillamilkshake_theme_customizer_styles()
	{
		$white_bg_yes = get_option('bg_color');
		$theme_color = get_option('theme_color');
		
		if (empty($theme_color)) { $theme_color = "#006CCC"; }
		$hsl_theme_color = hex2hsl($theme_color);
		$theme_color_lighter = hsl2hex(array($hsl_theme_color[0], 0.9, 0.67));
		$theme_color_darker = hsl2hex(array($hsl_theme_color[0], 0.9, 0.4));

		if ($white_bg_yes == true) {
			$theme_color_lightest = "#ffffff";
			$theme_color = $theme_color_lighter;
			$background_color_hr = "#eeeeee;";
		} else {
			$theme_color_lightest = hsl2hex(array($hsl_theme_color[0], 0.6, 0.97));
			$theme_color = $theme_color_darker;
			$background_color_hr = "#ffffff;";
		}


	 	echo "<style>
	 			.backgroundcolor-hr { background-color: ".$background_color_hr.";}
	 			.backgroundcolor-themecolor { background-color: ".$theme_color.";}
	 			.backgroundcolor-themecolorlightest { background-color: ".$theme_color_lightest.";}
	 			.nested-list ul > li:before,
	 		  	 .wp-caption-text:before,
	 		  	 .themecolor { color: ".$theme_color_darker.";}
	 			.page-numbers,
	 			 .page-links > a,
				 a.more-link, a > .button,
  				 a.more-link:link, a > .button:link
  				 { border-color: ".$theme_color_darker." ; }
  				 .nested-hr hr { border-color: ".$background_color_hr."; }
	 		 </style>";
	}
	add_action('wp_head', 'vanillamilkshake_theme_customizer_styles', 100);

?>
