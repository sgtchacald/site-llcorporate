<?php
/**
 * Elementor Widget
 * @package Infotek
 * @since 1.0.0
 */

namespace Elementor;
class Infotek_Counter_One_Widget extends Widget_Base
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
        return 'infotek-counter-one-widget';
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
        return esc_html__('Counter One', 'infotek-core');
    }

    public function get_keywords()
    {
        return ['Section', 'Counter', 'Title', "HugeBinary", 'Infotek'];
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
        $this->add_control('counter_style', [
            'label' => esc_html__('Counter Grid', 'infotek-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'style-1' => esc_html__('default', 'infotek-core'),
                'media' => esc_html__('Style Media', 'infotek-core'),
            ),
            'default' => 'style-1',
            'description' => esc_html__('Select Counter style', 'infotek-core')
        ]);
        $this->add_control(
            'counter_one_image', [
                'label' => esc_html__('Image', 'infotek-core'),
                'type' => Controls_Manager::ICONS,
                'show_label' => false,
                'description' => esc_html__('Upload counter image', 'infotek-core'),
                'default' => [
                    'value' => 'fas fa-play',
                    'library' => 'solid',
                ],
            ]
        );
        $this->add_control(
            'counter_one_title',
            [
                'label' => esc_html__('Title', 'infotek-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('200', 'infotek-core'),
            ]
        );
        $this->add_control(
            'counter_one_subtitle',
            [
                'label' => esc_html__('Sub Title', 'infotek-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Team member', 'infotek-core'),
                'description' => esc_html__('enter title. use {c} color text {/c} for color text', 'infotek-core'),
            ]
        );
        $this->add_control(
            'counter_one_animation_time',
            [
                'label' => esc_html__('Amination Time', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('1.2', 'infotek-core'),
            ]
        );
        $this->add_responsive_control(
            'text_align',
            [
                'label' => esc_html__('Alignment', 'infotek-core'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'infotek-core'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'infotek-core'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'infotek-core'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
            ]
        );
        $this->end_controls_section();

        //Style tab style
        $this->start_controls_section(
            'style_settings_section',
            [
                'label' => esc_html__('Style Settings', 'infotek-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'counter_border',
                'label' => esc_html__( 'Counter Border', 'infotek-core' ),
                'selector' => '{{WRAPPER}} .single-counter-inner',
            ]
        );
        $this->add_control('counter_space', [
            'label' => esc_html__('Counter Padding', 'infotek-core'),
            'type' => Controls_Manager::DIMENSIONS,
             'size_units' => [ 'px', 'em', '%' ],
            'selectors' => [
                "{{WRAPPER}} .single-counter-inner" => "padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};",
            ]
        ]);
        $this->add_control('counter_radius', [
            'label' => esc_html__('Counter Radius', 'infotek-core'),
            'type' => Controls_Manager::DIMENSIONS,
             'size_units' => [ 'px', 'em', '%' ],
            'selectors' => [
                "{{WRAPPER}} .single-counter-inner" => "border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};",
            ]
        ]);
        $this->add_control('counter_image_space', [
            'label' => esc_html__('Counter Image Padding', 'infotek-core'),
            'type' => Controls_Manager::DIMENSIONS,
             'size_units' => [ 'px', 'em', '%' ],
            'selectors' => [
                "{{WRAPPER}} .single-counter-inner .thumb" => "padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};",
            ]
        ]);
        $this->add_control('title_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Title Color', 'infotek-core'),
            'selectors' => [
                "{{WRAPPER}} .single-counter-inner h2" => "color: {{VALUE}}",
            ]
        ]);
        $this->add_control('subtitle_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('subtitle Color', 'infotek-core'),
            'selectors' => [
                "{{WRAPPER}} .single-counter-inner p" => "color: {{VALUE}}",
            ]
        ]);
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
        ?>
        
        <div class="<?php echo $settings['counter_style'] ?> single-counter-inner wow animated fadeInUp" data-wow-duration="1.5s" data-wow-delay="<?php echo $settings['counter_one_animation_time']; ?>s" style="text-align:<?php echo $settings['text_align']; ?>">
            <div class="thumb media-left">
                <?php
                    Icons_Manager::render_icon($settings['counter_one_image'], ['aria-hidden' => 'true']);
                ?>
            </div>
            <?php if ($settings['counter_style'] == 'style-1') { ?>
                <h2 class="mt-4 mb-2"><span class="counter"><?php echo $settings['counter_one_title']; ?></span>+</h2>
                <p><?php echo $settings['counter_one_subtitle']; ?></p>
            <?php } ?>
            <?php if ($settings['counter_style'] == 'media') { ?>
                <div class="media-body align-self-center">
                    <h4 class="mb-1"><span class="counter"><?php echo $settings['counter_one_title']; ?></span>+</h4>
                    <p class="mb-0"><?php echo $settings['counter_one_subtitle']; ?></p>
                </div>
            <?php } ?>
        </div>

        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Infotek_Counter_One_Widget());