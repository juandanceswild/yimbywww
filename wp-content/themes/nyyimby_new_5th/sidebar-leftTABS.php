<?php
    $postsperpage = 20;
    if (!$paged) $paged = 1;
    if ( is_single() )
    {
        $current_post = $post->ID;
        $single = true;
    } else {
        $single = false;
    }
?>



<?php
	 $temp_post = $post; // Storing the object temporarily
	 $temp = $wp_query;
	 $wp_query = null;
	 $wp_query = new WP_Query();
	 $wp_query->query('showposts='.$postsperpage.'&post_type=post&post_status=publish'.'&paged='.$paged);

	 ?>
	 <?php $first_date = true;?>
	 <?php $first = true;?>

	 <div class="column left_col nano" id="sidebar-news">
        <div class="tab-content visible">

            <div class="tab-pane active" id="news">
	 			<?php include('main_tab.php');?>
	 		</div>

        </div>
    </div>


<?php
    global $nav;
    $nav = $wp_query;

    $wp_query = null;
    $wp_query = $temp;  // Reset
    $post = $temp_post; // Restore the value of $post to the original
?>
