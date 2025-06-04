<?php
add_action( 'init', function () {
	register_post_type( 'news', [
		'label'       => 'اخبار',
		'public'      => true,
		'menu_icon'   => 'dashicons-media-text',
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
		'taxonomies'  => [ 'news_category' ],
		'labels'      => [
			'name'          => 'اخبار',
			'singular_name' => 'خبر',
			'add_new'       => 'افزودن خبر جدید',
			'edit_item'     => 'ویرایش خبر',
			'new_item'      => 'خبر جدید',
			'view_item'     => 'مشاهده خبر',
			'all_items'     => 'همه اخبار',
		],
	] );

	register_taxonomy( 'news_category', 'news', [
		'label'        => 'دسته‌بندی اخبار',
		'hierarchical' => true,
		'labels'       => [
			'name'          => 'دسته‌بندی اخبار',
			'singular_name' => 'دسته',
			'add_new_item'  => 'افزودن دسته جدید',
			'edit_item'     => 'ویرایش دسته',
		],
	] );
} );