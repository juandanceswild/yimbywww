<?php
$postsperpage = 20;

if (is_single())
{
	$current_post = $post->ID;
	$single = true;
} else {
	$single = false;
}
?>
<?php global $nav;?>
<?php //var_dump($nav);die();?>

<?php
   $temp_post = $post; // Storing the object temporarily
?>
<?php $first_date = true;?>
<?php $first = true;?>
<div class="column left_col nano " >
<div class="padding content" id="sidebar_nav_inner_phone">
	<div class="test_inner_phone">
	<?php   while ($nav->have_posts()) : $nav->the_post();  ?>
		<?php  $current_date = the_date('l F jS, Y', '', '', false);?>

		<?php  if ($current_date) : ?>
		<?php if (!$first_date):?>
	</ul>
<?php else:?>
	<?php $first_date = false;?>
<?php endif;?>
<ul class="media-list left_post_nav left_post_nav_phone"  id="" > 
	<li class="date_heading <?php if ($first_date) echo 'first';?>" <?php if ($first) echo 'style="padding-top:0px;"';?>><?php echo $current_date;?></li>
<?php endif; ?>
<li class="media <?php if ($current_date) echo 'first';?>">
	<a class="pull-left" href="<?php the_permalink(); ?>/<?php echo $paged;?>" title="<?php the_title_attribute(); ?>" class="left_nav_link">
		<?php echo the_post_thumbnail('square_thumb');  ?>

	</a>
	<div class="media-body">
		<a href="<?php the_permalink(); ?>/<?php echo $paged;?>" title="<?php the_title_attribute(); ?>" class="left_nav_link">
			<p><?php the_title_attribute(); ?></p>
		</a>
	</div>
</li>
<?php $first = false;?>
<?php endwhile;?>
</ul>
</div>
 <?php if ($single):?>
<ul class="pager">
	<li class="next"><a href="<?php echo get_permalink( $current_post ); ?>/<?php echo $paged+1;?>"  class="next_link"><span class="meta-nav">&larr;</span> Older posts</a></li>
	<li class="previous"><a href="<?php echo get_permalink( $current_post ); ?>/<?php echo $paged-1;?>">Newer posts <span class="meta-nav">&rarr;</span></a></li>
</ul>
<?php else:?>
  <?php bootstrapwp_content_nav('nav-below');?>

<?php endif;?>
</div>

</div>
<?php 
  $wp_query = null; 
  $wp_query = $temp;  // Reset
     $post = $temp_post; // Restore the value of $post to the original
?>
