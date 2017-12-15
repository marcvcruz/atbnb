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
		      	<?php dynamic_sidebar('service-area-menu') ?>
		      	<?php while ( have_posts() ) : the_post();  ?>
							<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
								<div class="post-content">
									<?php 
										$display_name = '';
										$meta = get_post_meta( get_the_ID() );
										
					      		$logo = $meta['logo'][0];
					      		$business_name = $meta['business_name'][0];
					      		$contact_name = $meta['contact_name'][0];
					      		$description = $meta['description'][0];
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
					      	 	$short_code = '[fusion_toggle title="' . $display_name . '"]'. $logo_content . '<p>' . $description . '</p> 
					      	 		<div class="address">
												<span>' . $address . '</span>
												<span>' . $city . ', ' . $state  . '</span>
												<span>' . $phone_numpher . '</span>
												<span><a href="' . $website_url . '" target="_blank">' . $website_url . '</a></span>
												<span><a href="mailto=' . $email . '">' . $email . '</a></span>
											</div>

					      	 	[/fusion_toggle]';
					      	 	echo do_shortcode( $short_code );
					      	?>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
		  </div>
		 <?php } else { ?>
		<!-- Root service categories -->
			<div class="root-service-category fusion-layout-column fusion_builder_column fusion_builder_column_1_3  fusion-one-half fusion-column-first 1_3" style="margin-top:0px;margin-bottom:20px;width:30%;margin-right: 4%;">
				<div class="fusion-column-wrapper" style="background-position:left top;background-repeat:no-repeat;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;" data-bg-url="" >
					<?php if ($service_category_hero) {
		      			$attributes = array(
		      				'class' => 'service-category-hero'
		      			);
			      		echo pods_image( $service_category_hero['ID'], 'large', 0, $attributes, false );
		      	} ?>
				</div>
			</div>

			<div class="fusion-layout-column fusion_builder_column fusion_builder_column_2_3  fusion-two-third fusion-column-last 2_3" style="width:60%;margin-top:0px;margin-bottom:20px;margin-right: 4%;">
				<div class="fusion-column-wrapper" style="background-position:left top;background-repeat:no-repeat;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;" data-bg-url="">
					<h1><?php echo $service_category->name ?></h1>
					<p><?php echo $service_category->description ?></p> 
				</div>
			</div>

		<?php } ?>
  </div>
</div>

<?php

	
?>
<?php get_footer(); 