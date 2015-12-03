<?php

putenv( 'PANTHEON_INDEX_HOST=localhost' );
putenv( 'PANTHEON_INDEX_PORT=8983' );
if ( getenv( 'TRAVIS' ) ) {
	define( 'SOLR_PATH', '/solr/' );
} else {
	define( 'SOLR_PATH', '/solr/self/' );
}

$_tests_dir = getenv( 'WP_TESTS_DIR' );
if ( !$_tests_dir ) {
	$_tests_dir = '/tmp/wordpress-tests-lib';
}

require_once $_tests_dir . '/includes/functions.php';

function _manually_load_plugin() {
	require dirname( dirname( __FILE__ ) ) . '/solr-power.php';
}

tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );

require $_tests_dir . '/includes/bootstrap.php';