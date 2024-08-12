<?php
/**
 * Elementor Widget
 * @package Infotek
 * @since 1.0.0
 */

namespace Elementor;
class Infotek_Banner_One_Widget extends Widget_Base
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
        return 'infotek-theme-banner-one-widget';
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
        return esc_html__('Banner One', 'infotek-core');
    }

    public function get_keywords()
    {
        return ['Section', 'Banner', 'Title', "HugeBinary", 'Infotek'];
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
        return 'eicon-banner';
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
            'banner_one_content_settings_section',
            [
                'label' => esc_html__('Content Settings', 'infotek-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'banner_bg_img',
            [
                'label' => esc_html__('banner bg img', 'infotek-core'),
                'type' => Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'banner_one_title',
            [
                'label' => esc_html__('Title', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Music for Every Beat of Life', 'infotek-core'),
            ]
        );
        $this->add_control(
            'banner_one_description',
            [
                'label' => esc_html__('Description', 'infotek-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('DJ music, often referred to as electronic dance music (EDM), is a genre of music that is primarily created and performed', 'infotek-core'),
                'description' => esc_html__('enter title. use {c} color text {/c} for color text', 'infotek-core'),
            ]
        );
        $this->add_control(
            'banner_list_one',
            [
                'label' => esc_html__('list 1', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('320k MP3', 'infotek-core'),
            ]
        );
        $this->add_control(
            'banner_list_two',
            [
                'label' => esc_html__('list 2', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Listen offline', 'infotek-core'),
            ]
        );
        $this->add_control(
            'banner_list_three',
            [
                'label' => esc_html__('list 3', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('3X faster', 'infotek-core'),
            ]
        );

        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__('btn text', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Trending Song', 'infotek-core'),
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label' => esc_html__('btn url', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('#', 'infotek-core'),
            ]
        );
        $this->add_control(
            'banner_main_img',
            [
                'label' => esc_html__('banner main img', 'infotek-core'),
                'type' => Controls_Manager::MEDIA,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'banner_one_audio_section',
            [
                'label' => esc_html__(' Settings', 'infotek-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'audio-right-title',
            [
                'label' => esc_html__('audio-right-title', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Top Chart Music', 'infotek-core'),
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
            'options' => Infotek()->get_terms_names('product_cat', 'id'),
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
        $this->end_controls_section(); 

        $this->start_controls_section(
            'banner_fixed_audio_section',
            [
                'label' => esc_html__(' Audio Fixed', 'infotek-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'fixed_img',
            [
                'label' => esc_html__('fixed img', 'infotek-core'),
                'type' => Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'fixed-title',
            [
                'label' => esc_html__('afixed title', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Kasol', 'infotek-core'),
            ]
        );
        $this->add_control(
            'fixed-subtitle',
            [
                'label' => esc_html__('fixed subtitle', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('kasol', 'infotek-core'),
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
            'options' => Infotek()->get_terms_names('product_cat', 'id'),
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
        //query settings
        $total_posts = $settings['total'];
        $category = $settings['category'];
        $order = $settings['order'];

        //setup query
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => $total_posts,
            'order' => $order,
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

        <div class="banner-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-8">
                        <div class="row">
                            <div class="banner-area1-wrap">
                                <div class="banner-area-1 bg-cover" style="background-image: url('<?php echo $settings['banner_bg_img']['url']; ?>');">
                                    <div class="row">
                                        <div class="col-xl-7">
                                            <div class="banner-1-content">
                                                <h2><?php echo $settings['banner_one_title']; ?></h2>
                                                <p><?php echo $settings['banner_one_description']; ?></p>
                                                <ul class="pb-0">
                                                    <li><i class="fa fa-check"></i> <?php echo $settings['banner_list_one']; ?></li>
                                                    <li><i class="fa fa-check"></i> <?php echo $settings['banner_list_two']; ?></li>
                                                    <li><i class="fa fa-check"></i> <?php echo $settings['banner_list_three']; ?></li>
                                                </ul>
                                                <?php
                                                    $audio_url = $settings['audio_url'];
                                                    if (!empty($audio_url)) {
                                                        $audio_url_link = $audio_url;
                                                    }else {
                                                        $audio_url_link = "http://physical-authority.surge.sh/music/2.mp3";
                                                    }
                                                ?>
                                                <div class="btn-wrap mt-5">
                                                    <a class="btn btn-border-white border-radius-30" href="<?php echo $settings['btn_url']; ?>"><?php echo $settings['btn_text']; ?></a>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="col-xl-5 align-self-end justify-content-end d-none d-xl-block">
                                            <div class="thumb">
                                                <img src="<?php echo $settings['banner_main_img']['url']; ?>" alt="img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 mt-lg-0 mt-4">
                        <ul class="banner-audio-list">
                            <li><h4><?php echo $settings['audio-right-title']; ?></h4></li>
                            <?php
                                while ($post_data->have_posts()) : $post_data->the_post();
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
                                    <li>
                                       <div class="media">
                                            <?php if (!empty($product_audio_img['url'])) { ?>
                                                <div class="media-left me-3">
                                                    <img src="<?php echo $product_audio_img['url']; ?>" alt="img">
                                                </div>
                                            <?php } ?>
                                            <div class="media-body align-self-center">
                                                <h5><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>
                                                <p class="mb-0"><?php echo $product_subtitle; ?></p>
                                                <div class="audio-list-wrap">
                                                    <audio src="<?php echo $link; ?>"></audio>
                                                </div>
                                            </div>
                                        </div>
                                    </li> 
                                <?php endwhile; 
                            ?>
                        </ul>  
                    </div>
                </div>
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

Plugin::instance()->widgets_manager->register_widget_type(new Infotek_Banner_One_Widget());