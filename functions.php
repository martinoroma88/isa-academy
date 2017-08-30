<?php
	/*-----------------------------------------------------------------------------------*/
	/* This file will be referenced every time a template/page loads on your Wordpress site
	/* This is the place to define custom fxns and specialty code
	/*-----------------------------------------------------------------------------------*/

// Define the version so we can easily replace it throughout the theme
define( 'NAKED_VERSION', 1.0 );

/*-----------------------------------------------------------------------------------*/
/*  Set the maximum allowed width for any content in the theme
/*-----------------------------------------------------------------------------------*/
if ( ! isset( $content_width ) ) $content_width = 900;

/*-----------------------------------------------------------------------------------*/
/* Add Rss feed support to Head section
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'automatic-feed-links' );


/*-----------------------------------------------------------------------------------*/
/* Register main menu for Wordpress use
/*-----------------------------------------------------------------------------------*/
register_nav_menus( 
	array(
		'primary'	=>	__( 'Primary Menu', 'naked' ), // Register the Primary menu
		// Copy and paste the line above right here if you want to make another menu, 
		// just change the 'primary' to another name
	)
);

// Registrare un Custom Navigation Walker
require_once('func/wp_bootstrap_navwalker.php');

/*-----------------------------------------------------------------------------------*/
/* Activate sidebar for Wordpress use
/*-----------------------------------------------------------------------------------*/
function naked_register_sidebars() {
	register_sidebar(array(				// Start a series of sidebars to register
		'id' => 'sidebar', 					// Make an ID
		'name' => 'Sidebar',				// Name it
		'description' => 'Take it on the side...', // Dumb description for the admin side
		'before_widget' => '<div>',	// What to display before each widget
		'after_widget' => '</div>',	// What to display following each widget
		'before_title' => '<h3 class="side-title">',	// What to display before each widget's title
		'after_title' => '</h3>',		// What to display following each widget's title
		'empty_title'=> '',					// What to display in the case of no title defined for a widget
		// Copy and paste the lines above right here if you want to make another sidebar, 
		// just change the values of id and name to another word/name
	));
} 
// adding sidebars to Wordpress (these are created in functions.php)
add_action( 'widgets_init', 'naked_register_sidebars' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue Styles and Scripts
/*-----------------------------------------------------------------------------------*/

function naked_scripts()  { 

	// get the theme directory style.css and link to it in the header
	wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/styles/bootstrap.css');
	// wp_enqueue_style('theme', get_stylesheet_directory_uri() . '/styles/bootstrap-theme.css');
	wp_enqueue_style('chocolat', get_stylesheet_directory_uri() . '/styles/chocolat.css');
	wp_enqueue_style('owl', get_stylesheet_directory_uri() . '/styles/owl.carousel.css');
	wp_enqueue_style('waves', get_stylesheet_directory_uri() . '/styles/waves.min.css');
	wp_enqueue_style('style.css', get_stylesheet_directory_uri() . '/style.css');
	wp_enqueue_style('accademia', get_stylesheet_directory_uri() . '/styles/accademia.css');
	
	// add fitvid
	// wp_enqueue_script( 'naked-fitvid', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), NAKED_VERSION, true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), NAKED_VERSION, true );
	wp_enqueue_script( 'chocolat', get_template_directory_uri() . '/js/chocolat.js', array( 'jquery' ), NAKED_VERSION, true );
	wp_enqueue_script( 'owl', get_template_directory_uri() . '/js/owl.carousel.js', array( 'jquery' ), NAKED_VERSION, true );
	wp_enqueue_script( 'waves', get_template_directory_uri() . '/js/waves.min.js', array( 'jquery' ), NAKED_VERSION, true );
	wp_enqueue_script( 'accademia', get_template_directory_uri() . '/js/accademia.js', array( 'jquery' ), NAKED_VERSION, true );
	
	// add theme scripts
	// wp_enqueue_script( 'naked', get_template_directory_uri() . '/js/theme.min.js', array(), NAKED_VERSION, true );
  
}
add_action( 'wp_enqueue_scripts', 'naked_scripts' ); // Register this fxn and allow Wordpress to call it automatcally in the header


/* SUPPORTO IMMAGINE IN EVIDENZA */
add_theme_support( 'post-thumbnails' ); 

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

// GOOGLE MAPS API KEY FOR ACF--------
function my_acf_google_map_api( $api ){
	
	$api['key'] = 'AIzaSyDBg7JakMFZ9desjEHnoPJHpm2GEtmYN-E';
	
	return $api;
	
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');