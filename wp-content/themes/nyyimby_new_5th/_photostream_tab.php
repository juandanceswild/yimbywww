<?php
      
        $items = get_posts( array(
          'numberposts' => -1,
          'orderby' => 'post_date',
          'order' => 'DESC',
          'post_type' => 'photostream',
          'post_status' => 'publish'
        )); //array of objects returned
        ?>
   <div class="">
   	<div class="padding " style="padding-top: 0px; margin-top: 0px;" id="sidebar_nav_inner">


   		<div class="test_inner">
            <?php foreach ($items as $i => $item) :?>
            <?php $current_date = date('l F jS, Y', strtotime($item->post_date));?>
   			<?php  if ($current_date) : ?>
   			<?php if (!$first_date):?>
   		</ul>
   	<?php else:?>
   	<?php $first_date = false;?>
   <?php endif;?>
   <ul class="media-list left_post_nav"  id="" > 
   	<li class="date_heading <?php if ($first_date) echo 'first';?>" <?php if ($first) echo 'style="padding-top:0px;"';?>><?php echo $current_date;?></li>
   <?php endif; ?>
   <li class="media <?php if ($current_date) echo 'first';?>">
   	<a class="pull-left" href="<?php echo get_permalink( $item->ID ); ?>" title="<?php echo $item->post_title; ?>" class="left_nav_link">
         <?php echo get_the_post_thumbnail($item->ID, 'square_thumb');?>
   	</a>
   	<div class="media-body">
   		<a href="<?php echo get_permalink( $item->ID ); ?>" title="<?php echo $item->post_title; ?>" class="left_nav_link">
   			<p><?php echo $item->post_title; ?></p>
   		</a>
   	</div>
   </li>
   <?php $first = false;?>
<?php //endwhile;?>
<?php endforeach;?>
</ul>
</div>
</div>
</div>
<style>
.media{
  list-style: none;
}
</style>
<!-- end of sidebar_nav_inner -->