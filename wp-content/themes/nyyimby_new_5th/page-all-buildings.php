<?php
/**
 * The template for displaying all pages.
 *
 * Template Name: All Buildings
 * Description: Page template with a content container and right sidebar
 *
 * @package WordPress
 * @subpackage WP-Bootstrap
 * @since WP-Bootstrap 0.1
 *
 * Last Revised: July 16, 2012
 */

get_header(); ?>

    <div class="main">

        <div class="box">

            <div class="row-fluid">

                <?php // get_sidebar('leftTABS');?>

                <div class="column left_col nano all-proj-sidebar" id="sidebar-news">
                    <div class="tab-content visible">

                        <div class="tab-pane active" id="news">
                        </div>

                    </div>
                </div>

                <div class="column all-proj" id="right_col">

                    <div class="padding inner content">

                        <div class="full" id="right_wrapper">
                            <div class="row-fluid">
                                <div id="post_main_content" class="post-content-proj">
                                    <div id="entry-content" class="post_main_content_class">
                                        <div class="test_inner_newsa">


                                            <?php $categories = get_categories(); ?>


                                            <div id="cx">
                                                <div class="post">
                                                    <div class="post-wrapper">
                                                        <h1>All Projects</h1>

                                                        <div class="res">
                                                            <ul class="nav nav-list nav-proj">
                                                                <?php foreach ($categories as $category): ?>
                                                                    <li>
                                                                        <a href="<?php echo get_category_link($category->term_id); ?>">
                                                                            <?php echo $category->name; ?>
                                                                        </a>
                                                                    </li>
                                                                <?php endforeach; // end of the loop. ?>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <!--/end of post left column-->


                                <div id="related_updates">
                                    <div class="related_posts">


                                        <!-- get related info for here -->

                                        <?php if (is_active_sidebar('sidebar-page')) : ?>

                                            <?php dynamic_sidebar('sidebar-page'); ?>

                                        <?php endif; ?>

                                    </div>

                                </div>
                                <!--/end of post right column-->


                            </div>
                            <!--/row-->

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

<? get_footer(); ?>
