<?php
defined( 'ABSPATH' ) || exit;
//create custom post type portfolio
function jd_portfolio_custom_post_type() {

	$labels = array(
		'name'			=> 'نمونه کار',
		'singular_name'		=> 'نمونه کار',
		'menu_name'		=> 'نمونه کار',
		'name_admin_bar'	=> 'نمونه کار',
		'add_new'		=> 'اضافه کردن نمونه کار',
		'add_new_item' 		=> 'اضافه کردن آیتم نمونه کار',
		'new_item'		=> 'نمونه کار جدید',
		'edit_item'		=> 'ویرایش نمونه کار',
		'view_item'		=> 'نمایش',
		'all_items'		=> 'همه نمونه کار ها',
		'search_items' 		=> 'جستجو',
		'parent_item_colon'	=> 'Parent Portfolio Posts:',
		'not_found'		=> 'No Portfolio Posts found.',
		'not_found_in_trash' 	=> 'No Portfolio Posts found in Trash.',
	);

	$args = array(
		'labels'	     	=> $labels,
		'public'		=> true,
		'publicly_queryable'	=> true,
		'show_ui'		=> true,
		'show_in_menu'		=> true,
		'menu_icon'		=> 'dashicons-format-gallery',
		'query_var'		=> true,
		'rewrite'		=> array( 'slug' => 'portfolio' ),
		'capability_type'	=> 'post',
		'has_archive'		=> true,
		'hierarchical'		=> true,
		'menu_position'		=> 21,
		'show_in_rest'		=> false,
		'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
	);

	register_post_type( 'portfolio', $args );
}
add_action( 'init', 'jd_portfolio_custom_post_type' );

//// Flush rewrite rules when plugin is activated
//function jd_portfolio_rewrite_flush() {
//	jd_portfolio_custom_post_type();
//	flush_rewrite_rules();
//}
//register_activation_hook( __FILE__, 'jd_rewrite_flush' );
function create_custom_taxonomy() {
// Portfolio Categories
	$labels = array(
		'name'              => _x('دسته بندی', 'taxonomy general name'),
		'singular_name'     => _x('دسته بندی', 'taxonomy singular name'),
		'search_items'      => __('جستجو'),
		'all_items'         => __('همه دسته بندی ها'),
		'parent_item'       => __('دسته بندی مادر'),
		'parent_item_colon' => __('دسته بندی مادر:'),
		'edit_item'         => __('ویرایش دسته بندی'),
		'update_item'       => __('بروزرسانی'),
		'add_new_item'      => __('اضافه کردن دسته بندی'),
		'new_item_name'     => __('دسته بندی جدید'),
		'menu_name'         => __('دسته بندی'),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array('slug' => 'portfolio_filter'),
	);

	register_taxonomy('portfolio_filter', 'portfolio', $args);
}
add_action( 'init', 'create_custom_taxonomy' );



