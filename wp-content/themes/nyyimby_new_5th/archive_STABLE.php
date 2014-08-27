<?php
/**
 *
 * Description: Default Index template to display loop of blog posts
 *
 * @package WordPress
 * @subpackage WP-Bootstrap
 * @since WP-Bootstrap 0.1
 */
get_header(); ?>

<?php
$paged = (get_query_var('page')) ? get_query_var('page') : 1;
?>

<div class="main main-content" style="min-width:1002px;">
    <div class="box" style="min-width:1002px;">
        <div class="row-fluid">
            <?php get_sidebar('archive');?>

            <div id="right-col">
                <div class="post_content_area">
                    <?php get_template_part('content', 'post-archive');?>
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


</div>


    <script>

        jQuery(document).ready(function()
        {

            /** Archive page, unbind the continous stream */
            jQuery.ias().unbind();


            /**
             * AJAX load for the archive articles
             */

            $('div.media-body a').on('click', function (e) {
                e.preventDefault();

                var link = $(this).attr('href');
                loadAjaxContent(link);

                history.pushState(null, null, link);
                firstLoad = false;

                _gaq.push(['_trackPageview', link]);

            });

            function loadAjaxContent(href)
            {
                $('.post_content_area').scrollTop(0);
                $("#right-col").scrollTop(0);

                $.ajax({
                    url: "/wp-admin/admin-ajax.php",
                    type:'POST',
                    data: "action=wpa_post_load&href="+href,
                    success: function(html){
                        $('.post_content_area').html(html);  // This will be the div where our content will be loaded
                        loadDynamicContent();

                        $('.post_content_area').find('a.left_nav_link', html).each(function() {

                        });

                    }
                });
            }

        });

    </script>

<?php get_footer();?>