<?php
$args = get_args(1);
$page_paged = $args['paged'];
if (!empty($post)) :
?>
<div class="post">
    <div class="left_post_navasd">


<div id="post-<?php the_ID(); ?>" <?php post_class('on-page-post'); ?>>

    <div class="post-wrapper bordered">
        <h1 class="entry-title"><?php the_title();?></h1>
        <span class="vcard author post-author">
            <span class="fn">
                <h4 class="by_line">By: <?php the_author() ?> on <span class="post-date updated"><?php the_time('F jS Y'); ?> at <?php the_time('g:i a'); ?></span></h4>
            </span>
        </span>

        <div class="main_image_wrapper">
            <a href="#" class="thumbnail">
                  <?php echo the_post_thumbnail('full', array('class'=>'w75'));  ?>
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

        <p><?php the_content(); ?></p>

        <div style="margin-top:14px;">Posted in <?php the_category(' | '); ?>
            <?php if(is_archive()): ?>
                <div class="archive-meta">
                    <a href="<?php echo get_permalink( ); ?>" title="<?php echo the_title(); ?>">
                        <?php echo the_title(); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>

        <?php $current_post_id = $post->ID;?>
    </div>

    <div class="clearfix"></div>
</div>



    </div>
    <div class="navx-links hidden">
      <a rel="prev" href="<?php echo home_url(); ?>/pager-page/<?php echo $page_paged; if (!empty($args)) : ?>?args=<?php echo base64_encode(serialize($args)); endif; ?>"></a>
    </div>
</div>

<?php endif; ?>
