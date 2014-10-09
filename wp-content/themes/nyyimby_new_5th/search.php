<?php
/**
 */

function get_the_ny_excerpt() {
    $excerpt = get_the_content();
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $the_str = substr($excerpt, 0, 170);
    return $the_str;
}

get_header(); ?>

<div id="soc" class="hidden">
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

<div class="column nano" id="sidebar-news">
    <div class="tab-content visible">

        <div class="tab-pane active" id="news">

            <div class="scroll_wrapper">
                <div class="content sidebar_nav_inner_news no-padding">
                    <div class="refine">
                        <h1>Search Criteria</h1>

                        <?php echo do_shortcode('[searchandfilter fields="search,post_date,types,neighborhoods" types=",daterange,checkbox,checkbox" headings=",Date Range,Project Type, Neighborhood" submit_label="search" operators="AND" empty_search_url="/search/"]'); ?>
                    </div>
                </div>
            </div>

        </div> <!-- // div.tab_pane -->
    </div> <!-- // div.tab-content -->
</div> <!-- // div.left_col -->

            </div>

            <div class="my-col rb cx col-md-9">
              <div class="scroll_wrapper">
                <div class="col-lg-8 pl-no">

                  <div id="stuff" class="jj">


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


                                                <div id="cx">
                                                    <div class="post">
                                                        <div class="left_post_navasd">
                                                            <h1>
                                                                <?php if (empty($blank)) printf( __( 'Search Results for: %s', 'bootstrapwp' ), '<span>' . get_search_query() . '</span>' ); ?>
                                                            </h1>

                                                            <div class="results">

                                                                <?php if (empty($blank) && have_posts()) : while ( have_posts() ) : the_post(); ?>
                                                                    <div class="res-box">
                                                                        <div class="result-content">
                                                                            <div class="top" style="display: block; min-height: 60px;">
                                                                                <strong>
                                                                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                                                </strong>
                                                                                <span><?php the_date(); ?></span>
                                                                            </div>

                                                                            <a class="search-thumbnail" href="<?php the_permalink(); ?>">
                                                                                <?php the_post_thumbnail('large'); ?>
                                                                            </a>

                                                                            <p>
                                                                                <?php
                                                                                     echo get_the_ny_excerpt(), '... <a class="continue" href="', the_permalink(), '">Continue reading</a>';
                                                                                ?>
                                                                            </p>
                                                                        </div> <!-- // div.result-content -->
                                                                    </div> <!-- // div.res-box -->

                                                                <?php endwhile; ?>

                                                                <?php else: ?>

                                                                    <p><?php if (empty($blank)) _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentytwelve' ); ?></p>
                                                                <?php endif; ?>

                                                            </div> <!-- // div.results -->

                                                        </div> <!-- // div.left_post_navasd -->
                                                    </div>
                                                </div> <!-- // div#cx -->

<script>
jQuery(document).ready(function() {
    if ( jQuery(window).width() >= 1025 ) {
        var search = new SearchResults();
    }
    jQuery('#myModal').on('hide.bs.modal', function (e) {
        $('#soc').fadeOut();
    })
    jQuery('#myModal').on('show.bs.modal', function (e) {
        $('#soc').fadeIn();
    })
});
</script>




                    <br class="clr">
                  </div>
                </div>
                <div class="my-col-noscroll col-lg-4 visible-lg p-sm rb-gray">
                  <div class="ads-col pl-xs-lg" data-spy="affix">

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


<? get_footer(); ?>
