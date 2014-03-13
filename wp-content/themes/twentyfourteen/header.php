<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Aguafina+Script|Dancing+Script|Seaweed+Script|Euphoria+Script' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/custom.css">
</head>

<body <?php body_class(); ?>>
<div class="nav-top">
	<div class="container">
		<div class="link-wrap">
			<a href="/baby-pics" class="mainlevel" >Our Babies</a><span class="mainlevel" >|</span><a href="/patient-testimonials" class="mainlevel" >Patient Testimonials</a><span class="mainlevel" >|</span><a href="/events/297" class="mainlevel" >Events</a><span class="mainlevel" >|</span><a href="/contact" class="mainlevel" >Contact Us</a><span class="mainlevel" >|</span><a href="/locations" class="mainlevel" >Locations</a>	
		</div><!-- link-wrap -->
	</div><!-- container -->
</div><!-- nav-top -->
<div class="top-border"></div>
<div id="page" class="hfeed site">
<table border="0" cellpadding="0" cellspacing="0" width="857" align="center" class="top">
  <tr >
   <td><table align="left" border="0" cellpadding="0" cellspacing="0" width="872">
   	<tr>
   		<td height="10" colspan="2" align="right" valign="bottom"></td>
   	</tr>
	  <tr>
	   <td width="328" rowspan="2" align="left"><a href="/"><img name="index_r1_c1" src="<?php echo get_template_directory_uri();?>/images/home/images/index_r1_c1.png" width="296" height="86" border="0" id="index_r1_c1" alt="" /></a></td>
	  </tr>
	  <tr>
	    <td width="300" height="62" align="right" valign="center" class="searchit">
	    	<p class="number">337-989-8796 or 888-467-BABY (2229)</p>
	    	<form action="index.php" method="post">
	<div class="search">
		<input name="searchword" id="mod_search_searchword" maxlength="20" alt="Search" class="inputbox" type="text" size="20" value=""  onblur="if(this.value=='') this.value='search...';" onfocus="if(this.value=='search...') this.value='';" /><input type="submit" value="Search" class="button" onclick="this.form.searchword.focus();"/>	</div>
	<input type="hidden" name="task"   value="search" />
	<input type="hidden" name="option" value="com_search" />
	<input type="hidden" name="Itemid" value="1" />
</form>
	    </td>
	    <td width="34" align="right" valign="center" class="social">
	    <table style="width:171px;">
<tbody>
<tr>
<td style="padding-left: 0px; padding-right: 7px;"><a target="_blank" href="http://twitter.com/#!/fertilitydocla" title="Follow our docs on Twitter!"><img src="<?php echo get_template_directory_uri();?>/images/main/stories/twitter.png" height="28" width="29" /></a></td>
<td style="padding-left: 0px; padding-right: 7px;"><a target="_blank" href="http://www.facebook.com/pages/Lafayette-LA/FertilityAnswers/388415746829" title="Join FertilityAnswer's Facebook Page!"><img src="<?php echo get_template_directory_uri();?>/images/main/stories/facebook.png" height="29" width="28" /></a></td>
<td style="padding-left: 0px; padding-right: 7px;"><a target="_blank" href="http://www.youtube.com/user/fertilityanswers?blend=4&amp;ob=5" title="FertilityAnswer's YouTube Channel"><img src="<?php echo get_template_directory_uri();?>/images/main/stories/youtube.png" height="29" width="29" /></a></td>
<td style="padding-left: 0px; padding-right: 7px;"><a target="_blank" href="http://www.flickr.com/photos/fwhcla/" title="FWHC's Flickr Photos"><img src="<?php echo get_template_directory_uri();?>/images/main/stories/flickr.png" border="0" height="29" width="28" /></a></td>
</tr>
</tbody>
</table>
	    
	    	<a href="/blog" class="btn"> Doctor&apos;s Blog</a>
	    	<a href="/patient-resources" class="btn"> Patient Resources</a>
	    </td>
	    </tr>
	</table></td>
  </tr>
  <tr>
   <!-- <td width="870" height="32" align="center" class="toptab"><ul class="menutop"><li class="item318"><a href="/about-fwhc"><span>About</span></a></li><li class="item319"><span class="separator"><span>|</span></span></li><li class="parent item301"><a href="/fertility-a-womens-health-center-of-louisiana"><span>Infertility</span></a><ul><li class="item397"><a href="/ovulation-dysfunction"><span>Ovulation Dysfunction</span></a></li><li class="item398"><a href="/male-infertility"><span>Male Infertility</span></a></li><li class="item399"><a href="/anatomical-a-tubal-damage"><span>Anatomical &amp; Tubal Damage</span></a></li><li class="item400"><a href="/decreased-ovarian-reserve"><span>Decreased Ovarian Reserve</span></a></li><li class="item401"><a href="/genetic-screening"><span>Genetic Screening</span></a></li><li class="item402"><a href="/preserving-fertility"><span>Preserving Fertility</span></a></li><li class="item403"><a href="/recurrent-miscarriage"><span>Recurrent Miscarriage</span></a></li><li class="item404"><a href="/polycystic-ovary-syndrome"><span>Polycystic Ovary Syndrome</span></a></li><li class="item405"><a href="/endometriosis"><span>Endometriosis</span></a></li><li class="item406"><a href="/uterine-fibroids"><span>Uterine Fibroids</span></a></li><li class="item407"><a href="/abnormal-uterine-bleeding"><span>Abnormal Uterine Bleeding</span></a></li></ul></li><li class="item302"><span class="separator"><span>|</span></span></li><li class="parent item303"><a href="/tubal-reversal-louisiana"><span>Tubal Reversal</span></a><ul><li class="item408"><a href="/tubal-reversal-home"><span>Tubal Reversal Home</span></a></li><li class="item409"><a href="/understanding-ligation"><span>Understanding Ligation</span></a></li><li class="item410"><a href="/your-pregnancy-options/what-are-my-pregnancy-options"><span>Your Pregnancy Options</span></a></li><li class="item412"><a href="/tubal-reversal-surgery-info/lab-tests"><span>Tubal Reversal Surgery Info</span></a></li><li class="item411"><a href="/getting-started-with-reversal/getting-started-steps"><span>Getting Started with Reversal</span></a></li></ul></li><li class="item304"><span class="separator"><span>|</span></span></li><li class="parent item305"><a href="/the-gift-of-hope"><span>Gift of Hope</span></a><ul><li class="item413"><a href="/gift-of-hope-welcome-page"><span>The Gift of Hope</span></a></li><li class="item414"><a href="/program-overview"><span>Program Overview</span></a></li><li class="item415"><a href="/eligibility-requirements"><span>Eligibility Requirements</span></a></li><li class="item416"><a href="/past-recipients/gift-of-hope-2013"><span>Past Recipients</span></a></li><li class="item417"><a href="/our-babies"><span>Our Babies</span></a></li><li class="item418"><a href="/contact-the-gift-of-hope"><span>Contact the Gift of Hope</span></a></li></ul></li><li class="item306"><span class="separator"><span>|</span></span></li><li class="item307"><a href="/forms-a-directions"><span>Forms</span></a></li><li class="item316"><span class="separator"><span>|</span></span></li><li class="item326"><a href="/surgery-info"><span>Surgery</span></a></li><li class="item320"><span class="separator"><span>|</span></span></li><li class="item321"><a href="/appointments"><span>Appts</span></a></li><li class="item356"><span class="separator"><span>|</span></span></li><li class="item357"><a href="/financial-info"><span>Financial</span></a></li></ul></td> -->
  </tr>
  </table>

	<header id="masthead" class="site-header" role="banner">
		<div class="header-main">
			<!-- <div class="search-toggle">
				<a href="#search-container" class="screen-reader-text"><?php _e( 'Search', 'twentyfourteen' ); ?></a>
			</div> -->
			<nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
				<h1 class="menu-toggle"><?php _e( 'Primary Menu', 'twentyfourteen' ); ?></h1>
				<a class="screen-reader-text skip-link" href="#content"><?php _e( 'Skip to content', 'twentyfourteen' ); ?></a>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' , 'depth' => 0,) ); ?>
				<div class="submenus"></div><!-- submenus -->
			</nav>
		</div>
		<!-- <div id="search-container" class="search-box-wrapper hide">
			<div class="search-box">
				<?php //get_search_form(); ?>
			</div>
		</div> -->
	</header><!-- #masthead -->
	<div id="main" class="site-main">