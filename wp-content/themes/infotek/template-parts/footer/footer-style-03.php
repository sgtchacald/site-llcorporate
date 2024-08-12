<?php
/**
 * Footer Style 04
 * @package infotek
 * @since 1.0.0
 */

$copyright_text = !empty(cs_get_option('copyright_text')) ? cs_get_option('copyright_text'): esc_html__('Copyright © 2024 infotek All Rights Reserved.','infotek');
$copyright_text = str_replace('{copy}','&copy;',$copyright_text);
$copyright_text = str_replace('{year}',date('Y'),$copyright_text);


$footer_four_shape_1 = cs_get_option('footer_four_shape_1');
$footer_four_shape_2 = cs_get_option('footer_four_shape_2');
$footer_four_clients = cs_get_option('footer_four_clients');
$footer_four_clients_text = cs_get_option('footer_four_clients_text');
$footer_four_btn_text = cs_get_option('footer_four_btn_text');
$footer_four_btn_url = cs_get_option('footer_four_btn_url');
$footer_four_logo = cs_get_option('footer_four_logo');
$footer_four_about_text = cs_get_option('footer_four_about_text');
$footer_four_contact_location = cs_get_option('footer_four_contact_location');
$footer_four_download = cs_get_option('footer_four_download');
$footer_four_download_text = cs_get_option('footer_four_download_text');


$footer_four_download_img_1 = cs_get_option('footer_four_download_img_1');
$footer_four_download_img_1_url = cs_get_option('footer_four_download_img_1_url');

$footer_four_download_img_2 = cs_get_option('footer_four_download_img_2');
$footer_four_download_img_2_url = cs_get_option('footer_four_download_img_2_url'); 

$back_top_enable = cs_get_option('back_top_enable');
$back_top_icon = cs_get_option('back_top_icon');  

?>



<footer class="footer-section footer-bg">

<?php if ( in_array( 'infotek-core/infotek-core.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) : ?>

    <div class="shape-1">
        <?php if (!empty($footer_four_shape_1)) { ?>
            <div class="footer-shape-4">
                <img src="<?php echo esc_url($footer_four_shape_1['url']); ?>" alt="shape-img">
            </div>
        <?php } ?>
    </div>
    <div class="shape-2">
        <?php if (!empty($footer_four_shape_2)) { ?>
            <div class="shape-2">
                <img src="<?php echo esc_url($footer_four_shape_2['url']); ?>" alt="shape-img">
            </div>
        <?php } ?>
    </div>
    <div class="container">
        <div class="client-wrapper">
            <div class="client-thumb wow fadeInUp" data-wow-delay=".3s">
                <?php if (!empty($footer_four_clients)) { ?>
                    <img src="<?php echo esc_url($footer_four_clients['url']); ?>" alt="img">
                <?php } ?>
                <h6><?php echo esc_html($footer_four_clients_text); ?></h6>
            </div>
            <a href="<?php echo esc_url($footer_four_btn_url); ?>" class="theme-btn hover-white wow fadeInUp" data-wow-delay=".5s">
                <?php echo esc_html($footer_four_btn_text); ?>
                <i class="fa-solid fa-arrow-right-long"></i>
            </a>
        </div>
        <div class="footer-widgets-wrapper pb-0 pt-0">
            <div class="footer-style-2">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="single-footer-widget">
                            <div class="widget-head">
                            <?php if (!empty($footer_four_logo)) { ?>
                                <div class="widget-head">
                                    <a href="<?php echo esc_url(home_url('/')) ?>"><img src="<?php echo esc_url($footer_four_logo['url']); ?>" alt="footer-logo"></a>
                                </div>
                            <?php } ?>
                            </div>
                            <div class="footer-content">
                                <p>
                                    <?php echo esc_html($footer_four_about_text); ?>
                                </p>
                                <div class="social-icon d-flex align-items-center">
                                    <?php   
                                    $footer_4_socials = cs_get_option('footer_4_socials');
                                    if ($footer_4_socials) {
                                        foreach ($footer_4_socials as $social_item) {
                                            if (isset($social_item['footer_4_socials_icon']) && isset($social_item['footer_4_socials_icon_url'])) {
                                                ?>
                                                <a href="<?php echo esc_url($social_item['footer_4_socials_icon_url']); ?>">
                                                    <i class="<?php echo esc_attr($social_item['footer_4_socials_icon']); ?>"></i>
                                                </a>
                                                <?php
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
                    <div class="col-xl-4 col-lg-4 col-md-6 ps-lg-4 wow fadeInUp" data-wow-delay=".5s">
                        <div class="single-footer-widget style-margin">
                            <div class="widget-head">
                                <h3>Contact Info</h3>
                            </div>
                            <div class="footer-content">
                                <p><?php echo esc_html($footer_four_contact_location); ?></p>
                                <div class="contact-info-area-2">
                                 
                                <?php   
                                    $footer_4_contact_us = cs_get_option('footer_4_contact_us');
                                    if ($footer_4_contact_us) {
                                        foreach ($footer_4_contact_us as $contact_info) {
                                            if (isset($contact_info['footer_4_contact_icon'], $contact_info['footer_4_contact_title'], $contact_info['footer_4_contact_text'])) {
                                                ?>
                                                <div class="contact-info-item-2">
                                                <div class="icon">
                                                        <i class="<?php echo esc_attr($contact_info['footer_4_contact_icon']); ?>"></i>
                                                    </div>
                                                    <div class="content">
                                                        <h6><?php echo esc_html($contact_info['footer_4_contact_title']); ?></h6>
                                                        <p><?php echo esc_html($contact_info['footer_4_contact_text']); ?></p>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 ps-lg-5 wow fadeInUp" data-wow-delay=".7s">
                        <div class="single-footer-widget">
                            <div class="widget-head">
                                <h3><?php echo esc_html($footer_four_download); ?></h3>
                            </div>
                            <div class="footer-content">
                                <p>
                                    <?php echo esc_html($footer_four_download_text); ?>
                                </p>
                                <div class="apps-image d-flex align-items-center">    
                                    

                                    <?php if (!empty($footer_four_download_img_1)) { ?>
                                        <a href="<?php echo esc_url($footer_four_download_img_1_url); ?>">
                                            <img src="<?php echo esc_url($footer_four_download_img_1['url']); ?>" alt="store-img">
                                        </a>
                                    <?php } ?>

                                    <?php if (!empty($footer_four_download_img_2)) { ?>
                                        <a href="<?php echo esc_url($footer_four_download_img_2_url); ?>">
                                            <img src="<?php echo esc_url($footer_four_download_img_2['url']); ?>" alt="store-img">
                                        </a>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?> 

    <div class="footer-bottom style-2 style-4">
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
                        foreach ($footer_1_terms as $term_item) {
                            if (isset($term_item['footer_1_terms_text']) && isset($term_item['footer_1_terms_url'])) {
                                ?>
                                <li>
                                    <a href="<?php echo esc_url($term_item['footer_1_terms_url']); ?>">
                                        <?php echo esc_html($term_item['footer_1_terms_text']); ?>
                                    </a>
                                </li>
                                <?php
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

