<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Infotek
 * @since 1.0.0
 */ 
 
class Cta_With_Image extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'infotek-cta-with-image-widget';
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
		return esc_html__( 'CTA Widgets', 'infotek-core' );
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
			'cta_with_image',
			[
				'label' => esc_html__( 'CTA Widgets', 'infotek-core' ),
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
				),
			]
		);

		$this->add_control(
			'image',
				[
				  'label' => __( 'Shape Image', 'infotek-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  'condition'	=> ['style' => ['style1']],
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
				'condition'	=> ['style' => ['style1']],
			]
		);

		$this->add_control(
			'image2',
				[
				  'label' => __( 'Shape Image', 'infotek-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  'condition'	=> ['style' => ['style1']],
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
				'condition'	=> ['style' => ['style1']],
			]
		);

		$this->add_control(
			'image3',
				[
				  'label' => __( 'Main Image', 'infotek-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  'condition'	=> ['style' => ['style1']],
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
				'condition'	=> ['style' => ['style1']],
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
				'condition'	=> ['style' => ['style2']],
			]
		);

		$this->add_control(
			'subtitle2',
			[
				'label'       => __( 'Sub Title', 'infotek-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your sub title', 'infotek-core' ),
				'condition'	=> ['style' => ['style2']],
			]
		);

		$this->add_control(
			'button_link2',
			[
			  'label' => __( 'Phone Input', 'infotek-core' ),
			  'type' => Controls_Manager::URL,
			  'placeholder' => __( 'https://your-link.com', 'infotek-core' ),
			  'show_external' => true,
			  'default' => [
				'url' => '',
				'is_external' => true,
				'nofollow' => true,
				'condition'	=> ['style' => ['style2']],
			  ],
			
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
				'condition'	=> ['style' => ['style1','style2']],
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
				'default' => esc_html__('get A Quote', 'infotek-core'),
				'condition'	=> ['style' => ['style1','style2']],
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
				'condition'	=> ['style' => ['style1','style2']],
			  ],
			
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

<?php  if ( 'style1' === $settings['style'] ) : ?>	

<section class="cta-section">
	<div class="container">
		<div class="cta-wrapper">
			<div class="mask-shape">
			<?php  if ( !empty(esc_url($settings['image']['id']) )) : ?>   
				<img src="<?php echo wp_get_attachment_url($settings['image']['id']);?>" alt="<?php echo esc_attr($settings['alt_text']);?>"/>
			<?php endif;?>
			</div>
			<div class="circle-shape">
			<?php  if ( !empty(esc_url($settings['image2']['id']) )) : ?>   
				<img src="<?php echo wp_get_attachment_url($settings['image2']['id']);?>" alt="<?php echo esc_attr($settings['alt_text2']);?>"/>
			<?php endif;?>
			</div>
			<div class="cta-image wow fadeInUp" data-wow-delay=".3s">
			<?php  if ( !empty(esc_url($settings['image3']['id']) )) : ?>   
				<img src="<?php echo wp_get_attachment_url($settings['image3']['id']);?>" alt="<?php echo esc_attr($settings['alt_text3']);?>"/>
			<?php endif;?>
			</div>
			<div class="cta-items">
				<h3 class="wow fadeInUp" data-wow-delay=".5s"><?php echo $settings['title'];?></h3>
				<a href="<?php echo esc_url($settings['button_link']['url']);?>" class="theme-btn bg-white wow fadeInUp" data-wow-delay=".7s">
					<?php echo $settings['button'];?>
					<i class="fa-solid fa-arrow-right-long"></i>
				</a>
			</div>
		</div>
	</div>
</section>

<?php  elseif ( 'style2' === $settings['style'] ) : ?>

	<div class="cta-banner-2">
		<div class="container">
			<div class="cta-wrapper-2">
				<div class="author-icon">
					<div class="icon">
							<i class="fa-solid fa-phone"></i>
					</div>
						<div class="content">
							<span><?php echo $settings['subtitle'];?></span>
							<h4>
								<a href="<?php echo esc_url($settings['button_link2']['url']);?>"><?php echo $settings['subtitle2'];?></a>
							</h4>
						</div>
				</div>
				<h3>
					<?php echo $settings['title'];?>
				</h3>
				<a href="<?php echo esc_url($settings['button_link']['url']);?>" class="theme-btn bg-white">
					<?php echo $settings['button'];?>
					<i class="fa-solid fa-arrow-right-long"></i>
				</a>
			</div>
		</div>
	</div>

<?php endif ;?>	

             
		<?php 
	}


}

Plugin::instance()->widgets_manager->register_widget_type(new Cta_With_Image());