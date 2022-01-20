<?php
/**
 * Plugin Name: Test
 */

add_action( 'plugin_loaded', function () {
	remove_action( 'admin_menu', array( maitriserwp(), 'options_page' ) );
} );
