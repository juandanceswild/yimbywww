<?php
  add_action('init', function() {

  $labels = array(
    'name' => _x('Photostreams', 'post type general name'),
    'singular_name' => _x('Photostream', 'post type singular name'),
    'add_new' => _x('Add New Photostream', 'Question'),
    'add_new_item' => __('Add New Photostream'),
    'edit_item' => __('Edit Photostream'),
    'new_item' => __('New Photostream'),
    'all_items' => __('All Photostreams'),
    'view_item' => __('View Photostreams'),
    'search_items' => __('Search Photostreams'),
    'not_found' => __('No Photostream found'),
    'not_found_in_trash' => __('No Photostream found in Trash'),
    'parent_item_colon' => '',
    'menu_name' => 'Photostream'
    );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title', 'editor', 'page-attributes', 'thumbnail'),
    'taxonomies' => array('category','post_tag')
    );
  register_post_type('Photostream', $args);
});



/**
 *  Install Add-ons
 *  
 *  The following code will include all 4 premium Add-Ons in your theme.
 *  Please do not attempt to include a file which does not exist. This will produce an error.
 *  
 *  The following code assumes you have a folder 'add-ons' inside your theme.
 *
 *  IMPORTANT
 *  Add-ons may be included in a premium theme/plugin as outlined in the terms and conditions.
 *  For more information, please read:
 *  - http://www.advancedcustomfields.com/terms-conditions/
 *  - http://www.advancedcustomfields.com/resources/getting-started/including-lite-mode-in-a-plugin-theme/
 */ 

// Add-ons 
// include_once('add-ons/acf-repeater/acf-repeater.php');
// include_once('add-ons/acf-gallery/acf-gallery.php');
// include_once('add-ons/acf-flexible-content/acf-flexible-content.php');
// include_once( 'add-ons/acf-options-page/acf-options-page.php' );


/**
 *  Register Field Groups
 *
 *  The register_field_group function accepts 1 array which holds the relevant data to register a field group
 *  You may edit the array as you see fit. However, this may result in errors if the array is not compatible with ACF
 */
/*
if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_photostream',
    'title' => 'Photostream',
    'fields' => array (
      array (
        'key' => 'field_52724c08cf331',
        'label' => 'Images',
        'name' => 'images',
        'type' => 'gallery',
        'preview_size' => 'thumbnail',
        'library' => 'all',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'photostream',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'normal',
      'layout' => 'default',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 0,
  ));
}
*/
