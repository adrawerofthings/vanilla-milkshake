<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class( 'serif' ); ?>> 
<div id="page" class="hfeed site container center margintop-medium-ns padding-large">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'vanillamilkshake' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<?php if ( is_front_page() && is_home() ) : ?>
				<h1 class="margintop-0 marginbottom-0 black f2 letterspacing-006 b texttransform-uppercase sansserif">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</h1>
			<?php else : ?>
				<h2 class="margintop-0 marginbottom-0 black f2 letterspacing-006 b texttransform-uppercase sansserif">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</h2>
			<?php endif; ?>
		
			<?php 
			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description i f5 darkgrey margintop-small"><?php echo $description; ?></p>
			<?php endif;
			?>
		</div><!-- .site-branding -->
	</header><!-- .site-header -->
	<a name="s"></a>
	<div class="titlebar height-xsmall margintop-large marginbottom-medium"></div>

	<div class="clearfix"> <!-- content + sidebar -->
		<div id="content" class="site-content width-70p-ns maxwidth-100p paddingtop-medium paddingright-large-ns float-left">
