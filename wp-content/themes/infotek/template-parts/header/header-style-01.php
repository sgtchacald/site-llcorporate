<?php
/**
 * Header Style 2
 * @package infotek
 * @since 1.0.0
 */
?>

<?php 
    $header_two_search_enabled = cs_get_option('header_two_search_enabled');          
    $header_two_right_btn_text = cs_get_option('header_two_right_btn_text');
    $header_two_right_btn_url = cs_get_option('header_two_right_btn_url'); 
    $header_two_right_btn_enabled = cs_get_option('header_two_right_btn_enabled');   
    
    $header_two_top_bar_enabled = cs_get_option('header_two_top_bar_enabled');
    $header_2_top_bar_contacts = cs_get_option('header_2_top_bar_contacts');
    $header_2_top_bar_socials = cs_get_option('header_2_top_bar_socials');
?> 

<header class="header-section-2">
    <?php 
    if( $header_two_top_bar_enabled ): ?>
    <div class="header-top-section top-style-2 fix">
        <div class="container-fluid">
            <div class="header-top-wrapper style-2">
                <?php                    
                    if ( $header_2_top_bar_contacts ) {
                        echo '<ul class="contact-list">';
                        foreach ( $header_2_top_bar_contacts as $item ) {
                            echo '<li>';
                            if ( isset( $item['header_2_top_bar_icon'] ) ) {
                                echo '<i class="' . esc_attr( $item['header_2_top_bar_icon'] ) . '"></i>';
                            }
                            if ( isset( $item['header_2_top_bar_info'] ) ) {
                                echo '<a href="'. esc_url( $item['header_2_top_bar_info_url'] ) .'" class="link">' . esc_html( $item['header_2_top_bar_info'] ) . '</a>';
                            }
                            echo '</li>';
                        }
                        echo '</ul>';
                    }          
                ?>
                <div class="top-right">
                    <div class="social-icon d-flex align-items-center">
                        <span>Follow Us:</span>
                        <?php                           
                            if ( $header_2_top_bar_socials ) {
                                foreach ( $header_2_top_bar_socials as $item ) {
                                    if ( isset( $item['header_2_top_bar_socials_icon'] ) && isset( $item['header_2_top_bar_socials_icon_url'] ) ) {
                                        echo '<a href="' . esc_url( $item['header_2_top_bar_socials_icon_url'] ) . '">';
                                        echo '<i class="' . esc_attr( $item['header_2_top_bar_socials_icon'] ) . '"></i>';
                                        echo '</a>';
                                    }
                                }                            
                            }                    
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    endif; ?>  

    <div id="header-sticky" class="header-2">
        <div class="main-logo">
            <?php
            $header_two_logo = cs_get_option('header_two_logo');
            if (has_custom_logo() && empty($header_two_logo['id'])) {
                the_custom_logo();
            } elseif (!empty($header_two_logo['id'])) {
                printf('<a class="d-inline-block site-logo" href="%1$s"><img src="%2$s" alt="%3$s"/></a>', esc_url(get_home_url()), $header_two_logo['url'], $header_two_logo['alt']);
            } else {
                printf('<a class="d-inline-block site-title" href="%1$s">%2$s</a>', esc_url(get_home_url()), esc_html(get_bloginfo('title')));
            }
            ?>
        </div>
        <div class="container-fluid">
            <div class="mega-menu-wrapper">
                <div class="header-main">
                    <div class="logo d-none">
                    <?php
                    $header_two_logo_two = cs_get_option('header_two_logo_two');
                    if (has_custom_logo() && empty($header_two_logo_two['id'])) {
                        the_custom_logo();
                    } elseif (!empty($header_two_logo_two['id'])) {
                        printf('<a class="d-inline-block site-logo" href="%1$s"><img src="%2$s" alt="%3$s"/></a>', esc_url(get_home_url()), $header_two_logo_two['url'], $header_two_logo_two['alt']);
                    } else {
                        printf('<a class="d-inline-block site-title" href="%1$s">%2$s</a>', esc_url(get_home_url()), esc_html(get_bloginfo('title')));
                    }
                    ?>
                    </div>
                    <div class="header-left">
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
                    </div>
                    <div class="header-right d-flex justify-content-end align-items-center">
                        <?php 
                        if( $header_two_search_enabled ): ?>
                            <a href="#0" class="search-trigger search-icon"><i class="fal fa-search"></i></a>
                        <?php 
                        endif; ?>  
                        <div class="header-button">
                        <?php 
                        if( $header_two_right_btn_enabled ): ?>
                            <a href="<?php echo esc_url($header_two_right_btn_url); ?>" class="theme-btn">
                                <span>
                                    <?php echo esc_html($header_two_right_btn_text); ?>
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </span>
                            </a>
                        </div>
                        <?php 
                        endif; ?> 
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
