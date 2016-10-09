<?php
namespace Estimator;

add_filter('http_origin', function() {
	return $_SERVER[ 'HTTP_ORIGIN' ];
});

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