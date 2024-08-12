<?php
/**
 * Footer Style 03
 * @package infotek
 * @since 1.0.0
 */

$copyright_text = !empty(cs_get_option('copyright_text')) ? cs_get_option('copyright_text'): esc_html__('Copyright © 2024 infotek All Rights Reserved.','infotek');
$copyright_text = str_replace('{copy}','&copy;',$copyright_text);
$copyright_text = str_replace('{year}',date('Y'),$copyright_text);

$footer_three_logo = cs_get_option('footer_three_logo');
$footer_three_shape_1 = cs_get_option('footer_three_shape_1');
$footer_three_shape_2 = cs_get_option('footer_three_shape_2');
$footer_three_about_title = cs_get_option('footer_three_about_title');
$footer_three_about_text = cs_get_option('footer_three_about_text');
$footer_three_newsletter = cs_get_option('footer_three_newsletter');
$footer_three_newsletter_text = cs_get_option('footer_three_newsletter_text');
$footer_three_form = cs_get_option('footer_three_form');

$back_top_enable = cs_get_option('back_top_enable');
$back_top_icon = cs_get_option('back_top_icon');  

?>

<footer class="footer-section footer-bg">
        <?php if (!empty($footer_three_shape_1)) { ?>
            <div class="footer-shape-4">
                <img src="<?php echo esc_url($footer_three_shape_1['url']); ?>" alt="shape-img">
            </div>
        <?php } ?>

        <?php if (!empty($footer_three_shape_2)) { ?>
            <div class="shape-2">
                <img src="<?php echo esc_url($footer_three_shape_2['url']); ?>" alt="shape-img">
            </div>
        <?php } ?>
    <div class="footer-widgets-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h3><?php echo esc_html($footer_three_about_title); ?></h3>
                        </div>
                        <div class="footer-content">
                            <p>
                                <?php echo esc_html($footer_three_about_text); ?>
                            </p>
                            <div class="social-icon d-flex align-items-center">
                                <?php   
                                $footer_3_socials = cs_get_option('footer_3_socials');
                                if ( $footer_3_socials ) {
                                        foreach ( $footer_3_socials as $item ) {
                                            if ( isset( $item['footer_3_socials_icon'] ) && isset( $item['footer_3_socials_icon_url'] ) ) {
                                                echo '<a href="' . esc_url( $item['footer_3_socials_icon_url'] ) . '">';
                                                echo '<i class="' . esc_attr( $item['footer_3_socials_icon'] ) . '"></i>';
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
                       <!-- footer menu 1 -->
                       <?php get_template_part('template-parts/content/footer-widget'); ?>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 ps-lg-5 wow fadeInUp" data-wow-delay=".5s">
                   <!-- footer menu 2 -->
                   <?php get_template_part('template-parts/content/footer-widget-two'); ?>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                    <div class="single-footer-widget style-margin">
                        <div class="widget-head">
                            <h3><?php echo esc_html($footer_three_newsletter); ?></h3>
                        </div>
                        <div class="footer-content">
                            <p>
                                <?php echo esc_html($footer_three_newsletter_text); ?>
                            </p>
                            <div class="footer-input">
                                <?php echo do_shortcode($footer_three_form); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom style-3">
        <div class="container">
            <div class="footer-wrapper d-flex align-items-center justify-content-between">
                <div class="footer-logo wow fadeInLeft" data-wow-delay=".3s">
                    <?php if (!empty($footer_three_logo)) { ?>
                        <div class="widget-head">
                            <a href="<?php echo esc_url(home_url('/')) ?>"><img src="<?php echo esc_url($footer_three_logo['url']); ?>" alt="footer-logo"></a>
                        </div>
                    <?php } ?>
                </div>
                <p class="wow fadeInRight color-2" data-wow-delay=".5s">
                    <?php
                        echo wp_kses($copyright_text, infotek()->kses_allowed_html(array('a')));
                    ?>
                </p>
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

