<div class="scroll_wrapper">
    <div class="padding content sidebar_nav_inner_news" id="sidebar_nav_inner">
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
                    endif;
                endwhile; 
            $post = $current_post; // restore
            ?>
            </ul>

            <!-- Pagination -->
            <ul>
                <li class="next">
                    <a href="<?php echo home_url(); ?>/page/<?php echo $paged+1; ?>" class="next_link">
                        <span class="meta-nav">&larr;</span> More posts
                    </a>
                </li>
            </ul>

            <div id="preloader"></div>

        </div> <!-- // div.test_inner_news -->
    </div> <!-- // div.content -->
</div> <!-- // div.scroll_wrapper -->
