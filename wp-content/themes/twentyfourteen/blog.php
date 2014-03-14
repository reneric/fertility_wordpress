<?php
/**
 * Template Name: Blog
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
<div id="main-content" class="main-content">
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
<?php $args = array ( 'post_type' => "post");
	$custom_query = new WP_Query( $args );
	if ( $custom_query->have_posts() ):
	   	while ( $custom_query->have_posts() ) : $custom_query->the_post();
		get_template_part( 'content', 'page' );
		 endwhile;
	endif; ?>
		</div><!-- #content -->
	</div><!-- #primary -->
	<?php //get_sidebar( 'content' ); ?>
</div><!-- #main-content -->
<?php
// get_sidebar();
get_footer();