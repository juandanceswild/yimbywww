<?php // start of sidebar_leftTABS.php ?>
<?php
//die('<pre>'.print_r($_SERVER['REQUEST_URI'],true));
    preg_match('!pager-menu\/([0-9]*)!', $_SERVER['REQUEST_URI'], $matches);
    $paged = @$matches[1];
    $postsperpage = 22;
    if (!$paged) $paged = 1;
    if ( is_single() )
    {
        $current_post = $post->ID;
        $single = true;
    } else {
        $single = false;
    }


    $temp_post = $post; // Storing the object temporarily
    $temp = $wp_query;
    $wp_query = null;
    $wp_query = new WP_Query();
    $wp_query->query('showposts='.$postsperpage.'&post_type=post&post_status=publish'.'&paged='.$paged);

    $first_date = true;
    $first = true;

?>

<?php // this was the beginning of main_tab.php ?>
<div class="scroll_wrapper">
    <div class="padding content sidebar_nav_inner_news" id="sidebar_nav_inner">
        <div class="test_inner_news p-sm">

            <ul class="media-list left_post_nav">

            <?php

                global $post;

                $current_post = $post; // remember the current post
                $once = 0;

                while (have_posts()) : the_post();

                    $once = 1;
                    $curDate = the_date('l F jS, Y', '', '', false);

                    $p = get_next_post(); // this uses $post->ID
                    if (!empty($post)) {
                        setup_postdata($p);
                        $current_date = the_date('l F jS, Y', '', '', false);
                    }

                    $noDate = 0;
                    if (strcmp($curDate,$current_date)===false && $paged>1) {
                        $noDate = 1;
                    }
 
                    if ( $current_date ) :
                        if (empty($noDate)) :
                            ?>

                    <li class="dateHeading">
                        <? echo $curDate; ?>
                    </li>

                            <?php
                        endif;
                    endif; 
                    if (!empty($post->ID)) : ?>

                <li class="media">
                    <a class="pull-left on-page-menu" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="left_nav_link" data-id="post-<?php echo $post->ID; ?>">
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

                         <?php
                    endif;
                endwhile; 
            $post = $current_post; // restore
            ?>
            </ul>

            <!-- Pagination -->
            <ul>
                <li class="next">
                    <a href="<?php echo home_url(); ?>/pager-menu/<?php echo $paged+1; ?>" class="next_link">
                        <span class="meta-nav">&larr;</span> More posts
                    </a>
                </li>
            </ul>

            <div id="preloader"></div>

        </div> <!-- // div.test_inner_news -->
    </div> <!-- // div.content -->
</div> <!-- // div.scroll_wrapper -->
<?php // end of old main_tab.php ?>

<?php
    global $nav;
    $nav = $wp_query;

    $wp_query = null;
    $wp_query = $temp;  // Reset
    $post = $temp_post; // Restore the value of $post to the original
?>
<?php // end of old sidebar_leftTABS.php ?>
