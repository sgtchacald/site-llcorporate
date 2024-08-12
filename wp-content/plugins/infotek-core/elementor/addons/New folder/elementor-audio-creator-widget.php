<?php
/**
 * Elementor Widget
 * @package Sword
 * @since 1.0.0
 */

namespace Elementor;
class Infotek_Audio_Creator_Widget extends Widget_Base
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
        return 'infotek-audio-creator-widget';
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
        return esc_html__('Audio Creator', 'infotek-core');
    }

    public function get_keywords()
    {
        return ['Audio Creator', 'Images', 'Effect', "HugeBinary", 'Infotek'];
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
        return 'eicon-gallery-grid';
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
        $this->add_control('audio_grid', [
            'label' => esc_html__('Audio Grid', 'infotek-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'col-lg-2' => esc_html__('col-lg-2', 'infotek-core'),
                'col-lg-3' => esc_html__('col-lg-3', 'infotek-core'),
                'col-lg-4' => esc_html__('col-lg-4', 'infotek-core'),
                'col-lg-6' => esc_html__('col-lg-6', 'infotek-core'),
            ),
            'default' => 'col-lg-3',
            'description' => esc_html__('Select Audio Grid', 'infotek-core')
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
            'default' => 'DESC',
            'description' => esc_html__('select order', 'infotek-core')
        ]);

        $this->end_controls_section();
        // End Content Section

        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Style Settings', 'infotek-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control('title_color', [
            'label' => esc_html__('Title Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-audio-creator-inner .details h4" => "color: {{VALUE}}",
            ]
        ]);
        $this->add_control('subtitle_color', [
            'label' => esc_html__('subtitle Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-audio-creator-inner .details p" => "color: {{VALUE}}",
            ]
        ]);
        $this->add_control('icon_border_color', [
            'label' => esc_html__('Icon Border Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-audio-creator-inner .details .audioplayer-playpause" => "border-color: {{VALUE}}",
            ]
        ]);
        $this->add_control('icon_color', [
            'label' => esc_html__('Icon Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-audio-creator-inner .details .audioplayer-playpause a" => "border-left: 12px solid {{VALUE}}",
            ]
        ]);
        $this->add_control(
            'icon_size',
            [
                'type' => Controls_Manager::SLIDER,
                'label' => esc_html__('Icon Size', 'infotek-core'),
                'size_units' => ['px', 'em'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 200,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    "{{WRAPPER}} .gallery-icon" => "font-size: {{SIZE}}{{UNIT}};"
                ]
            ]
        );
        $this->end_controls_section();
        // End Content Section

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
        $order = $settings['order'];
        $category = $settings['category'];
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
                if (!empty($product_audio_list)) {
                    $link = $product_audio_list;
                }else {
                    $link = "http://physical-authority.surge.sh/music/2.mp3";
                }

                ?>
            <div class="<?php echo esc_attr($settings['audio_grid']); ?> col-sm-6">
                <div class="single-audio-creator-inner">  
                    <?php if (!empty($product_audio_img['url'])) { ?>
                        <div class="thumb"> 
                            <img src="<?php echo $product_audio_img['url']; ?>" alt="img">
                        </div>
                    <?php } ?>
                    <div class="details">   
                        <h4><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
                        <p><?php  echo $product_subtitle; ?></p>
                        <audio src="<?php echo esc_url($link); ?>"></audio>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>  
        <?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new Infotek_Audio_Creator_Widget());