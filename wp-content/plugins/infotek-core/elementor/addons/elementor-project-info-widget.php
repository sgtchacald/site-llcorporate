<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Infotek
 * @since 1.0.0
 */ 
 
class Project_Info extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'infotek-project-info-widget';
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
		return esc_html__( 'Project Info', 'infotek-core' );
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
			'project_info',
			[
				'label' => esc_html__( 'Project Info', 'infotek-core' ),
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

						'block_title2' =>
						[
							'name' => 'block_title2',
							'label' => esc_html__('Title 2', 'infotek-core'),
							'type' => Controls_Manager::TEXTAREA,
							'default' => esc_html__('', 'infotek-core')
						],
						
					],
				'title_field' => '{{block_title}}',
			 ]
	);

	$this->add_control(
		'repeat_1', 
		  [
			  'type' => Controls_Manager::REPEATER,
			  'separator' => 'before',
			  'default' => 
				  [
					  ['block_title_1' => esc_html__('Projects Completed', 'infotek-core')],
				  ],
			  'fields' => 
				  [						

					  'block_icons' =>

					  [
						'name' => 'block_icons',
						'label' => esc_html__('Enter The icons', 'infotek-core'),
						'type' => Controls_Manager::ICONS,							
					],

						'block_button_link' =>
					[
						'name' => 'block_button_link',
						'label' => __( 'Link Url', 'infotek-core' ),
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
			  'title_field' => '{{block_title_1}}',
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

<div class="project-details-wrapper">
	<div class="project-details-items">
		<div class="project-catagory">
			<h3>Project Info: </h3>
			<ul>
				<?php foreach($settings['repeat'] as $item):?>	
				<li>
				<?php echo wp_kses($item['block_title'], $allowed_tags);?>
					<span><?php echo wp_kses($item['block_title2'], $allowed_tags);?></span>
				</li>
				<?php endforeach; ?>
				<li>
					Share:
					<span>
						<?php foreach($settings['repeat_1'] as $item):?>	
							<a href="<?php echo esc_url($item['block_button_link']['url']);?>"><i class="<?php echo str_replace("icon ", " ", esc_attr( $item['block_icons']['value']));?> me-3"></i></a>
						<?php endforeach; ?>
					</span>
				</li>
			</ul>
		</div>
	</div>            
</div>

             
	<?php 
}


}

Plugin::instance()->widgets_manager->register_widget_type(new Project_Info());