<?php
/**
 * Search Template
 *
 * Template Name: Default Page
 * Description: Page template with a content container and right sidebar
 *
 */
get_header(); ?>

<div class="main hidden-phone" >

	<div class="box">

		<div class="row-fluid">

			<?php get_sidebar('leftTABS');?>

			<div class="column" id="right_col">

				<div class="padding inner">

					<div class="full">

						<div class="row-fluid">

							<div  id="post_main_content">


								<div class="post-content">

									<h1>
										<?php printf( __( 'Search Results for: %s', 'bootstrapwp' ), '<span>' . get_search_query() . '</span>' ); ?>
									</h1>

									<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>

										<a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><h2> <?php the_title();?></h2></a>
										<p><?php the_excerpt();?></p>
										<hr />

									<?php endwhile; ?>

									<?php else: ?>
										<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentytwelve' ); ?></p>
					<?php get_search_form(); ?>

									<?php endif; ?>
								</div>
							</div><!--/end of post left column-->
							<div id="related_updates">
								<div class="related_posts">

<?php if ( is_active_sidebar( 'sidebar-page' ) ) : ?>

			<?php dynamic_sidebar( 'sidebar-page' ); ?>

		<?php endif; ?>
								</div>
							</div><!--/end of post right column-->


						</div><!--/row-->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>