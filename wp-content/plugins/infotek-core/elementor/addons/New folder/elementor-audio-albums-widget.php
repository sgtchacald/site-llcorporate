<?php
/**
 * Elementor Widget
 * @package infotek
 * @since 1.0.0
 */

namespace Elementor;

class Infotek_Audio_Albums_Widget extends Widget_Base
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
        return 'infotek-audio-albums-widget';
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
        return esc_html__('Audio Albums', 'infotek-core');
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
        $this->add_control('audio_grid', [
            'label' => esc_html__('Audio Grid', 'infotek-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'col-lg-2' => esc_html__('col-lg-2', 'infotek-core'),
                'col-lg-3' => esc_html__('col-lg-3', 'infotek-core'),
                'col-lg-4' => esc_html__('col-lg-4', 'infotek-core'),
                'col-lg-6' => esc_html__('col-lg-6', 'infotek-core'),
            ),
            'default' => 'col-lg-4',
            'description' => esc_html__('Select Audio Grid', 'infotek-core')
        ]);
        $this->add_control(
            'category_bg_img',
            [
                'label' => esc_html__('category bg img', 'infotek-core'),
                'type' => Controls_Manager::MEDIA,
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
        $settings = $this->get_settings_for_display(); ?>

        
        <section class="product-area">
            <div class="row">
                <div class="col-lg-3">
                    <div class="trending-area-nav trending-area-nav-albums mb-xl-5 mb-4">
                        <ul class="product-trending-nav nav nav-pills" id="pills-tab" role="tablist">
                            <?php
                                $taxonomy = 'product_cat';
                                $terms = get_terms($taxonomy);
                                if ( $terms && !is_wp_error( $terms ) ) :
                                $i = 0;
                                $k = 0;
                                foreach ( $terms as $term ) {  
                                    if ($i < 1) {
                                       $active = 'active'; 
                                    }else {
                                        $active = ''; 
                                    }
                                    $term_name = $term->name;
                                    $term_name_slug = str_replace(' ', '', $term_name); ?>

                                    <?php if ($k <= 5) { ?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link <?php echo $active; ?>" id="pills-<?php echo $term_name_slug; ?>" data-bs-toggle="pill" data-bs-target="#<?php echo $term_name_slug; ?>" type="button" role="tab" aria-controls="<?php echo $term_name_slug; ?>" aria-selected="true">
                                                <img src="<?php echo $settings['category_bg_img']['url'] ?>" alt="img">
                                                <span><?php echo $term->name; ?> </span>
                                            </button>
                                        </li>
                                    <?php } ?>
                                <?php $i++; $k++; } ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="tab-content" id="pills-tabContent">
                        <?php
                        $taxonomy = 'product_cat';
                        $terms = get_terms($taxonomy); // Get all terms of a taxonomy

                        if ( $terms && !is_wp_error( $terms ) ) :
                            $j = 0;
                            foreach ( $terms as $term ) {
                                $j++;
                                if ($j < 2) {
                                   $actives = 'active'; 
                                }else {
                                    $actives = ''; 
                                }   

                                global $product;
                                $term_name = $term->name;
                                $term_name_slug = str_replace(' ', '', $term_name); ?>

                                <div class="tab-pane fade show  <?php echo $actives; ?>" id="<?php echo $term_name_slug; ?>" role="tabpanel" aria-labelledby="pills-<?php echo $term_name_slug; ?>">
                                    <div class="row">
                                        <?php if($term->count > 0) : ?>
                                            <?php $query = new \WP_Query( array(
                                                'post_type'      => 'product',
                                                'post_status'    => 'publish',
                                                'posts_per_page' => 6,
                                                'tax_query'      => array( array(
                                                    'taxonomy'   => 'product_cat',
                                                    'field'      => 'term_id',
                                                    'terms'      => array( $term->term_id ),
                                                ) )
                                            ));

                                            while ( $query->have_posts() ) : $query->the_post();
                                                $product_single_meta_data = get_post_meta(get_the_ID(), 'infotek_product_options', true);
                                                $product_audio_img = isset($product_single_meta_data['product_audio_img']) && !empty($product_single_meta_data['product_audio_img']) ? $product_single_meta_data['product_audio_img'] : '';
                                                $product_subtitle = isset($product_single_meta_data['product_subtitle']) && !empty($product_single_meta_data['product_subtitle']) ? $product_single_meta_data['product_subtitle'] : '';
                                                $product_audio_list = isset($product_single_meta_data['product_audio_list']) && !empty($product_single_meta_data['product_audio_list']) ? $product_single_meta_data['product_audio_list'] : '';
                                                $download_text = isset($product_single_meta_data['download_text']) && !empty($product_single_meta_data['download_text']) ? $product_single_meta_data['download_text'] : '';
                                                if (!empty($product_audio_list)) {
                                                    $link = $product_audio_list;
                                                }else {
                                                    $link = "http://physical-authority.surge.sh/music/2.mp3";
                                                } ?>
                                                <div class="<?php echo esc_attr($settings['audio_grid']); ?> col-sm-6">
                                                    <div class="single-audio-creator-inner">  
                                                        <?php if (!empty($product_audio_img['url'])) { ?>
                                                            <div class="thumb"> 
                                                                <img src="<?php echo $product_audio_img['url']; ?>" alt="img">
                                                            </div>
                                                        <?php } ?>
                                                        <div class="details">   
                                                            <h4><a href="<?php echo get_the_permalink(); ?>"><?php  echo get_the_title(); ?></a></h4>
                                                            <p><?php  echo $product_subtitle; ?></p>
                                                            <audio src="<?php echo esc_url($link); ?>"></audio>
                                                        </div>
                                                    </div>
                                                </div> 
                                            <?php endwhile;
                                            wp_reset_postdata();
                                        endif; ?>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Infotek_Audio_Albums_Widget());