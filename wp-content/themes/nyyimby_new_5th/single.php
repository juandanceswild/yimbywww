<?php
/**
 * The template for displaying all posts.
 *
 * Default Post Template
 *
 * Page template with a fixed 940px container and right sidebar layout
 *
 * @package WordPress
 * @subpackage WP-Bootstrap
 * @since WP-Bootstrap 0.1
 */

get_header(); ?>

<?php
$paged = (get_query_var('page')) ? get_query_var('page') : 1;
?>

       <div class="row-fluid">
            <div class="span3">
                <?php get_sidebar('leftTABS');?>
            </div>

            <div class="span6">
                <div class="row-fluid">
                    <?php get_template_part('content', 'post'); ?>
                </div>
            </div>

            <div class="span3">
                ads go here
            </div>
        </div>

<?php get_footer();?>
