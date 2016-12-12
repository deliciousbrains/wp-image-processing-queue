<?php
/*
Plugin Name: Image Processing Queue
Plugin URI: http://wordpress.org/extend/plugins/image-processing-queue/
Description: Allow theme designers to define image sizes for specific images and have them
processed in the background
Author: Delicious Brains
Version: 0.1
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

require_once plugin_dir_path( __FILE__ ) . 'vendor/a5hleyrich/wp-background-processing/classes/wp-async-request.php';
require_once plugin_dir_path( __FILE__ ) . 'vendor/a5hleyrich/wp-background-processing/classes/wp-background-process.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/class-ipq-process.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/class-image-processing-queue.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/ipq-template-functions.php';

Image_Processing_Queue::instance();
