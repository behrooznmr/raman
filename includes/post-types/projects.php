<?php

add_action( 'init', function () {
	register_post_type( 'projects', [
		'label'       => 'پروژه‌ها',
		'public'      => true,
		'menu_icon'   => 'dashicons-portfolio',
		'supports'    => [
			'title',
			'editor',
			'thumbnail',
			'excerpt',
			'author',
			'custom-fields',
			'comments',
			'revisions'
		],
		'has_archive' => true,
		'taxonomies'  => [ 'projects_category' ],
		'labels'      => [
			'name'          => 'پروژه‌ها',
			'singular_name' => 'پروژه',
			'add_new'       => 'افزودن پروژه جدید',
			'edit_item'     => 'ویرایش پروژه',
			'new_item'      => 'پروژه جدید',
			'view_item'     => 'مشاهده پروژه',
			'all_items'     => 'همه پروژه‌ها',
		],
	] );

	register_taxonomy( 'projects_category', 'projects', [
		'label'        => 'دسته‌بندی پروژه‌ها',
		'hierarchical' => true,
		'labels'       => [
			'name'          => 'دسته‌بندی پروژه‌ها',
			'singular_name' => 'دسته',
			'add_new_item'  => 'افزودن دسته جدید',
			'edit_item'     => 'ویرایش دسته',
		],
	] );
} );