<?php
/**
 * Elementor Widget
 * @package infotek
 * @since 1.0.0
 */

namespace Elementor;

class Infotek_Audio_List_Single_Widget extends Widget_Base
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
        return 'infotek-audio-list-single-widget';
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
        return esc_html__('Audio List Single', 'infotek-core');
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
        $post_data = new \WP_Query($args); ?>

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
                <div class="audio-list-single-wrap">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 align-self-center">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="<?php echo $product_audio_img['url']; ?>" alt="img">
                                    </div>
                                    <div class="media-body align-self-center">
                                        <h5><?php echo get_the_title(); ?></h5>
                                        <p class="mb-0"><?php echo $product_subtitle; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9 align-self-center">
                                <div class="audio-list-wrap">
                                    <audio src="<?php echo $link; ?>"></audio>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  

                <style>
                    .audio-list-single-wrap {
                        padding: 20px 0;
                    }
                    .audio-list-single-wrap .media {
                      position: relative;
                      z-index: 2;
                    }
                    .audio-list-single-wrap .media .media-left {
                      border-right: 1px solid #bdbdbd99;
                      padding-right: 40px;
                      margin-right: 40px;
                    }
                    .audio-list-single-wrap .media .media-left img {
                      height: 55px;
                      width: 55px;
                      border-radius: 50%;
                    }
                    .audio-list-single-wrap .media .media-body h5 {
                      margin-bottom: 4px;
                      color: #fff;
                      font-size: 18px;
                    }
                    .audio-list-single-wrap .media .media-body p {
                      color: #fff;
                    }
                    .audio-list-single-wrap .audio-list-wrap {
                      padding: 0 0 0 15px;
                      position: relative;
                      z-index: 2;
                      color: #fff;
                    }
                    .audio-list-single-wrap .audio-list-wrap .audioplayer {
                      margin: 0;
                      padding: 0;
                      height: auto;
                      border: 0;
                      border-radius: 0;
                      background: transparent;
                    }
                    .audio-list-single-wrap .audio-list-wrap .audioplayer:not(.audioplayer-playing) .audioplayer-playpause {
                      border: 1px solid #D9D9D9;
                    }
                    .audio-list-single-wrap .audio-list-wrap .audioplayer:not(.audioplayer-playing) .audioplayer-playpause a {
                        border-left: 12px solid #ffffff;
                    }
                    .audio-list-single-wrap .audio-list-wrap .audioplayer-time {
                        color: #ffffff;
                    }
                    .audio-list-single-wrap .audio-list-wrap  .audioplayer-bar::before {
                        background-color: #ffffff40;
                    }
                    .audio-list-single-wrap .audio-list-wrap .audioplayer-bar-loaded {
                        background: #ffffff;
                    }
                    .audio-list-single-wrap .audio-list-wrap .audioplayer:not(.audioplayer-playing) .audioplayer-bar-played::after {
                      display: none;
                    }
                    .audio-list-single-wrap .audio-list-wrap .audioplayer-volume-adjust div div {
                        background-color: #ffffff;
                    }
                </style>
            <?php endwhile; 
        ?>

        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Infotek_Audio_List_Single_Widget());