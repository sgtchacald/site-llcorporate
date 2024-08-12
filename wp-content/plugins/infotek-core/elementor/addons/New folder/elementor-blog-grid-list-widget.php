<?php
/**
 * Elementor Widget
 * @package Infotek
 * @since 1.0.0
 */

namespace Elementor;
class Infotek_Blog_Grid_List_Widget extends Widget_Base
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
        return 'infotek-blog-grid-list-widget';
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
        return esc_html__('Blog Grid List', 'infotek-core');
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
        return 'eicon-image-box';
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
        
        $this->add_control('blog_grid', [
            'label' => esc_html__('Blog Grid', 'infotek-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'col-lg-3' => esc_html__('col-lg-2', 'infotek-core'),
                'col-lg-3' => esc_html__('col-lg-3', 'infotek-core'),
                'col-lg-4' => esc_html__('col-lg-4', 'infotek-core'),
                'col-lg-6' => esc_html__('col-lg-6', 'infotek-core'),
                'col-lg-12' => esc_html__('col-lg-12', 'infotek-core'),
            ),
            'default' => 'col-lg-4',
            'description' => esc_html__('Select Blog Grid', 'infotek-core')
        ]);
        $this->add_control(
            'read_more',
            [
                'label' => esc_html__('Read More Show/Hide', 'infotek-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('show/hide description', 'infotek-core'),
                'default' => 'yes',
            ]
        );
        $this->add_control('read-btn', [
            'label' => esc_html__('Read More', 'infotek-core'),
            'type' => Controls_Manager::TEXT,
            'description' => esc_html__('enter read button text', 'infotek-core'),
            'default' => esc_html__('Read More', 'infotek-core'),
            'condition' => ['read_more' => 'yes'],
        ]);
        $this->add_control('total', [
            'label' => esc_html__('Total Posts', 'infotek-core'),
            'type' => Controls_Manager::TEXT,
            'default' => '-1',
            'description' => esc_html__('enter how many post you want in masonry , enter -1 for unlimited post.')
        ]);
        $this->add_control('offset', [
            'label' => esc_html__('Offset Posts', 'infotek-core'),
            'type' => Controls_Manager::TEXT,
            'default' => '0',
            'description' => esc_html__('enter how many post you want in masonry , enter -1 for unlimited post.')
        ]);
        $this->add_control('category', [
            'label' => esc_html__('Category', 'infotek-core'),
            'type' => Controls_Manager::SELECT2,
            'multiple' => true,
            'options' => infotek_core()->get_terms_names('category', 'id'),
            'description' => esc_html__('select category as you want, leave it blank for all category', 'infotek-core'),
        ]);
        $this->add_control('order', [
            'label' => esc_html__('Order', 'infotek-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'ASC' => esc_html__('Ascending', 'infotek-core'),
                'DESC' => esc_html__('Descending', 'infotek-core'),
            ),
            'default' => 'DESC',
            'description' => esc_html__('select order', 'infotek-core')
        ]);
        $this->add_control('orderby', [
            'label' => esc_html__('OrderBy', 'infotek-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'ID' => esc_html__('ID', 'infotek-core'),
                'title' => esc_html__('Title', 'infotek-core'),
                'date' => esc_html__('Date', 'infotek-core'),
                'rand' => esc_html__('Random', 'infotek-core'),
                'comment_count' => esc_html__('Most Comments', 'infotek-core'),
            ),
            'default' => 'ID',
            'description' => esc_html__('select order', 'infotek-core')
        ]);
        $this->add_control('excerpt_length', [
            'label' => esc_html__('Excerpt Length', 'infotek-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                25 => esc_html__('Short', 'infotek-core'),
                55 => esc_html__('Regular', 'infotek-core'),
                100 => esc_html__('Long', 'infotek-core'),
            ),
            'default' => 25,
            'description' => esc_html__('select excerpt length', 'infotek-core')
        ]);
        
           $this->add_control(
            'image_thumb_display',
            [
                'label' => esc_html__('Image Display', 'infotek-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('show/hide description', 'infotek-core'),
            ]
        );
        
        $this->add_control(
            'thumb_date',
            [
                'label' => esc_html__('Thumb Date Show/Hide', 'infotek-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('show/hide description', 'infotek-core'),
            ]
        );
        $this->add_control(
            'details_date',
            [
                'label' => esc_html__('Details Date Show/Hide', 'infotek-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('show/hide description', 'infotek-core'),
            ]
        );
        $this->add_control(
            'bottom_border',
            [
                'label' => esc_html__('Bottom Border Show/Hide', 'infotek-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('show/hide description', 'infotek-core'),
            ]
        );
        $this->add_control(
            'pagination',
            [
                'label' => esc_html__('Pagination', 'infotek-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes to show pagination.', 'infotek-core'),
                'default' => 'yes'
            ]
        );
        
          $this->add_control(
            'category_display',
            [
                'label' => esc_html__('Category Display', 'infotek-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('Show  Or Hide Category.', 'infotek-core'),
            ]
        );
        
        $this->add_control(
            'pagination_alignment',
            [
                'label' => esc_html__('Pagination Alignment', 'infotek-core'),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    'left' => esc_html__('Left Align', 'infotek-core'),
                    'center' => esc_html__('Center Align', 'infotek-core'),
                    'right' => esc_html__('Right Align', 'infotek-core'),
                ),
                'description' => esc_html__('you can set pagination alignment.', 'infotek-core'),
                'default' => 'left',
                'condition' => array('pagination' => 'yes')
            ]
        );
        $this->end_controls_section();

        //style tab start
        $this->start_controls_section(
            'title_styling_settings_section',
            [
                'label' => esc_html__('Styling Settings', 'infotek-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'title_style_tabs'
        );

        $this->start_controls_tab(
            'title_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'infotek-core'),
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'grid_item_border',
                'label' => esc_html__( 'Border', 'infotek-core' ),
                'selector' => '{{WRAPPER}} .single-blog-list-3',
            ]
        );
        
         $this->add_control('normal_post_wrapper_padding', [
            'label' => esc_html__('Grid Padding', 'infotek-core'),
            'type' => Controls_Manager::DIMENSIONS,
             'size_units' => [ 'px', 'em', '%' ],
            'selectors' => [
                "{{WRAPPER}} .single-blog-list-3" => "padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};",
            ]
        ]);
        
        $this->add_control(
            'image_height',
            [
                'label' => esc_html__('Image Height', 'infotek-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 220,
                ],
                'selectors' => [
                    '{{WRAPPER}} .single-blog-list-3 .thumb' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'image_radius',
            [
                'label' => esc_html__('Image Radius', 'infotek-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .single-blog-list-3 .thumb' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control('normal_bg_color', [
            'label' => esc_html__('Bg Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-blog-list-3" => "background: {{VALUE}}"
            ]
        ]);
        $this->add_control('normal_post_title_color', [
            'label' => esc_html__('Title Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-blog-list-3 .details h5" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('normal_info_color', [
            'label' => esc_html__('Info Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-blog-list-3 .details .meta p a" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('normal_meta_color', [
            'label' => esc_html__('Meta Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-blog-list-3 .details .meta p" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('normal_post_title_padding', [
            'label' => esc_html__('Title Padding', 'infotek-core'),
            'type' => Controls_Manager::DIMENSIONS,
             'size_units' => [ 'px', 'em', '%' ],
            'selectors' => [
                "{{WRAPPER}} .single-blog-list-3 .content .title" => "padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};",
            ]
        ]);
        $this->add_control('normal_post_title_margin', [
            'label' => esc_html__('Title Margin', 'infotek-core'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', 'em', '%' ],
            'selectors' => [
                "{{WRAPPER}} .single-blog-list-3 .content .title" =>  "margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};",
            ]
        ]);
        $this->add_control('normal_post_category_color', [
            'label' => esc_html__('Category Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-blog-list-3 .content .subtitle a" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('normal_post_category_bg_color', [
            'label' => esc_html__('Category Bg Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-blog-list-3 .content .subtitle a" => "background: {{VALUE}}"
            ]
        ]);
        $this->add_responsive_control(
            'normal_post_category_padding',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__( 'Padding', 'infotek-core' ),
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .single-blog-list-3 .content .subtitle a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control('normal_post_readmore_color', [
            'label' => esc_html__('Read More Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-blog-list-3 .content .read-btn" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('normal_background_color', [
            'label' => esc_html__('Background Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-blog-list-3" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->add_responsive_control(
            'content_padding',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__( 'Padding', 'infotek-core' ),
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .single-blog-list-3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'normal_post_content_padding',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__( 'content padding', 'infotek-core' ),
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .single-blog-list-3 .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'normal_post_content_margin',
            [
                'type' => Controls_Manager::DIMENSIONS,
                'label' => esc_html__( 'content Margin', 'infotek-core' ),
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .single-blog-list-3 .content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control('normal_post_border_color', [
            'label' => esc_html__('Border Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-blog-list-3" => "border-color: {{VALUE}}"
            ],
            'condition' => [
                'bottom_border!' => '',
            ],
        ]);
        $this->end_controls_tab();

        $this->start_controls_tab(
            'title_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'infotek-core'),
            ]
        );

        $this->add_control('hover_post_title_color', [
            'label' => esc_html__('Title Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-blog-list-3 .content .title:hover" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('normal_hover_background_color', [
            'label' => esc_html__('Background Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .news-single-items:hover .content" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        //post meta style
        $this->start_controls_section(
            'post_meta_settings_section',
            [
                'label' => esc_html__('Post Meta Settings', 'infotek-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control('post_meta_color', [
            'label' => esc_html__('Post Meta Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-blog-list-3 .content .post-meta li span" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('post_meta_name_color', [
            'label' => esc_html__('Post Meta Name Color', 'infotek-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-blog-list-3 .content .post-meta li a" => "color: {{VALUE}} !important"
            ]
        ]);
        $this->end_controls_section();

        //typography style
        $this->start_controls_section(
            'typography_settings_section',
            [
                'label' => esc_html__('Typography Settings', 'infotek-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'label' => esc_html__('Title Typography', 'infotek-core'),
            'name' => 'post_meta_typography',
            'description' => esc_html__('select title typography', 'infotek-core'),
            'selector' => "{{WRAPPER}} .single-blog-list-3 .content .title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'label' => esc_html__('Category Typography', 'infotek-core'),
            'name' => 'category_typography',
            'description' => esc_html__('select category typography', 'infotek-core'),
            'selector' => "{{WRAPPER}} .single-blog-list-3 .content .subtitle a"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'label' => esc_html__('post meta Typography', 'infotek-core'),
            'name' => 'meta_typography',
            'description' => esc_html__('select post meta typography', 'infotek-core'),
            'selector' => "{{WRAPPER}} .single-blog-list-3 .content .post-meta a"
        ]);
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
        $rand_numb = rand(333, 999999999);
        //query settings
        $total_posts = $settings['total'];
        $category = $settings['category'];
        $order = $settings['order'];
        $orderby = $settings['orderby'];
        $offset = $settings['offset'];

        //other settings
        $pagination = $settings['pagination'] ? false : true;
        $pagination_alignment = $settings['pagination_alignment'];

        //setup query
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $total_posts,
            'order' => $order,
            'orderby' => $orderby,
            'offset' => $offset,
            'post_status' => 'publish',
            'ignore_sticky_posts' => 1,
        );

        if (!empty($category)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'term_id',
                    'terms' => $category
                )
            );
        }
        $post_data = new \WP_Query($args);
        ?>
        <div class="blog-list-item-wrap">
            <div class="row">
                <?php while ($post_data->have_posts()):$post_data->the_post(); 

                    //border condition here
                    $border_style_bottom = '';
                    if($settings['bottom_border'] == 'yes'){
                        $border_style_bottom = 'border-style-bottom';
                    }
                    //image condition here
                    $img_id = get_post_thumbnail_id(get_the_ID()) ? get_post_thumbnail_id(get_the_ID()) : false;
                    $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'infotek_grid_blog_12', false) : '';
                    $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                    $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

                    $comments_count = get_comments_number(get_the_ID());
                    $comment_text = ($comments_count > 1) ? 'Comments (' . $comments_count . ')' : 'Comment (' . $comments_count . ')';
                    ?>                    

                    <div class="<?php echo esc_attr($settings['blog_grid']); ?> col-md-6">

                        <div class="single-blog-list-3">
                            <div class="details">
                                <div class="meta">
                                    <p class="d-inline-block me-4">
                                        <svg width="16" height="16" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_88_1388)">
                                        <path d="M6.00082 6.2313C7.71512 6.2313 9.11647 4.82995 9.11647 3.11565C9.11647 1.40135 7.71512 0 6.00082 0C4.28652 0 2.88519 1.40135 2.88519 3.11565C2.88519 4.82995 4.28655 6.2313 6.00082 6.2313Z" fill="#4569E7"/>
                                        <path d="M11.3478 8.72102C11.2661 8.51693 11.1573 8.32646 11.0349 8.14958C10.409 7.2244 9.44303 6.61216 8.35459 6.4625C8.21855 6.44891 8.06889 6.47609 7.96003 6.55773C7.3886 6.9795 6.70834 7.19719 6.00084 7.19719C5.29334 7.19719 4.61308 6.9795 4.04165 6.55773C3.9328 6.47609 3.78313 6.43529 3.64709 6.4625C2.55865 6.61216 1.57907 7.2244 0.966832 8.14958C0.844384 8.32646 0.73553 8.53055 0.653915 8.72102C0.613108 8.80266 0.626701 8.89789 0.667509 8.97953C0.776363 9.17 0.912405 9.36049 1.03485 9.52375C1.22532 9.78226 1.42941 10.0135 1.66071 10.2312C1.85118 10.4217 2.06886 10.5986 2.28657 10.7754C3.36139 11.5782 4.65392 11.9999 5.98725 11.9999C7.32058 11.9999 8.61311 11.5782 9.68793 10.7754C9.90561 10.6122 10.1233 10.4217 10.3138 10.2312C10.5315 10.0135 10.7492 9.78224 10.9396 9.52375C11.0757 9.34687 11.1982 9.17 11.307 8.97953C11.375 8.89789 11.3886 8.80263 11.3478 8.72102Z" fill="#4569E7"/>
                                        </g>
                                        <defs>
                                        <clipPath id="clip0_88_1388">
                                        <rect width="12" height="12" fill="white"/>
                                        </clipPath>
                                        </defs>
                                        </svg>
                                        <?php infotek()->posted_by(); ?>
                                    </p>
                                    <p class="d-inline-block">
                                        <svg width="16" height="16" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_88_1385)">
                                        <path d="M6.00002 0.300049C2.69162 0.300049 1.61253e-05 2.72245 1.61253e-05 5.70005C1.61253e-05 6.74085 0.329216 7.74905 0.953616 8.62085C0.835416 9.92825 0.518616 10.8988 0.0586161 11.3586C-0.00218387 11.4194 -0.0173839 11.5124 0.0210161 11.5892C0.0550161 11.6578 0.125016 11.7 0.200016 11.7C0.209216 11.7 0.218416 11.6994 0.227816 11.698C0.308816 11.6866 2.19042 11.4158 3.55142 10.6302C4.32422 10.942 5.14742 11.1 6.00002 11.1C9.30841 11.1 12 8.67765 12 5.70005C12 2.72245 9.30841 0.300049 6.00002 0.300049ZM3.20002 6.50005C2.75882 6.50005 2.40002 6.14125 2.40002 5.70005C2.40002 5.25885 2.75882 4.90005 3.20002 4.90005C3.64122 4.90005 4.00002 5.25885 4.00002 5.70005C4.00002 6.14125 3.64122 6.50005 3.20002 6.50005ZM6.00002 6.50005C5.55882 6.50005 5.20002 6.14125 5.20002 5.70005C5.20002 5.25885 5.55882 4.90005 6.00002 4.90005C6.44122 4.90005 6.80001 5.25885 6.80001 5.70005C6.80001 6.14125 6.44122 6.50005 6.00002 6.50005ZM8.80001 6.50005C8.35882 6.50005 8.00002 6.14125 8.00002 5.70005C8.00002 5.25885 8.35882 4.90005 8.80001 4.90005C9.24121 4.90005 9.60001 5.25885 9.60001 5.70005C9.60001 6.14125 9.24121 6.50005 8.80001 6.50005Z" fill="#4569E7"/>
                                        </g>
                                        <defs>
                                        <clipPath id="clip0_88_1385">
                                        <rect width="12" height="12" fill="white"/>
                                        </clipPath>
                                        </defs>
                                        </svg>
                                        <?php infotek()->comment_count(); ?>
                                    </p>
                                </div>
                                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                <div class="thumb" style="background-image: url(<?php echo esc_url($img_url); ?>)">
                                    <?php if(!empty($settings['thumb_date'])) : ?>
                                        <div class="date text-center">
                                            <span>
                                                <?php echo date("y") ?> <br>
                                                <?php echo date("M") ?>
                                            </span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="read-more">
                                <a href="<?php echo get_the_permalink(); ?>">
                                    Read More
                                    <span>
                                        <i class="fa fa-angle-right"></i>
                                    </span>
                                </a> 
                            </div>
                            
                        </div>
                    </div>

                <?php
                endwhile;
                wp_reset_query();
                ?>
                <?php if (!$pagination) { ?>
                    <div class="col-lg-12">
                        <div class="blog-pagination text-<?php echo esc_attr($pagination_alignment) ?> margin-top-20">
                            
                                <?PHP Infotek()->post_pagination($post_data); ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Infotek_Blog_Grid_List_Widget());