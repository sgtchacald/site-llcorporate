<?php
/**
 * Elementor Widget
 * @package infotek
 * @since 1.0.0
 */

namespace Elementor;

class Infotek_Call_To_Action_Widget extends Widget_Base
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
        return 'infotek-call-to-action';
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
        return esc_html__('Call to action', 'infotek-core');
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


        $this->add_control(
            'bg_img', [
                'label' => esc_html__('Bg Image', 'infotek-core'),
                'type' => Controls_Manager::MEDIA,
                'show_label' => false,
                'description' => esc_html__('Bg Main image', 'infotek-core'),
            ]
        );
        $this->add_control(
            'subtitle', [
                'label' => esc_html__('subtitle', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'show_label' => false,
                'default' => esc_html__('download app', 'infotek-core'),
            ]
        );
        $this->add_control(
            'title', [
                'label' => esc_html__('title', 'infotek-core'),
                'type' => Controls_Manager::TEXTAREA,
                'show_label' => false,
                'default' => esc_html__('Never stop listening', 'infotek-core'),
            ]
        );
        $this->add_control(
            'content', [
                'label' => esc_html__('song Name', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('infotekCloud is available on Web, iOS, Android, Sonos, Chromecast, and Xbox One.', 'infotek-core'),
            ]
        );
        $this->add_control(
            'btn_img_1', [
                'label' => esc_html__('btn Image 1', 'infotek-core'),
                'type' => Controls_Manager::MEDIA,
                'show_label' => false,
                'description' => esc_html__('Upload Main image', 'infotek-core'),
            ]
        );
        $this->add_control(
            'btn_url_1', [
                'label' => esc_html__('url 1', 'infotek-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('#', 'infotek-core'),
            ]
        );
        $this->add_control(
            'btn_img_2', [
                'label' => esc_html__('btn Image 2', 'infotek-core'),
                'type' => Controls_Manager::MEDIA,
                'show_label' => false,
                'description' => esc_html__('Upload Main image', 'infotek-core'),
            ]
        );
        $this->add_control(
            'btn_url_2', [
                'label' => esc_html__('url 2', 'infotek-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('#', 'infotek-core'),
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
        ?>
        <div class="call-to-action-area" style="background-image: url('<?php echo esc_html($settings['bg_img']['url']); ?>');">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-4 col-lg-6">
                        <h6 class="subtitle"><span><?php echo esc_html($settings['subtitle']); ?></span></h6>
                        <h3 class="title mb-3"><?php echo esc_html($settings['title']); ?></h3>
                        <p class="content text-white mb-4"><?php echo esc_html($settings['content']); ?></p>
                        <a class="me-2" href="<?php echo esc_html($settings['btn_url_1']); ?>"><img src="<?php echo esc_html($settings['btn_img_1']['url']); ?>" alt="img"></a>
                        <a href="<?php echo esc_html($settings['btn_url_1']); ?>"><img src="<?php echo esc_html($settings['btn_img_2']['url']); ?>" alt="img"></a>
                    </div>
                </div>
            </div>  
        </div>  

        <?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new Infotek_Call_To_Action_Widget());