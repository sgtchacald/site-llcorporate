<?php
/**
 * Elementor Widget
 * @package Infotek
 * @since 1.0.0
 */

namespace Elementor;
class Infotek_Section_Title_One_Widget extends Widget_Base
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
        return 'infotek-theme-section-title-one-widget';
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
        return esc_html__('Heading Title: 01', 'infotek-core');
    }

    public function get_keywords()
    {
        return ['Section', 'Heading', 'Title', "HugeBinary", 'Infotek'];
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
        return 'eicon-heading';
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
            'anim_status',
            [
                'label' => esc_html__('BTN Show/Hide', 'infotek-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('show/hide btn', 'infotek-core'),
                'default' => 'yes'
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
            'subtitle',
            [
                'label' => esc_html__('Sub Title', 'infotek-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('About Infotek', 'infotek-core'),
                'description' => esc_html__('enter title. use {c} color text {/c} for color text', 'infotek-core'),
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'infotek-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('What We Do', 'infotek-core'),
            ]
        );
        $this->add_control(
            'description_status',
            [
                'label' => esc_html__('Description Show/Hide', 'infotek-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('show/hide description', 'infotek-core'),
            ]
        );
        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'infotek-core'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('enter  description.', 'infotek-core'),
                'default' => esc_html__('Top Packages', 'infotek-core'),
                'condition' => ['description_status' => 'yes']
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'list_title', [
                'label' => esc_html__('List Title', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter List title.', 'infotek-core'),
                'default' => esc_html__('Data Entry Services', 'infotek-core')
            ]
        );
        $this->add_control('list_items', [
            'label' => esc_html__('list Item', 'infotek-core'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
        ]);
        $this->add_control(
            'btn_status',
            [
                'label' => esc_html__('BTN Show/Hide', 'infotek-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('show/hide btn', 'infotek-core'),
            ]
        );
        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__('Btn text', 'infotek-core'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('enter  btn text.', 'infotek-core'),
                'default' => esc_html__('Discover More ', 'infotek-core'),
                'condition' => ['btn_status' => 'yes']
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label' => esc_html__('Btn url', 'infotek-core'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('Enter  btn url.', 'infotek-core'),
                'default' => esc_html__('#', 'infotek-core'),
                'condition' => ['btn_status' => 'yes']
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

        $this->start_controls_section(
            'styling_section',
            [
                'label' => esc_html__('Styling Settings', 'infotek-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'shape_top_space',
            [
                'label' => esc_html__('Shape Top Space', 'infotek-core'),
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
                'selectors' => [
                    '{{WRAPPER}}.theme-section-title .title.shape' => 'padding-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'title_bottom_space',
            [
                'label' => esc_html__('Title Bottom Space', 'infotek-core'),
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
                'selectors' => [
                    '{{WRAPPER}} .theme-section-title .title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control('subtitle_color', [
            'label' => esc_html__('Sub Title Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .theme-section-title .subtitle" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('subtitle_extra_color', [
            'label' => esc_html__('Sub Title Extra Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .theme-section-title .subtitle span" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('subtitle_span_color', [
            'label' => esc_html__('Sub Title span Color bg', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .theme-section-title .subtitle span" => "background: {{VALUE}}"
            ]
        ]);
        $this->add_control('description_color', [
            'label' => esc_html__('Description Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .theme-section-title p" => "color: {{VALUE}}"
            ]
        ]);

        $this->add_control('title_color', [
            'label' => esc_html__('Title Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .theme-section-title .title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('title_extra_color', [
            'label' => esc_html__('Title Extra Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .theme-section-title .title span" => "color: {{VALUE}}"
            ]
        ]);

        $this->end_controls_section();
        $this->start_controls_section(
            'styling_typogrpahy_section',
            [
                'label' => esc_html__('Typography Settings', 'infotek-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'title_typography',
            'label' => esc_html__('Title Typography', 'infotek-core'),
            'selector' => "{{WRAPPER}} .theme-section-title .title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'title_extra_typography',
            'label' => esc_html__('Title Extra Typography', 'infotek-core'),
            'selector' => "{{WRAPPER}} .theme-section-title .title span"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'description_typography',
            'label' => esc_html__('Description Typography', 'infotek-core'),
            'selector' => "{{WRAPPER}} .theme-section-title p"
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
        $list_items = $settings['list_items'];
        $anim_status = $settings['anim_status'];

        $title_anim = '';
        $text_anim = '';
        $title_anim_2 = '';
        if ($anim_status == 'yes') {
            $title_anim = 'title-anim';
            $text_anim = 'text-anim';
            $title_anim_2 = 'title-anim-2';
        }
        ?>
        <div class="theme-section-title <?php echo $settings['white_section_title'] ?>"
             style="text-align:<?php echo $settings['text_align']; ?>">
            <?php if (!empty($settings['subtitle'])) : ?>
                <h6 class="subtitle">
                    <span>
                        <?php
                            $subtitle = str_replace(['{c}', '{/c}'], ['<span>', '</span>'], $settings['subtitle']);
                            print wp_kses($subtitle, infotek_core()->kses_allowed_html('all'));
                        ?>
                    </span> 
                </h6>
            <?php endif; ?>
            <h4 class="title">
                <?php
                $title = str_replace(['{c}', '{/c}'], ['<span>', '</span>'], $settings['title']);
                print wp_kses($title, infotek_core()->kses_allowed_html('all'));
                ?>
            </h4>
            <?php
                if (!empty($settings['description_status'])) { ?>
                    <div>
                        <p>
                            <?php
                                $description = str_replace(['{c}', '{/c}'], ['<span>', '</span>'], $settings['description']);
                                print wp_kses($description, infotek_core()->kses_allowed_html('all'));
                            ?>
                        </p> 
                    </div>
                <?php }
            ?>
            <ul class="list-item mt-4 <?php echo $text_anim; ?>">
                <?php foreach ($list_items as $item): ?>
                    <li>
                        <p><?php echo esc_html($item['list_title']); ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
            <?php
                if (!empty($settings['btn_status'])) { ?>
                    <div class="<?php echo $title_anim_2; ?> mt-5">
                        <a class="btn-half" href="<?php echo esc_html($settings['btn_url']) ?>"><span><?php echo esc_html($settings['btn_text']) ?> <i class="fa fa-arrow-right"></i></span></a>
                    </div>
                <?php }
            ?>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Infotek_Section_Title_One_Widget());