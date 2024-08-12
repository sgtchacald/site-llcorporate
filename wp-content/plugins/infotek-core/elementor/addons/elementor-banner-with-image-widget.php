<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Infotek
 * @since 1.0.0
 */ 
 
class Banner_With_Image extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'infotek-banner-with-image-widget';
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
		return esc_html__( 'Banner With Image', 'infotek-core' );
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
			'banner_with_image',
			[
				'label' => esc_html__( 'Banner Widgets', 'infotek-core' ),
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
			'bg_image',
			[
				'label' => esc_html__('Background image', 'infotek-core'),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
				'condition'	=> ['style' => ['style1','style2','style3']],
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
				'condition'	=> ['style' => ['style1','style2','style3']],
			]
		);

		$this->add_control(
			'image',
				[
				  'label' => __( 'Image', 'infotek-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  'condition'	=> ['style' => ['style1','style2','style3']],
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
				'condition'	=> ['style' => ['style1','style2','style3']],
			]
		);

		$this->add_control(
			'image2',
				[
				  'label' => __( 'Image 2', 'infotek-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  'condition'	=> ['style' => ['style1','style2']],
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
				'condition'	=> ['style' => ['style1','style2']],
			]
		);

		$this->add_control(
			'image3',
				[
				  'label' => __( 'Image 3', 'infotek-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  'condition'	=> ['style' => ['style1','style2']],
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
				'condition'	=> ['style' => ['style1','style2']],
			]
		);

		$this->add_control(
			'image4',
				[
				  'label' => __( 'Image 4', 'infotek-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  'condition'	=> ['style' => ['style1','style2']],
				]
		);	
		
		$this->add_control(
			'alt_text4',
			[
				'label'       => __( 'Alt text 4', 'infotek-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Your Text', 'infotek-core' ),
				'condition'	=> ['style' => ['style1','style2']],
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
				'condition'	=> ['style' => ['style1','style2','style3']],
			]
		);

		$this->add_control(
			'title1',
			[
				'label'       => __( 'Title', 'infotek-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your title', 'infotek-core' ),
				'condition'	=> ['style' => ['style1']],
			]
		);

		$this->add_control(
			'text',
			[
				'label'       => __( 'Description Text', 'infotek-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Your Text', 'infotek-core' ),
				'condition'	=> ['style' => ['style1','style2','style3']],
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
				'condition'	=> ['style' => ['style1','style2','style3']],
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
			  'condition'	=> ['style' => ['style1','style2','style3']],
			
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
			  'condition'	=> ['style' => ['style1','style2','style3']],
			
		   ]
		);	

		$this->add_control(
			'subtitle1',
			[
				'label'       => __( 'Sub Title', 'infotek-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your sub title', 'infotek-core' ),
				'condition'	=> ['style' => ['style1','style2','style3']],
			]
		);

		$this->add_control(
			'image5',
				[
				  'label' => __( 'Image 5', 'infotek-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  'condition'	=> ['style' => ['style1','style2']],
				]
		);	
		
		$this->add_control(
			'alt_text5',
			[
				'label'       => __( 'Alt text 5', 'infotek-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Your Text', 'infotek-core' ),
				'condition'	=> ['style' => ['style1','style2']],
			]
		);

		
		$this->add_control(
			'image6',
				[
				  'label' => __( 'Image 6', 'infotek-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  'condition'	=> ['style' => ['style2']],
				]
		);	
		
		$this->add_control(
			'alt_text6',
			[
				'label'       => __( 'Alt text 6', 'infotek-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Your Text', 'infotek-core' ),
				'condition'	=> ['style' => ['style2']],
			]
		);

		$this->add_control(
			'image7',
				[
				  'label' => __( 'Image 7', 'infotek-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  'condition'	=> ['style' => ['style2']],
				]
		);	
		
		$this->add_control(
			'alt_text7',
			[
				'label'       => __( 'Alt text 7', 'infotek-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Your Text', 'infotek-core' ),
				'condition'	=> ['style' => ['style2']],
			]
		);

		$this->add_control(
			'image8',
				[
				  'label' => __( 'Image 8', 'infotek-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  'condition'	=> ['style' => ['style2']],
				]
		);	
		
		$this->add_control(
			'alt_text8',
			[
				'label'       => __( 'Alt text 8', 'infotek-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Your Text', 'infotek-core' ),
				'condition'	=> ['style' => ['style2']],
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

<!-- Hero Section Start -->
<section class="hero-section fix hero-1 bg-cover" style="background-image: url('<?php echo wp_get_attachment_url($settings['bg_image']['id']);?>');">
	<div class="text-transparent">
		<h2><?php echo $settings['title'];?></h2>
	</div>
	<div class="line-shape">
	<?php  if ( !empty(esc_url($settings['image']['id']) )) : ?>   
		<img src="<?php echo wp_get_attachment_url($settings['image']['id']);?>" alt="<?php echo esc_attr($settings['alt_text']);?>"/>
	<?php endif;?>
	</div>
	<div class="dot-shape">
	<?php  if ( !empty(esc_url($settings['image2']['id']) )) : ?>   
		<img src="<?php echo wp_get_attachment_url($settings['image2']['id']);?>" alt="<?php echo esc_attr($settings['alt_text2']);?>"/>
	<?php endif;?>
	</div>
	<div class="frame-shape">
	<?php  if ( !empty(esc_url($settings['image3']['id']) )) : ?>   
		<img src="<?php echo wp_get_attachment_url($settings['image3']['id']);?>" alt="<?php echo esc_attr($settings['alt_text3']);?>"/>
	<?php endif;?>
	</div>
	<div class="mask-shape wow fadeInRight" data-wow-delay=".7s">
	<?php  if ( !empty(esc_url($settings['image4']['id']) )) : ?>   
		<img src="<?php echo wp_get_attachment_url($settings['image4']['id']);?>" alt="<?php echo esc_attr($settings['alt_text4']);?>"/>
	<?php endif;?>
	</div>
	<div class="container">
		<div class="row g-4 align-items-center">
			<div class="col-lg-8">
				<div class="hero-content">
					<div class="hero-subtitle">
						<svg width="40" height="16" viewBox="0 0 40 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<rect x="0.5" y="0.5" width="25.6667" height="15" rx="7.5" stroke="#384BFF"/>
							<rect x="13.3334" width="26.6667" height="16" rx="8" fill="#384BFF"/>
						</svg>
						<h6 class="wow fadeInUp" data-wow-delay=".2s"><?php echo $settings['subtitle'];?></h6>
					</div>
					<h1 class="wow fadeInUp" data-wow-delay=".4s">
						<?php echo $settings['title1'];?>
					</h1>
					<p class="wow fadeInUp" data-wow-delay=".6s">
						<?php echo $settings['text'];?>
					</p>
					<div class="hero-button">
						<a href="<?php echo esc_url($settings['button_link']['url']);?>" class="theme-btn wow fadeInUp" data-wow-delay=".8s">
						<?php echo $settings['button'];?>
							<i class="fa-solid fa-arrow-right-long"></i>
						</a>
						<span class="button-text wow fadeInUp" data-wow-delay=".9s">
							<a href="<?php echo esc_url($settings['video_link']['url']);?>" class="video-btn ripple video-popup">
								<i class="fa-solid fa-play"></i>
							</a>
							<span class="ms-4 d-line"><?php echo $settings['subtitle1'];?></span>
						</span>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="hero-image wow fadeInUp" data-wow-delay=".4s">
				<?php  if ( !empty(esc_url($settings['image5']['id']) )) : ?>   
					<img src="<?php echo wp_get_attachment_url($settings['image5']['id']);?>" alt="<?php echo esc_attr($settings['alt_text5']);?>"/>
				<?php endif;?>
				</div>
			</div>
		</div>
	</div>
</section>


<?php  elseif ( 'style2' === $settings['style'] ) : ?>

    <section class="hero-section fix hero-1 hero-2 bg-cover" style="background-image: url('<?php echo wp_get_attachment_url($settings['bg_image']['id']);?>');">
		<div class="line-shape-2">
		<?php  if ( !empty(esc_url($settings['image']['id']) )) : ?>   
			<img src="<?php echo wp_get_attachment_url($settings['image']['id']);?>" alt="<?php echo esc_attr($settings['alt_text']);?>"/>
		<?php endif;?>
		</div>
		<div class="right-shape">
		<?php  if ( !empty(esc_url($settings['image2']['id']) )) : ?>   
			<img src="<?php echo wp_get_attachment_url($settings['image2']['id']);?>" alt="<?php echo esc_attr($settings['alt_text2']);?>"/>
		<?php endif;?>
		</div>
		<div class="left-shape">
		<?php  if ( !empty(esc_url($settings['image3']['id']) )) : ?>   
			<img src="<?php echo wp_get_attachment_url($settings['image3']['id']);?>" alt="<?php echo esc_attr($settings['alt_text3']);?>"/>
		<?php endif;?>
		</div>
		<div class="frame-2">
		<?php  if ( !empty(esc_url($settings['image4']['id']) )) : ?>   
			<img src="<?php echo wp_get_attachment_url($settings['image4']['id']);?>" alt="<?php echo esc_attr($settings['alt_text4']);?>"/>
		<?php endif;?>
		</div>
		<div class="frame-3">
		<?php  if ( !empty(esc_url($settings['image5']['id']) )) : ?>   
			<img src="<?php echo wp_get_attachment_url($settings['image5']['id']);?>" alt="<?php echo esc_attr($settings['alt_text5']);?>"/>
		<?php endif;?>
		</div>
		<div class="circle-shape">
		<?php  if ( !empty(esc_url($settings['image6']['id']) )) : ?>   
			<img src="<?php echo wp_get_attachment_url($settings['image6']['id']);?>" alt="<?php echo esc_attr($settings['alt_text6']);?>"/>
		<?php endif;?>
		</div>
		<div class="container">
			<div class="row g-4 align-items-center">
				<div class="col-lg-8">
					<div class="hero-content">
						<div class="hero-subtitle">
							<svg width="40" height="16" viewBox="0 0 40 16" fill="none" xmlns="http://www.w3.org/2000/svg">
								<rect x="0.5" y="0.5" width="25.6667" height="15" rx="7.5" stroke="#384BFF"/>
								<rect x="13.3334" width="26.6667" height="16" rx="8" fill="#384BFF"/>
							</svg>
							<h6 class="wow fadeInUp" data-wow-delay=".2s"><?php echo $settings['subtitle'];?></h6>
						</div>
						<h1 class="wow fadeInUp" data-wow-delay=".4s"><?php echo $settings['title'];?>
						</h1>
						<p class="wow fadeInUp" data-wow-delay=".6s">
							<?php echo $settings['text'];?>
						</p>
						<div class="hero-button">
							<a href="<?php echo esc_url($settings['button_link']['url']);?>" class="theme-btn wow fadeInUp" data-wow-delay=".8s">
								<?php echo $settings['button'];?>
								<i class="fa-solid fa-arrow-right-long"></i>
							</a>
							<span class="button-text wow fadeInUp" data-wow-delay=".9s">
								<a href="<?php echo esc_url($settings['video_link']['url']);?>" class="video-btn ripple video-popup">
									<i class="fa-solid fa-play"></i>
								</a>
								<span class="ms-4 d-line"><?php echo $settings['subtitle1'];?></span>
							</span>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="hero-image wow fadeInUp" data-wow-delay=".4s">
					<?php  if ( !empty(esc_url($settings['image7']['id']) )) : ?>   
						<img src="<?php echo wp_get_attachment_url($settings['image7']['id']);?>" alt="<?php echo esc_attr($settings['alt_text7']);?>"/>
					<?php endif;?>
						<div class="border-circle">
						<?php  if ( !empty(esc_url($settings['image8']['id']) )) : ?>   
							<img src="<?php echo wp_get_attachment_url($settings['image8']['id']);?>" alt="<?php echo esc_attr($settings['alt_text8']);?>"/>
						<?php endif;?>
						</div>
						<div class="icon">
							<svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M39.3158 40.3529H37.4385V21.8553C37.4385 21.6957 37.3751 21.5427 37.2623 21.4299C37.1495 21.3171 36.9965 21.2537 36.837 21.2537H32.0246C31.8651 21.2537 31.7121 21.3171 31.5993 21.4299C31.4864 21.5427 31.4231 21.6957 31.4231 21.8553V40.3529H29.4025V25.5461C29.4025 25.3866 29.3391 25.2336 29.2263 25.1208C29.1135 25.0079 28.9605 24.9446 28.8009 24.9446H23.9885C23.829 24.9446 23.676 25.0079 23.5632 25.1208C23.4503 25.2336 23.387 25.3866 23.387 25.5461V40.3529H21.3664V29.2369C21.3664 29.0773 21.303 28.9243 21.1902 28.8115C21.0774 28.6987 20.9244 28.6353 20.7648 28.6353H15.9525C15.793 28.6353 15.64 28.6987 15.5271 28.8115C15.4143 28.9243 15.351 29.0773 15.351 29.2369V40.3529H13.3304V32.9278C13.3304 32.7683 13.267 32.6153 13.1542 32.5024C13.0414 32.3896 12.8884 32.3263 12.7288 32.3263H7.91641C7.75687 32.3263 7.60386 32.3896 7.49105 32.5024C7.37823 32.6153 7.31485 32.7683 7.31485 32.9278V40.3529H5.43755C5.278 40.3529 5.12499 40.4163 5.01218 40.5291C4.89936 40.6419 4.83598 40.7949 4.83598 40.9545V43.0547C4.83598 43.2142 4.89936 43.3672 5.01218 43.4801C5.12499 43.5929 5.278 43.6562 5.43755 43.6562H39.3157C39.4753 43.6562 39.6283 43.5929 39.7411 43.4801C39.8539 43.3672 39.9173 43.2142 39.9173 43.0547V40.9545C39.9173 40.7949 39.8539 40.6419 39.7411 40.5291C39.6283 40.4163 39.4753 40.3529 39.3157 40.3529H39.3158ZM32.6262 22.4568H36.2354V40.3529H32.6262V22.4568ZM24.5902 26.1477H28.1995V40.3529H24.5902V26.1477ZM16.5542 29.8385H20.1634V40.353H16.5542V29.8385ZM8.51815 33.5294H12.1274V40.3529H8.51815V33.5294ZM38.7144 42.4532H6.0392V41.5561H38.7143V42.4532H38.7144ZM21.6084 24.3417C21.7194 24.4585 21.8604 24.5426 22.0159 24.5848C22.1714 24.627 22.3355 24.6257 22.4903 24.581C22.6453 24.5369 22.7852 24.451 22.8948 24.3328C23.0044 24.2146 23.0793 24.0685 23.1115 23.9106L24.2903 18.1831C24.3497 17.8937 24.2663 17.6058 24.0611 17.3928C23.8559 17.18 23.5711 17.0863 23.2798 17.1351L17.5572 18.0961C17.3991 18.1224 17.2511 18.1915 17.1293 18.2957C17.0075 18.3999 16.9164 18.5354 16.8659 18.6876C16.8151 18.8397 16.8068 19.0027 16.8418 19.1591C16.8768 19.3156 16.9538 19.4595 17.0645 19.5754L17.7918 20.3381C16.0692 21.9719 9.41731 27.9914 1.48322 31.4253C1.34929 31.4832 1.24099 31.5879 1.17852 31.7198C1.11604 31.8517 1.10364 32.0018 1.14363 32.1422C1.18361 32.2825 1.27326 32.4036 1.39586 32.4827C1.51846 32.5619 1.66567 32.5938 1.81004 32.5725C10.6327 31.2692 16.5693 27.0982 20.7868 23.4798L21.6085 24.3417H21.6084ZM6.29443 30.3577C11.9213 27.1721 16.7614 23.0701 19.0635 20.7823C19.1751 20.6713 19.2388 20.5211 19.2409 20.3637C19.243 20.2063 19.1834 20.0544 19.0748 19.9405L18.3522 19.1825L23.0176 18.399L22.0567 23.0682L21.262 22.2347C21.1551 22.1225 21.009 22.056 20.8542 22.0489C20.6995 22.0417 20.5479 22.0946 20.4312 22.1965C17.0857 25.1147 12.5921 28.4939 6.29443 30.3577ZM34.4307 0.34375C29.7718 0.34375 25.9814 4.13411 25.9814 8.79313C25.9814 9.91977 26.1983 11.0078 26.6258 12.0339L23.4623 15.1974C23.3877 15.2721 23.3341 15.3651 23.3068 15.4671C23.2795 15.5691 23.2795 15.6765 23.3068 15.7785C23.3341 15.8804 23.3878 15.9734 23.4625 16.0481C23.5371 16.1228 23.63 16.1765 23.732 16.2039L25.6542 16.7189L25.5236 16.8494C25.4108 16.9622 25.3475 17.1153 25.3475 17.2748C25.3475 17.4343 25.4109 17.5874 25.5237 17.7002C25.6365 17.813 25.7895 17.8763 25.9491 17.8763C26.1086 17.8763 26.2616 17.8129 26.3744 17.7001L26.505 17.5696L27.02 19.4917C27.0473 19.5938 27.101 19.6868 27.1756 19.7615C27.2503 19.8362 27.3433 19.8899 27.4453 19.9172C27.5473 19.9446 27.6547 19.9446 27.7567 19.9172C27.8587 19.8899 27.9517 19.8362 28.0264 19.7615L31.1899 16.5981C32.216 17.0255 33.3041 17.2424 34.4307 17.2424C39.0897 17.2424 42.8801 13.4521 42.8801 8.79313C42.8801 4.1342 39.0897 0.34375 34.4307 0.34375ZM25.0498 15.3114L27.7808 12.5803L29.3675 13.0055L26.6364 15.7366L25.0497 15.3114H25.0498ZM32.9671 8.79313C32.9671 7.98609 33.6237 7.32952 34.4307 7.32952C35.2378 7.32952 35.8944 7.98609 35.8944 8.79313C35.8944 9.60016 35.2378 10.2567 34.4307 10.2567C34.2486 10.2567 34.0748 10.2218 33.9139 10.1607L34.8561 9.21852C34.9671 9.10532 35.0288 8.95291 35.0281 8.79441C35.0273 8.63591 34.9639 8.48413 34.8519 8.37205C34.7398 8.25997 34.588 8.19666 34.4295 8.19587C34.271 8.19507 34.1186 8.25687 34.0054 8.36782L33.0632 9.31004C33 9.14504 32.9675 8.96989 32.9672 8.79321L32.9671 8.79313ZM33.02 11.0547C33.4427 11.3199 33.9317 11.4604 34.4307 11.4599C35.9012 11.4599 37.0975 10.2636 37.0975 8.79321C37.0975 7.32282 35.9012 6.12648 34.4307 6.12648C32.9602 6.12648 31.764 7.32282 31.764 8.79321C31.7635 9.29224 31.904 9.78126 32.1693 10.204L30.9571 11.4161C30.4045 10.686 30.0759 9.77737 30.0759 8.79313C30.0759 6.39177 32.0295 4.43816 34.4308 4.43816C36.8321 4.43816 38.7858 6.39177 38.7858 8.79313C38.7858 11.1945 36.8321 13.148 34.4308 13.148C33.4466 13.148 32.5379 12.8195 31.8078 12.2668L33.02 11.0547ZM27.9124 18.1741L27.4872 16.5873L30.2183 13.8562L30.6435 15.443L27.9124 18.1741ZM34.4307 16.0393C33.5596 16.0393 32.7157 15.8882 31.9139 15.5904C31.912 15.5487 31.9059 15.5074 31.8955 15.4671L31.3451 13.4134C32.2575 14.0258 33.3318 14.3523 34.4306 14.3511C37.4953 14.3511 39.9887 11.8578 39.9887 8.79313C39.9887 5.72842 37.4953 3.23503 34.4306 3.23503C31.3659 3.23503 28.8726 5.72842 28.8726 8.79313C28.8714 9.89202 29.1979 10.9663 29.8104 11.8787L27.7566 11.3284C27.7163 11.318 27.675 11.3118 27.6334 11.31C27.3355 10.508 27.1845 9.66419 27.1845 8.79313C27.1845 4.79755 30.435 1.54688 34.4306 1.54688C38.4262 1.54688 41.6769 4.79755 41.6769 8.79313C41.6769 12.7887 38.4262 16.0393 34.4306 16.0393H34.4307Z" fill="#384BFF"/>
								</svg>                                    
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<?php  elseif ( 'style3' === $settings['style'] ) : ?>

		<section class="hero-section hero-4 bg-cover" style="background-image: url('<?php echo wp_get_attachment_url($settings['bg_image']['id']);?>');">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        <div class="hero-content">
                            <h6 class="wow fadeInUp"><?php echo $settings['subtitle'];?></h6>
                            <h1 class="wow fadeInUp" data-wow-delay=".3s"><?php echo $settings['title'];?></h1>
                            <p class="wow fadeInUp" data-wow-delay=".5s">
								<?php echo $settings['text'];?>
                            </p>
                            <div class="hero-button">
                                <a href="<?php echo esc_url($settings['button_link']['url']);?>" class="theme-btn wow fadeInUp" data-wow-delay=".7s">
									<?php echo $settings['button'];?>
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                                <span class="button-text wow fadeInUp" data-wow-delay=".9s">
                                    <a href="<?php echo esc_url($settings['video_link']['url']);?>" class="video-btn ripple video-popup">
                                        <i class="fa-solid fa-play"></i>
                                    </a>
                                    <span class="ms-4 d-line"><?php echo $settings['subtitle1'];?></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay=".4s">
                        <div class="hero-image">
						<?php  if ( !empty(esc_url($settings['image']['id']) )) : ?>   
							<img src="<?php echo wp_get_attachment_url($settings['image']['id']);?>" alt="<?php echo esc_attr($settings['alt_text']);?>"/>
						<?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php endif ;?>	

             
		<?php 
	}


}

Plugin::instance()->widgets_manager->register_widget_type(new Banner_With_Image());