<?php

/**
 * Theme customizations
 *
 * @package      faller
 * @author       Alexandra Faller
 * @link         http://www.alexfaller.uk/
 * @copyright    Copyright (c) 2018, Alexandra Faller
 * @license      GPL-2.0+
 */

// Load child theme textdomain.
load_child_theme_textdomain( 'faller' );

add_action( 'genesis_setup', 'faller_setup', 15 );
/**
 * Theme setup.
 *
 * Attach all of the site-wide functions to the correct hooks and filters. All
 * the functions themselves are defined below this setup function.
 *
 * @since 1.0.0
 */
function faller_setup() {

	// Define theme constants.
	define( 'CHILD_THEME_NAME', 'faller' );
	define( 'CHILD_THEME_URL', 'http://github.com/A13X4ND7A/faller' );
	define( 'CHILD_THEME_VERSION', '1.0.0' );




	// Add custom logo or Enable option in Customizer > Site Identity
add_theme_support( 'custom-logo', array(
	'width'       => 244,
	'height'      => 315,
	'flex-width' => true,
	'flex-height' => true,
	'header-text' => array( '.site-title', '.site-description' ),
) );

// Display custom logo
add_action( 'genesis_site_title', 'the_custom_logo', 0 );


	// Add HTML5 markup structure.
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption'  ) );
	
	// Add viewport meta tag for mobile browsers.
	add_theme_support( 'genesis-responsive-viewport' );
	
	// Add theme support for accessibility.
	add_theme_support( 'genesis-accessibility', array(
		'404-page',
		'drop-down-menu',
		'headings',
		'rems',
		'search-form',
		// 'skip-links',
	) );

	//* Enable the superfish script
add_filter( 'genesis_superfish_enabled', '__return_true' );

	// Add theme support for footer widgets.
	add_theme_support( 'genesis-footer-widgets', 3 );

	// Unregister layouts that use secondary sidebar.
	genesis_unregister_layout( 'content-sidebar-sidebar' );
	genesis_unregister_layout( 'sidebar-content-sidebar' );
	genesis_unregister_layout( 'sidebar-sidebar-content' );

	// Unregister secondary sidebar.
	unregister_sidebar( 'sidebar-alt' );



	// Add theme widget areas.
	include_once( get_stylesheet_directory() . '/includes/widget-areas.php' );

}





//* Enqueue scripts and styles
add_action( 'wp_enqueue_scripts', 'faller_enqueue_scripts_styles' );
function faller_enqueue_scripts_styles() {

	
	wp_enqueue_script( 'faller-js', get_bloginfo( 'stylesheet_directory' ) . '/js/main.js', array( 'jquery' ), '1.0.0' );

	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'parallax-google-fonts', '//fonts.googleapis.com/css?family=Montserrat|Sorts+Mill+Goudy', array(), CHILD_THEME_VERSION );

}




