<?php
/**
 * Theme Metabox Options
 * @package infotek
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); // exit if access directly
}

if (class_exists('CSF')) {

    $allowed_html = infotek()->kses_allowed_html(array('mark'));

    $prefix = 'infotek';

    /*-------------------------------------
        Post Format Options
    -------------------------------------*/
    CSF::createMetabox($prefix . '_post_video_options', array(
        'title' => esc_html__('Video Post Format Options', 'infotek'),
        'post_type' => 'post',
        'post_formats' => 'video'
    ));
    CSF::createSection($prefix . '_post_video_options', array(
        'fields' => array(
            array(
                'id' => 'video_url',
                'type' => 'text',
                'title' => esc_html__('Enter Video URL', 'infotek'),
                'desc' => wp_kses(__('enter <mark>video url</mark> to show in frontend', 'infotek'), $allowed_html)
            )
        )
    ));
    CSF::createMetabox($prefix . '_post_gallery_options', array(
        'title' => esc_html__('Gallery Post Format Options', 'infotek'),
        'post_type' => 'post',
        'post_formats' => 'gallery'
    ));
    CSF::createSection($prefix . '_post_gallery_options', array(
        'fields' => array(
            array(
                'id' => 'gallery_images',
                'type' => 'gallery',
                'title' => esc_html__('Select Gallery Photos', 'infotek'),
                'desc' => wp_kses(__('select <mark>gallery photos</mark> to show in frontend', 'infotek'), $allowed_html)
            )
        )
    ));

    /*-------------------------------------
      Page Container Options
    -------------------------------------*/
    CSF::createMetabox($prefix . '_page_container_options', array(
        'title' => esc_html__('Page Options', 'infotek'),
        'post_type' => array('page'),
    ));
    CSF::createSection($prefix . '_page_container_options', array(
        'title' => esc_html__('Layout & Colors', 'infotek'),
        'icon' => 'fa fa-columns',
        'fields' => Infotek_Group_Fields::page_layout()
    ));
    CSF::createSection($prefix . '_page_container_options', array(
        'title' => esc_html__('Header Footer & Breadcrumb', 'infotek'),
        'icon' => 'fa fa-header',
        'fields' => Infotek_Group_Fields::Page_Container_Options('header_options')
    ));
    CSF::createSection($prefix . '_page_container_options', array(
        'title' => esc_html__('Width & Padding', 'infotek'),
        'icon' => 'fa fa-file-o',
        'fields' => Infotek_Group_Fields::Page_Container_Options('container_options')
    ));
    //	Service Meta Box
    CSF::createMetabox($prefix . '_service_options', array(
        'title' => esc_html__('Service Options', 'infotek'),
        'post_type' => 'service',
    ));
    CSF::createSection($prefix . '_service_options', array(
        'fields' => array(
            array(
                'id' => 'service_icon',
                'type' => 'media',
                'title' => esc_html__('Icon', 'infotek'),
                'desc' => wp_kses(__('Select Your Icon', 'infotek'), $allowed_html)
            ),
            array(
                'id' => 'service_icon_shape',
                'type' => 'media',
                'title' => esc_html__('Icon Shape', 'infotek'),
                'desc' => wp_kses(__('Select Your Icon Shape', 'infotek'), $allowed_html)
            ),
            array(
                'id' => 'service_icon_shape_2',
                'type' => 'media',
                'title' => esc_html__('Icon Shape 2', 'infotek'),
                'desc' => wp_kses(__('Select Your Icon Shape 2', 'infotek'), $allowed_html)
            ),
            array(
                'id' => 'service_line_shape',
                'type' => 'media',
                'title' => esc_html__('Line Shape', 'infotek'),
                'desc' => wp_kses(__('Select Your Shape', 'infotek'), $allowed_html)
            ),
            array(
                'id' => 'service_content',
                'type' => 'textarea',
                'title' => esc_html__('service content', 'infotek'),
                'desc' => wp_kses(__('Select Your service content', 'infotek'), $allowed_html)
            )
        )
    ));

    /*-------------------------------------
     Team Options
    -------------------------------------*/
    CSF::createMetabox($prefix . '_team_options', array(
        'title' => esc_html__('Team Options', 'infotek'),
        'post_type' => array('team'),
        'priority' => 'high'
    ));
    CSF::createSection($prefix . '_team_options', array(
        'title' => esc_html__('Team Info', 'infotek'),
        'id' => 'infotek-info',
        'fields' => array(
            array(
                'id' => 'designation',
                'type' => 'text',
                'title' => esc_html__('Designation', 'infotek'),
            ),
            array(
                'id' => 'team_content',
                'type' => 'textarea',
                'title' => esc_html__('Team content', 'infotek'),
                'desc' => wp_kses(__('Write Your content', 'infotek'), $allowed_html)
            )
        )
    ));
    CSF::createSection($prefix . '_team_options', array(
        'title' => esc_html__('Social Info', 'infotek'),
        'id' => 'social-info',
        'fields' => array(
            array(
                'id' => 'social-icons',
                'type' => 'repeater',
                'title' => esc_html__('Social Info', 'infotek'),
                'fields' => array(
                    array(
                        'id' => 'icon',
                        'type' => 'icon',
                        'title' => esc_html__('Icon', 'infotek'),
                        'default' => 'fa fa-facebook-f'

                    ),
                    array(
                        'id' => 'url',
                        'type' => 'text',
                        'title' => esc_html__('URL', 'infotek')
                    ),

                ),
            ),
        )
    ));

    //	Project Meta Box
    CSF::createMetabox($prefix . '_project_options', array(
        'title' => esc_html__('Project Options', 'infotek'),
        'post_type' => 'project',
    ));

    CSF::createSection($prefix . '_project_options', array(
        'fields' => array(
            array(
                'id' => 'project_content',
                'type' => 'textarea',
                'title' => esc_html__('Project content', 'infotek'),
                'desc' => wp_kses(__('Write your Project content', 'infotek'), $allowed_html)
            )
        )
    ));

    //	Product Meta Box
    CSF::createMetabox($prefix . '_product_options', array(
        'title' => esc_html__('Product Options', 'infotek'),
        'post_type' => 'product',
    ));
    CSF::createSection($prefix . '_product_options', array(
        'fields' => array(
            array(
                'id' => 'product_audio_img',
                'type' => 'media',
                'title' => esc_html__('Product audio image', 'infotek'),
            ),
            array(
                'id' => 'product_audio_list',
                'type' => 'text',
                'title' => esc_html__('Product audio url', 'infotek'),
                'default' => esc_html__('http://physical-authority.surge.sh/music/2.mp3', 'infotek'),
            ),
            array(
                'id' => 'product_subtitle',
                'type' => 'text',
                'title' => esc_html__('Product Subtitle', 'infotek'),
                'default' => esc_html__('Ray studio', 'infotek'),
            ),
            array(
                'id' => 'download_text',
                'type' => 'text',
                'title' => esc_html__('download text', 'infotek'),
                'default' => esc_html__('Download: 2.4K', 'infotek'),
            ),
        )
    ));

    //	Courses Meta Box
    CSF::createMetabox($prefix . '_courses_options', array(
        'title' => esc_html__('Courses Options', 'infotek'),
        'post_type' => 'courses',
    ));

    CSF::createSection($prefix . '_courses_options', array(
        'title' => esc_html__('Social Info', 'infotek'),
        'id' => 'social-info',
        'fields' => array(
            array(
                'id' => 'course_start_date_option',
                'type' => 'text',
                'title' => esc_html__('Start From', 'infotek'),
                'default' => esc_html__('Thursday, Nov 4, 2023', 'infotek'),
            ),
            array(
                'id' => 'study-option',
                'type' => 'repeater',
                'title' => esc_html__('Study Options', 'infotek'),
                'fields' => array(

                    array(
                        'id' => 'qualification',
                        'type' => 'text',
                        'title' => esc_html__('Qualification', 'infotek'),
                        'default' => esc_html__('Bachelor of Aviation (Hons)', 'infotek'),
                    ),
                    array(
                        'id' => 'length',
                        'type' => 'text',
                        'title' => esc_html__('Length', 'infotek'),
                        'default' => esc_html__('9 months full time', 'infotek'),
                    ),
                    array(
                        'id' => 'code',
                        'type' => 'text',
                        'title' => esc_html__('Code', 'infotek'),
                        'default' => esc_html__('ba1x', 'infotek'),
                    ),
                ),
            ),
            array(
                'id' => 'course_module_option',
                'type' => 'text',
                'title' => esc_html__('Course Module Title', 'infotek'),
                'default' => esc_html__('Download full course Module', 'infotek'),
            ),
            array(
                'id' => 'course_module_button_title',
                'type' => 'text',
                'title' => esc_html__('Course Module Button Title', 'infotek'),
                'default' => esc_html__('Download', 'infotek'),
            ),
            array(
                'id' => 'course_module_button_url',
                'type' => 'text',
                'title' => esc_html__('Course Module Button URL', 'infotek'),
                'default' => esc_html__('#', 'infotek'),
            ),
        )
    ));
}//endif