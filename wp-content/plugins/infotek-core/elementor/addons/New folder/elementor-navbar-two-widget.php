<?php
/**
 * Elementor Widget
 * @package Infotek
 * @since 1.0.0
 */

namespace Elementor;
class Infotek_Navbar_Two_Widget extends Widget_Base
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
        return 'infotek-navbar-two-widget';
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
        return esc_html__('Navbar Two', 'infotek-core');
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

        <nav class="navbar navbar-area navbar-expand-lg navigation-style-01 navbar-area-2 navbar-default d-lg-none">
            <div class="container custom-container">
                <div class="responsive-mobile-menu">
                    <?php if(!empty($settings['logo_image']['url'])){ ?>
                        <div class="logo-wrapper">
                            <a href="<?php echo esc_url(get_home_url()); ?>"><img src="<?php echo $settings['logo_image']['url']; ?>" alt="logo"></a>
                        </div>
                    <?php }else { ?>
                        <div class="logo-wrapper">
                            <?php
                            $header_one_logo = cs_get_option('header_one_logo');
                            if (has_custom_logo() && empty($header_one_logo['id'])) {
                                the_custom_logo();
                            } elseif (!empty($header_one_logo['id'])) {
                                printf('<a class="site-logo" href="%1$s"><img src="%2$s" alt="%3$s"/></a>', esc_url(get_home_url()), $header_one_logo['url'], $header_one_logo['alt']);
                            } else {
                                printf('<a class="site-title" href="%1$s">%2$s</a>', esc_url(get_home_url()), esc_html(get_bloginfo('title')));
                            }
                            ?>
                        </div>
                    <?php } ?>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#infotek_main_menu" aria-controls="infotek_main_menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                </div>
                <?php if($settings['search_bar'] == 'yes'){ ?>  
                    <form role="search" action="<?php echo esc_url(home_url('/')) ?>" method="get" class="nav-left-search">
                        <input type="text" name="s" placeholder="<?php echo esc_html__('Search here','infotek-core')?>">
                        <input type="hidden" name="post_type" value="post">
                        <button><i class="fa fa-search"></i></button>
                    </form>
                <?php } ?>
                <?php
                    wp_nav_menu(array(
                        'theme_location' => 'main-menu',
                        'menu_class' => 'navbar-nav',
                        'container' => 'div',
                        'container_class' => 'collapse navbar-collapse',
                        'container_id' => 'infotek_main_menu',
                        'fallback_cb' => 'infotek_theme_fallback_menu',
                    ));
                ?>
                <?php if (infotek()->is_infotek_core_active()) : ?>
                    <div class="nav-right-part nav-right-part-desktop align-self-center">
                        <?php
                            $header_right_btn_text = cs_get_option('header_right_btn_text');
                            $header_right_btn_url = cs_get_option('header_right_btn_url');
                        ?>
                        <a class="right-btn-text" href="<?php echo esc_url($header_right_btn_url); ?>">
                            <?php echo esc_html($header_right_btn_text); ?>
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.8 18.4001H9.99996C9.66836 18.4001 9.39996 18.1317 9.39996 17.8001C9.39996 17.4685 9.66836 17.2001 9.99996 17.2001H14.8C15.7926 17.2001 16.6 16.3927 16.6 15.4001V4.6001C16.6 3.6075 15.7926 2.8001 14.8 2.8001H9.99996C9.66836 2.8001 9.39996 2.5317 9.39996 2.2001C9.39996 1.8685 9.66836 1.6001 9.99996 1.6001H14.8C16.4542 1.6001 17.8 2.9459 17.8 4.6001V15.4001C17.8 17.0543 16.4542 18.4001 14.8 18.4001ZM12.8242 9.5759L9.82416 6.5759C9.58976 6.3415 9.21016 6.3415 8.97576 6.5759C8.74136 6.8103 8.74136 7.1899 8.97576 7.4243L10.9516 9.4001H2.79995C2.46835 9.4001 2.19995 9.6685 2.19995 10.0001C2.19995 10.3317 2.46835 10.6001 2.79995 10.6001H10.9516L8.97576 12.5759C8.74136 12.8103 8.74136 13.1899 8.97576 13.4243C9.09296 13.5415 9.24636 13.6001 9.39996 13.6001C9.55356 13.6001 9.70696 13.5415 9.82416 13.4243L12.8242 10.4243C13.0586 10.1899 13.0586 9.8103 12.8242 9.5759Z" fill="#4569E7"/>
                            </svg>

                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </nav>

        <div class="navbar-3-area d-lg-block d-none">
            <div class="row">
				<div class="col-lg-3 logo-area">
				<div class="logo-wrapper text-center">
					<?php
						$header_one_logo = cs_get_option('header_one_logo');
						if (has_custom_logo() && empty($header_one_logo['id'])) {
							the_custom_logo();
						} elseif (!empty($header_one_logo['id'])) {
							printf('<a class="site-logo" href="%1$s"><img src="%2$s" alt="%3$s"/></a>', esc_url(get_home_url()), $header_one_logo['url'], $header_one_logo['alt']);
						} else {
							printf('<a class="site-title" href="%1$s">%2$s</a>', esc_url(get_home_url()), esc_html(get_bloginfo('title')));
						}
					?>
				</div>
				</div>
                <div class="col-lg-5 align-self-center">
                    <div class="header-3-search mx-lg-4 mx-3">
                        <input type="text" placeholder="Search Music">
                        <button><i class="fa fa-search"></i></button>
                    </div>
                </div>
                <div class="col-lg-4 text-lg-end align-self-center pe-xl-5 pe-4">
                    <div class="dark-area me-xl-3">
                        <label class="change-mode switch">
                            <input type="checkbox" data-active="true">
                            <span class="slider round">
                                <i class="fas fa-moon"></i>
                                <i class="fas fa-sun"></i>
                            </span>
                        </label>
                    </div> 
                    <?php if (!empty($settings['btn1_text'])) { ?>
                        <a class="btn btn-base border-radius-40" href="$settings['btn1_url']"><?php echo $settings['btn1_text']; ?></a>
                    <?php } ?>
                    <?php if (!empty($settings['btn2_text'])) { ?>
                        <a class="btn btn-two btn-base border-radius-40" href="$settings['btn2_url']"><?php echo $settings['btn2_text']; ?></a>
                    <?php } ?>
                </div>
            </div>
        </div>

        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Infotek_Navbar_Two_Widget());