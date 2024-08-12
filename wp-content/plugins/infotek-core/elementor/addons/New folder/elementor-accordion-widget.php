<?php
/**
 * Elementor Widget
 * @package Infotek
 * @since 1.0.0
 */

namespace Elementor;
class Infotek_Accordion_One extends Widget_Base
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
        return 'infotek-accordion-one-widget';
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
        return esc_html__('Accordion 01', 'infotek-core');
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
        $this->add_control('accordion_grid', [
            'label' => esc_html__('Aaccordion Grid', 'infotek-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'col-lg-3' => esc_html__('col-lg-2', 'infotek-core'),
                'col-lg-3' => esc_html__('col-lg-3', 'infotek-core'),
                'col-lg-4' => esc_html__('col-lg-4', 'infotek-core'),
                'col-lg-6' => esc_html__('col-lg-6', 'infotek-core'),
                'col-lg-12' => esc_html__('col-lg-12', 'infotek-core'),
            ),
            'default' => 'col-lg-6',
            'description' => esc_html__('Select Case Study Grid', 'infotek-core')
        ]);
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'title', [
                'label' => esc_html__('Title', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('enter title.', 'infotek-core'),
                'default' => esc_html__('Data Entry Services', 'infotek-core')
            ]
        );
        $repeater->add_control(
            'content_title', [
                'label' => esc_html__('Content Title', 'infotek-core'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('enter title.', 'infotek-core'),
                'default' => esc_html__('The decision comes amid accumulating warnings from scientists that human-caused climate change is increasing the likelihood of more severe floods, droughts, storms and other calamities.great for:', 'infotek-core')
            ]
        );
        $this->add_control('accordion_items', [
            'label' => esc_html__('Accordion Item', 'infotek-core'),
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

        $this->start_controls_tabs(
            'tab_style_tabs'
        );

        $this->start_controls_tab(
            'tab_style_normal_tab',
            [
                'label' => __('Expanded Style', 'infotek-core'),
            ]
        );
        $this->add_control('accordion_margin', [
            'label' => esc_html__('accordion Margin', 'infotek-core'),
            'type' => Controls_Manager::DIMENSIONS,
             'size_units' => [ 'px', 'em', '%' ],
            'selectors' => [
                "{{WRAPPER}} .single-accordion-inner .accordion-item" => "margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};",
            ]
        ]);

        $this->add_control('accordion_padding', [
            'label' => esc_html__('accordion Padding', 'infotek-core'),
            'type' => Controls_Manager::DIMENSIONS,
             'size_units' => [ 'px', 'em', '%' ],
            'selectors' => [
                "{{WRAPPER}} .single-accordion-inner .accordion-item" => "padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};",
            ]
        ]);
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'accordion_border',
                'label' => esc_html__( 'Accordion Border', 'infotek-core' ),
                'selector' => '{{WRAPPER}} .single-accordion-inner .accordion-item',
            ]
        );
        $this->add_control('icon_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Icon Color', 'infotek-core'),
            'selectors' => [
                "{{WRAPPER}} .single-accordion-inner .accordion-item .accordion-button:after" => "color: {{VALUE}}",
            ]
        ]);
        $this->add_control('icon_active_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Icon active Color', 'infotek-core'),
            'selectors' => [
                "{{WRAPPER}} .accordion-wrapper .card .card-header button.collapsed:after" => "color: {{VALUE}}",
            ]
        ]);
        $this->add_control('tab_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Title Color', 'infotek-core'),
            'selectors' => [
                "{{WRAPPER}} .single-accordion-inner .accordion-item .accordion-button" => "color: {{VALUE}}",
            ]
        ]);
        $this->add_control('tab_paragraph_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Paragraph Color', 'infotek-core'),
            'selectors' => [
                "{{WRAPPER}} .single-accordion-inner .accordion-item .accordion-body" => "color: {{VALUE}}",
            ]
        ]);
        $this->add_control('tab_icon_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Icon Color', 'infotek-core'),
            'selectors' => [
                "{{WRAPPER}} .faq-item .right-icon::after" => "border-right-color: {{VALUE}}",
                "{{WRAPPER}} .faq-item .right-icon::before" => "border-bottom-color: {{VALUE}}",
            ]
        ]);
        $this->add_control('tab_icon_bg_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Icon Background Color', 'infotek-core'),
            'selectors' => [
                "{{WRAPPER}} .faq-item .right-icon" => "background-color: {{VALUE}}",
            ]
        ]);
        $this->add_control('tab_background', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Tab Background', 'infotek-core'),
            'selectors' => [
                "{{WRAPPER}} .single-accordion-inner .accordion-item" => "background: {{VALUE}}",
            ]
        ]);
        $this->add_control('tab_border_color', [
            'label' => esc_html__('Tab Border Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-accordion-inner .accordion-item" => "border: 1px solid {{VALUE}}"
            ]
        ]);

        $this->add_control('inner_content_background', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Inner Content Background', 'infotek-core'),
            'selectors' => [
                "{{WRAPPER}} .faq-item .faq-content .faq-list-area" => "background-color: {{VALUE}}",
            ]
        ]);
        $this->add_control('inner_content_title_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Inner Content List Title Color', 'infotek-core'),
            'selectors' => [
                "{{WRAPPER}} .faq-item .faq-content .faq-list li" => "color: {{VALUE}}",
            ]
        ]);
        $this->add_control('inner_content_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Inner Content List Color', 'infotek-core'),
            'selectors' => [
                "{{WRAPPER}} .faq-item .faq-content .faq-list-area .title" => "color: {{VALUE}}",
            ]
        ]);
        $this->add_control('inner_content_bullet_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Inner Content List Bullet Color', 'infotek-core'),
            'selectors' => [
                "{{WRAPPER}} .faq-item .faq-content .faq-list li::before" => "background-color: {{VALUE}}",
            ]
        ]);
        $this->end_controls_tab();

        $this->start_controls_tab(
            'button_style_hover_tab',
            [
                'label' => esc_html__('Normal', 'infotek-core'),
            ]
        );

        $this->add_control('tab_hover_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Title Color', 'infotek-core'),
            'selectors' => [
                "{{WRAPPER}} .faq-item .faq-title .title" => "color: {{VALUE}}",
            ]
        ]);
        $this->add_control('tab_hover_background', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Background', 'infotek-core'),
            'selectors' => [
                "{{WRAPPER}} .faq-item" => "background-color: {{VALUE}}",
            ]
        ]);


        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
        /*  tab styling tabs end */

        $this->start_controls_section(
            'typography_settings_section',
            [
                'label' => esc_html__('Typography Settings', 'infotek-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'label' => esc_html__('Title Typography', 'infotek-core'),
            'name' => 'title_typography',
            'description' => esc_html__('select title typography', 'infotek-core'),
            'selector' => "{{WRAPPER}} .faq-item .faq-title .title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'label' => esc_html__('Paragraph Typography', 'infotek-core'),
            'name' => 'paragraph_typography',
            'description' => esc_html__('select Paragraph typography', 'infotek-core'),
            'selector' => "{{WRAPPER}} .faq-item.active .faq-content"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'label' => esc_html__('Feature Typography', 'infotek-core'),
            'name' => 'feature_list_title_typography',
            'description' => esc_html__('select feature title typography', 'infotek-core'),
            'selector' => "{{WRAPPER}} .faq-item .faq-content .faq-list-area .title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'label' => esc_html__('Feature Typography', 'infotek-core'),
            'name' => 'feature_list_typography',
            'description' => esc_html__('select feature list typography', 'infotek-core'),
            'selector' => "{{WRAPPER}} .faq-item .faq-content .faq-list li"
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
        $accordion_items = $settings['accordion_items'];
        $random_number = rand(999, 999999);
        ?>

        <div class="accordion single-accordion-inner style-2" id="accordionExample">
            <?php $i = 0; foreach ($accordion_items as $item): ?>
            <?php
                $j = '';
                $k = '';
                if($i < 1) {
                    $j = 'show';
                    $k = 'collapsed';
                    $l = '';
                }else {
                    $k = '';
                    $l = 'collapsed';
                }
            ?>  
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading<?php echo $i; ?>">
                    <button class="accordion-button <?php echo $l; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse<?php echo $i; ?>">
                        <?php echo esc_html($item['title']); ?>
                    </button>
                </h2>
                <div id="collapse<?php echo $i; ?>" class="accordion-collapse collapse <?php echo $j; ?>" aria-labelledby="heading<?php echo $i; ?>" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <?php echo esc_html($item['content_title']); ?>
                    </div>
                </div>
            </div>
            <?php $i++; endforeach; ?>
        </div>

        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Infotek_Accordion_One());