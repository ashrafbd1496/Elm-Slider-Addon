<?php

class Elm_Slider_Widget extends \Elementor\Widget_Base {
    /**
     * Get widget name.
     *
     * @return string
     */
    public function get_name() {
        return 'elm-slider';
    }

    /**
     * Get widget title.
     *
     * @return string
     */
    public function get_title() {
        return 'Elm Slider';
    }

    /**
     * Get widget icon.
     *
     * @return string
     */
    public function get_icon() {
        return 'fa fa-plug'; 
    }

    /**
     * Get widget categories.
     *
     * @return array
     */
    public function get_categories() {
        return array('elm-slider');
    }

    /**
     * Render the widget output on the frontend.
     *
     * @param array $args Widget settings.
     * @param array $instance Saved widget settings.
     */
    protected function render() {
        // Output your widget content here.
    }

    /**
     * Render the widget output in the editor.
     *
     * @param array $instance Saved widget settings.
     */
    protected function _content_template() {
        // Output your widget content template here.
    }
}
