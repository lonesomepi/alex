<?php
/*
Plugin Name:  My Plugin
Description:  Plugin Starter Pack
Plugin URI:   https://clas.ufl.edu/
Author:       Alex Catalano
Version:      1.0
Text Domain:  myplugin
Domain Path:  /languages
License:      GPL v2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.txt
*/

  // // exit if file is called directly
  if (!defined( 'ABSPATH' )) {
    exit;
  }

  if ( is_admin() ) {

    // include dependencies
    require_once plugin_dir_path( __FILE__ ) . 'admin/admin-menu.php';
    require_once plugin_dir_path( __FILE__ ) . 'admin/settings-page.php';

  }
