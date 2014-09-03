

            <div id="stuff" class="jj">
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

            <div id="related_updates" class="jj hidden-desktop">
                <div class="related_posts">
                    <!-- get related info for here -->
                    <?php if ( is_active_sidebar( 'sidebar-page' ) ) : ?>
                        <?php dynamic_sidebar( 'sidebar-page' ); ?>
                    <?php endif; ?>
                </div>
            </div>
