<?php
/**
 * Elementor Widget
 * @package Infotek
 * @since 1.0.0
 */

namespace Elementor;

class Infotek_Image_Hover extends Widget_Base {


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

        return 'infotek-image-hover-widget';

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

        return esc_html__('Image hover', 'infotek-core');

    }


    public function get_keywords()
    {

        return ['Animation', 'Circle', 'Effect', "HugeBinary", 'Infotek'];

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

        return 'eicon-circle-o';

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
            'image_settings_section',
            [
                'label' => esc_html__('General Settings', 'infotek-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'image', [
                'label' => esc_html__('Main Image', 'infotek-core'),
                'type' => Controls_Manager::MEDIA,
                'show_label' => false,
                'description' => esc_html__('Upload Main image', 'infotek-core'),
            ]
        );
        $this->add_control(
            'url',
            [
                'label' => esc_html__('Link', 'infotek-core'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('enter url.', 'infotek-core'),
                'default' => esc_html__('#', 'infotek-core'),
            ]
        );
        $this->end_controls_section();

        //Style tab style
        $this->start_controls_section(
            'style_settings_section',
            [
                'label' => esc_html__('Style Settings', 'sastek-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'image_height',
            [
                'label' => esc_html__('Image Height', 'infotek-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 220,
                ],
                'selectors' => [
                    '{{WRAPPER}} .image-hover-area .thumb' => 'height: {{SIZE}}{{UNIT}};',
                ],
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

        $settings = $this->get_settings_for_display(); ?>

        <div class="image-hover-area">
            <a class="d-block thumb" href="<?php echo $settings['url']; ?>" style="background-image: url('<?php echo $settings['image']['url']; ?>');">
                <span>
                    <i class="fab fa-instagram"></i>
                </span>
            </a>
        </div>

        <?php

    }

}


Plugin::instance()->widgets_manager->register_widget_type(new Infotek_Image_Hover());