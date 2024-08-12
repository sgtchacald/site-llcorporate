<?php
/**
 * Template part for displaying link posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package infotek
 */

$infotek = infotek();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-main-item-01 margin-bottom-30'); ?>>
    <div class="thumbnail-wrap">
        <?php
            get_template_part('template-parts/content/thumbnail-classic');
            get_template_part('template-parts/content/post-meta');
        ?>
    </div>
    <div class="content">
        <?php
        the_title('<h2 class="title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        get_template_part('template-parts/content/post-excerpt');
        ?>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
