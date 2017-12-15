	<?php
/**
 *
 * Template name: Side Navigation Template
 * Template desription: Side Navigation template used for ATBnB pages
 * 
 */


// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<?php get_header(); ?>
<div class="fusion-fullwidth fullwidth-box nonhundred-percent-fullwidth non-hundred-percent-height-scrolling" style="background-color: rgba(255,255,255,0);background-position: center center;background-repeat: no-repeat;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
  <div class="fusion-builder-row fusion-row ">
    <div class="fusion-layout-column fusion_builder_column fusion_builder_column_1_4  fusion-one-fourth fusion-column-first 1_4" style="margin-top:0px;margin-bottom:20px;width:25%;margin-right: 4%;">
      <div class="fusion-column-wrapper" style="background-position:left top;background-repeat:no-repeat;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;" data-bg-url="">
        <?php dynamic_sidebar( 'service-category-sidebar' ) ?>
        <div class="fusion-clearfix"></div>
      </div>
    </div>
    <div class="fusion-layout-column fusion_builder_column fusion_builder_column_3_4  fusion-three-fourth fusion-column-last 3_4" style="margin-top:0px;margin-bottom:20px;width:71%;">
      <div class="fusion-column-wrapper" style="background-position:left top;background-repeat:no-repeat;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;" data-bg-url="">
        <?php while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
						<?php echo fusion_render_rich_snippets_for_pages(); // WPCS: XSS ok. ?>
						<?php avada_featured_images_for_pages(); ?>
						<div class="post-content">
							<?php the_content(); ?>
						</div>
					</div>
				<?php endwhile; ?>
      </div>
    </div>
  </div>
</div>
<?php
get_footer();
