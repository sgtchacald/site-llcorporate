<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Infotek
 * @since 1.0.0
 */ 
 
class Testimonials extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'infotek-testimonials-widget';
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
		return esc_html__( 'Testimonials Widget', 'infotek-core' );
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
			'testimonials',
			[
				'label' => esc_html__( 'Testimonials', 'infotek-core' ),
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
			'section_class',
			[
				'label'       => __( 'Section Class', 'infotek-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Write Section Class', 'infotek-core' ),
				'condition'	=> ['style' => ['style3']],
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

						'block_bg_image' =>
						[
							'name' => 'block_bg_image',
							'label' => esc_html__('Background image', 'infotek-core'),
							'type' => Controls_Manager::MEDIA,
							'default' => ['url' => Utils::get_placeholder_image_src(),],
						],

						'block_rating' =>
						[
							'name' => 'block_rating',
							'label'   => esc_html__( 'Select Rating', 'infotek-core' ),
							'type'    => Controls_Manager::SELECT,
							'default' => 'rat1',
							'options' => array(
								'rat1'   => esc_html__( 'Rating One', 'infotek-core' ),
								'rat2'   => esc_html__( 'Rating Two', 'infotek-core' ),
								'rat3'   => esc_html__( 'Rating Three', 'infotek-core' ),
								'rat4'   => esc_html__( 'Rating Four', 'infotek-core' ),
								'rat5'   => esc_html__( 'Rating Five', 'infotek-core' ),
							),
						],

						'block_subtitle' =>
						[
							'name' => 'block_subtitle',
							'label' => esc_html__('Subtitle', 'infotek-core'),
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

						'block_text' =>
						[
							'name' => 'block_text',
							'label' => esc_html__('Text', 'infotek-core'),
							'type' => Controls_Manager::TEXTAREA,
							'default' => esc_html__('', 'infotek-core')
						],

						'block_title1' =>
						[
							'name' => 'block_title1',
							'label' => esc_html__('Title', 'infotek-core'),
							'type' => Controls_Manager::TEXTAREA,
							'default' => esc_html__('', 'infotek-core')
						],
						
						'block_subtitle1' =>
						[
							'name' => 'block_subtitle1',
							'label' => esc_html__('Subtitle', 'infotek-core'),
							'type' => Controls_Manager::TEXTAREA,
							'default' => esc_html__('', 'infotek-core')
						],

						'block_image' =>
						[
							'name' => 'block_image',
							'label' => __( 'Image', 'infotek-core' ),
							'type' => Controls_Manager::MEDIA,
							'default' => ['url' => Utils::get_placeholder_image_src(),],
						],	

						'block_alt_text' =>
						[
						'name' => 'block_alt_text',
						'label' => esc_html__('Image Text', 'infotek-core'),
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

const testimonialSlider = new Swiper(".testimonial-slider", {
	speed: 1500,
	loop: true,
	autoplay: {
		delay: 1500,
		disableOnInteraction: false,
	},
	pagination: {
		el: ".dot-2",
		clickable: true,
	},
});

const testimonialSlider2 = new Swiper(".testimonial-slider-2", {
	speed: 1500,
	loop: true,
	spaceBetween: 30,
	autoplay: {
		delay: 1500,
		disableOnInteraction: false,
	},
	navigation: {
		nextEl: ".array-prev",
		prevEl: ".array-next",
	},
	breakpoints: {
		991: {
			slidesPerView: 2,
		},
		767: {
			slidesPerView: 1,
		},

		575: {
			slidesPerView: 1,
		},

		0: {
			slidesPerView: 1,
		},
	},

});


const testimonialSlider3 = new Swiper(".testimonial-slider-3", {
	speed: 1500,
	loop: true,
	spaceBetween: 30,
	autoplay: {
		delay: 1500,
		disableOnInteraction: false,
	},
	navigation: {
		nextEl: ".array-prev",
		prevEl: ".array-next",
	},
	breakpoints: {
		1199: {
			slidesPerView: 3,
		},
		991: {
			slidesPerView: 2,
		},
		767: {
			slidesPerView: 1,
		},

		575: {
			slidesPerView: 1,
		},

		0: {
			slidesPerView: 1,
		},
	},

});

// js code end 

  });
</script>';


?>

<?php  if ( 'style1' === $settings['style'] ) : ?>	

<!--<< Testimonial Section Start >>-->
<section class="testimonial-section fix">
	<div class="container">
		<div class="testimonial-wrapper">
			<div class="swiper testimonial-slider">
				<div class="swiper-wrapper">
					<?php foreach($settings['repeat'] as $item):?>	
					<div class="swiper-slide">
						<div class="testimonial-items">
							<div class="tesimonial-image bg-cover" style="background-image: url('<?php echo wp_get_attachment_url($item['block_bg_image']['id']);?>');">
								<div class="star">
									<?php if ( 'rat1' === $item['block_rating'] ) : ?>
										<i class="fas fa-star"></i>
										<i class="far fa-star"></i>
										<i class="far fa-star"></i>
										<i class="far fa-star"></i>
										<i class="far fa-star"></i>
									<?php elseif ( 'rat2' === $item['block_rating'] ) : ?>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="far fa-star"></i>
										<i class="far fa-star"></i>
										<i class="far fa-star"></i>
									<?php elseif ( 'rat3' === $item['block_rating'] ) : ?>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="far fa-star"></i>
										<i class="far fa-star"></i>
									<?php elseif ( 'rat4' === $item['block_rating'] ) : ?>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="far fa-star"></i>
									<?php elseif ( 'rat5' === $item['block_rating'] ) : ?>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
									<?php endif; ?>
								</div>
							</div>
							<div class="testimonial-content">
								<div class="section-title">
									<span><?php echo wp_kses($item['block_subtitle'], $allowed_tags);?></span>
									<h2><?php echo wp_kses($item['block_title'], $allowed_tags);?> </h2>
								</div>
								<p class="mt-3 mt-md-0">
									<?php echo wp_kses($item['block_text'], $allowed_tags);?>
								</p>
								<div class="author-details">
									<h5><?php echo wp_kses($item['block_title1'], $allowed_tags);?></h5>
									<span><?php echo wp_kses($item['block_subtitle1'], $allowed_tags);?></span>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="swiper-dot-2">
				<div class="dot-2"></div>
			</div>
		</div>
	</div>
</section>

<?php  elseif ( 'style2' === $settings['style'] ) : ?>
	<section class="tesimonial-section-2">
            <div class="container">
                <div class="swiper testimonial-slider-2">
                    <div class="swiper-wrapper">
						<?php foreach($settings['repeat'] as $item):?>	
                        <div class="swiper-slide">
                            <div class="testimonial-box-items">
                                <div class="icon">
								<?php if(!empty(wp_get_attachment_url($item['block_image']['id']))): ?>
									<img src="<?php echo wp_get_attachment_url($item['block_image']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text'], $allowed_tags);?>">
								<?php endif;?>
                                </div>
                                <div class="client-items">
                                    <div class="client-image bg-cover" style="background-image: url('<?php echo wp_get_attachment_url($item['block_bg_image']['id']);?>');"></div>
                                    <div class="client-content">
										<h5><?php echo wp_kses($item['block_title1'], $allowed_tags);?></h5>
										<span><?php echo wp_kses($item['block_subtitle1'], $allowed_tags);?></span>
                                        <div class="star">
										<?php if ( 'rat1' === $item['block_rating'] ) : ?>
											<i class="fas fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
										<?php elseif ( 'rat2' === $item['block_rating'] ) : ?>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
										<?php elseif ( 'rat3' === $item['block_rating'] ) : ?>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
										<?php elseif ( 'rat4' === $item['block_rating'] ) : ?>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="far fa-star"></i>
										<?php elseif ( 'rat5' === $item['block_rating'] ) : ?>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
										<?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <p>
									<?php echo wp_kses($item['block_text'], $allowed_tags);?>
                                </p>
                            </div>
                        </div>
						<?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>

	<?php  elseif ( 'style3' === $settings['style'] ) : ?>

		<section class="tesimonial-section-3 <?php echo esc_attr($settings['section_class']);?>">
            <div class="array-button">
                <button class="array-prev"><i class="fal fa-arrow-left"></i></button>
                <button class="array-next"><i class="fal fa-arrow-right"></i></button>
            </div>
            <div class="container">
                <div class="swiper testimonial-slider-2">
                    <div class="swiper-wrapper">
					<?php foreach($settings['repeat'] as $item):?>	
                        <div class="swiper-slide">
                            <div class="testimonial-box-items">
                                <div class="icon">
									<?php if(!empty(wp_get_attachment_url($item['block_image']['id']))): ?>
										<img src="<?php echo wp_get_attachment_url($item['block_image']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text'], $allowed_tags);?>">
									<?php endif;?>
                                </div>
                                <div class="client-items">
                                    <div class="client-image style-2 bg-cover" style="background-image: url('<?php echo wp_get_attachment_url($item['block_bg_image']['id']);?>');"></div>
                                    <div class="client-content">
                                        <h4><?php echo wp_kses($item['block_title1'], $allowed_tags);?></h4>
                                        <p><?php echo wp_kses($item['block_subtitle1'], $allowed_tags);?></p>
                                        <div class="star">
										<?php if ( 'rat1' === $item['block_rating'] ) : ?>
											<i class="fas fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
										<?php elseif ( 'rat2' === $item['block_rating'] ) : ?>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
										<?php elseif ( 'rat3' === $item['block_rating'] ) : ?>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
										<?php elseif ( 'rat4' === $item['block_rating'] ) : ?>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="far fa-star"></i>
										<?php elseif ( 'rat5' === $item['block_rating'] ) : ?>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
										<?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <p>
									<?php echo wp_kses($item['block_text'], $allowed_tags);?>
                                </p>
                            </div>
                        </div>
						<?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>

		<?php  elseif ( 'style4' === $settings['style'] ) : ?>

			<div class="testimonial-wrapper-2">
					<div class="tesimonial-area">
						<div class="swiper testimonial-slider-3">
							<div class="swiper-wrapper">
							<?php foreach($settings['repeat'] as $item):?>	
								<div class="swiper-slide">
									<div class="tesimonial-card-items">
										<div class="icon">
										<?php if(!empty(wp_get_attachment_url($item['block_image']['id']))): ?>
										<img src="<?php echo wp_get_attachment_url($item['block_image']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text'], $allowed_tags);?>">
										<?php endif;?>
										</div>
										<div class="star">
										<?php if ( 'rat1' === $item['block_rating'] ) : ?>
											<i class="fas fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
										<?php elseif ( 'rat2' === $item['block_rating'] ) : ?>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
										<?php elseif ( 'rat3' === $item['block_rating'] ) : ?>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
										<?php elseif ( 'rat4' === $item['block_rating'] ) : ?>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="far fa-star"></i>
										<?php elseif ( 'rat5' === $item['block_rating'] ) : ?>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
										<?php endif; ?>
										</div>
										<p>
											<?php echo wp_kses($item['block_text'], $allowed_tags);?>
										</p>
										<div class="client-info-items">
											<div class="thumb">
												<img src="<?php echo wp_get_attachment_url($item['block_bg_image']['id']);?>" alt="img">
											</div>
											<div class="content">
											<h4><?php echo wp_kses($item['block_title1'], $allowed_tags);?></h4>
                                        	<p><?php echo wp_kses($item['block_subtitle1'], $allowed_tags);?></p>
											</div>
										</div>
									</div>
								</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
                </div>

<?php endif ;?>	

             
		<?php 
	}


}

Plugin::instance()->widgets_manager->register_widget_type(new Testimonials());