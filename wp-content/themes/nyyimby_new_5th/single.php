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

       <div class="white pt-top">
            <div class="my-col col-md-3 visible-md visible-lg" id="main_tab">
<?php include('page-pager-menu.php'); ?>
            </div>

            <div class="my-col rb cx col-md-9">
              <div class="scroll_wrapper">
                <div class="col-lg-8">

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
                <div class="col-lg-4 visible-lg p-md rb-gray">
                  <div class="my-col-noscroll ads-col pl-xs-lg" data-spy="affix">

                    <div id="ads"></div>

                    <br class="clr">
                  </div>
                  <br class="clr">
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
