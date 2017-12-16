<?php


function theme_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'avada-stylesheet', 'fusion-dynamic-css' ) );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function avada_lang_setup() {
	$lang = get_stylesheet_directory() . '/languages';
	load_child_theme_textdomain( 'Avada', $lang );
}
add_action( 'after_setup_theme', 'avada_lang_setup' );

		// function add_admin_scripts( $hook ) {

		//     global $post;

		//     if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
		//         if ( 'service_provider' === $post->post_type ) {     
		//             wp_enqueue_script(  'admin-service_provider', get_stylesheet_directory_uri() . '/assets/js/admin-service_provider.js' );
		//         }
		//     }
		// }
		// add_action( 'admin_enqueue_scripts', 'add_admin_scripts', 10, 1 );

/**
* 	Manage visible columns for Service providers on admin pages
*/
add_filter( 'manage_service_provider_posts_columns', 'my_service_provider_columns') ;
function my_service_provider_columns( $columns ) {
	$columns = array(
		'cb' => '<input type="checkbox" />',
		'name' => __( 'Name' ),
		'business_name' => __( 'Business Name' ),
		'service_categories' => __( 'Service Categories' ),
		'date' => __( 'Date' )
	);
	return $columns;
}

/**
 * Set column values for Service Provider admin pages
*/
add_action( 'manage_service_provider_posts_custom_column', 'set_service_provider_posts_custom_column', 10, 2 ) ;
function set_service_provider_posts_custom_column( $column, $post_id ) {
	global $post;

	switch( $column ) {

 		/* If displaying the 'name' column. */
 		case 'name' :

			/* Get the post meta. */
			$name = get_post_meta( $post_id, 'contact_name', true );

			/* If no name is found, output a default message. */
			if ( empty( $name ) )
				echo __( 'Unknown' );
			else
				echo $name;

			break;

		/* If displaying the 'business name' column. */
		case 'business_name' :

			$name = get_post_meta( $post_id, 'business_name', true );

			/* If no name is found, output a default message. */
			if ( empty( $name ) )
				echo __( '' );
			else
				echo $name;

			break;

		case 'service_categories' :
			/* Get the genres for the post. */
			$terms = get_the_terms( $post_id, 'service_category' );

			/* If terms were found. */
			if ( !empty( $terms ) ) {

				$out = array();

				/* Loop through each term, linking to the 'edit posts' page for the specific term. */
				foreach ( $terms as $term ) {
					$out[] = sprintf( '<a href="%s">%s</a>',
						esc_url( add_query_arg( array( 'taxonomy' => 'service_category', 'tag_ID' => $term->term_id ), 'term.php' ) ),
						esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'service_category', 'display' ) )
					);
				}

				/* Join the terms, separating them with a comma. */
				echo join( ', ', $out );
			}

			/* If no terms were found, output a default message. */
			else {
				_e( '' );
			}


			break;
		/* Just break out of the switch statement for everything else. */
 		default :
 			break;
 	}
} 

/**
 * Register Sidebar
 */
function service_category_register_sidebar() {
 
    /* Register the primary sidebar. */
    register_sidebar(
        array(
            'id' => 'service_category_sidebar',
            'name' => __( 'Service Category Sidebar', 'theme_text_domain' ),
            'description' => __( '', 'theme_text_domain' ),
            'before_widget' => '<aside id="%1$s" class="widget service-category-sidebar %2$s">',
	          'after_widget' => '</aside>',
            'before_title' => '<div style="display:none;">',
            'after_title' => '</div>'
        )
    );

    register_sidebar(
    		array(
    			'id'	=> 'service_area_menu', 
    			'name'	=> __('Service Area Menu', 'theme_text_domain' ),
    			'before_widget' => '<aside id="%1$s" service-area-menu class="widget %2$s">',
	        'after_widget' => '</aside>',
          'before_title' => '<div style="display:none;">',
          'after_title' => '</div>'
        )
    );

    register_sidebar(
    	array(
    			'id'	=> 'service_category_top_menu', 
    			'name'	=> __('Service Category Top Menu', 'theme_text_domain' ),
    			'before_widget' => '<aside id="%1$s" class="widget service-category-top-menu %2$s">',
	        'after_widget' => '</aside>',
          'before_title' => '<div style="display:none;">',
          'after_title' => '</div>'
        )
    );
 
    /* Repeat register_sidebar() code for additional sidebars. */
}
add_action( 'widgets_init', 'service_category_register_sidebar' );

/**
 *  Don't render page title
 */
add_action( 'template_redirect', 'avada_check_page' );
function avada_check_page() {
	add_action( 'avada_override_current_page_title_bar', 'avada_remove_title_bar' );
}

function avada_remove_title_bar() { }

/*
 * Alter orderby
 */
add_action( 'pre_get_posts','alter_order_by' );
function alter_order_by($query) {

	if ( !$query->is_main_query() || is_admin() ) {
		return $query;
	}

	if ( ( $query->is_post_type_archive( 'service_provider' ) || $query->is_tax( 'service_category' ) ) ) {
		$query->set( 'orderby','meta_value_num' );
		$query->set( 'meta_key','sort_order' );
		$query->set( 'order', 'ASC' );
	}
	return $query;
}

/**
*		Add filter to modify links for service areas
**/
	add_filter('term_link', 'service_area_term_link', 10, 3);
	function service_area_term_link( $url, $term, $taxonomy ) {

		if (is_admin() || $taxonomy != 'service_area')
			return $url;

		$url = add_query_arg( 'service_area', $term->slug );
		return $url;
	}


#add_action('pre_get_terms', 'custom_taxonomy_sort');
function custom_taxonomy_sort($query) {

    if ( is_admin() ) {
        return;
    }

    $queryVars = $query->query_vars;

    $args = [
        'meta_key' => 'sort_order',
        'orderby' => 'meta_value',
        'order' => 'ASC'
    ];

    $query->query_vars = array_merge($queryVars, $args);
}

/**
*		Add filter to use sort_order to sort items
**/
#add_filter( 'get_terms_orderby', 'custom_taxonomy_orderby', 10, 3 ); 
function custom_taxonomy_orderby( $orderby, $args, $taxonomy ) {

	if ( !is_admin() && $taxonomy[0] == 'service_category' )  {
		// echo '<pre>';
		// var_dump($taxonomy);
		// var_dump($args);
		// var_dump($orderby);
		// echo '</pre>';
		return 'meta_value';
	}
	return $orderby;
}