<?php
/**
 * Elementor Widget
 * @package infotek
 * @since 1.0.0
 */

namespace Elementor;

class Infotek_Audio_Category_List_Widget extends Widget_Base
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
        return 'infotek-audio-category-list-widget';
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
        return esc_html__('audio category list', 'infotek-core');
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

        <ul class="audio-category-list p-0 m-0">
            <?php
                $taxonomy = 'product_cat';
                $terms = get_terms($taxonomy); // Get all terms of a taxonomy
                if ( $terms && !is_wp_error( $terms ) ) :
                    $i = 0;
                    foreach ( $terms as $term ) { 
                        $i++;
                        if ($i < 2) {
                            $cat_active = 'cat-active';
                        }else {
                            $cat_active = 'not-active';
                        }
                        $thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
                        $image = wp_get_attachment_url( $thumbnail_id );  ?>    

                        <?php
                        $term_name = $term->name;
                        $term_name_slug = str_replace(' ', '', $term_name);
                    ?>
                    <li>
                        <a class="cat-item <?php echo $cat_active; ?>" href="/wp/infotek/trending-song">
                            <img src="<?php echo $settings['category_bg_img']['url'] ?>" alt="img">
                            <span><?php echo $term->name; ?> </span>
                        </a>
                    </li>
                <?php } ?>
            <?php endif; ?>
        </ul>

        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Infotek_Audio_Category_List_Widget());