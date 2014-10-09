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
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <!-- Le fav and touch icons -->

    <link rel="shortcut icon" href="<?php bloginfo( 'template_url' );?>/favicon.ico">


    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php wp_head(); ?>

    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/fancybox.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/wp-content/themes/nyyimby_new_5th/style.css?r=<?php echo rand(1000,9999); ?>">

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
<?php if (strpos($_SERVER['HTTP_HOST'], 'webjuju')!==false) : ?>
  <div class="counts" style="position:absolute;top:5px;right:-5px;font-size:8px;"><div class="col-xs-1 menus-count"></div><div class="col-xs-1 posts-count"></div></div>
<?php endif; ?>
<?php include('ga.php');?>


<div class="summerville">
    <div class="header">
        <div class="row">

            <div class="col-sm-3 pull-left-xs pl-xs">
                <a href="<?php echo get_site_url();?>" class="brand"><img src="<?php bloginfo('template_directory'); ?>/img/yimby_logo.png"  /></a>
                <ul class="pull-left inline header_social_links hidden-tablet"  style="" >
                    <li><a href="https://www.facebook.com/NewYorkYimby" target=_blank><img src="<?php bloginfo('template_directory'); ?>/img/social_facebook.png" /></a></li>
                    <li><a href="https://twitter.com/newyorkyimby" target=_blank><img src="<?php bloginfo('template_directory'); ?>/img/social_twitter.png" /></a></li>
                    <li><a href="http://instagram.com/newyorkyimby" target=_blank><img src="<?php bloginfo('template_directory'); ?>/img/social_instagram.png" /></a></li>
                </ul>
            </div>

            <div class="col-sm-9">
              <div class="row">
                <div class="col-lg-8 pl-no">


<nav id="site-navigation" class="nav nav-pills<?php // this is the fix: navbar-fixed-top ?>" role="navigation">
  <div class="row" id="mobinav">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><?php bloginfo( 'name' ); ?></a>
    </div>
    <!--<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', '_s' ); ?></a>-->
    <div class="collapse navbar-collapse" id="main-navbar-collapse">

                  <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                            NEIGHBORHOOD
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu ul600">
                            <?php $count=0; foreach ($terms as $term): ?>
                                <?php if (!in_array($term->term_id, $exTerms)) : $count++;?>
                                    <li class="neighborhoods"><a href="<?php echo get_term_link($term->slug, 'neighborhoods');?>"><?php echo $term->name;?></a></li>
                                <?php endif;?>
                            <?php endforeach;?>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"> PROJECT TYPE <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu ul500">
                            <?php foreach ($type_terms as $term):?>
                                <li><a href="<?php echo get_term_link($term->slug, 'types');?>"><?php echo $term->name;?></a></li>
                            <?php endforeach;?>
                        </ul>
                    </li>
                    <li><a href="/all-building">ALL PROJECTS</a></li>
                    <li><a href="http://yimbyforums.com" target="_blank">FORUMS</a></li>
                    <li><a href="/search">ADVANCED SEARCH</a></li>
                  </ul>
    </div>
  </div>
</nav>

                </div>
                <div class="col-lg-4 visible-lg">
                  <div class="pl-xs-lg">
                    <?php get_search_form( ); ?>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>
