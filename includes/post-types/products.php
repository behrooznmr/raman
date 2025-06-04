<?php

add_action('init', function () {
	register_post_type('products', [
		'label'       => 'محصولات',
		'public'      => true,
		'menu_icon'   => 'dashicons-cart',
		'supports'    => ['title', 'editor', 'thumbnail', 'excerpt', 'author', 'custom-fields', 'comments', 'revisions'],
		'has_archive' => true,
		'taxonomies'  => ['products_category'],
		'labels'      => [
			'name'          => 'محصولات',
			'singular_name' => 'محصول',
			'add_new'       => 'افزودن محصول جدید',
			'edit_item'     => 'ویرایش محصول',
			'new_item'      => 'محصول جدید',
			'view_item'     => 'مشاهده محصول',
			'all_items'     => 'همه محصولات',
		],
	]);

	// دسته‌بندی محصولات
	register_taxonomy('products_category', 'products', [
		'label'        => 'دسته‌بندی محصولات',
		'hierarchical' => true,
		'labels'       => [
			'name'          => 'دسته‌بندی محصولات',
			'singular_name' => 'دسته',
			'add_new_item'  => 'افزودن دسته جدید',
			'edit_item'     => 'ویرایش دسته',
		],
	]);
});