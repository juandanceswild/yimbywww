<?php
$postsperpage = 2;
if (!$paged) $paged = 1;
?>
<?php
	 $temp_post = $post; // Storing the object temporarily
	 $temp = $wp_query;
	 $wp_query = null;
	 $wp_query = new WP_Query();
	 $wp_query->query('showposts='.$postsperpage.'&post_type=post&post_status=publish'.'&paged='.$paged);
	 ?>

	 <div class="full"  id="right_wrapper">
	 	<div class="row-fluid">
	 		<div id="post_main_content" >
	 			<div id="entry-content" class="post_main_content_class" >
	 				<div class="test_inner_newsa">
	 					<?php while ($wp_query->have_posts()) : $wp_query->the_post();  ?>
								<div class="left_post_navasd">
	 						<?php get_template_part('content', 'entry');?>
								</div>
	 					<?php endwhile; ?>
	 				</div>


	 				<ul class="pager">
	 					<li class="next">
	 						<a href="<?php echo home_url(); ?>/page/<?php echo $paged+1;?>"  class="next_link">
	 							<span class="meta-nav">&larr;</span> Older posts</a>
	 						</li>
	 						<?php if ($paged > 0) :?>
	 							<li class="previous"><a href="<?php echo home_url(); ?>/page/<?php echo $paged-1;?>">Newer posts <span class="meta-nav">&rarr;</span></a></li>
	 						<?php endif;?>
	 					</ul>
	 				</div>
	 			</div><!--/end of post left column-->

	 			<?php
	 			    global $nav;
	 			    $nav = $wp_query;

	 			    $wp_query = null;
                    $wp_query = $temp;  // Reset
                    $post = $temp_post; // Restore the value of $post to the original
                ?>

                <div id="related_updates">
                    <div class="related_posts">

                        <!-- get related info for here -->
                        <?php if ( is_active_sidebar( 'sidebar-page' ) ) : ?>
                            <?php dynamic_sidebar( 'sidebar-page' ); ?>
                        <?php endif; ?>
                    </div>
                </div><!--/end of post right column-->
            </div><!--/row-->
        </div>

    <script type="text/javascript">

    // Call this function once the rest of the document is loaded

    function loadAddThis() {

        addthis.init()

    }

    jQuery(function ($) {

        loadAddThis();

        // Stuff to do as soon as the DOM is ready;

    });

    </script>