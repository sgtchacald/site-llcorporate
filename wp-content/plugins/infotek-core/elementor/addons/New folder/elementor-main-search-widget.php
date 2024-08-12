<?php
/**
 * Elementor Widget
 * @package Infotek
 * @since 1.0.0
 */

namespace Elementor;
class Infotek_Main_Search_Widget extends Widget_Base
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
        return 'infotek-main-search-widget';
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
        return esc_html__('main search', 'infotek-core');
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
            'banner_two_content_settings_section',
            [
                'label' => esc_html__('Content Settings', 'infotek-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'search_cat',
            [
                'label' => esc_html__('search cat', 'infotek-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'infotek-core'),
                'default' => 'yes'
            ]
        );
        $this->add_control(
            'search_cat_title',
            [
                'label' => esc_html__('search cat', 'infotek-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'infotek-core'),
                'default' => 'yes'
            ]
        );
        $this->add_responsive_control(
            'text_align',
            [
                'label' => esc_html__('Alignment', 'infotek-core'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'infotek-core'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'infotek-core'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'infotek-core'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
            ]
        );
        $this->end_controls_section();

        //Style tab style
        $this->start_controls_section(
            'style_settings_section',
            [
                'label' => esc_html__('Style Settings', 'infotek-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_control('cat_color', [
            'label' => esc_html__('Cat Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .banner-cat a" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('cat_bg_color', [
            'label' => esc_html__('Cat Bg Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .banner-cat a" => "background-color: {{VALUE}}"
            ]
        ]);
		$this->add_control('cat_padding', [
            'label' => esc_html__('cat padding', 'infotek-core'),
            'type' => Controls_Manager::DIMENSIONS,
             'size_units' => [ 'px', 'em', '%' ],
            'selectors' => [
                "{{WRAPPER}} .banner-cat a" => "padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};",
            ]
        ]);
		$this->add_control('cat_border_radius', [
            'label' => esc_html__('cat border radius', 'infotek-core'),
            'type' => Controls_Manager::DIMENSIONS,
             'size_units' => [ 'px', 'em', '%' ],
            'selectors' => [
                "{{WRAPPER}} .banner-cat a" => "border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};",
            ]
        ]);
		$this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'cat_typography',
            'label' => esc_html__('Cat Typography', 'xtrem-core'),
            'selector' => "{{WRAPPER}} .banner-cat a"
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

        <div class="main-search-wrap" style="text-align:<?php echo $settings['text_align']; ?>">
            <div class="search-category position-relative z-index-2 mt-0">
                <form id="searchform" method="get" action="<?php bloginfo('url'); ?>">
                    <?php wp_dropdown_categories('show_option_none=Editor Choice'); ?>
                    <input placeholder="Search here" class="text-field" type="text" name="s" id="s" size="15" />
                    <button class="button">
                        <svg width="23" height="23" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_648_961)">
                            <path d="M24.7633 23.6399L18.3087 17.2884C19.9989 15.452 21.0375 13.0234 21.0375 10.3509C21.0367 4.63387 16.3278 0 10.5186 0C4.7094 0 0.000488281 4.63387 0.000488281 10.3509C0.000488281 16.0678 4.7094 20.7017 10.5186 20.7017C13.0285 20.7017 15.3306 19.8335 17.1389 18.3902L23.6185 24.7667C23.9342 25.0777 24.4468 25.0777 24.7625 24.7667C25.079 24.4557 25.079 23.9509 24.7633 23.6399ZM10.5186 19.1092C5.60338 19.1092 1.61884 15.1879 1.61884 10.3509C1.61884 5.51376 5.60338 1.59254 10.5186 1.59254C15.4338 1.59254 19.4183 5.51376 19.4183 10.3509C19.4183 15.1879 15.4338 19.1092 10.5186 19.1092Z" fill="#979797"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_648_961">
                            <rect width="25" height="25" fill="white"/>
                            </clipPath>
                            </defs>
                        </svg>
                    </button>
                </form>
            </div>
            <?php if ($settings['search_cat'] == 'yes') { ?>
                <div class="banner-cat position-relative z-index-2 mt-4 pt-2">
					<?php if ($settings['search_cat_title'] == 'yes') { ?>
                    	<strong class="mr-2 d-inline-block">Trending : </strong> 
					<?php } ?>
                    <ul class="m-0 p-0 d-inline-block">
                        <?php 

                        global $post; 
                        $query = new \WP_Query(array('post_type'=> 'post', 'order'=> 'ASC', 'posts_per_page' => 5, ));
                        if($query->have_posts()) : 
                            while($query->have_posts()) : $query->the_post(); 

                                $categories = get_the_category();
                                if ( ! empty( $categories ) ) {
                                    echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                                }

                            endwhile;
                        endif; ?>
                    </ul>
                </div>
            <?php } ?>
        </div>

        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Infotek_Main_Search_Widget());