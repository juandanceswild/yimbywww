<?php
      $catKey = "primary_cat";
      $related_category = get_category_by_slug(get_post_meta($post->ID, $catKey, true));
      ?>
      <div id="post-<?php the_ID(); ?>" <?php post_class('on-page-post'); ?>>


        <div class="post-wrapper">
              <h1 class="entry-title"><?php the_title();?></h1>
              <span class="vcard author post-author">
                  <span class="fn">
                    <h4 class="by_line">By: <?php the_author() ?> on <span class="post-date updated"><?php the_time('F jS Y'); ?> at <?php the_time('g:i a'); ?></span></h4>
                  </span>
              </span>

            <div class="soc">
                <div class="addthis_sharing_toolbox addthis_32x32_style">
                    <a class="addthis_button_facebook"></a>
                    <a class="addthis_button_twitter"></a>
                    <a class="addthis_button_pinterest_share"></a>
                    <a class="addthis_button_google_plusone_share"></a>
                    <a class="addthis_button_reddit"></a>
                    <a class="addthis_button_linkedin"></a>
                </div>
            </div>

              <div id="main_image_wrapper">
                <a href="#" class="thumbnail">
                  <?php echo the_post_thumbnail('full', array('id'=>'blog_post_main_image', 'class'=>'blog_main_desktop'));  ?>
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

            <p style="margin-top:14px;">Posted in <?php the_category(' | '); ?></p>
                <?php if(is_archive()): ?>
                    <!-- <div class="separator"></div> -->

                    <div class="archive-meta">
                        <a href="<?php echo get_permalink( ); ?>" tilte="<? echo the_title(); ?>">
                            <? echo the_title(); ?>
                        </a>
                    </div> <!-- // div.archive-meta -->
                <?php endif; ?>
            </p>

            <?php $current_post_id = $post->ID;?>
        </div>

          <div class="clearfix"></div>
</div>
