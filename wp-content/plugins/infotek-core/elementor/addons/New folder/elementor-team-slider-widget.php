<?php
/**
 * Elementor Widget
 * @package infotek
 * @since 1.0.0
 */

namespace Elementor;

class Infotek_Team_Slider_Widget extends Widget_Base
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
        return 'infotek-team-slider-widget';
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
        return esc_html__('Team Slider', 'infotek-core');
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
                'label' => esc_html__('Slider Settings', 'infotek-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control('team_style', [
            'label' => esc_html__('Team Style', 'infotek-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'default' => esc_html__('Default', 'infotek-core'),
                'team-style-2' => esc_html__('Style Two', 'infotek-core'),
                'team-style-3' => esc_html__('Style Three', 'infotek-core'),
            ),
            'default' => 'default',
            'description' => esc_html__('Select Blog Grid', 'infotek-core')
        ]);

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
            'options' => infotek()->get_terms_names('team-cat', 'id'),
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
        $this->add_control(
            'items',
            [
                'label' => esc_html__('slidesToShow', 'infotek-core'),
                'type' => Controls_Manager::NUMBER,
                'description' => esc_html__('you can set how many item show in slider', 'infotek-core'),
                'default' => '3',
            ]
        );
        $this->add_control(
            'margin',
            [
                'label' => esc_html__('Margin', 'infotek-core'),
                'description' => esc_html__('you can set margin for slider', 'infotek-core'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 5,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'size_units' => ['px']
            ]
        );
        $this->add_control(
            'loop',
            [
                'label' => esc_html__('Loop', 'infotek-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'infotek-core'),
            ]
        );
        $this->add_control(
            'autoplay',
            [
                'label' => esc_html__('Autoplay', 'infotek-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'infotek-core'),
            ]
        );
        $this->add_control(
            'nav',
            [
                'label' => esc_html__('Nav', 'infotek-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'infotek-core'),
                'default' => 'yes'
            ]
        );
        $this->add_control(
            'dots',
            [
                'label' => esc_html__('Dots', 'infotek-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'infotek-core'),
                'default' => 'no'
            ]
        );
        $this->add_control(
            'nav_left_arrow',
            [
                'label' => esc_html__('Nav Left Icon', 'infotek-core'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('you can set yes/no to enable/disable', 'infotek-core'),
                'default' => [
                    'value' => 'fas fa-arrow-left',
                    'library' => 'solid',
                ],
                'condition' => ['nav' => 'yes']
            ]
        );
        $this->add_control(
            'nav_right_arrow',
            [
                'label' => esc_html__('Nav Right Icon', 'infotek-core'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('you can set yes/no to enable/disable', 'infotek-core'),
                'default' => [
                    'value' => 'fas fa-arrow-right',
                    'library' => 'solid',
                ],
                'condition' => ['nav' => 'yes']
            ]
        );
        $this->add_control(
            'center',
            [
                'label' => esc_html__('Center', 'infotek-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'infotek-core'),

            ]
        );
        $this->add_control(
            'autoplaytimeout',
            [
                'label' => esc_html__('Autoplay Timeout', 'infotek-core'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10000,
                        'step' => 2,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 5000,
                ],
                'size_units' => ['px'],
                'condition' => array(
                    'autoplay' => 'yes'
                )
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'team_member_styling_settings_section',
            [
                'label' => esc_html__('Styling Settings', 'infotek-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control('social_bg', [
            'label' => esc_html__('Social bg Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-team-inner .thumb .team-social-inner" => "background: {{VALUE}}"
            ]
        ]);
        $this->add_control('social_icon', [
            'label' => esc_html__('Social Icon Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-team-inner .thumb .team-social-inner li a" => "color: {{VALUE}}",
            ]
        ]);
        $this->add_control('title_hover_color', [
            'label' => esc_html__('Title hover Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-team-inner .details a:hover" => "color: {{VALUE}}",
            ]
        ]);
        $this->add_control('slick_arrow_style_border', [
            'label' => esc_html__('slick arrow style border', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .slick-carousel-controls .slick-arrow" => "border-color: {{VALUE}}",
            ]
        ]);
        $this->add_control('slick_arrow_style', [
            'label' => esc_html__('slick arrow style', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .slick-carousel-controls .slick-arrow" => "color: {{VALUE}}",
                "{{WRAPPER}} .slick-carousel-controls .slick-arrow:hover" => "background: {{VALUE}}",
            ]
        ]);
        $this->add_control('slick_arrow_style_hover', [
            'label' => esc_html__('slick arrow style Hover', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .slick-carousel-controls .slick-arrow:hover" => "color: {{VALUE}}",
            ]
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
        $rand_numb = rand(333, 999999999);

        //slider settings
        $slider_settings = [
            "loop" => esc_attr($settings['loop']),
            "margin" => esc_attr($settings['margin']['size'] ?? 0),
            "items" => esc_attr($settings['items'] ?? 1),
            "center" => esc_attr($settings['center']),
            "autoplay" => esc_attr($settings['autoplay']),
            "autoplaytimeout" => esc_attr($settings['autoplaytimeout']['size'] ?? 0),
            "nav" => esc_attr($settings['nav']),
            "dot" => esc_attr($settings['dots']),
            "navleft" => infotek_core()->render_elementor_icons($settings['nav_left_arrow']),
            "navright" => infotek_core()->render_elementor_icons($settings['nav_right_arrow'])
        ];
        //query settings
        $total_posts = $settings['total'];
        $category = $settings['category'];
        $order = $settings['order'];
        $orderby = $settings['orderby'];
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
        <div class="infotek-rtl-slider">
            <div class="team-slider" id="team-one-carousel-<?php echo esc_attr($rand_numb); ?>" data-settings='<?php echo json_encode($slider_settings) ?>'
            >
                <?php
                while ($post_data->have_posts()) : $post_data->the_post();
                $post_id = get_the_ID();
                $img_id = get_post_thumbnail_id($post_id) ? get_post_thumbnail_id($post_id) : false;
                $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'full', false) : '';
                $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

                $team_single_meta_data = get_post_meta(get_the_ID(), 'infotek_team_options', true);
                $social_icons = isset($team_single_meta_data['social-icons']) && !empty($team_single_meta_data['social-icons']) ? $team_single_meta_data['social-icons'] : '';
                ?>

                <div class="single-team-inner style-2 text-center border-radius-5 bg-white <?php echo $settings['team_style']; ?>">
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

                <?php endwhile; ?>
            </div>
            <div class="col-md-12">
                <div class="slick-carousel-controls slider-control-right-top d-inline-flex">
                    <?php if (!empty($settings['nav'])) : ?>
                        <div class="slider-nav"></div>
                    <?php endif;
                    if (!empty($settings['dots'])) : ?>
                        <div class="slider-dots"></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Infotek_Team_Slider_Widget());