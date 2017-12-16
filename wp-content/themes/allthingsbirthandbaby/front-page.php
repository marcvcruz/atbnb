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
    <div class="fusion-layout-column fusion_builder_column fusion_builder_column_3_4  fusion-three-fourth fusion-column-last 3_4" style="margin-top:0px;margin-bottom:60px;width:71%;">
      <div class="fusion-column-wrapper" style="background-position:left top;background-repeat:no-repeat;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;" data-bg-url="">

      	<!-- Sponsor here -->
      	<?php 
					$sponsor_provider_id = get_option( 'service_provider_settings_featured_sponsor' );
					if ( $sponsor_provider_id[0]	) {
						$featured_sponsor_meta = get_post_meta( $sponsor_provider_id[0] );
				?>
        <div class="sponsor-provider fusion-fullwidth fullwidth-box nonhundred-percent-fullwidth non-hundred-percent-height-scrolling" style="background-color: rgba(255,255,255,0);background-position: center center;background-repeat: no-repeat;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
				  <div class="fusion-builder-row ">
				    <div class="fusion-layout-column fusion_builder_column fusion_builder_column_1_2  fusion-one-half fusion-column-first 1_2" style="margin-top:0px;margin-bottom:20px;width:50%;width:calc(50% - ( ( 4% ) * 0.5 ) );margin-right: 4%;">
				      <div class="fusion-column-wrapper" style="background-position:left top;background-repeat:no-repeat;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;" data-bg-url="">
				        <div class="fusion-text">
				          <p style="text-align: right;">Sponsored by:</p>
				        </div>
				        <div class="fusion-clearfix"></div>
				      </div>
				    </div>
				    <div class="fusion-layout-column fusion_builder_column fusion_builder_column_1_2  fusion-one-half fusion-column-last 1_2" style="margin-top:0px;margin-bottom:20px;width:50%;width:calc(50% - ( ( 4% ) * 0.5 ) );">
				      <div class="fusion-column-wrapper" style="background-position:left top;background-repeat:no-repeat;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;" data-bg-url="">
				        <span style="margin-right:25px;float:left;" class="fusion-imageframe imageframe-none imageframe-1 hover-type-none">
				        <img src="<?php echo pods_image_url( $featured_sponsor_meta['logo'][0] ); ?>" />
				        </span>
				      </div>
				    </div>
				    <div class="fusion-clearfix"></div>
				    <div class="atbnb-separator fusion-separator fusion-full-width-sep sep-single sep-solid separator"></div>
				    <div class="fusion-clear-fix"></div>
				  </div>
				</div>
				<?php } ?>

				<!-- Content -->
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

        <!-- Call to actions -->
        <div class="call-to-action-container" style="margin-bottom: 50px;">
        	<div class="fusion-title title fusion-title-size-one">
						<h2 class="title-heading-center">Local Birth or Parenting Practitioner?</h2>
        	</div>
        	<div class="fusion-button-wrapper fusion-aligncenter">
      			<a class="fusion-button button-flat fusion-button-square button-large button-default button-1 join-directory call-to-action" target="_blank" rel="noopener noreferrer" href="https://allthingsbirthandbaby.wufoo.com/forms/all-things-birth-and-baby-directory-registration/">
      				<span class="fusion-button-text">Join Our Free Directory</span>
      			</a>
      		</div>
        	<div class="fusion-title title fusion-title-size-one">
						<h2 class="title-heading-center">Expectant or New Parent?</h2>
        	</div>
        	<div class="fusion-button-wrapper fusion-aligncenter">
  					<style type="text/css" scoped="scoped">.fusion-button.button-2 .fusion-button-text, .fusion-button.button-2 i {color:#ffc72a;}.fusion-button.button-2 {border-width:0px;border-color:#ffc72a;}.fusion-button.button-2 .fusion-button-icon-divider{border-color:#ffc72a;}.fusion-button.button-2:hover .fusion-button-text, .fusion-button.button-2:hover i,.fusion-button.button-2:focus .fusion-button-text, .fusion-button.button-2:focus i,.fusion-button.button-2:active .fusion-button-text, .fusion-button.button-2:active{color:#ffc72a;}.fusion-button.button-2:hover, .fusion-button.button-2:focus, .fusion-button.button-2:active{border-width:0px;border-color:#ffc72a;}.fusion-button.button-2:hover .fusion-button-icon-divider, .fusion-button.button-2:hover .fusion-button-icon-divider, .fusion-button.button-2:active .fusion-button-icon-divider{border-color:#ffc72a;}.fusion-button.button-2{width:auto;}</style>
  					<a class="fusion-button button-flat fusion-button-square button-large button-default button-2 stay-updated call-to-action" target="_blank" rel="noopener noreferrer" href="https://hypnomothering.wufoo.com/forms/ziqhn4o10m3cnu/">
  						<span class="fusion-button-text">Stay Updated!</span>
  					</a>
					</div>
				</div>

				<div class="fusion-sep-clear"></div>

				<!-- Featured Provider -->
				<?php 
					$featured_provider_id = get_option( 'service_provider_settings_featured_provider' );
					if ( $featured_provider_id[0]	) {
						$featured_provider_meta = get_post_meta( $featured_provider_id[0] );
				?>
				<div id="featured-provider-container">
			    <div class="featured-provider" style="margin-top: 0px;" data-animationoffset="100%">
	          <div class="heading icon-left">
	            <h2 class="content-box-heading" data-inline-fontsize="true" data-inline-lineheight="true" data-fontsize="16" data-lineheight="21">
	            		Featured Provider
	            </h2>
	          </div>
	          <div class="fusion-clearfix"></div>
	          <div class="content-container" style="color: #6a6a6a;">
	            <div class="icon-container">
	            	<a href="http://kavanahdoula.com" target="_blank" rel="noopener">
	            		<?php 
	            			$image_url = pods_image_url($featured_provider_meta['logo'][0]); 
	            		?>
	            		<img class="alignnone size-full wp-image-75" src="<?php echo $image_url; ?>" alt="" scale="0" />
	            	</a>
	            </div>
	            <div class="description">
	              <ul>
	                <li>
	                <?php 
	                
	                	$display_name = $featured_provider_meta['contact_name'][0];
	                	if ( $featured_provider_meta['business_name'] )
	                		$display_name = $display_name . ' - ' . $featured_provider_meta['business_name'][0];
	                
	                	echo $display_name
	                ?>
	                </li>
	                <li><?php echo $featured_provider_meta['quick_excerpt'][0]; ?></li>
	                <li><a href="<?php echo $featured_provider_meta['website_url'][0]; ?>" target="_blank" rel="noopener">View Profile</a></li>
	              </ul>
	            </div>
	          </div>
		        <div class="fusion-clearfix"></div>
			    </div>
				</div>
				<div class="fusion-clearfix"></div>
				<?php } ?>
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
