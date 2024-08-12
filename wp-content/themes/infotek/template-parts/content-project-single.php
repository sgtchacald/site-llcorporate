<?php
/**
 * Template part for displaying single package post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package infotek
 */

$infotek = infotek();
$project_single_meta_data = get_post_meta(get_the_ID(), 'infotek_project_options', true);
$project_clients = isset($infotek_projec_meta['project_clients']) && !empty($infotek_projec_meta['project_clients']) ? $infotek_projec_meta['project_clients'] : '';
$project_cat = isset($infotek_projec_meta['project_cat']) && !empty($infotek_projec_meta['project_cat']) ? $infotek_projec_meta['project_cat'] : '';
$project_date = isset($infotek_projec_meta['project_date']) && !empty($infotek_projec_meta['project_date']) ? $infotek_projec_meta['project_date'] : '';
$project_location = isset($infotek_projec_meta['project_location']) && !empty($infotek_projec_meta['project_location']) ? $infotek_projec_meta['project_location'] : '';
$project_content = isset($project_single_meta_data['project_content']) && !empty($project_single_meta_data['project_content']) ? $project_single_meta_data['project_content'] : '';

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('projec-details-item'); ?>>
    <div class="entry-content">
        <div class="row">
            <div class="col-lg-4">
                <div class="td-sidebar service-sidebar">
                    <div class="widget widget_info">
                        <h5 class="widget-title"><i class="fas fa-arrow-right"></i> Project Info</h5>               
                        <div class="widget-info-inner">
                            <?php
                                if (!empty($project_clients)) { ?>
                                    <h6><?php echo esc_html('Clients:', 'infotek'); ?></h6>  
                                    <p><?php echo esc_html($project_clients); ?></p>    
                                <?php }
                            ?>
                            <?php
                                if (!empty($project_cat)) { ?>
                                    <h6><?php echo esc_html('Category:', 'infotek'); ?></h6>  
                                    <p><?php echo esc_html($project_cat); ?></p>    
                                <?php }
                            ?>
                            <?php
                                if (!empty($project_date)) { ?>
                                    <h6><?php echo esc_html('Date:', 'infotek'); ?></h6>  
                                    <p><?php echo esc_html($project_date); ?></p>    
                                <?php }
                            ?>
                            <?php
                                if (!empty($project_location)) { ?>
                                    <h6><?php echo esc_html('Location:', 'infotek'); ?></h6>  
                                    <p><?php echo esc_html($project_location); ?></p>    
                                <?php }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <?php
                    the_content();
                ?>
            </div>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->