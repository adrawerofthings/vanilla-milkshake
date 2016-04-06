<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 */
?>
		</div><!-- .site-content -->
		<div class="clearfix clear-both display-none-ns"></div> <!-- not sure why the below line doesn't work without this line -->
		<div class="height-xxxsmall backgroundcolor-lightgray margintop-medium marginbottom-small display-none-ns"></div>

		<div id="sidebar" class="sidebar width-30p-ns paddingtop-medium paddingleft-large-ns float-left clear-right xsmall-m xxsmall-l">
			<?php get_sidebar(); ?>
		</div>
	</div><!-- content + sidebar -->

	<footer id="colophon" role="contentinfo">
		<div class="site-footer clear-both clearfix paddingtop-xlarge">
			<div class="site-info small">
				<a href="http://hongkonggong.github.io/vanilla-milkshake/">
					<?php echo __( 'Proudly powered by Vanilla Milkshake and Wordpress', 'vanillamilkshake' ); ?>
				</a>
			</div><!-- .site-info -->
		</div>
	</footer><!-- .site-footer -->

</div><!-- .site -->


<?php wp_footer(); ?>

</body>
</html>
