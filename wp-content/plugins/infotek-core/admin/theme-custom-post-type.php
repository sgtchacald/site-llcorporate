<?php
/**
 * Theme Custom Post Type(CPTs)
 * @package Infotek
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}

if (!class_exists('Infotek_Custom_Post_Type')) {
    class Infotek_Custom_Post_Type
    {

        //$instance variable
        private static $instance;

        public function __construct()
        {
            //register post type
            add_action('init', array($this, 'register_custom_post_type'));
        }

        /**
         * get Instance
         * @since  2.0.0
         */
        public static function getInstance()
        {
            if (null == self::$instance) {
                self::$instance = new self();
            }

            return self::$instance;
        }

        /**
         * Register Custom Post Type
         * @since  2.0.0
         */
        public function register_custom_post_type()
        {
            if (!defined('ELEMENTOR_VERSION')) {
                return;
            }
            $all_post_type = array(
                [
                    'post_type' => 'service',
                    'args' => array(
                        'label' => esc_html__('Service', 'infotek-core'),
                        'description' => esc_html__('Service', 'infotek-core'),
                        'labels' => array(
                            'name' => esc_html_x('Service', 'Post Type General Name', 'infotek-core'),
                            'singular_name' => esc_html_x('Service', 'Post Type Singular Name', 'infotek-core'),
                            'menu_name' => esc_html__('Service', 'infotek-core'),
                            'all_items' => esc_html__('Service', 'infotek-core'),
                            'view_item' => esc_html__('View Service', 'infotek-core'),
                            'add_new_item' => esc_html__('Add New Service', 'infotek-core'),
                            'add_new' => esc_html__('Add New Service', 'infotek-core'),
                            'edit_item' => esc_html__('Edit Service', 'infotek-core'),
                            'update_item' => esc_html__('Update Service', 'infotek-core'),
                            'search_items' => esc_html__('Search Service', 'infotek-core'),
                            'not_found' => esc_html__('Not Found', 'infotek-core'),
                            'not_found_in_trash' => esc_html__('Not found in Trash', 'infotek-core'),
                            'featured_image' => esc_html__('Service Image', 'infotek-core'),
                            'remove_featured_image' => esc_html__('Remove Service Image', 'infotek-core'),
                            'set_featured_image' => esc_html__('Set Service Image', 'infotek-core'),
                        ),
                        'supports' => array('title', 'thumbnail', 'excerpt', 'editor', 'comments'),
                        'hierarchical' => false,
                        'public' => true,
                        "publicly_queryable" => true,
                        'show_ui' => true,
                        'show_in_menu' => 'infotek_theme_options',
                        "rewrite" => array('slug' => 'all-service', 'with_front' => true),
                        'can_export' => true,
                        'capability_type' => 'post',
                        "show_in_rest" => true,
                        'query_var' => true
                    )
                ],
                [
                    'post_type' => 'project',
                    'args' => array(
                        'label' => esc_html__('Project', 'infotek-core'),
                        'description' => esc_html__('Project', 'infotek-core'),
                        'labels' => array(
                            'name' => esc_html_x('Project', 'Post Type General Name', 'infotek-core'),
                            'singular_name' => esc_html_x('Project', 'Post Type Singular Name', 'infotek-core'),
                            'menu_name' => esc_html__('Project', 'infotek-core'),
                            'all_items' => esc_html__('Project', 'infotek-core'),
                            'view_item' => esc_html__('View Project', 'infotek-core'),
                            'add_new_item' => esc_html__('Add New Project', 'infotek-core'),
                            'add_new' => esc_html__('Add New Project', 'infotek-core'),
                            'edit_item' => esc_html__('Edit Project', 'infotek-core'),
                            'update_item' => esc_html__('Update Project', 'infotek-core'),
                            'search_items' => esc_html__('Search Project', 'infotek-core'),
                            'not_found' => esc_html__('Not Found', 'infotek-core'),
                            'not_found_in_trash' => esc_html__('Not found in Trash', 'infotek-core'),
                            'featured_image' => esc_html__('Project Image', 'infotek-core'),
                            'remove_featured_image' => esc_html__('Remove Project Image', 'infotek-core'),
                            'set_featured_image' => esc_html__('Set Project Image', 'infotek-core'),
                        ),
                        'supports' => array('title', 'thumbnail', 'excerpt', 'editor', 'comments'),
                        'hierarchical' => false,
                        'public' => true,
                        "publicly_queryable" => true,
                        'show_ui' => true,
                        'show_in_menu' => 'infotek_theme_options',
                        "rewrite" => array('slug' => 'all-project', 'with_front' => true),
                        'can_export' => true,
                        'capability_type' => 'post',
                        "show_in_rest" => true,
                        'query_var' => true
                    )
                ],
                [
                    'post_type' => 'team',
                    'args' => array(
                        'label' => esc_html__('team', 'infotek-core'),
                        'description' => esc_html__('team', 'infotek-core'),
                        'labels' => array(
                            'name' => esc_html_x('Team', 'Post Type General Name', 'infotek-core'),
                            'singular_name' => esc_html_x('Team', 'Post Type Singular Name', 'infotek-core'),
                            'menu_name' => esc_html__('Teams', 'infotek-core'),
                            'all_items' => esc_html__('Teams', 'infotek-core'),
                            'view_item' => esc_html__('View Teams', 'infotek-core'),
                            'add_new_item' => esc_html__('Add New Team Member', 'infotek-core'),
                            'add_new' => esc_html__('Add New Team Member', 'infotek-core'),
                            'edit_item' => esc_html__('Edit Team', 'infotek-core'),
                            'update_item' => esc_html__('Update Team', 'infotek-core'),
                            'search_items' => esc_html__('Search Team', 'infotek-core'),
                            'not_found' => esc_html__('Not Found', 'infotek-core'),
                            'not_found_in_trash' => esc_html__('Not found in Trash', 'infotek-core'),
                            'featured_image' => esc_html__('Team Image', 'infotek-core'),
                            'remove_featured_image' => esc_html__('Remove Team Image', 'infotek-core'),
                            'set_featured_image' => esc_html__('Set Team Image', 'infotek-core'),
                        ),
                        'supports' => array('title', 'thumbnail', 'excerpt', 'editor', 'comments'),
                        'hierarchical' => false,
                        'public' => true,
                        "publicly_queryable" => true,
                        'show_ui' => true,
                        'show_in_menu' => 'infotek_theme_options',
                        "rewrite" => array('slug' => 'all-team', 'with_front' => true),
                        'can_export' => true,
                        'capability_type' => 'post',
                        "show_in_rest" => true,
                        'query_var' => true
                    )
                ]
            );

            if (!empty($all_post_type) && is_array($all_post_type)) {

                foreach ($all_post_type as $post_type) {
                    call_user_func_array('register_post_type', $post_type);
                }
            }


            /**
             * Custom Taxonomy Register
             * @since 1.0.0
             */

            $all_custom_taxonmy = array(
                array(
                    'taxonomy' => 'service-cat',
                    'object_type' => 'service',
                    'args' => array(
                        "labels" => array(
                            "name" => esc_html__("Service Category", 'infotek-core'),
                            "singular_name" => esc_html__("Service Category", 'infotek-core'),
                            "menu_name" => esc_html__("Service Category", 'infotek-core'),
                            "all_items" => esc_html__("All Service Category", 'infotek-core'),
                            "add_new_item" => esc_html__("Add New Service Category", 'infotek-core')
                        ),
                        "public" => true,
                        "hierarchical" => true,
                        "show_ui" => true,
                        "show_in_menu" => true,
                        "show_in_nav_menus" => true,
                        "query_var" => true,
                        "rewrite" => array('slug' => 'service-cat', 'with_front' => true),
                        "show_admin_column" => true,
                        "show_in_rest" => true,
                        "show_in_quick_edit" => true,
                    )
                ),
                array(
                    'taxonomy' => 'project-cat',
                    'object_type' => 'project',
                    'args' => array(
                        "labels" => array(
                            "name" => esc_html__("Project Category", 'infotek-core'),
                            "singular_name" => esc_html__("Project Category", 'infotek-core'),
                            "menu_name" => esc_html__("Project Category", 'infotek-core'),
                            "all_items" => esc_html__("All Project Category", 'infotek-core'),
                            "add_new_item" => esc_html__("Add New Project Category", 'infotek-core')
                        ),
                        "public" => true,
                        "hierarchical" => true,
                        "show_ui" => true,
                        "show_in_menu" => true,
                        "show_in_nav_menus" => true,
                        "query_var" => true,
                        "rewrite" => array('slug' => 'project-cat', 'with_front' => true),
                        "show_admin_column" => true,
                        "show_in_rest" => true,
                        "show_in_quick_edit" => true,
                    )
                ),
                array(
                    'taxonomy' => 'team-cat',
                    'object_type' => 'team',
                    'args' => array(
                        "labels" => array(
                            "name" => esc_html__("Team Category", 'infotek-core'),
                            "singular_name" => esc_html__("Team Category", 'infotek-core'),
                            "menu_name" => esc_html__("Team Category", 'infotek-core'),
                            "all_items" => esc_html__("All Team Category", 'infotek-core'),
                            "add_new_item" => esc_html__("Add New Team Category", 'infotek-core')
                        ),
                        "public" => true,
                        "hierarchical" => true,
                        "show_ui" => true,
                        "show_in_menu" => true,
                        "show_in_nav_menus" => true,
                        "query_var" => true,
                        "rewrite" => array('slug' => 'team-cat', 'with_front' => true),
                        "show_admin_column" => true,
                        "show_in_rest" => true,
                        "show_in_quick_edit" => true,
                    )
                )
            );

            if (is_array($all_custom_taxonmy) && !empty($all_custom_taxonmy)) {
                foreach ($all_custom_taxonmy as $taxonomy) {
                    call_user_func_array('register_taxonomy', $taxonomy);
                }
            }


            /**
             * Custom Tags Register
             * @since 1.0.0
             */

            $all_custom_tags = array(
                array(
                    'taxonomy' => 'service-tag',
                    'object_type' => 'service',
                    'args' => array(
                        "labels" => array(
                            "name" => esc_html__("Service Tag", 'infotek-core'),
                            "singular_name" => esc_html__("Service Tag", 'infotek-core'),
                            "menu_name" => esc_html__("Service Tag", 'infotek-core'),
                            "all_items" => esc_html__("All Service Tag", 'infotek-core'),
                            "add_new_item" => esc_html__("Add New Service Tag", 'infotek-core')
                        ),
                        "public" => true,
                        "show_ui" => true,
                        "show_in_menu" => true,
                        "show_in_nav_menus" => true,
                        "query_var" => true,
                        "rewrite" => array('slug' => 'service-tag'),
                        "show_admin_column" => true,
                        "show_in_rest" => true,
                        "show_in_quick_edit" => true,
                        'hierarchical' => false,
                        'update_count_callback' => '_update_post_term_count',
                    )
                ),
                array(
                    'taxonomy' => 'project-tag',
                    'object_type' => 'project',
                    'args' => array(
                        "labels" => array(
                            "name" => esc_html__("Project Tag", 'infotek-core'),
                            "singular_name" => esc_html__("Project Tag", 'infotek-core'),
                            "menu_name" => esc_html__("Project Tag", 'infotek-core'),
                            "all_items" => esc_html__("All Project Tag", 'infotek-core'),
                            "add_new_item" => esc_html__("Add New Project Tag", 'infotek-core')
                        ),
                        "public" => true,
                        "show_ui" => true,
                        "show_in_menu" => true,
                        "show_in_nav_menus" => true,
                        "query_var" => true,
                        "rewrite" => array('slug' => 'project-tag'),
                        "show_admin_column" => true,
                        "show_in_rest" => true,
                        "show_in_quick_edit" => true,
                        'hierarchical' => false,
                        'update_count_callback' => '_update_post_term_count',
                    )
                ),
                array(
                    'taxonomy' => 'team-tag',
                    'object_type' => 'team',
                    'args' => array(
                        "labels" => array(
                            "name" => esc_html__("Team Tag", 'infotek-core'),
                            "singular_name" => esc_html__("Team Tag", 'infotek-core'),
                            "menu_name" => esc_html__("Team Tag", 'infotek-core'),
                            "all_items" => esc_html__("All Team Tag", 'infotek-core'),
                            "add_new_item" => esc_html__("Add New Team Tag", 'infotek-core')
                        ),
                        "public" => true,
                        "show_ui" => true,
                        "show_in_menu" => true,
                        "show_in_nav_menus" => true,
                        "query_var" => true,
                        "rewrite" => array('slug' => 'team-tag'),
                        "show_admin_column" => true,
                        "show_in_rest" => true,
                        "show_in_quick_edit" => true,
                        'hierarchical' => false,
                        'update_count_callback' => '_update_post_term_count',
                    )
                ),
            );

            if (is_array($all_custom_tags) && !empty($all_custom_tags)) {
                foreach ($all_custom_tags as $tags) {
                    call_user_func_array('register_taxonomy', $tags);
                }
            }


            flush_rewrite_rules();
        }

    }//end class

    if (class_exists('Infotek_Custom_Post_Type')) {
        Infotek_Custom_Post_Type::getInstance();
    }
}