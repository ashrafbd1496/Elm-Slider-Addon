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

// Defined constants.
define( 'ELM_SLIDER_VERSION', '1.0.0' );
define( 'ELM_SLIDER_DIR', plugin_dir_path( __FILE__ ) );
define( 'ELM_SLIDER_URL', plugin_dir_url( __FILE__ ) );

// Included the main plugin class.
require_once ELM_SLIDER_DIR . 'includes/class-elm-slider.php';

// Initialized the plugin.
add_action( 'plugins_loaded', 'elm_slider_init' );

function elm_slider_init() {
    $addon = new Elm_Slider();
    $addon->init();
}
