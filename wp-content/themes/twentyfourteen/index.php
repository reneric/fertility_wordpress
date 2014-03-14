<?php
/**
 * The template for displaying all pages
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
			<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'content', 'page' );
				endwhile;
			?>
		</div><!-- #content -->
	</div><!-- #primary -->
	<?php //get_sidebar( 'content' ); ?>
</div><!-- #main-content -->
<?php
// get_sidebar();
get_footer();