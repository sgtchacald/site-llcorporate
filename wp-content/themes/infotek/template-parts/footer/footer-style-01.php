<?php
/**
 * Footer Style 02
 * @package infotek
 * @since 1.0.0
 */

$copyright_text = !empty(cs_get_option('copyright_text')) ? cs_get_option('copyright_text'): esc_html__('Copyright © 2024 infotek All Rights Reserved.','infotek');
$copyright_text = str_replace('{copy}','&copy;',$copyright_text);
$copyright_text = str_replace('{year}',date('Y'),$copyright_text);

$footer_two_logo = cs_get_option('footer_two_logo');
$footer_two_shape_1 = cs_get_option('footer_one_shape_1');
$footer_two_shape_2 = cs_get_option('footer_one_shape_2');
$footer_two_text = cs_get_option('footer_one_text');
$footer_two_blog_title = cs_get_option('footer_one_blog_title');
$footer_two_contact_title = cs_get_option('footer_one_contact_title');

$back_top_enable = cs_get_option('back_top_enable');
$back_top_icon = cs_get_option('back_top_icon');  

?>

<footer class="footer-section footer-bg">
    <div class="container">
        <div class="contact-info-area">   
            <?php
            $footer_2_contact_us = cs_get_option('footer_2_contact_us');
            if (!empty($footer_2_contact_us)) {                
                foreach ($footer_2_contact_us as $contact_info) {
                    echo '<div class="contact-info-items wow fadeInUp" data-wow-delay=".3s">';
                    echo '<div class="icon">';
                    echo '<div class="round-image">';
                    echo '<img src="' . esc_url($contact_info['footer_2_contact_shape']['url']) . '" alt="">';
                    echo '</div>';                  
                    echo '<div class="icon-image">';
                    echo '<img src="' . esc_url($contact_info['footer_2_contact_icon']['url']) . '" alt="">';
                    echo '</div>';                  
                    echo '</div>';
                    echo '<div class="content">';
                    echo '<p>' . esc_html($contact_info['footer_2_contact_title']) . '</p>';
                    echo '<h3>';
                    echo '<a href="' . esc_url($contact_info['footer_2_contact_url']) . '">' . esc_html($contact_info['footer_2_contact_text']) . '</a>';
                    echo '</h3>';
                    echo '</div>';
                    echo '</div>';
                }                
            }
            ?>
        </div>    
    </div>
    <div class="footer-widgets-wrapper">
        <?php if (!empty($footer_two_shape_1)) { ?>
            <div class="shape-1">
                <img src="<?php echo esc_url($footer_two_shape_1['url']); ?>" alt="shape-img">
            </div>
        <?php } ?>
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="single-footer-widget">
                        <?php if (!empty($footer_two_logo)) { ?>
                        <div class="widget-head">
                            <a href="<?php echo esc_url(home_url('/')) ?>"><img src="<?php echo esc_url($footer_two_logo['url']); ?>" alt="footer-logo"></a>
                        </div>
                        <?php } ?>
                        <div class="footer-content">
                            <p>
                                <?php echo esc_html($footer_two_text); ?>
                            </p>
                            <div class="social-icon d-flex align-items-center">
                            <?php   
                            $footer_2_socials = cs_get_option('footer_2_socials');
                                if ( $footer_2_socials ) {
                                        foreach ( $footer_2_socials as $item ) {
                                            if ( isset( $item['footer_2_socials_icon'] ) && isset( $item['footer_2_socials_icon_url'] ) ) {
                                                echo '<a href="' . esc_url( $item['footer_2_socials_icon_url'] ) . '">';
                                                echo '<i class="' . esc_attr( $item['footer_2_socials_icon'] ) . '"></i>';
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
                            <h3><?php echo esc_html($footer_two_blog_title); ?></h3>
                        </div>                      

                        <?php if ( in_array( 'infotek-core/infotek-core.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) : ?>
                            <?php get_template_part('template-parts/content/post-meta'); ?>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom style-2">
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

