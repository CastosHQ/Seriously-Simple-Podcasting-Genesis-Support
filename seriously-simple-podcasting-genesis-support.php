<?php
/*
 * Plugin Name: Seriously Simple Podcasting Genesis Support
 * Version: 1.1.0
 * Plugin URI: https://wordpress.org/plugins/seriously-simple-podcasting-genesis-support
 * Description: Adds full compatibility for the Genesis theme framework to Seriously Simple Podcasting.
 * Author: Castos
 * Author URI: https://castos.com/
 * Requires PHP: 5.6
 * Requires at least: 4.4
 * Tested up to: 5.8
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

if ( is_ssp_active() ) {

	add_action( 'init', 'ssp_add_genesis_support' );

	function ssp_add_genesis_support() {

		if ( ! defined( 'SSP_CPT_PODCAST' ) || ! function_exists( 'ssp_post_types' ) ) {
			return;
		}

		$supports = apply_filters( 'ssp_genesis_support_features', array(
			'genesis-seo',
			'genesis-scripts',
			'genesis-layouts',
			'genesis-rel-author',
		) );

		$ssp_post_types = ssp_post_types( true, false );

		foreach ( $ssp_post_types as $ssp_post_type ) {
			add_post_type_support( $ssp_post_type, $supports );
		}
	}
}
