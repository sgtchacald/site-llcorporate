<?php
/**
 * Elementor Widget
 * @package infotek
 * @since 1.0.0
 */

namespace Elementor;
class Project_Post extends Widget_Base
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
        return 'infotek-project-post-widget';
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
        return esc_html__('Project Post Widgets', 'infotek-core');
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
                    'style5'   => esc_html__( 'Style Five', 'infotek-core' ),
                    'style6'   => esc_html__( 'Style Six', 'infotek-core' ),
                ),
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label'       => __( 'Sub Title', 'infotek-core' ),
                'type'        => Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
                ],
                'placeholder' => __( 'Enter your sub title', 'infotek-core' ),
                'condition'	=> ['style' => ['style2']],
            ]
        );
        
        $this->add_control(
                'title',
                [
                    'label'       => __( 'Title', 'infotek-core' ),
                    'type'        => Controls_Manager::TEXTAREA,
                    'dynamic'     => [
                        'active' => true,
                    ],
                    'placeholder' => __( 'Enter your title', 'infotek-core' ),
                    'condition'	=> ['style' => ['style2']],
                ]
            );

        $this->add_control(
			'image',
				[
				  'label' => __( 'Image', 'infotek-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
                  'condition'	=> ['style' => ['style2']],
				]
		);	
		
		$this->add_control(
			'alt_text',
			[
				'label'       => __( 'Alt text', 'infotek-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Your Text', 'infotek-core' ),
                'condition'	=> ['style' => ['style2']],
			]
		);

        $this->add_control(
			'image2',
				[
				  'label' => __( 'Image 2', 'infotek-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
                  'condition'	=> ['style' => ['style2']],
				]
		);	
		
		$this->add_control(
			'alt_text2',
			[
				'label'       => __( 'Alt text', 'infotek-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Your Text', 'infotek-core' ),
                'condition'	=> ['style' => ['style2']],
			]
		);

        
        $this->add_control('service_grid', [
            'label' => esc_html__('Project Grid', 'infotek-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'col-lg-2' => esc_html__('col-lg-2', 'infotek-core'),
                'col-lg-3' => esc_html__('col-lg-3', 'infotek-core'),
                'col-lg-4' => esc_html__('col-lg-4', 'infotek-core'),
                'col-lg-6' => esc_html__('col-lg-6', 'infotek-core'),
            ),
            'default' => 'col-lg-3',
            'description' => esc_html__('Select Grid', 'infotek-core'),
            'condition'	=> ['style' => ['style3']],
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
            'options' => infotek_core()->get_terms_names('project-cat', 'id'),
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
		$this->add_control('offset', [
            'label' => esc_html__('Offset Posts', 'infotek-core'),
            'type' => Controls_Manager::TEXT,
            'default' => '',
            'description' => esc_html__('enter how many post you want in masonry , enter -1 for offset post.')
        ]);
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
        $offset = $settings['offset'];

        //other settings
        $pagination = $settings['pagination'] ? false : true;
        $pagination_alignment = $settings['pagination_alignment'];

        //setup query
        $args = array(
            'post_type' => 'project',
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
                    'taxonomy' => 'project-cat',
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
 jQuery(document).ready(function($)
 {

// js code start

const projectSlider = new Swiper(".project-slider", {
    spaceBetween: 30,
    speed: 1500,
    loop: true,
    autoplay: {
        delay: 1500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".dot-3",
        clickable: true,
    },
    breakpoints: {
        1199: {
            slidesPerView: 4,
        },
        991: {
            slidesPerView: 3,
        },
        767: {
            slidesPerView: 2,
        },
        650: {
            slidesPerView: 2,
        },

        575: {
            slidesPerView: 1,
        },

        0: {
            slidesPerView: 1,
        },
    },
});


const projectSlider2 = new Swiper(".project-slider-2", {
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
    navigation: {
        nextEl: ".array-prev",
        prevEl: ".array-next",
    },
    breakpoints: {
        1199: {
            slidesPerView: 3,
        },
        991: {
            slidesPerView: 2,
        },
        767: {
            slidesPerView: 2,
        },

        575: {
            slidesPerView: 1,
        },

        0: {
            slidesPerView: 1,
        },
    },
});


const projectSlider3 = new Swiper(".project-slider-3", {
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
        650: {
            slidesPerView: 2,
        },

        575: {
            slidesPerView: 1,
        },

        0: {
            slidesPerView: 1,
        },
    },
});

//js code end

  });
</script>';


?>

     
<?php  if ( 'style1' === $settings['style'] ) : ?>

   <!-- Project Section Start -->
<section class="project-section fix">
    <div class="swiper project-slider">
        <div class="swiper-wrapper">
        <?php while ($post_data->have_posts()):$post_data->the_post(); 
        //image condition here
            $img_id = get_post_thumbnail_id(get_the_ID()) ? get_post_thumbnail_id(get_the_ID()) : false;
            $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'infotek_grid_service_12', false) : '';
            $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
            $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

            $comments_count = get_comments_number(get_the_ID());
            $comment_text = ($comments_count > 1) ? 'Comments (' . $comments_count . ')' : 'Comment (' . $comments_count . ')';

            $project_single_meta_data = get_post_meta(get_the_ID(), 'infotek_project_options', true);
            $service_icon = isset($project_single_meta_data['service_icon']) && !empty($project_single_meta_data['service_icon']) ? $project_single_meta_data['service_icon'] : '';
            $project_content = isset($project_single_meta_data['project_content']) && !empty($project_single_meta_data['project_content']) ? $project_single_meta_data['project_content'] : '';
            ?> 
            <div class="swiper-slide">
                <div class="project-items">
                    <div class="project-image">
                        <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                        <div class="project-content">
                            <p><?php echo $project_content; ?></p>
                            <h4>
                                <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                            </h4>
                            <a href="<?php the_permalink(); ?>" class="icon">
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        endwhile;
        wp_reset_query();
        ?>  
        </div>
        <div class="swiper-dot-2">
            <div class="dot-3"></div>
        </div>
    </div>
</section>

<?php  elseif ( 'style2' === $settings['style'] ) : ?>

<section class="project-section-2 section-padding fix">
    <div class="left-shape">
    <?php  if ( !empty(esc_url($settings['image']['id']) )) : ?>   
        <img src="<?php echo wp_get_attachment_url($settings['image']['id']);?>" alt="<?php echo esc_attr($settings['alt_text']);?>"/>
    <?php endif;?>
    </div>
    <div class="right-shape">
    <?php  if ( !empty(esc_url($settings['image2']['id']) )) : ?>   
        <img src="<?php echo wp_get_attachment_url($settings['image2']['id']);?>" alt="<?php echo esc_attr($settings['alt_text2']);?>"/>
    <?php endif;?>
    </div>
    <div class="container">
        <?php if($settings['title']): ?>
        <div class="section-title-area">
            <div class="section-title">
                <span class="wow fadeInUp"><?php echo $settings['subtitle'];?></span>
                <h2 class="wow fadeInUp" data-wow-delay=".3s">
                    <?php echo $settings['title'];?>
                </h2>
            </div>
            <div class="array-button wow fadeInUp" data-wow-delay=".5s">
                <button class="array-prev"><i class="fal fa-arrow-right"></i></button>
                <button class="array-next"><i class="fal fa-arrow-left"></i></button>
            </div>
        </div>
        <?php endif; ?>
        <div class="project-wrapper">
            <div class="swiper project-slider-2">
                <div class="swiper-wrapper">
                <?php while ($post_data->have_posts()):$post_data->the_post(); 
                //image condition here
                    $img_id = get_post_thumbnail_id(get_the_ID()) ? get_post_thumbnail_id(get_the_ID()) : false;
                    $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'infotek_grid_service_12', false) : '';
                    $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                    $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

                    $comments_count = get_comments_number(get_the_ID());
                    $comment_text = ($comments_count > 1) ? 'Comments (' . $comments_count . ')' : 'Comment (' . $comments_count . ')';

                    $project_single_meta_data = get_post_meta(get_the_ID(), 'infotek_project_options', true);
                    $service_icon = isset($project_single_meta_data['service_icon']) && !empty($project_single_meta_data['service_icon']) ? $project_single_meta_data['service_icon'] : '';
                    $project_content = isset($project_single_meta_data['project_content']) && !empty($project_single_meta_data['project_content']) ? $project_single_meta_data['project_content'] : '';
                    ?> 
                    <div class="swiper-slide">
                        <div class="project-items style-2">
                            <div class="project-image">
                                <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                                <div class="project-content">
                                    <p><?php echo $project_content; ?></p>
                                    <h4>
                                        <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                    </h4>
                                    <a href="<?php the_permalink(); ?>" class="arrow-icon">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    endwhile;
                    wp_reset_query();
                    ?> 
                </div>
            </div>
        </div>
    </div>
</section>

<?php  elseif ( 'style3' === $settings['style'] ) : ?>

<section class="project-section fix">
    <div class="container">
        <div class="row g-4">
            <?php while ($post_data->have_posts()):$post_data->the_post(); 
            //image condition here
                $img_id = get_post_thumbnail_id(get_the_ID()) ? get_post_thumbnail_id(get_the_ID()) : false;
                $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'infotek_grid_service_12', false) : '';
                $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

                $comments_count = get_comments_number(get_the_ID());
                $comment_text = ($comments_count > 1) ? 'Comments (' . $comments_count . ')' : 'Comment (' . $comments_count . ')';

                $project_single_meta_data = get_post_meta(get_the_ID(), 'infotek_project_options', true);
                $service_icon = isset($project_single_meta_data['service_icon']) && !empty($project_single_meta_data['service_icon']) ? $project_single_meta_data['service_icon'] : '';
                $project_content = isset($project_single_meta_data['project_content']) && !empty($project_single_meta_data['project_content']) ? $project_single_meta_data['project_content'] : '';
            ?> 
            <div class="<?php echo esc_attr($settings['service_grid']); ?> col-md-6 wow fadeInUp" data-wow-delay=".3s">
                <div class="project-items">
                    <div class="project-image">
                        <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                        <div class="project-content">
                            <p><?php echo $project_content; ?></p>
                            <h4>
                                <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile;
            wp_reset_query(); ?>
        </div>
    </div>
</section>

<?php  elseif ( 'style4' === $settings['style'] ) : ?>

<section class="project-section fix">
    <div class="container">
        <div class="project-wrapper ms-0">
            <div class="swiper project-slider-2">
                <div class="swiper-wrapper">
                <?php while ($post_data->have_posts()):$post_data->the_post(); 
                    //image condition here
                        $img_id = get_post_thumbnail_id(get_the_ID()) ? get_post_thumbnail_id(get_the_ID()) : false;
                        $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'infotek_grid_service_12', false) : '';
                        $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                        $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

                        $comments_count = get_comments_number(get_the_ID());
                        $comment_text = ($comments_count > 1) ? 'Comments (' . $comments_count . ')' : 'Comment (' . $comments_count . ')';

                        $project_single_meta_data = get_post_meta(get_the_ID(), 'infotek_project_options', true);
                        $service_icon = isset($project_single_meta_data['service_icon']) && !empty($project_single_meta_data['service_icon']) ? $project_single_meta_data['service_icon'] : '';
                        $project_content = isset($project_single_meta_data['project_content']) && !empty($project_single_meta_data['project_content']) ? $project_single_meta_data['project_content'] : '';
                    ?> 
                    <div class="swiper-slide">
                        <div class="project-items style-2 mt-0">
                            <div class="project-image">
                                <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                                <div class="project-content">
                                    <p><?php echo $project_content; ?></p>
                                    <h4>
                                        <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                    </h4>
                                    <a href="<?php the_permalink(); ?>" class="arrow-icon">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile;
                    wp_reset_query(); ?>
                </div>
                <div class="swiper-dot-2">
                    <div class="dot-2"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php  elseif ( 'style5' === $settings['style'] ) : ?>

    <div class="project-wrapper style-2">
        <div class="swiper project-slider-3">
            <div class="swiper-wrapper">
                <?php while ($post_data->have_posts()):$post_data->the_post(); 
                    //image condition here
                        $img_id = get_post_thumbnail_id(get_the_ID()) ? get_post_thumbnail_id(get_the_ID()) : false;
                        $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'infotek_grid_service_12', false) : '';
                        $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                        $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

                        $comments_count = get_comments_number(get_the_ID());
                        $comment_text = ($comments_count > 1) ? 'Comments (' . $comments_count . ')' : 'Comment (' . $comments_count . ')';

                        $project_single_meta_data = get_post_meta(get_the_ID(), 'infotek_project_options', true);
                        $service_icon = isset($project_single_meta_data['service_icon']) && !empty($project_single_meta_data['service_icon']) ? $project_single_meta_data['service_icon'] : '';
                        $project_content = isset($project_single_meta_data['project_content']) && !empty($project_single_meta_data['project_content']) ? $project_single_meta_data['project_content'] : '';
                    ?> 
                <div class="swiper-slide">
                    <div class="project-items style-2">
                        <div class="project-image">
                            <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                            <div class="project-content">
                                <p><?php echo $project_content; ?></p>
                                <h4>
                                    <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                </h4>
                                <a href="<?php the_permalink(); ?>" class="arrow-icon-2">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile;
                    wp_reset_query(); ?>
            </div>
        </div>
    </div>

    <div class="swiper-dot-2 mr-left">
        <div class="dot-2"></div>
    </div>

    <?php  elseif ( 'style6' === $settings['style'] ) : ?>

        <section class="project-section fix">
            <div class="container">
            </div>
            <div class="swiper project-slider">
                <div class="swiper-wrapper">
                <?php while ($post_data->have_posts()):$post_data->the_post(); 
                    //image condition here
                        $img_id = get_post_thumbnail_id(get_the_ID()) ? get_post_thumbnail_id(get_the_ID()) : false;
                        $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'infotek_grid_service_12', false) : '';
                        $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                        $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

                        $comments_count = get_comments_number(get_the_ID());
                        $comment_text = ($comments_count > 1) ? 'Comments (' . $comments_count . ')' : 'Comment (' . $comments_count . ')';

                        $project_single_meta_data = get_post_meta(get_the_ID(), 'infotek_project_options', true);
                        $service_icon = isset($project_single_meta_data['service_icon']) && !empty($project_single_meta_data['service_icon']) ? $project_single_meta_data['service_icon'] : '';
                        $project_content = isset($project_single_meta_data['project_content']) && !empty($project_single_meta_data['project_content']) ? $project_single_meta_data['project_content'] : '';
                    ?> 
                    <div class="swiper-slide">
                        <div class="project-items style-2">
                            <div class="project-image">
                                <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                                <div class="project-content">
                                    <p><?php echo $project_content; ?></p>
                                    <h4>
                                        <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                    </h4>
                                </div>
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

Plugin::instance()->widgets_manager->register_widget_type(new Project_Post());