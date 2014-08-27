<?php
$offset = 20 * $paged;
$items = get_posts( array(
  'numberposts' => 20,
  'orderby' => 'menu_order',
  'order' => 'ASC',
  'post_type' => 'post',
  'post_status' => 'publish'
  ));
  ?>
  <!-- start of sidebar_nav_inner -->
  <div class="scroll_wrapper">
     <div class="padding content" style="padding-top: 28px; margin-top: 40px;" id="sidebar_nav_inner">


       <div class="test_inner_news">
         <?php foreach ($items as $i => $item) :?>
         <?php $current_data = date('l F jS, Y', $post->datepost_date);?>
         <?php  if ($current_date) : ?>
         <?php if (!$first_date):?>
      </ul>
   <?php else:?>
   <?php $first_date = false;?>
<?php endif;?>
<ul class="media-list left_post_nav">
  <li class="date_heading <?php if ($first_date) echo 'first';?>" <?php if ($first) echo 'style="padding-top:0px;"';?>><?php echo $current_date;?></li>
<?php endif; ?>
<li class="media <?php if ($current_date) echo 'first';?>">
  <a class="pull-left" href="<?php echo get_permalink( $item->ID ); ?>" title="<?php echo $item->post_title; ?>" class="left_nav_link">
    <?php echo get_the_post_thumbnail($item->ID, 'square_thumb');?>
 </a>
 <div class="media-body">
   <a href="<?php echo get_permalink( $item->ID ); ?>" title="<?php the_title_attribute(); ?>" class="left_nav_link">
      <p><?php echo $item->post_title; ?><?php var_dump($offset);?></p>
   </a>
</div>
</li>
<?php $first = false;?>
<?php endforeach;?>
</ul>
</div>
<!-- end of test_inner -->

<?php if ($single):?>
	<ul class="pager">

		<li class="next"><a href="<?php echo home_url(); ?>/page/<?php echo $paged+1;?>"  class="next_link"><span class="meta-nav">&larr;</span> Older posts</a></li>
		<?php if ($paged > 0) :?>
		<li class="previous"><a href="<?php echo home_url(); ?>/page/<?php echo $paged-1;?>">Newer posts <span class="meta-nav">&rarr;</span></a></li>
	<?php endif;?>
</ul>
<?php else:?>
	<?php bootstrapwp_content_nav('nav-below');?>

<?php endif;?>
</div>
</div>
<!-- end of sidebar_nav_inner -->
