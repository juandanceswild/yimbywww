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

<div class="summerville">

       <div class="white pt-top">
            <div class="my-col col-md-3 visible-md visible-lg" id="main_tab">
            </div>

            <div class="my-col rb cx col-md-9">
              <div class="scroll_wrapper">
                <div class="col-lg-8">
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
                <div class="col-lg-4 visible-lg p-md rb-gray">
                  <div class="my-col-noscroll ads-col pl-xs-lg" data-spy="affix">

                    <div id="ads"></div>

                    <br class="clr">
                  </div>
                  <br class="clr">
                </div>
                <br class="clr">
              </div>
              <br class="clr">
            </div>
            <br class="clr">
        </div>
        <br class="clr">

</div>


<? get_footer(); ?>
