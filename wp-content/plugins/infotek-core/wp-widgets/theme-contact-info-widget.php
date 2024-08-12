<?php
/**
 * Theme Contact Info Widget
 * @package Infotek
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}
// Control core classes for avoid errors
if (class_exists('CSF')) {


    // Create a Contact Info Widget
    CSF::createWidget('infotek_contact_info_widget', array(
        'title' => esc_html__('Infotek: Contact Info', 'infotek-core'),
        'classname' => 'infotek-widget-contact-info',
        'description' => esc_html__('Display Contact Info widget', 'infotek-core'),
        'fields' => array(
            array(
                'id' => 'title',
                'type' => 'text',
                'title' => esc_html__('Title', 'infotek-core'),
            ),
            array(
                'id' => 'location',
                'type' => 'textarea',
                'title' => esc_html__('Location', 'Infotek-core'),
                'default' => esc_html__('4517 Washington Ave. Manchester, Kentucky 39495', 'infotek-core'),
            ),
            array(
                'id' => 'phone',
                'type' => 'text',
                'title' => esc_html__('Phone', 'Infotek-core'),
                'default' => esc_html__(' (+888) 123 456 765', 'infotek-core'),
            ),
            array(
                'id' => 'email',
                'type' => 'text',
                'title' => esc_html__('Email', 'Infotek-core'),
                'default' => esc_html__(' infoname@mail.com', 'infotek-core'),
            ),

            array(
                'id' => 'infotek-footer-social-icon-repeater',
                'type' => 'repeater',
                'title' => esc_html__('Social Icon', 'infotek-core'),
                'fields' => array(

                    array(
                        'id' => 'infotek-footer-social-icon',
                        'type' => 'icon',
                        'title' => esc_html__('Icon', 'infotek-core'),
                        'default' => 'flaticon-call'
                    ),
                    array(
                        'id' => 'infotek-footer-social-text',
                        'type' => 'text',
                        'title' => esc_html__('Enter Your Url', 'infotek-core'),
                        'default' => esc_html__('#', 'infotek-core')
                    ),

                ),
            ),
        )
    ));


    if (!function_exists('infotek_contact_info_widget')) {
        function infotek_contact_info_widget($args, $instance)
        {

            echo $args['before_widget'];
            $title = $instance['title'] ?? '';
            $location = $instance['location'] ?? '';
            $phone = $instance['phone'] ?? '';
            $email = $instance['email'] ?? '';
            $csocialIcon = is_array($instance['infotek-footer-social-icon-repeater']) && !empty($instance['infotek-footer-social-icon-repeater']) ? $instance['infotek-footer-social-icon-repeater'] : [];
            ?>

            <div class="footer-widget widget">
            	<h4 class="widget-headline"><?php echo esc_html($title); ?></h4>
            	<div class="widget_contact">
                    <ul class="details">
                        <li><i class="fa fa-map-marker-alt"></i><?php echo esc_html($location); ?></li>
                        <li class="mt-3"><i class="fa fa-phone-alt"></i> <?php echo esc_html($phone); ?></li>
                        <li class="mt-2"><i class="fas fa-envelope"></i> <?php echo esc_html($email); ?></li>
                    </ul>
                    <?php if (!empty($csocialIcon)) { ?>
                        <ul class="social-media mt-4">
                            <?php
                            foreach ($csocialIcon as $cicon) {
                                echo '<li>
	                                <a href="'.$cicon['infotek-footer-social-text'].'">
	                                    <i class="'. $cicon['infotek-footer-social-icon'] . '"></i></a>
	                            </li>';
                            };
                            ?>
                        </ul>
                    <?php } ?>
                </div>
            </div>

            <?php

            echo $args['after_widget'];

        }
    }

}

?>