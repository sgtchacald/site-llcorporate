<?php
/**
 * Theme Social Share Widget
 * @package Infotek
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}
// Control core classes for avoid errors
if (class_exists('CSF')) {


    // Create a About Widget
    CSF::createWidget('infotek_social_share_widget', array(
        'title' => esc_html__('Infotek: Social Share', 'infotek-core'),
        'classname' => 'infotek-social-share-about',
        'description' => esc_html__('Display Social Share widget', 'infotek-core'),
        'fields' => array(
            array(
                'id' => 'heading',
                'type' => 'text',
                'title' => esc_html__('Enter Your Header Title', 'infotek-core'),
                'default' => esc_html__('Never Miss News', 'infotek-core')
            ),
            array(
                'id' => 'infotek-social-icon-repeater',
                'type' => 'repeater',
                'title' => esc_html__('Social Icon', 'infotek-core'),
                'fields' => array(
                    array(
                        'id' => 'infotek-social-icon',
                        'type' => 'icon',
                        'title' => esc_html__('Icon', 'infotek-core'),
                        'default' => 'fab fa-facebook'
                    ),
                    array(
                        'id' => 'infotek-social-text',
                        'type' => 'text',
                        'title' => esc_html__('Enter Your Ulr', 'infotek-core'),
                        'default' => '#'
                    ),
                ),
            ),
        )
    ));


    if (!function_exists('infotek_social_share_widget')) {
        function infotek_social_share_widget($args, $instance)
        {

            echo $args['before_widget'];
            

            $heading_title = $instance['heading'] ?? '';
            $socialIcon = is_array($instance['infotek-social-icon-repeater']) && !empty($instance['infotek-social-icon-repeater']) ? $instance['infotek-social-icon-repeater'] : [];


            ?>
            <div class="social-share-widget">
                <h4 class="widget-headline"><?php echo esc_html($heading_title); ?></h4>
                <ul class="social-icon style-03">
                    <?php
                    foreach ($socialIcon as $icon) {
                        printf('<li><a href="%2$s"><i class="%1$s"></i></a></li>', esc_html($icon['infotek-social-icon']), esc_url($icon['infotek-social-text']));
                    };
                    ?>
                </ul>
            </div>

            <?php

            echo $args['after_widget'];

        }
    }

}

?>