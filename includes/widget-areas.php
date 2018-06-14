<?php
/**
 * Register widget areas
 *
 * @package      faller
 * @author       Alexandra Faller
 * @link         http://www.alexfaller.uk/
 * @copyright    Copyright (c) 2018 Alexandra Faller
 * @license      GPL-2.0+
 */

// Register front page widget areas
genesis_register_sidebar( array(
	'id'            => 'home-welcome',
	'name'          => __( 'Home Welcome', 'faller' ),
	'description'   => __( 'This is a home widget area that will show on the front page', 'faller' ),
) );
genesis_register_sidebar( array(
	'id'            => 'call-to-action',
	'name'          => __( 'Call to Action', 'faller' ),
	'description'   => __( 'This is a call to action widget area that will show on the front page', 'faller' ),
) );
genesis_register_sidebar( array(
	'id'            => 'buy_now',
	'name'          => __( 'Buy Now', 'faller' ),
	'description'   => __( 'This is a call to action widget area that will show on the front page', 'faller' ),
) );

	