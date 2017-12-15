	<?php
/**
 *
 * Template name: Home Template
 * Template desription: Home template used for home page of ATBnB pages
 * 
 */


// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<?php get_header(); ?>
<?php layerslider(1); ?>
<div class="fusion-fullwidth fullwidth-box nonhundred-percent-fullwidth non-hundred-percent-height-scrolling" style="background-color: rgba(255,255,255,0);background-position: center center;background-repeat: no-repeat;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
  <div class="fusion-builder-row fusion-row ">
    <div class="fusion-layout-column fusion_builder_column fusion_builder_column_1_4  fusion-one-fourth fusion-column-first 1_4" style="margin-top:0px;margin-bottom:20px;width:25%;margin-right: 4%;">
      <div class="fusion-column-wrapper" style="background-position:left top;background-repeat:no-repeat;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;" data-bg-url="">
        <?php dynamic_sidebar( 'service-category-sidebar' ) ?>
      </div>
    </div>
    <div class="fusion-layout-column fusion_builder_column fusion_builder_column_3_4  fusion-three-fourth fusion-column-last 3_4" style="margin-top:0px;margin-bottom:20px;width:71%;">
      <div class="fusion-column-wrapper" style="background-position:left top;background-repeat:no-repeat;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;" data-bg-url="">

      	<!-- Sponsor here -->
        <div class="fusion-sep-clear"></div>
				<div class="atbnb-separator fusion-separator fusion-full-width-sep sep-single sep-solid separator"></div>
				<div class="fusion-clear-fix"></div>
        <?php while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
						<?php echo fusion_render_rich_snippets_for_pages(); // WPCS: XSS ok. ?>
						<?php avada_featured_images_for_pages(); ?>
						<div class="post-content">
							<?php the_content(); ?>
						</div>
					</div>
				<?php endwhile; ?>
				<div class="fusion-sep-clear"></div>
				<div class="atbnb-separator fusion-separator fusion-full-width-sep sep-single sep-solid separator"></div>
        <div class="fusion-clearfix"></div>
        <div class="call-to-action-container">
        	<div class="fusion-title title fusion-title-size-one">
						<h1 class="title-heading-center">Local Birth or Parenting Practitioner?</h1>
        	</div>
        	<div class="fusion-button-wrapper fusion-aligncenter">
      			<a class="fusion-button button-flat fusion-button-square button-large button-default button-1 join-directory call-to-action" target="_blank" rel="noopener noreferrer" href="https://hypnomothering.wufoo.com/forms/z1wpss8c11n5zqm">
      				<span class="fusion-button-text">Join Our Free Directory</span>
      			</a>
      		</div>
        	<div class="fusion-title title fusion-title-size-one">
						<h1 class="title-heading-center">Expectant or New Parent?</h1>
        	</div>
        	<div class="fusion-button-wrapper fusion-aligncenter">
  					<style type="text/css" scoped="scoped">.fusion-button.button-2 .fusion-button-text, .fusion-button.button-2 i {color:#ffc72a;}.fusion-button.button-2 {border-width:0px;border-color:#ffc72a;}.fusion-button.button-2 .fusion-button-icon-divider{border-color:#ffc72a;}.fusion-button.button-2:hover .fusion-button-text, .fusion-button.button-2:hover i,.fusion-button.button-2:focus .fusion-button-text, .fusion-button.button-2:focus i,.fusion-button.button-2:active .fusion-button-text, .fusion-button.button-2:active{color:#ffc72a;}.fusion-button.button-2:hover, .fusion-button.button-2:focus, .fusion-button.button-2:active{border-width:0px;border-color:#ffc72a;}.fusion-button.button-2:hover .fusion-button-icon-divider, .fusion-button.button-2:hover .fusion-button-icon-divider, .fusion-button.button-2:active .fusion-button-icon-divider{border-color:#ffc72a;}.fusion-button.button-2{width:auto;}</style>
  					<a class="fusion-button button-flat fusion-button-square button-large button-default button-2 stay-updated call-to-action" target="_blank" rel="noopener noreferrer" href="https://hypnomothering.wufoo.com/forms/ziqhn4o10m3cnu/">
  						<span class="fusion-button-text">Stay Updated!</span>
  					</a>
					</div>
					<div class="featured-provider-container">	</div>
      </div>
    </div>
  </div>
</div>

<!-- Promo video -->
<?php $videoId = '9scTV9CPzGs'; ?>
<div class="fusion-fullwidth fullwidth-box hundred-pecent-fullwidth promo-video" >
	<div class="fusion-builder-row fusion-row">
		<div class="fusion-layout-column fusion_builder_column">
			<div class="fusion-column-wrapper">
				<?php echo do_shortcode('[video src="https://youtu.be/' . $videoId . '" /]'); ?>
			</div>
		</div>
	</div>
</div>

<!-- Recent blog and Testimonials -->
<div class="fusion-fullwidth fullwidth-box most-recent-container nonhundred-percent-fullwidth non-hundred-percent-height-scrolling" style="background-color: rgba(255,255,255,0);background-position: center center;background-repeat: no-repeat;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
	<div class="fusion-builder-row fusion-row ">	
		
		<!-- Most recent blog posts  -->
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
		
		<!-- Ranmdom testimonials -->
		<div class="fusion-layout-column fusion_builder_column fusion_builder_column_1_3  fusion-one-third fusion-column-last 1_3" style="margin-top:0px;margin-bottom:20px;width: 30.333%;">
			<div class="fusion-column-wrapper" style="background-position:left top;background-repeat:no-repeat;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;" data-bg-url="">
				<div class="fusion-title title fusion-title-size-one" style="margin-top:0px;margin-bottom:5px;">
					<h1 class="title-heading-left">
						Parent Review
					</h1>
					<div class="title-sep-container"><div class="title-sep sep-single sep-solid" style="border-color:#e0dede;"></div></div>
				</div>
				<?php echo do_shortcode('[pods name="testimonial" limit="1" template="Testimonials"][/pods]'); ?>
			</div>
		</div>
	
	</div>
</div>
<?php
get_footer();
