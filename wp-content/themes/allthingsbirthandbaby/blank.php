<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<?php Avada()->head->the_viewport(); ?>
		<?php wp_head(); ?>

		<?php $object_id = get_queried_object_id(); ?>
		<?php $c_page_id = Avada()->fusion_library->get_page_id(); ?>

		<script type="text/javascript">
			var doc = document.documentElement;
			doc.setAttribute('data-useragent', navigator.userAgent);
		</script>

		<?php
		/**
		 *
		 * The settings below are not sanitized.
		 * In order to be able to take advantage of this,
		 * a user would have to gain access to the database
		 * in which case this is the least on your worries.
		 */
			echo Avada()->settings->get( 'google_analytics' ); // WPCS: XSS ok.
			echo Avada()->settings->get( 'space_head' ); // WPCS: XSS ok.
		?>
	</head>

<?php
	$wrapper_class = ( is_page_template( 'blank.php' ) ) ? 'wrapper_blank' : '';

	if ( 'modern' === Avada()->settings->get( 'mobile_menu_design' ) ) {
		$mobile_logo_pos = strtolower( Avada()->settings->get( 'logo_alignment' ) );
		if ( 'center' === strtolower( Avada()->settings->get( 'logo_alignment' ) ) ) {
			$mobile_logo_pos = 'left';
		}
	}
?>

<body <?php body_class(); ?>>
	<?php the_post() ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php echo fusion_render_rich_snippets_for_pages(); // WPCS: XSS ok. ?>
		<?php avada_featured_images_for_pages(); ?>
		<div class="post-content">
			<?php the_content(); ?>
		</div>
	</div>
</html>