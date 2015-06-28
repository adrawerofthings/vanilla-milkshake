<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 */
?>
	</div><!-- .site-content -->
	<div class="clearfix clear-both display-none-ns"></div> <!-- not sure why the below line doesn't work without this line -->
	<div class="height-000625 backgroundcolor-light-gray margintop-medium marginbottom-small display-none-ns"></div>

	<div id="sidebar" class="sidebar width-30p-ns paddingtop-medium float-left clear-right dimmed-ns xsmall-m xxsmall-l">
		<?php get_sidebar(); ?>
	</div>

	<footer id="colophon" class="site-footer clear-both paddingtop-xlarge" role="contentinfo">
		<div class="site-info small">
			<a href="http://hongkonggong.github.io/vanilla-milkshake/">
				<?php echo __( 'Proudly powered by Vanilla Milkshake and Wordpress', 'vanillamilkshake' ); ?>
			</a>
		</div><!-- .site-info -->
	</footer><!-- .site-footer -->

</div><!-- .site -->

<?php wp_footer(); ?>

</body>
</html>
