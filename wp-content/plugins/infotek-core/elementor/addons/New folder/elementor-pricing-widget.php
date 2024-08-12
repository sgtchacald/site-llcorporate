<?php
/**
 * Elementor Widget
 * @package Infotek
 * @since 1.0.0
 */

namespace Elementor;
class Infotek_Pricing_One extends Widget_Base
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
        return 'infotek-pricing-one-widget';
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
        return esc_html__('Pricing 01', 'infotek-core');
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
        return 'eicon-editor-list-ul';
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
                'label' => esc_html__('General Settings', 'infotek-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'price_active',
            [
                'label' => esc_html__('Price Active', 'infotek-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes to show pagination.', 'infotek-core'),
                'default' => 'no'
            ]
        );
        $this->add_control(
            'sub_title', [
                'label' => esc_html__('sub Title', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('enter sub title.', 'infotek-core'),
                'default' => esc_html__('Plan', 'infotek-core')
            ]
        );
        $this->add_control(
            'price', [
                'label' => esc_html__('Price', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter price.', 'infotek-core'),
                'default' => esc_html__('$59', 'infotek-core')
            ]
        );
        $this->add_control(
            'price_time', [
                'label' => esc_html__('Price Time', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('enter price time.', 'infotek-core'),
                'default' => esc_html__('Paid per month', 'infotek-core')
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'price_list_overlay',
            [
                'label' => esc_html__('List Overlay On', 'infotek-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes to show pagination.', 'infotek-core'),
                'default' => 'no'
            ]
        );
        $repeater->add_control(
            'list_title', [
                'label' => esc_html__('Title', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('enter title.', 'infotek-core'),
                'default' => esc_html__('Mobile App Development', 'infotek-core')
            ]
        );
        $this->add_control('pricing_items', [
            'label' => esc_html__('Pricing Item', 'infotek-core'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
        ]);

        $this->add_control(
            'price_btn', [
                'label' => esc_html__('Price', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter price btn', 'infotek-core'),
                'default' => esc_html__('Get Started', 'infotek-core')
            ]
        );
        $this->add_control(
            'price_btn_url', [
                'label' => esc_html__('Price Url', 'infotek-core'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('enter price btn url.', 'infotek-core'),
                'default' => esc_html__('#', 'infotek-core')
            ]
        );
        $this->end_controls_section();


        /*  tab styling tabs start */
        $this->start_controls_section(
            'tab_settings_section',
            [
                'label' => esc_html__('Tab Settings', 'infotek-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control('sub_title_color', [
            'label' => esc_html__('Sub Title Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-pricing-inner h4" => "color: {{VALUE}}"
            ]
        ]);
		$this->add_control('title_color', [
            'label' => esc_html__('Title Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-pricing-inner h2" => "color: {{VALUE}}"
            ]
        ]);
		$this->add_control('heading_bg_color', [
            'label' => esc_html__('Heading bg Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-pricing-inner h6" => "background: {{VALUE}}"
            ]
        ]);
		$this->add_control('heading_color', [
            'label' => esc_html__('Heading Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-pricing-inner h6" => "background: {{VALUE}}"
            ]
        ]);
        $this->end_controls_tabs();

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
        $pricing_items = $settings['pricing_items'];
        $price_active = '';
        if ($settings['price_active'] == 'yes') {
            $price_active = 'price-active';
        }
        ?>

        <div class="single-pricing-inner <?php echo $price_active; ?> <?php echo $settings['price_style']; ?>">
            <div class="price-header">
                <h4 class="mb-3"><?php echo $settings['sub_title']; ?></h4>
                <h2 class="mb-2 text-dark fw-700"><?php echo $settings['price']; ?></h2>
                <?php
                    if (!empty($settings['price_time'])) { ?>
                        <h6 class="fz-14"><?php echo $settings['price_time']; ?></h6>
                    <?php }
                ?>
            </div>
            <ul>
                <?php foreach ($pricing_items as $item): 
                    if ($item['price_list_overlay'] == 'yes') { 
                        $overlay_list = 'hide';
                    }else {
                       $overlay_list = 'ashow'; 
                    } ?>
                    <li class="<?php echo $overlay_list; ?>">
                        <i class="fa fa-check"></i>
                        <?php echo $item['list_title']; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
            <a class="btn btn-base border-radius-30 fw-600" href="<?php echo $settings['price_btn_url']; ?>"><?php echo $settings['price_btn']; ?></a>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Infotek_Pricing_One());