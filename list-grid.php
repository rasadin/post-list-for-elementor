<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_Webalive_List_Grid extends Widget_Base {

	public function get_name() {
		return 'webalive-list-post';
	}

	public function get_title() {
		return esc_html__( 'List Post Card', 'amplioenergy-core' );
	}

	public function get_script_depends() {
        return [
            'ampilo-public'
        ];
	}
	
	public function get_icon() {
		return 'fa fa-clipboard';
	}

    public function get_categories() {
		return [ 'ampilo-for-elementor' ];
	}

	protected function _register_controls() {
	
        /**
         * Content Settings
         */
		$this->start_controls_section(
			'content_section',
			[
				'label' 	=> __( 'Content Settings', 'amplioenergy-core' ),
				'tab' 		=> \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'title', [
				'label' => __( 'Title', 'amplioenergy-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'List Title' , 'amplioenergy-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'per_page',
			[
				'label' 		=> __( 'Per Page', 'amplioenergy-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'default' 		=> 2,
			]
        );

		$this->add_control(
			'excerpt_size',
			[
				'label' 		=> __( 'Excerpt-Content Size(characters)', 'amplioenergy-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'default' 		=> 100,
			]
        );

        
		$this->add_control(
			'left_right',
			[
                'label' => __( 'Left Right Style', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'1'  => __( 'left', 'plugin-domain' ),
					'2' => __( 'right', 'plugin-domain' ),
				],
			]
		);
		

		$this->add_control(
			'excerpt_option',
			[
                'label' => __( 'Excerpt/Content Options', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'content as excerpt',
				'options' => [
					'1'  => __( 'content as excerpt', 'plugin-domain' ),
					'2' => __( 'the excerpt', 'plugin-domain' ),
				],
			]
        );

        $this->add_control(
			'show_hide_excerpt',
			[
                'label' => __( 'Show Excerpt', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
				]
		);
		
		$this->add_control(
			'show_hide_author',
			[
                'label' => __( 'Show Author', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
				]
		);

		$this->add_control(
			'show_hide_terms',
			[
                'label' => __( 'Show Terms', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
				]
		);
		
		
        
		$this->add_control(
			'read_more_btn_txt', [
				'label' => __( 'Button text for single post read more ', 'amplioenergy-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Read More' , 'amplioenergy-core' ),
				'label_block' => true,
			]
        );
        
		$this->add_control(
			'final_btn_link', [
				'label' => __( 'Final Button Link', 'amplioenergy-core' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'amplioenergy-core' ),
				'show_external' => false,
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => true,
				],
			]
        );
        
		$this->add_control(
			'final_btn_txt', [
				'label' => __( 'Final Button Text', 'amplioenergy-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Read All Post' , 'amplioenergy-core' ),
				'label_block' => true,
			]
		);


		$this->add_control(
			'show_date',
			[
				'label' => __( 'Show Date', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_time',
			[
				'label' => __( 'Show Time', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->end_controls_section();


		$this->start_controls_section(
			'layout_section',
			[
				'label' => __( 'Layout', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'margin-for-excerpt',
			[
				'label' => __( 'Margin for Excerpt ', 'plugin-domain' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .margin_excerpt' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();



        
		/**
		 * Style Tab
		 */
		$this->style_tab();
    }

	private function style_tab() {}
	protected function render() {
		$webalive = $this->get_settings_for_display();
		$target = $webalive['website_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $webalive['website_link']['nofollow'] ? ' rel="nofollow"' : '';
		$this->add_render_attribute(
			'webalive_post_thumbnail_grid_options',
			[
				'id' => 'webalive-hero-post-'.$this->get_id(),
			]
		);
    ?>
        <!-- Add Markup Starts -->
        <section class="home-latest-blog-section">
		  <?php echo '<h2>' . $webalive['title'] . '</h2>'; ?>

                <?php do_shortcode('[list-post-grid 
                per_page="'.$webalive['per_page'].'" 
                left_right="'.$webalive['left_right'].'" 
                read_more_btn_txt="'.$webalive['read_more_btn_txt'].'"
                excerpt_size="'.$webalive['excerpt_size'].'"
				show_hide_excerpt="'.$webalive['show_hide_excerpt'].'"
				show_hide_author="'.$webalive['show_hide_author'].'"
				show_hide_terms="'.$webalive['show_hide_terms'].'"
				show_date="'.$webalive['show_date'].'"
				show_time="'.$webalive['show_time'].'"
				excerpt_option="'.$webalive['excerpt_option'].'"

                ]'); ?>
			     <div class="end-btn-list-div"> <a class="end-btn-list-a" href="<?php echo esc_url($webalive['final_btn_link']['url']); ?>"><?php echo $webalive['final_btn_txt']; ?></a></div>
         </section>
        <!-- Add Markup Ends -->
	<?php
	}
	protected function content_template() {}
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Webalive_List_Grid() );
