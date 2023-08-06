<?php

class Elm_Slider {
    /**
     * Constructor function.
     */
    public function __construct() {

         // Enqueued styles and scripts.
         add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
         add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
 
         // Add hooks here.
     
    }

     /**
     * Enqueued elm slider addon styles.
     */
    public function enqueue_styles() {
        wp_enqueue_style(
            'elm-slider-style',
           ELM_SLIDER_URL . 'css/elm-slider-style.css', 
            array(),
            ELM_SLIDER_VERSION
        );
    }


     /**
     * Enqueue elm-slider scripts.
     */
    public function enqueue_scripts() {
        
        wp_enqueue_script(
            'elm-slider-script',
            ELM_SLIDER_URL . 'js/elm-slider-script.js', 
            array( 'jquery' ), 
            ELM_SLIDER_VERSION,
            true 
        );
    }


    /**
     * InitializeD the Elm Slider Addon.
     */
    public function init() {
        // Added Elementor category for widgets.
        add_action( 'elementor/init', array( $this, 'add_elementor_category' ) );
    
        // Loaded elm slider addon's widgets.
        add_action( 'elementor/widgets/widgets_registered', array( $this, 'load_widgets' ) );
    }
    
    public function add_elementor_category() {
        \Elementor\Plugin::instance()->elements_manager->add_category(
            'elm-slider',
            array(
                'title' => 'Elm Slider',
                'icon'  => 'fa fa-plug', 
            ),
            1
        );
    }
    
    public function load_widgets() {
        // Included elm slider widget class file(s).
        require_once ELM_SLIDER_DIR . 'widgets/elm-slider-widget.php';
    
        // Registered elm slider widgets.
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Elm_Slider_Widget() );
    }
    
}
