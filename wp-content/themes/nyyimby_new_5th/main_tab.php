<!-- start of sidebar_nav_inner -->
<div class="scroll_wrapper">
    <div class="padding content sidebar_nav_inner_news" id="sidebar_nav_inner">
        <div class="test_inner_news">

            <?php
                global $post;
                $current_post = $post; // remember the current post
                $current_date = the_date('l F jS, Y', '', '', false);
            ?>

            <ul class="media-list left_post_nav">
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
            </ul>

            <ul class="media-list left_post_nav">
                <?php
                    for($i = 1; $i <= 19; $i++) {
                    $post = get_previous_post(); // this uses $post->ID
                    setup_postdata($post);
                    $curDate = the_date('l F jS, Y', '', '', false);
                ?>

                <!-- TODO: Fix the markup (spacing) -->
                <?php if ( $curDate ) { ?>
                    <li class="dateHeading">
                        <? echo $curDate; ?>
                    </li>
                <? } ?>

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

                <?php
                    }
                    $post = $current_post; // restore
                ?>
            </ul>

            <!-- Pagination -->
            <ul class="pager">
                <li class="next">
                    <a href="<?php echo home_url(); ?>/page/<?php echo $paged+3;?>"  class="next_link">
                        <span class="meta-nav">&larr;</span> Older posts
                    </a>
                </li>

                <?php if ($paged > 0) :?>
                    <li class="previous">
                        <a href="<?php echo home_url(); ?>/page/<?php echo $paged-1;?>">
                            Newer posts
                            <span class="meta-nav">&rarr;</span>
                        </a>
                    </li>
                <?php endif;?>
            </ul>

            <div id="preloader"></div>

        </div> <!-- // div.test_inner_news -->
    </div> <!-- // div.content -->
</div> <!-- // div.scroll_wrapper -->
