<?php
/**
 * Elementor Widget
 * @package infotek
 * @since 1.0.0
 */

namespace Elementor;

class Infotek_Bannerfull_Slider_Widget extends Widget_Base
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
        return 'infotek-bannerfull-slider-one';
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
        return esc_html__('banner full slider One', 'infotek-core');
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
            'menu_control_section',
            [
                'label' => esc_html__('Menu Settings', 'infotek-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'logo', [
                'label' => esc_html__('Logo Image', 'infotek-core'),
                'type' => Controls_Manager::MEDIA,
                'show_label' => false,
                'description' => esc_html__('Upload Logo image', 'infotek-core'),
            ]
        );
        $this->add_control(
            'btn1_text', [
                'label' => esc_html__('btn1 text', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Best Plan', 'infotek-core'),
            ]
        );
        $this->add_control(
            'btn1_url', [
                'label' => esc_html__('btn1 url', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('#', 'infotek-core'),
            ]
        );
        $this->add_control(
            'btn2_text', [
                'label' => esc_html__('btn2 text', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Sign Up Free', 'infotek-core'),
            ]
        );
        $this->add_control(
            'btn2_url', [
                'label' => esc_html__('btn2 url', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('#', 'infotek-core'),
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'slider_settings_section',
            [
                'label' => esc_html__('Slider Items', 'infotek-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'bg_image', [
                'label' => esc_html__('Bg Image', 'infotek-core'),
                'type' => Controls_Manager::MEDIA,
                'show_label' => false,
                'description' => esc_html__('Upload Bg image', 'infotek-core'),
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'image', [
                'label' => esc_html__('Main Image', 'infotek-core'),
                'type' => Controls_Manager::MEDIA,
                'show_label' => false,
                'description' => esc_html__('Upload Main image', 'infotek-core'),
            ]
        );
        $repeater->add_control(
            'title', [
                'label' => esc_html__('title', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Frintem life style', 'infotek-core'),
                'show_label' => true,
                'description' => esc_html__('upload title', 'infotek-core'),
            ]
        );
        $repeater->add_control(
            'subtitle', [
                'label' => esc_html__('subtitle', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'show_label' => false,
                'default' => esc_html__('educal wav', 'infotek-core'),
                'description' => esc_html__('Upload Content', 'infotek-core'),
            ]
        );
        $repeater->add_control(
            'details_url', [
                'label' => esc_html__('Details page url', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'show_label' => false,
                'default' => esc_html__('#', 'infotek-core'),
                'description' => esc_html__('Upload Content', 'infotek-core'),
            ]
        );
        $repeater->add_control(
            'audio_url', [
                'label' => esc_html__('audio url', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'show_label' => false,
                'default' => esc_html__('#', 'infotek-core'),
                'description' => esc_html__('Upload Content', 'infotek-core'),
            ]
        );
        $this->add_control('bannerfull_items', [
            'label' => esc_html__('Banner Slider Item', 'infotek-core'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                    'image' => array(
                        'url' => Utils::get_placeholder_image_src()
                    )
                ]
            ],
        ]);
        $this->end_controls_section();

        $this->start_controls_section(
            'slider_control_section',
            [
                'label' => esc_html__('Slider Settings', 'infotek-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'items',
            [
                'label' => esc_html__('slidesToShow', 'infotek-core'),
                'type' => Controls_Manager::NUMBER,
                'description' => esc_html__('you can set how many item show in slider', 'infotek-core'),
                'default' => '1',
            ]
        );
        $this->add_control(
            'loop',
            [
                'label' => esc_html__('Loop', 'infotek-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'infotek-core'),
            ]
        );
        $this->add_control(
            'autoplay',
            [
                'label' => esc_html__('Autoplay', 'infotek-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'infotek-core'),
            ]
        );
        $this->add_control(
            'nav',
            [
                'label' => esc_html__('Nav', 'infotek-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'infotek-core'),
                'default' => 'yes'
            ]
        );
        $this->add_control(
            'nav_left_arrow',
            [
                'label' => esc_html__('Nav Left Icon', 'infotek-core'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('you can set yes/no to enable/disable', 'infotek-core'),
                'default' => [
                    'value' => 'fas fa-angle-left',
                    'library' => 'solid',
                ],
                'condition' => ['nav' => 'yes']
            ]
        );
        $this->add_control(
            'nav_right_arrow',
            [
                'label' => esc_html__('Nav Right Icon', 'infotek-core'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('you can set yes/no to enable/disable', 'infotek-core'),
                'default' => [
                    'value' => 'fas fa-angle-right',
                    'library' => 'solid',
                ],
                'condition' => ['nav' => 'yes']
            ]
        );
        $this->add_control(
            'center',
            [
                'label' => esc_html__('Center', 'infotek-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'infotek-core'),
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'brand_member_styling_settings_section',
            [
                'label' => esc_html__('Styling Settings', 'infotek-core'),
                'tab' => Controls_Manager::TAB_STYLE,
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
        $bannerfull_items = $settings['bannerfull_items'];

        $rand_numb = rand(333, 999999999);
        //slider settings
        $slider_settings = [
            "loop" => esc_attr($settings['loop']),
            "items" => esc_attr($settings['items'] ?? 1),
            "center" => esc_attr($settings['center']),
            "autoplay" => esc_attr($settings['autoplay']),
            "nav" => esc_attr($settings['nav']),
            "navleft" => infotek_core()->render_elementor_icons($settings['nav_left_arrow']),
            "navright" => infotek_core()->render_elementor_icons($settings['nav_right_arrow'])
        ];
        
        ?>
        <div class="bannerfull-slider-one-area" style="background-image: url('<?php echo $settings['bg_image']['url']; ?>');">
			<?php 
			$preloader_enable = cs_get_option('preloader_enable'); 
			$header_sticky_enable = cs_get_option('header_sticky_enable'); 
			if (infotek()->is_infotek_core_active()) { 
				if ($header_sticky_enable == 1) { ?>
					<style>
						.sticky-active {
							-webkit-animation: 300ms ease-in-out 0s normal none 1 running fadeInDown;
							animation: 300ms ease-in-out 0s normal none 1 running fadeInDown;
							left: 0;
							position: fixed;
							top: 0;
							width: 100%;
							z-index: 9999;
							-webkit-box-shadow: 0 10px 20px 0 rgb(46 56 220 / 5%);
							box-shadow: 0 10px 20px 0 rgb(46 56 220 / 5%);
							border-bottom: 0;
							background: #0F0F0F;
							transition: 0.5s;
						}
					</style>    
				<?php }
			} ?>

			<?php if ($preloader_enable == 1) { ?>
				<!-- preloader area start -->
				<div class="preloader" id="preloader">
					<div class="preloader-inner">
						<svg class="pl" viewBox="0 0 128 128" width="128px" height="128px">
							<defs>
								<linearGradient id="pl-grad" x1="0" y1="0" x2="1" y2="1">
									<stop offset="0%" stop-color="#000" />
									<stop offset="100%" stop-color="#fff" />
								</linearGradient>
								<mask id="pl-mask">
									<rect x="0" y="0" width="128" height="128" fill="url(#pl-grad)" />
								</mask>
							</defs>
							<g stroke-linecap="round" stroke-width="8" stroke-dasharray="32 32">
								<g stroke="hsl(193,90%,50%)">
									<line class="pl__line1" x1="4" y1="48" x2="4" y2="80" />
									<line class="pl__line2" x1="19" y1="48" x2="19" y2="80" />
									<line class="pl__line3" x1="34" y1="48" x2="34" y2="80" />
									<line class="pl__line4" x1="49" y1="48" x2="49" y2="80" />
									<line class="pl__line5" x1="64" y1="48" x2="64" y2="80" />
									<g transform="rotate(180,79,64)">
										<line class="pl__line6" x1="79" y1="48" x2="79" y2="80" />
									</g>
									<g transform="rotate(180,94,64)">
										<line class="pl__line7" x1="94" y1="48" x2="94" y2="80" />
									</g>
									<g transform="rotate(180,109,64)">
										<line class="pl__line8" x1="109" y1="48" x2="109" y2="80" />
									</g>
									<g transform="rotate(180,124,64)">
										<line class="pl__line9" x1="124" y1="48" x2="124" y2="80" />
									</g>
								</g>
								<g stroke="hsl(283,90%,50%)" mask="url(#pl-mask)">
									<line class="pl__line1" x1="4" y1="48" x2="4" y2="80" />
									<line class="pl__line2" x1="19" y1="48" x2="19" y2="80" />
									<line class="pl__line3" x1="34" y1="48" x2="34" y2="80" />
									<line class="pl__line4" x1="49" y1="48" x2="49" y2="80" />
									<line class="pl__line5" x1="64" y1="48" x2="64" y2="80" />
									<g transform="rotate(180,79,64)">
										<line class="pl__line6" x1="79" y1="48" x2="79" y2="80" />
									</g>
									<g transform="rotate(180,94,64)">
										<line class="pl__line7" x1="94" y1="48" x2="94" y2="80" />
									</g>
									<g transform="rotate(180,109,64)">
										<line class="pl__line8" x1="109" y1="48" x2="109" y2="80" />
									</g>
									<g transform="rotate(180,124,64)">
										<line class="pl__line9" x1="124" y1="48" x2="124" y2="80" />
									</g>
								</g>
							</g>
						</svg>
					</div>
				</div>
				<!-- preloader area end -->
			<?php } ?>
            <div class="navbar-area-full-banner d-lg-block d-none">
                <div class="row">
                    <div class="col-lg-4 align-self-center">
                        <?php
                            $logo = $settings['logo']['url'];
                            if (!empty($logo)) { ?>
                                <a class="site-logo" href="<?php echo get_home_url(); ?>"><img src="<?php echo $logo; ?>" alt="img"/></a>
                            <?php }else {
                                printf('<h3 class="mb-0"><a class="site-title" href="%1$s">%2$s</a></h3>', esc_url(get_home_url()), esc_html(get_bloginfo('title')));
                            }
                        ?>
                    </div>
                    <div class="col-lg-4 align-self-center text-center">
                        <a id="navigation-button" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="26" viewBox="0 0 50 26" fill="none">
                                <rect width="50" height="2" fill="white"/>
                                <rect y="12" width="50" height="2" fill="white"/>
                                <rect y="24" width="50" height="2" fill="white"/>
                            </svg>
                        </a>
                    </div>
                    <div class="col-lg-4 align-self-center text-lg-end"> 
                        <div class="dark-area me-xl-3">
                            <label class="change-mode switch">
                                <input type="checkbox" data-active="true">
                                <span class="slider round">
                                    <i class="fas fa-moon"></i>
                                    <i class="fas fa-sun"></i>
                                </span>
                            </label>
                        </div> 
                        <?php
                            if (!empty($settings['btn1_text'])) { ?>
                                <a class="btn bg-gradient-base text-white border-radius-40 ms-xl-3 tt-catepalize" href="<?php echo esc_url($settings['btn1_url']); ?>"><?php echo esc_html($settings['btn1_text']); ?></a>
                            <?php }
                        ?>
                        <?php
                            if (!empty($settings['btn2_text'])) { ?>
                                <a class="btn btn-two bg-gradient-base2 text-white border-radius-40 ms-xl-2 tt-catepalize" href="<?php echo esc_url($settings['btn2_url']); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path d="M14.8002 18.4001H10.0002C9.6686 18.4001 9.4002 18.1317 9.4002 17.8001C9.4002 17.4685 9.6686 17.2001 10.0002 17.2001H14.8002C15.7928 17.2001 16.6002 16.3927 16.6002 15.4001V4.6001C16.6002 3.6075 15.7928 2.8001 14.8002 2.8001H10.0002C9.6686 2.8001 9.4002 2.5317 9.4002 2.2001C9.4002 1.8685 9.6686 1.6001 10.0002 1.6001H14.8002C16.4544 1.6001 17.8002 2.9459 17.8002 4.6001V15.4001C17.8002 17.0543 16.4544 18.4001 14.8002 18.4001ZM12.8244 9.5759L9.8244 6.5759C9.59 6.3415 9.2104 6.3415 8.976 6.5759C8.7416 6.8103 8.7416 7.1899 8.976 7.4243L10.9518 9.4001H2.8002C2.4686 9.4001 2.2002 9.6685 2.2002 10.0001C2.2002 10.3317 2.4686 10.6001 2.8002 10.6001H10.9518L8.976 12.5759C8.7416 12.8103 8.7416 13.1899 8.976 13.4243C9.0932 13.5415 9.2466 13.6001 9.4002 13.6001C9.5538 13.6001 9.7072 13.5415 9.8244 13.4243L12.8244 10.4243C13.0588 10.1899 13.0588 9.8103 12.8244 9.5759Z" fill="white"/>
                                    </svg>
                                    <?php echo esc_html($settings['btn2_text']); ?>
                                </a>
                            <?php }
                        ?>
                    </div>
                </div>
            </div>

            <nav class="navbar navbar-area navbar-expand-lg navigation-style-01 navbar-style-01 navbar-style-02 navbar-default navbar-popup ">
                <div class="container custom-container mw-100 px-5">
                    <div class="responsive-mobile-menu">
                        <div class="logo-wrapper">
                            <?php
                                $header_two_search_item = cs_get_option('header_two_search_item');
                                $logo = $settings['logo']['url'];
                                if (!empty($logo)) { ?>
                                    <a class="site-logo" href="<?php echo get_home_url(); ?>"><img src="<?php echo $logo; ?>" alt="img"/></a>
                                <?php }else {
                                    printf('<h3 class="mb-0"><a class="site-title" href="%1$s">%2$s</a></h3>', esc_url(get_home_url()), esc_html(get_bloginfo('title')));
                                }
                            ?>
                            <?php if ($header_two_search_item == '1') { ?>
                                <div class="nav-search d-inline-block">
                                    <form role="search" action="<?php echo esc_url(home_url('/')) ?>" method="get" class="nav-left-search ms-xl-5 ms-4">
                                        <input type="text" name="s" placeholder="<?php echo esc_html__('Search here','infotek')?>">
                                        <input type="hidden" name="post_type" value="post">
                                        <button><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            <?php } ?>
                            
                        </div>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#infotek_main_menu" aria-controls="infotek_main_menu" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'main-menu',
                        'menu_class' => 'navbar-nav text-start',
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
                                if (!empty($header_right_btn_text)) {
                            ?>  
                            <a class="right-btn-text" href="<?php echo esc_url($header_right_btn_url); ?>">
                                <?php echo esc_html($header_right_btn_text); ?>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.8 18.4001H9.99996C9.66836 18.4001 9.39996 18.1317 9.39996 17.8001C9.39996 17.4685 9.66836 17.2001 9.99996 17.2001H14.8C15.7926 17.2001 16.6 16.3927 16.6 15.4001V4.6001C16.6 3.6075 15.7926 2.8001 14.8 2.8001H9.99996C9.66836 2.8001 9.39996 2.5317 9.39996 2.2001C9.39996 1.8685 9.66836 1.6001 9.99996 1.6001H14.8C16.4542 1.6001 17.8 2.9459 17.8 4.6001V15.4001C17.8 17.0543 16.4542 18.4001 14.8 18.4001ZM12.8242 9.5759L9.82416 6.5759C9.58976 6.3415 9.21016 6.3415 8.97576 6.5759C8.74136 6.8103 8.74136 7.1899 8.97576 7.4243L10.9516 9.4001H2.79995C2.46835 9.4001 2.19995 9.6685 2.19995 10.0001C2.19995 10.3317 2.46835 10.6001 2.79995 10.6001H10.9516L8.97576 12.5759C8.74136 12.8103 8.74136 13.1899 8.97576 13.4243C9.09296 13.5415 9.24636 13.6001 9.39996 13.6001C9.55356 13.6001 9.70696 13.5415 9.82416 13.4243L12.8242 10.4243C13.0586 10.1899 13.0586 9.8103 12.8242 9.5759Z" fill="#686868"/>
                                </svg>
                            </a>
                            <?php } ?>
                        </div>
                    <?php endif; ?>
                </div>
            </nav>


            <div class="slider bannerfull-slider text-center">
                <?php foreach ($bannerfull_items as $bannerfull_item): ?>
                    <div class="swiper-slide">
                        <div class="single-bannerfull-inner">
                            <a class="main-thumb" href="<?php echo $bannerfull_item['details_url']; ?>">
                                <img src="<?php echo $bannerfull_item['image']['url']; ?>" alt="img">
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="container p-0">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="slider bannerfull-slider-audio">
                            <?php foreach ($bannerfull_items as $bannerfull_item): ?>
                            <div class="audio-list-wrap">
                                <div class="single-audio-list-inner mb-0 audio-list-active px-0">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-4 align-self-center">
                                                <div class="media">
                                                    <?php if (!empty($bannerfull_item['image']['url'])) { ?>
                                                        <div class="media-left me-3">
                                                            <img src="<?php echo $bannerfull_item['image']['url']; ?>" alt="img">
                                                        </div>
                                                    <?php } ?>
                                                    <div class="media-body align-self-center">
                                                        <h5><?php echo $bannerfull_item['title']; ?></h5>
                                                        <p class="mb-0"><?php echo $bannerfull_item['subtitle']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 align-self-center">
                                                <div class="audio-area-wrap text-center">
                                                    <div class="audio-list-wrap d-inline-block">
                                                        <audio src="<?php echo $bannerfull_item['audio_url']; ?>"></audio>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>  

        <?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new Infotek_Bannerfull_Slider_Widget());