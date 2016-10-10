<?php
namespace Estimator;

//add_filter('http_origin', function() {
//	return $_SERVER[ 'HTTP_ORIGIN' ];
//});

add_filter( 'json_pre_serve_request', function() {
	header( 'Access-Control-Allow-Origin', '*' );
});

if (isset($_SERVER['HTTP_ORIGIN'])) {
	header("Access-Control-Allow-Origin: *");
	header('Access-Control-Allow-Credentials: true');
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
}

// Accept Cross Domain Transfer.
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
	if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
	if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
		header("Access-Control-Allow-Headers:{$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
	exit(0);
}

add_action( 'init', function() {
	$labels = array(
		'name'          => esc_html__( 'Estimates', 'estimator' ),
		'singular_name' => esc_html__( 'Estimate', 'estimator' ),
		'menu_name'     => esc_html__( 'Estimates', 'estimator' ),
	);
	$args = array(
		'labels'        => $labels,
		'show_in_rest'  => true,
		'rest_base'     => esc_html__( 'estimates', 'estimator' ),
		'show_ui'       => true,
	);
	register_post_type( 'estimate', $args );
});