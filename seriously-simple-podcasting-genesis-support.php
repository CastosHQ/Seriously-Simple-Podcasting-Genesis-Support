<?php
/*
 * Plugin Name: Seriously Simple Podcasting Genesis Support
 * Version: 1.0.1
 * Plugin URI: https://wordpress.org/plugins/seriously-simple-podcasting-genesis-support
 * Description: Adds full compatibility for the Genesis theme framework to Seriously Simple Podcasting.
 * Author: Castos
 * Author URI: https://castos.com/
 * Requires at least: 4.5
 * Tested up to: 5.0
 *
 * Text Domain: seriously-simple-podcasting-genesis-support
 *
 * @package WordPress
 * @author Hugh Lashbrooke
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'is_ssp_active' ) ) {
	require_once( 'ssp-includes/ssp-functions.php' );
}

if( is_ssp_active() ) {

	add_action( 'init', 'ssp_add_genesis_support' );

	function ssp_add_genesis_support () {

		$supports = apply_filters( 'ssp_genesis_support_features', array(
			'genesis-seo',
			'genesis-layouts',
			'genesis-cpt-archives-settings',
			'genesis-simple-sidebars',
			'genesis-scripts',
			'genesis-rel-author',
		) );

		add_post_type_support( 'post_type', $supports );
	}

}
