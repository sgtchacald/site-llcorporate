<?php
/**
 * Elementor Widget
 * @package infotek
 * @since 1.0.0
 */

namespace Elementor;
class Service_Post extends Widget_Base
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
        return 'infotek-service-grid-list-widget';
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
        return esc_html__('Service Post', 'infotek-core');
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
        return 'eicon-post';
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
            'style',
            [
                'label'   => esc_html__( 'Select Style', 'infotek-core' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'style1',
                'options' => array(
                    'style1'   => esc_html__( 'Style One', 'infotek-core' ),
                    'style2'   => esc_html__( 'Style Two', 'infotek-core' ),
                    'style3'   => esc_html__( 'Style Three', 'infotek-core' ),
                    'style4'   => esc_html__( 'Style Four', 'infotek-core' ),
                ),
            ]
        );


        $this->add_control(
            'text',
            [
                'label'       => __( 'Bottom Text', 'infotek-core' ),
                'type'        => Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
                ],
                'placeholder' => __( 'Enter Your Text', 'infotek-core' ),
                'condition'	=> ['style' => ['style1']],
            ]
        );

        $this->add_control(
            'title1',
            [
                'label'       => __( 'Bottom Title', 'infotek-core' ),
                'type'        => Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
                ],
                'placeholder' => __( 'Enter your title', 'infotek-core' ),
                'condition'	=> ['style' => ['style1']],
            ]
        );

        $this->add_control(
			'button_link',
			[
			  'label' => __( 'Bottom Text Url', 'infotek-core' ),
			  'type' => Controls_Manager::URL,
			  'placeholder' => __( 'https://your-link.com', 'infotek-core' ),
			  'show_external' => true,
			  'default' => [
				'url' => '',
				'is_external' => true,
				'nofollow' => true,
			  ],
              'condition'	=> ['style' => ['style1']],
			
		   ]
		);
        
        $this->add_control(
            'bg_image',
            [
                'label' => esc_html__('Background image', 'infotek-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src(),],
                'condition'	=> ['style' => ['style2']],
            ]
        );	

        $this->add_control(
			'show_area',
			[
				'label' => __( 'Show Slider Dot', 'infotek-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'infotek-core' ),
				'label_off' => __( 'Hide', 'infotek-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
                'condition'	=> ['style' => ['style3']],
			]
		);	

        $this->add_control('service_grid', [
            'label' => esc_html__('Service Grid', 'infotek-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'col-lg-2' => esc_html__('col-lg-2', 'infotek-core'),
                'col-lg-3' => esc_html__('col-lg-3', 'infotek-core'),
                'col-lg-4' => esc_html__('col-lg-4', 'infotek-core'),
                'col-lg-6' => esc_html__('col-lg-6', 'infotek-core'),
            ),
            'default' => 'col-lg-3',
            'description' => esc_html__('Select Case Study Grid', 'infotek-core')
        ]);
        $this->add_control('total', [
            'label' => esc_html__('Total Posts', 'infotek-core'),
            'type' => Controls_Manager::TEXT,
            'default' => '-1',
            'description' => esc_html__('enter how many post you want in masonry , enter -1 for unlimited post.')
        ]);
        $this->add_control('category', [
            'label' => esc_html__('Category', 'infotek-core'),
            'type' => Controls_Manager::SELECT2,
            'multiple' => true,
            'options' => infotek_core()->get_terms_names('service-cat', 'id'),
            'description' => esc_html__('select category as you want, leave it blank for all category', 'infotek-core'),
        ]);
        $this->add_control('order', [
            'label' => esc_html__('Order', 'infotek-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'ASC' => esc_html__('Ascending', 'infotek-core'),
                'DESC' => esc_html__('Descending', 'infotek-core'),
            ),
            'default' => 'ASC',
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

        $this->add_control(
			'text_word_count',
			[
				'label'       => __( 'Text Word Count', 'infotek-core' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type Text Words Number', 'infotek-core' ),
				'default'   => 7,				
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

        //other settings
        $pagination = $settings['pagination'] ? false : true;
        $pagination_alignment = $settings['pagination_alignment'];

        //setup query
        $args = array(
            'post_type' => 'service',
            'posts_per_page' => $total_posts,
            'order' => $order,
            'orderby' => $orderby,
            'post_status' => 'publish',
            'ignore_sticky_posts' => 1,
        );

        if (!empty($category)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'service-cat',
                    'field' => 'term_id',
                    'terms' => $category
                )
            );
        }
        $post_data = new \WP_Query($args);
        ?>

        
<?php
	  echo '
	 <script>
 jQuery(document).ready(function($) {

//write js code under this line 

const serviceSlider = new Swiper(".service-slider", {
    spaceBetween: 30,
    speed: 1500,
    loop: true,
    autoplay: {
        delay: 1500,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".array-prev",
        prevEl: ".array-next",
    },

    breakpoints: {
        1199: {
            slidesPerView: 4,
        },
        991: {
            slidesPerView: 2,
        },
        767: {
            slidesPerView: 2,
        },
        575: {
            slidesPerView: 2,
        },
        0: {
            slidesPerView: 1,
        },
    },
});

const serviceSlider2 = new Swiper(".service-slider-2", {
    spaceBetween: 30,
    speed: 1500,
    loop: true,
    autoplay: {
        delay: 1500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".dot-2",
        clickable: true,
    },

    breakpoints: {
        1199: {
            slidesPerView: 4,
        },
        991: {
            slidesPerView: 2,
        },
        767: {
            slidesPerView: 2,
        },
        575: {
            slidesPerView: 2,
        },
        0: {
            slidesPerView: 1,
        },
    },
});

//write code above the line 

  });
</script>';

?>

<?php  if ( 'style1' === $settings['style'] ) : ?>

<section class="service-section fix">
    <div class="container">      
        <div class="service-wrapper">
            <div class="swiper service-slider">
                <div class="swiper-wrapper">
                    <?php while ($post_data->have_posts()): $post_data->the_post(); 
                        $img_id = get_post_thumbnail_id(get_the_ID());
                        $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'infotek_grid_service_12', false) : '';
                        $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                        $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

                        $comments_count = get_comments_number(get_the_ID());
                        $comment_text = ($comments_count > 1) ? 'Comments (' . $comments_count . ')' : 'Comment (' . $comments_count . ')';

                        $service_single_meta_data = get_post_meta(get_the_ID(), 'infotek_service_options', true);
                        $service_icon = isset($service_single_meta_data['service_icon']) && !empty($service_single_meta_data['service_icon']) ? $service_single_meta_data['service_icon'] : '';
                        $service_icon_shape = isset($service_single_meta_data['service_icon_shape']) && !empty($service_single_meta_data['service_icon_shape']) ? $service_single_meta_data['service_icon_shape'] : '';
                        $service_icon_shape_2 = isset($service_single_meta_data['service_icon_shape_2']) && !empty($service_single_meta_data['service_icon_shape_2']) ? $service_single_meta_data['service_icon_shape_2'] : '';
                        $service_line_shape = isset($service_single_meta_data['service_line_shape']) && !empty($service_single_meta_data['service_line_shape']) ? $service_single_meta_data['service_line_shape'] : '';
                        $service_content = isset($service_single_meta_data['service_content']) && !empty($service_single_meta_data['service_content']) ? $service_single_meta_data['service_content'] : '';

                    ?> 

                    <div class="swiper-slide">
                        <div class="service-box-items">
                            <div class="line-shape">
                                <?php if (!empty($service_line_shape) && is_array($service_line_shape)) : ?>
                                <?php $first_icon = reset($service_line_shape); ?>
                                    <img src="<?php echo esc_url($first_icon); ?>" alt="icon-img">
                                <?php endif; ?>
                            </div>
                            <div class="icon">
                                <?php if (!empty($service_icon) && is_array($service_icon)) : ?>
                                <?php $first_icon = reset($service_icon); ?>
                                    <img src="<?php echo esc_url($first_icon); ?>" alt="icon-img">
                                <?php endif; ?>
                                <div class="icon-1">
                                    <?php if (!empty($service_icon_shape) && is_array($service_icon_shape)) : ?>
                                    <?php $first_icon = reset($service_icon_shape); ?>
                                        <img src="<?php echo esc_url($first_icon); ?>" alt="icon-img">
                                    <?php endif; ?>
                                </div>
                                <div class="icon-2">
                                    <?php if (!empty($service_icon_shape_2) && is_array($service_icon_shape_2)) : ?>
                                    <?php $first_icon = reset($service_icon_shape_2); ?>
                                        <img src="<?php echo esc_url($first_icon); ?>" alt="icon-img">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="content">
                                <h4>
                                    <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                </h4>
                                <p>
                                    <?php 
                                        $text_word_count = $this->get_settings('text_word_count');
                                        echo wp_trim_words($service_content, $text_word_count);
                                    ?>
                                </p>
                                <a href="<?php the_permalink(); ?>" class="theme-btn-2 mt-3">
                                    <?php echo $settings['button'];?>
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile;
                    wp_reset_query(); ?>
                </div>
            </div>
            <div class="service-text wow fadeInUp" data-wow-delay=".4s">
                <h6>
                    <?php echo $settings['text'];?> <a href="<?php echo esc_url($settings['button_link']['url']);?>"><?php echo $settings['title1'];?></a>
                </h6>
            </div>
        </div>
    </div>
</section>

<?php  elseif ( 'style2' === $settings['style'] ) : ?>

<section class="service-section-2 fix">
    <div class="bg-img" style="background-image: url('<?php echo wp_get_attachment_url($settings['bg_image']['id']);?>');"></div>
    <div class="container">       
        <div class="row">
            <?php while ($post_data->have_posts()): $post_data->the_post(); 
                $img_id = get_post_thumbnail_id(get_the_ID());
                $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'infotek_grid_service_12', false) : '';
                $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

                $comments_count = get_comments_number(get_the_ID());
                $comment_text = ($comments_count > 1) ? 'Comments (' . $comments_count . ')' : 'Comment (' . $comments_count . ')';

                $service_single_meta_data = get_post_meta(get_the_ID(), 'infotek_service_options', true);
                $service_icon = isset($service_single_meta_data['service_icon']) && !empty($service_single_meta_data['service_icon']) ? $service_single_meta_data['service_icon'] : '';
                $service_icon_shape = isset($service_single_meta_data['service_icon_shape']) && !empty($service_single_meta_data['service_icon_shape']) ? $service_single_meta_data['service_icon_shape'] : '';
                $service_icon_shape_2 = isset($service_single_meta_data['service_icon_shape_2']) && !empty($service_single_meta_data['service_icon_shape_2']) ? $service_single_meta_data['service_icon_shape_2'] : '';
                $service_line_shape = isset($service_single_meta_data['service_line_shape']) && !empty($service_single_meta_data['service_line_shape']) ? $service_single_meta_data['service_line_shape'] : '';
                $service_content = isset($service_single_meta_data['service_content']) && !empty($service_single_meta_data['service_content']) ? $service_single_meta_data['service_content'] : '';
            ?> 
            <div class="<?php echo esc_attr($settings['service_grid']); ?> col-md-6 wow fadeInUp" data-wow-delay=".3s">
                <div class="service-box-items style-2">
                    <div class="main-img">
                        <img src="<?php echo esc_url($img_url) ?>" alt="<?php echo esc_attr($img_alt); ?>">
                    </div>
                    <div class="line-shape">
                        <?php if (!empty($service_line_shape) && is_array($service_line_shape)) : ?>
                        <?php $first_icon = reset($service_line_shape); ?>
                            <img src="<?php echo esc_url($first_icon); ?>" alt="icon-img">
                        <?php endif; ?>
                    </div>
                    <div class="icon">
                        <?php if (!empty($service_icon) && is_array($service_icon)) : ?>
                        <?php $first_icon = reset($service_icon); ?>
                            <img src="<?php echo esc_url($first_icon); ?>" alt="icon-img">
                        <?php endif; ?>
                        <div class="icon-1">
                            <?php if (!empty($service_icon_shape) && is_array($service_icon_shape)) : ?>
                            <?php $first_icon = reset($service_icon_shape); ?>
                                <img src="<?php echo esc_url($first_icon); ?>" alt="icon-img">
                            <?php endif; ?>
                        </div>
                        <div class="icon-2">
                            <?php if (!empty($service_icon_shape_2) && is_array($service_icon_shape_2)) : ?>
                            <?php $first_icon = reset($service_icon_shape_2); ?>
                                <img src="<?php echo esc_url($first_icon); ?>" alt="icon-img">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="content position-relative">
                        <h4>
                            <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                        </h4>
                        <p>
                            <?php 
                                $text_word_count = $this->get_settings('text_word_count');
                                echo wp_trim_words($service_content, $text_word_count);
                            ?>
                        </p>
                        <a href="<?php the_permalink(); ?>" class="theme-btn-2 mt-3">
                            <?php echo $settings['button'];?>
                            <i class="fa-solid fa-arrow-right-long"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php endwhile;
            wp_reset_query(); ?>
        </div>
    </div>
</section>

<?php  elseif ( 'style3' === $settings['style'] ) : ?>

<!-- Service Section Start -->
<section class="service-section-3 fix">
<div class="container">
    <div class="swiper service-slider-2">
        <div class="swiper-wrapper">
            <?php while ($post_data->have_posts()): $post_data->the_post(); 
                $img_id = get_post_thumbnail_id(get_the_ID());
                $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'infotek_grid_service_12', false) : '';
                $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

                $comments_count = get_comments_number(get_the_ID());
                $comment_text = ($comments_count > 1) ? 'Comments (' . $comments_count . ')' : 'Comment (' . $comments_count . ')';

                $service_single_meta_data = get_post_meta(get_the_ID(), 'infotek_service_options', true);
                $service_icon = isset($service_single_meta_data['service_icon']) && !empty($service_single_meta_data['service_icon']) ? $service_single_meta_data['service_icon'] : '';
                $service_icon_shape = isset($service_single_meta_data['service_icon_shape']) && !empty($service_single_meta_data['service_icon_shape']) ? $service_single_meta_data['service_icon_shape'] : '';
                $service_icon_shape_2 = isset($service_single_meta_data['service_icon_shape_2']) && !empty($service_single_meta_data['service_icon_shape_2']) ? $service_single_meta_data['service_icon_shape_2'] : '';
                $service_line_shape = isset($service_single_meta_data['service_line_shape']) && !empty($service_single_meta_data['service_line_shape']) ? $service_single_meta_data['service_line_shape'] : '';
                $service_content = isset($service_single_meta_data['service_content']) && !empty($service_single_meta_data['service_content']) ? $service_single_meta_data['service_content'] : '';
            ?> 
            <div class="swiper-slide">
                <div class="service-card-items mt-0">
                    <div class="service-image">
                        <img src="<?php echo esc_url($img_url) ?>" alt="<?php echo esc_attr($img_alt); ?>">
                    </div>
                    <div class="icon-2">
                        <?php if (!empty($service_icon) && is_array($service_icon)) : ?>
                        <?php $first_icon = reset($service_icon); ?>
                            <img src="<?php echo esc_url($first_icon); ?>" alt="icon-img">
                        <?php endif; ?>
                    </div>
                    <div class="service-content">
                        <div class="icon">
                        <?php if (!empty($service_icon) && is_array($service_icon)) : ?>
                        <?php $first_icon = reset($service_icon); ?>
                            <img src="<?php echo esc_url($first_icon); ?>" alt="icon-img">
                        <?php endif; ?>
                        </div>
                        <h4>
                            <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                        </h4>
                        <p>
                            <?php 
                                $text_word_count = $this->get_settings('text_word_count');
                                echo wp_trim_words($service_content, $text_word_count);
                            ?>
                        </p>
                        <a href="<?php the_permalink(); ?>" class="theme-btn-2 mt-3">
                            <?php echo $settings['button'];?>
                            <i class="fa-solid fa-arrow-right-long"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php endwhile;
            wp_reset_query(); ?>
        </div>

        <?php  if ( 'yes' === $settings['show_area'] ) : ?>
        <div class="swiper-dot-2">
            <div class="dot-2"></div>
        </div>
        <?php endif ;?>	

    </div>
</div>
</section>

<?php  elseif ( 'style4' === $settings['style'] ) : ?>

    <section class="service-section-3">
            <div class="container">
                <div class="row">
                    <?php while ($post_data->have_posts()): $post_data->the_post(); 
                        $img_id = get_post_thumbnail_id(get_the_ID());
                        $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'infotek_grid_service_12', false) : '';
                        $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                        $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

                        $comments_count = get_comments_number(get_the_ID());
                        $comment_text = ($comments_count > 1) ? 'Comments (' . $comments_count . ')' : 'Comment (' . $comments_count . ')';

                        $service_single_meta_data = get_post_meta(get_the_ID(), 'infotek_service_options', true);
                        $service_icon = isset($service_single_meta_data['service_icon']) && !empty($service_single_meta_data['service_icon']) ? $service_single_meta_data['service_icon'] : '';
                        $service_icon_shape = isset($service_single_meta_data['service_icon_shape']) && !empty($service_single_meta_data['service_icon_shape']) ? $service_single_meta_data['service_icon_shape'] : '';
                        $service_icon_shape_2 = isset($service_single_meta_data['service_icon_shape_2']) && !empty($service_single_meta_data['service_icon_shape_2']) ? $service_single_meta_data['service_icon_shape_2'] : '';
                        $service_line_shape = isset($service_single_meta_data['service_line_shape']) && !empty($service_single_meta_data['service_line_shape']) ? $service_single_meta_data['service_line_shape'] : '';
                        $service_content = isset($service_single_meta_data['service_content']) && !empty($service_single_meta_data['service_content']) ? $service_single_meta_data['service_content'] : '';
                    ?> 
                    <div class="<?php echo esc_attr($settings['service_grid']); ?> col-md-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="service-box-items style-3">
                            <div class="line-shape">
                                <?php if (!empty($service_line_shape) && is_array($service_line_shape)) : ?>
                                <?php $first_icon = reset($service_line_shape); ?>
                                    <img src="<?php echo esc_url($first_icon); ?>" alt="icon-img">
                                <?php endif; ?>
                            </div>
                            <div class="icon">
                                <?php if (!empty($service_icon) && is_array($service_icon)) : ?>
                                <?php $first_icon = reset($service_icon); ?>
                                    <img src="<?php echo esc_url($first_icon); ?>" alt="icon-img">
                                <?php endif; ?>
                                <div class="icon-1">
                                    <?php if (!empty($service_icon_shape) && is_array($service_icon_shape)) : ?>
                                    <?php $first_icon = reset($service_icon_shape); ?>
                                        <img src="<?php echo esc_url($first_icon); ?>" alt="icon-img">
                                    <?php endif; ?>
                                </div>
                                <div class="icon-2">
                                    <?php if (!empty($service_icon_shape_2) && is_array($service_icon_shape_2)) : ?>
                                    <?php $first_icon = reset($service_icon_shape_2); ?>
                                        <img src="<?php echo esc_url($first_icon); ?>" alt="icon-img">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="content">
                                <h4>
                                    <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                </h4>
                                <p>
                                    <?php 
                                        $text_word_count = $this->get_settings('text_word_count');
                                        echo wp_trim_words($service_content, $text_word_count);
                                    ?>
                                </p>
                                <a href="<?php the_permalink(); ?>" class="theme-btn-2 mt-3">
                                    <?php echo $settings['button'];?>
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile;
                     wp_reset_query(); ?>
                </div>
            </div>
        </section>

<?php endif ;?>	


        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Service_Post());