<?php
/**
 * Theme About Us Widget
 * @package Infotek
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}
// Control core classes for avoid errors
if (class_exists('CSF')) {


    // Create a About Widget
    CSF::createWidget('infotek_about_widget', array(
        'title' => esc_html__('Infotek: About Us', 'infotek-core'),
        'classname' => 'infotek-widget-about',
        'description' => esc_html__('Display about us widget', 'infotek-core'),
        'fields' => array(
            array(
                'id' => 'logo-area',
                'type' => 'media',
                'title' => esc_html__('Upload Your Photo', 'infotek-core'),
            ),
            array(
                'id' => 'description',
                'type' => 'textarea',
                'title' => esc_html__('Description', 'Infotek-core'),
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.', 'infotek-core')
            ),
            array(
                'id' => 'shortcode',
                'type' => 'textarea',
                'title' => esc_html__('Shortcode', 'Infotek-core'),
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


    if (!function_exists('infotek_about_widget')) {
        function infotek_about_widget($args, $instance)
        {

            echo $args['before_widget'];

            $logo = $instance['logo-area'];
            $img_id = $logo['id'] ?? '';
            $img_print = $img_id ? wp_get_attachment_image_src($img_id,'full')[0] : '';
            $alt_text = get_post_meta($img_id, '_wp_attachment_image_alt', true);
            $paragraph = $instance['description'] ?? '';
            $shortcode = $instance['shortcode'] ?? '';
            $socialIcon = is_array($instance['infotek-footer-social-icon-repeater']) && !empty($instance['infotek-footer-social-icon-repeater']) ? $instance['infotek-footer-social-icon-repeater'] : [];


            ?>
            <div class="footer-widget widget">
                <div class="about_us_widget style-01">
                    <a href="<?php echo get_home_url(); ?>" class="footer-logo"><?php
                        if (!empty($img_print)) {
                            printf('<img src="%1$s" alt="%2$s"/>', esc_url($img_print), esc_attr($alt_text));
                        }
                    ?>  
                    </a>
                    <?php echo $paragraph; ?>
                    <?php echo do_shortcode($shortcode); ?>
                    <?php if (!empty($socialIcon)) { ?>
                        <ul class="contact_info_list">
                            <?php
                            foreach ($socialIcon as $icon) {
                                echo '<li class="single-info-item">
                                <div class="icon"><a href="'.$icon['infotek-footer-social-text'].'">
                                    <i class="' . $icon['infotek-footer-social-icon'] . '"></i></a>
                                </div>
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