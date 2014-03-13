<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<tr>
    <td height="2" align="center" style="padding-top:5px;"><a href="/fwhc-home" class="mainlevelfooter" >Fertility &amp; Women's Health Center</a><span class="mainlevelfooter" >|</span><a href="<?php bloginfo('url');?>/tubal-reversal/your-pregnancy-options/tubal-reversal-surgery/" class="mainlevelfooter" >Tubal Reversal Louisiana</a><span class="mainlevelfooter" >|</span><a href="<?php bloginfo('url');?>/gift-of-hope" class="mainlevelfooter" >The Gift of Hope</a><span class="mainlevelfooter" >|</span><a href="https://remote.drstorment.com/referringmd/" class="mainlevelfooter" >eIVF Physician Portal</a><span class="mainlevelfooter" >|</span><a href="/admin" class="mainlevelfooter" >Admin</a><span class="mainlevelfooter" >|</span><a href="http://www.fertilityanswers.com/blog/wp-admin/" class="mainlevelfooter" >Blog</a><span class="mainlevelfooter" >|</span><a href="/contact-us" class="mainlevelfooter" >Contact Us</a><p class="footer">Lafayette  |  Lake Charles  |  Alexandria     (888) 467-BABY |  FertilityAnswers.com © 2011 All Rights Reserved.</p>&nbsp;</td>
  </tr>
		</div><!-- #main -->

		<footer style="display:none;" id="colophon" class="site-footer" role="contentinfo">

			<?php get_sidebar( 'footer' ); ?>

			<div class="site-info">
				<?php do_action( 'twentyfourteen_credits' ); ?>
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'twentyfourteen' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'twentyfourteen' ), 'WordPress' ); ?></a>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script src="<?php echo get_template_directory_uri(); ?>/js/flexslider.js"></script>
	<?php wp_footer(); ?>
	<script>
$(window).load(function() {
    $('.flexslider').flexslider({
    	controlNav: false
    	// animation: "slide"
    });
  });
	</script>
</body>
</html>