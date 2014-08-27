<?php
$postsperpage = 20;
if (!$paged) $paged = 1;
if ( is_single() )
{
    $current_post = $post->ID;
    $single = true;
} else {
    $single = false;
}
?>



<?php
$temp_post = $post; // Storing the object temporarily
$temp = $wp_query;
$wp_query = null;
$wp_query = new WP_Query();
$wp_query->query('showposts='.$postsperpage.'&post_type=post&post_status=publish'.'&paged='.$paged);

?>
<?php $first_date = true;?>
<?php $first = true;?>

<div class="column left_col nano" id="sidebar-news">
    <div class="tab-content visible">

        <div class="tab-pane active" id="news">

            <div class="scroll_wrapper">
                <div class="content sidebar_nav_inner_news no-padding">
                    <div class="refine">
                        <h1>Search Criteria</h1>

                        <?php // echo do_shortcode('[searchandfilter fields="search,post_date,types,neighborhoods" types=",daterange,checkbox,checkbox" headings=",Date Range,Project Type, Neighborhood" submit_label="search" operators="AND"]'); ?>
                        <?php echo do_shortcode('[searchandfilter fields="search,post_date,types,neighborhoods" types=",daterange,checkbox,checkbox" headings=",Date Range,Project Type, Neighborhood" submit_label="search" operators="AND" empty_search_url="/search/"]'); ?>
                    </div>
                </div>
            </div>

        </div> <!-- // div.tab_pane -->
    </div> <!-- // div.tab-content -->
</div> <!-- // div.left_col -->


<?php
global $nav;
$nav = $wp_query;

$wp_query = null;
$wp_query = $temp;  // Reset
$post = $temp_post; // Restore the value of $post to the original
?>
