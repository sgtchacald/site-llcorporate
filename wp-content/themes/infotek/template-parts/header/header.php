<?php
/**
 * Theme Default Header
 * @package infotek
 * @since 1.0.0
 */
?>

<?php $header_one_top_bar_enabled = cs_get_option('header_one_top_bar_enabled'); ?> 
<?php 
if( $header_one_top_bar_enabled ): ?>
<div class="header-top-section fix">
    <div class="container-fluid">
        <div class="header-top-wrapper">        
            <?php
                $header_1_top_bar_contacts = cs_get_option('header_1_top_bar_contacts');
                if ( $header_1_top_bar_contacts ) {
                    echo '<ul class="contact-list">';
                    foreach ( $header_1_top_bar_contacts as $item ) {
                        echo '<li>';
                        if ( isset( $item['header_1_top_bar_icon'] ) ) {
                            echo '<i class="' . esc_attr( $item['header_1_top_bar_icon'] ) . '"></i>';
                        }
                        if ( isset( $item['header_1_top_bar_info'] ) ) {
                            echo '<a href="'. esc_url( $item['header_1_top_bar_info_url'] ) .'" class="link">' . esc_html( $item['header_1_top_bar_info'] ) . '</a>';
                        }
                        echo '</li>';
                    }
                    echo '</ul>';
                }          
            ?>
            <div class="top-right">
                <div class="social-icon d-flex align-items-center">
                    <span>Nossas redes sociais:</span>
                    <?php   
                       $header_1_top_bar_socials = cs_get_option('header_1_top_bar_socials');
                        if ( $header_1_top_bar_socials ) {
                            foreach ( $header_1_top_bar_socials as $item ) {
                                if ( isset( $item['header_1_top_bar_socials_icon'] ) && isset( $item['header_1_top_bar_socials_icon_url'] ) ) {
                                    echo '<a href="' . esc_url( $item['header_1_top_bar_socials_icon_url'] ) . '">';
                                    echo '<i class="' . esc_attr( $item['header_1_top_bar_socials_icon'] ) . '"></i>';
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
<div id="header-sticky" class="header-1">
    <div class="container-fluid">
        <div class="mega-menu-wrapper">
            <div class="header-main style-2">
                <div class="header-left">
                    <div class="logo">
                    <?php
                    $header_one_logo = cs_get_option('header_one_logo');
                    if (has_custom_logo() && empty($header_one_logo['id'])) {
                        the_custom_logo();
                    } elseif (!empty($header_one_logo['id'])) {
                        printf('<a class="d-inline-block site-logo" href="%1$s"><img src="%2$s" alt="%3$s"/></a>', esc_url(get_home_url()), $header_one_logo['url'], $header_one_logo['alt']);
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
                    $header_one_search_enabled = cs_get_option('header_one_search_enabled');          
                    $header_one_right_btn_text = cs_get_option('header_one_right_btn_text');
                    $header_one_right_btn_url = cs_get_option('header_one_right_btn_url'); 
                    $header_one_right_btn_enabled = cs_get_option('header_one_right_btn_enabled');                 
                    ?> 
                    <?php 
                    if( $header_one_search_enabled ): ?>
                        <a href="#0" class="search-trigger search-icon"><i class="fal fa-search"></i></a>
                    <?php 
                    endif; ?>              
                    <div class="header-button">
                    <?php 
                    if( $header_one_right_btn_enabled ): ?>
                        <a href="<?php echo esc_url($header_one_right_btn_url); ?>" class="theme-btn">
                            <span>
                                <?php echo esc_html($header_one_right_btn_text); ?>
                                <i class="fa-solid fa-arrow-right-long"></i>
                            </span>
                        </a>
                    <?php 
                    endif; ?>
                    </div>   

                    <?php
                    $header_hamburger_visibility = cs_get_option('header_1_hamburger');
                    $hamburger_style = ($header_hamburger_visibility == 'block') ? 'block' : 'none';
                    ?>

                    <div class="header__hamburger d-xl-<?php echo esc_attr($hamburger_style); ?> my-auto">
                        <div class="sidebar__toggle">
                            <i class="fas fa-bars"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>