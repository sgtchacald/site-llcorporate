<?php
/**
 * Theme Request Form Widget
 * @package Infotek
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}
// Control core classes for avoid errors
if (class_exists('CSF')) {


    // Create a About Widget
    CSF::createWidget('infotek_request_form_widget', array(
        'title' => esc_html__('Infotek: Request Form', 'infotek-core'),
        'classname' => 'infotek-request-form-widget',
        'description' => esc_html__('Display Request Form widget', 'infotek-core'),
        'fields' => array(
            array(
                'id' => 'background-image',
                'type' => 'media',
                'title' => esc_html__('Upload Your Photo', 'infotek-core'),
            ),
            array(
                'id' => 'heading',
                'type' => 'text',
                'title' => esc_html__('Enter Your Header Title', 'infotek-core'),
                'default' => esc_html__('Never Miss News', 'infotek-core')
            ),
            array(
                'id' => 'infotek_contact_form_id',
                'type' => 'select',
                'title' => esc_html__('Contact Form', 'infotek-core'),
                'options' => infotek_core()->get_contact_form_shortcode_list_el(),
            ),
        )
    ));


    if (!function_exists('infotek_request_form_widget')) {
        function infotek_request_form_widget($args, $instance)
        {

            echo $args['before_widget'];

            $instance['background-image'];
            $bg_image = $instance['background-image'];
            $img_id = $bg_image['id'] ?? '';
            $img_print = $img_id ? wp_get_attachment_image_src($img_id)[0] : '';
            $heading_title = $instance['heading'] ?? '';
            $shortcode = $instance['infotek_contact_form_id'];

            ?>
            <div class="request-form-widget" style="background-image: url(<?php echo esc_url($img_print)?>)">
                <h4 class="widget-headline"><?php echo esc_html($heading_title); ?></h4>
                <div class="request-form">
                    <?php
                    echo do_shortcode('[contact-form-7  id="' . $shortcode . '"]');
                    ?>
                </div>
            </div>
            <?php

            echo $args['after_widget'];

        }
    }

}

?>