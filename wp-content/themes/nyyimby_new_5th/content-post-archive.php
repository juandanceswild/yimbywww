<div class="full"  id="right_wrapper">
    <div class="row-fluid">
        <div id="post_main_content" >
            <div id="entry-content" class="post_main_content_class" >
                <div class="test_inner_newsa">

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
                        // 'showposts' => 20,
                        'showposts' => 1,
                        'paged' => $paged,
                        $queried_object->taxonomy => $term_slug);
                    $wp_query->query($args);
                    ?>

                    <div id="cx">
                        <?php while ($wp_query->have_posts()) : $wp_query->the_post();  ?>
                            <!-- <div class="post-container"> -->
                            <div class="post-container post">
                                <div class="left_post_navasd">
                                    <?php get_template_part('content', 'entry');?>
                                </div>
                                <div class="navx-links" style="display: block;">
                                    <?php // previous_post_link(); ?>
                                </div>
                            </div> <!-- // div.post-container -->
                        <?php endwhile; ?>
                    </div> <!-- // div#cx -->


                </div>
            </div>
        </div><!--/end of post left column-->


        <div id="related_updates">
            <div class="related_posts">


                <!-- get related info for here -->

                <?php if ( is_active_sidebar( 'sidebar-page' ) ) : ?>

                    <?php dynamic_sidebar( 'sidebar-page' ); ?>

                <?php endif; ?>

            </div>

        </div><!--/end of post right column-->





    </div><!--/row-->

</div>

<script type="text/javascript">

    // Call this function once the rest of the document is loaded

    function loadAddThis() {

        addthis.init();

    }

    jQuery(function ($) {

        loadAddThis();

        // Stuff to do as soon as the DOM is ready;

    });

</script>