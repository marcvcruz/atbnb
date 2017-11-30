<?php
/**
 *
 * Template name: Page Template
 * Template desription: Default template used for ATBnB pages
 * 
 */




// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<?php get_header(); ?>
<?php layerslider(1); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
		<?php echo fusion_render_rich_snippets_for_pages(); // WPCS: XSS ok. ?>
		<?php avada_featured_images_for_pages(); ?>
		<div class="post-content">
			<?php the_content(); ?>
		</div>
	</div>
<?php endwhile; ?>
<div class="fusion-fullwidth fullwidth-box most-recent-container nonhundred-percent-fullwidth non-hundred-percent-height-scrolling" style="background-color: rgba(255,255,255,0);background-position: center center;background-repeat: no-repeat;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
	<div class="fusion-builder-row fusion-row ">
		<div class="fusion-layout-column fusion_builder_column fusion_builder_column_2_3  fusion-two-third fusion-column-first 2_3" style="margin-top:0px;margin-bottom:20px;width:65.3333%; margin-right: 4%;">
			<div class="fusion-column-wrapper" style="background-position:left top;background-repeat:no-repeat;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;" data-bg-url="">
				<div class="fusion-title title fusion-title-size-one" style="margin-top:0px;margin-bottom:5px;">
					<h1 class="title-heading-left">
						Latest from the Blog
					</h1>
					<div class="title-sep-container"><div class="title-sep sep-single sep-solid" style="border-color:#e0dede;"></div></div>
				</div>
				<?php echo do_shortcode('[fusion_recent_posts layout="default" columns="2" number_posts="2" meta="yes" meta_author="yes" meta_categories="yes" meta_date="yes" meta_comments="no" excerpt="yes" excerpt_length="25" ]'); ?>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
