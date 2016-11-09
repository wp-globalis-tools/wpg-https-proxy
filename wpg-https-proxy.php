<?php
/**
 * Plugin Name:         WPG HTTPS Proxy
 * Plugin URI:          https://github.com/wp-globalis-tools/wpg-https-proxy
 * Description:         Catch and redirect HTTPS request through a proxy, solving the SSL/TLS errors on your server
 * Author:              Pierre Dargham, Globalis Media Systems
 * Author URI:          https://github.com/wp-globalis-tools/
 *
 * Version:             1.0.0
 * Requires at least:   4.0.0
 * Tested up to:        4.6.0
 */

namespace Globalis\HTTPSProxy;

if(defined('WPG_HTTPS_PROXY_URL')) {
	add_filter('http_request_host_is_external', '__return_true');
	add_filter('pre_http_request', __NAMESPACE__ . '\\enable_https_proxy', 10, 3);
}

function enable_https_proxy($pre, $args, $url) {
	if(0 === strpos($url, 'https://')) {
		remove_filter('pre_http_request', __NAMESPACE__ . '\\enable_https_proxy', 10, 3);
		$http      = _wp_http_get_object();
		$proxy_url = add_query_arg('url', rawurlencode($url), WPG_HTTPS_PROXY_URL);
		$pre       = $http->request($proxy_url, $args);
		add_filter('pre_http_request', __NAMESPACE__ . '\\enable_https_proxy', 10, 3);
	}
	return $pre;
}
