<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Infotek
 * @since 1.0.0
 */ 
 
class Service_Sidebar_Hour extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'infotek-service-sidebar-hour-widget';
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
		return esc_html__( 'Service Sidebar Hour', 'infotek-core' );
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
			'service_sidebar_hour',
			[
				'label' => esc_html__( 'Service Sidebar Hour', 'infotek-core' ),
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

						'block_title' =>
						[
							'name' => 'block_title',
							'label' => esc_html__('Title', 'infotek-core'),
							'type' => Controls_Manager::TEXTAREA,
							'default' => esc_html__('', 'infotek-core')
						],

						'block_icons' =>
						[
							'name' => 'block_icons',
							'label' => esc_html__('Enter The icons', 'infotek-core'),
							'type' => Controls_Manager::ICONS,							
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

<div class="main-sidebar">
	<div class="single-sidebar-widget">
		<div class="wid-title">
			<h3><?php echo $settings['title'];?></h3>
		</div>
		<div class="opening-category">
			<ul>
			<?php foreach($settings['repeat'] as $item):?>	
				<li><i class="<?php echo str_replace("icon ", " ", esc_attr( $item['block_icons']['value']));?>"></i><?php echo wp_kses($item['block_title'], $allowed_tags);?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</div>

             
		<?php 
	}


}

Plugin::instance()->widgets_manager->register_widget_type(new Service_Sidebar_Hour());