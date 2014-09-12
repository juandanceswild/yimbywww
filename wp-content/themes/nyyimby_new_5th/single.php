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

       <div class="row-fluid white pt-top pl-phone">
            <div class="my-col span3 hidden-phone hidden-tablet" id="main_tab">
                <?php get_sidebar('leftTABS');?>
            </div>

            <div class="my-col cx span9 row-fluid">
              <div class="scroll_wrapper">
                <div class="span8">
                    <?php get_template_part('content', 'post'); ?>
                </div>
                <div class="my-col-noscroll span4 hidden-phone">
                    <?php if ( is_active_sidebar( 'sidebar-page' ) ) : ?>
                        <?php dynamic_sidebar( 'sidebar-page' ); ?>
                    <?php endif; ?>
                </div>
              </div>
            </div>
            <br class="clr">
        </div>

<?php get_footer();?>
