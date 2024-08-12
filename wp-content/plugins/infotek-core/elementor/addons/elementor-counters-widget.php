<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Infotek
 * @since 1.0.0
 */ 
 
class Counters extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'infotek-counters-widget';
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
		return esc_html__( 'Counters Widgets', 'infotek-core' );
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
			'counters',
			[
				'label' => esc_html__( 'Counters Widgets', 'infotek-core' ),
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
			'section_class',
			[
				'label'       => __( 'Section Class', 'infotek-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Section Class', 'infotek-core' ),
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

						'block_title' =>
						[
							'name' => 'block_title',
							'label' => esc_html__('Title', 'infotek-core'),
							'type' => Controls_Manager::TEXTAREA,
							'default' => esc_html__('', 'infotek-core')
						],

						'block_title1' =>
						[
							'name' => 'block_title1',
							'label' => esc_html__('Suffix', 'infotek-core'),
							'type' => Controls_Manager::TEXTAREA,
							'default' => esc_html__('', 'infotek-core')
						],

						'block_subtitle' =>
						[
							'name' => 'block_subtitle',
							'label' => esc_html__('Subtitle', 'infotek-core'),
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

<?php  if ( 'style1' === $settings['style'] ) : ?>	

<!-- Achievement Section Start -->
<section class="achievement-section fix <?php echo esc_attr($settings['section_class']);?>">
	<div class="container">
		<div class="achievement-wrapper">
			<div class="section-title mb-0">
				<span class="text-white wow fadeInUp"><?php echo $settings['subtitle'];?></span>
				<h2 class="text-white wow fadeInUp" data-wow-delay=".3s">
					<?php echo $settings['title'];?>
				</h2>
			</div>
			<div class="counter-area">
				<?php foreach($settings['repeat'] as $item):?>	
				<div class="counter-items wow fadeInUp" data-wow-delay=".3s">
					<div class="icon">
					<img src="<?php echo wp_get_attachment_url($item['block_image']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text'], $allowed_tags);?>">
					</div>
					<div class="content">
						<h2><span class="count"><?php echo wp_kses($item['block_title'], $allowed_tags);?></span><?php echo wp_kses($item['block_title1'], $allowed_tags);?></h2>
						<p><?php echo wp_kses($item['block_subtitle'], $allowed_tags);?></p>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>

<?php  elseif ( 'style2' === $settings['style'] ) : ?>

	<section class="achievement-section-2 fix <?php echo esc_attr($settings['section_class']);?>">
		<div class="container">
			<div class="achievement-wrapper style-2">
				<div class="section-title mb-0">
					<span class="text-white wow fadeInUp"><?php echo $settings['subtitle'];?></span>
					<h2 class="text-white wow fadeInUp" data-wow-delay=".3s">
						<?php echo $settings['title'];?>
					</h2>
				</div>
				<div class="counter-area">
					<?php foreach($settings['repeat'] as $item):?>	
					<div class="counter-items wow fadeInUp" data-wow-delay=".3s">
						<div class="icon">
							<img src="<?php echo wp_get_attachment_url($item['block_image']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text'], $allowed_tags);?>">
						</div>
						<div class="content">
							<h2><span class="count"><?php echo wp_kses($item['block_title'], $allowed_tags);?></span><?php echo wp_kses($item['block_title1'], $allowed_tags);?></h2>
							<p><?php echo wp_kses($item['block_subtitle'], $allowed_tags);?></p>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>

<?php endif ;?>	

             
		<?php 
	}


}

Plugin::instance()->widgets_manager->register_widget_type(new Counters());