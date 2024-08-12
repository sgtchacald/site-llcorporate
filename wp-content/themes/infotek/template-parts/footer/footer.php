<?php
/**
 * Theme Default Footer
 * @package infotek
 * @since 1.0.0
 */

$copyright_text = !empty(cs_get_option('copyright_text')) ? cs_get_option('copyright_text'): esc_html__('Copyright © 2024 infotek All Rights Reserved.','infotek');
$copyright_text = str_replace('{copy}','&copy;',$copyright_text);
$copyright_text = str_replace('{year}',date('Y'),$copyright_text);

$footer_one_logo = cs_get_option('footer_one_logo');
$footer_one_shape_1 = cs_get_option('footer_one_shape_1');
$footer_one_shape_2 = cs_get_option('footer_one_shape_2');
$footer_one_text = cs_get_option('footer_one_text');
$footer_one_blog_title = cs_get_option('footer_one_blog_title');
$footer_one_contact_title = cs_get_option('footer_one_contact_title');
$footer_one_contact_button = cs_get_option('footer_one_contact_button');
$footer_one_contact_button_url = cs_get_option('footer_one_contact_button_url');

$back_top_enable = cs_get_option('back_top_enable');
$back_top_icon = cs_get_option('back_top_icon');  

?>

<footer class="footer-section">
    <div class="footer-widgets-wrapper footer-bg">
        <?php if (!empty($footer_one_shape_1)) { ?>
        <div class="shape-1">
            <img src="<?php echo esc_url($footer_one_shape_1['url']); ?>" alt="shape-img">
        </div>
        <?php } ?>
        <?php if (!empty($footer_one_shape_2)) { ?>
        <div class="shape-2">
            <img src="<?php echo esc_url($footer_one_shape_2['url']); ?>" alt="shape-img">
        </div>
        <?php } ?>
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="single-footer-widget">
                        <?php if (!empty($footer_one_logo)) { ?>
                        <div class="widget-head">
                            <a href="<?php echo esc_url(home_url('/')) ?>"><img src="<?php echo esc_url($footer_one_logo['url']); ?>" alt=""></a>
                        </div>
                        <?php } ?>
                        <div class="footer-content">
                            <p>
                                <?php echo esc_html($footer_one_text); ?>
                            </p>
                            <div class="social-icon d-flex align-items-center">
                            <?php   
                            $footer_1_socials = cs_get_option('footer_1_socials');
                                if ( $footer_1_socials ) {
                                        foreach ( $footer_1_socials as $item ) {
                                            if ( isset( $item['footer_1_socials_icon'] ) && isset( $item['footer_1_socials_icon_url'] ) ) {
                                                echo '<a href="' . esc_url( $item['footer_1_socials_icon_url'] ) . '">';
                                                echo '<i class="' . esc_attr( $item['footer_1_socials_icon'] ) . '"></i>';
                                                echo '</a>';
                                            }
                                        }                            
                                    }                    
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6 ps-lg-5 wow fadeInUp" data-wow-delay=".5s">
                    <?php get_template_part('template-parts/content/footer-widget'); ?>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                    <div class="single-footer-widget style-margin">
                        <div class="widget-head">
                            <h3><?php echo esc_html($footer_one_blog_title); ?></h3>
                        </div>
                        <?php if ( in_array( 'infotek-core/infotek-core.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) : ?>
                            <?php get_template_part('template-parts/content/post-meta'); ?>
                        <?php endif; ?> 
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 ps-xl-5 wow fadeInUp" data-wow-delay=".9s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h3><?php echo esc_html($footer_one_contact_title); ?></h3>
                        </div>
                        <div class="footer-content">
                            <ul class="contact-info">
                            <?php   
                            $footer_1_contact_info = cs_get_option('footer_1_contact_us');
                            if ($footer_1_contact_info) {
                                foreach ($footer_1_contact_info as $item) {
                                    if (isset($item['footer_1_contact_icon']) && isset($item['footer_1_contact_url']) && isset($item['footer_1_contact_text'])) {
                                        echo '<li>';
                                        echo '<i class="' . esc_attr($item['footer_1_contact_icon']) . '"></i>';
                                        echo '<a href="' . esc_url($item['footer_1_contact_url']) . '">' . esc_html($item['footer_1_contact_text']) . '</a>';
                                        echo '</li>';
                                    }
                                }
                            }                    
                            ?>
                            </ul>
                            <?php if (isset($footer_one_contact_button_url) && isset($footer_one_contact_button)) : ?>
                                <a href="<?php echo esc_url($footer_one_contact_button_url); ?>" class="theme-btn hover-white mt-4">
                                    <?php echo esc_html($footer_one_contact_button); ?>
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-wrapper d-flex align-items-center justify-content-between">
                <p class="wow fadeInLeft color-2" data-wow-delay=".3s">
                <?php
                    echo wp_kses($copyright_text, infotek()->kses_allowed_html(array('a')));
                ?>
                </p>
                <ul class="footer-menu wow fadeInRight" data-wow-delay=".5s">
                <?php   
                    $footer_1_terms = cs_get_option('footer_1_terms');
                    if ($footer_1_terms) {
                        foreach ($footer_1_terms as $item) {
                            if (isset($item['footer_1_terms_text']) && isset($item['footer_1_terms_url'])) {
                                echo '<li>';
                                echo '<a href="' . esc_url($item['footer_1_terms_url']) . '">';
                                echo esc_html($item['footer_1_terms_text']);
                                echo '</a>';
                                echo '</li>';
                            }
                        }
                    }                    
                    ?>
                </ul>
            </div>
        </div>
        <?php 
        if( $back_top_enable ): ?>
           <a href="#" id="scrollUp" class="scroll-icon">
                <i class="<?php echo esc_attr($back_top_icon)?>"></i>
            </a>
        <?php 
        endif; ?> 
    </div>
</footer>

