<?php
/**
 * Elementor Widget
 * @package Infotek
 * @since 1.0.0
 */

namespace Elementor;
class Infotek_Counter_Two_Widget extends Widget_Base
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
        return 'infotek-counter-two-widget';
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
        return esc_html__('Counter two', 'infotek-core');
    }

    public function get_keywords()
    {
        return ['Section', 'Counter', 'Title', "Creationic", 'Infotek'];
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
        return 'eicon-counter';
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
            'counter_one_content_settings_section',
            [
                'label' => esc_html__('Content Settings', 'infotek-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'counter_one_bg_img',
            [
                'label' => esc_html__('counter one bg img', 'infotek-core'),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'counter_one_title',
            [
                'label' => esc_html__('Title', 'infotek-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('200', 'infotek-core'),
            ]
        );
        $repeater->add_control(
            'counter_one_subtitle',
            [
                'label' => esc_html__('Sub Title', 'infotek-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Team member', 'infotek-core'),
                'description' => esc_html__('Happy <br> Customer', 'infotek-core'),
            ]
        );
        $this->add_control('counter_items', [
            'label' => esc_html__('counter Items', 'infotek-core'),
            'fields' => $repeater->get_controls(),
            'type' => Controls_Manager::REPEATER,
        ]);
        $this->end_controls_section();

        //Style tab style
        $this->start_controls_section(
            'style_settings_section',
            [
                'label' => esc_html__('Style Settings', 'infotek-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->end_controls_section();
    }

    /**
     * Render Elementor widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $counter_items = $settings['counter_items'];
        ?>

        <div class="counter-area">
            <div class="container">
                <div class="counter__inner">
                    <div class="row justify-content-center">
                        <div class="col-12 col-xxl-11">
                            <div class="row gaper">
                                <?php foreach ($counter_items as $item) { ?>
                                    <div class="col-12 col-md-6 col-xxl-3">
                                        <div class="counter__single text-center">
                                            <img class="bg_img" src="<?php echo $settings['counter_one_bg_img']['url']; ?>" alt="img">
                                            <p class="title-sm text-quaternary"><?php echo $item['counter_one_subtitle']; ?></p>
                                            <h2 class="title-xl">
                                                <span class="counter"><?php echo $item['counter_one_title']; ?></span>
                                            </h2>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new Infotek_Counter_Two_Widget());