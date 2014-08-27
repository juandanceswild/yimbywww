<!-- start of sidebar_nav_inner -->
<div class="scroll_wrapper">
	<div class="padding content sidebar_nav_inner_news" id="sidebar_nav_inner">
		<div class="test_inner_news">
			<?php   while ($wp_query->have_posts()) : $wp_query->the_post();  ?>

				<?php  $current_date = the_date('l F jS, Y', '', '', false);?>

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
								<a class="pull-left" href="<?php the_permalink(); ?>>" title="<?php the_title_attribute(); ?>" class="left_nav_link">
									<?php echo the_post_thumbnail('square_thumb');  ?>
								</a>
								<div class="media-body">
									<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="left_nav_link">
										<p><?php the_title_attribute(); ?> </p>
									</a>
								</div>
				</li>
				<?php $first = false;?>
			<?php endwhile;?>
		</ul>

        <ul class="pager">

            <li class="next"><a href="<?php echo home_url(); ?>/page/<?php echo $paged+1;?>"  class="next_link"><span class="meta-nav">&larr;</span> Older posts</a></li>
            <?php if ($paged > 0) :?>
                <li class="previous"><a href="<?php echo home_url(); ?>/page/<?php echo $paged-1;?>">Newer posts <span class="meta-nav">&rarr;</span></a></li>
            <?php endif;?>
        </ul>

        <div id="preloader"></div>
	</div>
	<!-- end of test_inner -->

	<?php //if ($single):?>

	<?php //else:?>

	<?php //endif;?>
</div>
</div>
<!-- end of sidebar_nav_inner -->