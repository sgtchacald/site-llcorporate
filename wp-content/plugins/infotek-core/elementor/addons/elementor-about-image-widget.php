<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Infotek
 * @since 1.0.0
 */ 
 
class About_Image extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'infotek-about-image-widget';
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
		return esc_html__( 'About Image', 'infotek-core' );
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
			'about_image',
			[
				'label' => esc_html__( 'About Image', 'infotek-core' ),
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
				),
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
			'title2',
			[
				'label'       => __( 'Title 2', 'infotek-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your title', 'infotek-core' ),
			]
		);

		$this->add_control(
			'title3',
			[
				'label'       => __( 'Text', 'infotek-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your title', 'infotek-core' ),
				'condition'	=> ['style' => ['style2']],
			]
		);

		$this->add_control(
			'video_link',
			[
			  'label' => __( 'Video Url', 'infotek-core' ),
			  'type' => Controls_Manager::URL,
			  'placeholder' => __( 'https://your-link.com', 'infotek-core' ),
			  'show_external' => true,
			  'default' => [
				'url' => '',
				'is_external' => true,
				'nofollow' => true,
			  ],
			  'condition'	=> ['style' => ['style1','style3']],
			
		   ]
		);	

		$this->add_control(
			'image2',
				[
				  'label' => __( 'Image 2', 'infotek-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				]
		);	
		
		$this->add_control(
			'alt_text2',
			[
				'label'       => __( 'Alt text 2', 'infotek-core' ),
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
				  'label' => __( 'Image 3', 'infotek-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				]
		);	
		
		$this->add_control(
			'alt_text3',
			[
				'label'       => __( 'Alt text 3', 'infotek-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Your Text', 'infotek-core' ),
			]
		);

		$this->add_control(
			'bg_image',
			[
				'label' => esc_html__('Background image', 'infotek-core'),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
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

<div class="about-wrapper">
	<div class="about-image-items">
		<div class="counter-shape float-bob-y">
			<div class="icon">
			<?php  if ( !empty(esc_url($settings['image']['id']) )) : ?>   
				<img src="<?php echo wp_get_attachment_url($settings['image']['id']);?>" alt="<?php echo esc_attr($settings['alt_text']);?>"/>
			<?php endif;?>
			</div>
			<div class="content">
				<h3><span class="count"><?php echo $settings['title'];?> </span><?php echo $settings['title2'];?></h3>
			</div>
		</div>
		<div class="video-box">
			<a href="<?php echo esc_url($settings['video_link']['url']);?>" class="video-buttton video-popup">
				<i class="fa-solid fa-play"></i>
				<?php  if ( !empty(esc_url($settings['image2']['id']) )) : ?>   
					<img class="text-circle" src="<?php echo wp_get_attachment_url($settings['image2']['id']);?>" alt="<?php echo esc_attr($settings['alt_text2']);?>"/>
				<?php endif;?>
			</a>
		</div>
		<div class="about-image-1 bg-cover wow fadeInLeft" data-wow-delay=".3s" style="background-image: url('<?php echo wp_get_attachment_url($settings['bg_image']['id']);?>');">
			<div class="about-image-2 wow fadeInUp" data-wow-delay=".5s">
				<?php  if ( !empty(esc_url($settings['image3']['id']) )) : ?>   
					<img class="text-circle" src="<?php echo wp_get_attachment_url($settings['image3']['id']);?>" alt="<?php echo esc_attr($settings['alt_text3']);?>"/>
				<?php endif;?>
			</div>
		</div>
	</div>
</div>

<?php  elseif ( 'style2' === $settings['style'] ) : ?>

<div class="about-wrapper style-2">
	<div class="about-image-items">
		<div class="circle-shape">
			<?php  if ( !empty(esc_url($settings['image']['id']) )) : ?>   
				<img src="<?php echo wp_get_attachment_url($settings['image']['id']);?>" alt="<?php echo esc_attr($settings['alt_text']);?>"/>
			<?php endif;?>
		</div>
		<div class="counter-shape float-bob-y">
			<div class="icon">
				<?php  if ( !empty(esc_url($settings['image2']['id']) )) : ?>   
					<img src="<?php echo wp_get_attachment_url($settings['image2']['id']);?>" alt="<?php echo esc_attr($settings['alt_text2']);?>"/>
				<?php endif;?>
			</div>
			<div class="content">
				<h3><span class="count"><?php echo $settings['title'];?></span><?php echo $settings['title2'];?></h3>
				<p><?php echo $settings['title3'];?></p>
			</div>
		</div>
		<div class="about-image-1 bg-cover wow fadeInLeft" data-wow-delay=".3s" style="background-image: url('<?php echo wp_get_attachment_url($settings['bg_image']['id']);?>');">
			<div class="about-image-2 wow fadeInUp" data-wow-delay=".5s">
				<?php  if ( !empty(esc_url($settings['image3']['id']) )) : ?>   
					<img src="<?php echo wp_get_attachment_url($settings['image3']['id']);?>" alt="<?php echo esc_attr($settings['alt_text3']);?>"/>
				<?php endif;?>
			</div>
		</div>
	</div>
</div>

<?php  elseif ( 'style3' === $settings['style'] ) : ?>
	<div class="about-wrapper-2">
		<div class="about-image">
			<div class="shape-image">
			<?php  if ( !empty(esc_url($settings['image']['id']) )) : ?>   
				<img src="<?php echo wp_get_attachment_url($settings['image']['id']);?>" alt="<?php echo esc_attr($settings['alt_text']);?>"/>
			<?php endif;?>
			</div>
			<div class="circle-shape">
			<?php  if ( !empty(esc_url($settings['image2']['id']) )) : ?>   
				<img src="<?php echo wp_get_attachment_url($settings['image2']['id']);?>" alt="<?php echo esc_attr($settings['alt_text2']);?>"/>
			<?php endif;?>
			</div>
			<?php  if ( !empty(esc_url($settings['image3']['id']) )) : ?>   
				<img src="<?php echo wp_get_attachment_url($settings['image3']['id']);?>" alt="<?php echo esc_attr($settings['alt_text3']);?>"/>
			<?php endif;?>
			<div class="video-box">
				<a href="<?php echo esc_url($settings['video_link']['url']);?>" class="video-btn ripple video-popup">
					<i class="fa-solid fa-play"></i>
				</a>
			</div>
		</div>
	</div>
<?php endif ;?>	

             
		<?php 
	}


}

Plugin::instance()->widgets_manager->register_widget_type(new About_Image());