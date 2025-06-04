<?php

add_action( 'init', function () {
	register_post_type( 'services', [
		'label'       => 'خدمات',
		'public'      => true,
		'menu_icon'   => 'dashicons-hammer',
		'supports'    => [ 'title', 'editor', 'thumbnail','excerpt','author' ,'custom-fields' , 'comments' , 'revisions' ],
		'has_archive' => true,
		'taxonomies'  => [ 'services_category' ],
		'labels'      => [
			'name'          => 'خدمات',
			'singular_name' => 'سرویس',
			'add_new'       => 'افزودن خدمت جدید',
			'edit_item'     => 'ویرایش خدمت',
			'new_item'      => 'خدمت جدید',
			'view_item'     => 'مشاهده خدمت',
			'all_items'     => 'همه خدمات',
		],
	] );

	register_taxonomy( 'services_category', 'services', [
		'label'        => 'دسته‌بندی خدمات',
		'hierarchical' => true,
		'labels'       => [
			'name'          => 'دسته‌بندی خدمات',
			'singular_name' => 'دسته',
			'add_new_item'  => 'افزودن دسته جدید',
			'edit_item'     => 'ویرایش دسته',
		],
	] );
} );
