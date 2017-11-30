<?php


function theme_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'avada-stylesheet', 'fusion-dynamic-css' ) );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

//add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
//add_action( 'w-_enqueue_scripts', 'enqueue_child_styles' );

// function enqueue_parent_styles() {
//     wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
// }

// function enqueue_child_styles() {
//     wp_enqueue_style( 'child-style', get_stylesheet_directory_uri().'/style.css' );
// }

function avada_lang_setup() {
	$lang = get_stylesheet_directory() . '/languages';
	load_child_theme_textdomain( 'Avada', $lang );
}
add_action( 'after_setup_theme', 'avada_lang_setup' );
