<?php
/**
 * Template Name: Home
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<table>
	<tr class="bigimages">
  	<td class="bigger">
  		<a href="#" class="infertility">
  			<img src="<?php echo get_template_directory_uri();?>/images/main/stories/infertility.png" alt="Infertility Care" />
  			<h2>Infertility Care</h2>
  		</a>
  	</td>
  	<td class="smaller">
  		<a href="#" class="small">
  			<img src="<?php echo get_template_directory_uri();?>/images/main/stories/tubal.png" alt="Tubal" />
  			<h2>Tubal Reversal</h2>
  		</a>
  		<a href="#" class="small">
  			<img src="<?php echo get_template_directory_uri();?>/images/main/stories/giftofhope.png" alt="Gift of Hope" />
  			<h2>Gift of Hope</h2>
  		</a>
  	</td>
  </tr>
   <tr class="core">
  	<td>
  		<h5>Core Purpose</h5>
  		<p>Our core purpose is to help couples build families by providing comprehensive healthcare which focuses on infertility and reproductive disorders.</p>
  	</td>
  	<td class="right">
  		<h5>Core Purpose</h5>
  		<ul>
<li>Patient Care: Honoring patients unique needs</li>
<li>Integrity: Offering realistic outcomes and expectations</li>
<li>Respect/Compassion: Every patient feels as if they are the only patient</li>
<li>Knowledge: Utilizing state of the art evidence based medical treatments</li>
  		</ul>
  	</td>
  </tr>
  <tr class="bottom">
  	<td class="left">
  		<img src="<?php echo get_template_directory_uri(); ?>/images/main/stories/eivf_large.png" alt="eivf" />
  		<div class="btn-wrap">
  			<a href="https://remote.drstorment.com/patient/" class="btn">Patient Portal</a>
  			<a href="https://remote.drstorment.com/referringmd/" class="btn">Physician Portal</a>
  		</div><!-- btn-wrap -->
  	</td>
  	<td class="col2">
  			<div class="moduletablenewsrotate">
					<script type="text/javascript">
$jppc(document).ready(function($) {
    $('#sp92 ul').cycle({
		fx:     'scrollLeft',
		timeout: 5000,
    	speed:  800,
		next:   '#next92', 
    	prev:   '#prev92',
	    pause: 1		
	});		
});

</script>
<div style="clear:both;background:none;width:100%;float:left; " >  
<div class="slideshow" id="sp92" style="width:197px; height:203px;">
<div class="flexslider clearfix">
<ul class="slides clearfix">
	<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/slider1.jpg" alt=""></a></li>
	<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/slider2.jpg" alt=""></a></li>
	<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/slider3.jpg" alt=""></a></li>
	<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/slider4.jpg" alt=""></a></li>
	
</ul>
</div><!-- flexslider -->

    </div>

</div>
		</div>
	
  	
  		<!-- <img src="/images/stories/awards.png" alt="awards" /> -->
  	</td>
  	<td class="col3">
  				<div class="moduletable">
					<h3>News and Events</h3>
					<ul class="latestnews">
	<li class="latestnews">
		<a href="/rss-feed/206-career-opportunities" class="latestnews">
			Career Opportunities</a>
	</li>
	<li class="latestnews">
		<a href="/rss-feed/197-take-shape-for-life" class="latestnews">
			Take Shape for Life</a>
	</li>
	<li class="latestnews">
		<a href="/rss-feed/194-expanded-alexandria-office-coming-soon" class="latestnews">
			Expanded Alexandria Office Hours &amp; Services</a>
	</li>
	<li class="latestnews">
		<a href="/rss-feed/179-celebration-day-october-30-2011" class="latestnews">
			Celebration Day 2013 Photos</a>
	</li>
	<li class="latestnews">
		<a href="/fwhc-in-the-news" class="latestnews">
			FWHC In the News</a>
	</li>
</ul>		</div>
		
  	</td>
  </tr>
</table>
<div id="main-contents" class="main-content">
	<div id="primary" class="content-area" style="display:none;">
		<div id="content" class="site-content" role="main">

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				endwhile;
			?>

		</div><!-- #content -->
	</div><!-- #primary -->
	<?php //get_sidebar( 'content' ); ?>
</div><!-- #main-content -->

<?php
// get_sidebar();
get_footer();
