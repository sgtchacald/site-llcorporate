<?php
/**
 * Elementor Widget
 * @package infotek
 * @since 1.0.0
 */

namespace Elementor;

class Infotek_Audio_Creator_Slider_Widget extends Widget_Base
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
        return 'infotek-audio-creator-slider-widget';
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
        return esc_html__('Audio Creator Slider', 'infotek-core');
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
        $this->add_control('creator_style', [
            'label' => esc_html__('Creator Style', 'infotek-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'default' => esc_html__('Default', 'infotek-core'),
                'creator-style-2' => esc_html__('Style Two', 'infotek-core'),
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
            'default' => 'DESC',
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
        $this->add_control('right_arrow_class', [
            'label' => esc_html__('arrow class add', 'infotek-core'),
            'type' => Controls_Manager::TEXT,
            'default' => 'arrow-right-0',
        ]);
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
                "{{WRAPPER}} .single-audio-creator-inner .thumb .team-social-inner" => "background: {{VALUE}}"
            ]
        ]);
        $this->add_control('social_icon', [
            'label' => esc_html__('Social Icon Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-audio-creator-inner .thumb .team-social-inner li a" => "color: {{VALUE}}",
            ]
        ]);
        $this->add_control('title_hover_color', [
            'label' => esc_html__('Title hover Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-audio-creator-inner .details a:hover" => "color: {{VALUE}}",
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
            'post_type' => 'product',
            'posts_per_page' => $total_posts,
            'order' => $order,
            'orderby' => $orderby,
            'post_status' => 'publish'
        );

        if (!empty($category)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'term_id',
                    'terms' => $category
                )
            );
        }
        $post_data = new \WP_Query($args);
        ?>
        <div class="infotek-rtl-slider audio-creator-slider-area">
            <div class="audio-creator-slider" id="audio-creator-one-carousel-<?php echo esc_attr($rand_numb); ?>" data-settings='<?php echo json_encode($slider_settings) ?>'>
                <?php while ($post_data->have_posts()) : $post_data->the_post();
                    $product_single_meta_data = get_post_meta(get_the_ID(), 'infotek_product_options', true);
                    $product_audio_img = isset($product_single_meta_data['product_audio_img']) && !empty($product_single_meta_data['product_audio_img']) ? $product_single_meta_data['product_audio_img'] : '';
                    $product_subtitle = isset($product_single_meta_data['product_subtitle']) && !empty($product_single_meta_data['product_subtitle']) ? $product_single_meta_data['product_subtitle'] : '';
                    $product_audio_list = isset($product_single_meta_data['product_audio_list']) && !empty($product_single_meta_data['product_audio_list']) ? $product_single_meta_data['product_audio_list'] : '';
                    if (!empty($product_audio_list)) {
                        $link = $product_audio_list;
                    }else {
                        $link = "http://physical-authority.surge.sh/music/2.mp3";
                    }
                ?>
                <div class="single-audio-creator-inner <?php echo $settings['creator_style']; ?>">  
                    <?php if (!empty($product_audio_img['url'])) { ?>
                        <div class="thumb"> 
                            <img src="<?php echo $product_audio_img['url']; ?>" alt="img">
                            <?php if ($settings['creator_style'] == 'creator-style-2'): ?>
                                <audio src="<?php echo esc_url($link); ?>"></audio>
                            <?php endif ?>
                        </div>
                    <?php } ?>
                    <div class="details">   
                        <h4><a href="<?php echo get_the_permalink(); ?>"><?php  echo get_the_title(); ?></a></h4>
                        <p><?php echo $product_subtitle; ?></p>
                        <audio src="<?php echo esc_url($link); ?>"></audio>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <div class="col-md-12">
                <div class="slick-carousel-controls slider-control-right-top d-inline-flex <?php echo $settings['right_arrow_class']; ?>">
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

Plugin::instance()->widgets_manager->register_widget_type(new Infotek_Audio_Creator_Slider_Widget());