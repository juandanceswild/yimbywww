<?php
/**
 * Search Template
 *
 * Template Name: Search blank
 *
 */
get_header(); ?>

<?php
function get_the_ny_excerpt()
{
    $excerpt = get_the_content();
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $the_str = substr($excerpt, 0, 220);
    return $the_str;
}
?>


    <div class="main main-content" style="min-width:1002px;">
        <div class="box" style="min-width:1002px;">
            <div class="row-fluid">
                <?php get_sidebar('leftTABS-search');?>

                <div id="right-col">
                    <div class="post_content_area">

                        <div class="full"  id="right_wrapper">
                            <div class="row-fluid">
                                <div id="post_main_content" class="ovh">
                                    <div id="entry-content" class="post_main_content_class" >
                                        <div class="test_inner_newsa">


                                            <div id="cx">
                                                <div class="post">
                                                    <div class="left_post_navasd">
                                                        <!-- <h1 class="search"> -->
                                                        <h1>
                                                            <!--
                                                            No articles match your search criteria. <br /> Please refine your search.
                                                            -->
                                                        </h1>
                                                    </div> <!-- // div.results -->
                                                </div> <!-- // div.left_post_navasd -->
                                                </div>
                                            </div> <!-- // div#cx -->


                                        </div> <!-- // div.test_inner_newsa -->
                                    </div> <!-- // div#entry-content -->
                                </div><!--/end of post left column-->


                                <script>



                                    jQuery(document).ready(function()
                                    {

                                        jQuery('body').addClass('search');

                                        if ( jQuery(window).width() >= 1025 )
                                        {

                                            var search = new SearchResults();
                                        }
                                    });


                                </script>


                                <div id="related_updates">
                                    <div class="related_posts">
                                        <?php if ( is_active_sidebar( 'sidebar-page' ) ) : ?>
                                            <?php dynamic_sidebar( 'sidebar-page' ); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div> <!-- // div.row-fluid -->
                        </div> <!-- // div.full -->


                    </div> <!-- // div.post_content_area -->
                </div> <!-- // div.right-col -->
            </div> <!-- // div.row-fluid -->
        </div> <!-- div.box -->
    </div> <!-- // div.main -->


    <div class="overlay">
        <div class="modal-content"></div>
    </div>

<?php get_footer(); ?>
