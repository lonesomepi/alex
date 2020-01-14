<?php 
  // add top-level administrative menu
function myplugin_add_toplevel_menu() {

	/*

    // this is just a comment as a guide to what's happening  in "add_menu_page" below

		add_menu_page(
			string   $page_title,      // plugin's title
			string   $menu_title,      // dashboard menu title
			string   $capability,      // don't touch, leave as "manage_options", required user capability
			string   $menu_slug,       // URL title
			callable $function = '',   // needs to match the main called function || specifies the callback function that displays plugin page
			string   $icon_url = '',   // icon | https://developer.wordpress.org/resource/dashicons/#code-standards
			int      $position = null
		)
	*/

	add_menu_page(
		'Standard Plugin',
		'TeamMembers',
		'manage_options',
		'myplugin',
		'myplugin_display_settings_page',
		'dashicons-id',
		null
	);

}

add_action( 'admin_menu', 'myplugin_add_toplevel_menu' );

?>
