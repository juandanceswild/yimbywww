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
$queried_object = get_queried_object();
$term_slug = $queried_object->slug;
$term_name = $queried_object->name;
$term_taxo = $queried_object->taxonomy;
$temp_post = $post; // Storing the object temporarily
$temp = $wp_query;
$wp_query = null;
$wp_query = new WP_Query();
$args = array('post_type' => 'post',
    'showposts' => $postsperpage,
    'paged' => $paged,
     // $queried_object->taxonomy => $term_slug);
     'category_name' => $term_slug);
$wp_query->query($args);
?>

<?php $first_date = true;?>
<?php $first = true;?>

<div class="column left_col nano" id="sidebar-news">
    <div class="tab-content visible">
        <div class="tab-pane active" id="news">

            <div class="scroll_wrapper">
                <div class="padding content sidebar_nav_inner_news" id="sidebar_nav_inner">
                    <div class="test_inner_news">

                        <ul class="media-list left_post_nav">
                            <?php  while ($wp_query->have_posts()) : $wp_query->the_post();  ?>
                                <?php  $current_date = the_date('l F jS, Y', '', '', false);?>

                                <li class="dateHeading">
                                    <?php echo $current_date;?>
                                </li>

                                <!-- Current post -->
                                <li class="media">
                                    <a class="pull-left" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="left_nav_link">
                                        <?php echo the_post_thumbnail('square_thumb');  ?>
                                    </a>

                                    <div class="media-body">
                                        <a href="<? the_permalink(); ?>">
                                            <p>
                                                <? the_title(); ?>
                                            </p>
                                        </a>
                                    </div> <!-- // div.media-body -->
                                </li>
                            <?php endwhile;?>
                        </ul> <!-- // ul.media-list -->

                        <div id="preloader"></div>

                    </div> <!-- // div.test_inner_news -->
                </div> <!-- // div.content -->
            </div> <!-- // div.scroll_wrapper -->

        </div>
    </div>
</div>


<?php
global $nav;
$nav = $wp_query;

$wp_query = null;
$wp_query = $temp;  // Reset
$post = $temp_post; // Restore the value of $post to the original
?>
