<?php
/**
 * Elementor Widget
 * @package infotek
 * @since 1.0.0
 */

namespace Elementor;

class Infotek_Team_List_Widget extends Widget_Base
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
        return 'infotek-team-list-widget';
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
        return esc_html__('Team List', 'infotek-core');
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
                'label' => esc_html__('Team Settings', 'infotek-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control('team_style', [
            'label' => esc_html__('Team Style', 'infotek-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'style-default' => esc_html__('style-default', 'infotek-core'),
                'style-01' => esc_html__('Style 2', 'infotek-core'),
                'style-02' => esc_html__('Style 3', 'infotek-core'),
            ),
            'default' => 'style-default',
            'description' => esc_html__('Select Team Style', 'infotek-core')
        ]);
        $this->add_control('team_grid', [
            'label' => esc_html__('Team Grid', 'infotek-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'col-lg-3' => esc_html__('col-lg-2', 'infotek-core'),
                'col-lg-3' => esc_html__('col-lg-3', 'infotek-core'),
                'col-lg-4' => esc_html__('col-lg-4', 'infotek-core'),
                'col-lg-6' => esc_html__('col-lg-6', 'infotek-core'),
            ),
            'default' => 'col-lg-4',
            'description' => esc_html__('Select Team Grid', 'infotek-core')
        ]);
        $this->add_control(
            'no_gutters',
            [
                'label' => esc_html__('No Gutters', 'infotek-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes to show Gutters.', 'infotek-core'),
                'default' => 'yes'
            ]
        );
        $this->add_control(
            'pagination',
            [
                'label' => esc_html__('Pagination', 'infotek-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes to show pagination.', 'infotek-core'),
                'default' => 'yes'
            ]
        );
        $this->add_control(
            'pagination_alignment',
            [
                'label' => esc_html__('Pagination Alignment', 'infotek-core'),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    'left' => esc_html__('Left Align', 'infotek-core'),
                    'center' => esc_html__('Center Align', 'infotek-core'),
                    'right' => esc_html__('Right Align', 'infotek-core'),
                ),
                'description' => esc_html__('you can set pagination alignment.', 'infotek-core'),
                'default' => 'left',
                'condition' => array('pagination' => 'yes')
            ]
        );
        $this->add_control('total', [
            'label' => esc_html__('Total Posts', 'infotek-core'),
            'type' => Controls_Manager::TEXT,
            'default' => '-1',
            'description' => esc_html__('enter how many course you want in masonry , enter -1 for unlimited course.')
        ]);
        $this->add_control('category', [
            'label' => esc_html__('Category', 'infotek-core'),
            'type' => Controls_Manager::SELECT2,
            'multiple' => true,
            'options' => Infotek()->get_terms_names('team-cat', 'id'),
            'description' => esc_html__('select category as you want, leave it blank for all category', 'infotek-core'),
        ]);
        $this->add_control('order', [
            'label' => esc_html__('Order', 'infotek-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'ASC' => esc_html__('Ascending', 'infotek-core'),
                'DESC' => esc_html__('Descending', 'infotek-core'),
            ),
            'default' => 'ASC',
            'description' => esc_html__('select order', 'infotek-core')
        ]);
        $this->add_control('orderby', [
            'label' => esc_html__('OrderBy', 'infotek-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'ID' => esc_html__('ID', 'infotek-core'),
                'title' => esc_html__('Title', 'infotek-core'),
                'date' => esc_html__('Date', 'infotek-core'),
                'rand' => esc_html__('Random', 'infotek-core'),
                'comment_count' => esc_html__('Most Comments', 'infotek-core'),
            ),
            'default' => 'ID',
            'description' => esc_html__('select order', 'infotek-core')
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
        $this->add_control('name_color', [
            'label' => esc_html__('Name Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .team-single-item .content .name" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('name_hover_color', [
            'label' => esc_html__('Name Hover Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .team-single-item .content .name:hover" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'name_typography',
            'label' => esc_html__('Name Typography', 'infotek-core'),
            'selector' => "{{WRAPPER}} .team-single-item .content .name"
        ]);
        $this->add_control('designation_color', [
            'label' => esc_html__('Designation Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .team-single-item .content .designation" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'designation_typography',
            'label' => esc_html__('Designation Typography', 'infotek-core'),
            'selector' => "{{WRAPPER}} .team-single-item .content .designation"
        ]);
        $this->end_controls_section();

        //image tab style
        $this->start_controls_section(
            'image_settings_section',
            [
                'label' => esc_html__('Image Settings', 'infotek-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'thumb',
            [
                'label' => esc_html__( 'Image margin bottom', 'infotek-core' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
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
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-single-item .thumbnail' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_border_radius',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__( 'Image border radius', 'infotek-core' ),
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .team-single-item .thumbnail img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'image_overlay',
            [
                'label' => esc_html__('Image overlay', 'infotek-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'infotek-core'),
                'condition' => [
                    'social_position!' => '',
                ],
            ]
        );
        
        //image overlay tab start
        $this->start_controls_tabs(
            'image_overlay_style_tabs'
        );
        $this->start_controls_tab(
            'image_overlay_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'infotek-core'),
            ]
        );
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'image_bg_overlay',
                    'label' => esc_html__('Background', 'infotek-core'),
                    'types' => ['classic', 'gradient', 'video'],
                    'selector' => '{{WRAPPER}} .team-single-item .thumbnail::after',
                ]
            );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'image_overlay_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'infotek-core'),
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'image_hover_bg_overlay',
                'label' => esc_html__('Background', 'infotek-core'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .team-single-item:hover .thumbnail::after',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        //image overlay tab end

        $this->end_controls_section();

        //content tab style
        $this->start_controls_section(
            'content_settings_section',
            [
                'label' => esc_html__('Content Settings', 'infotek-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => esc_html__( 'Box Shadow', 'infotek-core' ),
                'selector' => '{{WRAPPER}} .team-single-item .content',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'content_background',
                'label' => esc_html__('Content Background', 'infotek-core'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .team-single-item .content',
            ]
        );
        $this->add_responsive_control(
            'content_padding',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__( 'Padding', 'infotek-core' ),
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .team-single-item .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'content_margin',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__( 'Margin', 'infotek-core' ),
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .team-single-item .content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'content_align',
            [
                'label' => esc_html__( 'Alignment', 'infotek-core' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'infotek-core' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'infotek-core' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'infotek-core' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__( 'Justified', 'infotek-core' ),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'default' => esc_html__('center', 'infotek-core'),
                'selectors' => [
                    '{{WRAPPER}} .team-single-item .content' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

        //Social tab style
        $this->start_controls_section(
            'social_settings_section',
            [
                'label' => esc_html__('Social Settings', 'infotek-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'social_position',
            [
                'label' => esc_html__( 'Position', 'infotek-core' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'absolute',
                'options' => [
                    '' => esc_html__( 'Default', 'infotek-core' ),
                    'absolute' => esc_html__( 'Absolute', 'infotek-core' ),
                    'fixed' => esc_html__( 'Fixed', 'infotek-core' ),
                ],
                'prefix_class' => 'social-area-',
                'frontend_available' => true,
                'separator' => 'before',
            ]
        );
        $start = is_rtl() ? esc_html__( 'Right', 'infotek-core' ) : esc_html__( 'Left', 'infotek-core' );
        $end = ! is_rtl() ? esc_html__( 'Right', 'infotek-core' ) : esc_html__( 'Left', 'infotek-core' );
        $this->add_control(
            'social_offset_orientation_h',
            [
                'label' => esc_html__( 'Horizontal Orientation', 'infotek-core' ),
                'type' => Controls_Manager::CHOOSE,
                'toggle' => false,
                'default' => 'start',
                'options' => [
                    'start' => [
                        'title' => $start,
                        'icon' => 'eicon-h-align-left',
                    ],
                    'end' => [
                        'title' => $end,
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'classes' => 'elementor-control-start-end',
                'render_type' => 'ui',
                'condition' => [
                    'social_position!' => '',
                ],
            ]
        );
        $this->add_responsive_control(
            'social_offset_x',
            [
                'label' => esc_html__( 'Offset', 'infotek-core' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -200,
                        'max' => 200,
                    ],
                    'vw' => [
                        'min' => -200,
                        'max' => 200,
                    ],
                    'vh' => [
                        'min' => -200,
                        'max' => 200,
                    ],
                ],
                'default' => [
                    'size' => '0',
                ],
                'size_units' => [ 'px', '%', 'vw', 'vh' ],
                'selectors' => [
                    'body:not(.rtl) {{WRAPPER}} .team-single-item .social-area' => 'left: {{SIZE}}{{UNIT}}',
                    'body.rtl {{WRAPPER}} .team-single-item .social-area' => 'right: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'social_offset_orientation_h!' => 'end',
                    'social_position!' => '',
                ],
            ]
        );
        $this->add_responsive_control(
            'social_offset_x_end',
            [
                'label' => esc_html__( 'Offset', 'infotek-core' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 0.1,
                    ],
                    '%' => [
                        'min' => -200,
                        'max' => 200,
                    ],
                    'vw' => [
                        'min' => -200,
                        'max' => 200,
                    ],
                    'vh' => [
                        'min' => -200,
                        'max' => 200,
                    ],
                ],
                'default' => [
                    'size' => '0',
                ],
                'size_units' => [ 'px', '%', 'vw', 'vh' ],
                'selectors' => [
                    'body:not(.rtl) {{WRAPPER}} .team-single-item .social-area' => 'right: {{SIZE}}{{UNIT}}',
                    'body.rtl {{WRAPPER}} .team-single-item .social-area' => 'left: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'social_offset_orientation_h' => 'end',
                    'social_position!' => '',
                ],
            ]
        );
        $this->add_control(
            'social_offset_orientation_v',
            [
                'label' => esc_html__( 'Vertical Orientation', 'infotek-core' ),
                'type' => Controls_Manager::CHOOSE,
                'toggle' => false,
                'default' => 'start',
                'options' => [
                    'start' => [
                        'title' => esc_html__( 'Top', 'infotek-core' ),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'end' => [
                        'title' => esc_html__( 'Bottom', 'infotek-core' ),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'render_type' => 'ui',
                'condition' => [
                    'social_position!' => '',
                ],
            ]
        );
        $this->add_responsive_control(
            'social_offset_y',
            [
                'label' => esc_html__( 'Offset', 'infotek-core' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -200,
                        'max' => 200,
                    ],
                    'vh' => [
                        'min' => -200,
                        'max' => 200,
                    ],
                    'vw' => [
                        'min' => -200,
                        'max' => 200,
                    ],
                ],
                'size_units' => [ 'px', '%', 'vh', 'vw' ],
                'default' => [
                    'size' => '0',
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-single-item .social-area' => 'top: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'social_offset_orientation_v!' => 'end',
                    'social_position!' => '',
                ],
            ]
        );
        $this->add_responsive_control(
            'social_offset_y_end',
            [
                'label' => esc_html__( 'Offset', 'infotek-core' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -200,
                        'max' => 200,
                    ],
                    'vh' => [
                        'min' => -200,
                        'max' => 200,
                    ],
                    'vw' => [
                        'min' => -200,
                        'max' => 200,
                    ],
                ],
                'size_units' => [ 'px', '%', 'vh', 'vw' ],
                'default' => [
                    'size' => '0',
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-single-item .social-area' => 'bottom: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'social_offset_orientation_v' => 'end',
                    'social_position!' => '',
                ],
            ]
        );
        $this->add_responsive_control(
            'social_z_index',
            [
                'label' => esc_html__( 'Z-Index', 'infotek-core' ),
                'type' => Controls_Manager::NUMBER,
                'selectors' => [
                    '{{WRAPPER}} .team-single-item .social-area' => 'z-index: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'social_icon_display',
            [
                'label' => esc_html__('social icon display', 'infotek-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'infotek-core'),
                'condition' => [
                    'social_position!' => '',
                ],
            ]
        );
        $this->add_control(
            'social_area_padding',
            [
                'label' => esc_html__( 'Social area padding', 'infotek-core' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
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
                    'size' => 30,
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-single-item .social-area' => 'padding: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'social_height',
            [
                'label' => esc_html__( 'height', 'infotek-core' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
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
                    'size' => 30,
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-single-item .social-icon li' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'social_line_height',
            [
                'label' => esc_html__( 'line height', 'infotek-core' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
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
                    'size' => 30,
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-single-item .social-icon li' => 'line-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'social_width',
            [
                'label' => esc_html__( 'width', 'infotek-core' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
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
                    'size' => 30,
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-single-item .social-icon li' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control('social_area_bg_color', [
            'label' => esc_html__('social area bg Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .team-single-item .social-area" => "background: {{VALUE}}"
            ]
        ]);
        $this->add_control('social_bg_color', [
            'label' => esc_html__('social bg Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .team-single-item .social-icon li" => "background: {{VALUE}}"
            ]
        ]);
        $this->add_control('social_bg_hover_color', [
            'label' => esc_html__('social bg hover Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .team-single-item .social-icon li:hover" => "background: {{VALUE}}"
            ]
        ]);
        $this->add_control('social_icon_color', [
            'label' => esc_html__('social icon Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .team-single-item .social-icon li a" => "color: {{VALUE}}"
            ]
        ]);
        
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'social_border',
                'label' => esc_html__( 'Social Border', 'infotek-core' ),
                'selector' => '{{WRAPPER}} .team-single-item .social-icon li',
            ]
        );
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

        $no_gutters = '';
        if($settings['no_gutters'] == 'yes'){
            $no_gutters = 'no-gutters';
        }
        $social_icon_display = '';
        if($settings['social_icon_display'] == 'yes'){
            $social_icon_display = 'social-style-grid';
        }
        
        $team_style = $settings['team_style'];

        //query settings
        $total_posts = $settings['total'];
        $category = $settings['category'];
        $order = $settings['order'];
        $orderby = $settings['orderby'];
        //other settings
        $pagination = $settings['pagination'] ? false : true;
        $pagination_alignment = $settings['pagination_alignment'];
        //setup query
        $args = array(
            'post_type' => 'team',
            'posts_per_page' => $total_posts,
            'order' => $order,
            'orderby' => $orderby,
            'post_status' => 'publish'
        );

        if (!empty($category)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'team-cat',
                    'field' => 'term_id',
                    'terms' => $category
                )
            );
        }
        $post_data = new \WP_Query($args);
        ?>

        <div class="team-area">
            <div class="row <?php echo esc_attr($no_gutters); ?> justify-content-center">
                <?php
                while ($post_data->have_posts()) : $post_data->the_post();
                    $post_id = get_the_ID();
                    $img_id = get_post_thumbnail_id($post_id) ? get_post_thumbnail_id($post_id) : false;
                    $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'infotek-team-slider-one', false) : '';
                    $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                    $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

                    $team_single_meta_data = get_post_meta(get_the_ID(), 'infotek_team_options', true);
                    $social_icons = isset($team_single_meta_data['social-icons']) && !empty($team_single_meta_data['social-icons']) ? $team_single_meta_data['social-icons'] : '';

                    ?>
                    <div class="<?php echo esc_attr($settings['team_grid']); ?> col-sm-6">
                        <div class="m-0 mb-4 single-team-inner style-2 text-center border-radius-5 bg-white <?php echo $settings['team_style']; ?>">
                            <div class="thumb bg-gray border-radius-5">
                                <img src="<?php echo esc_url($img_url) ?>" alt="img">
                            </div>
                            <div class="details">
                                <ul class="team-social-inner">
                                    <?php
                                        if (!empty($social_icons)) {
                                            foreach ($social_icons as $item) {
                                                printf('<li><a href="%1$s"><i class="%2$s"></i></a></li>', $item['url'], $item['icon']);
                                            }
                                        }
                                    ?>
                                </ul>
                                <h5><a href="<?php echo get_the_permalink(); ?>"><?php echo esc_html(get_the_title($post_id)) ?></a></h5>
                                <p><?php echo $team_single_meta_data['designation'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                
                <div class="col-lg-12">
                    <div class="blog-pagination text-<?php echo esc_attr($pagination_alignment) ?> margin-top-20">
                        <?php
                        if (!$pagination) {
                            Infotek()->post_pagination($post_data);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Infotek_Team_List_Widget());