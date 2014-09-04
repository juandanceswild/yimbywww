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
            <div class="my-col span3 hidden-phone hidden-tablet">
                <?php get_sidebar('leftTABS');?>
            </div>

            <div class="my-col span6">
                <div class="row-fluid">
                    <?php get_template_part('content', 'post'); ?>
                </div>
            </div>

            <div class="my-col span3 hidden-phone">
                <?php if ( is_active_sidebar( 'sidebar-page' ) ) : ?>
                    <?php dynamic_sidebar( 'sidebar-page' ); ?>
                <?php endif; ?>
            </div>
            <br class="clr">
        </div>

<style>
body {
  overflow:hidden;
}
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
