<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<div id="main-content" class="main-content">
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyfourteen' ), get_search_query() ); ?></h1>
			</header><!-- .page-header -->
			<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'content', 'search' );
				endwhile;
				endif;
			?>
		</div><!-- #content -->
	</div><!-- #primary -->
	<?php //get_sidebar( 'content' ); ?>
</div><!-- #main-content -->
<?php
get_footer();