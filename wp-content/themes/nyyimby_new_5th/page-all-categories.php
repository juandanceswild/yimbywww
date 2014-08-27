<?php
/**
 * The template for displaying all pages.
 *
 * Template Name: All Categories
 * Description: Page template with a content container and right sidebar
 *
 * @package WordPress
 * @subpackage WP-Bootstrap
 * @since WP-Bootstrap 0.1
 *
 * Last Revised: July 16, 2012
 */
get_header(); ?>
<?php $categories = get_categories();?>
<div class="main" id="single_page">
  <div class="box">
    <div class="row-fluid">
      <div class="column span3 left_col">
        <div class="padding">

        </div>
      </div> <!-- end of left hand side -->
      <div class="column" id="right_col">
        <div class="padding inner">
          <div class="full">

            <div class="row-fluid">
              <div  id="post_main_content">
                <ul class="nav nav-list">
                <?php foreach ($categories as $category):?>
                <li><a href="<?php echo get_category_link( $category->term_id );?>"><?php echo $category->name;?></a></li>
              <?php endforeach; // end of the loop. ?>
            </ul>
            </div><!--/end of post left column-->
            <div id="related_updates">
              <div class="related_posts">
<div id="newsletter_signup_wrapper">
  <form>
    <label><img src="<?php bloginfo('template_directory'); ?>/img/newsletter_icon.png" height="19" width="26" /> NEWSLETTER SIGN-UP:</label>
    <input type="text" />
  </form>
</div>
<?php if( function_exists( 'pro_ad_display_adzone' ) ) echo pro_ad_display_adzone( 1 ); ?>
</div>
</div><!--/end of post right column-->


</div><!--/row-->
</div>
</div>
</div>
</div>
</div>
</div>
