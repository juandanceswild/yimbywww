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

       <div class="row-fluid white pt-top pl-phone">
            <div class="my-col span3 hidden-phone hidden-tablet" id="main_tab">
<?php include('page-pager-menu.php'); ?>
            </div>

            <div class="my-col rb cx span9 row-fluid">
              <div class="scroll_wrapper">
                <div class="span8">

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

                  <div id="related_updates" class="jj hidden-desktop">
                    <div class="related_posts">
                    <!-- get related info for here -->
                    <?php if ( is_active_sidebar( 'sidebar-page' ) ) : ?>
                        <?php dynamic_sidebar( 'sidebar-page' ); ?>
                    <?php endif; ?>
                    </div>
                  </div>


                </div>
                <div class="my-col-noscroll rb span4 hidden-phone p-sm">
                    <?php if ( is_active_sidebar( 'sidebar-page' ) ) : ?>
                        <?php dynamic_sidebar( 'sidebar-page' ); ?>
                    <?php endif; ?>
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
