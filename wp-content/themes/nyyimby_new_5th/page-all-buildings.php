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
            <div class="my-col col-md-3 gray visible-md visible-lg" id="main_tab">
            </div>

            <div class="my-col rb cx col-md-9">
              <div class="scroll_wrapper">
                <div class="col-lg-8">

                  <div id="stuff" class="jj">
                    <?php $categories = get_categories(); ?>

                    <h1>All Projects</h1>

                    <ul class="ul600 ul-projects nav nav-list nav-proj" style="width:100%;">
                    <?php foreach ($categories as $category): ?>
                      <li><a href="<?php echo get_category_link($category->term_id); ?>">
                        <?php echo $category->name; ?>
                      </a></li>
                    <?php endforeach; // end of the loop. ?>
                    </ul>

                    <br class="clr">
                  </div>
                </div>
                <div class="my-col-noscroll col-lg-4 visible-lg p-sm rb-gray">
                  <div class="ads-col pl-xs-lg" data-spy="affix">

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

<?php get_footer();?>
