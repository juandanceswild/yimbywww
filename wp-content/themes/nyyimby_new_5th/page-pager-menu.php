<?php
global $menu_paged;
$args = get_args();
?>

<div class="scroll_wrapper">
    <div class="sidebar_nav_inner_news" id="sidebar_nav_inner">
        <div class="test_inner_news">

            <ul class="media-list left_post_nav">

            <?php

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

                $post = $current_post;
                rewind_posts();
            ?>
            </ul>

            <!-- Pagination -->
<?php if (!empty($once)) : ?>
            <ul>
                <li class="next">
                    <a href="<?php echo home_url(); ?>/pager-menu/<?php echo $menu_paged; if (!empty($args)) : ?>?args=<?php echo base64_encode(serialize($args)); endif; ?>" class="next_link">
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
