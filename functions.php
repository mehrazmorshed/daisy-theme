<?php
/**
 * Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Daisy
 */

if ( ! defined( 'DAISY_THEME_VERSION' ) ) {
	$daisy_theme = wp_get_theme();
	define( 'DAISY_THEME_VERSION', $daisy_theme->get( 'Version' ) );
}

/**
 * Enqueue scripts and styles.
 */
function daisy_theme_enqueue() {
    wp_enqueue_style( 'daisy-theme-default-style', get_template_directory_uri() . '/style.css',array('bootstrap','slicknav','razia-default-block','razia-style'), '', 'all');
    wp_enqueue_style( 'daisy-theme-main-style', get_stylesheet_directory_uri() . '/assets/css/daisy-style.css',array(), DAISY_THEME_VERSION, 'all');

    wp_enqueue_script( 'daisy-theme-main-script', get_stylesheet_directory_uri() . '/assets/js/daisy-script.js', array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'daisy_theme_enqueue' );

/**
 * Load Daisy Theme Tags files.
 */
require get_stylesheet_directory() . '/inc/template-tags.php';