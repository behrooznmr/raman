<?php
defined( 'ABSPATH' ) || exit;
// classic editor
function RCP_module_classic_editor() {
	add_filter( 'use_block_editor_for_post', '__return_false' );
	add_filter( 'use_block_editor_for_post_type', '__return_false' );
}

// classic widget
function RCP_module_classic_widgets() {
	add_filter( 'use_widgets_block_editor', '__return_false' );
}
// desable XML
function RCP_module_disable_XML() {
	add_filter('xmlrpc_enabled', '__return_false');
	add_filter('wp_xmlrpc_server_class', function() {
		return 'wp_xmlrpc_server_disabled_class';
	});
}
