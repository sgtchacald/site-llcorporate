<?php
/**
 * Elementor Widget
 * @package Infotek
 * @since 1.0.0
 */

namespace Elementor;

class Blog_Post extends Widget_Base
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
        return 'infotek-blog-post-widget';
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
        return esc_html__('Blog Post', 'infotek-core');
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
                ),
            ]
        );
        
        $this->add_control('blog_grid', [
            'label' => esc_html__('Blog Grid', 'infotek-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'col-lg-2' => esc_html__('col-lg-2', 'infotek-core'),
                'col-lg-3' => esc_html__('col-lg-3', 'infotek-core'),
                'col-lg-4' => esc_html__('col-lg-4', 'infotek-core'),
                'col-lg-6' => esc_html__('col-lg-6', 'infotek-core'),
                'col-lg-12' => esc_html__('col-lg-12', 'infotek-core'),
            ),
            'default' => 'col-lg-4',
            'description' => esc_html__('Select Blog Grid', 'infotek-core')
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


     
<?php
	  echo '
	 <script>
 jQuery(document).ready(function($) {

//write js code under this line 

const newsSlider = new Swiper(".news-slider", {
    spaceBetween: 30,
    speed: 1500,
    loop: true,
    autoplay: {
        delay: 2000,
        disableOnInteraction: false,
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

//write code above the line 

  });
</script>';

?>

        
        <?php  if ( 'style1' === $settings['style'] ) : ?>

        <section class="news-section fix">
            <div class="container">
            </div>
            <div class="news-wrapper">
                <div class="row">
                <?php while ($post_data->have_posts()):$post_data->the_post(); 
                   
                    //image condition here
                    $img_id = get_post_thumbnail_id(get_the_ID()) ? get_post_thumbnail_id(get_the_ID()) : false;
                    $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'infotek_grid_blog_12', false) : '';
                    $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                    $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

                    $comments_count = get_comments_number(get_the_ID());
                    $comment_text = ($comments_count > 1) ? 'Comments (' . $comments_count . ')' : 'Comment (' . $comments_count . ')';
                    ?>  
                    <div class="<?php echo esc_attr($settings['blog_grid']); ?> col-md-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="single-news-items">
                            <div class="news-image bg-cover" style="background-image: url('<?php echo esc_url($img_url); ?>');">
                            <?php if(!empty($settings['thumb_date'])) : ?>
                                <div class="post-date">
                                    <span><?php echo get_the_date('F j, Y');?></span>
                                </div>
                            <?php endif; ?>
                            </div>
                            <div class="news-content">
                                <h3>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <p>
                                    <?php print wp_trim_words( get_the_content(), 17, null ); ?>
                                </p>
                                <a href="<?php echo get_the_permalink(); ?>" class="theme-btn-2 mt-3">
                                    Read More
                                </a>
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

        <?php  elseif ( 'style2' === $settings['style'] ) : ?>

            <section class="news-section fix pb-3">
            <div class="container">
                <div class="row">
                <?php while ($post_data->have_posts()):$post_data->the_post(); 
                   
                   //image condition here
                   $img_id = get_post_thumbnail_id(get_the_ID()) ? get_post_thumbnail_id(get_the_ID()) : false;
                   $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'infotek_grid_blog_12', false) : '';
                   $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                   $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

                   $comments_count = get_comments_number(get_the_ID());
                   $comment_text = ($comments_count > 1) ? 'Comments (' . $comments_count . ')' : 'Comment (' . $comments_count . ')';
                   ?>  
                    <div class="<?php echo esc_attr($settings['blog_grid']); ?> col-md-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="news-card-items">
                            <div class="news-image">
                                <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                                <div class="post-date">
                                <?php if(!empty($settings['thumb_date'])) : ?>
                                    <h3>
                                        <?php echo get_the_date('j');?> <br>
                                        <span><?php echo get_the_date('F');?></span>
                                    </h3>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="news-content">
                                <ul>
                                    <li>
                                        <i class="fa-regular fa-user"></i>
                                        By <?php the_author(); ?>
                                    </li>

                                    <li>
                                        <i class="fa-solid fa-tag"></i>
                                        <?php
                                        $post_tags = get_the_tags();
                                        if ($post_tags) {
                                            $first_tag = reset($post_tags);
                                            echo '<a href="' . get_tag_link($first_tag->term_id) . '">' . $first_tag->name . '</a>';
                                        } else {
                                            echo "No tags found";
                                        }
                                        ?>
                                    </li>
                                
                                </ul>
                                <h3>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <a href="<?php the_permalink(); ?>" class="theme-btn-2 mt-3">
                                    read More
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
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

<section class="news-section-4 fix pb-4">
    <div class="container">
        <div class="row g-4">
            <?php while ($post_data->have_posts()):$post_data->the_post(); 
                
                //image condition here
                $img_id = get_post_thumbnail_id(get_the_ID()) ? get_post_thumbnail_id(get_the_ID()) : false;
                $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'infotek_grid_blog_12', false) : '';
                $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

                $comments_count = get_comments_number(get_the_ID());
                $comment_text = ($comments_count > 1) ? 'Comments (' . $comments_count . ')' : 'Comment (' . $comments_count . ')';
                ?>
            <div class="<?php echo esc_attr($settings['blog_grid']); ?> col-md-6 wow fadeInUp" data-wow-delay=".3s">
                <div class="news-card-items style-2 mt-0 pb-0">
                    <div class="news-image">
                        <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                        <div class="post-date">
                            <h3>
                                <?php echo get_the_date('j');?> <br>
                                <span><?php echo get_the_date('F');?></span>
                            </h3>
                        </div>
                    </div>
                    <div class="news-content">
                        <ul>
                            <li>
                                <i class="fa-regular fa-user"></i>
                                By <?php the_author(); ?>
                            </li>

                            <li>
                                <i class="fa-solid fa-tag"></i>
                                <?php
                                $post_tags = get_the_tags();
                                if ($post_tags) {
                                    $first_tag = reset($post_tags);
                                    echo '<a href="' . get_tag_link($first_tag->term_id) . '">' . $first_tag->name . '</a>';
                                } else {
                                    echo "No tags found";
                                }
                                ?>
                            </li>                            
                        </ul>
                        <h3>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <a href="<?php the_permalink(); ?>" class="theme-btn-2 mt-3">
                            read More
                            <i class="fa-solid fa-arrow-right-long"></i>
                        </a>
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

    <section class="news-section-3 fix">
            <div class="container">
                <div class="swiper news-slider">
                    <div class="swiper-wrapper">
                        <?php while ($post_data->have_posts()):$post_data->the_post(); 

                        $img_id = get_post_thumbnail_id(get_the_ID()) ? get_post_thumbnail_id(get_the_ID()) : false;
                        $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'infotek_grid_blog_12', false) : '';
                        $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                        $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

                        $comments_count = get_comments_number(get_the_ID());
                        $comment_text = ($comments_count > 1) ? 'Comments (' . $comments_count . ')' : 'Comment (' . $comments_count . ')';

                        ?>
                        <div class="swiper-slide">
                            <div class="news-card-items style-2">
                                <div class="news-image">
                                    <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                                    <div class="post-date">
                                    <h3>
                                        <?php echo get_the_date('j');?> <br>
                                        <span><?php echo get_the_date('F');?></span>
                                    </h3>
                                    </div>
                                </div>
                                <div class="news-content">
                                    <ul>
                                        <li>
                                            <i class="fa-regular fa-user"></i>
                                            By <?php the_author(); ?>
                                        </li>

                                        <li>
                                            <i class="fa-solid fa-tag"></i>
                                            <?php
                                            $post_tags = get_the_tags();
                                            if ($post_tags) {
                                                $first_tag = reset($post_tags);
                                                echo '<a href="' . get_tag_link($first_tag->term_id) . '">' . $first_tag->name . '</a>';
                                            } else {
                                                echo "No tags found";
                                            }
                                            ?>
                                        </li>                            
                                    </ul>
                                    <h3>
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    <a href="<?php the_permalink(); ?>" class="theme-btn-2 mt-3">
                                        read More
                                        <i class="fa-solid fa-arrow-right-long"></i>
                                    </a>
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
        </section>

        <?php  elseif ( 'style5' === $settings['style'] ) : ?>

            <section class="news-section-4 fix">
            <div class="container">
                <div class="row">
                <?php while ($post_data->have_posts()):$post_data->the_post(); 

                    $img_id = get_post_thumbnail_id(get_the_ID()) ? get_post_thumbnail_id(get_the_ID()) : false;
                    $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'infotek_grid_blog_12', false) : '';
                    $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                    $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

                    $comments_count = get_comments_number(get_the_ID());
                    $comment_text = ($comments_count > 1) ? 'Comments (' . $comments_count . ')' : 'Comment (' . $comments_count . ')';

                    ?>
                    <div class="<?php echo esc_attr($settings['blog_grid']); ?> col-md-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="news-card-items style-2 style-3">
                            <div class="news-image">
                                <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                                <div class="post-date">
                                    <h3>
                                        <?php echo get_the_date('j');?> <br>
                                        <span><?php echo get_the_date('F');?></span>
                                    </h3>
                                </div>
                            </div>
                            <div class="news-content">
                                <ul>
                                    <li>
                                        <i class="fa-regular fa-user"></i>
                                        By <?php the_author(); ?>
                                    </li>

                                    <li>
                                        <i class="fa-solid fa-tag"></i>
                                        <?php
                                        $post_tags = get_the_tags();
                                        if ($post_tags) {
                                            $first_tag = reset($post_tags);
                                            echo '<a href="' . get_tag_link($first_tag->term_id) . '">' . $first_tag->name . '</a>';
                                        } else {
                                            echo "No tags found";
                                        }
                                        ?>
                                    </li>                            
                                </ul>
                                <h3>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <a href="<?php the_permalink(); ?>" class="theme-btn-2 mt-3">
                                    read More
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
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

Plugin::instance()->widgets_manager->register_widget_type(new Blog_Post());