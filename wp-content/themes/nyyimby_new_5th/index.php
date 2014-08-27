<?php
/**
 *
 * Description: Default Index template to display loop of blog posts
 *
 */
get_header(); ?>

<?php $withcomments = 1;?>

<div class="main">

	<div class="box">

		<div class="row-fluid">

			<?php get_sidebar('leftTABS');?>

			<div class="column" id="right_col">

				<div class="padding inner content">


					<?php get_template_part('content', 'post');?>

				</div>
			</div>
		</div>
	</div>
</div>

<?php if ($image_data[1]<600):?>
	<style>
		#main_image_wrapper {
			width: <?php echo $image_data[1];?>px;
			height: <?php echo $image_data[2];?>px;
			margin: 0 auto;
		}
	</style>
<?php endif;?>

<?php get_footer();?>