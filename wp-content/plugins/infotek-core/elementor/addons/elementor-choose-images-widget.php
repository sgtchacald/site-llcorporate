<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Infotek
 * @since 1.0.0
 */ 
 
class Choose_Images extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'infotek-choose-images-widget';
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
		return esc_html__( 'Choose Images', 'infotek-core' );
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
			'text_slide',
			[
				'label' => esc_html__( 'Text Slider', 'infotek-core' ),
			]
		);		

		$this->add_control(
			'image',
				[
				  'label' => __( 'Image', 'infotek-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				]
		);	
		
		$this->add_control(
			'alt_text',
			[
				'label'       => __( 'Alt text', 'infotek-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Your Text', 'infotek-core' ),
			]
		);

		$this->add_control(
			'image2',
				[
				  'label' => __( 'Image', 'infotek-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				]
		);	
		
		$this->add_control(
			'alt_text2',
			[
				'label'       => __( 'Alt text', 'infotek-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Your Text', 'infotek-core' ),
			]
		);

		$this->add_control(
			'image3',
				[
				  'label' => __( 'Image', 'infotek-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				]
		);	
		
		$this->add_control(
			'alt_text3',
			[
				'label'       => __( 'Alt text', 'infotek-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Your Text', 'infotek-core' ),
			]
		);

		$this->add_control(
			'image4',
				[
				  'label' => __( 'Image', 'infotek-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				]
		);	
		
		$this->add_control(
			'alt_text4',
			[
				'label'       => __( 'Alt text', 'infotek-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Your Text', 'infotek-core' ),
			]
		);

		$this->add_control(
			'image5',
				[
				  'label' => __( 'Image', 'infotek-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				]
		);	
		
		$this->add_control(
			'alt_text5',
			[
				'label'       => __( 'Alt text', 'infotek-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Your Text', 'infotek-core' ),
			]
		);

		$this->add_control(
			'image6',
				[
				  'label' => __( 'Image', 'infotek-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				]
		);	
		
		$this->add_control(
			'alt_text6',
			[
				'label'       => __( 'Alt text', 'infotek-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Your Text', 'infotek-core' ),
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
		
	//Title
	
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
	
	//TEXT
	
		$this->add_control(
				'text',
				[
					'label'       => __( 'Description Text', 'infotek-core' ),
					'type'        => Controls_Manager::TEXTAREA,
					'dynamic'     => [
						'active' => true,
					],
					'placeholder' => __( 'Enter Your Text', 'infotek-core' ),
				]
			);

		$this->add_control(
			'text2',
			[
				'label'       => __( 'Description Text', 'infotek-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Your Text', 'infotek-core' ),
			]
		);

		$this->end_controls_section();

		// Tab Start - 2

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Block', 'infotek-core' ),
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

						'block_title2' =>
						[
							'name' => 'block_title2',
							'label' => esc_html__('Title', 'infotek-core'),
							'type' => Controls_Manager::TEXTAREA,
							'default' => esc_html__('', 'infotek-core')
						],

						'block_title' =>
						[
							'name' => 'block_title',
							'label' => esc_html__('Title', 'infotek-core'),
							'type' => Controls_Manager::TEXTAREA,
							'default' => esc_html__('', 'infotek-core')
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


<section class="choose-us-section fix section-padding">
            <div class="choose-shape">
			<?php  if ( !empty(esc_url($settings['image']['id']) )) : ?>   
				<img src="<?php echo wp_get_attachment_url($settings['image']['id']);?>" alt="<?php echo esc_attr($settings['alt_text']);?>"/>
			<?php endif;?>
            </div>
            <div class="bottom-shape">
			<?php  if ( !empty(esc_url($settings['image2']['id']) )) : ?>   
				<img src="<?php echo wp_get_attachment_url($settings['image2']['id']);?>" alt="<?php echo esc_attr($settings['alt_text2']);?>"/>
			<?php endif;?>
            </div>
            <div class="arrow-shape-1 bounce-x">
			<?php  if ( !empty(esc_url($settings['image3']['id']) )) : ?>   
				<img src="<?php echo wp_get_attachment_url($settings['image3']['id']);?>" alt="<?php echo esc_attr($settings['alt_text3']);?>"/>
			<?php endif;?>
            </div>
            <div class="circle-shape">
			<?php  if ( !empty(esc_url($settings['image4']['id']) )) : ?>   
				<img src="<?php echo wp_get_attachment_url($settings['image4']['id']);?>" alt="<?php echo esc_attr($settings['alt_text4']);?>"/>
			<?php endif;?>
            </div>
            <div class="line-shape">
			<?php  if ( !empty(esc_url($settings['image5']['id']) )) : ?>   
				<img src="<?php echo wp_get_attachment_url($settings['image5']['id']);?>" alt="<?php echo esc_attr($settings['alt_text5']);?>"/>
			<?php endif;?>
            </div>
            <div class="container">
                <div class="choose-us-wrapper">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="choose-us-image wow fadeInUp" data-wow-delay=".4s">
							<?php  if ( !empty(esc_url($settings['image6']['id']) )) : ?>   
								<img src="<?php echo wp_get_attachment_url($settings['image6']['id']);?>" alt="<?php echo esc_attr($settings['alt_text6']);?>"/>
							<?php endif;?>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-4 mt-lg-0">
                            <div class="choose-content">
                                <div class="section-title">
                                    <span class="wow fadeInUp"><?php echo $settings['subtitle'];?></span>
                                    <h2 class="wow fadeInUp" data-wow-delay=".3s">
										<?php echo $settings['title'];?>
                                    </h2>
                                </div>
                                <p class="mt-3 mt-md-0 wow fadeInUp" data-wow-delay=".5s">
									<?php echo $settings['text'];?>
                                </p>
                                <div class="choose-list-area">
									<?php echo $settings['text2'];?>
                                </div>
								<div class="progress-wrap">
									<?php foreach($settings['repeat'] as $item):?>	
									<div class="about-3-progress-bar p-relative">
										<div class="pro-head">
											<h6 class="title"><?php echo wp_kses($item['block_title2'], $allowed_tags);?></h6>
											<span class="progress-count"><?php echo wp_kses($item['block_title'], $allowed_tags);?>%</span>
										</div>
										<div class="progress">
											<div class="progress-bar wow slideInLeft" data-wow-duration="1s" data-wow-delay=".3s" role="progressbar" data-width="<?php echo wp_kses($item['block_title'], $allowed_tags);?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo wp_kses($item['block_title'], $allowed_tags);?>%; visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: slideInLeft;">
											</div>
										</div>                                        
									</div>
									<?php endforeach; ?>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

             
		<?php 
	}


}

Plugin::instance()->widgets_manager->register_widget_type(new Choose_Images());