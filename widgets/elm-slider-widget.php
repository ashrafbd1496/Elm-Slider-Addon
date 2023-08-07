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
        return esc_html__('Elm Slider', 'elm-slider');
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



    protected function register_controls()
	{

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'elm-slider' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'slide_title',
			[
				'label' => esc_html__( 'Title', 'elm-slider' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Slide Title' , 'elm-slider' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'slide_subtitle',
			[
				'label' => esc_html__( 'Sub Title', 'elm-slider' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Slide Sub Title' , 'elm-slider' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'photo',
			[
				'label' => esc_html__( 'Photo', 'elm-slider' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'btn_text_1',
			[
				'label' => esc_html__( 'Button Text 1', 'elm-slider' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Learn More' , 'elm-slider' ),
				'show_label' => false,
			]
		);
		$repeater->add_control(
			'btn_url_1',
			[
				'label' => esc_html__( 'Button Link 1', 'elm-slider' ),
				'type' => \Elementor\Controls_Manager::URL,
				'show_label' => false,
			]
		);
		$repeater->add_control(
			'btn_text_2',
			[
				'label' => esc_html__( 'Button Text 2', 'elm-slider' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Read More' , 'elm-slider' ),
				'show_label' => false,
			]
		);
		$repeater->add_control(
			'btn_url_2',
			[
				'label' => esc_html__( 'Button Link 2', 'elm-slider' ),
				'type' => \Elementor\Controls_Manager::URL,
				'show_label' => false,
			]
		);

		$this->add_control(
			'slides',
			[
				'label' => esc_html__( 'Slides', 'elm-slider' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'slide_title' => esc_html__( 'Slide Title', 'elm-slider' ),
						'slide_subtitle' => esc_html__( 'Slide Sub Titile.', 'elm-slider' ),
						'btn_text_1' => esc_html__( 'Button Text.', 'elm-slider' ),
					],
					
				],
				'title_field' => '{{{ slide_title }}}',
			]
		);

		$this->end_controls_section();



	}


    /**
     * Render the widget output on the frontend.
     *
     * @param array $args Widget settings.
     * @param array $instance Saved widget settings.
     */
    protected function render() {
        // Output your widget content here.

		$settings = $this->get_settings_for_display();

		if ( $settings['slides'] ) {
			echo '<dl>';
			foreach (  $settings['slides'] as $item ) {
				echo '<dt class="elementor-repeater-item-' . esc_attr( $item['_id'] ) . esc_attr($item['btn_text_1']). '">' . $item['slide_title'] . '</dt>';
				echo '<dd>' . $item['slide_subtitle'] . '</dd>';
				echo '<dd>' . $item['btn_text_1'] . '</dd>';
				echo '<dd>' . $item['btn_url_1'] . '</dd>';
				echo '<dd>' . $item['btn_text_2'] . '</dd>';
				echo '<dd>' . $item['btn_url_2'] . '</dd>';
			}
			echo '</dl>';
		}
    }

    /**
     * Render the widget output in the editor.
     *
     * @param array $instance Saved widget settings.
     */
    protected function _content_template() {
		?>
    
		<# if ( settings.slides.length ) { #>
			<dl>
			<# _.each( settings.slides, function( item ) { #>
				<dt class="elementor-repeater-item-{{ item._id }}">{{{ item.slide_title }}}</dt>
				<dd>{{{ item.slide_subtitle }}}</dd>
				<dd>{{{ item.btn_text_1 }}}</dd>
				<dd>{{{ item.btn_url_1 }}}</dd>
				<dd>{{{ item.btn_text_2 }}}</dd>
				<dd>{{{ item.btn_url_2 }}}</dd>
			<# }); #>
			</dl>
		<# } #>
		<?php
    }

} //end Class
