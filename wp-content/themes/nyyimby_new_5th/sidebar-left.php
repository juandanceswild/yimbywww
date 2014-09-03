    
     <?php $first_date = true;?>
     <?php $first = true;?>
     <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;?>
     <?php $the_query = new WP_Query( 'posts_per_page=20&paged=' . $paged ); ?>
      <div class="column left_col nano">
        <div class="padding content">
          <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
          <?php  $current_date = the_date('l F jS, Y', '', '', false);?>

          <?php  if ($current_date) : ?>
          <?php if (!$first_date):?>
        </ul>
      <?php else:?>
      <?php $first_date = false;?>
    <?php endif;?>
    <ul class="media-list"   > 
      <li class="date_heading <?php if ($first_date) echo 'first';?>" <?php if ($first) echo 'style="padding-top:0px;"';?>><?php echo $current_date;?></li>
    <?php endif; ?>
    <li class="media <?php if ($current_date) echo 'first';?>">
      <a class="pull-left" href="#">
                <?php echo the_post_thumbnail('square_thumb');  ?>

  </a>
  <div class="media-body">
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
      <p><?php the_title_attribute(); ?></p>
    </a>
  </div>
</li>
<?php $first = false;?>
<?php endwhile;?>
</ul>
 <?php bootstrapwp_content_nav('nav-below');?>

<?php wp_reset_query();?>


</div>
</div> <!-- end of left hand side -->
