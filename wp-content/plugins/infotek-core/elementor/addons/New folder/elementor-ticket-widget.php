<?php
/**
 * Elementor Widget
 * @package infotek
 * @since 1.0.0
 */

namespace Elementor;

class Infotek_Ticket_Widget extends Widget_Base
{

    /**
     * Get widget name.
     *
     * Retrieve Elementor widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_name()
    {
        return 'infotek-ticket';
    }

    /**
     * Get widget title.
     *
     * Retrieve Elementor widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_title()
    {
        return esc_html__('Ticket', 'infotek-core');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Elementor widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_icon()
    {
        return 'eicon-slides';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Elementor widget belongs to.
     *
     * @return array Widget categories.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_categories()
    {
        return ['infotek_widgets'];
    }

    /**
     * Register Elementor widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'slider_settings_section',
            [
                'label' => esc_html__('Slider Settings', 'infotek-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'title', [
                'label' => esc_html__('title', 'infotek-core'),
                'type' => Controls_Manager::TEXTAREA,
                'show_label' => false,
                'default' => esc_html__('One Day', 'infotek-core'),
                'description' => esc_html__('Upload title', 'infotek-core'),
            ]
        );
        $repeater->add_control(
            'amount', [
                'label' => esc_html__('amount', 'infotek-core'),
                'type' => Controls_Manager::TEXTAREA,
                'show_label' => false,
                'default' => esc_html__('30 $', 'infotek-core'),
                'description' => esc_html__('Upload amount', 'infotek-core'),
            ]
        );
        $repeater->add_control(
            'day', [
                'label' => esc_html__('day', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('pass for one day', 'infotek-core'),
            ]
        );
        $repeater->add_control(
            'btn_text', [
                'label' => esc_html__('btn text', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Buy Tickets', 'infotek-core'),
            ]
        );
        $repeater->add_control(
            'btn_url', [
                'label' => esc_html__('btn url', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('#', 'infotek-core'),
            ]
        );
        $this->add_control('ticket_items', [
            'label' => esc_html__('Testimonial Slider Item', 'infotek-core'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                    'image' => array(
                        'url' => Utils::get_placeholder_image_src()
                    )
                ]
            ],
        ]);
        $this->end_controls_section();

    }


    /**
     * Render Elementor widget output on the frontend.
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $all_ticket_items = $settings['ticket_items'];
        ?>
        <div class="ticket-area">
            <div class="container">
	            <div class="row">
	                <?php foreach ($all_ticket_items as $ticket_item): ?>
	                	<div class="col-lg-4 col-md-6">
			                <div class="single-ticket-inner mb-4">
			                	<h3 class="mb-0 title">
			                		<div class="row">
			                			<div class="col-6 align-self-center">
			                				<?php echo esc_html($ticket_item['title']); ?>
			                			</div>
			                			<div class="col-6 align-self-center text-end">
			                				<span><?php echo esc_html($ticket_item['amount']); ?></span>
			                			</div>
			                		</div>
			                	</h3>
			                	<div class="row pt-3">
			                		<div class="col-6 align-self-center">
			                			<p class="mb-0"><?php echo esc_html($ticket_item['day']); ?></p>
			                		</div>
			                		<div class="col-6 align-self-center text-end">
			                			<a class="btn btn-border-white" href="<?php echo esc_html($ticket_item['btn_url']); ?>"><?php echo esc_html($ticket_item['btn_text']); ?></a>
			                		</div>
			                	</div>
			                </div>
	               		</div>
	                <?php endforeach; ?>
	            </div>  
            </div>  
        </div>  

        <?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new Infotek_Ticket_Widget());