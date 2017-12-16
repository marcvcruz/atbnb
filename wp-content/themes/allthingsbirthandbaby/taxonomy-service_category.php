<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<?php get_header();


	$service_category = get_term_by( 'slug', $service_category, 'service_category' );
	$service_category_hero = get_term_meta( $service_category->term_id, 'hero_image', true );
?>
<div class="fusion-fullwidth fullwidth-box nonhundred-percent-fullwidth non-hundred-percent-height-scrolling" style="background-color: rgba(255,255,255,0);background-position: center center;background-repeat: no-repeat;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
	<div class="fusion-builder-row fusion-row ">
	  <?php if($service_category->parent) { ?>
		  <div class="sub-service-category fusion-layout-column fusion_builder_column fusion_builder_column_1_4  fusion-one-fourth fusion-column-first 1_4" style="margin-top:0px;margin-bottom:20px;width:25%;margin-right: 4%;">
		  	<div class="fusion-column-wrapper" style="background-position:left top;background-repeat:no-repeat;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;" data-bg-url="">
		      <?php dynamic_sidebar( 'service-category-sidebar' ) ?>
		      <div class="fusion-clearfix"></div>
		    </div>
		 	</div>
		 	<div class="sub-service-category fusion-layout-column fusion_builder_column fusion_builder_column_3_4  fusion-three-fourth fusion-column-last 3_4" style="margin-top:0px;margin-bottom:20px;width:71%;">
		  		<div class="fusion-column-wrapper" style="background-position:left top;background-repeat:no-repeat;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;" data-bg-url="">
		      	<h1><?php echo $service_category->name ?></h1>
		      	<?php if ($service_category_hero) {
		      			$attributes = array(
		      				'class' => 'service-category-hero',
		      				'style' => 'float:left'
		      			);
			      		echo pods_image( $service_category_hero['ID'], 'small', 0, $attributes, false );
		      	} ?>
		      	<p> <?php echo $service_category->description ?> </p>
		      	<div class="horizontal-menu-wrapper">
		      		<?php $url = strtok($_SERVER["REQUEST_URI"],'?'); ?>
		      		<div class="menu-item service-area current-cat"><a href="<?php echo $url; ?>" >All</a></div>
		      		<?php dynamic_sidebar( 'service-area-menu' ) ?>
		      	</div>
		      	<?php while ( have_posts() ) : the_post();  ?>
							<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
								<div class="post-content">
									<?php 
										$display_name = '';
										$meta = get_post_meta( get_the_ID() );
										
					      		$logo = $meta['logo'][0];
					      		$business_name = $meta['business_name'][0];
					      		$contact_name = $meta['contact_name'][0];
					      		$quick_excerpt = $meta['quick_excerpt'][0];
					      		$address = $meta['address'][0];
					      		$city = $meta['city'][0];
					      		$state = $meta['state'][0]; 
					      		$phone_numpher = $meta['phone_number'][0];
					      		$website_url = $meta['website_url'][0];
					      		$email = $meta['business_email'][0];
					      		$premier_provider = $meta['premier_provider'][0];

					      		if ($business_name)
					      			 $display_name = $business_name . ' - ';
					      	 	$display_name = $display_name . $contact_name; 
					      	 	$logo_html = pods_image( $logo, "small", 0, $attributes, false );
					      	 	$logo_content = $premier_provider ? $logo_html : '<img style="float: left;max-width:250px; margin: 0 20px 10px 0;" src="/wp-content/uploads/2017/12/atbnb_fpo.png" />';
					      	 	if ( $premier_provider ) 
					      	 		$view_details = '<div class="fusion-button-wrapper">
  																			<a class="fusion-button button-flat fusion-button-square button-large button-default button-1" target="_blank" rel="noopener noreferrer" href="' . get_permalink( get_the_ID() ) . '">
  																				<span class="fusion-button-text">View details</span>
  																			</a>
																			</div>';

					      	 	$short_code = '[fusion_toggle title="' . $display_name . '"]'. $logo_content . '<p>' . $quick_excerpt . '</p> 
					      	 		<div class="address">
												<span>' . $address . '</span>
												<span>' . $city . ', ' . $state  . '</span>
												<span>' . $phone_numpher . '</span>
												<span><a href="' . $website_url . '" target="_blank">' . $website_url . '</a></span>
												<span><a href="mailto=' . $email . '">' . $email . '</a></span>
											</div>' . $view_details	. 
											'[/fusion_toggle]';
					      	 	echo do_shortcode( $short_code );
					      	?>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
		  </div>
	</div>
</div>		 
<?php } else { ?>
	<!-- Root service categories -->
		<div class="root-service-category fusion-layout-column fusion_builder_column fusion_builder_column_1_3  fusion-one-third fusion-column-first 1_3" style="margin-top:0px;margin-bottom:20px;width:30%;margin-right: 4%;">
			<div class="fusion-column-wrapper" style="background-position:left top;background-repeat:no-repeat;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;" data-bg-url="" >
				<?php if ($service_category_hero) {
	      			$attributes = array(
	      				'class' => 'service-category-hero'
	      			);
		      		echo pods_image( $service_category_hero['ID'], 'large', 0, $attributes, false );
	      	} ?>
			</div>
		</div>

		<div class="fusion-layout-column fusion_builder_column fusion_builder_column_2_3  fusion-two-third fusion-column-last 2_3" style="width:65%;margin-top:0px;margin-bottom:20px;">
			<div class="fusion-column-wrapper" style="background-position:left top;background-repeat:no-repeat;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;" data-bg-url="">
				<h1><?php echo $service_category->name ?></h1>
				<p><?php echo $service_category->description ?></p> 
			</div>
			<?php
				$term_children = get_term_children( $service_category->term_id, $service_category->taxonomy );

				foreach ( $term_children as $child ) {
					$term = get_term_by( 'id', $child, $service_category->taxonomy );
					$term_link = get_term_link( $child, $service_category->taxonomy );

					echo do_shortcode('[fusion_toggle title="' . $term->name . '"/]');
				}
			?> 

		</div>
		<div class="fusion-clearfix"></div>
	  <div class="atbnb-separator fusion-separator fusion-full-width-sep sep-single sep-solid separator"></div>
	  <div class="fusion-clear-fix"></div>
	</div>
</div>
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
<?php } ?>


<?php get_footer(); 