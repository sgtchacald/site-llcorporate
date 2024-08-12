<?php
/**
 * Theme Post excerpt Template
 * @package infotek
 * @since 1.0.0
 */

$infotek = infotek();
$post_meta = Infotek_Group_Fields_Value::post_meta('blog_post');
$excerpt_length = !empty($post_meta['excerpt_length']) ? $post_meta['excerpt_length'] : 55;
$readmore_text = !empty($post_meta['readmore_btn_text']) ? $post_meta['readmore_btn_text'] : esc_html__('Read More','infotek');


Infotek_Excerpt($excerpt_length);
?>
<div class="blog-bottom mt-3">
	<?php
	if($post_meta['readmore_btn']){
		printf('<div class="btn-wrap"><a href="%1$s" class="btn btn-gray"><i class="fas fa-arrow-right"></i></a></div>',esc_url(get_the_permalink()));
	}
	?>
</div>