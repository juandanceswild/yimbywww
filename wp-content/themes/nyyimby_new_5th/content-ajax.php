<div class="full"  id="right_wrapper">

  <div class="row-fluid">
    <div id="post_main_content">
      <?php   while ($wp_query->have_posts()) : $wp_query->the_post();  ?>
      <?php
      $catKey = "primary_cat";
      $related_category = get_category_by_slug(get_post_meta($post->ID, $catKey, true));
      ?>
      <h1><?php the_title();?></h1>
      <h4 class="by_line">By: <?php the_author() ?> on <?php the_time('F jS Y'); ?> at <?php the_time('g:i a'); ?></h4>

      <div id="main_image_wrapper">
        <a href="#" class="thumbnail">
          <?php echo the_post_thumbnail('full', array('id'=>'blog_post_main_image'));  ?>
          <?php $image_data = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" ); ?>
        </a>
        <div id="main_image_thumbnails">
                   <?php if (class_exists('MultiPostThumbnails')) :?>
          <?php
          $second_image_full = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'second-image', NULL);
          ?>
          <?php MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'second-image', NULL, 'square_thumb', array('data-target'=>$second_image_full,
          'alt' => get_post(MultiPostThumbnails::get_post_thumbnail_id(get_post_type(), 'second-image', get_the_ID()))->post_excerpt));?>

          <?php
          $third_image_full = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'third-image', NULL);
          ?>
          <?php MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'third-image', NULL, 'square_thumb', array('data-target'=>$third_image_full,
          'alt' => get_post(MultiPostThumbnails::get_post_thumbnail_id(get_post_type(), 'third-image', get_the_ID()))->post_excerpt));?>
          <?php
          $fourth_image_full = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'fourth-image', NULL);
          ?>
          <?php MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'fourth-image', NULL, 'square_thumb', array('data-target'=>$fourth_image_full,
          'alt' => get_post(MultiPostThumbnails::get_post_thumbnail_id(get_post_type(), 'fourth-image', get_the_ID()))->post_excerpt));?>

          <?php
          $fifth_image_full = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'fifth-image', NULL);
          ?>

          <?php MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'fifth-image', NULL, 'square_thumb', array('data-target'=>$fifth_image_full,
          'alt' => get_post(MultiPostThumbnails::get_post_thumbnail_id(get_post_type(), 'fifth-image', get_the_ID()))->post_excerpt));?>

          <?php
          $sixth_image_full = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'fifth-image', NULL);
          ?>

          <?php MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'sixth-image', NULL, 'square_thumb', array('data-target'=>$sixth_image_full,
          'alt' => get_post(MultiPostThumbnails::get_post_thumbnail_id(get_post_type(), 'sixth-image', get_the_ID()))->post_excerpt));?>

        <?php endif;?>
        
      </div>
    </div>
    <div class="text-center">
      <p id="photo_caption"><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></p>
    </div>
    <p><?php the_content();?>
      <!-- AddThis Button BEGIN -->
      <div class="addthis_toolbox addthis_default_style addthis_32x32_style" addthis:url="<?php echo get_permalink( ); ?>" addthis:title="New York Yimby: <?php the_title();?>">
        <a class="addthis_button_facebook"></a>
        <a class="addthis_button_twitter"></a>
        <a class="addthis_button_pinterest_share"></a>
        <a class="addthis_button_google_plusone_share"></a>
        <a class="addthis_button_reddit"></a>
        <a class="addthis_button_linkedin"></a>
      </div>
    </p>
   
      <p style="margin-top:14px;">Posted in <?php the_category(' | '); ?></p>
     <?php $current_post_id = $post->ID;?>
   <?php endwhile; ?>



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
