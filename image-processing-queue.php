<?php
/*
Plugin Name: Image Processing Queue
Plugin URI: http://wordpress.org/extend/plugins/image-processing-queue/
Description: Allow theme designers to define image sizes for specific images and have them
processed in the background
Author: Delicious Brains
Version: 1.1.1
Author URI: http://deliciousbrains.com/
Text Domain: image-processing-queue
Domain Path: /languages/

// Copyright (c) 2016 Delicious Brains. All rights reserved.
//
// Released under the GPL license
// http://www.opensource.org/licenses/gpl-license.php
//
// **********************************************************************
// This program is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
// **********************************************************************
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

Image_Processing_Queue\Queue::instance();

$attempts = apply_filters( 'ipq_job_attempts', 3 );
$interval = apply_filters( 'ipq_cron_interval', 1 );
wp_queue()->cron( $attempts, $interval );

/**
 * Perform plugin upgrade routines.
 */
function ipq_upgrade_routines() {
	$version = get_site_option( 'ipq_version', '0.0.0' );

	if ( version_compare( $version, '1.0.0', '<' ) ) {
		wp_queue_install_tables();
		update_site_option( 'ipq_version', '1.0.0' );
	}
}
add_action( 'admin_init', 'ipq_upgrade_routines' );