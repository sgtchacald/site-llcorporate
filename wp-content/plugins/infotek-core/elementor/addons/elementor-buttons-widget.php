<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Infotek
 * @since 1.0.0
 */ 
 
class Buttons extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'infotek-buttons-widget';
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
		return esc_html__( 'Buttons', 'infotek-core' );
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
			'buttons',
			[
				'label' => esc_html__( 'Buttons', 'infotek-core' ),
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
			'button',
			[
				'label'       => __( 'Button', 'infotek-core' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => esc_html__( 'Enter your button text', 'infotek-core' ),
				'default' => esc_html__('Read More', 'infotek-core'),
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

	<a href="<?php echo esc_url($settings['button_link']['url']);?>" class="theme-btn">
		<?php echo $settings['button'];?>
		<i class="fa-solid fa-arrow-right-long"></i>
	</a>

<?php  elseif ( 'style2' === $settings['style'] ) : ?>

	<a href="<?php echo esc_url($settings['button_link']['url']);?>" class="theme-btn bg-white">
		<?php echo $settings['button'];?>
		<i class="fa-solid fa-arrow-right-long"></i>
	</a>

<?php  elseif ( 'style3' === $settings['style'] ) : ?>

	<div class="section-title-area">
		<div class="video-box">
			<a href="<?php echo esc_url($settings['button_link']['url']);?>" class="video-btn ripple video-popup">
				<i class="fa-solid fa-play"></i>
			</a>
		</div>
	</div>

<?php endif ;?>	

             
		<?php 
	}


}

Plugin::instance()->widgets_manager->register_widget_type(new Buttons());