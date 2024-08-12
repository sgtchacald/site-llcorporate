<?php
/**
 * Elementor Widget
 * @package infotek
 * @since 1.0.0
 */

namespace Elementor;

class Infotek_Banner_Slider_One_Widget extends Widget_Base
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
        return 'infotek-banner-slider-one';
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
        return esc_html__('Banner Slider One', 'infotek-core');
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

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'banner_bg_img',
            [
                'label' => esc_html__('banner bg img', 'infotek-core'),
                'type' => Controls_Manager::MEDIA,
            ]
        );
        $repeater->add_control(
            'banner_one_title',
            [
                'label' => esc_html__('Title', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Bring Your Music To Life', 'infotek-core'),
            ]
        );
        $repeater->add_control(
            'banner_one_description',
            [
                'label' => esc_html__('Description', 'infotek-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('DJ music, often referred to as electronic dance music (EDM), is a genre of music that is primarily created and performed', 'infotek-core'),
                'description' => esc_html__('enter title. use {c} color text {/c} for color text', 'infotek-core'),
            ]
        );
        $repeater->add_control(
            'btn_text',
            [
                'label' => esc_html__('btn text', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Trending Song', 'infotek-core'),
            ]
        );
        $repeater->add_control(
            'btn_url',
            [
                'label' => esc_html__('btn url', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('#', 'infotek-core'),
            ]
        );
        $this->add_control('banner_items', [
            'label' => esc_html__('Banner Slider Item', 'infotek-core'),
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

        $all_banner_items = $settings['banner_items'];
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
        <div class="banner-slider-one-area">
            <div class="banner-slider-one infotek-rtl-slider">
                <div class="banner-slider" id="banner-slider-one-carousel-<?php echo esc_attr($rand_numb); ?>" data-settings='<?php echo json_encode($slider_settings) ?>'>
                    <?php foreach ($all_banner_items as $banner_item): ?>
                        <div class="banner-item">
                            <div class="banner-area-2 bg-cover" style="background-image: url('<?php echo $banner_item['banner_bg_img']['url']; ?>');">
                                <div class="row">
                                    <div class="col-xl-5 col-lg-7">
                                        <div class="banner-inner pe-xl-5 me-xl-5">
                                            <h2><?php echo $banner_item['banner_one_title']; ?></h2>
                                            <p><?php echo $banner_item['banner_one_description']; ?></p>
                                            <a class="btn btn-border-base" href="<?php echo $banner_item['btn_url']; ?>"><?php echo $banner_item['btn_text']; ?></a>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div> 
                <?php if (!empty($settings['nav'])) : ?>
                    <div class="slick-carousel-controls nav-wrapper">
                        <div class="slider-nav"></div>
                    </div>
                <?php endif; ?>
            </div>  
        </div>  

        <div class="banner-bottom-fixed-audio">
            <div class="audio-list-wrap">
                <?php
                    //setup query
                    $args_2 = array(
                        'post_type' => 'product',
                        'posts_per_page' => 1,
                        'order' => 'DESC',
                        'post_status' => 'publish'
                    );
                    $post_data_2 = new \WP_Query($args_2);
                ?>
                <?php while ($post_data_2->have_posts()) : $post_data_2->the_post();

                    $product_single_meta_data = get_post_meta(get_the_ID(), 'infotek_product_options', true);
                    $product_audio_img = isset($product_single_meta_data['product_audio_img']) && !empty($product_single_meta_data['product_audio_img']) ? $product_single_meta_data['product_audio_img'] : '';
                    $product_subtitle = isset($product_single_meta_data['product_subtitle']) && !empty($product_single_meta_data['product_subtitle']) ? $product_single_meta_data['product_subtitle'] : '';
                    $product_audio_list = isset($product_single_meta_data['product_audio_list']) && !empty($product_single_meta_data['product_audio_list']) ? $product_single_meta_data['product_audio_list'] : '';
                    $download_text = isset($product_single_meta_data['download_text']) && !empty($product_single_meta_data['download_text']) ? $product_single_meta_data['download_text'] : '';
                    if (!empty($product_audio_list)) {
                        $link = $product_audio_list;
                    }else {
                        $link = "http://physical-authority.surge.sh/music/2.mp3";
                    }
                ?>
                    <div class="single-audio-list-inner mb-0 border-radius-0">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3 align-self-center">
                                    <div class="media">
                                        <?php if (!empty($product_audio_img['url'])) { ?>
                                            <div class="media-left me-3">
                                                <img src="<?php echo $product_audio_img['url']; ?>" alt="img">
                                            </div>
                                        <?php } ?>
                                        <div class="media-body align-self-center">
                                            <h5><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>
                                            <p class="mb-0"><?php echo $product_subtitle; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 align-self-center">
                                    <div class="audio-area-wrap text-center">
                                        <div class="audio-list-wrap d-inline-block">
                                            <audio src="<?php echo $link; ?>"></audio>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 align-self-center text-lg-end">
                                    <div class="download-area">
                                        <div class="btn-text">
                                            <span class="mb-0">Auto : Height</span>
                                            <div class="wishlist">
                                                <?php 
                                                    if (!empty("[ti_wishlists_addtowishlist]")) {
                                                        echo do_shortcode("[ti_wishlists_addtowishlist]");
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        <a href="<?php echo get_the_permalink(); ?>" class="download text-center">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M14.8 18.4001H9.99996C9.66836 18.4001 9.39996 18.1317 9.39996 17.8001C9.39996 17.4685 9.66836 17.2001 9.99996 17.2001H14.8C15.7926 17.2001 16.6 16.3927 16.6 15.4001V4.6001C16.6 3.6075 15.7926 2.8001 14.8 2.8001H9.99996C9.66836 2.8001 9.39996 2.5317 9.39996 2.2001C9.39996 1.8685 9.66836 1.6001 9.99996 1.6001H14.8C16.4542 1.6001 17.8 2.9459 17.8 4.6001V15.4001C17.8 17.0543 16.4542 18.4001 14.8 18.4001ZM12.8242 9.5759L9.82416 6.5759C9.58976 6.3415 9.21016 6.3415 8.97576 6.5759C8.74136 6.8103 8.74136 7.1899 8.97576 7.4243L10.9516 9.4001H2.79995C2.46835 9.4001 2.19995 9.6685 2.19995 10.0001C2.19995 10.3317 2.46835 10.6001 2.79995 10.6001H10.9516L8.97576 12.5759C8.74136 12.8103 8.74136 13.1899 8.97576 13.4243C9.09296 13.5415 9.24636 13.6001 9.39996 13.6001C9.55356 13.6001 9.70696 13.5415 9.82416 13.4243L12.8242 10.4243C13.0586 10.1899 13.0586 9.8103 12.8242 9.5759Z" fill="#686868"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                <?php endwhile; ?>
            </div>
        </div>

        <?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new Infotek_Banner_Slider_One_Widget());