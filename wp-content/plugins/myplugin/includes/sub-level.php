<?php
    // add sub-level administrative menu
function myplugin_add_sublevel_menu() {

	/*

	add_submenu_page(
		string   $parent_slug,   // dashboard -- which parent, hover to get the filename like users => users.php
		string   $page_title,
		string   $menu_title,    // dashboard -- nav -- title to click on
		string   $capability,    // dont change
		string   $menu_slug,     // url
		callable $function = ''  // name of the main function
	);

	*/

	add_submenu_page(
		'users.php',
		'Standard Plugin',
		'MyPlugin',
		'manage_options',
		'myplugin',
		'myplugin_display_settings_page'
	);

}
add_action( 'admin_menu', 'myplugin_add_sublevel_menu' );

?>
