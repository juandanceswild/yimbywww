<?php
$postsperpage = 20;
if (!$paged) $paged = 1;
if (is_single())
{
	$current_post = $post->ID;
	$single = true;
} else {
	$single = false;
}
?>
<?php
	$queried_object = get_queried_object();
	$term_slug = $queried_object->slug;
	$term_name = $queried_object->name;
	$term_taxo = $queried_object->taxonomy;
	$temp_post = $post; // Storing the object temporarily
	$temp = $wp_query;
	$wp_query = null;
	$wp_query = new WP_Query();
	$wp_query->query('showposts='.$postsperpage.'&post_type=post&post_status=publish'.'&paged='.$paged);

	 ?>
<?php $first_date = true;?>
<?php $first = true;?>
<div class="column left_col " id="left_col">
<div class="padding content" style="padding-top: 28px;" id="sidebar_nav_inner_phone">
	<?php if(!empty($term_taxo)):?>
	<h4><span style="text-transform: capitalize;"><?php echo $term_taxo; ?></span> : <?php echo $term_name; ?></h4>
	<hr>
	<?php endif;?>
	<div class="test_inner_phone">
	<?php   while ($wp_query->have_posts()) : $wp_query->the_post();  ?>
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
	<a class="pull-left" href="<?php the_permalink(); ?>/<?php echo $paged;?>" title="<?php the_title_attribute(); ?>" class="left_nav_link_phone">
		<?php echo the_post_thumbnail('square_thumb');  ?>

	</a>
	<div class="media-body">
		<a href="<?php the_permalink(); ?>/<?php echo $paged;?>" title="<?php the_title_attribute(); ?>" class="left_nav_link_phone">
			<p><?php the_title_attribute(); ?></p>
		</a>
	</div>
</li>
<?php $first = false;?>
<?php endwhile;?>
</ul>
</div>
<ul class="pager">
	<li class="next"><a href="<?php echo home_url(); ?>/page/<?php echo $paged+1;?>"  class="next_link"><span class="meta-nav">&larr;</span> Older posts</a></li>
	<?php if ($paged > 0) :?>
		<li class="previous"><a href="<?php echo home_url(); ?>/page/<?php echo $paged-1;?>">Newer posts <span class="meta-nav">&rarr;</span></a></li>
	<?php endif;?>
</ul>
<?php// else:?>
<?php //endif;?>
</div>

</div>
<?php
  $wp_query = null;
  $wp_query = $temp;  // Reset
     $post = $temp_post; // Restore the value of $post to the original
?>
