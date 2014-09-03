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

       <div class="row-fluid white pt-top">
            <div class="my-col span3">
                <?php get_sidebar('leftTABS');?>
            </div>

            <div class="my-col span6">
                <div class="row-fluid">
                    <?php get_template_part('content', 'post'); ?>
                </div>
            </div>

            <div class="my-col span3">
                ads go here
                <div style="height:3000px; width:200px;"></div>
            </div>
            <br class="clr">
        </div>

<style>
.my-col {
  height:100%;
  overflow-x:hidden;
  overflow-y:scroll;
}
.clr {
  clear:both;
}
.pt-top {
  padding-top:4%;
  padding-bottom:2%;
  height:94%;
}
.white {
  background-color:#fff;
}
</style>

<?php get_footer();?>
