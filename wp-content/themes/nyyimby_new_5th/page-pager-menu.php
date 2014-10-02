<?php
$args = get_args();
$menu_paged = $args['paged'];
$taxonomy = get_args_tax($args);
if (!have_posts()) die('<div class="test_inner_news"></div>');
?>

<div class="scroll_wrapper">
    <div class="sidebar_nav_inner_news" id="sidebar_nav_inner">
        <div class="test_inner_news">

            <?php $mt=0; if (!empty($taxonomy)) : ?>
                <h2 class="archive-title affix" data-spy="affix">
                    <?php echo $taxonomy; ?>
                </h2>
            <?php $mt="50px"; endif; ?>

            <ul class="media-list left_post_nav" style="padding-top:<?=$mt?>;">

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
                    <a class="pull-left on-page-menu menujax" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="left_nav_link menujax" data-id="post-<?php echo $post->ID; ?>">
                        <?php echo the_post_thumbnail('square_thumb');  ?>
                    </a>

                    <div class="media-body">
                        <a href="<? the_permalink(); ?>" class="menujax" data-id="post-<?php echo $post->ID; ?>">
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
