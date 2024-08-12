<?php
/**
 * Theme About Me Widget
 * @package Infotek
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}
// Control core classes for avoid errors
if (class_exists('CSF')) {


    // Create a About Widget
    CSF::createWidget('infotek_about_me_widget', array(
        'title' => esc_html__('Infotek: About Me', 'infotek-core'),
        'classname' => 'infotek-widget-about',
        'description' => esc_html__('Display about me widget', 'infotek-core'),
        'fields' => array(
            array(
                'id' => 'heading',
                'type' => 'text',
                'title' => esc_html__('Enter Your Header Title', 'infotek-core'),
                'default' => esc_html__('About Me', 'infotek-core')
            ),
            array(
                'id' => 'trainer-area',
                'type' => 'media',
                'title' => esc_html__('Upload Your Trainer Photo', 'infotek-core'),
            ),
            array(
                'id' => 'trainer_name',
                'type' => 'text',
                'title' => esc_html__('Enter Your Trainer Name', 'infotek-core'),
                'default' => esc_html__('RANDALL SCHWARTZ', 'infotek-core')
            ),
            array(
                'id' => 'description',
                'type' => 'textarea',
                'title' => esc_html__('Description', 'Infotek-core'),
                'default' => esc_html__('Suspendisse vel nisl sed viverra tindunt. Vivamus et lobortis felis...', 'infotek-core')
            ),
        )
    ));


    if (!function_exists('infotek_about_me_widget')) {
        function infotek_about_me_widget($args, $instance)
        {

            echo $args['before_widget'];
            $instance['trainer-area'];
            $trainer_image = $instance['trainer-area'];
            $img_id = $trainer_image['id'] ?? '';
            $img_print = $img_id ? wp_get_attachment_image_src($img_id,'full')[0] : '';
            $alt_text = get_post_meta($img_id, '_wp_attachment_image_alt', true);
            // Social media content
            $heading_title = $instance['heading'] ?? '';
            $trainer_name = $instance['trainer_name'] ?? '';
            $paragraph = $instance['description'] ?? '';


            ?>
            <h4 class="widget-headline"><?php echo esc_html($heading_title); ?></h4>
            <div class="profile-item">
                <div class="profile-thumb">
                    <?php
                    if (!empty($img_print)) {
                        printf('<img src="%1$s" alt="%2$s"/>', esc_url($img_print), esc_attr($alt_text));
                    }
                    ?>
                </div>
                <div class="profile-content">
                    <h4 class="title"><?php echo esc_html($trainer_name); ?></h4>
                    <p> <?php echo $paragraph; ?></p>
                    <div class="profile-btn">
                        <a href="master-details.html" class="btn--base">View Profile <i
                                    class="fas fa-arrow-right ml-2"></i></a>
                    </div>
                </div>
            </div>
            <?php
            echo $args['after_widget'];

        }
    }

}

?>