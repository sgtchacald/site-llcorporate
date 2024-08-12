<?php
/**
 * Header Style 4
 * @package infotek
 * @since 1.0.0
 */
?>

<?php 
    $header_four_search_enabled = cs_get_option('header_four_search_enabled');          
    $header_four_right_btn_text = cs_get_option('header_four_right_btn_text');
    $header_four_right_btn_url = cs_get_option('header_four_right_btn_url'); 
    $header_four_right_btn_enabled = cs_get_option('header_four_right_btn_enabled');   
    
    $header_three_top_bar_enabled = cs_get_option('header_three_top_bar_enabled');
    $header_3_top_bar_contacts = cs_get_option('header_3_top_bar_contacts');
    $header_3_top_bar_socials = cs_get_option('header_3_top_bar_socials');

    $header_three_left_shape = cs_get_option('header_three_left_shape');
    $show_language_option = cs_get_option('show_language_option');
?> 


<header>
    <div id="header-sticky" class="header-4">
        <div class="container">
            <div class="mega-menu-wrapper">
                <div class="header-main">
                    <div class="header-left">
                        <div class="logo">
                        <?php
                            $header_four_logo = cs_get_option('header_four_logo');
                            if (has_custom_logo() && empty($header_four_logo['id'])) {
                                the_custom_logo();
                            } elseif (!empty($header_four_logo['id'])) {
                                printf('<a class="d-inline-block site-logo" href="%1$s"><img src="%2$s" alt="%3$s"/></a>', esc_url(get_home_url()), $header_four_logo['url'], $header_four_logo['alt']);
                            } else {
                                printf('<a class="d-inline-block site-title" href="%1$s">%2$s</a>', esc_url(get_home_url()), esc_html(get_bloginfo('title')));
                            }
                        ?>
                        </div>
                    </div>
                    <div class="header-right d-flex justify-content-end align-items-center">
                        <div class="mean__menu-wrapper">
                            <div class="main-menu">
                            <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'main-menu',
                                    'menu_class' => '',
                                    'container' => 'div',
                                    'container_class' => '',
                                    'container_id' => 'infotek_main_menu',
                                    'fallback_cb' => 'infotek_theme_fallback_menu',
                                ));
                                ?>
                            </div>
                        </div>

                        <?php 
                        if( $header_four_search_enabled ): ?>
                            <a href="#0" class="search-trigger search-icon"><i class="fal fa-search"></i></a>
                        <?php 
                        endif; ?> 

                        <div class="header-button">
                        <?php 
                        if( $header_four_right_btn_enabled ): ?>
                            <a href="<?php echo esc_url($header_four_right_btn_url); ?>" class="theme-btn">
                                <span>
                                    <?php echo esc_html($header_four_right_btn_text); ?>
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </span>
                            </a>
                            <?php 
                        endif; ?> 
                        </div>

                        <div class="header__hamburger d-lg-none my-auto">
                            <div class="sidebar__toggle">
                                <i class="fas fa-bars"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
