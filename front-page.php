<?php

/**
 * Front page template
 *
 * @package      faller
 * @author       Alexandra Faller
 * @link         http://www.alexfaller.uk/
 * @copyright    Copyright (c) 2018, Alexandra Faller
 * @license      GPL-2.0+
 */

add_action( 'genesis_meta', 'faller_home_page_setup' );
/**
 * Set up the homepage layout by conditionally loading sections when widgets
 * are active.
 *
 * @since 1.0.0
 */
function faller_home_page_setup() {

	$home_sidebars = array(
		'home_welcome' 	   => is_active_sidebar( 'home-welcome' ),
		'call_to_action'   => is_active_sidebar( 'call-to-action' ),
		'buy_now'  		   => is_active_sidebar( 'buy_now' ),
	);

	// Return early if no sidebars are active.
	if ( ! in_array( true, $home_sidebars ) ) {
		return;
	}

	// Add main POS area
	if ( $home_sidebars['buy_now'] ) {
		add_action( 'genesis_after_header', 'faller_add_buy_now' );
	}

	// Add home welcome area if "Home Welcome" widget area is active.
	if ( $home_sidebars['home_welcome'] ) {
		add_action( 'genesis_after_header', 'faller_add_home_welcome' );
	}

	// Add call to action area if "Call to Action" widget area is active.
	if ( $home_sidebars['call_to_action'] ) {
		add_action( 'genesis_after_header', 'faller_add_call_to_action' );
	}

	// Force full-width-content layout setting.
	add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

	// Remove posts.
	remove_action( 'genesis_loop', 'genesis_do_loop' );

}


/**
 * Display content for the "Buy Now" section.
 *
 * @since 1.0.0
 */
function faller_add_buy_now() {

	genesis_widget_area( 'buy_now',
		array(
			'before' => '<div class="buy_now"><div class="wrap">',
			'after' => '</div></div>',
		)
	);
}


/**
 * Display content for the "Home Welcome" section.
 *
 * @since 1.0.0
 */
function faller_add_home_welcome() {

	genesis_widget_area( 'home-welcome',
		array(
			'before' => '<div class="home-welcome"><div class="wrap">',
			'after' => '</div></div>',
		)
	);
}

/**
 * Display content for the "Call to Action" section.
 *
 * @since 1.0.0
 */
function faller_add_call_to_action() {

	genesis_widget_area( 'call-to-action',
		array(
			'before' => '<div class="call-to-action"><div class="wrap">',
			'after' => '</div></div>',
		)
	);
}

genesis();
