<?php

    preg_match('!/pager-menu/([0-9]*)[?]!', $_SERVER['REQUEST_URI'], $matches);

    $paged = (integer) @$matches[1];
    $args = unserialize(base64_decode(@$_GET['args']));
    $postsperpage = 22;

    if (!$paged) $paged = 1;

    // the args for the query should vary
    $args = false;
    $queried_object = get_queried_object();
    // TODO: perhaps we can put the pre-jax in here:
    //if (!empty($queried_object)) $_SESSION['qo'] = $queried_object;

    // arg set: existing, active ajaxing
    if ($paged===1) :
        unset($_SESSION['wpdb_args']);
    endif;

    $cat = @$queried_object->query['category_name'];
    $term_taxo = $queried_object->taxonomy;
    $args = array();

    switch(true) {
        case (!empty($args)):
            // args were passed in serialized
        break;
        case (!empty($_SESSION['wpdb_args'])):
            $args = $_SESSION['wpdb_args']; 
        break;
        case (!empty($cat)):
            $term_slug = $queried_object->slug;
            $args = array('category_name'=>$term_slug); 
            $_SESSION['wpdb_args'] = $args;
            echo '<h2 class="archive-title category">'.$queried_object->query['category_name'].'</h2>';
        break;
        case (!empty($term_taxo)):
            $term_slug = $queried_object->slug;
            $term_name = $queried_object->name;
            $temp_post = $post; // Storing the object temporarily
            $args = array(
                'taxonomy'=>$term_taxo,
                'term'=>$term_slug,
            ); 
            echo '<h2 class="archive-title">'.$term_name.'</h2>';
            //$_SESSION['wpdb_args']['cat'] = $args;
        break;
        case (!empty($queried_object->ID)):
            $d = strtotime($queried_object->post_date)+86400;
            $args = array(
                'date_query' => array(
                    array(
                        'before'    => array(
                            'year'  => date('Y', $d),
                            'month' => date('m', $d),
                            'day'   => date('d', $d),
                        ),
                        'inclusive' => true,
                    ),
                ),
            ); 
            //echo '<h2 class="archive-title">'.$term_name.'</h2>';
        break;
        case (!empty($cat)):
            $term_slug = $queried_object->slug;
            $args = array('category_name'=>$term_slug); 
        break;
    }
    // merge it in with the defaults
    $args = array_merge($args, array('post_type' => 'post', 'showposts' => $postsperpage));
    $args['paged'] = $paged;


    $temp_post = $post; // Storing the object temporarily
    $temp = $wp_query;
    $wp_query = null;
    $wp_query = new WP_Query();

    // have a default set of args that just pull in all posts
    // plan to be able to pick up the args later if they exist
    $_SESSION['wpdb_args'] = $args;

    $wp_query->query($args);

    $first_date = true;
    $first = true;

    if (empty($slug)) $slug = 'pager-menu';
?>

<?php // this was the beginning of main_tab.php ?>
<div class="scroll_wrapper">
    <div class="sidebar_nav_inner_news" id="sidebar_nav_inner">
        <div class="test_inner_news">

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
<?php if (!empty($once)) : ?>
            <ul>
                <li class="next">
                    <a href="<?php echo home_url(); ?>/pager-menu/<?php echo $paged+1; ?>?args=<?php echo base64_encode(serialize($args)); ?>" class="next_link">
                        <span class="meta-nav">&larr;</span> More posts
                    </a>
                </li>
            </ul>
<?php endif; ?>

            <div id="preloader"></div>

        </div> <!-- // div.test_inner_news -->
    </div> <!-- // div.content -->
</div> <!-- // div.scroll_wrapper -->
<?php // end of old main_tab.php ?>

<?php
    $wp_query = null;
    $wp_query = $temp;  // Reset
    $post = $temp_post; // Restore the value of $post to the original*/
?>
<?php // end of old sidebar_leftTABS.php ?>
