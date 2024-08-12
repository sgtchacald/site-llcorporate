<?php
/**
 * Elementor Widget
 * @package infotek
 * @since 1.0.0
 */

namespace Elementor;

class Team_Post extends Widget_Base
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
        return 'team-post';
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
        return esc_html__('Team Post Widgets', 'infotek-core');
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
            'slider_settings_section',
            [
                'label' => esc_html__('Team Settings', 'infotek-core'),
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

        $this->add_control('column_grid', [
            'label' => esc_html__('Column Grid', 'infotek-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'col-lg-2' => esc_html__('col-lg-2', 'infotek-core'),
                'col-lg-3' => esc_html__('col-lg-3', 'infotek-core'),
                'col-lg-4' => esc_html__('col-lg-4', 'infotek-core'),
                'col-lg-6' => esc_html__('col-lg-6', 'infotek-core'),
            ),
            'default' => 'col-lg-4',
            'description' => esc_html__('Select Team Grid', 'infotek-core')
        ]);

        $this->add_control(
			'image',
				[
				  'label' => __( 'Image', 'infotek-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
                  'condition'	=> ['style' => ['style1']],
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
                'condition'	=> ['style' => ['style1']],
			]
		);

        $this->add_control(
			'image2',
				[
				  'label' => __( 'Image 2', 'infotek-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
                  'condition'	=> ['style' => ['style1']],
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
                'condition'	=> ['style' => ['style1']],
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
                'condition'	=> ['style' => ['style1']],
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
                    'condition'	=> ['style' => ['style1']],
                ]
        );
            
        $this->add_control(
			'button',
			[
				'label'       => __( 'Button', 'infotek-core' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => esc_html__( 'Enter your button text', 'infotek-core' ),
				'default' => esc_html__('All Member', 'infotek-core'),
                'condition'	=> ['style' => ['style1']],
			]
		);	

	    $this->add_control(
			'button_link',
			[
			  'label' => __( 'Button Url', 'infotek-core' ),
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
        $this->add_control('total', [
            'label' => esc_html__('Total Posts', 'infotek-core'),
            'type' => Controls_Manager::TEXT,
            'default' => '-1',
            'description' => esc_html__('enter how many course you want in masonry , enter -1 for unlimited course.')
        ]);
        $this->add_control('category', [
            'label' => esc_html__('Category', 'infotek-core'),
            'type' => Controls_Manager::SELECT2,
            'multiple' => true,
            'options' => Infotek()->get_terms_names('team-cat', 'id'),
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
            'post_type' => 'team',
            'posts_per_page' => $total_posts,
            'order' => $order,
            'orderby' => $orderby,
            'post_status' => 'publish'
        );

        if (!empty($category)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'team-cat',
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
const teamSlider = new Swiper(".team-slider", {
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

//js code end

  });
</script>';


?>


<?php  if ( 'style1' === $settings['style'] ) : ?>
        <!--<< Team Section Start >>-->
<section class="team-section">
    <div class="line-shape">
    <?php  if ( !empty(esc_url($settings['image']['id']) )) : ?>   
        <img src="<?php echo wp_get_attachment_url($settings['image']['id']);?>" alt="<?php echo esc_attr($settings['alt_text']);?>"/>
    <?php endif;?>
    </div>
    <div class="mask-shape">
    <?php  if ( !empty(esc_url($settings['image2']['id']) )) : ?>   
        <img src="<?php echo wp_get_attachment_url($settings['image2']['id']);?>" alt="<?php echo esc_attr($settings['alt_text2']);?>"/>
    <?php endif;?>
    </div>
    <div class="container">
        <div class="section-title-area">
            <div class="section-title">
                <span class="text-white wow fadeInUp"><?php echo $settings['subtitle'];?></span>
                <h2 class="text-white wow fadeInUp" data-wow-delay=".3s"><?php echo $settings['title'];?></h2>
            </div>
            <a href="<?php echo esc_url($settings['button_link']['url']);?>" class="theme-btn hover-white wow fadeInUp" data-wow-delay=".5s">
                <?php echo $settings['button'];?>
                <i class="fa-solid fa-arrow-right-long"></i>
            </a>
        </div>
        <div class="team-wrapper">
            <?php
            while ($post_data->have_posts()) : $post_data->the_post();
                $post_id = get_the_ID();
                $img_id = get_post_thumbnail_id($post_id) ? get_post_thumbnail_id($post_id) : false;
                $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'infotek-team-slider-one', false) : '';
                $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);                     

                $team_single_meta_data = get_post_meta(get_the_ID(), 'infotek_team_options', true);
                $social_icons = isset($team_single_meta_data['social-icons']) && !empty($team_single_meta_data['social-icons']) ? $team_single_meta_data['social-icons'] : '';

                ?>
            <div class="team-items bor-bottom wow fadeInUp" data-wow-delay=".3s">
                <div class="team-title">
                    <span><?php echo $team_single_meta_data['designation']; ?></span>
                    <h4><a href="<?php echo get_the_permalink(); ?>"><?php echo esc_html(get_the_title($post_id)) ?></a></h4>
                </div>
                <p>
                    <?php echo $team_single_meta_data['team_content']; ?>
                </p>
                <div class="team-hover d-none d-md-block bg-cover" style="background-image: url('<?php echo esc_url($img_url) ?>');"></div>
                <div class="social-profile">
                    <ul>
                        <?php
                            if (!empty($social_icons)) {
                                foreach ($social_icons as $item) {
                                    printf('<li><a href="%1$s"><i class="%2$s"></i></a></li>', $item['url'], $item['icon']);
                                }
                            }
                        ?>
                    </ul>
                    <span class="plus-btn"><i class="fa-solid fa-plus"></i></span>
                </div>
            </div>
            <?php
                endwhile;
                wp_reset_query();
            ?> 
        </div>
    </div>
</section>

<?php  elseif ( 'style2' === $settings['style'] ) : ?>
<!--<< Team Section Start >>-->
<section class="team-section-2">
    <div class="container">       
        <div class="row">
            <?php
            while ($post_data->have_posts()) : $post_data->the_post();
                $post_id = get_the_ID();
                $img_id = get_post_thumbnail_id($post_id) ? get_post_thumbnail_id($post_id) : false;
                $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'infotek-team-slider-one', false) : '';
                $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);                     

                $team_single_meta_data = get_post_meta(get_the_ID(), 'infotek_team_options', true);
                $social_icons = isset($team_single_meta_data['social-icons']) && !empty($team_single_meta_data['social-icons']) ? $team_single_meta_data['social-icons'] : '';

                ?>
            <div class="<?php echo esc_attr($settings['column_grid']); ?> col-md-6 wow fadeInUp" data-wow-delay=".3s">
                <div class="team-card-items">
                    <div class="team-image">
                        <img src="<?php echo esc_url($img_url) ?>" alt="<?php echo esc_attr($img_alt); ?>">
                        <div class="social-profile">
                            <span class="plus-btn"><i class="fas fa-share-alt"></i></span>
                            <ul>
                            <?php
                            if (!empty($social_icons)) {
                                foreach ($social_icons as $item) {
                                    printf('<li><a href="%1$s"><i class="%2$s"></i></a></li>', $item['url'], $item['icon']);
                                    }
                                }
                            ?>                                
                            </ul>
                        </div>
                    </div>
                    <div class="team-content text-center">
                        <h3>
                            <a href="<?php echo get_the_permalink(); ?>"><?php echo esc_html(get_the_title($post_id)) ?></a>
                        </h3>
                        <p><?php echo $team_single_meta_data['designation']; ?></p>
                    </div>
                </div>
            </div>
            <?php
                endwhile;
                wp_reset_query();
            ?> 
        </div>
    </div>
</section>

<?php  elseif ( 'style3' === $settings['style'] ) : ?>

<!--<< Team Section Start >>-->
<section class="team-section-3 fix">
    <div class="container">
        <div class="row">
        <?php
            while ($post_data->have_posts()) : $post_data->the_post();
                $post_id = get_the_ID();
                $img_id = get_post_thumbnail_id($post_id) ? get_post_thumbnail_id($post_id) : false;
                $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'infotek-team-slider-one', false) : '';
                $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);                     

                $team_single_meta_data = get_post_meta(get_the_ID(), 'infotek_team_options', true);
                $social_icons = isset($team_single_meta_data['social-icons']) && !empty($team_single_meta_data['social-icons']) ? $team_single_meta_data['social-icons'] : '';

                ?>
            <div class="<?php echo esc_attr($settings['column_grid']); ?> col-md-6 wow fadeInUp" data-wow-delay=".3s">
                <div class="single-team-items">
                    <div class="team-image">
                        <img src="<?php echo esc_url($img_url) ?>" alt="<?php echo esc_attr($img_alt); ?>">
                        <div class="social-profile">
                            <ul>                            
                            <?php
                                if (!empty($social_icons)) {
                                    foreach ($social_icons as $item) {
                                        printf('<li><a href="%1$s"><i class="%2$s"></i></a></li>', $item['url'], $item['icon']);
                                        }
                                    }
                                ?>  
                            </ul>
                            <span class="plus-btn"><i class="fas fa-share-alt"></i></span>
                        </div>
                    </div>
                    <div class="team-content text-center">
                        <h3>
                            <a href="<?php echo get_the_permalink(); ?>"><?php echo esc_html(get_the_title($post_id)) ?></a>
                        </h3>
                        <p><?php echo $team_single_meta_data['designation']; ?></p>
                    </div>
                </div>
            </div>
            <?php
                endwhile;
                wp_reset_query();
            ?> 
        </div>
    </div>
</section>

<?php  elseif ( 'style4' === $settings['style'] ) : ?>

<section class="team-section-4 fix">
    <div class="container">
        <div class="swiper team-slider">
            <div class="swiper-wrapper">
            <?php
            while ($post_data->have_posts()) : $post_data->the_post();
                $post_id = get_the_ID();
                $img_id = get_post_thumbnail_id($post_id) ? get_post_thumbnail_id($post_id) : false;
                $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'infotek-team-slider-one', false) : '';
                $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);                     

                $team_single_meta_data = get_post_meta(get_the_ID(), 'infotek_team_options', true);
                $social_icons = isset($team_single_meta_data['social-icons']) && !empty($team_single_meta_data['social-icons']) ? $team_single_meta_data['social-icons'] : '';

                ?>
                <div class="swiper-slide">
                    <div class="single-team-items mt-0">
                        <div class="team-image">
                            <img src="<?php echo esc_url($img_url) ?>" alt="<?php echo esc_attr($img_alt); ?>">
                            <div class="social-profile">
                                <ul>                            
                                <?php
                                    if (!empty($social_icons)) {
                                        foreach ($social_icons as $item) {
                                            printf('<li><a href="%1$s"><i class="%2$s"></i></a></li>', $item['url'], $item['icon']);
                                            }
                                        }
                                    ?>  
                                </ul>
                                <span class="plus-btn"><i class="fas fa-share-alt"></i></span>
                            </div>
                        </div>
                        <div class="team-content text-center">
                            <h3>
                                <a href="<?php echo get_the_permalink(); ?>"><?php echo esc_html(get_the_title($post_id)) ?></a>
                            </h3>
                            <p><?php echo $team_single_meta_data['designation']; ?></p>
                        </div>
                    </div>
                </div>
                <?php
                endwhile;
                wp_reset_query();
            ?> 
            </div>
            <div class="swiper-dot-2">
                <div class="dot-2"></div>
            </div>
        </div>
    </div>
</section>

<?php  elseif ( 'style5' === $settings['style'] ) : ?>
    <section class="team-section-3 fix">
            <div class="container">
                <div class="row">
                <?php
                while ($post_data->have_posts()) : $post_data->the_post();
                    $post_id = get_the_ID();
                    $img_id = get_post_thumbnail_id($post_id) ? get_post_thumbnail_id($post_id) : false;
                    $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'infotek-team-slider-one', false) : '';
                    $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                    $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);                     

                    $team_single_meta_data = get_post_meta(get_the_ID(), 'infotek_team_options', true);
                    $social_icons = isset($team_single_meta_data['social-icons']) && !empty($team_single_meta_data['social-icons']) ? $team_single_meta_data['social-icons'] : '';

                    ?>
                    <div class="<?php echo esc_attr($settings['column_grid']); ?> col-md-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="single-team-items">
                            <div class="team-image">
                                <img src="<?php echo esc_url($img_url) ?>" alt="<?php echo esc_attr($img_alt); ?>">
                                <div class="social-profile">
                                    <ul>
                                    <?php
                                        if (!empty($social_icons)) {
                                            foreach ($social_icons as $item) {
                                                printf('<li><a href="%1$s"><i class="%2$s"></i></a></li>', $item['url'], $item['icon']);
                                                }
                                            }
                                        ?>
                                    </ul>
                                    <span class="plus-btn"><i class="fas fa-share-alt"></i></span>
                                </div>
                            </div>
                            <div class="team-content text-center">
                                <h3>
                                    <a href="<?php echo get_the_permalink(); ?>"><?php echo esc_html(get_the_title($post_id)) ?></a>
                                </h3>
                                <p><?php echo $team_single_meta_data['designation']; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                    endwhile;
                        wp_reset_query();
                    ?> 
                </div>
            </div>
        </section>

        <?php  elseif ( 'style6' === $settings['style'] ) : ?>

            <section class="team-section-4 fix">
            <div class="container">
                <div class="row">
                <?php
                while ($post_data->have_posts()) : $post_data->the_post();
                    $post_id = get_the_ID();
                    $img_id = get_post_thumbnail_id($post_id) ? get_post_thumbnail_id($post_id) : false;
                    $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'infotek-team-slider-one', false) : '';
                    $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                    $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);                     

                    $team_single_meta_data = get_post_meta(get_the_ID(), 'infotek_team_options', true);
                    $social_icons = isset($team_single_meta_data['social-icons']) && !empty($team_single_meta_data['social-icons']) ? $team_single_meta_data['social-icons'] : '';

                    ?>
                    <div class="<?php echo esc_attr($settings['column_grid']); ?> col-md-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="team-box-items">
                            <div class="team-image">
                                <img src="<?php echo esc_url($img_url) ?>" alt="<?php echo esc_attr($img_alt); ?>">
                            </div>
                            <div class="team-content">
                                <h3>
                                    <a href="<?php echo get_the_permalink(); ?>"><?php echo esc_html(get_the_title($post_id)) ?></a>
                                </h3>
                                <p><?php echo $team_single_meta_data['designation']; ?></p>
                                <div class="social-icon d-flex align-items-center">
                                    <?php
                                    if (!empty($social_icons)) {
                                        foreach ($social_icons as $item) {
                                            printf('<a href="%1$s"><i class="%2$s"></i></a>', $item['url'], $item['icon']);
                                            }
                                        }
                                    ?>
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
        </section>

<?php endif ;?>	


        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Team_Post());