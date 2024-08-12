<?php
/**
 * Elementor Widget
 * @package infotek
 * @since 1.0.0
 */

namespace Elementor;

class Infotek_Audio_List_Two_Widget extends Widget_Base
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
        return 'infotek-audio-list-two-widget';
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
        return esc_html__('Audio List Two', 'infotek-core');
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
                'label' => esc_html__('Audio Settings', 'infotek-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
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
                    'start' => esc_html__('Left Align', 'infotek-core'),
                    'center' => esc_html__('Center Align', 'infotek-core'),
                    'end' => esc_html__('Right Align', 'infotek-core'),
                ),
                'description' => esc_html__('you can set pagination alignment.', 'infotek-core'),
                'default' => 'end',
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


        //Style tab style
        $this->start_controls_section(
            'style_settings_section',
            [
                'label' => esc_html__('Style Settings', 'infotek-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control('bg_color', [
            'label' => esc_html__('bg Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-audio-list-inner" => "background: {{VALUE}}"
            ]
        ]);
        $this->add_control('title_color', [
            'label' => esc_html__('Title Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-audio-list-inner .media .media-body h5" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('content_color', [
            'label' => esc_html__('content Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-audio-list-inner .media .media-body p" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('border_color', [
            'label' => esc_html__('border Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-audio-list-inner .media" => "border-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('border_hover_color', [
            'label' => esc_html__('border Hover Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-audio-list-inner:hover .media" => "border-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('audioplayer_time_color', [
            'label' => esc_html__('audioplayer time Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-audio-list-inner .audio-list-wrap .audioplayer-time" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('audioplayer_bar_loaded_color', [
            'label' => esc_html__('audioplayer bar loaded Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .audioplayer-bar-loaded" => "background: {{VALUE}}"
            ]
        ]);
        $this->add_control('tab_active_color', [
            'label' => esc_html__('Tab Active Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .audio-tab-inner li button.active" => "color: {{VALUE}} !important;"
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

        //query settings
        $total_posts = $settings['total'];
        $category = $settings['category'];
        $order = $settings['order'];
        //other settings
        $pagination = $settings['pagination'] ? false : true;
        $pagination_alignment = $settings['pagination_alignment'];
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
        <div class="row">
            <?php while ($post_data->have_posts()) : $post_data->the_post();
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
                <div class="col-lg-4 col-md-6">
                    <div class="single-audio-grid-inner">
                        <div class="thumb">
                            <svg width="450" height="37" viewBox="0 0 450 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.457282 18.1372C0.204732 18.1372 -8.94913e-09 18.3419 -1.99884e-08 18.5945C-3.10277e-08 18.847 0.204732 19.0518 0.457282 19.0518L35.9743 19.0518L35.9743 18.1372L0.457282 18.1372Z" fill="#4a4a4a"/>
                                <rect width="1.2848" height="3.65826" rx="0.642399" transform="matrix(1 0 0 -1 35.9741 20.4238)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="6.85923" rx="0.642399" transform="matrix(1 0 0 -1 44.968 22.0239)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="13.0325" rx="0.642399" transform="matrix(1 0 0 -1 53.9614 25.1104)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="17.1481" rx="0.642399" transform="matrix(1 0 0 -1 62.9551 27.1685)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="21.7209" rx="0.642399" transform="matrix(1 0 0 -1 71.9482 29.4546)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="26.751" rx="0.642399" transform="matrix(1 0 0 -1 80.9421 31.9702)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="31.3238" rx="0.642399" transform="matrix(1 0 0 -1 89.9358 34.2559)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="31.3238" rx="0.642399" transform="matrix(1 0 0 -1 98.9292 34.2559)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="27.8942" rx="0.642399" transform="matrix(1 0 0 -1 107.923 32.5415)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="23.55" rx="0.642399" transform="matrix(1 0 0 -1 116.917 30.3691)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="19.2059" rx="0.642399" transform="matrix(1 0 0 -1 125.91 28.1973)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="13.2612" rx="0.642399" transform="matrix(1 0 0 -1 134.903 25.2251)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="7.08787" rx="0.642399" transform="matrix(1 0 0 -1 143.897 22.1387)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="13.9471" rx="0.642399" transform="matrix(1 0 0 -1 152.891 25.5679)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="18.2913" rx="0.642399" transform="matrix(1 0 0 -1 161.885 27.7397)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="22.4068" rx="0.642399" transform="matrix(1 0 0 -1 170.878 29.7979)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="26.5224" rx="0.642399" transform="matrix(1 0 0 -1 179.871 31.856)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="32.9243" rx="0.642399" transform="matrix(1 0 0 -1 188.865 35.0566)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="27.8942" rx="0.642399" transform="matrix(1 0 0 -1 197.859 32.5415)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="32.9243" rx="0.642399" transform="matrix(1 0 0 -1 206.852 35.0566)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="36.8112" rx="0.642399" transform="matrix(1 0 0 -1 215.846 37)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="36.5826" rx="0.642399" transform="matrix(1 0 0 -1 224.84 36.8853)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="24.0073" rx="0.642399" transform="matrix(1 0 0 -1 233.833 30.5981)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="31.7811" rx="0.642399" transform="matrix(1 0 0 -1 242.827 34.4854)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="27.4369" rx="0.642399" transform="matrix(1 0 0 -1 251.82 32.3125)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="22.8641" rx="0.642399" transform="matrix(1 0 0 -1 260.814 30.0264)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="17.6054" rx="0.642399" transform="matrix(1 0 0 -1 269.808 27.397)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="11.2034" rx="0.642399" transform="matrix(1 0 0 -1 278.801 24.1958)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="17.6054" rx="0.642399" transform="matrix(1 0 0 -1 287.794 27.397)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="27.4369" rx="0.642399" transform="matrix(1 0 0 -1 296.788 32.3125)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="22.4068" rx="0.642399" transform="matrix(1 0 0 -1 305.782 29.7979)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="16.9194" rx="0.642399" transform="matrix(1 0 0 -1 314.775 27.0537)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="12.118" rx="0.642399" transform="matrix(1 0 0 -1 323.769 24.6533)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="16.0049" rx="0.642399" transform="matrix(1 0 0 -1 332.762 26.5972)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="20.1204" rx="0.642399" transform="matrix(1 0 0 -1 341.756 28.6543)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="17.3767" rx="0.642399" transform="matrix(1 0 0 -1 350.75 27.2827)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="20.5777" rx="0.642399" transform="matrix(1 0 0 -1 359.743 28.8833)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="16.4622" rx="0.642399" transform="matrix(1 0 0 -1 368.737 26.8252)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="13.2612" rx="0.642399" transform="matrix(1 0 0 -1 377.731 25.2251)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="9.37428" rx="0.642399" transform="matrix(1 0 0 -1 386.724 23.2817)" fill="#4a4a4a"/>
                                <rect width="1.2848" height="9.37428" rx="0.642399" transform="matrix(1 0 0 -1 395.718 23.2817)" fill="#4a4a4a"/>
                                <path d="M397.002 18.1372L397.002 19.0518L449.543 19.0518C449.795 19.0518 450 18.847 450 18.5945C450 18.3419 449.795 18.1372 449.543 18.1372L397.002 18.1372Z" fill="#4a4a4a"/>
                            </svg>
                        </div>
                        <div class="details">
                            <div class="audio-list-wrap">
                                <audio src="<?php echo $link; ?>"></audio>
                            </div>
                            <h5><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>
                            <p class="mb-0"><?php echo $product_subtitle; ?></p>
                            <div class="tag-inner">
                                <span>Happy</span>
                                <span>Mellow</span>
                                <span>Cool</span>
                            </div>
                            <div class="download-area">
                                <div class="btn-text">
                                    <span class="mb-0"><?php echo $download_text; ?></span>
                                    <div class="wishlist">
                                        <?php echo do_shortcode("[ti_wishlists_addtowishlist]") ?>
                                    </div>
                                </div>
                                <?php   
                                    global $product;                                        
                                    $downloads = $product->get_files();
                                    if (!empty($downloads)) {
                                        foreach( $downloads as $key => $download ) { ?>
                                            <a href="<?php echo esc_url( $download['file'] ); ?>" class="download text-center" download>
                                                <i class="fas fa-download"></i>
                                            </a>
                                        <?php } 
                                    }else { ?>
                                        <span class="download download-mute text-center" download>
                                            <i class="fas fa-download"></i>
                                        </span>
                                    <?php }
                                ?>
                            </div>
                        </div>
                    </div>  
                </div>
            <?php endwhile; ?>

            <div class="blog-pagination text-<?php echo esc_attr($pagination_alignment) ?> margin-top-20">
                <?php
                if (!$pagination) {
                    Infotek()->post_pagination($post_data);
                }
                ?>
            </div>
        </div>

        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Infotek_Audio_List_Two_Widget());