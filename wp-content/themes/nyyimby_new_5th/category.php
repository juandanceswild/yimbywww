<?php
/**
 *
 * Description: Default Index template to display loop of blog posts
 *
 * @package WordPress
 * @subpackage WP-Bootstrap
 * @since WP-Bootstrap 0.1
 */
get_header(); ?>

<?php
$paged = (get_query_var('page')) ? get_query_var('page') : 1;
?>



<div class="main main-content" style="min-width:1002px;">
    <div class="box" style="min-width:1002px;">
        <div class="row-fluid">
            <?php // get_sidebar('archive');?> 
            <?php get_sidebar('category');?>

            <div id="right-col">
                <div class="post_content_area">
                    <?php get_template_part('content', 'post-category');?>
                </div>
            </div>
        </div>
    </div>
</div>



<?php if ($image_data[1]<600):?>
    <style>
        #main_image_wrapper {
            width: <?php echo $image_data[1];?>px;
            height: <?php echo $image_data[2];?>px;
            margin: 0 auto;
        }
    </style>
<?php endif;?>


<script>

    jQuery(document).ready(function()
    {

        /** Archive page, unbind the continuous stream */
        jQuery.ias().unbind();


        /** Kick-off archive stream */
        var ArchiveStream  =  new TaxonomyStream();
        var ArchiveCycle   =  new ImageCycle();
    });


</script>

<?php get_footer();?>
