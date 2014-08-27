<?php
/**
 *
 * Description: Default Index template to display loop of blog posts
 *
 * @package WordPress
 * @subpackage WP-Bootstrap
 * @since WP-Bootstrap 0.1
 */
get_header(); ?>

<div class="main hidden-phone" style="min-width:1002px;" >
  <div class="box" style="min-width:1002px;">
    <div class="row-fluid">
      <?php get_sidebar('category');?>
      <div class="columns" id="right_col" style="background-color:#F1F0EF;">
        <div class="padding inner content post_content_area">
             <?php
                global $query_string;
                query_posts( $query_string . '&posts_per_page=10' );
                ?>
          <?php get_template_part('content', 'post');?>
        </div>
</div>
</div>
</div>
</div>

<?php if ($image_data[1]<600):?>
<style>
#main_image_wrapper {
  width: <?php echo $image_data[1];?>px;
  height: <?php echo $image_data[2];?>px;
  margin: 0 auto;
}
</style>
<?php endif;?>

<div class="content-fluid visible-phone" style="height:100%; padding-top:63px;margin-bottom:40px; z-index: 1000;">
  <div class="row-fluid" style="">
  <?php get_sidebar('left-phone');?>
</div>
</div>

  </div>
<?php get_footer();?>