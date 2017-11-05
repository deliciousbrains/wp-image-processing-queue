<?php
/*
Plugin Name: Image Processing Queue
Plugin URI: http://wordpress.org/extend/plugins/image-processing-queue/
Description: Allow theme designers to define image sizes for specific images and have them
processed in the background
Author: Delicious Brains
Version: 0.2
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

wp_queue()->cron();

/**
 * Install queue tables on plugin activation.
 */
function ipq_activate_plugin() {
	wp_queue_install_tables();
}
register_activation_hook( __FILE__, 'ipq_activate_plugin' );