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

<div class="summerville">

       <div class="white pt-top pl-phone">
            <div class="my-col col-md-3 hidden-xs hidden-sm" id="main_tab">
<?php include('page-pager-menu.php'); ?>
            </div>

            <div class="my-col rb cx col-sm-12 col-md-9 container">
              <div class="scroll_wrapper">
                <div class="col-sm-12 col-md-8">

                  <div id="stuff" class="jj">
                        <div id="cx">
                            <div class="post">
                                <div class="left_post_navasd">
                        <?php get_template_part('content', 'entry'); ?>
                                </div>
                                <div class="navx-links" style="display: none;">
                        <?php previous_post_link(); ?>
                                </div>
                            </div>
                        </div>
                  </div>

                </div>
                <div class="col-md-4 hidden-xs p-sm rb-gray">
                <div class="my-col-noscroll" style="border:3px dashed #00F;">
                    <?php if ( is_active_sidebar( 'sidebar-page' ) ) : ?>
                        <?php dynamic_sidebar( 'sidebar-page' ); ?>
                    <?php endif; ?>
                </div>
                </div>
                <br class="clr">
              </div>
              <br class="clr">
            </div>
            <br class="clr">
        </div>
        <br class="clr">

</div>

<?php get_footer();?>
