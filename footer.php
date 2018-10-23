<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

		</div><!-- #main -->
		<footer id="colophon" class="site-footer" role="contentinfo">
			

			<div class="site-info">
				<p><strong>Matthew Jukes' (UK) 'Winery of the Year 2018'!<br>James Halliday’s ‘Australia’s Best Value Winery 2018'</strong></p>
                <p><a href="<?php echo esc_url( home_url( '/' ) ); ?>about/environment/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/aco-logo.png" height="52px"></a>
                <a href="https://www.facebook.com/GrossetWines" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/facebook.png" style="margin-top: 16px;"></a>
                <a href="https://twitter.com/grossetwines" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/twitter.png" style="margin-top: 16px;"></a></p>
			</div><!-- .site-info -->
            
            <?php get_sidebar( 'main' ); ?>
            
            <div class="site-info">
<p><script type="text/javascript" src="https://sealserver.trustwave.com/seal.js?style=invert"></script></p>
            	<p>Grosset Wines, Auburn, Clare Valley, South Australia
            	<br>Copyright © <?php echo date("Y"); ?> Grosset Wines. <a href="<?php echo esc_url( home_url( '/' ) ); ?>terms-of-use/">Terms of us</a>.
                <br><small>Website by <a href="http://chrisbishop.me.uk/" target="_blank">Chris Bishop</a></small></p>
            </div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->

<!-- Bootstrap Core JavaScript -->
    <script src="<?php bloginfo('stylesheet_directory'); ?>/js/bootstrap.min.js"></script>

	<?php wp_footer(); ?>
</body>
</html>