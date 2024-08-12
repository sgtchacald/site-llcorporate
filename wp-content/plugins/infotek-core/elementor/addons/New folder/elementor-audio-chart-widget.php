<?php
/**
 * Elementor Widget
 * @package Infotek
 * @since 1.0.0
 */

namespace Elementor;
class Infotek_Audio_Chart_Widget extends Widget_Base
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
        return 'infotek-theme-audio-chart-widget';
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
        return esc_html__('Audio Chart', 'infotek-core');
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
            'title',
            [
                'label' => esc_html__('Title', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Monthly Top Chart', 'infotek-core'),
            ]
        );
        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__('btn text', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('View all', 'infotek-core'),
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

        <div class="audio-chart-list-area">
			<?php if(!empty($settings['title'])){ ?>	
            <div class="chart-title">
                <div class="row">
                    <div class="col-lg-8 align-self-center">
                        <h4 class="mb-sm-0 mb-3"><?php echo $settings['title']; ?></h4>
                    </div>
                    <div class="col-lg-4 align-self-center text-lg-end mt-3 mt-xl-0">
                        <a class="btn btn-border-white border-radius-30" href="<?php echo $settings['btn_url']; ?>"><?php echo $settings['btn_text']; ?></a>
                    </div>
                </div>
            </div>
			<?php } ?>
            <ul class="banner-audio-list">
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

        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Infotek_Audio_Chart_Widget());