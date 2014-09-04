<?php
/**
 *
 * Default Page Header
 *
 * @package WP-Bootstrap
 * @subpackage Default_Theme
 * @since WP-Bootstrap 0.1
 *
 * Last Revised: August 15, 2012
 */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

    <title><?php
        /*
         * Print the <title> tag based on what is being viewed.
         */
        global $page, $paged;

        wp_title( '|', true, 'right' );

        // Add the blog name.
        bloginfo( 'name' );

        // Add the blog description for the home/front page.
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) )
            echo " | $site_description";

        // Add a page number if necessary:
        if ( $paged >= 2 || $page >= 2 )
            echo ' | ' . sprintf( __( 'Page %s', 'bootstrapwp' ), max( $paged, $page ) );

        ?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <!-- Le fav and touch icons -->

    <link rel="shortcut icon" href="<?php bloginfo( 'template_url' );?>/favicon.ico">


    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/custom.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/fancybox.css" media="screen" />

    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53b1bb1e1b4b9a65&async=1"></script>

    <script type='text/javascript'>
        var googletag = googletag || {};
        googletag.cmd = googletag.cmd || [];
        (function() {
            var gads = document.createElement('script');
            gads.async = true;
            gads.type = 'text/javascript';
            var useSSL = 'https:' == document.location.protocol;
            gads.src = (useSSL ? 'https:' : 'http:') +
                '//www.googletagservices.com/tag/js/gpt.js';
            var node = document.getElementsByTagName('script')[0];
            node.parentNode.insertBefore(gads, node);
        })();
    </script>

    <script type='text/javascript'>
        googletag.cmd.push(function() {
            googletag.defineSlot('/57474046/Header', [300, 250], 'div-gpt-ad-1381693691410-0').addService(googletag.pubads());
            googletag.defineSlot('/57474046/Skyscraper', [300, 600], 'div-gpt-ad-1381693691410-1').addService(googletag.pubads());
            googletag.pubads().enableSingleRequest();
            googletag.enableServices();
        });

    </script>
</head>
<?php
$terms_to_exclude = get_terms('neighborhoods', 'parent=0&hide_empty=true');
$exTerms[] = 423;
foreach ($terms_to_exclude as $t)
{
    $exTerms[] = $t->term_id;
}
?>
<?php $terms = get_terms('neighborhoods', 'hide_empty=true');?>
<?php $type_terms = get_terms('types');?>
<?php $categories = get_categories( array('number'=>10));?>
<body <?php body_class(); ?>>
<?php include('ga.php');?>


        <div class="row-fluid header">

            <div class="span3 columns">
                <a href="<?php echo get_site_url();?>" class="brand"><img src="<?php bloginfo('template_directory'); ?>/img/yimby_logo.png"  /></a>
                <ul class="pull-left inline header_social_links hidden-tablet"  style="" >
                    <li><a href="https://www.facebook.com/NewYorkYimby" target=_blank><img src="<?php bloginfo('template_directory'); ?>/img/social_facebook.png" /></a></li>
                    <li><a href="https://twitter.com/newyorkyimby" target=_blank><img src="<?php bloginfo('template_directory'); ?>/img/social_twitter.png" /></a></li>
                    <li><a href="http://instagram.com/newyorkyimby" target=_blank><img src="<?php bloginfo('template_directory'); ?>/img/social_instagram.png" /></a></li>
                </ul>
            </div>

            <div class="span6">
              <ul class="nav main_menu_nav row-fluid">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                        NEIGHBORHOOD
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <?php $count=0; foreach ($terms as $term): ?>
                            <?php if (!in_array($term->term_id, $exTerms)) : $count++;?>
                                <li class="<?php if($count%2==0){echo "right-aligned";}else{echo "left-aligned";}?>"><a href="<?php echo get_term_link($term->slug, 'neighborhoods');?>"><?php echo $term->name;?></a></li>
                            <?php endif;?>
                        <?php endforeach;?>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                        PROJECT TYPE
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <?php foreach ($type_terms as $term):?>
                            <li><a href="<?php echo get_term_link($term->slug, 'types');?>"><?php echo $term->name;?></a></li>
                        <?php endforeach;?>
                    </ul>
                </li>
                <li class=""><a href="/all-building">ALL PROJECTS</a></li>
                <li class=""><a href="http://yimbyforums.com" target="_blank">FORUMS</a></li>
                <li class=""><a href="/search">ADVANCED SEARCH</a></li>
              </ul>
            </div>

            <div class="span3 hidden-tablet">
                <?php get_search_form( ); ?>
            </div>

        </div>
