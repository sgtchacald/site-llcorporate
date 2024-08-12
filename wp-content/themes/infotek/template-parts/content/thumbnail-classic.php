<?php
/**
 * Post Thumbnail Functions
 * @package infotek
 * @since 1.0.0
 */

$infotek = infotek();
if (has_post_thumbnail()): ?>
    <div class="thumbnail">
        <?php $infotek->post_thumbnail('post-thumbnail'); ?>
    </div>
<?php endif; ?>