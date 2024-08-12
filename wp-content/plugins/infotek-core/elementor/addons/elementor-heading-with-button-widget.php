<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Infotek
 * @since 1.0.0
 */ 
 
class Heading_With_Button extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'infotek-heading-with-button-widget';
	}

	/**
	 * Get widget title.
	 * Retrieve button widget title.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Heading With Button', 'infotek-core' );
	}

	/**
	 * Get widget icon.
	 * Retrieve button widget icon.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-welcome';
	}

	/**
	 * Get widget categories.
	 * Retrieve the list of categories the button widget belongs to.
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since  2.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories()
    {
        return ['infotek_widgets'];
    }
	
	/**
	 * Register button widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		// Tab Start - 1

		$this->start_controls_section(
			'heading_with_button',
			[
				'label' => esc_html__( 'Title', 'infotek-core' ),
			]
		);		
		
		$this->add_control(
			'style',
			[
				'label'   => esc_html__( 'Select Style', 'infotek-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => array(
					'style1'   => esc_html__( 'Style One', 'infotek-core' ),
					'style2'   => esc_html__( 'Style Two', 'infotek-core' ),
					'style3'   => esc_html__( 'Style Three', 'infotek-core' ),
					'style4'   => esc_html__( 'Style Four', 'infotek-core' ),
				),
			]
		);

		$this->add_control(
			'text_align',
			[
				'label'   => esc_html__( 'Text Align', 'infotek-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'center',
				'options' => array(
					'center'   => esc_html__( 'Center', 'infotek-core' ),
					'left'   => esc_html__( 'Left', 'infotek-core' ),
					'right'   => esc_html__( 'Right', 'infotek-core' ),
					'condition'	=> ['style' => ['style2']],
				),
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label'       => __( 'Sub Title', 'infotek-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your sub title', 'infotek-core' ),
			]
		);
	
		$this->add_control(
				'title',
				[
					'label'       => __( 'Title', 'infotek-core' ),
					'type'        => Controls_Manager::TEXTAREA,
					'dynamic'     => [
						'active' => true,
					],
					'placeholder' => __( 'Enter your title', 'infotek-core' ),
				]
			);

			$this->add_control(
				'button',
				[
					'label'       => __( 'Button', 'infotek-core' ),
					'type'        => Controls_Manager::TEXT,
					'dynamic'     => [
						'active' => true,
					],
					'placeholder' => esc_html__( 'Enter your button text', 'infotek-core' ),
					'default' => esc_html__('Read More', 'infotek-core'),
					'condition'	=> ['style' => ['style1']],
				]
			);	
		
	
		$this->add_control(
				'button_link',
				[
				  'label' => __( 'Button Url', 'infotek-core' ),
				  'type' => Controls_Manager::URL,
				  'placeholder' => __( 'https://your-link.com', 'infotek-core' ),
				  'show_external' => true,
				  'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				  ],
				  'condition'	=> ['style' => ['style1']],
				
			   ]
			);


		$this->end_controls_section();		




		// Section Title Settings ==================
		$this->start_controls_section(
			'section_title_settings',
			array(
				'label' => __( 'Section Title Setting', 'infotek-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		// Show Section Title Control
		$this->add_control(
			'show_section_title',
			array(
				'label' => esc_html__( 'Show Section Title', 'infotek-core' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'show' => [
						'show' => esc_html__( 'Show', 'infotek-core' ),
						'icon' => 'eicon-check-circle',
					],
					'none' => [
						'none' => esc_html__( 'Hide', 'infotek-core' ),
						'icon' => 'eicon-close-circle',
					],
				],
				'default' => 'show',
				'selectors' => [
					'{{WRAPPER}} .section-title h2' => 'display: {{VALUE}} !important',
				],        
			)
		);

		// Section Title Alignment Control
		$this->add_control(
			'section_title_alignment',
			array(
				'label' => esc_html__( 'Alignment', 'infotek-core' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'infotek-core' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'infotek-core' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'infotek-core' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => '',
				'condition' => [ 'show_section_title' => 'show' ],
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .section-title h2' => 'text-align: {{VALUE}} !important',
				],
			)
		);

		// Section Title Margin Control
		$this->add_control(
			'section_title_margin',
			array(
				'label' => __( 'Margin', 'infotek-core' ),
				'condition' => [ 'show_section_title' => 'show' ],
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .section-title h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
				],
			)
		);

		// Section Title Padding Control
		$this->add_control(
			'section_title_padding',
			array(
				'label' => __( 'Padding', 'infotek-core' ),
				'condition' => [ 'show_section_title' => 'show' ],
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .section-title h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
				],
			)
		);

		// Typography Control
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name' => 'section_title_typography',
				'condition' => [ 'show_section_title' => 'show' ],
				'label' => __( 'Typography', 'infotek-core' ),
				'selector' => '{{WRAPPER}} .section-title h2',
			)
		);

		// Section Title Color Control
		$this->add_control(
			'section_title_color',
			array(
				'label' => __( 'Color', 'infotek-core' ),
				'condition' => [ 'show_section_title' => 'show' ],
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title h2' => 'color: {{VALUE}} !important',
				],
			)
		);

		$this->end_controls_section();
		// End of Section Title Setting ==================




		// Section Sub Title Settings ==================
		$this->start_controls_section(
			'section_subtitle_settings',
			array(
				'label' => __( 'Section Sub Title Setting', 'infotek-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		// Show Section Sub Title Control
		$this->add_control(
			'show_section_subtitle',
			array(
				'label' => esc_html__( 'Show Section Sub Title', 'infotek-core' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'show' => [
						'show' => esc_html__( 'Show', 'infotek-core' ),
						'icon' => 'eicon-check-circle',
					],
					'none' => [
						'none' => esc_html__( 'Hide', 'infotek-core' ),
						'icon' => 'eicon-close-circle',
					],
				],
				'default' => 'show',
				'selectors' => [
					'{{WRAPPER}} .section-title span' => 'display: {{VALUE}} !important',
				]
			)
		);

		// Section Sub Title Alignment Control
		$this->add_control(
			'section_subtitle_alignment',
			array(
				'label' => esc_html__( 'Alignment', 'infotek-core' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'infotek-core' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'infotek-core' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'infotek-core' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => '',
				'condition' => [ 'show_section_subtitle' => 'show' ],
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .title-box' => 'text-align: {{VALUE}} !important',
				],
			)
		);

		// Section Sub Title Margin Control
		$this->add_control(
			'section_subtitle_margin',
			array(
				'label' => __( 'Margin', 'infotek-core' ),
				'condition' => [ 'show_section_subtitle' => 'show' ],
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .section-title span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
				],
			)
		);

		// Section Sub Title Padding Control
		$this->add_control(
			'section_subtitle_padding',
			array(
				'label' => __( 'Padding', 'infotek-core' ),
				'condition' => [ 'show_section_subtitle' => 'show' ],
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .section-title span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
				],
			)
		);

		// Typography Control
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name' => 'section_subtitle_typography',
				'condition' => [ 'show_section_subtitle' => 'show' ],
				'label' => __( 'Typography', 'infotek-core' ),
				'selector' => '{{WRAPPER}} .section-title span',
			)
		);

		// Section Sub Title Color Control
		$this->add_control(
			'section_subtitle_color',
			array(
				'label' => __( 'Color', 'infotek-core' ),
				'condition' => [ 'show_section_subtitle' => 'show' ],
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title span' => 'color: {{VALUE}} !important',
				],
			)
		);

		// Section Sub Title Background Color Control
		$this->add_control(
			'section_subtitle_bg_color',
			array(
				'label' => __( 'Background Color', 'infotek-core' ),
				'condition' => [ 'show_section_subtitle' => 'show' ],
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title span' => 'background-color: {{VALUE}} !important',
				],
			)
		);

		$this->end_controls_section();
		// End of Section Sub Title Setting ==================


		// Button Settings ==================
		$this->start_controls_section(
			'button_control',
			array(
				'label' => __( 'Button Settings', 'infotek-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		// Show Button Control
		$this->add_control(
			'show_button',
			array(
				'label' => esc_html__( 'Show Button', 'infotek-core' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'show' => [
						'show' => esc_html__( 'Show', 'infotek-core' ),
						'icon' => 'eicon-check-circle',
					],
					'none' => [
						'none' => esc_html__( 'Hide', 'infotek-core' ),
						'icon' => 'eicon-close-circle',
					],
				],
				'default' => 'show',
				'selectors' => [
					'{{WRAPPER}} .theme-btn' => 'display: {{VALUE}} !important',
				]
			)
		);

		// Button Alignment Control
		$this->add_control(
			'button_alignment',
			array(
				'label' => esc_html__( 'Alignment', 'infotek-core' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'condition' => [ 'show_button' => 'show' ],
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'infotek-core' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'infotek-core' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'infotek-core' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .theme-btn' => 'text-align: {{VALUE}} !important',
				],
			)
		);

		// Button Text Color Control
		$this->add_control(
			'button_text_color',
			array(
				'label' => __( 'Button Text Color', 'infotek-core' ),
				'condition' => [ 'show_button' => 'show' ],
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .theme-btn' => 'color: {{VALUE}} !important',
				],
			)
		);

		// Background Color Control
		$this->add_control(
			'button_bg_color',
			array(
				'label' => __( 'Background Color', 'infotek-core' ),
				'condition' => [ 'show_button' => 'show' ],
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .theme-btn' => 'background: {{VALUE}} !important',
				],
			)
		);

		// Button Hover Text Color Control
		$this->add_control(
			'button_hover_text_color',
			array(
				'label' => __( 'Text Hover Color', 'infotek-core' ),
				'condition' => [ 'show_button' => 'show' ],
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .theme-btn:before' => 'color: {{VALUE}} !important',
					'{{WRAPPER}} .theme-btn:after' => 'color: {{VALUE}} !important',
				],
			)
		);

		// Button Hover Background Color Control
		$this->add_control(
			'button_hover_bg_color',
			array(
				'label' => __( 'Background Hover Color', 'infotek-core' ),
				'condition' => [ 'show_button' => 'show' ],
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .theme-btn:hover' => 'background: {{VALUE}} !important',
				],
			)
		);

		// Button Padding Control
		$this->add_control(
			'button_padding',
			array(
				'label' => __( 'Padding', 'infotek-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'condition' => [ 'show_button' => 'show' ],
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .theme-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				],
			)
		);

		// Button Margin Control
		$this->add_control(
			'button_margin',
			array(
				'label' => __( 'Margin', 'infotek-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'condition' => [ 'show_button' => 'show' ],
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .theme-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				],
			)
		);

		// Button Typography Control
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name' => 'button_typography',
				'condition' => [ 'show_button' => 'show' ],
				'label' => __( 'Typography', 'infotek-core' ),
				'selector' => '{{WRAPPER}} .theme-btn',
			)
		);

		// Button Border Control
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name' => 'border',
				'condition' => [ 'show_button' => 'show' ],
				'selector' => '{{WRAPPER}} .theme-btn',
			)
		);

		// Button Border Radius Control
		$this->add_control(
			'border_radius',
			array(
				'label' => esc_html__( 'Border Radius', 'infotek-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'condition' => [ 'show_button' => 'show' ],
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .theme-btn' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			)
		);

		$this->end_controls_section();
		// End of Button ==================



	
		}

	/**
	 * Render button widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$allowed_tags = wp_kses_allowed_html('post');
		?>

<?php
	  echo '
	 <script>
 jQuery(document).ready(function($) {

// js code start




// js code end 

  });
</script>';


?>

<?php  if ( 'style1' === $settings['style'] ) : ?>	

	<div class="section-title-area">
		<div class="section-title">
			<span class="wow fadeInUp"><?php echo $settings['subtitle'];?></span>
			<h2 class="wow fadeInUp" data-wow-delay=".3s">
				<?php echo $settings['title'];?>
			</h2>
		</div>
		<a href="<?php echo esc_url($settings['button_link']['url']);?>" class="theme-btn wow fadeInUp" data-wow-delay=".5s">
			<?php echo $settings['button'];?>
			<i class="fa-solid fa-arrow-right-long"></i>
		</a>
	</div>

<?php  elseif ( 'style2' === $settings['style'] ) : ?>

	<div class="section-title text-<?php echo $settings['text_align']; ?>">
		<span class="wow fadeInUp"><?php echo $settings['subtitle'];?></span>  
		<h2 class="wow fadeInUp" data-wow-delay=".3s">
			<?php echo $settings['title'];?>
		</h2>  
	</div>

<?php  elseif ( 'style3' === $settings['style'] ) : ?>

	<div class="section-title-area">
		<div class="section-title">
			<span class="wow fadeInUp"><?php echo $settings['subtitle'];?></span>  
			<h2 class="wow fadeInUp" data-wow-delay=".3s">
				<?php echo $settings['title'];?>
			</h2>  
		</div>
		<div class="array-button">
			<button class="array-prev"><i class="fal fa-arrow-right"></i></button>
			<button class="array-next"><i class="fal fa-arrow-left"></i></button>
		</div>
	</div>

<?php  elseif ( 'style4' === $settings['style'] ) : ?>

	<div class="section-title-area">
		<div class="section-title">
			<span class="text-white wow fadeInUp"><?php echo $settings['subtitle'];?></span>  
			<h2 class="text-white wow fadeInUp" data-wow-delay=".3s">
				<?php echo $settings['title'];?>
			</h2>  
		</div>
		<div class="array-button wow fadeInUp" data-wow-delay=".5s">
			<button class="array-prev border-white"><i class="fal fa-arrow-right"></i></button>
			<button class="array-next"><i class="fal fa-arrow-left"></i></button>
		</div>
	</div>

<?php endif ;?>	

             
		<?php 
	}


}

Plugin::instance()->widgets_manager->register_widget_type(new Heading_With_Button());