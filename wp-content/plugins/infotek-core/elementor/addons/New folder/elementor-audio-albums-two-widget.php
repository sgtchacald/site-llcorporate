<?php
/**
 * Elementor Widget
 * @package infotek
 * @since 1.0.0
 */

namespace Elementor;

class Infotek_Audio_Albums_Two_Widget extends Widget_Base
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
        return 'infotek-audio-albums-two-widget';
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
        return esc_html__('Audio Albums Two', 'infotek-core');
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
        return 'eicon-person';
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
                'label' => esc_html__('Audio Settings', 'infotek-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'image', [
                'label' => esc_html__('Main Image', 'infotek-core'),
                'type' => Controls_Manager::MEDIA,
                'show_label' => false,
                'description' => esc_html__('Upload Main image', 'infotek-core'),
            ]
        );
        $repeater->add_control(
            'cat', [
                'label' => esc_html__('cat', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Harry Styles', 'infotek-core'),
                'show_label' => true,
                'description' => esc_html__('upload cat', 'infotek-core'),
            ]
        );
        $repeater->add_control(
            'title', [
                'label' => esc_html__('title', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('After Hours', 'infotek-core'),
                'show_label' => true,
                'description' => esc_html__('upload title', 'infotek-core'),
            ]
        );
        $repeater->add_control(
            'total', [
                'label' => esc_html__('total', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('20 songs', 'infotek-core'),
                'show_label' => true,
                'description' => esc_html__('upload total', 'infotek-core'),
            ]
        );
        $this->add_control('aatw_items', [
            'label' => esc_html__('aatw Item', 'infotek-core'),
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
        $aatw_items = $settings['aatw_items'];
        ?>

        <div class="audio-albums-area">
            <div class="row">
                <?php foreach ($aatw_items as $aatw_items): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="audio-albums-two mb-4">
                        <div class="thumb">
                            <img src="<?php echo $aatw_items['image']['url']; ?>" alt="img">
                            <span class="cat"><?php echo $aatw_items['cat']; ?></span>
                        </div>
                        <div class="details">
                            <div class="row">
                                <div class="col-8 align-self-center">
                                    <h5><?php echo $aatw_items['title']; ?></h5>
                                </div>
                                <div class="col-4 align-self-center text-end">
                                    <span><?php echo $aatw_items['total']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Infotek_Audio_Albums_Two_Widget());