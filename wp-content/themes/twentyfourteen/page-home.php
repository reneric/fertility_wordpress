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
  			<div class="caption">
  				<h2>Infertility Care</h2>
  				<p>Individualized infertility treatment in a caring environment</p>
			</div><!-- caption -->  				
  		</a>
  	</td>
  	<td class="smaller">
  		<a href="#" class="small">
  			<img src="<?php echo get_template_directory_uri();?>/images/main/stories/tubal.png" alt="Tubal" />
  			<div class="caption">
  				<h2>Tubal Reversal</h2>
  				<p>Providing couples a second chance</p>
			</div><!-- caption -->  				
  		</a>
  		<a href="#" class="small">
  			<img src="<?php echo get_template_directory_uri();?>/images/main/stories/giftofhope.png" alt="Gift of Hope" />
  			<div class="caption">
  				<h2>Gift of Hope</h2>
  				<p>Giving back to the community</p>
			</div><!-- caption -->  				
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
	<?php $args = array ( 'post_type' => "post", 'posts_per_page' => 5 );
	$custom_query = new WP_Query( $args );
	if ( $custom_query->have_posts() ):
	   	while ( $custom_query->have_posts() ) : $custom_query->the_post();?>
		<li class="latestnews">
			<a href="/rss-feed/206-career-opportunities" class="latestnews">Career Opportunities</a>
		</li>
		<?php endwhile; ?>
	<?php endif; ?>
	</ul>
</div>
		
  	</td>
  </tr>
</table>
<div id="main-contents" class="main-content">
	<div id="primary" class="content-area" style="display:none;">
		<div id="content" class="site-content" role="main">

			

		</div><!-- #content -->
	</div><!-- #primary -->
	<?php //get_sidebar( 'content' ); ?>
</div><!-- #main-content -->

<?php
// get_sidebar();
get_footer();
