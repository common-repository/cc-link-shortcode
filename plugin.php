<?php

/*
	Plugin Name: CC-Link-Shortcode
	Plugin URI: https://wordpress.org/plugins/cc-link-shortcode
	Description: This plugin adds the link shortcode to replace standard html tag. Its primary function is to simplify internal linking.
	Version: 1.1.1
	Author: Clearcode
	Author URI: https://clearcode.cc
	Text Domain: cc-link-shortcode
	Domain Path: /
	License: GPLv3
	License URI: http://www.gnu.org/licenses/gpl-3.0.txt

	Copyright (C) 2022 by Clearcode <https://clearcode.cc>
	and associates (see AUTHORS.txt file).

	This file is part of CC-Link-Shortcode plugin.

	CC-Link-Shortcode plugin is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.

	CC-Link-Shortcode plugin is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with CC-Link-Shortcode plugin; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

namespace Clearcode\Link_Shortcode;

use Clearcode\Link_Shortcode;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'get_plugin_data' ) ) {
	require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

foreach ( array( 'singleton', 'plugin', 'link-shortcode' ) as $class ) {
	require_once( plugin_dir_path( __FILE__ ) . sprintf( 'includes/class-%s.php', $class ) );
}

if ( ! has_action( Link_Shortcode::get( 'slug' ) ) ) {
	do_action( Link_Shortcode::get( 'slug' ), Link_Shortcode::instance() );
}
