<?php
/**
 * Theme File Download Widget
 * @package Infotek
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}
// Control core classes for avoid errors
if (class_exists('CSF')) {


    // Create a About Widget
    CSF::createWidget('infotek_file_download_widget', array(
        'title' => esc_html__('Infotek: File Download', 'infotek-core'),
        'classname' => 'infotek-widget-file-download',
        'description' => esc_html__('Display File Download widget', 'infotek-core'),
        'fields' => array(
            array(
                'id' => 'title',
                'type' => 'text',
                'title' => esc_html__('Title', 'Infotek-core'),
                'default' => esc_html__('Download', 'infotek-core')
            ),

            array(
                'id' => 'infotek-file-download-repeater',
                'type' => 'repeater',
                'title' => esc_html__('File Download', 'infotek-core'),
                'fields' => array(
                    array(
                        'id' => 'infotek-file-download',
                        'type' => 'media',
                        'title' => esc_html__('File', 'infotek-core'),
                    ),
                    array(
                        'id' => 'infotek-file-download-text',
                        'type' => 'text',
                        'title' => esc_html__('File Text', 'infotek-core'),
                        'default' => esc_html__('Company Profile', 'infotek-core')
                    ),

                ),
            ),
        )
    ));


    if (!function_exists('infotek_file_download_widget')) {
        function infotek_file_download_widget($args, $instance)
        {

            echo $args['before_widget'];

            $title = $instance['title'] ?? '';
            $file_download = is_array($instance['infotek-file-download-repeater']) && !empty($instance['infotek-file-download-repeater']) ? $instance['infotek-file-download-repeater'] : [];


            ?>
            <div class="widget_download">
                <h5 class="widget-headline style-01"><?php echo esc_html($title); ?></h5>               
                <ul>
                    <?php
                        foreach ($file_download as $file) {
                            echo '<li class="mb-0 mt-0">
                                <a download href="'.$file['infotek-file-download']['url'].'">
                                    ' . $file['infotek-file-download-text'] . '
                                    <i class="fa fa-angle-double-right"></i>
                                </a>
                            </li>';
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