<?php

// theme color
function enqueue_custom_color_stylesheet() {

    wp_enqueue_style('infotek-style', get_stylesheet_uri());

    $theme_color_1 = cs_get_option('theme_color_1'); 
    

    wp_enqueue_style('custom-color-theme', get_template_directory_uri() . '/inc/theme-stylesheets/theme-color.css');
    wp_add_inline_style('custom-color-theme', '     
	


    .widget_infotek_popular_posts .theme-recent-post-item .time:before,
    .single-post-navigation .single-post-navigation-center-grid a,

    .header-main .main-menu ul li a:hover,
    .header-main .main-menu ul .current-menu-item a,
    .header-main .main-menu ul .current_page_ancestor a,
    
    .footer-widgets-wrapper .single-footer-widget .menu li:hover a,
    .testimonial-box-items .client-items .client-content .star i,
    .testimonial-wrapper .testimonial-items .tesimonial-image .star i:nth-last-of-type(1),
    .testimonial-wrapper .testimonial-items .tesimonial-image .star i,
    .team-details-wrapper .team-single-history h5 span,
    .team-box-items .team-content .social-icon a:hover,
    .team-box-items .team-content h3 a:hover,
    .single-team-items .team-image .social-profile ul li a,
    .team-card-items .team-content h3 a:hover,
    .team-wrapper .team-items .social-profile .plus-btn,
    .team-wrapper .team-items .team-title span,
    .main-sidebar .single-sidebar-image .contact-text .icon,
    .main-sidebar .single-sidebar-widget .opening-category ul li i,
    .main-sidebar .single-sidebar-widget .widget-categories ul li i,
    .service-details-wrapper .service-details-items .details-content .details-video-items .content .list li i,
    .service-details-wrapper .service-details-items .details-content .details-video-items .video-thumb .video-box .video-btn ,
    .service-card-items .service-content h4 a:hover,
    .service-wrapper .service-text h6 a ,
    .section-title h2 span ,
    .section-title span,
    .project-details-wrapper .project-details-items .list li i,
    .project-details-wrapper .project-details-items .project-catagory ul li span i:hover,
    .project-wrapper .project-items.style-2 .project-content .arrow-icon-2,
    .project-wrapper .project-items.style-2 .project-content .arrow-icon,
    .project-items .project-image .project-content .icon ,
    .project-items .project-image .project-content h4 a:hover,
    .project-items .project-image .project-content p,
    .search-close,
    .search-wrap .main-search-input,
    .preloader p,
    .preloader .animation-preloader .txt-loading .letters-loading,
    .pricing-items .pricing-button .pricing-btn ,
    .pricing-items .pricing-list li i,
    .news-details-area .blog-post-details .comments-area .blog-single-comment .content .reply,
    .news-details-area .blog-post-details .comments-area .blog-single-comment .content .head .star i,
    .news-details-area .blog-post-details .tag-share-wrap .social-share a:hover,
    .news-details-area .blog-post-details .single-blog-post .post-content h3 a:hover,
    .news-details-area .blog-post-details .single-blog-post .post-content .post-list li i,
    .main-sidebar .single-sidebar-widget .recent-post-area .recent-items .recent-content h6 a:hover,
    .main-sidebar .single-sidebar-widget .recent-post-area .recent-items .recent-content ul li i,
    .news-standard-wrapper .news-standard-items .news-content h3 a:hover,
    .news-standard-wrapper .news-standard-items .news-content ul li i,
    .news-card-items .news-content h3 a:hover,
    .news-card-items .news-content ul li i,
    .single-news-items .news-content .theme-btn-2,
    .single-news-items .news-content h3 a:hover ,
    .mean-container .mean-nav ul li a:hover,
    .mean-container .mean-nav ul li a:hover,
    .marquee-item.style-2 .text-style:hover,
    .hero-4 .hero-content h6,
    .hero-3 .array-button .array-next:hover ,
    .hero-3 .array-button .array-prev:hover ,
    .hero-1 .hero-content h6,
    .array-button .array-next:hover,
    .array-button .array-prev ,
    .breadcrumb-wrapper .page-heading .breadcrumb-items li a:hover ,
    .offcanvas__wrapper .offcanvas__content .offcanvas__contact ul li .offcanvas__contact-icon i,
    .sticky.header-3 .header-main .header-right .search-icon,
    .header-2 .header-main .header-right .sidebar__toggle ,
    .header-main .main-menu ul li:hover > a::after,
    .header-main .main-menu ul li:hover > a,
    .header-main .main-menu ul li .sub-menu li.has-dropdown > a::after,
    .header-main .main-menu ul li .sub-menu li:hover > a::after,
    .header-main .main-menu ul li a:hover,
    .header-top-section.top-style-2::after,
    .header-top-section::before,
    .client-wrapper .client-thumb h6 span,
    .footer-widgets-wrapper .single-footer-widget .footer-post .single-post-item .post-content h6 a:hover,
    .footer-widgets-wrapper .single-footer-widget .footer-post .single-post-item .post-content .post-date,
    .footer-widgets-wrapper .single-footer-widget .recent-post-area .recent-post-items .content h6 a:hover,
    .footer-widgets-wrapper .single-footer-widget .list-area li:hover a,
    .choose-us-wrapper .choose-content .choose-list-area .choose-list li i,
    .faq-content .accordion-item .accordion-header .accordion-button,
    .cta-banner-2 .cta-wrapper-2 .author-icon .icon,
    .contact-wrapper-2 .contact-left-items .video-image .video-box .video-btn,
    .about-wrapper-2 .about-content .icon-area .list li i,
    .about-wrapper.style-2 .about-content .about-icon-items .icon-items .icon,
    .theme-btn-2:hover  {

        color: ' . esc_attr($theme_color_1) . ';

        }


    ::-webkit-scrollbar-thumb,
    .comment-form .submit-btn,
    .single-post-navigation .prev-post a:hover i,
    .widget .widget-headline:before,
    .widget_search .search-form .submit-btn,
    .wp-block-tag-cloud a:hover,
    .blog-pagination ul li span.current,
    .blog-main-item-01 .blog-bottom .btn,
    .widget_infotek_category .service-item-list:hover,

    .team-details-wrapper .team-details-content .social-icon a:hover,
    .team-details-wrapper .team-details-content .progress-wrap .pro-items .progress-value ,
    .single-team-items:hover .team-content,
    .single-team-items .team-image .social-profile .plus-btn,
    .single-team-items .team-image .social-profile ul li a:hover,
    .team-card-items .team-image .social-profile .plus-btn,
    .team-card-items .team-image .social-profile ul li a:hover,
    .team-wrapper .team-items .social-profile ul li a:hover ,
    .main-sidebar .single-sidebar-widget .widget-categories ul li.active,
    .main-sidebar .single-sidebar-widget .widget-categories ul li:hover,
    .service-card-items .service-content .icon,
    .service-box-items::before,
    .section-title-area .video-box .video-btn,
    .project-wrapper .project-items.style-2 .project-content:hover .arrow-icon,
    .project-wrapper .project-items.style-2 .project-content .arrow-icon-2:hover ,
    .project-items .project-image .project-content .icon:hover ,
    .project-items .project-image .project-content::before,
    .cursor-inner.cursor-hover,
    .cursor-inner,
    .pricing-wrapper .section-title-area .nav .nav-link.active,
    .pricing-items.active,
    .pricing-items .pricing-button .pricing-btn:hover,
    .pricing-items .tag,
    .news-details-area .blog-post-details .tag-share-wrap .tagcloud a:hover,
    .main-sidebar .single-sidebar-widget .tagcloud a:hover,
    .main-sidebar .single-sidebar-widget .news-widget-categories ul li.active,
    .main-sidebar .single-sidebar-widget .news-widget-categories ul li:hover,
    .main-sidebar .single-sidebar-widget .search-widget form button ,
    .main-sidebar .single-sidebar-widget .wid-title h3::before ,
    .news-standard-wrapper .news-standard-items .news-thumb .post-date ,
    .news-card-items .news-image .post-date,
    .marquee-wrapper,
    .hero-4 .hero-content .hero-button .video-btn,
    .hero-4 .hero-content h6::before,
    .hero-3 .array-button .array-prev,
    .hero-1 .hero-content .hero-button .video-btn,
    .page-nav-wrap ul li .page-numbers:hover,
    .page-nav-wrap ul li .page-numbers.current,
    .array-button .array-next,
    .array-button .array-prev:hover,
    .swiper-dot-2 .swiper-pagination-bullet.swiper-pagination-bullet-active,
    .offcanvas__wrapper .offcanvas__content .offcanvas__contact .social-icon a:hover,
    .offcanvas__wrapper .offcanvas__content .offcanvas__close,
    .sticky.header-3 .header-main .header-right .header-button .theme-btn,
    .header-3::before,
    .header-1::before,
    .header-main .main-menu ul li .sub-menu li:hover > a,
    .header-section-2::before,
    .header-top-section::before,
    .header-top-section.top-style-2::after, 
    .footer-bottom .scroll-icon,
    .footer-bottom,
    .footer-widgets-wrapper .single-footer-widget .footer-content .footer-input .newsletter-btn,
    .footer-widgets-wrapper .single-footer-widget .footer-content .social-icon a:hover,
    .work-process-items .icon .number,
    .choose-us-wrapper .choose-content .progress-wrap .pro-items .progress-value,
    .offer-items.active .icon,
    .offer-items:hover .icon,
    .achievement-wrapper ,
    .achievement-section-3 ,
    .achievement-section-3,
    .cta-banner-2 .cta-wrapper-2,
    .cta-wrapper ,
    .contact-wrapper-2 .contact-left-items .contact-info-area-2,
    .contact-wrapper::before,
    .about-wrapper-2 .about-content .about-author .author-icon .icon,
    .about-wrapper-2 .about-image .video-box .video-btn,
    .about-wrapper.style-2 .about-image-items .counter-shape ,
    .about-wrapper .about-content .about-icon-items .icon-items .icon,
    .about-wrapper .about-image-items .video-box .video-buttton,
    .theme-btn {

    background-color: ' . esc_attr($theme_color_1) . ';

    }

    .blog-pagination ul li span.current,  
    .team-details-wrapper .team-single-history h5 span,
    .cursor-outer,
    .pricing-items.active,
    .pricing-items .pricing-button .pricing-btn ,
    .hero-4 .hero-content .hero-button .video-btn::before ,
    .hero-1 .hero-content .hero-button .video-btn::before,
    .array-button .array-prev ,
    .about-wrapper-2 .about-content .about-author .author-icon .icon::before {
        border: 1px solid ' . esc_attr($theme_color_1) . ';
    }

    .swiper-dot-2 .swiper-pagination-bullet,
    .swiper-dot-2 .swiper-pagination-bullet.swiper-pagination-bullet-active::before {
        border: 2px solid var(--theme2);
    }

    .about-wrapper .about-image-items .about-image-1::after {
        border: 3px solid ' . esc_attr($theme_color_1) . ';
    }

    .offcanvas__info {
        border-left: 2px solid ' . esc_attr($theme_color_1) . ';
    }

    .about-wrapper-2 .about-content .icon-area .icon-items {
        border-left: 3px solid ' . esc_attr($theme_color_1) . ';
    }

    .header-3 .header-main .header-right .header-button::before {
    border-top: 65px solid ' . esc_attr($theme_color_1) . ';
    }

    .swiper-dot-2 {
    border: 2px dotted ' . esc_attr($theme_color_1) . ';
    }


    .news-details-area .blog-post-details .single-blog-post .post-content .hilight-text {
    border-left: 4px solid ' . esc_attr($theme_color_1) . ';
    }

    .pricing-items.active .tag::before {
    border-top: 38px solid ' . esc_attr($theme_color_1) . ';
    }

    .preloader .animation-preloader .spinner {
    border-top-color: ' . esc_attr($theme_color_1) . ';
    }


    .search-wrap .main-search-input {
        border-bottom: 2px solid ' . esc_attr($theme_color_1) . ';
    }

    .project-details-wrapper .project-details-items .project-catagory {
        border-top: 4px solid ' . esc_attr($theme_color_1) . ';
    }

		
    ');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_color_stylesheet');
  