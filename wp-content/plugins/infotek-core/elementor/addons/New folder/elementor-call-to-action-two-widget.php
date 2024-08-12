<?php
/**
 * Elementor Widget
 * @package infotek
 * @since 1.0.0
 */

namespace Elementor;

class Infotek_Call_To_Action_Two_Widget extends Widget_Base
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
        return 'infotek-call-to-action-two';
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
        return esc_html__('Call to action Two', 'infotek-core');
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
                'default' => esc_html__('Welcome offer', 'infotek-core'),
            ]
        );
        $this->add_control(
            'title', [
                'label' => esc_html__('title', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'show_label' => false,
                'default' => esc_html__('Get one month infotek plus', 'infotek-core'),
            ]
        );
        $this->add_control(
            'content', [
                'label' => esc_html__('song Name', 'infotek-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Lorem ipsum dolor sit amet, est ad graecis principes. Ad vis iisque saperet.', 'infotek-core'),
            ]
        );
        $this->add_control(
            'btn_text', [
                'label' => esc_html__('btn text', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'show_label' => false,
                'default' => esc_html__('subscribe now', 'infotek-core'),
            ]
        );
        $this->add_control(
            'btn_url', [
                'label' => esc_html__('url 1', 'infotek-core'),
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
        <div class="call-to-action-area-2" style="background-image: url('<?php echo esc_html($settings['bg_img']['url']); ?>');">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-5 offset-xl-4 left_content">
                        <h6 class="subtitle"><?php echo $settings['subtitle']; ?></h6>
                        <h4 class="title"><?php echo $settings['title']; ?></h4>
                        <p class="content mb-0"><?php echo $settings['content']; ?></p>
                    </div>
                    <div class="col-lg-3 text-md-end align-self-center">
                        <a class="btn border-radius-40" href="<?php echo $settings['btn_url']; ?>">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18 6.12338L9 16.4797L0 6.12338L9 4.88599L18 6.12338Z" fill="#CE0045"/>
                                <path d="M18 6.12338L9 16.4797V4.88599L18 6.12338Z" fill="#A00031"/>
                                <path d="M13.5176 3.82183L12.4521 6.12337L9 4.06465L5.54787 6.12337L4.5 3.82183V1.52032H13.5L13.5176 3.82183Z" fill="#CE0045"/>
                                <path d="M13.5176 3.82183L12.4521 6.12337L9 4.06465V1.52032H13.5L13.5176 3.82183Z" fill="#A00031"/>
                                <path d="M12.4521 6.12337H5.54785L8.99998 1.52032L12.4521 6.12337Z" fill="#FE7E52"/>
                                <path d="M12.4521 6.12337H9V1.52032L12.4521 6.12337Z" fill="#F53241"/>
                                <path d="M4.5 1.52026L0 6.12324H5.5478L4.5 1.52026Z" fill="#FE7E52"/>
                                <path d="M12.4521 6.12324H17.9999L13.4999 1.52026L12.4521 6.12324Z" fill="#F53241"/>
                                <path d="M12.4521 6.12338L8.99998 16.4797L5.54785 6.12338H12.4521Z" fill="#F53241"/>
                                <path d="M12.4521 6.12338L9 16.4797V6.12338H12.4521Z" fill="#CE0045"/>
                            </svg>
                            <?php echo $settings['btn_text']; ?>
                        </a>
                    </div>
                </div>
            </div>  
        </div>  

        <?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new Infotek_Call_To_Action_Two_Widget());