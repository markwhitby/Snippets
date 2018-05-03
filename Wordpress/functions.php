<?php 

// custom login screen styles 
function custom_login() { 
echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/css/login-custom.css" />'; 
} 
add_action('login_head', 'custom_login');



// ACF options page settings for use with global custom field group
if( function_exists('acf_add_options_page') ) {	
	acf_add_options_page(array(
		'page_title' 	=> 'Global Options',
		'menu_title'	=> 'Global Options',
		'menu_slug' 	=> 'theme-global-options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));	
}


//format phone number Input: 6151234567
function format_phone($phone) {
		return preg_replace('/(\d{3})(\d{3})(\d{4})/', '($1) $2-$3', $phone);
}


// allow svg in media uploader
function custom_mtypes( $m ){
    $m['svg'] = 'image/svg+xml';
    $m['svgz'] = 'image/svg+xml';
    return $m;
}
add_filter( 'upload_mimes', 'custom_mtypes' );



// return child menu items based on submenu argument passed to wp_nav_menu - AKA get nested submenu
add_filter('wp_nav_menu_objects', 'submenu_limit', 10, 2);
function submenu_limit( $items, $args ) {
    if ( empty($args->submenu) ) return $items;
    $parent_id = array_pop( wp_filter_object_list( $items, array( 'title' => $args->submenu ), 'and', 'ID' ) );
    $children  = submenu_get_children_ids( $parent_id, $items );
    foreach ( $items as $key => $item ) {
      if ( ! in_array( $item->ID, $children ) )
      unset($items[$key]);
    }
    return $items;
}
function submenu_get_children_ids( $id, $items ) {
  $ids = wp_filter_object_list( $items, array( 'menu_item_parent' => $id ), 'and', 'ID' );
  foreach ( $ids as $id ) {
    $ids = array_merge( $ids, submenu_get_children_ids( $id, $items ) );
  }
  return $ids;
}
/*
<?php //template code
  wp_nav_menu( 
    array(
    'menu' => 'main-nav',
    'submenu' => 'Who We Serve',
    'items_wrap' => '<ul>%3$s</ul>',
    'container' => '',
    'container_class' => ''
    )
  );
?>
 */