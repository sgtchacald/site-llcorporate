<?php
/**
 * Elementor Widget
 * @package infotek
 * @since 1.0.0
 */

namespace Elementor;
class Project_Details_Paination extends Widget_Base
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
        return 'infotek-project-details-paination-widget';
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
        return esc_html__('Project Pagination', 'infotek-core');
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

//js code end

  });
</script>';


?>

<?php if (!$pagination) { ?>
        <div class="col-lg-12">
            <div class="blog-pagination text-<?php echo esc_attr($pagination_alignment) ?>">
                <div class="post-navigation-area">
                    <div class="post-navigation-inner">
                    <?php
                        $prevPost = get_previous_post();
                        $nextPost = get_next_post();
                        $output = '';
                        if (!empty(get_previous_post_link())) {
                            $output .= '<div class="content-area' . (empty(get_next_post_link()) ? ' no-line' : '') . '">';
                            $output .= '<div class="content">';
                            $output .= '<div class="post-thumbnail">' . get_the_post_thumbnail($prevPost->ID, 'thumbnail') . '</div>';
                            $output .= '<div> <h3 class="prev-post">' . esc_html__('Previous', 'infotek-core') . '</h3>';
                            $output .= get_previous_post_link('<h4 class="title">%link<span>.</span></h4></div>') . '</div></div>';
                        }
                        if (!empty(get_next_post_link())) {
                            $output .= '<div class="content-area style-01' . (empty(get_previous_post_link()) ? ' no-line' : '') . '">';
                            $output .= '<div class="content">';
                            $output .= '<div> <h3 class="next-post">' . esc_html__('Next', 'infotek-core') . '</h3>';
                            $output .= get_next_post_link('<h4 class="title">%link<span>.</span></h4> </div>') . '</div>';
                            $output .= '<div class="post-thumbnail">' . get_the_post_thumbnail($nextPost->ID, 'thumbnail') . '</div></div>';
                        }
                        echo $output;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Project_Details_Paination());