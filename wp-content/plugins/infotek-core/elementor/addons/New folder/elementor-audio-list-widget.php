<?php
/**
 * Elementor Widget
 * @package infotek
 * @since 1.0.0
 */

namespace Elementor;

class Infotek_Audio_List_Widget extends Widget_Base
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
        return 'infotek-audio-list-widget';
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
        return esc_html__('Audio List', 'infotek-core');
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
        <div class="audio-list-wrap">
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
                <div class="single-audio-list-inner">
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
                            <div class="audio-list-wrap">
                                <audio src="<?php echo $link; ?>"></audio>
                            </div>
                        </div>
                        <div class="col-lg-3 align-self-center text-lg-end">
                            <div class="download-area">
                                <div class="btn-text">
                                    <span class="mb-0"><?php echo $download_text; ?></span>
                                    <div class="wishlist">
                                        <?php 
                                            if (!empty("[ti_wishlists_addtowishlist]")) {
                                                echo do_shortcode("[ti_wishlists_addtowishlist]");
                                            }
                                        ?>
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

Plugin::instance()->widgets_manager->register_widget_type(new Infotek_Audio_List_Widget());