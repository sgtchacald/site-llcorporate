<?php
/**
 * Elementor Widget
 * @package Infotek
 * @since 1.0.0
 */

namespace Elementor;
class Infotek_Footer_Widget extends Widget_Base
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
        return 'infotek-footer-widget';
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
        return esc_html__('Footer', 'infotek-core');
    }

    public function get_keywords()
    {
        return ['Section', 'Navbar', 'Title', "HugeBinary", 'Infotek'];
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
        return 'eicon-heading';
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
                'label' => esc_html__('General Settings', 'agiletech-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
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
        

        $copyright_text = !empty(cs_get_option('copyright_text')) ? cs_get_option('copyright_text'): esc_html__('Copyright © 2023 infotek All Rights Reserved.','infotek');
        $copyright_text = str_replace('{copy}','&copy;',$copyright_text);
        $copyright_text = str_replace('{year}',date('Y'),$copyright_text);
        $footer_shortcodes = cs_get_option('footer_shortcode');
        $footer_one_logo = cs_get_option('footer_one_logo');
        $footer_one_bg_image = cs_get_option('footer_one_bg_image');
        $footer_one_info_item_repeater = cs_get_option('footer_one_info_item_repeater');
        $footer_one_social_item_repeater = cs_get_option('footer_one_social_item_repeater');

        $footer_shortcode_class = '';
        if (!empty($footer_shortcodes)) {
            $footer_shortcode_class = 'footer-top-space';
        }

        if (!empty($footer_one_bg_image['url'])) { ?>
            <div class="footer-style footer-bottom-margin bg-black-after bg-cover" style="background-image: url('<?php echo esc_url($footer_one_bg_image['url']); ?>');">
        <?php }else { ?>
        <div class="footer-style bg-black bg-cover">
        <?php } ?>
            <footer class="footer-wrap">
                <?php if (!empty($footer_one_logo)) { ?>
                    <div class="container">
                        <div class="footer-top-logo text-md-center border-bottom-1">
                            <a href="<?php echo esc_url(home_url('/')) ?>"><img src="<?php echo esc_url($footer_one_logo['url']); ?>" alt=""></a>
                        </div>
                    </div>
                <?php } ?>
                <div class="container">
                    <?php get_template_part('template-parts/content/footer-widget'); ?>
                </div>
                <div class="container">
                    <div class="copyright-wrap text-center">
                        <div class="copyright-content">
                            <div class="copyright-text">
                                <?php
                                    echo wp_kses($copyright_text, infotek()->kses_allowed_html(array('a')));
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Infotek_Footer_Widget());