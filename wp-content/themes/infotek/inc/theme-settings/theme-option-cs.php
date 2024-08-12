<?php
/**
 * Theme Options
 * @package infotek
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); // exit if access directly
}
// Control core classes for avoid errors
if (class_exists('CSF')) {

    $allowed_html = infotek()->kses_allowed_html(array('mark'));
    $prefix = 'infotek';
    // Create options
    CSF::createOptions($prefix . '_theme_options', array(
        'menu_title' => esc_html__('Theme Options', 'infotek'),
        'menu_slug' => 'infotek_theme_options',
        'menu_parent' => 'infotek_theme_options',
        'menu_type' => 'submenu',
        'footer_credit' => ' ',
        'menu_icon' => 'fa fa-filter',
        'show_footer' => false,
        'enqueue_webfont' => false,
        'show_search' => true,
        'show_reset_all' => true,
        'show_reset_section' => true,
        'show_all_options' => false,
        'theme' => 'dark',
        'framework_title' => infotek()->get_theme_info('name')
    ));

    /*-------------------------------------------------------
        ** General  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('General', 'infotek'),
        'id' => 'general_options',
        'icon' => 'fas fa-cogs',
    ));
    /* Preloader */
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Preloader & SVG Enable', 'infotek'),
        'id' => 'theme_general_preloader_options',
        'icon' => 'fa fa-spinner',
        'parent' => 'general_options',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Preloader Options', 'infotek') . '</h3>'
            ),
            array(
                'id' => 'preloader_enable',
                'title' => esc_html__('Preloader', 'infotek'),
                'type' => 'switcher',
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to enable/disable preloader', 'infotek'), $allowed_html),
                'default' => true,
            ),
            array(
                'id' => 'preloader_bg_color',
                'title' => esc_html__('Preloader Background Color', 'infotek'),
                'type' => 'color',
                'default' => '',
                'desc' => wp_kses(__('you can set <mark>overlay color</mark> for preloader background image', 'infotek'), $allowed_html),
                'dependency' => array('preloader_enable', '==', 'true')
            ),
            array(
                'id'       => 'preloader_text',
                'type'     => 'code_editor',
                'title'    => 'Preloader HTML Editor',
                'settings' => array(
                  'theme'  => 'mdn-like',
                  'mode'   => 'htmlmixed',
                ),
                'default'  => '<div class="spinner"></div><div class="txt-loading"><span data-text-preloader="I" class="letters-loading">I</span><span data-text-preloader="N" class="letters-loading">N</span>
                <span data-text-preloader="F" class="letters-loading">F</span><span data-text-preloader="O" class="letters-loading">O</span><span data-text-preloader="T" class="letters-loading">
                T</span><span data-text-preloader="E" class="letters-loading">E</span><span data-text-preloader="K" class="letters-loading">K</span></div><p class="text-center">Loading</p>',
                'dependency' => array('preloader_enable', '==', 'true')
              ),              
              
            array(
                'id' => 'enable_svg_upload',
                'type' => 'switcher',
                'title' => esc_html__('Enable Svg Upload ?', 'infotek'),
                'desc' => esc_html__('If you want to enable or disable svg upload you can set ( YES / NO )', 'infotek'),
                'default' => true,
            ),
        )
    ));

    /*-------------------------------------------------------
           ** Typography  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'typography',
        'title' => esc_html__('Typography', 'infotek'),
        'icon' => 'fas fa-text-height',
        'parent' => 'general_options',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Body Font Options', 'infotek') . '</h3>',
            ),
            array(
                'type' => 'typography',
                'title' => esc_html__('Typography', 'infotek'),
                'id' => '_body_font',
                'default' => array(
                    'font-family' => 'Kumbh Sans',
                    'font-size' => '16',
                    'line-height' => '26',
                    'unit' => 'px',
                    'type' => 'google',
                ),
                'color' => false,
                'subset' => false,
                'text_align' => false,
                'text_transform' => false,
                'letter_spacing' => false,
                'line_height' => false,
                'desc' => wp_kses(__('you can set <mark>font</mark> for all html tags (if not use different heading font)', 'infotek'), $allowed_html),
            ),
            array(
                'id' => 'body_font_variant',
                'type' => 'select',
                'title' => esc_html__('Load Font Variant', 'infotek'),
                'multiple' => true,
                'chosen' => true,
                'options' => array(
                    '300' => esc_html__('Light 300', 'infotek'),
                    '400' => esc_html__('Regular 400', 'infotek'),
                    '500' => esc_html__('Medium 500', 'infotek'),
                    '600' => esc_html__('Semi Bold 600', 'infotek'),
                    '700' => esc_html__('Bold 700', 'infotek'),
                    '800' => esc_html__('Extra Bold 800', 'infotek'),
                ),
                'default' => array('400', '500', '600', '700')
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Heading Font Options', 'infotek') . '</h3>',
            ),
            array(
                'type' => 'switcher',
                'id' => 'heading_font_enable',
                'title' => esc_html__('Heading Font', 'infotek'),
                'desc' => wp_kses(__('you can set <mark>yes</mark> to select different heading font', 'infotek'), $allowed_html),
                'default' => true
            ),
            array(
                'type' => 'typography',
                'title' => esc_html__('Typography', 'infotek'),
                'id' => 'heading_font',
                'default' => array(
                    'font-family' => 'Kumbh Sans',
                    'type' => 'google',
                ),
                'color' => false,
                'subset' => false,
                'text_align' => false,
                'text_transform' => false,
                'letter_spacing' => false,
                'font_size' => false,
                'line_height' => false,
                'desc' => wp_kses(__('you can set <mark>font</mark> for  for heading tag .eg: h1,h2,h3,h4,h5,h6', 'infotek'), $allowed_html),
                'dependency' => array('heading_font_enable', '==', 'true')
            ),
            array(
                'id' => 'heading_font_variant',
                'type' => 'select',
                'title' => esc_html__('Load Font Variant', 'infotek'),
                'multiple' => true,
                'chosen' => true,
                'options' => array(
                    '300' => esc_html__('Light 300', 'infotek'),
                    '400' => esc_html__('Regular 400', 'infotek'),
                    '500' => esc_html__('Medium 500', 'infotek'),
                    '600' => esc_html__('Semi Bold 600', 'infotek'),
                    '700' => esc_html__('Bold 700', 'infotek'),
                    '800' => esc_html__('Extra Bold 800', 'infotek'),
                ),
                'default' => array('400', '500', '600', '700'),
                'dependency' => array('heading_font_enable', '==', 'true')
            ),
        )
    ));

    /*-------------------------------------------------------
           ** Back To Top  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Back To Top', 'infotek'),
        'id' => 'theme_general_back_top_options',
        'icon' => 'fa fa-arrow-up',
        'parent' => 'general_options',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Back Top Options', 'infotek') . '</h3>'
            ),
            array(
                'id' => 'back_top_enable',
                'title' => esc_html__('Back Top', 'infotek'),
                'type' => 'switcher',
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide back to top', 'infotek'), $allowed_html),
                'default' => true,
            ),
            array(
                'id' => 'back_top_icon',
                'title' => esc_html__('Back Top Icon', 'infotek'),
                'type' => 'icon',
                'default' => 'fa-solid fa-arrow-up-long',
                'desc' => wp_kses(__('you can set <mark>icon</mark> for back to top.', 'infotek'), $allowed_html),
                'dependency' => array('back_top_enable', '==', 'true')
            ),
        )
    ));

    /*-------------------------------------------------------
        ** Menu Sidebar  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Menu Sidebar', 'infotek'),
        'id' => 'theme_general_sidebar_options',
        'icon' => 'fas fa-bars',
        'parent' => 'general_options',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Menu Sidebar Option', 'infotek') . '</h3>'
            ),
            array(
                'id' => 'sidebar_logo',
                'type' => 'media',
                'title' => esc_html__('Sidebar Logo', 'infotek'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'infotek'), $allowed_html),
            ),
            array(
                'id' => 'sidebar_text',
                'type' => 'textarea',
                'title' => esc_html__('Sidebar Text', 'infotek'),
                'default' => esc_html__('We understand better that enim ad minim veniam, consectetur adipis cing elit, sed do', 'infotek'),
            ),
            array(
                'id' => 'sidebar_title',
                'type' => 'text',
                'title' => esc_html__('Sidebar Title', 'infotek'),
                'default' => esc_html__('Contact Info', 'infotek'),
            ),
            array(
                'id'        => 'sidebar_contact_info',
                'type'      => 'repeater',
                'title'     => 'Contact Info Repeater',
                'fields'    => array(
              
                  array(
                    'id'    => 'sidebar_contact_icon',
                    'type'  => 'icon',
                    'default' => 'fa-solid fa-phone-volume',
                    'title' => 'Info Icon',
                  ),              
                  array(
                    'id'    => 'sidebar_contact_text',
                    'type'  => 'text',
                    'title' => 'Info Text',
                  ),
                  array(
                    'id'    => 'sidebar_contact_text_url',
                    'type'  => 'text',
                    'title' => 'Info Url',
                  ),
              
                )
            ),
            array(
                'id' => 'sidebar_btn_enabled',
                'type' => 'switcher',
                'title' => esc_html__('Show Button', 'infotek'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> navbar button of header one', 'infotek'), $allowed_html),
            ),
            array(
                'id' => 'sidebar_btn_text',
                'type' => 'text',
                'title' => esc_html__('Button Text', 'infotek'),
                'default' => 'Get A Quote',
                'dependency' => array('sidebar_btn_enabled', '==', 'true')
            ),
            array(
                'id' => 'sidebar_btn_text_url',
                'type' => 'text',
                'title' => esc_html__('Button Url', 'infotek'),
                'default' => esc_html__('#', 'infotek'),
                'dependency' => array('sidebar_btn_enabled', '==', 'true')
            ),
            array(
                'id'        => 'sidebar_socials',
                'type'      => 'repeater',
                'title'     => 'Socials Info Repeater',
                'fields'    => array(
              
                  array(
                    'id'    => 'sidebar_socials_icon',
                    'type'  => 'icon',
                    'default' => 'fa fa-facebook',
                    'title' => 'Socials Info Icon',
                  ),  
                  array(
                    'id'    => 'sidebar_socials_icon_url',
                    'type'  => 'text',
                    'title' => 'Socials Info Url',
                  ),
              
                )
            ),
        )
    ));

    /*-------------------------------------------------------
           ** Theme Color  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Theme Colors', 'infotek'),
        'id' => 'theme_color',
        'icon' => 'fa fa-palette',
        'parent' => 'general_options',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Theme Color Option', 'infotek') . '</h3>'
            ),
            array(
                'id'      => 'theme_color_1',
                'type'    => 'color',
                'title'   => 'Primary Color',
                'default' => '#384bff'
              ),
              
        )
    ));

    /*----------------------------------
        Header & Footer Style
    -----------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Set Header & Footer Type', 'infotek'),
        'id' => 'header_footer_style_options',
        'icon' => 'eicon-banner',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => esc_html__('Global Header Style', 'infotek'),
            ),
            array(
                'id' => 'navbar_type',
                'title' => esc_html__('Navbar Type', 'infotek'),
                'type' => 'image_select',
                'options' => array(
                    '' => INFOTEK_THEME_SETTINGS_IMAGES . '/header/01.png',
                    'style-01' => INFOTEK_THEME_SETTINGS_IMAGES . '/header/02.png',
                    'style-02' => INFOTEK_THEME_SETTINGS_IMAGES . '/header/03.png',
                    'style-03' => INFOTEK_THEME_SETTINGS_IMAGES . '/header/04.png',
                ),
                'default' => '',
                'desc' => wp_kses(__('you can set <mark>navbar type</mark> it will show in every page except you select specific navbar type form page settings.', 'infotek'), $allowed_html),
            ),
            array(
                'type' => 'subheading',
                'content' => esc_html__('Global Footer Style', 'infotek'),
            ),
            array(
                'id' => 'footer_type',
                'title' => esc_html__('Footer Type', 'infotek'),
                'type' => 'image_select',
                'options' => array(
                    '' => INFOTEK_THEME_SETTINGS_IMAGES . '/footer/01.png',
                    'style-01' => INFOTEK_THEME_SETTINGS_IMAGES . '/footer/02.png',
                    'style-02' => INFOTEK_THEME_SETTINGS_IMAGES . '/footer/03.png',
                    'style-03' => INFOTEK_THEME_SETTINGS_IMAGES . '/footer/04.png',
                ),
                'default' => '',
                'desc' => wp_kses(__('you can set <mark>footer type</mark> it will show in every page except you select specific navbar type form page settings.', 'infotek'), $allowed_html),
            ),
        )
    ));

    /*-------------------------------------------------------
       ** Entire Site Header Options
   --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'headers_settings',
        'title' => esc_html__('Headers', 'infotek'),
        'icon' => 'fa fa-home'
    ));
    /* Header Style 01 */
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Header One', 'infotek'),
        'id' => 'theme_header_one_options',
        'icon' => 'fa fa-image',
        'parent' => 'headers_settings',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Logo Options | Header One', 'infotek') . '</h3>'
            ),
            array(
                'id' => 'header_one_logo',
                'type' => 'media',
                'title' => esc_html__('Logo', 'infotek'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'infotek'), $allowed_html),
            ),
            array(
                'id' => 'header_one_logo_two',
                'type' => 'media',
                'title' => esc_html__('Logo Two', 'infotek'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'infotek'), $allowed_html),
            ),
            array(
                'id' => 'header_one_right_btn_enabled',
                'type' => 'switcher',
                'title' => esc_html__('Show Right Button', 'infotek'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> navbar button of header one', 'infotek'), $allowed_html),
            ),
            array(
                'id' => 'header_one_right_btn_text',
                'type' => 'text',
                'title' => esc_html__('Right Button Text', 'infotek'),
                'default' => 'Get A Quote',
            ),
            array(
                'id' => 'header_one_right_btn_url',
                'type' => 'text',
                'title' => esc_html__('Right Button Url', 'infotek'),
                'default' => esc_html__('#', 'infotek'),
            ),
            array(
                'id' => 'header_one_search_enabled',
                'type' => 'switcher',
                'title' => esc_html__('Show Search Button', 'infotek'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> navbar search button of header one', 'infotek'), $allowed_html),
            ),
            array(
                'id'          => 'header_1_hamburger',
                'type'        => 'select',
                'title'       => 'Hamburger On/Off',
                'placeholder' => 'Select an option',
                'options'     => array(
                  'block'  => 'Show',
                  'none'  => 'Hide',
                ),
                'default'     => 'block'
              ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Top Bar Options', 'infotek') . '</h3>'
            ),
            array(
                'id' => 'header_one_top_bar_enabled',
                'type' => 'switcher',
                'title' => esc_html__('Show Header Top', 'infotek'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> top bar of header one', 'infotek'), $allowed_html),
            ),          
              
            array(
                'id'        => 'header_1_top_bar_contacts',
                'type'      => 'repeater',
                'title'     => 'Contact Info Repeater',
                'fields'    => array(
              
                  array(
                    'id'    => 'header_1_top_bar_icon',
                    'type'  => 'icon',
                    'default' => 'fa-solid fa-phone-volume',
                    'title' => 'Info Icon',
                  ),              
                  array(
                    'id'    => 'header_1_top_bar_info',
                    'type'  => 'text',
                    'title' => 'Info Text',
                  ),
                  array(
                    'id'    => 'header_1_top_bar_info_url',
                    'type'  => 'text',
                    'title' => 'Info Url',
                  ),
              
                )
            ),
            array(
                'id'        => 'header_1_top_bar_socials',
                'type'      => 'repeater',
                'title'     => 'Socials Info Repeater',
                'fields'    => array(
              
                  array(
                    'id'    => 'header_1_top_bar_socials_icon',
                    'type'  => 'icon',
                    'default' => 'fab fa-facebook',
                    'title' => 'Socials Info Icon',
                  ),  
                  array(
                    'id'    => 'header_1_top_bar_socials_icon_url',
                    'type'  => 'text',
                    'title' => 'Socials Info Url',
                  ),
              
                )
            ),
              
        )
    ));

    /* Header Style 02 */
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Header Two', 'infotek'),
        'id' => 'theme_header_two_options',
        'icon' => 'fa fa-image',
        'parent' => 'headers_settings',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Logo Options | Header Two', 'infotek') . '</h3>'
            ),
            array(
                'id' => 'header_two_logo',
                'type' => 'media',
                'title' => esc_html__('Logo', 'infotek'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'infotek'), $allowed_html),
            ),
            array(
                'id' => 'header_two_logo_two',
                'type' => 'media',
                'title' => esc_html__('Logo Two', 'infotek'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'infotek'), $allowed_html),
            ),
            array(
                'id' => 'header_two_right_btn_enabled',
                'type' => 'switcher',
                'title' => esc_html__('Show Right Button', 'infotek'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> navbar button of header one', 'infotek'), $allowed_html),
            ),
            array(
                'id' => 'header_two_right_btn_text',
                'type' => 'text',
                'title' => esc_html__('Right Button Text', 'infotek'),
                'default' => 'Get A Quote',
            ),
            array(
                'id' => 'header_two_right_btn_url',
                'type' => 'text',
                'title' => esc_html__('Right Button Url', 'infotek'),
                'default' => esc_html__('#', 'infotek'),
            ),
            array(
                'id' => 'header_two_search_enabled',
                'type' => 'switcher',
                'title' => esc_html__('Show Search Button', 'infotek'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> navbar search button of header one', 'infotek'), $allowed_html),
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Top Bar Options', 'infotek') . '</h3>'
            ),
            array(
                'id' => 'header_two_top_bar_enabled',
                'type' => 'switcher',
                'title' => esc_html__('Show Header Top', 'infotek'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> top bar of header one', 'infotek'), $allowed_html),
            ),
            array(
                'id'        => 'header_2_top_bar_contacts',
                'type'      => 'repeater',
                'title'     => 'Contact Info Repeater',
                'fields'    => array(
              
                  array(
                    'id'    => 'header_2_top_bar_icon',
                    'type'  => 'icon',
                    'default' => 'fas fa-phone-volume',
                    'title' => 'Info Icon',
                  ),              
                  array(
                    'id'    => 'header_2_top_bar_info',
                    'type'  => 'text',
                    'title' => 'Info Text',
                  ),
                  array(
                    'id'    => 'header_2_top_bar_info_url',
                    'type'  => 'text',
                    'title' => 'Info Url',
                  ),
              
                )
            ),
            array(
                'id'        => 'header_2_top_bar_socials',
                'type'      => 'repeater',
                'title'     => 'Socials Info Repeater',
                'fields'    => array(
              
                  array(
                    'id'    => 'header_2_top_bar_socials_icon',
                    'type'  => 'icon',
                    'default' => 'fa fa-facebook',
                    'title' => 'Socials Info Icon',
                  ),  
                  array(
                    'id'    => 'header_2_top_bar_socials_icon_url',
                    'type'  => 'text',
                    'title' => 'Socials Info Url',
                  ),
              
                )
            ),
              
        )
    ));

    /* Header Style 03 */
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Header Three', 'infotek'),
        'id' => 'theme_header_three_options',
        'icon' => 'fa fa-image',
        'parent' => 'headers_settings',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Logo Options | Header Three', 'infotek') . '</h3>'
            ),
            array(
                'id' => 'header_three_logo',
                'type' => 'media',
                'title' => esc_html__('Logo', 'infotek'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'infotek'), $allowed_html),
            ),
            array(
                'id' => 'header_three_left_shape',
                'type' => 'media',
                'title' => esc_html__('Shape Image', 'infotek'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> shape image</mark> here', 'infotek'), $allowed_html),
            ),
            array(
                'id' => 'header_three_right_btn_enabled',
                'type' => 'switcher',
                'title' => esc_html__('Show Right Button', 'infotek'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> navbar button of header one', 'infotek'), $allowed_html),
            ),
            array(
                'id' => 'header_three_right_btn_text',
                'type' => 'text',
                'title' => esc_html__('Right Button Text', 'infotek'),
                'default' => 'Get A Quote',
            ),
            array(
                'id' => 'header_three_right_btn_url',
                'type' => 'text',
                'title' => esc_html__('Right Button Url', 'infotek'),
                'default' => esc_html__('#', 'infotek'),
            ),
            array(
                'id' => 'header_three_search_enabled',
                'type' => 'switcher',
                'title' => esc_html__('Show Search Button', 'infotek'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> navbar search button of header one', 'infotek'), $allowed_html),
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Top Bar Options', 'infotek') . '</h3>'
            ),
            array(
                'id' => 'header_three_top_bar_enabled',
                'type' => 'switcher',
                'title' => esc_html__('Show Header Top', 'infotek'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> top bar of header one', 'infotek'), $allowed_html),
            ),
            array(
                'id' => 'show_language_option',
                'type' => 'switcher',
                'title' => esc_html__('Show Language Option', 'infotek'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> language option', 'infotek'), $allowed_html),
            ),
            array(
                'id'        => 'header_3_top_bar_contacts',
                'type'      => 'repeater',
                'title'     => 'Contact Info Repeater',
                'fields'    => array(
              
                  array(
                    'id'    => 'header_3_top_bar_icon',
                    'type'  => 'icon',
                    'default' => 'fas fa-phone-volume',
                    'title' => 'Info Icon',
                  ),              
                  array(
                    'id'    => 'header_3_top_bar_info',
                    'type'  => 'text',
                    'title' => 'Info Text',
                  ),
                  array(
                    'id'    => 'header_3_top_bar_info_url',
                    'type'  => 'text',
                    'title' => 'Info Url',
                  ),
              
                )
            ),
            array(
                'id'        => 'header_3_top_bar_socials',
                'type'      => 'repeater',
                'title'     => 'Socials Info Repeater',
                'fields'    => array(
              
                  array(
                    'id'    => 'header_3_top_bar_socials_icon',
                    'type'  => 'icon',
                    'default' => 'fa fa-facebook',
                    'title' => 'Socials Info Icon',
                  ),  
                  array(
                    'id'    => 'header_3_top_bar_socials_icon_url',
                    'type'  => 'text',
                    'title' => 'Socials Info Url',
                  ),
              
                )
            ),
              
        )
    ));


     /* Header Style 04 */
     CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Header Four', 'infotek'),
        'id' => 'theme_header_four_options',
        'icon' => 'fa fa-image',
        'parent' => 'headers_settings',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Logo Options | Header Three', 'infotek') . '</h3>'
            ),
            array(
                'id' => 'header_four_logo',
                'type' => 'media',
                'title' => esc_html__('Logo', 'infotek'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'infotek'), $allowed_html),
            ),
            array(
                'id' => 'header_four_right_btn_enabled',
                'type' => 'switcher',
                'title' => esc_html__('Show Right Button', 'infotek'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> navbar button of header one', 'infotek'), $allowed_html),
            ),
            array(
                'id' => 'header_four_right_btn_text',
                'type' => 'text',
                'title' => esc_html__('Right Button Text', 'infotek'),
                'default' => 'Get A Quote',
            ),
            array(
                'id' => 'header_four_right_btn_url',
                'type' => 'text',
                'title' => esc_html__('Right Button Url', 'infotek'),
                'default' => esc_html__('#', 'infotek'),
            ),
            array(
                'id' => 'header_four_search_enabled',
                'type' => 'switcher',
                'title' => esc_html__('Show Search Button', 'infotek'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> navbar search button of header one', 'infotek'), $allowed_html),
            ),
              
        )
    ));

    /* Breadcrumb */
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Breadcrumb', 'infotek'),
        'id' => 'breadcrumb_options',
        'icon' => ' eicon-product-breadcrumbs',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Breadcrumb Options', 'infotek') . '</h3>'
            ),
            array(
                'id' => 'breadcrumb_enabled',
                'title' => esc_html__('Breadcrumb', 'infotek'),
                'type' => 'switcher',
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide breadcrumb', 'infotek'), $allowed_html),
                'default' => true,
            ),
            array(
                'id' => 'breadcrumb_main_image',
                'type' => 'media',
                'title' => esc_html__('Background Image', 'infotek'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark>background image</mark> here.', 'infotek'), $allowed_html),
                'dependency' => array('breadcrumb_enabled', '==', 'true')
            ),
            array(
                'id' => 'breadcrumb_shape_image',
                'type' => 'media',
                'title' => esc_html__('Shape Image', 'infotek'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark>shape image</mark> here.', 'infotek'), $allowed_html),
                'dependency' => array('breadcrumb_enabled', '==', 'true')
            ),
            array(
                'id' => 'breadcrumb_shape_image_2',
                'type' => 'media',
                'title' => esc_html__('Shape Image 2', 'infotek'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark>shape image</mark> here.', 'infotek'), $allowed_html),
                'dependency' => array('breadcrumb_enabled', '==', 'true')
            ),
        )
    ));


    /*-------------------------------------------------------
           ** Footer  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Footer', 'infotek'),
        'id' => 'footer_options',
        'icon' => ' eicon-footer',
    ));
    CSF::createSection($prefix . '_theme_options', array(
        'parent' => 'footer_options',
        'id' => 'footer_general_options',
        'title' => esc_html__('Footer One', 'infotek'),
        'icon' => 'fa fa-list-ul',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Settings One', 'infotek') . '</h3>'
            ),
            array(
                'id' => 'footer_one_logo',
                'type' => 'media',
                'title' => esc_html__('Logo', 'infotek'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'infotek'), $allowed_html),
            ),
            array(
                'id' => 'footer_one_shape_1',
                'type' => 'media',
                'title' => esc_html__('Footer One Shape Image One', 'infotek'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> shape image</mark> here', 'infotek'), $allowed_html),
            ),
            array(
                'id' => 'footer_one_shape_2',
                'type' => 'media',
                'title' => esc_html__('Footer One Shape Image Two', 'infotek'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> shape image</mark> here', 'infotek'), $allowed_html),
            ),
            array(
                'id' => 'footer_one_text',
                'type' => 'textarea',
                'title' => esc_html__('Paragraph Text Here', 'infotek'),
                'default' => esc_html__('Phasellus ultricies aliquam volutpat ullamcorper laoreet neque, a lacinia curabitur lacinia mollis', 'infotek')
            ),
            array(
                'id'        => 'footer_1_socials',
                'type'      => 'repeater',
                'title'     => 'Socials Info Repeater',
                'fields'    => array(
              
                  array(
                    'id'    => 'footer_1_socials_icon',
                    'type'  => 'icon',
                    'default' => 'fa fa-facebook-f',
                    'title' => 'Socials Info Icon',
                  ),  
                  array(
                    'id'    => 'footer_1_socials_icon_url',
                    'type'  => 'text',
                    'title' => 'Socials Info Url',
                  ),
              
                )
            ),
            array(
                'id' => 'footer_one_blog_title',
                'type' => 'text',
                'title' => esc_html__('Footer Blog Heading' , 'infotek'),
                'default' => esc_html__('Recent Posts', 'infotek')
            ),
            array(
                'id' => 'footer_one_contact_title',
                'type' => 'text',
                'title' => esc_html__('Contact Heading', 'infotek'),
                'default' => esc_html__('Contact Us', 'infotek')
            ),
            array(
                'id'        => 'footer_1_contact_us',
                'type'      => 'repeater',
                'title'     => 'Contact Us Repeater',
                'fields'    => array(
              
                  array(
                    'id'    => 'footer_1_contact_icon',
                    'type'  => 'icon',
                    'default' => 'fab fa-facebook',
                    'title' => 'Contact Info Icon',
                  ),  
                  array(
                    'id'    => 'footer_1_contact_text',
                    'type'  => 'text',
                    'title' => 'Contact Info Text',
                  ),
                  array(
                    'id'    => 'footer_1_contact_url',
                    'type'  => 'text',
                    'title' => 'Contact Info Url',
                  ),
              
                )
            ),
            array(
                'id' => 'footer_one_contact_button',
                'type' => 'text',
                'title' => esc_html__('Footer Button Text','infotek'),
                'default' => esc_html__('get A Quote', 'infotek')
            ),  
            array(
                'id' => 'footer_one_contact_button_url',
                'type' => 'text',
                'title' => esc_html__('Footer Button URL', 'infotek'),
                'default' => esc_html__('#', 'infotek')
            ),           
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Copyright Area Options', 'infotek') . '</h3>'
            ),          
           
            array(
                'id' => 'copyright_text',
                'title' => esc_html__('Copyright Area Text', 'infotek'),
                'type' => 'textarea',
                'desc' => wp_kses(__('use  <mark>{copy}</mark> for copyright symbol, use <mark>{year}</mark> for current year, ', 'infotek'), $allowed_html)
            ),
            array(
                'id'        => 'footer_1_terms',
                'type'      => 'repeater',
                'title'     => 'Footer Terms & Condition Repeater',
                'fields'    => array(
                  array(
                    'id'    => 'footer_1_terms_text',
                    'type'  => 'text',
                    'title' => 'Terms Text',
                  ),
                  array(
                    'id'    => 'footer_1_terms_url',
                    'type'  => 'text',
                    'title' => 'Terms Url',
                  ),
              
                )
            ),
            
          
        )
    ));

    /*-------------------------------------------------------
           ** Footer Style Two
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'parent' => 'footer_options',
        'id' => 'footer_two_options',
        'title' => esc_html__('Footer Two', 'infotek'),
        'icon' => 'fa fa-list-ul',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Settings Two', 'infotek') . '</h3>'
            ),
            array(
                'id'        => 'footer_2_contact_us',
                'type'      => 'repeater',
                'title'     => 'Contact Us Repeater',
                'fields'    => array(              
                  array(
                    'id'    => 'footer_2_contact_shape',
                    'type'  => 'media',
                    'title' => 'Contact Info Shape',
                    'library' => 'image',
                  ),
                  array(
                    'id'    => 'footer_2_contact_icon',
                    'type'  => 'media',
                    'title' => 'Contact Info Icon Image',
                    'library' => 'image',
                  ),
                  array(
                    'id'    => 'footer_2_contact_title',
                    'type'  => 'text',
                    'title' => 'Contact Info Title',
                  ),
                  array(
                    'id'    => 'footer_2_contact_text',
                    'type'  => 'text',
                    'title' => 'Contact Info Text',
                  ),
                  array(
                    'id'    => 'footer_2_contact_url',
                    'type'  => 'text',
                    'title' => 'Contact Info Url',
                  ),
              
                )
            ), 
            array(
                'id' => 'footer_two_logo',
                'type' => 'media',
                'title' => esc_html__('Logo', 'infotek'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'infotek'), $allowed_html),
            ),
            array(
                'id' => 'footer_two_shape_1',
                'type' => 'media',
                'title' => esc_html__('Footer Two Shape Image One', 'infotek'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> shape image</mark> here', 'infotek'), $allowed_html),
            ),
            array(
                'id' => 'footer_two_text',
                'type' => 'textarea',
                'title' => esc_html__('Paragraph Text Here', 'infotek'),
                'default' => esc_html__('Phasellus ultricies aliquam volutpat ullamcorper laoreet neque, a lacinia curabitur lacinia mollis', 'infotek')
            ),
            array(
                'id'        => 'footer_2_socials',
                'type'      => 'repeater',
                'title'     => 'Socials Info Repeater',
                'fields'    => array(
              
                  array(
                    'id'    => 'footer_2_socials_icon',
                    'type'  => 'icon',
                    'default' => 'fa fa-facebook-f',
                    'title' => 'Socials Info Icon',
                  ),  
                  array(
                    'id'    => 'footer_2_socials_icon_url',
                    'type'  => 'text',
                    'title' => 'Socials Info Url',
                  ),
              
                )
            ),
            array(
                'id' => 'footer_two_blog_title',
                'type' => 'text',
                'title' => esc_html__('Footer Blog Heading', 'infotek'),
                'default' => esc_html__('Recent Posts', 'infotek')
            ),                     
          
        )
    ));


      /*-------------------------------------------------------
           ** Footer Style Three
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'parent' => 'footer_options',
        'id' => 'footer_three_options',
        'title' => esc_html__('Footer Three', 'infotek'),
        'icon' => 'fa fa-list-ul',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Settings Three', 'infotek') . '</h3>'
            ),
            array(
                'id' => 'footer_three_logo',
                'type' => 'media',
                'title' => esc_html__('Logo', 'infotek'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'infotek'), $allowed_html),
            ),
            array(
                'id' => 'footer_three_shape_1',
                'type' => 'media',
                'title' => esc_html__('Footer Two Shape Image One', 'infotek'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> shape image</mark> here', 'infotek'), $allowed_html),
            ),
            array(
                'id' => 'footer_three_shape_2',
                'type' => 'media',
                'title' => esc_html__('Footer Two Shape Image One', 'infotek'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> shape image</mark> here', 'infotek'), $allowed_html),
            ),
            array(
                'id' => 'footer_three_about_title',
                'type' => 'text',
                'title' => esc_html__('About Title', 'infotek'),
                'default' => esc_html__('About Us', 'infotek')
            ),
            array(
                'id' => 'footer_three_about_text',
                'type' => 'textarea',
                'title' => esc_html__('About Text', 'infotek'),
                'default' => esc_html__('Phasellus ultricies aliquam volutpat ullamcorper laoreet neque, a lacinia curabitur lacinia mollis', 'infotek')
            ),
            array(
                'id'        => 'footer_3_socials',
                'type'      => 'repeater',
                'title'     => 'Socials Info Repeater',
                'fields'    => array(
              
                  array(
                    'id'    => 'footer_3_socials_icon',
                    'type'  => 'icon',
                    'default' => 'fa fa-facebook-f',
                    'title' => 'Socials Info Icon',
                  ),  
                  array(
                    'id'    => 'footer_3_socials_icon_url',
                    'type'  => 'text',
                    'title' => 'Socials Info Url',
                  ),
              
                )
            ),
            array(
                'id' => 'footer_three_newsletter',
                'type' => 'text',
                'title' => esc_html__('Newsletter Title', 'infotek'),
                'default' => esc_html__('Newsletter', 'infotek')
            ),                     
            array(
                'id' => 'footer_three_newsletter_text',
                'type' => 'text',
                'title' => esc_html__('Newsletter Text', 'infotek'),
                'default' => esc_html__('Sign up to seargin weekly newsletter to get the latest updates.', 'infotek')
            ),  
            array(
                'id' => 'footer_three_form',
                'type' => 'text',
                'title' => esc_html__('Newsletter Form Shortcode', 'infotek'),
                'desc' => wp_kses(__('Use <mark> MC4WP/Mailchimp</mark> shorcode here', 'infotek'), $allowed_html),
            ),                   
          
        )
    ));


    /*-------------------------------------------------------
           ** Footer Style Four
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'parent' => 'footer_options',
        'id' => 'footer_four_options',
        'title' => esc_html__('Footer Four', 'infotek'),
        'icon' => 'fa fa-list-ul',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Settings Four', 'infotek') . '</h3>'
            ),
            array(
                'id' => 'footer_four_shape_1',
                'type' => 'media',
                'title' => esc_html__('Footer Shape Image One', 'infotek'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> shape image</mark> here', 'infotek'), $allowed_html),
            ),
            array(
                'id' => 'footer_four_shape_2',
                'type' => 'media',
                'title' => esc_html__('Footer Shape Image One', 'infotek'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> shape image</mark> here', 'infotek'), $allowed_html),
            ),
            array(
                'id' => 'footer_four_clients',
                'type' => 'media',
                'title' => esc_html__('Footer Clients Image', 'infotek'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> shape image</mark> here', 'infotek'), $allowed_html),
            ),
            array(
                'id' => 'footer_four_clients_text',
                'type' => 'text',
                'title' => esc_html__('Footer Clients Title', 'infotek'),
                'default' => esc_html__('15k+ Active Customer', 'infotek')
            ),
            array(
                'id' => 'footer_four_btn_text',
                'type' => 'text',
                'title' => esc_html__('Top Button Title', 'infotek'),
                'default' => esc_html__('Get A Quote', 'infotek')
            ),
            array(
                'id' => 'footer_four_btn_url',
                'type' => 'text',
                'title' => esc_html__('Top Button Url', 'infotek'),
                'default' => esc_html__('#', 'infotek')
            ),
            array(
                'id' => 'footer_four_logo',
                'type' => 'media',
                'title' => esc_html__('Logo', 'infotek'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'infotek'), $allowed_html),
            ),
            array(
                'id' => 'footer_four_about_text',
                'type' => 'textarea',
                'title' => esc_html__('About Text', 'infotek'),
                'default' => esc_html__('Phasellus ultricies aliquam volutpat ullamcorper laoreet neque, a lacinia curabitur lacinia mollis', 'infotek')
            ),
            array(
                'id'        => 'footer_4_socials',
                'type'      => 'repeater',
                'title'     => 'Socials Info Repeater',
                'fields'    => array(
              
                  array(
                    'id'    => 'footer_4_socials_icon',
                    'type'  => 'icon',
                    'default' => 'fa fa-facebook-f',
                    'title' => 'Socials Info Icon',
                  ),  
                  array(
                    'id'    => 'footer_4_socials_icon_url',
                    'type'  => 'text',
                    'title' => 'Socials Info Url',
                  ),
              
                )
            ),
            array(
                'id' => 'footer_four_contact_location',
                'type' => 'text',
                'title' => esc_html__('Footer Location', 'infotek'),
                'default' => esc_html__('4517 Washington. mg Manchester, Kentucky 39495', 'infotek')
            ),
            array(
                'id'        => 'footer_4_contact_us',
                'type'      => 'repeater',
                'title'     => 'Contact Us Repeater',
                'fields'    => array(
              
                  array(
                    'id'    => 'footer_4_contact_icon',
                    'type'  => 'icon',
                    'default' => 'fa fa-facebook-f',
                    'title' => 'Socials Info Icon',
                  ),  
                  array(
                    'id'    => 'footer_4_contact_title',
                    'type'  => 'text',
                    'title' => 'Title',
                  ),
                  array(
                    'id'    => 'footer_4_contact_text',
                    'type'  => 'text',
                    'title' => 'Text',
                  ),
              
                )
            ), 
            array(
                'id' => 'footer_four_download',
                'type' => 'text',
                'title' => esc_html__('Download Title', 'infotek'),
                'default' => esc_html__('Download App' , 'infotek')
            ),               
            array(
                'id' => 'footer_four_download_text',
                'type' => 'text',
                'title' => esc_html__('Download Text', 'infotek'),
                'default' => esc_html__('Suscipit ipsum id justo malesuada fermentum. Donec ut sem varius, congue ligula vel', 'infotek')
            ),  
            array(
                'id' => 'footer_four_download_img_1',
                'type' => 'media',
                'title' => esc_html__('Download Image One', 'infotek'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> shape image</mark> here', 'infotek'), $allowed_html),
            ),  
            array(
                'id' => 'footer_four_download_img_1_url',
                'type' => 'text',
                'title' => esc_html__('App Url', 'infotek'),
                'default' => esc_html__('#' , 'infotek')
            ),            
            array(
                'id' => 'footer_four_download_img_2',
                'type' => 'media',
                'title' => esc_html__('Download Image Two', 'infotek'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> shape image</mark> here', 'infotek'), $allowed_html),
            ),   
            array(
                'id' => 'footer_four_download_img_2_url',
                'type' => 'text',
                'title' => esc_html__('App Url', 'infotek'),
                'default' => esc_html__('#' , 'infotek')
            ),          
                       
          
        )
    ));

    /*-------------------------------------------------------
          ** Blog  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'blog_settings',
        'title' => esc_html__('Blog Settings', 'infotek'),
        'icon' => 'fa fa-book'
    ));
    CSF::createSection($prefix . '_theme_options', array(
        'parent' => 'blog_settings',
        'id' => 'blog_post_options',
        'title' => esc_html__('Blog Post', 'infotek'),
        'icon' => 'fa fa-list-ul',
        'fields' => Infotek_Group_Fields::post_meta('blog_post', esc_html__('Blog Page', 'infotek'))
    ));
    CSF::createSection($prefix . '_theme_options', array(
        'parent' => 'blog_settings',
        'id' => 'blog_single_post_options',
        'title' => esc_html__('Single Post', 'infotek'),
        'icon' => 'fa fa-list-alt',
        'fields' => Infotek_Group_Fields::post_meta('blog_single_post', esc_html__('Blog Single Page', 'infotek'))
    )); 

    /*-------------------------------------------------------
          ** Pages & templates Options
   --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'pages_and_template',
        'title' => esc_html__('Pages Settings', 'infotek'),
        'icon' => 'fa fa-files-o'
    ));
    /*  404 page options */
    CSF::createSection($prefix . '_theme_options', array(
        'id' => '404_page',
        'title' => esc_html__('404 Page', 'infotek'),
        'parent' => 'pages_and_template',
        'icon' => 'fa fa-exclamation-triangle',
        'fields' => array(
            array(
                'id' => 'error_bg_switch',
                'title' => esc_html__('404 Image Enable', 'infotek'),
                'type' => 'switcher',
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide breadcrumb', 'infotek'), $allowed_html),
                'default' => true,
            ),
            array(
                'id' => 'error_bg',
                'title' => esc_html__('404 Image', 'infotek'),
                'type' => 'media',
                'desc' => wp_kses(__('you can set <mark>background</mark> for breadcrumb', 'infotek'), $allowed_html),
                'dependency' => array('error_bg_switch', '==', 'true')
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('404 Page Options', 'infotek') . '</h3>',
            ),
            array(
                'id' => '404_bg_color',
                'type' => 'color',
                'title' => esc_html__('Page Background Color', 'infotek'),
                'default' => ''
            ),
            array(
                'id' => '404_title',
                'title' => esc_html__('Title', 'infotek'),
                'type' => 'text',
                'info' => wp_kses(__('you can change <mark>title</mark> of 404 page', 'infotek'), $allowed_html),
                'attributes' => array('placeholder' => esc_html__('Sorry! The Page Not Found', 'infotek'))
            ),
            array(
                'id' => '404_paragraph',
                'title' => esc_html__('Paragraph', 'infotek'),
                'type' => 'textarea',
                'info' => wp_kses(__('you can change <mark>paragraph</mark> of 404 page', 'infotek'), $allowed_html),
                'attributes' => array('placeholder' => esc_html__('Oops! The page you are looking for does not exit. it might been moved or deleted.', 'infotek'))
            ),
            array(
                'id' => '404_button_text',
                'title' => esc_html__('Button Text', 'infotek'),
                'type' => 'text',
                'info' => wp_kses(__('you can change <mark>button text</mark> of 404 page', 'infotek'), $allowed_html),
                'attributes' => array('placeholder' => esc_html__('back to home', 'infotek'))
            ),
            array(
                'id' => '404_spacing_top',
                'title' => esc_html__('Page Spacing Top', 'infotek'),
                'type' => 'slider',
                'desc' => wp_kses(__('you can set <mark>Padding Top</mark> for page content area.', 'infotek'), $allowed_html),
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'unit' => 'px',
                'default' => 120,
            ),
            array(
                'id' => '404_spacing_bottom',
                'title' => esc_html__('Page Spacing Bottom', 'infotek'),
                'type' => 'slider',
                'desc' => wp_kses(__('you can set <mark>Padding Bottom</mark> for page content area.', 'infotek'), $allowed_html),
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'unit' => 'px',
                'default' => 120,
            ),
        )
    ));

    /*  blog page options */
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'blog_page',
        'title' => esc_html__('Blog Page', 'infotek'),
        'parent' => 'pages_and_template',
        'icon' => 'fa fa-indent',
        'fields' => Infotek_Group_Fields::page_layout_options(esc_html__('Blog', 'infotek'), 'blog')
    ));
    /*  blog single page options */
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'blog_single_page',
        'title' => esc_html__('Blog Single Page', 'infotek'),
        'parent' => 'pages_and_template',
        'icon' => 'fa fa-indent',
        'fields' => Infotek_Group_Fields::page_layout_options(esc_html__('Blog Single', 'infotek'), 'blog_single')
    ));
    /*  archive page options */
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'archive_page',
        'title' => esc_html__('Archive Page', 'infotek'),
        'parent' => 'pages_and_template',
        'icon' => 'fa fa-archive',
        'fields' => Infotek_Group_Fields::page_layout_options(esc_html__('Archive', 'infotek'), 'archive')
    ));
    /*  search page options */
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'search_page',
        'title' => esc_html__('Search Page', 'infotek'),
        'parent' => 'pages_and_template',
        'icon' => 'fa fa-search',
        'fields' => Infotek_Group_Fields::page_layout_options(esc_html__('Search', 'infotek'), 'search')
    ));

    /*-------------------------------------------------------
           ** Backup  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'backup',
        'title' => esc_html__('Import / Export', 'infotek'),
        'icon' => 'eicon-export-kit',
        'fields' => array(
            array(
                'type' => 'notice',
                'style' => 'warning',
                'content' => esc_html__('You can save your current options. Download a Backup and Import.', 'infotek'),
            ),
            array(
                'type' => 'backup',
                'title' => esc_html__('Backup & Import', 'infotek')
            )
        )
    ));
}
