<?php
/**
 * Elementor Widget
 * @package Infotek
 * @since 1.0.0
 */

namespace Elementor;
class Infotek_Scroll_Item_One extends Widget_Base
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
        return 'infotek-scroll-item-widget';
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
        return esc_html__('Scroll Item 01', 'infotek-core');
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
        return 'eicon-editor-list-ul';
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
            'settings_section',
            [
                'label' => esc_html__('General Settings', 'infotek-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'list_style',
            [
                'label' => esc_html__('List Style', 'infotek-core'),
                'type' => Controls_Manager::SELECT,
                'default' => 'planning-section-title-left',
                'options' => [
                    'planning-section-title-left' => esc_html__('Left Scroll', 'infotek-core'),
                    'planning-section-title-right' => esc_html__('Right Scroll', 'infotek-core'),
                ],

            ]
        );
        $this->add_control(
            'image_status',
            [
                'label' => esc_html__('Image Show/Hide', 'infotek-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('show/hide btn', 'infotek-core'),
                'default' => 'yes'
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'list_icon',
            [
                'label' => esc_html__('Icon', 'infotek-core'),
                'type' => Controls_Manager::MEDIA,
                'description' => esc_html__('select Icon.', 'infotek-core'),
            ]
        );
        $repeater->add_control(
            'list_title', [
                'label' => esc_html__('Title', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('enter title.', 'infotek-core'),
                'default' => esc_html__('Facebook', 'infotek-core')
            ]
        );
        $repeater->add_control(
            'list_social_icon', [
                'label' => esc_html__('Social Icon', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter Social Url.', 'infotek-core'),
                'default' => esc_html__('#', 'infotek-core')
            ]
        );
        $this->add_control('scroll_items', [
            'label' => esc_html__('Scroll Item', 'infotek-core'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
        ]);
        $this->end_controls_section();


        /*  tab styling tabs start */
        $this->start_controls_section(
            'tab_settings_section',
            [
                'label' => esc_html__('Tab Settings', 'infotek-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control('sub_title_color', [
            'label' => esc_html__('Sub Title Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-scroll-inner h4" => "color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_tabs();

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
        $scroll_items = $settings['scroll_items'];
        $image_status = $settings['image_status'];

        if ($image_status == 'yes') {
            $image_status = 'image-show';
        }else {
            $image_status = 'image-hide';
        }
        ?>

        <div class="planning-section-title-wrap text-center <?php echo $image_status; ?>">
            <div class="<?php echo $settings['list_style'] ?>">
                <?php foreach ($scroll_items as $item): ?>

                    <a class="single-scroll-list-item" href="<?php echo $item['list_social_icon']; ?>">
                        <img src="<?php echo $item['list_icon']['url']; ?>" alt="img">
                        <p><?php echo $item['list_title']; ?></p>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Infotek_Scroll_Item_One());