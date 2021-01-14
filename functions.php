<?php
/**
 * Enqueue scripts and styles.
 */
function react_revolution_scripts() {
//	wp_enqueue_style( 'dashicons' );

}
add_action( 'wp_enqueue_scripts', 'react_revolution_scripts', 9 );
