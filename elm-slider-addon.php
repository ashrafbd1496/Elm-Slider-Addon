<?php
/**
 * Plugin Name: Elm Slider
 * Description: Slider widget for Elementor.
 * Plugin URI:  https://github.com/elm-slider
 * Version:     1.0.0
 * Author:      Ashraf Uddin
 * Author URI:  https://ashrafbd.com/
 * Text Domain: elm-slider
 *
 * Elementor tested up to: 3.7.0
 * Elementor Pro tested up to: 3.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function elm_slider_addon() {

	// Load plugin file
	require_once( __DIR__ . '/includes/elm-slider-plugin.php' );

	// Run the plugin
	\Elementor_Elm_Slider_Addon\Plugin::instance();

}
add_action( 'plugins_loaded', 'elm_slider_addon' );