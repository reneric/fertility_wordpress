<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<?php the_post_thumbnail('twentyfourteen-full-width'); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		// Page thumbnail and title.
		
		the_title( '<header class="entry-header contentheading"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->' );
	?>
	<div class="entry-content">
		<?php
			the_excerpt();
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfourteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->