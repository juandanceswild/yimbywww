<?php
/**
 * Bootstrap functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 *
 * @package WordPress
 * @subpackage WP-Bootstrap
 * @since WP-Bootstrap 0.1
 *
 * Last Updated: September 9, 2012
 */

session_start();

// adding on-the-fly ads rotation page
add_action('template_redirect', 'display_ads');
function display_ads() {
    if (strpos($_SERVER['REQUEST_URI'], 'ad_rotate.php')!==false) {
        header('HTTP/1.0 200');
        require(TEMPLATEPATH.'/_ad_rotate.php');
        exit();
    }
}

// try to tap into the process of getting the posts so we know what is being queried!
// then use what is being queried to track in session vars what history has been shown
// then use the history shown to augment the prejax
// oh yeah, don't forget the anchor links
add_action('wp', 'store_user_stuff');
function store_user_stuff() {
    global $wp_query;

    @$_SESSION['loads']++;

    //error_log('this user has loaded their session '.$_SESSION['loads'].' times', 3, '/home/webjuju/nyyimby/error_log');
    // leave that debuggin line...this will be amazing if it works and hell if it doesn't

    foreach ($wp_query->posts as $p) {
      if (empty($_SESSION['posts_seen'][strtotime($p->post_date)])) {
        $_SESSION['posts_seen'][strtotime($p->post_date)] = $p;
      }
    }
    if (!empty($_SESSION['posts_seen'][strtotime($p->post_date)])) {
      krsort($_SESSION['posts_seen']);
    }
}

function get_sus($key,$value,$parent='') {
//    $wp = get_sus($wp->request);
//    set_sus($wp->request, $wp);
}
function set_sus($key,$value,$parent='') {
}

 /**
 * Declaring the content width based on the theme's design and stylesheet.
 */
 if ( ! isset( $content_width ) )
  $content_width = 770; /* pixels */

/*
| -------------------------------------------------------------------
| Setup Theme
| -------------------------------------------------------------------
|
| */
add_action( 'after_setup_theme', 'bootstrapwp_theme_setup' );
if ( ! function_exists( 'bootstrapwp_theme_setup' ) ):
  function bootstrapwp_theme_setup() {
    add_theme_support( 'automatic-feed-links' );
  /**
   * Adds custom menu with wp_page_menu fallback
   */
  register_nav_menus( array(
    'main-menu' => __( 'Main Menu', 'bootstrapwp' ),
    ) );
  add_theme_support( 'post-formats', array( 'aside', 'image', 'gallery', 'link', 'quote', 'status', 'video', 'audio', 'chat' ) );
  /**
   * Declaring the theme language domain
   */
  load_theme_textdomain('bootstrapwp', get_template_directory() . '/lang');
}
endif;





################################################################################
// Loading All CSS Stylesheets
################################################################################
function bootstrapwp_css_loader() {
   // wp_enqueue_style('bootstrapwp', get_template_directory_uri().'/css/bootstrapwp.css', false ,'0.90', 'all' );
  //wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.css', false ,'0.90', 'all' );
  //wp_enqueue_style('bootstrapwp-default', get_stylesheet_uri());
  //wp_enqueue_style('bootstrap-resposnive', get_template_directory_uri().'/css/bootstrap-responsive.css', false ,'1.0', 'all' );

  //wp_enqueue_style('prettify', get_template_directory_uri().'/js/google-code-prettify/prettify.css', false ,'1.0', 'all' );
  //wp_enqueue_style('nanoscroll', get_template_directory_uri().'/css/nanoscroller.css', false ,'1.0', 'all' );

}
add_action('wp_enqueue_scripts', 'bootstrapwp_css_loader');


################################################################################
// Loading all JS Script Files.  Remove any files you are not using!
################################################################################
function bootstrapwp_js_loader() {
// wp_enqueue_script('bootstrapjs', get_template_directory_uri().'/js/bootstrap.js', array('jquery'),'0.90', true );
// wp_enqueue_script('hover-dropdown', get_template_directory_uri().'/js/twitter-bootstrap-hover-dropdown.js', array('jquery'),'0.90', true );
// wp_enqueue_script('nanoscroll', get_template_directory_uri().'/js/jquery.nanoscroller.js', array('jquery'),'0.90', true );
// wp_enqueue_script('ininitescroll', get_template_directory_uri().'/js/jquery.infinitescroll.js', array('jquery'),'0.90', true );
// wp_enqueue_script('main', get_template_directory_uri().'/js/main.js', array('jquery'),'0.92', true );

}
add_action('wp_enqueue_scripts', 'bootstrapwp_js_loader');


/*
| -------------------------------------------------------------------
| Top Navigation Bar Customization
| -------------------------------------------------------------------

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function bootstrapwp_page_menu_args( $args ) {
  $args['show_home'] = true;
  return $args;
}
add_filter( 'wp_page_menu_args', 'bootstrapwp_page_menu_args' );

/**
 * Get file 'includes/class-bootstrap_walker_nav_menu.php' with Custom Walker class methods
 * */

include 'includes/class-bootstrapwp_walker_nav_menu.php';

/*
| -------------------------------------------------------------------
| Registering Widget Sections
| -------------------------------------------------------------------
| */
function bootstrapwp_widgets_init() {
  register_sidebar( array(
    'name' => 'Page Sidebar',
    'id' => 'sidebar-page',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
    ) );

  register_sidebar( array(
    'name' => 'Posts Sidebar',
    'id' => 'sidebar-posts',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
    ) );

  register_sidebar(array(
    'name' => 'Home Left',
    'id'   => 'home-left',
    'description'   => 'Left textbox on homepage',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>'
    ));

  register_sidebar(array(
    'name' => 'Home Middle',
    'id'   => 'home-middle',
    'description'   => 'Middle textbox on homepage',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>'
    ));

  register_sidebar(array(
    'name' => 'Home Right',
    'id'   => 'home-right',
    'description'   => 'Right textbox on homepage',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>'
    ));

  register_sidebar(array(
    'name' => 'Footer Content',
    'id'   => 'footer-content',
    'description'   => 'Footer text or acknowledgements',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>'
    ));
}
add_action( 'init', 'bootstrapwp_widgets_init' );


/*
| -------------------------------------------------------------------
| Adding Post Thumbnails and Image Sizes
| -------------------------------------------------------------------
| */
if ( function_exists( 'add_theme_support' ) ) {
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 160, 120 ); // 160 pixels wide by 120 pixels high
}

if ( function_exists( 'add_image_size' ) ) {
  add_image_size( 'bootstrap-small', 260, 180 ); // 260 pixels wide by 180 pixels high
  add_image_size( 'bootstrap-medium', 360, 268 ); // 360 pixels wide by 268 pixels high
}
/*
| -------------------------------------------------------------------
| Revising Default Excerpt
| -------------------------------------------------------------------
| Adding filter to post excerpts to contain ...Continue Reading link
| */
function bootstrapwp_excerpt($more) {
 global $post;
 return '&nbsp; &nbsp;<a href="'. get_permalink($post->ID) . '">...Continue Reading</a>';
}
add_filter('excerpt_more', 'bootstrapwp_excerpt');



if ( ! function_exists( 'bootstrapwp_content_nav' ) ):
/**
 * Display navigation to next/previous pages when applicable
 */
function bootstrapwp_content_nav( $nav_id ) {
	global $wp_query;

	?>

	<?php if ( is_single() ) : // navigation links for single posts ?>
  <ul class="pager">
    <?php previous_post_link( '<li class="previous">%link</li>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'bootstrapwp' ) . '</span> %title' ); ?>
    <?php next_post_link( '<li class="next">%link</li>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'bootstrapwp' ) . '</span>' ); ?>
  </ul>
<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>
  <ul class="pager">
    <?php if ( get_next_posts_link() ) : ?>
    <li class="next"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'bootstrapwp' ) ); ?></li>
  <?php endif; ?>

  <?php if ( get_previous_posts_link() ) : ?>
  <li class="previous"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'bootstrapwp' ) ); ?></li>
<?php endif; ?>
</ul>
<?php endif; ?>

<?php
}
endif; // bootstrapwp_content_nav


if ( ! function_exists( 'bootstrapwp_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own bootstrap_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since WP-Bootstrap .5
 */
function bootstrapwp_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
  case 'pingback' :
  case 'trackback' :
  ?>
  <li class="post pingback">
    <p><?php _e( 'Pingback:', 'bootstrap' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'bootstrap' ), ' ' ); ?></p>
    <?php
    break;
    default :
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
      <article id="comment-<?php comment_ID(); ?>" class="comment">
       <footer>
        <div class="comment-author vcard">
         <?php echo get_avatar( $comment, 40 ); ?>
         <?php printf( __( '%s <span class="says">says:</span>', 'bootstrap' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
       </div><!-- .comment-author .vcard -->
       <?php if ( $comment->comment_approved == '0' ) : ?>
       <em><?php _e( 'Your comment is awaiting moderation.', 'bootstrap' ); ?></em>
       <br />
     <?php endif; ?>

     <div class="comment-meta commentmetadata">
       <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time pubdate datetime="<?php comment_time( 'c' ); ?>">
         <?php
         /* translators: 1: date, 2: time */
         printf( __( '%1$s at %2$s', 'bootstrap' ), get_comment_date(), get_comment_time() ); ?>
       </time></a>
       <?php edit_comment_link( __( '(Edit)', 'bootstrap' ), ' ' );
       ?>
     </div><!-- .comment-meta .commentmetadata -->
   </footer>

   <div class="comment-content"><?php comment_text(); ?></div>

   <div class="reply">
    <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
  </div><!-- .reply -->
</article><!-- #comment-## -->

<?php
break;
endswitch;
}
endif; // ends check for bootstrapwp_comment()

if ( ! function_exists( 'bootstrapwp_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 * Create your own bootstrap_posted_on to override in a child theme
 *
 * @since WP-Bootstrap .5
 */
function bootstrapwp_posted_on() {
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="byline"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'bootstrap' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'bootstrap' ), get_the_author() ) ),
		esc_html( get_the_author() )
   );
}
endif;

/**
 * Adds custom classes to the array of body classes.
 *
 * @since WP-Bootstrap .5
 */
function bootstrapwp_body_classes( $classes ) {
	// Adds a class of single-author to blogs with only 1 published author
	if ( ! is_multi_author() ) {
		$classes[] = 'single-author';
	}

	return $classes;
}
add_filter( 'body_class', 'bootstrapwp_body_classes' );

/**
 * Returns true if a blog has more than 1 category
 *
 * @since WP-Bootstrap .5
 */
function bootstrapwp_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
      ) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so bootstrap_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so bootstrap_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in bootstrapwp_categorized_blog
 *
 * @since bootstrap 1.2
 */
function bootstrapwp_category_transient_flusher() {
  // Like, beat it. Dig?
  delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'bootstrapwp_category_transient_flusher' );
add_action( 'save_post', 'bootstrapwp_category_transient_flusher' );

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 */
function bootstrapwp_enhanced_image_navigation( $url ) {
	global $post;

	if ( wp_attachment_is_image( $post->ID ) )
		$url = $url . '#main';

	return $url;
}
add_filter( 'attachment_link', 'bootstrapwp_enhanced_image_navigation' );


/*
| -------------------------------------------------------------------
| Checking for Post Thumbnail
| -------------------------------------------------------------------
|
| */
function bootstrapwp_post_thumbnail_check() {
  global $post;
  if (get_the_post_thumbnail()) {
    return true; }
    else { return false; }
  }

/*
| -------------------------------------------------------------------
| Setting Featured Image (Post Thumbnail)
| -------------------------------------------------------------------
| Will automatically add the first image attached to a post as the Featured Image if post does not have a featured image previously set.
| */
function bootstrapwp_autoset_featured_img() {

  $post_thumbnail = bootstrapwp_post_thumbnail_check();
  if ($post_thumbnail == true ){
    return the_post_thumbnail();
  }
  if ($post_thumbnail == false ){
    $image_args = array(
      'post_type' => 'attachment',
      'numberposts' => 1,
      'post_mime_type' => 'image',
      'post_parent' => $post->ID,
      'order' => 'desc'
      );
    $attached_image = get_children( $image_args );
    if ($attached_image) {
      foreach ($attached_image as $attachment_id => $attachment) {
        set_post_thumbnail($post->ID, $attachment_id);
      }
      return the_post_thumbnail();
    } else { return " ";}
  }
      }  //end function


/*
| -------------------------------------------------------------------
| Adding Breadcrumbs
| -------------------------------------------------------------------
|
| */
function bootstrapwp_breadcrumbs() {

  $delimiter = '<span class="divider">/</span>';
  $home = 'Home'; // text for the 'Home' link
  $before = '<li class="active">'; // tag before the current crumb
  $after = '</li>'; // tag after the current crumb

  if ( !is_home() && !is_front_page() || is_paged() ) {

    echo '<ul class="breadcrumb">';

    global $post;
    $homeLink = home_url();
    echo '<li><a href="' . $homeLink . '">' . $home . '</a></li> ' . $delimiter . ' ';

    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;

    } elseif ( is_day() ) {
      echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
      echo '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a></li> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;

    } elseif ( is_month() ) {
      echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;

    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;

    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo $before . get_the_title() . $after;
      }

    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;

    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<li><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li> ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;

    } elseif ( is_page() && !$post->post_parent ) {
      echo $before . get_the_title() . $after;

    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;

    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;

    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;

    } elseif ( is_author() ) {
     global $author;
     $userdata = get_userdata($author);
     echo $before . 'Articles posted by ' . $userdata->display_name . $after;

   } elseif ( is_404() ) {
    echo $before . 'Error 404' . $after;
  }

  if ( get_query_var('paged') ) {
    if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page', 'bootstrapwp') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
}

echo '</ul>';

}
} // end bootstrapwp_breadcrumbs()




if ( function_exists( 'add_image_size' ) ) {
  add_image_size( 'square_thumb', 76, 76, TRUE); // 76x76 sqaure thumb
}

add_filter('show_admin_bar', '__return_false');

if (class_exists('MultiPostThumbnails')) {
  new MultiPostThumbnails(
    array(
      'label' => 'Second Image',
      'id' => 'second-image',
      'post_type' => 'post'
      )
    );
}

if (class_exists('MultiPostThumbnails')) {
  new MultiPostThumbnails(
    array(
      'label' => 'Third Image',
      'id' => 'third-image',
      'post_type' => 'post'
      )
    );
}

if (class_exists('MultiPostThumbnails')) {
  new MultiPostThumbnails(
    array(
      'label' => 'Fourth Image',
      'id' => 'fourth-image',
      'post_type' => 'post'
      )
    );
}

if (class_exists('MultiPostThumbnails')) {
  new MultiPostThumbnails(
    array(
      'label' => 'Fifth Image',
      'id' => 'fifth-image',
      'post_type' => 'post'
      )
    );
}

if (class_exists('MultiPostThumbnails')) {
  new MultiPostThumbnails(
    array(
      'label' => 'Sixth Image',
      'id' => 'sixth-image',
      'post_type' => 'post'
      )
    );
}
function load_fonts() {
  wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic|PT+Serif:400,700,400italic,700italic');
  wp_enqueue_style( 'googleFonts');
}

add_action('wp_print_styles', 'load_fonts');


function disqus_embed($disqus_shortname) {
  global $post;
  echo '<div id="disqus_thread"></div>
  <script type="text/javascript">
  var disqus_shortname = "'.$disqus_shortname.'";
  var disqus_title = "'.$post->post_title.'";
  var disqus_url = "'.get_permalink($post->ID).'";
  var disqus_identifier = "'.$disqus_shortname.'-'.$post->ID.'";
  </script>';
  wp_enqueue_script('disqus_embed','http://newyorkyimby.disqus.com/embed.js',array('jquery'),'0.90' );
  

}


add_action('admin_init', 'primecat_init');

function primecat_init() {
 add_meta_box("category-meta", "Primary Category", "primaryCategory", "post", "side", "low");
 add_meta_box("category-meta", "Primary Category", "primaryCategory", "photostream", "side", "low");
 add_meta_box("category-meta", "Primary Category", "primaryCategory", "view", "side", "low");
}

function primaryCategory() {
 global $post;
 
 $catKey = "primary_cat";
 $catSlug = get_post_meta($post->ID, $catKey, true);
 
 $catTerms = get_term_by('slug', $catSlug, 'category');
 $categoryID = $catTerms->term_id;
 
 ?>
 <label>Category:</label>
 <?php wp_dropdown_categories('show_option_none=Select category&name=primary_cat&hide_empty=0&selected=' . $categoryID);
}

add_action('save_post', 'save_cat_details');

function save_cat_details($post_id) {
 global $post;
 
 $catID = $_POST["primary_cat"];
 
 if(isset($_POST["primary_cat"]) && $catID != "") {
  $catTerms = get_term_by('term_id', $catID, 'category');
  
  $catName = $catTerms->slug;
  
  update_post_meta($post->ID, "primary_cat", $catName);
}
}


function ajax_post_load() {
   global $post;
 $url = $_POST['href'];
 $post_type = 'post';
 if (strpos($url, 'photostream'))
 {
  $post_type = 'photostream';
 } elseif (strpos($url, '/'.'view'.'/'))
 {
  $post_type = 'view';
 }

 $postID = bwp_url_to_postid($url);
 $args = array(
  'p'  => $postID,
  'posts_per_page' => 1,
  'post_type' => $post_type
  );
$current_post = query_posts( $args );
  // Load the posts
 get_template_part( 'content', 'ajax' );
 exit;
}
add_action( 'wp_ajax_wpa_post_load', 'ajax_post_load' );

add_action( 'wp_ajax_nopriv_wpa_post_load', 'ajax_post_load' );



function get_multiple_thumbnail_caption($post_id) {
  if ($post_id > 0 && $post_id != null) {
    $page = get_page($post_id);
    $caption = $page->post_excerpt;
    if ($caption != null) {
      return $caption;
    }
  }
  
  return false;
}

// create the "Series" taxonomy for posts only
function init_neighborhoods() {
  $labels = array(
    'name' => _x('Neighborhoods', 'taxonomy general name'),
    'singular_name' => _x('Neighborhood', 'taxonomy singular name'),
    'all_items' => __('All Neighborhoods'),
    'edit_item' => __('Edit Neighborhood'),
    'update_item' => __('Update Neighborhood'),
    'add_new_item' => __('Add New Neighborhood'),
    'new_item_name' => __('New Neighborhood'),
    'menu_name' => __('Neighborhoods')
  );

  register_taxonomy(
    'neighborhoods',
    array('post'), /* if you want to use pages or custom post types, simply extend the array like array('post','page','custom-post-type') */
    array(
      'hierarchical' => true, /* if set to "true", you can use Series as categories; if set to "false", you can use them as tags! */
      'labels' => $labels,
      'show_ui' => true,
      'query_var' => true,
      'rewrite' => array('slug' => 'neighborhoods'), /* you may need to flush the rewrite rules at Options -> Permalinks (just update the existing preferences without any change) */
    )
  );
}
add_action('init', 'init_neighborhoods', 0);



// create the "Series" taxonomy for posts only
function init_building_type() {
  $labels = array(
    'name' => _x('Type', 'taxonomy general name'),
    'singular_name' => _x('Type', 'taxonomy singular name'),
    'all_items' => __('All Type'),
    'edit_item' => __('Edit Type'),
    'update_item' => __('Update Type'),
    'add_new_item' => __('Add New Type'),
    'new_item_name' => __('New Type'),
    'menu_name' => __('Type')
  );

  register_taxonomy(
    'types',
    array('post'), /* if you want to use pages or custom post types, simply extend the array like array('post','page','custom-post-type') */
    array(
      'hierarchical' => true, /* if set to "true", you can use Series as categories; if set to "false", you can use them as tags! */
      'labels' => $labels,
      'show_ui' => true,
      'query_var' => true,
      'rewrite' => array('slug' => 'type'), /* you may need to flush the rewrite rules at Options -> Permalinks (just update the existing preferences without any change) */
    )
  );
}
add_action('init', 'init_building_type', 0);



/* Post URLs to IDs function, supports custom post types - borrowed and modified from url_to_postid() in wp-includes/rewrite.php */
function bwp_url_to_postid($url)
{
  global $wp_rewrite;

  $url = apply_filters('url_to_postid', $url);

  // First, check to see if there is a 'p=N' or 'page_id=N' to match against
  if ( preg_match('#[?&](p|page_id|attachment_id)=(\d+)#', $url, $values) ) {
    $id = absint($values[2]);
    if ( $id )
      return $id;
  }

  // Check to see if we are using rewrite rules
  $rewrite = $wp_rewrite->wp_rewrite_rules();

  // Not using rewrite rules, and 'p=N' and 'page_id=N' methods failed, so we're out of options
  if ( empty($rewrite) )
    return 0;

  // Get rid of the #anchor
  $url_split = explode('#', $url);
  $url = $url_split[0];

  // Get rid of URL ?query=string
  $url_split = explode('?', $url);
  $url = $url_split[0];

  // Add 'www.' if it is absent and should be there
  if ( false !== strpos(home_url(), '://www.') && false === strpos($url, '://www.') )
    $url = str_replace('://', '://www.', $url);

  // Strip 'www.' if it is present and shouldn't be
  if ( false === strpos(home_url(), '://www.') )
    $url = str_replace('://www.', '://', $url);

  // Strip 'index.php/' if we're not using path info permalinks
  if ( !$wp_rewrite->using_index_permalinks() )
    $url = str_replace('index.php/', '', $url);

  if ( false !== strpos($url, home_url()) ) {
    // Chop off http://domain.com
    $url = str_replace(home_url(), '', $url);
  } else {
    // Chop off /path/to/blog
    $home_path = parse_url(home_url());
    $home_path = isset( $home_path['path'] ) ? $home_path['path'] : '' ;
    $url = str_replace($home_path, '', $url);
  }

  // Trim leading and lagging slashes
  $url = trim($url, '/');

  $request = $url;
  // Look for matches.
  $request_match = $request;
  foreach ( (array)$rewrite as $match => $query) {
    // If the requesting file is the anchor of the match, prepend it
    // to the path info.
    if ( !empty($url) && ($url != $request) && (strpos($match, $url) === 0) )
      $request_match = $url . '/' . $request;

    if ( preg_match("!^$match!", $request_match, $matches) ) {
      // Got a match.
      // Trim the query of everything up to the '?'.
      $query = preg_replace("!^.+\?!", '', $query);

      // Substitute the substring matches into the query.
      $query = addslashes(WP_MatchesMapRegex::apply($query, $matches));

      // Filter out non-public query vars
      global $wp;
      parse_str($query, $query_vars);
      $query = array();
      foreach ( (array) $query_vars as $key => $value ) {
        if ( in_array($key, $wp->public_query_vars) )
          $query[$key] = $value;
      }

    // Taken from class-wp.php
    foreach ( $GLOBALS['wp_post_types'] as $post_type => $t )
      if ( $t->query_var )
        $post_type_query_vars[$t->query_var] = $post_type;

    foreach ( $wp->public_query_vars as $wpvar ) {
      if ( isset( $wp->extra_query_vars[$wpvar] ) )
        $query[$wpvar] = $wp->extra_query_vars[$wpvar];
      elseif ( isset( $_POST[$wpvar] ) )
        $query[$wpvar] = $_POST[$wpvar];
      elseif ( isset( $_GET[$wpvar] ) )
        $query[$wpvar] = $_GET[$wpvar];
      elseif ( isset( $query_vars[$wpvar] ) )
        $query[$wpvar] = $query_vars[$wpvar];

      if ( !empty( $query[$wpvar] ) ) {
        if ( ! is_array( $query[$wpvar] ) ) {
          $query[$wpvar] = (string) $query[$wpvar];
        } else {
          foreach ( $query[$wpvar] as $vkey => $v ) {
            if ( !is_object( $v ) ) {
              $query[$wpvar][$vkey] = (string) $v;
            }
          }
        }

        if ( isset($post_type_query_vars[$wpvar] ) ) {
          $query['post_type'] = $post_type_query_vars[$wpvar];
          $query['name'] = $query[$wpvar];
        }
      }
    }

      // Do the query
      $query = new WP_Query($query);
      if ( !empty($query->posts) && $query->is_singular )
        return $query->post->ID;
      else
        return 0;
    }
  }
  return 0;
}

if ( !wp_is_mobile() ) {
  add_action( 'template_redirect', 'redirect' );
}
function redirect() {
        if ( is_home() && ! is_paged() ) :
                wp_redirect( get_permalink() , 301 );
                exit;
        endif;
}

include('includes/custom_post_types.php');
include('includes/custom_post_type_view.php');
/*

 */
/**
 * This theme was built with PHP, Semantic HTML, CSS, love, and a bootstrap.
 */

add_filter('the_content', 'remove_empty_p', 20, 1);
function remove_empty_p($content){
    $content = force_balance_tags($content);
    return preg_replace('#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content);
}

function modify_jquery() {
    if (!is_admin()) {
        // comment out the next two lines to load the local copy of jQuery
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js', false, '2.0.3');
        wp_enqueue_script('jquery');
    }
}
add_action('init', 'modify_jquery');


add_action( 'wp_ajax_nopriv_load-filter2', 'prefix_load_term_posts' );
add_action( 'wp_ajax_load-filter2', 'prefix_load_term_posts' );
function prefix_load_term_posts () {
    $term_id = $_POST[ 'term' ];
    $args = array (
        'term' => $term_id,
        'posts_per_page' => -1,
        'order' => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => 'types',
                'field'    => 'slug',
                'terms'    => $term_id,
                'operator' => 'IN'
            )
        )
    );

    global $post;
    $myposts = get_posts( $args );
    ob_start (); ?>

    <?php foreach( $myposts as $post ) : setup_postdata($post); ?>
        <?php echo get_post_meta($post->ID, 'image', $single = true); ?>
        <?php the_title(); ?></li>
        <br/>
        <br/>
    <?php endforeach; ?>

    <?php wp_reset_postdata();
    $response = ob_get_contents();
    ob_end_clean();
    echo $response;
    die(1);
}

function get_args($postsperpage=22) {
    // TODO find a way to properly scope the paging vars
    global $wp_query, $post, $menu_paged, $page_paged;

    $debug = 1;

    $args = array();

    if (!empty($_GET['args'])) {

        // we know this to be an ajax call...all ajax calls send existing wpdb args
        $args = unserialize(base64_decode(@$_GET['args']));

        // what we don't know yet is if this call is for menus or pages
        preg_match('!/pager-menu/([0-9]*)[?]?!', $_SERVER['REQUEST_URI'], $m1);
        $menu_paged = (integer) @$m1[1];

        preg_match('!/pager-page/([0-9]*)[?]?!', $_SERVER['REQUEST_URI'], $m2);
        $page_paged = (integer) @$m2[1];

        $paged_item = ($menu_paged > $page_paged) ? 'menu_paged': 'page_paged';
        $postsperpage = ($paged_item=='menu_paged') ? 22 : 1;

        // now we know, but only need to know what page we're on
        $args['paged'] = ${$paged_item}+1;

    } else {

        $qo = get_queried_object();
        if (!empty($qo->post_date)) {

            $d = strtotime($qo->post_date)+86400;
            $args['date_query'] = array(
                array(
                    'before'    => array(
                        'year'  => date('Y', $d),
                        'month' => date('m', $d),
                        'day'   => date('d', $d),
                    ),
                    'inclusive' => true,
                ),
            );
        }
        if (!empty($qo->taxonomy)) {
            $args[$qo->taxonomy] = $qo->slug;
            $args['taxonomy_name'] = $qo->name;
        }
    }

    if (empty($menu_paged)) $menu_paged = 1;
    if (empty($page_paged)) $page_paged = 1;

    $a2 = array('post_type' => 'post', 'showposts' => $postsperpage);
    $args = array_merge($args, $a2);

    $temp_post = $post;
    $temp = $wp_query;
    $wp_query = null;
    $wp_query = new WP_Query($args);

    $wp_query->query($args);
    if ($debug) error_log("\n".'get_args found '.count($wp_query->posts).' posts for '.print_r($args,1)."\n", 3, '/home/webjuju/nyyimby/error_log');

    $post = $wp_query->posts[0];
    setup_postdata($post);

    return $args;    
}

function get_args_old($paged) {
    global $wp_query, $post;

    $debug = false;
    if ($debug) error_log("\n".'GET ARGS -> START'."\n", 3, '/home/webjuju/nyyimby/error_log');

    // the args for the query should vary
    $args = false;

    if ($paged===1) :
        if ($debug) error_log('UNSET WPDB ARGS!'."\n", 3, '/home/webjuju/nyyimby/error_log');
        unset($_SESSION['wpdb_args']);
    endif;

    // the session is for direct movement, the get args is for indirect movement
    if (!empty($_GET['args'])) {
        $_SESSION['wpdb_args'] = unserialize(base64_decode(@$_GET['args']));
    }

    if (empty($_SESSION['wpdb_args'])) {
        $queried_object = get_queried_object();
            // here we only need one post but the menu needs more
            $d = strtotime($queried_object->post_date)+86400;
        if ($debug) error_log('qo: '.print_r($queried_object, 1), 3, '/home/webjuju/nyyimby/error_log');
        $_SESSION['wpdb_args']['cat'] = @$queried_object->query['category_name'];
        $_SESSION['wpdb_args']['taxonomy'] = @$queried_object->taxonomy;
        $_SESSION['wpdb_args']['slug'] = @$queried_object->slug;
        $_SESSION['wpdb_args']['name'] = @$queried_object->name;
    }
    extract($_SESSION['wpdb_args'], EXTR_REFS);
    if ($debug) error_log('wpdb extracted...taxo: '.print_r($taxonomy, 1)."\n", 3, '/home/webjuju/nyyimby/error_log');

    $args = array();

    switch(true) {
        case (!empty($cat)):
            echo '<h2 class="archive-title category">'.ucwords($cat).'</h2>';
            if ($debug) error_log('!empty($cat): '.print_r($cat, 1), 3, '/home/webjuju/nyyimby/error_log');
            $args = array('category_name'=>$cat);
            $new_args = $args;
        break;
        case (!empty($taxonomy)):
            echo '<h2 class="archive-title">'.ucwords($name).'</h2>';
            if ($debug) error_log('!empty($taxonomy)/slug: '.$taxonomy.'/'.$slug."\n", 3, '/home/webjuju/nyyimby/error_log');
            $args = array(
                'taxonomy'=>$taxonomy,
                'term'=>$slug,
            ); 
            $new_args = $args;
        break;
        case (!empty($queried_object->ID)):
            if ($debug) error_log('!empty($qo->ID): '.$taxonomy.'/'.$slug."\n", 3, '/home/webjuju/nyyimby/error_log');
            // here we only need one post but the menu needs more
            $d = strtotime($queried_object->post_date)+86400;
            $args = array(
                'date_query' => array(
                    array(
                        'before'    => array(
                            'year'  => date('Y', $d),
                            'month' => date('m', $d),
                            'day'   => date('d', $d),
                        ),
                        'inclusive' => true,
                    ),
                ),
            );
            $new_args = $args;
            //echo '<h2 class="archive-title">'.$term_name.'</h2>';
        break;
        default:
            if ($debug) error_log('switch default'."\n", 3, '/home/webjuju/nyyimby/error_log');
    }
    // merge it in with the defaults
    $default = array('post_type' => 'post', 'showposts' => $postsperpage);
    $args = array_merge($new_args, $default);
    $args['paged'] = $paged;
    $args['pagedr2'] = $paged;
    if ($debug) error_log('FINAL GET ARGS: '.print_r($args, 1), 3, '/home/webjuju/nyyimby/error_log');

    return $args;
}
