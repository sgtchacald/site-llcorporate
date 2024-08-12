<?php
/**
 * Elementor Widget
 * @package Infotek
 * @since 1.0.0
 */

namespace Elementor;
class Infotek_Navbar_Left_Widget extends Widget_Base
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
        return 'infotek-navbar-left-widget';
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
        return esc_html__('Navbar Left', 'infotek-core');
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
		$this->add_control(
            'search_bar',
            [
                'label' => esc_html__('search bar', 'infotek-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'infotek-core'),
                'default' => 'yes'
            ]
        );
        $this->add_control('btn1_text', [
            'label' => esc_html__('Btn One Text', 'infotek-core'),
            'type' => Controls_Manager::TEXT,
            'default' => 'Best Plan',
        ]);
        $this->add_control('btn1_url', [
            'label' => esc_html__('Btn One url', 'infotek-core'),
            'type' => Controls_Manager::TEXT,
            'default' => '#',
        ]);
        $this->add_control('btn2_text', [
            'label' => esc_html__('Btn Two Text', 'infotek-core'),
            'type' => Controls_Manager::TEXT,
            'default' => 'sign up free',
        ]);
        $this->add_control('btn2_url', [
            'label' => esc_html__('Btn Two url', 'infotek-core'),
            'type' => Controls_Manager::TEXT,
            'default' => '#',
        ]);

        $this->end_controls_section();

        $this->start_controls_section(
            'styling_section',
            [
                'label' => esc_html__('Styling Settings', 'agiletech-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control('btn_bg_color', [
            'label' => esc_html__('Btn bg Color', 'agiletech-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .btn-border-base" => "border-color: {{VALUE}}",
                "{{WRAPPER}} .btn-border-base:after" => "background: {{VALUE}}",
                "{{WRAPPER}} .nav-right-part .right-btn-text svg path" => "fill: {{VALUE}}",
            ]
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
        ?>

        <div class="has-smooth" id="has_smooth"></div>
        <div class="b_banner">
            <div class="main-menu-sidebar-nav">
                <?php
                    wp_nav_menu(array(
                        'theme_location' => 'main-menu',
                        'menu_class' => 'navbar-nav',
                        'container' => 'div',
                        'container_class' => 'menu-main-menu-container',
                        'container_id' => 'infotek_main_menu',
                        'fallback_cb' => 'infotek_theme_fallback_menu',
                    ));
                ?>
            </div>
        </div>

        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Infotek_Navbar_Left_Widget());