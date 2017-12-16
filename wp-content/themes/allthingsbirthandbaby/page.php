	<?php
/**
 *
 * Template name: Page Template
 * Template desription: Page template used for ATBnB pages
 * 
 */


// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<?php get_header(); ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
			<?php echo fusion_render_rich_snippets_for_pages(); // WPCS: XSS ok. ?>
			<?php avada_featured_images_for_pages(); ?>
			<div class="post-content">
				<?php the_content(); ?>
			</div>
		</div>
	<?php endwhile; ?>
<?php
get_footer();
