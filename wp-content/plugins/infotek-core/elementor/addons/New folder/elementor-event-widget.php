<?php
/**
 * Elementor Widget
 * @package infotek
 * @since 1.0.0
 */

namespace Elementor;

class Infotek_Event_Widget extends Widget_Base
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
        return 'infotek-event';
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
        return esc_html__('Event', 'infotek-core');
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
            'time', [
                'label' => esc_html__('time', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'show_label' => false,
                'default' => esc_html__('18:00 - 19:00 pm', 'infotek-core'),
                'description' => esc_html__('Upload time', 'infotek-core'),
            ]
        );
        $repeater->add_control(
            'title', [
                'label' => esc_html__('title', 'infotek-core'),
                'type' => Controls_Manager::TEXTAREA,
                'show_label' => false,
                'default' => esc_html__('Harmonious Haven: A Jazz Soiree', 'infotek-core'),
                'description' => esc_html__('Upload title', 'infotek-core'),
            ]
        );
        $repeater->add_control(
            'song_name', [
                'label' => esc_html__('song Name', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Jhon Suria', 'infotek-core'),
                'show_label' => true,
                'description' => esc_html__('upload song name', 'infotek-core'),
            ]
        );
        $repeater->add_control(
            'artist_name', [
                'label' => esc_html__('artist Name', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Jhon Suria', 'infotek-core'),
                'show_label' => true,
                'description' => esc_html__('upload artist_name', 'infotek-core'),
            ]
        );
        $repeater->add_control(
            'location', [
                'label' => esc_html__('location', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Marketing Coordinator', 'infotek-core'),
                'description' => esc_html__('upload location', 'infotek-core'),
            ]
        );
        $repeater->add_control(
            'club_name', [
                'label' => esc_html__('club name', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Marketing Coordinator', 'infotek-core'),
                'description' => esc_html__('upload club name', 'infotek-core'),
            ]
        );
        $repeater->add_control(
            'url', [
                'label' => esc_html__('url', 'infotek-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('#', 'infotek-core'),
            ]
        );
        $this->add_control('event_items', [
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
        $all_event_items = $settings['event_items'];
        ?>
        <div class="event-area">
            <div class="container">
                <?php foreach ($all_event_items as $event_item): ?>
                <div class="single-event-inner">
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <p class="time"><?php echo esc_html($event_item['time']); ?></p>
                            <h3 class="mb-0 title"><?php echo esc_html($event_item['title']); ?></h3>
                        </div>
                        <div class="col-lg-2 align-self-center mt-lg-0 mt-4">
                            <h5 class="mb-0 song_name"><?php echo esc_html($event_item['song_name']); ?></h5>
                            <p class="mb-0 artist_name"><?php echo esc_html($event_item['artist_name']); ?></p>
                        </div>
                        <div class="col-lg-2 align-self-center mt-lg-0 mt-4">
                            <h5 class="mb-0 location"><?php echo esc_html($event_item['location']); ?></h5>
                            <p class="mb-0 club_name"><?php echo esc_html($event_item['club_name']); ?></p>
                        </div>
                        <div class="col-lg-2 align-self-center text-lg-end mt-lg-0 mt-4">
                            <a class="right_arrow" href="<?php echo esc_html($event_item['url']); ?>"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>  
        </div>  

        <?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new Infotek_Event_Widget());