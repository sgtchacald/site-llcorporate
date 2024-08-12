<?php
/**
 * Elementor Widget
 * @package Infotek
 * @since 1.0.0
 */

namespace Elementor;
class Infotek_Video_Auto_Play_Widget extends Widget_Base
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
        return 'infotek-video-auto-play-widget';
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
        return esc_html__('Video Auto Play', 'infotek-core');
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
        return 'eicon-youtube';
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
            'video_auto_play_url',
            [
                'label' => esc_html__('video auto play url', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('https://static.pexels.com/lib/videos/free-videos.mp4', 'infotek-core'),
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
        $settings = $this->get_settings_for_display(); ?>

        <div class="video-auto-play-area">
            <div class="video video-auto-play">
                <video class="vdo" src="<?php echo $settings['video_auto_play_url'] ?>" loop="1" preload="auto" muted="" autoplay="1"></video>
            </div>
        </div> 

        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Infotek_Video_Auto_Play_Widget());