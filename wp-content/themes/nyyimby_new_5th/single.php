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

<div id="soc">
    <div class="addthis_sharing_toolbox addthis_32x32_style">
        <a class="addthis_button_facebook"></a>
        <a class="addthis_button_twitter"></a>
        <a class="addthis_button_pinterest_share"></a>
        <a class="addthis_button_google_plusone_share"></a>
        <a class="addthis_button_reddit"></a>
        <a class="addthis_button_linkedin"></a>
    </div>
</div>

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
                        <?php include('page-pager-page.php'); ?>
                                </div>
                                <div class="navx-links" style="display: none;">
                        <a rel="prev" href="<?php echo home_url(); ?>/pager-page/<?php echo $page_paged; if (!empty($args)) : ?>?args=<?php echo base64_encode(serialize($args)); endif; ?>" class="next_link"></a>
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
