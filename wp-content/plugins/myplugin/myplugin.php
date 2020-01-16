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

  // register plugin settings
function myplugin_register_settings() {
	/*

	register_setting(
		string   $option_group,      // must match name being called in the settings field in "admin/settings-page.php"
		string   $option_name,       // db call by this name
		callable $sanitize_callback  // specifies callback function used to validate settings -- idk
	);

	*/

	register_setting(
		'myplugin_options',
		'myplugin_options',
		'myplugin_callback_validate_options'
	);

  /*

add_settings_section(
  string   $id,
  string   $title,
  callable $callback,
  string   $page
);

*/


// registers the settings section (login section )
add_settings_section(
  'myplugin_section_login', // section ID
  'Customize Login Page',   // section title - displayed as h2
  'myplugin_callback_section_login', // dipslay discription of section
  'myplugin'
  // page where section should be displayed,
  // needs to match other two locations: 1. settings-page.php 2. admin-menu.php
);

// registers the settings section (admin section)
add_settings_section(
  'myplugin_section_admin',
  'Customize Admin Area',
  'myplugin_callback_section_admin',
  'myplugin'
);

/*

add_settings_field(
    string   $id,                 // DB retreive
  string   $title,                // displayed next to setting on the plugin page
  callable $callback,             // outputs markup to display the setting
  string   $page,                 //
  string   $section = 'default',
  array    $args = []
);

*/

add_settings_field(
  'custom_url',
  'Custom URL',
  'myplugin_callback_field_text',
  'myplugin',
  'myplugin_section_login',
  [ 'id' => 'custom_url', 'label' => 'Custom URL for the login logo link' ]
);

add_settings_field(
  'custom_title',
  'Custom Title',
  'myplugin_callback_field_text',
  'myplugin',
  'myplugin_section_login',
  [ 'id' => 'custom_title', 'label' => 'Custom title attribute for the logo link' ]
);

add_settings_field(
  'custom_style',
  'Custom Style',
  'myplugin_callback_field_radio',
  'myplugin',
  'myplugin_section_login',
  [ 'id' => 'custom_style', 'label' => 'Custom CSS for the Login screen' ]
);

add_settings_field(
  'custom_message',
  'Custom Message',
  'myplugin_callback_field_textarea',
  'myplugin',
  'myplugin_section_login',
  [ 'id' => 'custom_message', 'label' => 'Custom text and/or markup' ]
);

add_settings_field(
  'custom_footer',
  'Custom Footer',
  'myplugin_callback_field_text',
  'myplugin',
  'myplugin_section_admin',
  [ 'id' => 'custom_footer', 'label' => 'Custom footer text' ]
);

add_settings_field(
  'custom_toolbar',
  'Custom Toolbar',
  'myplugin_callback_field_checkbox',
  'myplugin',
  'myplugin_section_admin',
  [ 'id' => 'custom_toolbar', 'label' => 'Remove new post and comment links from the Toolbar' ]
);

add_settings_field(
  'custom_scheme',
  'Custom Scheme',
  'myplugin_callback_field_select',
  'myplugin',
  'myplugin_section_admin',
  [ 'id' => 'custom_scheme', 'label' => 'Default color scheme for new users' ]
);

}
  // admin_init only fires in the admin area, so it's good for registering settings? -- again, idk
add_action( 'post-page', 'myplugin_register_settings' );


// validate plugin settings
function myplugin_validate_options($input) {

	return $input;

}

// callback: login section
function myplugin_callback_section_login() {

	echo '<p>These settings enable you to customize the WP Login screen.</p>';

}



// callback: admin section
function myplugin_callback_section_admin() {

	echo '<p>These settings enable you to customize the WP Admin Area.</p>';

}
