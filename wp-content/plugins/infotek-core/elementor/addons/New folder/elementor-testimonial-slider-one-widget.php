<?php
/**
 * Elementor Widget
 * @package infotek
 * @since 1.0.0
 */

namespace Elementor;

class Infotek_Testimonial_Slider_One_Widget extends Widget_Base
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
        return 'infotek-testimonial-slider-one';
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
        return esc_html__('Testimonial Slider One', 'infotek-core');
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
        return 'eicon-slides';
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
        

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'image', [
                'label' => esc_html__('Main Image', 'infotek-core'),
                'type' => Controls_Manager::MEDIA,
                'show_label' => false,
                'description' => esc_html__('Upload Main image', 'infotek-core'),
            ]
        );
        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'infotek-core'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('you can set yes/no to enable/disable', 'infotek-core'),
                'default' => [
                    'value' => 'fas fa-quote-right',
                    'library' => 'solid',
                ],
            ]
        );
        $repeater->add_control(
            'left_image', [
                'label' => esc_html__('left Image', 'infotek-core'),
                'type' => Controls_Manager::MEDIA,
                'show_label' => false,
                'description' => esc_html__('Upload Left image', 'infotek-core'),
            ]
        );
        $repeater->add_control(
            'content', [
                'label' => esc_html__('Content', 'infotek-core'),
                'type' => Controls_Manager::TEXTAREA,
                'show_label' => false,
                'default' => esc_html__('Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC', 'infotek-core'),
                'description' => esc_html__('Upload Content', 'infotek-core'),
            ]
        );
        $repeater->add_control(
            'name', [
                'label' => esc_html__('Name', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Jhon Suria', 'infotek-core'),
                'show_label' => true,
                'description' => esc_html__('upload name', 'infotek-core'),
            ]
        );
        $repeater->add_control(
            'designation', [
                'label' => esc_html__('Designation', 'infotek-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Marketing Coordinator', 'infotek-core'),
                'description' => esc_html__('upload designation', 'infotek-core'),
            ]
        );
        $repeater->add_control(
            'rating', [
                'label' => esc_html__('Rating', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('5', 'infotek-core'),
            ]
        );
        $this->add_control('testimonial_items', [
            'label' => esc_html__('Testimonial Slider Item', 'infotek-core'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                    'image' => array(
                        'url' => Utils::get_placeholder_image_src()
                    )
                ]
            ],
        ]);
        $this->end_controls_section();


        $this->start_controls_section(
            'slider_control_section',
            [
                'label' => esc_html__('Slider Settings', 'infotek-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control('nav_position', [
            'label' => esc_html__('Nav Position', 'infotek-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'style-1' => esc_html__('default', 'infotek-core'),
                'slider-control-right-top' => esc_html__('Top Right', 'infotek-core'),
            ),
            'default' => 'style-1',
            'description' => esc_html__('Select price style', 'infotek-core')
        ]);
        $this->add_control(
            'items',
            [
                'label' => esc_html__('slidesToShow', 'infotek-core'),
                'type' => Controls_Manager::NUMBER,
                'description' => esc_html__('you can set how many item show in slider', 'infotek-core'),
                'default' => '1',
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
            'nav_left_arrow',
            [
                'label' => esc_html__('Nav Left Icon', 'infotek-core'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('you can set yes/no to enable/disable', 'infotek-core'),
                'default' => [
                    'value' => 'fas fa-angle-left',
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
                    'value' => 'fas fa-angle-right',
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
        $this->end_controls_section();

        $this->start_controls_section(
            'brand_member_styling_settings_section',
            [
                'label' => esc_html__('Styling Settings', 'infotek-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'nav_radius',
            [
                'label' => esc_html__('Nav Radius', 'infotek-core'),
                'type' => Controls_Manager::SWITCHER,
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

        $all_testimonial_items = $settings['testimonial_items'];
        $nav_radius = '';
        if($settings['nav_radius'] == 'yes'){ 
            $nav_radius = 'nav-radius-class';
        }

        $rand_numb = rand(333, 999999999);
        //slider settings
        $slider_settings = [
            "loop" => esc_attr($settings['loop']),
            "items" => esc_attr($settings['items'] ?? 1),
            "center" => esc_attr($settings['center']),
            "autoplay" => esc_attr($settings['autoplay']),
            "nav" => esc_attr($settings['nav']),
            "navleft" => infotek_core()->render_elementor_icons($settings['nav_left_arrow']),
            "navright" => infotek_core()->render_elementor_icons($settings['nav_right_arrow'])
        ];
        
        ?>
        <div class="testimonial-slider-one-area">
            <div class="theme-section-title">
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
            </div>
            <div class="testimonial-slider-one infotek-rtl-slider">
                <div class="testimonial-slider" id="testimonial-slider-one-carousel-<?php echo esc_attr($rand_numb); ?>" data-settings='<?php echo json_encode($slider_settings) ?>'>
                    <?php foreach ($all_testimonial_items as $testimonial_item): 
                        $icon = infotek_core()->render_elementor_icons($testimonial_item['icon']);
                        ?>
                        <div class="swiper-slide">
                            <div class="media single-testimonial-inner">
                                <div class="media-left thumb">
                                    <img src="<?php echo $testimonial_item['image']['url']; ?>" alt="img">
                                    <div class="icon mb-2">
                                        <?php echo $icon; ?>
                                    </div>
                                </div>
                                <div class="media-body align-self-center">
                                    <img class="left_img" src="<?php echo $testimonial_item['left_image']['url']; ?>" alt="img">
                                    <div class="ratting-inner color-base">
                                        <?php
                                            for ($i=0; $i < $testimonial_item['rating']; $i++) {  ?>
                                               <i class="fa fa-star"></i>
                                            <?php }
                                        ?>
                                    </div>
                                    <p class="content"><?php echo esc_html($testimonial_item['content']); ?></p>
                                    <h5 class="mb-0"><?php echo esc_html($testimonial_item['name']); ?></h5>
                                    <p class="designation mb-0"><?php echo esc_html($testimonial_item['designation']); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div> 
                <?php if (!empty($settings['nav'])) : ?>
                    <div class="slick-carousel-controls nav-wrapper <?php echo $settings['nav_position']; ?>">
                        <div class="slider-nav"></div>
                    </div>
                <?php endif; ?>
            </div>  
        </div>  

        <?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new Infotek_Testimonial_Slider_One_Widget());