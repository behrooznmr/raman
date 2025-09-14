<?php
defined('ABSPATH') || exit;

add_filter('pre_set_site_transient_update_plugins', 'rcp_check_for_plugin_update');
add_filter('plugins_api', 'rcp_plugin_update_info', 20, 3);

function rcp_check_for_plugin_update($transient) {
	if (empty($transient->checked)) {
		return $transient;
	}

	$plugin_slug = 'raman-customize-plugin/raman-customize-plugin.php';

	if (!isset($transient->checked[$plugin_slug])) {
		return $transient;
	}

	$current_version = $transient->checked[$plugin_slug];
	$remote_url = 'https://ramanagency.ir/raman-customize-plugin-update.json';

	$remote = wp_remote_get($remote_url, [
		'timeout'   => 10,
		'headers'   => ['Accept' => 'application/json'],
	]);

	if (is_wp_error($remote) || wp_remote_retrieve_response_code($remote) !== 200) {
		return $transient;
	}

	$data = json_decode(wp_remote_retrieve_body($remote));

	if (!$data) {
		return $transient;
	}

	if (isset($data->version) && version_compare($data->version, $current_version, '>')) {
		$transient->response[$plugin_slug] = (object)[
			'slug'        => 'raman-customize-plugin',
			'plugin'      => $plugin_slug,
			'new_version' => $data->version,
			'tested'      => $data->tested ?? '',
			'requires'    => $data->requires ?? '',
			'package'     => $data->download_url,
		];
	}

	return $transient;
}

function rcp_plugin_update_info($res, $action, $args) {
	if ($action !== 'plugin_information') {
		return $res;
	}

	if (!isset($args->slug) || $args->slug !== 'raman-customize-plugin') {
		return $res;
	}

	$remote = wp_remote_get('https://ramanagency.ir/raman-customize-plugin-update.json');

	if (is_wp_error($remote) || wp_remote_retrieve_response_code($remote) !== 200) {
		return $res;
	}

	$data = json_decode(wp_remote_retrieve_body($remote));

	if (!$data) {
		return $res;
	}

	$res = (object)[
		'name'          => 'Raman Customize Plugin',
		'slug'          => 'raman-customize-plugin',
		'version'       => $data->version,
		'author'        => '<a href="https://raman.agency">Behrooz Nematmorad</a>',
		'author_profile'=> 'https://raman.agency',
		'homepage'      => 'https://raman.agency',
		'download_link' => $data->download_url,
		'requires'      => $data->requires ?? '',
		'tested'        => $data->tested ?? '',
		'sections'      => [
			'description' => $data->sections->description ?? '',
			'changelog'   => $data->sections->changelog ?? '',
		],
	];

	return $res;
}