<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 */
?>
	</div><!-- .site-content -->
	<div class="height-0025 backgroundcolor-light-gray margintop-large marginbottom-small width-100p clear-both display-none-ns"></div>

	<div id="sidebar" class="sidebar width-30p-ns paddingtop-medium float-left clear-right dimmed-ns xsmall-m xxsmall-l">
		<?php get_sidebar(); ?>
	</div>

	<footer id="colophon" class="site-footer clear-both paddingtop-xlarge" role="contentinfo">
		<div class="site-info small">
			<a href="<?php echo esc_url( __( 'https://github.com/hongkonggong/vanilla-milkshake', 'vanillamilkshake' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'vanillamilkshake' ), 'a Vanilla Milkshake.' ); ?></a>
		</div><!-- .site-info -->
	</footer><!-- .site-footer -->

</div><!-- .site -->

<?php wp_footer(); ?>

</body>
</html>
