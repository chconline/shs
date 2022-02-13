<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

        
if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css' );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css' );

// END ENQUEUE PARENT ACTION

// Adding layout/setting generator needed for the DEI Builder Template.
require get_stylesheet_directory() . '/inc/generate-settings.php';

// Content Block Custom Post Type
function content_block_cpt() {

	/**
	 * Post Type: Content Blocks.
	 */

	$labels = [
		"name" => __( "Content Blocks", "gpc" ),
		"singular_name" => __( "Content Block", "gpc" ),
		"menu_name" => __( "Content Blocks", "gpc" ),
		"all_items" => __( "All Content Blocks", "gpc" ),
		"add_new" => __( "Add New", "gpc" ),
		"add_new_item" => __( "Add New Content Block", "gpc" ),
		"edit_item" => __( "Edit Content Block", "gpc" ),
		"new_item" => __( "New Content Block", "gpc" ),
		"view_item" => __( "View Content Block", "gpc" ),
		"view_items" => __( "View Content Blocks", "gpc" ),
		"search_items" => __( "Search Content Blocks", "gpc" ),
		"not_found" => __( "No Content Blocks found", "gpc" ),
		"not_found_in_trash" => __( "No Content Blocks found in trash", "gpc" ),
		"parent" => __( "Parent Content Block", "gpc" ),
		"featured_image" => __( "Featured image", "gpc" ),
		"set_featured_image" => __( "Set featured image", "gpc" ),
		"remove_featured_image" => __( "Remove featured image", "gpc" ),
		"use_featured_image" => __( "Use as featured image", "gpc" ),
		"archives" => __( "Content Block Archives", "gpc" ),
		"insert_into_item" => __( "Insert into Content Block", "gpc" ),
		"uploaded_to_this_item" => __( "Uploaded to this Content Block", "gpc" ),
		"filter_items_list" => __( "Filter Content Blocks List", "gpc" ),
		"items_list_navigation" => __( "Content Blocks List Navigation", "gpc" ),
		"items_list" => __( "Content Blocks List", "gpc" ),
		"attributes" => __( "Content Blocks Attributes", "gpc" ),
		"name_admin_bar" => __( "Content Block", "gpc" ),
		"item_published" => __( "Content Block published", "gpc" ),
		"item_published_privately" => __( "Content Block published privately", "gpc" ),
		"item_reverted_to_draft" => __( "Content Block reverted to draft", "gpc" ),
		"item_scheduled" => __( "Content Block scheduled", "gpc" ),
		"item_updated" => __( "Content Block updated", "gpc" ),
		"parent_item_colon" => __( "Parent Content Block", "gpc" ),
	];

	$args = [
		"label" => __( "Content Blocks", "gpc" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "content-block", "with_front" => false ],
		"query_var" => true,
		"menu_position" => 54.9,
		"menu_icon" => "dashicons-networking",
		"supports" => [ "title", "custom-fields", "revisions", "editor" ],
		"taxonomies" => [ "block-type" ],
	];

	register_post_type( "content-block", $args );
}

add_action( 'init', 'content_block_cpt', 0 );


function print_subnav($parent_id) {
    $pages = get_pages('child_of=' . $parent_id.'&sort_column=menu_order');

	    if(!empty($pages)) {
			foreach($pages as $page) {
			    if($page->post_parent==$parent_id) {
				$before = '<h2>';
				$after = '</h2>';
				echo '<li class="menuChild currentLink' . $page->ID . '"><a href="' . get_page_link($page->ID) . '">' . $page->post_title . '</a></li>';
		
				$grandchildren = get_pages('child_of=' . $page->ID);
				foreach($grandchildren as $grandchild) {
				    echo '<li class="grandChild currentLink' . $page->ID . '"><a href="' . get_page_link($page->ID) . '#' . $grandchild->post_name . '">' . $grandchild->post_title . '</a></h2></li>';
			}
		}
	}
	
    }
}

function print_subnav2($parent_id) {
    $pages = get_pages('child_of=' . $parent_id.'&sort_column=menu_order');
	    if(!empty($pages)) {
			foreach($pages as $page) {
			    if($page->post_parent==$parent_id) {
			$grandchildren = get_pages('child_of=' . $page->ID.'&sort_column=menu_order');
	        $grandCount = 0;
	        $grandThere = "False";
	        foreach($grandchildren as $grandchild) {
	            $grandArray[$grandCount] = '<li class="grandChild currentLinkGrand' . $grandchild->ID . ' currentLinkG' . $page->ID . '"><a href="' . get_page_link($page->ID) . '/' . $grandchild->post_name . '">' . $grandchild->post_title . '</a></h2></li>';
	            $grandCount = $grandCount + 1; 
	            $grandThere = "True";
	        }	
	        $before = '<h2>';
	        $after = '</h2>';
	        if ($grandThere == "True") {
		        echo '<li class="menuChild currentLink' . $page->ID . ' hasgrand"><a href="' . get_page_link($page->ID) . '">' . $page->post_title . '</a></li>';
			    for ($i = 0; $i < $grandCount; $i++) {
					echo $grandArray[$i];
				}
		      	
	      	} else { 
		      	 echo '<li class="menuChild currentLink' . $page->ID . '"><a href="' . get_page_link($page->ID) . '">' . $page->post_title . '</a></li>';
	      	}
	      	 $grandThere = "False";
      	 
		}
	}
	
    }
}

register_sidebar( array(
	'name'          => __( 'SubNav Widget', 'responsive' ),
	'description'   => __( 'Area 11 - sidebar-subnav.php - Displays below the header', 'responsive' ),
	'id'            => 'subnav-widget',
	'before_title'  => '<div class="widget-title"><h3>',
	'after_title'   => '</h3></div>',
	'before_widget' => '<div id="%1$s" class="viewport-container">',
	'after_widget'  => '</div>'
) );

function update_sandbox_slug( $args, $post_type ) {
    if ( 'sandbox' === $post_type ) {
        $my_args = array(
            'rewrite' => array( 'slug' => 'blog', 'with_front' => false )
        );
        return array_merge( $args, $my_args );
    }
    return $args;
}
add_filter( 'register_post_type_args', 'update_sandbox_slug', 10, 2 );

function register_cpt() {

	/**
	 * Post Type: News.
	 */

	$labels = [
		"name" => __( "News", "gpc" ),
		"singular_name" => __( "News", "gpc" ),
		"menu_name" => __( "News", "gpc" ),
		"all_items" => __( "All News", "gpc" ),
		"add_new" => __( "Add New", "gpc" ),
		"add_new_item" => __( "Add New News", "gpc" ),
		"edit_item" => __( "Edit News", "gpc" ),
		"new_item" => __( "New News", "gpc" ),
		"view_item" => __( "View News", "gpc" ),
		"view_items" => __( "View News", "gpc" ),
		"search_items" => __( "Search News", "gpc" ),
		"not_found" => __( "No News found", "gpc" ),
		"not_found_in_trash" => __( "No News found in Trash", "gpc" ),
		"parent" => __( "Parent News:", "gpc" ),
		"featured_image" => __( "Featured image", "gpc" ),
		"set_featured_image" => __( "Set featured image", "gpc" ),
		"remove_featured_image" => __( "Remove featured image", "gpc" ),
		"use_featured_image" => __( "Use as featured image", "gpc" ),
		"archives" => __( "News archives", "gpc" ),
		"insert_into_item" => __( "Insert into news", "gpc" ),
		"uploaded_to_this_item" => __( "Uploaded to this news", "gpc" ),
		"filter_items_list" => __( "Filter news list", "gpc" ),
		"items_list_navigation" => __( "News list navigation", "gpc" ),
		"items_list" => __( "News list", "gpc" ),
		"attributes" => __( "News Attributes", "gpc" ),
		"name_admin_bar" => __( "News", "gpc" ),
		"item_published" => __( "News published", "gpc" ),
		"item_published_privately" => __( "News published privately", "gpc" ),
		"item_reverted_to_draft" => __( "News reverted to draft", "gpc" ),
		"item_scheduled" => __( "News scheduled", "gpc" ),
		"item_updated" => __( "News updated", "gpc" ),
		"parent_item_colon" => __( "Parent News:", "gpc" ),
	];

	$args = [
		"label" => __( "News", "gpc" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => [ "slug" => "news", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "trackbacks", "custom-fields", "comments", "revisions", "author", "page-attributes", "post-formats" ],
	];

	register_post_type( "news", $args );

	/**
	 * Post Type: Blog.
	 */

	$labels = [
		"name" => __( "Blog", "gpc" ),
		"singular_name" => __( "Blog", "gpc" ),
		"menu_name" => __( "Blog", "gpc" ),
		"all_items" => __( "All Blogs", "gpc" ),
		"add_new" => __( "Add New", "gpc" ),
		"add_new_item" => __( "Add New Blog", "gpc" ),
		"edit_item" => __( "Edit Blog", "gpc" ),
		"new_item" => __( "New Blog", "gpc" ),
		"view_item" => __( "View Blog", "gpc" ),
		"view_items" => __( "View Blogs", "gpc" ),
		"search_items" => __( "Search Blogs", "gpc" ),
		"not_found" => __( "No Blogs found", "gpc" ),
		"not_found_in_trash" => __( "No Blogs found in Trash", "gpc" ),
		"parent" => __( "Parent Blog:", "gpc" ),
		"featured_image" => __( "Featured image", "gpc" ),
		"set_featured_image" => __( "Set featured image", "gpc" ),
		"remove_featured_image" => __( "Remove featured image", "gpc" ),
		"use_featured_image" => __( "Use as featured image", "gpc" ),
		"archives" => __( "Blog archives", "gpc" ),
		"insert_into_item" => __( "Insert into blog", "gpc" ),
		"uploaded_to_this_item" => __( "Uploaded to this blog", "gpc" ),
		"filter_items_list" => __( "Filter blogs list", "gpc" ),
		"items_list_navigation" => __( "Blogs list navigation", "gpc" ),
		"items_list" => __( "Blogs list", "gpc" ),
		"attributes" => __( "Blogs Attributes", "gpc" ),
		"name_admin_bar" => __( "Blog", "gpc" ),
		"item_published" => __( "Blog published", "gpc" ),
		"item_published_privately" => __( "Blog published privately", "gpc" ),
		"item_reverted_to_draft" => __( "Blog reverted to draft", "gpc" ),
		"item_scheduled" => __( "Blog scheduled", "gpc" ),
		"item_updated" => __( "Blog updated", "gpc" ),
		"parent_item_colon" => __( "Parent Blog:", "gpc" ),
	];

	$args = [
		"label" => __( "Blog", "gpc" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => [ "slug" => "sandbox", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "trackbacks", "custom-fields", "comments", "revisions", "author", "page-attributes", "post-formats" ],
	];

	register_post_type( "sandbox", $args );
}

// Creation of the Staff custom post type.
function staff_cpt() {
	/**
	 * Post Type: Staff.
	 */
	$labels = array(
		"name" => __( "Staff", "gpc" ),
		"singular_name" => __( "Staff", "gpc" ),
		"menu_name" => __( "Staff", "gpc" ),
		"all_items" => __( "Staff", "gpc" ),
		"add_new" => __( "Add New", "gpc" ),
		"add_new_item" => __( "Add New Staff", "gpc" ),
		"edit_item" => __( "Edit Staff", "gpc" ),
		"new_item" => __( "New Staff", "gpc" ),
		"view_item" => __( "View Staff", "gpc" ),
		"view_items" => __( "View Staff", "gpc" ),
		"search_items" => __( "Search Staff", "gpc" ),
		"not_found" => __( "No Staff found", "gpc" ),
		"not_found_in_trash" => __( "No Staff found in Trash", "gpc" ),
		"parent_item_colon" => __( "Parent Staff", "gpc" ),
		"featured_image" => __( "Featured image", "gpc" ),
		"set_featured_image" => __( "Set featured image", "gpc" ),
		"remove_featured_image" => __( "Remove featured image", "gpc" ),
		"use_featured_image" => __( "Use as featured image for this Staff", "gpc" ),
		"archives" => __( "Staff archives", "gpc" ),
		"insert_into_item" => __( "Insert into Staff", "gpc" ),
		"uploaded_to_this_item" => __( "Uploaded to this Staff", "gpc" ),
		"filter_items_list" => __( "Filter Staff list", "gpc" ),
		"items_list_navigation" => __( "Staff list navigation", "gpc" ),
		"items_list" => __( "Staff list", "gpc" ),
		"attributes" => __( "Staff Attributes", "gpc" ),
		"name_admin_bar" => __( "Staff", "gpc" ),
		"parent_item_colon" => __( "Parent Staff", "gpc" ),
	);

	$args = array(
		"label" => __( "Staff", "gpc" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "Staff", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-groups",
		"supports" => array( "title", "editor", "thumbnail", "custom-fields", "revisions", "page-attributes" ),
		"taxonomies" => array( "category", "post_tag" ),
	);

	register_post_type( "Staff", $args );
}

add_action( 'init', 'staff_cpt' );

function testimonials_cpt() {
    /**
     * Post Type: Testimonials.
     */
    $labels = array(
        "name" => __( "Testimonials", "gpc" ),
        "singular_name" => __( "Testimonial", "gpc" ),
        "menu_name" => __( "Testimonials", "gpc" ),
        "all_items" => __( "All Testimonials", "gpc" ),
        "add_new" => __( "Add New", "gpc" ),
        "add_new_item" => __( "Add New Testimonial", "gpc" ),
        "edit_item" => __( "Edit Testimonial", "gpc" ),
        "new_item" => __( "New Testimonial", "gpc" ),
        "view_item" => __( "View Testimonial", "gpc" ),
        "view_items" => __( "View Testimonials", "gpc" ),
        "search_items" => __( "Search Testimonial", "gpc" ),
        "not_found" => __( "No Testimonials found", "gpc" ),
        "not_found_in_trash" => __( "No Testimonials found in Trash", "gpc" ),
        "parent_item_colon" => __( "Parent Testimonial:", "gpc" ),
        "featured_image" => __( "Featured image for this testimonial", "gpc" ),
        "set_featured_image" => __( "Set featured image for this testimonial", "gpc" ),
        "remove_featured_image" => __( "Remove featured image for this testimonial", "gpc" ),
        "use_featured_image" => __( "Use as featured image for this testimonial", "gpc" ),
        "archives" => __( "Testimonial archives", "gpc" ),
        "insert_into_item" => __( "Insert into testimonial", "gpc" ),
        "uploaded_to_this_item" => __( "Uploaded to this testimonial", "gpc" ),
        "filter_items_list" => __( "Filter testimonial list", "gpc" ),
        "items_list_navigation" => __( "Testimonials list navigation", "gpc" ),
        "items_list" => __( "Testimonials list", "gpc" ),
        "attributes" => __( "Testimonials Attributes", "gpc" ),
        "parent_item_colon" => __( "Parent Testimonial:", "gpc" ),
    );
    $args = array(
        "label" => __( "Testimonials", "gpc" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "delete_with_user" => false,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "exclude_from_search" => true,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array( "slug" => "testimonials", "with_front" => true ),
        "query_var" => true,
        "menu_icon" => "dashicons-editor-quote",
        "supports" => array( "title", "thumbnail", "custom-fields" ),
    );
    register_post_type( "testimonials", $args );
}
add_action( 'init', 'testimonials_cpt' );

add_action( 'init', 'register_cpt' );
function template_shortcode( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'file-name' => '',
		),
		$atts
	);
	
// 	return $atts['file-name'];
	ob_start();
	get_template_part('/template-parts/' . $atts['file-name']);
	return ob_get_clean();
}
add_shortcode( 'template', 'template_shortcode' );

/**
 * Enqueue scripts and styles.
 */
add_action( 'wp_enqueue_scripts', 'new_styles' );
function new_styles() {
	wp_enqueue_style( 'unsemantic-grid-css', get_stylesheet_directory_uri() . '/css/unsemantic-grid-responsive.css');
	wp_enqueue_style( 'theme-css', get_stylesheet_directory_uri() . '/css/theme.css');
	wp_enqueue_script( 'theme-js', get_stylesheet_directory_uri() . '/js/theme.js', array( 'jquery' ));
}

add_action( 'wp_enqueue_scripts', 'tu_load_font_awesome' );
/**
	 * Enqueue Font Awesome.
	 */
function tu_load_font_awesome() {
	wp_enqueue_style( 'font-awesome', '//use.fontawesome.com/releases/v5.1.0/css/all.css', array(), '5.1.0' );
}

// Enqueue Masonry.js library
wp_enqueue_style( 'masonry', get_stylesheet_directory_uri() . '/styles/css/masonry.css', '1.6.0', 'all');
add_action('wp_footer', 'masonry_js_cdn');
function masonry_js_cdn() { ?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js"></script>
<?php }