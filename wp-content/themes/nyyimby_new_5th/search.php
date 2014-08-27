<?php
/**
 * Search Template
 *
 * Template Name: Search
 *
 */
get_header(); ?>

    <?php
        function get_the_ny_excerpt()
        {
            $excerpt = get_the_content();
            $excerpt = strip_shortcodes($excerpt);
            $excerpt = strip_tags($excerpt);
            $the_str = substr($excerpt, 0, 170);
            return $the_str;
        }
    ?>


    <div class="main main-content" style="min-width:1002px;">
        <div class="box" style="min-width:1002px;">
            <div class="row-fluid">
                <?php get_sidebar('leftTABS-search');?>

                <div id="right-col">
                    <div class="post_content_area">

                        <div class="full"  id="right_wrapper">
                            <div class="row-fluid">
                                <div id="post_main_content" class="ovh">
                                    <div id="entry-content" class="post_main_content_class" >
                                        <div class="test_inner_newsa">


                                                <div id="cx">
                                                    <div class="post">
                                                        <div class="left_post_navasd">
                                                            <h1>
                                                                <?php printf( __( 'Search Results for: %s', 'bootstrapwp' ), '<span>' . get_search_query() . '</span>' ); ?>
                                                            </h1>

                                                            <div class="results">

                                                                <?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
                                                                    <div class="res-box">
                                                                        <div class="result-content">
                                                                            <div class="top" style="display: block; min-height: 60px;">
                                                                                <strong>
                                                                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                                                </strong>
                                                                                <span><?php the_date(); ?></span>
                                                                            </div>

                                                                            <a class="search-thumbnail" href="<?php the_permalink(); ?>">
                                                                                <?php the_post_thumbnail('large'); ?>
                                                                            </a>

                                                                            <p>
                                                                                <?php
                                                                                     echo get_the_ny_excerpt(), '... <a class="continue" href="', the_permalink(), '">Continue reading</a>';
                                                                                ?>
                                                                            </p>
                                                                        </div> <!-- // div.result-content -->
                                                                    </div> <!-- // div.res-box -->

                                                                <?php endwhile; ?>

                                                                <?php else: ?>

                                                                    <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentytwelve' ); ?></p>
                                                                <?php endif; ?>

                                                            </div> <!-- // div.results -->

                                                        </div> <!-- // div.left_post_navasd -->
                                                    </div>
                                                </div> <!-- // div#cx -->


                                        </div> <!-- // div.test_inner_newsa -->
                                    </div> <!-- // div#entry-content -->
                                </div><!--/end of post left column-->


                                <script>


                                    
                                    jQuery(document).ready(function()
                                    {

                                        if ( jQuery(window).width() >= 1025 )
                                        {

                                            var search = new SearchResults();
                                        }
                                    });


                                </script>


                                <div id="related_updates">
                                    <div class="related_posts">
                                        <?php if ( is_active_sidebar( 'sidebar-page' ) ) : ?>
                                            <?php dynamic_sidebar( 'sidebar-page' ); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div> <!-- // div.row-fluid -->
                        </div> <!-- // div.full -->


                    </div> <!-- // div.post_content_area -->
                </div> <!-- // div.right-col -->
            </div> <!-- // div.row-fluid -->
        </div> <!-- div.box -->
    </div> <!-- // div.main -->


    <div class="overlay">
        <div class="modal-content"></div>
    </div>

<?php get_footer(); ?>
