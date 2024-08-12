<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Infotek
 * @since 1.0.0
 */ 
 
class Pricing extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'infotek-pricing-widget';
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
		return esc_html__( 'Pricing Widgets', 'infotek-core' );
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
		return 'eicon-flash';
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
			'pricing',
			[
				'label' => esc_html__( 'Pricing Tab', 'infotek-core' ),
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
			'subtitle2',
			[
				'label'       => __( 'Tab Text', 'infotek-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your sub title', 'infotek-core' ),
			]
		);

		$this->add_control(
			'subtitle3',
			[
				'label'       => __( 'Tab Text 2', 'infotek-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your sub title', 'infotek-core' ),
			]
		);

		$this->end_controls_section();

		// Tab Start - 2

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Month Block', 'infotek-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
		  'repeat', 
		  [
			'type' => Controls_Manager::REPEATER,
			'separator' => 'before',
			'default' => 
				[
					['block_title' => esc_html__('Projects Completed', 'infotek-core')],
				],
			'fields' => 
				[						
					'block_title' =>
					[
						'name' => 'block_title',
						'label' => esc_html__('Class', 'infotek-core'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'infotek-core')
					],

					'block_subtitle' =>
					[
						'name' => 'block_subtitle',
						'label' => esc_html__('Tag Title', 'infotek-core'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'infotek-core')
					],

					'block_title1' =>
					[
						'name' => 'block_title1',
						'label' => esc_html__('Price', 'infotek-core'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'infotek-core')
					],

					'block_title2' =>
					[
						'name' => 'block_title2',
						'label' => esc_html__('Unit', 'infotek-core'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'infotek-core')
					],

					'block_text' =>
					[
						'name' => 'block_text',
						'label' => esc_html__('Text', 'infotek-core'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'infotek-core')
					],

					'block_title3' =>
					[
						'name' => 'block_title3',
						'label' => esc_html__('Text List', 'infotek-core'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'infotek-core')
					],

					'block_title4' =>
					[
						'name' => 'block_title4',
						'label' => esc_html__('Text', 'infotek-core'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'infotek-core')
					],

					'block_button' =>

					[
						'name' => 'block_button',
						'label'       => __( 'Button', 'infotek-core' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [
							'active' => true,
						],
						'placeholder' => __( 'Enter your Button Title', 'infotek-core' ),
						'default' => esc_html__('Read More', 'infotek-core'),
					],

					'block_button_link' =>
					
					[
					  'name' => 'block_button_link',
					  'label' => __( 'Button Url', 'infotek-core' ),
					  'type' => Controls_Manager::URL,
					  'placeholder' => __( 'https://your-link.com', 'infotek-core' ),
					  'show_external' => true,
					  'default' => [
						'url' => '',
						'is_external' => true,
						'nofollow' => true,
					  ],
				   ],
					
				],
			'title_field' => '{{block_title}}',
		 ]
			
		);		
		
	$this->end_controls_section();	

	$this->start_controls_section(
		'content_section_1',
		[
			'label' => __( 'Year Block', 'infotek-core' ),
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]
	);	

	$this->add_control(
		'repeat_1', 
		  [
			  'type' => Controls_Manager::REPEATER,
			  'separator' => 'before',
			  'default' => 
				  [
					  ['block_title' => esc_html__('Projects Completed', 'infotek-core')],
				  ],
			  'fields' => 
				  [						
					  'block_title' =>
					  [
						  'name' => 'block_title',
						  'label' => esc_html__('Class', 'infotek-core'),
						  'type' => Controls_Manager::TEXTAREA,
						  'default' => esc_html__('', 'infotek-core')
					  ],

					  'block_subtitle' =>
					  [
						  'name' => 'block_subtitle',
						  'label' => esc_html__('Tag Title', 'infotek-core'),
						  'type' => Controls_Manager::TEXTAREA,
						  'default' => esc_html__('', 'infotek-core')
					  ],

					  'block_title1' =>
					  [
						  'name' => 'block_title1',
						  'label' => esc_html__('Price', 'infotek-core'),
						  'type' => Controls_Manager::TEXTAREA,
						  'default' => esc_html__('', 'infotek-core')
					  ],

					  'block_title2' =>
					  [
						  'name' => 'block_title2',
						  'label' => esc_html__('Unit', 'infotek-core'),
						  'type' => Controls_Manager::TEXTAREA,
						  'default' => esc_html__('', 'infotek-core')
					  ],

					  'block_text' =>
					  [
						  'name' => 'block_text',
						  'label' => esc_html__('Text', 'infotek-core'),
						  'type' => Controls_Manager::TEXTAREA,
						  'default' => esc_html__('', 'infotek-core')
					  ],

					  'block_title3' =>
					  [
						  'name' => 'block_title3',
						  'label' => esc_html__('Text List', 'infotek-core'),
						  'type' => Controls_Manager::TEXTAREA,
						  'default' => esc_html__('', 'infotek-core')
					  ],

					  'block_title4' =>
					  [
						  'name' => 'block_title4',
						  'label' => esc_html__('Text', 'infotek-core'),
						  'type' => Controls_Manager::TEXTAREA,
						  'default' => esc_html__('', 'infotek-core')
					  ],

					  'block_button' =>

					  [
						  'name' => 'block_button',
						  'label'       => __( 'Button', 'infotek-core' ),
						  'type'        => Controls_Manager::TEXT,
						  'dynamic'     => [
							  'active' => true,
						  ],
						  'placeholder' => __( 'Enter your Button Title', 'infotek-core' ),
						  'default' => esc_html__('Read More', 'infotek-core'),
					  ],
					  
					  'block_button_link' =>
					  [
						'name' => 'block_button_link',
						'label' => __( 'Button Url', 'infotek-core' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'infotek-core' ),
						'show_external' => true,
						'default' => [
						  'url' => '',
						  'is_external' => true,
						  'nofollow' => true,
						],
					 ],
					  
				  ],
			  'title_field' => '{{block_title}}',
		   ]
		  
	  );
	
	
$this->end_controls_section();	

	
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

<section class="pricing-section fix">
	<div class="container">
		<div class="pricing-wrapper">
			<?php if($settings['title']): ?>
			<div class="section-title-area">
				<div class="section-title">
					<span class="wow fadeInUp"><?php echo $settings['subtitle'];?></span>
					<h2 class="wow fadeInUp" data-wow-delay=".3s">
						<?php echo $settings['title'];?>
					</h2>
				</div>
				<ul class="nav" role="tablist">
					<li class="nav-item wow fadeInUp" data-wow-delay=".3s" role="presentation">
						<a href="#monthly" data-bs-toggle="tab" class="nav-link active" aria-selected="true" role="tab">
							<?php echo $settings['subtitle2'];?>
						</a>
					</li>
					<li class="nav-item wow fadeInUp" data-wow-delay=".5s" role="presentation">
						<a href="#yearly" data-bs-toggle="tab" class="nav-link" aria-selected="false" role="tab" tabindex="-1">
							<?php echo $settings['subtitle3'];?>
						</a>
					</li>
				</ul>
			</div>
			<?php endif; ?>
			<div class="tab-content">			
				<div id="monthly" class="tab-pane fade show active" role="tabpanel">
					<div class="row">
						<?php foreach($settings['repeat'] as $item):?>	
						<div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
							<div class="pricing-items <?php echo wp_kses($item['block_title'], $allowed_tags);?>">
								<div class="tag">
									<h6><?php echo wp_kses($item['block_subtitle'], $allowed_tags);?></h6>
								</div>
								<div class="pricing-header">
									<h2><?php echo wp_kses($item['block_title1'], $allowed_tags);?></h2>
									<span><?php echo wp_kses($item['block_title2'], $allowed_tags);?></span>
									<p>
										<?php echo wp_kses($item['block_text'], $allowed_tags);?>
									</p>
								</div>
								<ul class="pricing-list">
									<?php echo wp_kses($item['block_title3'], $allowed_tags);?>
								</ul>
								<div class="pricing-button">
									<p><?php echo wp_kses($item['block_title4'], $allowed_tags);?></p>
									<a href="<?php echo esc_url($item['block_button_link']['url']);?>" class="pricing-btn mt-4">
										<?php echo wp_kses($item['block_button'], $allowed_tags);?>
										<i class="fa-solid fa-arrow-right-long"></i>
									</a>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>	
				<div id="yearly" class="tab-pane fade show" role="tabpanel">
					<div class="row">
						<?php foreach($settings['repeat_1'] as $item):?>	
						<div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
							<div class="pricing-items <?php echo wp_kses($item['block_title'], $allowed_tags);?>">
								<div class="tag">
									<h6><?php echo wp_kses($item['block_subtitle'], $allowed_tags);?></h6>
								</div>
								<div class="pricing-header">
									<h2><?php echo wp_kses($item['block_title1'], $allowed_tags);?></h2>
									<span><?php echo wp_kses($item['block_title2'], $allowed_tags);?></span>
									<p>
										<?php echo wp_kses($item['block_text'], $allowed_tags);?>
									</p>
								</div>
								<ul class="pricing-list">
									<?php echo wp_kses($item['block_title3'], $allowed_tags);?>
								</ul>
								<div class="pricing-button">
									<p><?php echo wp_kses($item['block_title4'], $allowed_tags);?></p>
									<a href="<?php echo esc_url($item['block_button_link']['url']);?>" class="pricing-btn mt-4">
										<?php echo wp_kses($item['block_button'], $allowed_tags);?>
										<i class="fa-solid fa-arrow-right-long"></i>
									</a>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

             
		<?php 
	}


}

Plugin::instance()->widgets_manager->register_widget_type(new Pricing());