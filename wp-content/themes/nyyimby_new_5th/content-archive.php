<div class="full"  id="right_wrapper">

  <div class="row-fluid">
    <div id="post_main_content">

      <?php while(have_posts()) : the_post();?>
      <?php

      $catKey = "primary_cat";
      $related_category = get_category_by_slug(get_post_meta($post->ID, $catKey, true));
      ?>
      <h1><?php the_title();?></h1>
      <h4 class="by_line">By: <?php the_author() ?> on <?php the_time('F jS Y'); ?> at <?php the_time('g:i a'); ?></h4>

      <div id="main_image_wrapper">
        <a href="#" class="thumbnail">
          <?php echo the_post_thumbnail('full', array('id'=>'blog_post_main_image', 'class'=>''));  ?>
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
      <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
        <a class="addthis_button_facebook"></a>
        <a class="addthis_button_twitter"></a>
        <a class="addthis_button_pinterest_share"></a>
        <a class="addthis_button_google_plusone_share"></a>
        <a class="addthis_button_reddit"></a>
        <a class="addthis_button_linkedin"></a>
      </div>
      <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-51a896a72d0c5925"></script>
      <!-- AddThis Button END -->
    </p>

      <div class="text-center">

       <?php $withcomments = 1;comments_template(); ?>

       <?php disqus_embed('newyorkyimby'); ?> 
     </div>
     <?php $current_post_id = $post->ID;?>
   <?php endwhile; ?>
 </div><!--/end of post left column-->
 <div id="related_updates">
  <div class="related_posts">
<!-- get related info for here -->
<?php if( function_exists( 'adrotate_group' ) ) echo adrotate_group( 1 ); ?>
<?php  $post_categories = get_the_category(); ?>
  <?php $first = true;?>
  <ul class="media-list"   > 

    <li class="date_heading first " style="padding-top:0px;">previous updates on <?php echo $related_category->name;?>:</li>
    <?php $args = array('numberposts' => 20,
                        'category' => $related_category->term_id,
                        'post__not_in' => array($post->ID)
      );
      $posts = get_posts($args);
    ?>
    <?php foreach($posts as $post_count => $post) : ?>
    <li class="media <?php if ($first) echo 'first';?>">
      <a class="pull-left" href="#">
        <?php if (has_post_thumbnail($post->ID)) :?>
        <?php echo the_post_thumbnail('square_thumb');  ?>
      <?php else:?>
      <img src="http://dummyimage.com/76x76" height="76" width="76">
    <?php endif;?>      </a>
    <div class="media-body">
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"  class="left_nav_link">
        <p><?php echo $post->post_title;?></p>
      </a>
    </div>
  </li>
  <?php $first = false;?>
  <?php if ($post_count==2) break;?>
<?php endforeach;?>
</ul>
<div id="newsletter_signup_wrapper">
   <!-- Begin MailChimp Signup Form -->
<link href="http://cdn-images.mailchimp.com/embedcode/slim-081711.css" rel="stylesheet" type="text/css">
<style type="text/css">
  #mc_embed_signup{background:transparent; clear:left; font:14px Helvetica,Arial,sans-serif; }
  /* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
     We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
<div id="mc_embed_signup">
<form action="http://newyorkyimby.us7.list-manage.com/subscribe/post?u=ec79a308bdf0c8fcf2e250502&amp;id=d76c6a6290" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
  <label for="mce-EMAIL">NEWSLETTER SIGN-UP:</label>
  <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
  <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
</form>
</div>

<!--End mc_embed_signup-->
</div>
<?php if( function_exists( 'pro_ad_display_adzone' ) ) echo pro_ad_display_adzone( 3 ); ?>
</div>
</div><!--/end of post right column-->


</div><!--/row-->
</div>
