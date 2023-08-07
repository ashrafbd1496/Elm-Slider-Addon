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
			'list_title',
			[
				'label' => esc_html__( 'Title', 'elm-slider' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'elm-slider' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_content',
			[
				'label' => esc_html__( 'Content', 'elm-slider' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'List Content' , 'elm-slider' ),
				'show_label' => false,
			]
		);

		$repeater->add_control(
			'list_color',
			[
				'label' => esc_html__( 'Color', 'elm-slider' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'color: {{VALUE}}'
				],
			]
		);

		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'Repeater List', 'elm-slider' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => esc_html__( 'Title #1', 'elm-slider' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'elm-slider' ),
					],
					[
						'list_title' => esc_html__( 'Title #2', 'elm-slider' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'elm-slider' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
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

		if ( $settings['list'] ) {
			echo '<dl>';
			foreach (  $settings['list'] as $item ) {
				echo '<dt class="elementor-repeater-item-' . esc_attr( $item['_id'] ) . '">' . $item['list_title'] . '</dt>';
				echo '<dd>' . $item['list_content'] . '</dd>';
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
        // Output your widget content template here.
		<# if ( settings.list.length ) { #>
			<dl>
			<# _.each( settings.list, function( item ) { #>
				<dt class="elementor-repeater-item-{{ item._id }}">{{{ item.list_title }}}</dt>
				<dd>{{{ item.list_content }}}</dd>
			<# }); #>
			</dl>
		<# } #>
		<?php
    }

} //end Class
