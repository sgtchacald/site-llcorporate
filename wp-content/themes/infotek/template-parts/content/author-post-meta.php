<?php
/**
 * Post Meta Functions
 * @package infotek
 * @since 1.0.0
 */

$infotek = infotek();
$post_meta = Infotek_Group_Fields_Value::post_meta('blog_post');
?>
<div class="post-meta-wrap">
    <div class="row">
        <div class="col-lg-6 align-self-center">
            <ul class="post-meta">
                <li>
                    <span><?php echo esc_html('Written by:', 'infotek'); ?></span>
                    <?php $infotek->posted_by(); ?>
                </li>
                <li>
                    <span class="date-left-dot"></span>
                    <?php echo get_the_date(); ?>
                </li>
            </ul>
        </div>
        <?php if(has_category()) : ?>
            <div class="col-lg-6 text-sm-end text-left pt-2 pt-sm-0">
                <div class="blog-cat-list">
                    <?php the_category(' ', '') ?>
                </div>
            </div>
        <?php  endif; ?> 
        
    </div>
</div>