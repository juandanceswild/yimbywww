<?php if (empty($_SESSION['jj'])) : ?>
<div class="full"  id="right_wrapper">
    <div class="row-fluid">
        <div id="post_main_content">
            <div id="entry-content" class="post_main_content_class" >
                <div class="test_inner_newsa">


                    <?php while ($wp_query->have_posts()) : $wp_query->the_post();  ?>
                        <div id="cx">
                            <div class="post bordered">
                                <div class="left_post_navasd">
                                    <?php get_template_part('content', 'entry');?>
                                </div>
                                <div class="navx-links" style="display: none;">
                                    <?php previous_post_link(); ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>


                </div>
            </div>

        </div><!--/end of post left column-->

            <div id="related_updates" class="jj">
                <div class="related_posts">
                    <!-- get related info for here -->
                    <?php if ( is_active_sidebar( 'sidebar-page' ) ) : ?>
                        <?php dynamic_sidebar( 'sidebar-page' ); ?>
                    <?php endif; ?>
                </div>
            </div><!--/end of post right column-->

    </div><!--/row-->

</div>

<?php else : ?>

<div class="full"  id="right_wrapper">
    <div class="row-fluid">
        <div id="post_main_content">

            <div id="entry-content" class="post_main_content_class" >
                <div class="test_inner_newsa">
                    <?php while ($wp_query->have_posts()) : $wp_query->the_post();  ?>
                        <div id="cx">
                            <div class="post bordered">
                                <div class="left_post_navasd">
                                    <?php get_template_part('content', 'entry');?>
                                </div>
                                <div class="navx-links" style="display: none;">
                                    <?php previous_post_link(); ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>

            <div id="related_updates" class="jj">
                <div class="related_posts">
                    <!-- get related info for here -->
                    <?php if ( is_active_sidebar( 'sidebar-page' ) ) : ?>
                        <?php dynamic_sidebar( 'sidebar-page' ); ?>
                    <?php endif; ?>
                </div>
            </div><!--/end of post right column-->

                </div>
            </div>

        </div><!--/end of post left column-->
    </div><!--/row-->
</div>

<?php endif; ?>

<script type="text/javascript">

    // Call this function once the rest of the document is loaded

    function loadAddThis() {

        // addthis.init();

    }

    jQuery(function ($) {

        // loadAddThis();

        // Stuff to do as soon as the DOM is ready;

    });

</script>
