<?php
namespace Elementor;
class Webnus_Element_Widgets_Social_Widget extends \Elementor\Widget_Base {

	/**
	 * Retrieve  widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {

		return 'w_social';

	}

	/**
	 * Retrieve  widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {

		return __( 'Social Icons Widget', 'deep' );

	}

	/**
	 * Retrieve  widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {

		return 'deep-widget deep-eicon-social-icons';

	}

	/**
	 * Set widget category.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget category.
	 */
	public function get_categories() {

		return [ 'webnus' ];

	}

	/**
	 * Register  widget controls.
	 *
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

        // Content Tab
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Just select widget', 'deep' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
		);

		$this->end_controls_section();

		// Custom css tab
		$this->start_controls_section(
			'custom_css_section',
			[
				'label' => __( 'Custom CSS', 'deep' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'custom_css',
			[
				'label' => __( 'Custom CSS', 'deep' ),
				'type' => \Elementor\Controls_Manager::CODE,
				'language' => 'css',
				'rows' => 20,
				'show_label' => true,
			]
		);

		$this->end_controls_section();


	}

	/**
	 * Render  widget output on the frontend.
	 *
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		$instance = array();

		$args = array(
			'before_title'	=> '<div class="subtitle-wrap"><h4 class="subtitle">',
			'after_title'	=> '</h4></div>'
		);

        $custom_css = $settings['custom_css'];

		if ( $custom_css != '' ) {
			echo '<style>'. $custom_css .'</style>';
        }

		echo get_the_widget( 'WebnusSocialWidget', $instance, $args );

	}

}
