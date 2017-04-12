<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nyan2score
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="footer row" role="contentinfo">
		<div class="site-info col-ms-12">
			<p><?php echo esc_html__( "Theme: nyan2score by " ) ?><a href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/itwalker.png" alt="ITうぉーかー" /></a></p>
			
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
