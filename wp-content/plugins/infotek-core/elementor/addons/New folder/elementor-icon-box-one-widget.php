<?php
/**
 * Elementor Widget
 * @package Infotek
 * @since 1.0.0
 */

namespace Elementor;
class Infotek_Icon_Box_One_Widget extends Widget_Base
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
        return 'infotek-icon-box-item-widget';
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
        return esc_html__('Icon Box: 01', 'infotek-core');
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
        return 'eicon-alert';
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
            'white_section_title',
            [
                'label' => esc_html__('Subtitle Plane Animation', 'infotek-core'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    'white' => esc_html__('White Style', 'infotek-core'),
                    '' => esc_html__('Default Style', 'infotek-core'),
                ],
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'infotek-core'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('enter title.', 'infotek-core'),
                'default' => esc_html__('User friendly system added', 'infotek-core'),
            ]
        );
        $this->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'infotek-core'),
                'type' => Controls_Manager::URL,
                'description' => esc_html__('enter url.', 'infotek-core'),
                'default' => [
                    'url' => ''
                ]
            ]
        );
        $this->add_control(
            'icon_selector',
            [
                'label' => esc_html__('Icon Selector', 'foodfly-core'),
                'type' => Controls_Manager::SELECT,
                'default' => 'icon',
                'options' => [
                    'text_icon' => esc_html__('Text Icon', 'foodfly-core'),
                    'icon' => esc_html__('Icon', 'foodfly-core'),
                    'image' => esc_html__('Image', 'foodfly-core'),
                ],

            ]
        );
        $this->add_control(
            'icon_number',
            [
                'label' => esc_html__('Text Number', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('enter number.', 'infotek-core'),
                'default' => esc_html__('1', 'infotek-core'),
                'condition' => ['icon_selector' => 'icon']
            ]
        );
        $this->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'infotek-core'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('select Icon.', 'infotek-core'),
                'default' => [
                    'value' => 'fas fa-phone-alt',
                    'library' => 'solid',
                ],
                'condition' => ['icon_selector' => 'icon']
            ]
        );
        $this->add_control(
            'text_icon',
            [
                'label' => esc_html__('Text Icon', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('enter text.', 'infotek-core'),
                'default' => esc_html__('1', 'infotek-core'),
                'condition' => ['icon_selector' => 'text_icon']
            ]
        );
        $this->add_control(
            'image', [
                'label' => esc_html__('Image', 'infotek-core'),
                'type' => Controls_Manager::MEDIA,
                'show_label' => false,
                'condition' => ['icon_selector' => 'image']
            ]
        );
        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'infotek-core'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('enter text.', 'infotek-core'),
                'default' => esc_html__('There is a very fast AVANCE L5 system for internet access and it did not disappoint.', 'infotek-core')
            ]
        );
        $this->add_control(
            'read_more',
            [
                'label' => esc_html__('Details Link', 'infotek-core'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('enter Link.', 'infotek-core'),
                'default' => esc_html__('#', 'infotek-core')
            ]
        );
        $this->add_control(
            'read_more_switch',
            [
                'label' => esc_html__('read more switch', 'infotek-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes to show pagination.', 'infotek-core'),
                'default' => 'yes'
            ]
        );
        $this->add_control(
            'icon_box_add_class',
            [
                'label' => esc_html__('Add Class', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('please add class', 'infotek-core'),
            ]
        );
        $this->add_control(
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

        $this->start_controls_section(
            'styling_settings_section',
            [
                'label' => esc_html__('Box Styling Settings', 'infotek-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'slider_nav_style_tabs'
        );

        $this->start_controls_tab(
            'active_hover_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'infotek-core'),
            ]
        );
        $this->add_control(
            'item_padding',
            [
                'label' => esc_html__('Padding', 'infotek-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .icon-box-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => esc_html__('Border', 'infotek-core'),
                'selector' => '{{WRAPPER}} .icon-box-item',
            ]
        );
        $this->add_control(
            'background_border_radius',
            [
                'label' => esc_html__('Box Border Radius', 'infotek-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .icon-box-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'background_color',
                'label' => esc_html__('Background Image', 'infotek-core'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .icon-box-item',
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => esc_html__('Box Shadow', 'infotek-core'),
                'selector' => '{{WRAPPER}} .icon-box-item',
            ]
        );
        $this->add_control(
            'title_margin_bottom',
            [
                'label' => esc_html__('Title Margin Bottom', 'infotek-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-box-item .content .title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'content_margin_bottom',
            [
                'label' => esc_html__('Content Margin Bottom', 'infotek-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-box-item .content p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control('title_color', [
            'label' => esc_html__('Title Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .icon-box-item .content .title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('number_color', [
            'label' => esc_html__('Number Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .icon-box-item .content p" => "color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_tab();


        $this->start_controls_tab(
            'slider_navigation_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'infotek-core'),
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'hover_border',
                'label' => esc_html__('Border', 'infotek-core'),
                'selector' => '{{WRAPPER}} .icon-box-item:hover',
            ]
        );
        $this->add_control('background_hover_color', [
            'label' => esc_html__('Background Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .icon-box-item:hover" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow_hover',
                'label' => esc_html__('Box Shadow', 'infotek-core'),
                'selector' => '{{WRAPPER}} .icon-box-item:hover',
            ]
        );
        $this->add_control('icon_bg_hover_color', [
            'label' => esc_html__('Icon Background Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .icon-box-item:hover .icon" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('icon_hover_color', [
            'label' => esc_html__('Icon Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .icon-box-item:hover .icon" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('icon_hover_fill_color', [
            'label' => esc_html__('Icon Fill Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .icon-box-item:hover .icon svg path" => "fill: {{VALUE}}"
            ]
        ]);
        $this->add_control('icon_hover_number_bg', [
            'label' => esc_html__('Icon number bg', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .icon-box-item:hover .icon-wrap span" => "background: {{VALUE}}"
            ]
        ]);
        $this->add_control('title_hover_color', [
            'label' => esc_html__('Title Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .icon-box-item:hover .content .title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('paragraph_hover_color', [
            'label' => esc_html__('Paragraph Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .icon-box-item:hover .content p" => "color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_tab();

        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'icon_styling_settings_section',
            [
                'label' => esc_html__('Icon Style', 'infotek-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'icon_border',
                'label' => esc_html__('Border', 'infotek-core'),
                'selector' => '{{WRAPPER}} .icon-box-item .icon',
            ]
        );
        $this->add_control(
            'icon_border_radius',
            [
                'label' => esc_html__('Icon Border Radius', 'infotek-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .icon-box-item .icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .icon-box-item .text-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_control(
            'icon_height',
            [
                'label' => esc_html__('Icon Height', 'infotek-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-box-item .icon' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .icon-box-item .text-icon' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'icon_line_height',
            [
                'label' => esc_html__('Icon Line Height', 'infotek-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-box-item .icon' => 'line-height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .icon-box-item .text-icon' => 'line-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'icon_padding',
            [
                'label' => esc_html__('Icon Padding', 'infotek-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .icon-box-item .icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'icon_width',
            [
                'label' => esc_html__('Icon Width', 'infotek-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-box-item .icon' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .icon-box-item .text-icon' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'icon_size',
            [
                'label' => esc_html__('Icon Size', 'infotek-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 35,
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-box-item .icon' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .icon-box-item .text-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'icon_margin_bottom',
            [
                'label' => esc_html__('Icon Margin Bottom', 'infotek-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-box-item .icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .icon-box-item .icon-wrap' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'icon_margin_left',
            [
                'label' => esc_html__('Icon Margin Left', 'infotek-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'condition' => ['position' => 'left'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-box-item .icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .icon-box-item .text-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .icon-box-item img' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'position',
            [
                'label' => esc_html__('Position', 'infotek-core'),
                'type' => Controls_Manager::SELECT,
                'default' => 'top',
                'options' => [
                    'top' => esc_html__('Top', 'infotek-core'),
                    'left' => esc_html__('Left', 'infotek-core'),
                    'right' => esc_html__('Right', 'infotek-core'),
                ],
            ]
        );
        $this->add_control(
            'icon_shape_style',
            [
                'label' => esc_html__('Icon Shape Style', 'infotek-core'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => esc_html__('Default', 'infotek-core'),
                    'shape' => esc_html__('Style 01', 'infotek-core'),
                    'shape_02' => esc_html__('Style 02', 'infotek-core'),
                    'shape_03' => esc_html__('style 03', 'infotek-core'),
                ],
            ]
        );
        $this->add_control('icon_color', [
            'label' => esc_html__('Icon Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .icon-box-item .icon" => "color: {{VALUE}}",
                "{{WRAPPER}} .icon-box-item .text-icon" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'icon_bg_color',
                'label' => esc_html__('Background Image', 'infotek-core'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} .icon-box-item .icon,
		                    {{WRAPPER}} .icon-box-item .text-icon"
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'typography_settings_section',
            [
                'label' => esc_html__('Typography Settings', 'infotek-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__('Title Typography', 'infotek-core'),
                'selector' => '{{WRAPPER}} .icon-box-item .content .title',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'text_icon_typography',
                'label' => esc_html__('Text Icon Typography', 'infotek-core'),
                'selector' => '{{WRAPPER}} .icon-box-item .text-icon span',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => esc_html__('Number Typography', 'infotek-core'),
                'selector' => '{{WRAPPER}} .icon-box-item .content p',
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
        $this->add_render_attribute('icon-box_wrapper', 'class', 'icon-box-item');
        $this->add_render_attribute('link_wrapper', 'class', 'icon-box-anchor');

        $img_id = $settings['image']['id'] ?? '';
        $image_url = !empty($img_id) ? wp_get_attachment_image_src($img_id, 'full', false)[0] : '';
        $image_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);
        
        if (!empty($settings['link']['url'])) {
            $this->add_link_attributes('link_wrapper', $settings['link']);
        }
        ?>

        <div class="icon-box-item <?php echo $settings['icon_box_add_class']; ?> <?php echo $settings['position'] . " " .
            $settings['white_section_title'] ?>"
             style="text-align:<?php echo $settings['text_align']; ?>">
            <span class="line-02"></span>
            <span class="line-03"></span>
            <?php if(!empty($image_url || $settings['icon_number'] || $settings['icon'])) : ?>
                <div class="icon-wrap">
                    <?php if(!empty($settings['icon_number'])) : ?>
                        <span><?php echo esc_html($settings['icon_number']); ?></span>
                    <?php endif; ?>
                    <?php if ($settings['icon_selector'] == 'icon'): ?>
                        <div class="icon <?php echo $settings['icon_shape_style'] ?>">
                            <?php
                            Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']);
                            ?>
                        </div>
                    <?php elseif ($settings['icon_selector'] == 'image'):
                        printf('<img src="%1$s" alt="%2$s">', esc_url($image_url), esc_attr($image_alt));
                    else:
                        printf('<div class="text-icon"><span>%1$s</span></div>', esc_html($settings['text_icon']));

                    endif; ?>
                </div>
            <?php endif; ?>
            <div class="content">
                <?php
                if (!empty($settings['title'])) {
                    $title = str_replace(['{c}', '{/c}'], ['<span>', '</span>'], $settings['title']);
                    printf('<a %1$s ><h3 class="title">%2$s</h3></a>', $this->get_render_attribute_string('link_wrapper'), $title);
                }
                if (!empty($settings['description'])) {
                    printf('<p>%1$s</p>', esc_html($settings['description']));
                } ?>
                <?php if(!empty($settings['read_more_switch'])) : ?>
                    <div class="btn-wrap mt-4">
                        <a href="<?php echo esc_html($settings['read_more']); ?>" class="boxed-btn read-btn style-01">
                          <svg class="ml-0" xmlns="http://www.w3.org/2000/svg" width="22.503" height="15.083" viewBox="0 0 22.503 15.083">
                              <path d="M37.4,37.607c-1.067,3.2-.485,6.448-.679,9.7,0,.145.339.388.533.436a1.209,1.209,0,0,0,1.164-.291,4.709,4.709,0,0,0,1.5-3.1,37.347,37.347,0,0,0,.388-8.048,7.233,7.233,0,0,0,.1-1.018,37.465,37.465,0,0,0,.1-4.024,18.041,18.041,0,0,0,3.1,2.666,1.177,1.177,0,0,0,1.7-.291,1.444,1.444,0,0,0,.291-1.794,20.142,20.142,0,0,0-2.036-2.521c-1.26-1.212-2.618-2.279-3.927-3.442h0a1.045,1.045,0,0,0-1.406-.485l-.533.291c-2.86,1.454-4.606,4.072-6.933,6.06-.1.1-.048.485.1.679A1.1,1.1,0,0,0,31.877,33a4.422,4.422,0,0,0,3.2-1.067c.679-.582,1.406-1.115,2.085-1.648a12.417,12.417,0,0,0-.145,1.891C37.065,34.02,37.259,35.814,37.4,37.607Z" transform="translate(47.79 -30.712) rotate(90)" fill="#ba9778"></path>
                          </svg></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Infotek_Icon_Box_One_Widget());