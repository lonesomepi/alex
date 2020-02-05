<?php
// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// register meta box
function clas_team_members_add_meta_box() {

	$post_types = array( 'clas_team_members' );
	if(is_array($post_types)){
		foreach ( $post_types as $post_type ) {

			add_meta_box(
				'member_info_meta_box',         // Unique ID of meta box
				'Team Member Information',         // Title of meta box
				'member_info_display_meta_box', // Callback function
				$post_type                   // Post type
			);
		}
	}
}

add_action( 'add_meta_boxes', 'clas_team_members_add_meta_box' );



// display meta box
function member_info_display_meta_box( $post ) {

	$value = get_post_meta( $post->ID, '_member_info_meta_key', true );

	wp_nonce_field( basename( __FILE__ ), 'member_info_meta_box_nonce' );


  	echo "<h3>Main Information</h3>";
		echo "<p>Left column area under image. Here you can display your team member's office hours, their current courses, CV, etc. </p>";
    $content = get_post_meta($post->ID, 'main_info', true);
    //This function adds the WYSIWYG Editor
    wp_editor ($content ,'main_info',array ( "media_buttons" => true ));

		echo "<div class='contact-info-member' style='display: flex; flex-wrap: wrap;'>";

		$member_position = get_post_meta( $post->ID, 'member-position', true );
		echo '<div style="margin: 20px 10px; width: 45%;">';
		echo '<label for="member-position">Position</label>';
		echo '<input name="member-position" value="' . esc_textarea( $member_position )  . '" class="widefat" rows="4" cols="10" />';
		echo '</div>';

    $member_email = get_post_meta( $post->ID, 'member-email', true );
    echo '<div style="margin: 20px 10px; width: 45%;">';
    echo '<label for="member-email">Email</label>';
    echo '<input type="email" name="member-email" value="' . esc_textarea( $member_email )  . '" class="widefat">';
    echo '</div>';

		$member_website = get_post_meta( $post->ID, 'member-website', true );
		echo '<div style="margin: 20px 10px; width: 45%;">';
		echo '<label for="member-website">Website</label>';
		echo '<input type="url" name="member-website" value="' . esc_textarea( $member_website )  . '" class="widefat">';
		echo '</div>';

    $member_phone = get_post_meta( $post->ID, 'member-phone', true );
    echo '<div style="margin: 20px 10px; width: 45%;">';
    echo '<label for="member-phone">Telephone</label>';
    echo '<input type="tel" name="member-phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="' . esc_textarea( $member_phone )  . '" class="widefat">';
		echo '<p style="font-style: italic; margin-top: 0;">Format example: 352-555-5555</p>';
    echo '</div>';

    $member_office = get_post_meta( $post->ID, 'member-office', true );
    echo '<div style="margin: 20px 10px; width: 45%;">';
    echo '<label for="member-office">Office Address</label>';
    echo '<input name="member-office" value="' . esc_textarea( $member_office )  . '" class="widefat" rows="4" cols="10" />';
    echo '</div>';

		$member_department = get_post_meta( $post->ID, 'member-department', true );
    echo '<div style="margin: 20px 10px; width: 45%;">';
    echo '<label for="member-department">Department</label>';
    echo '<input name="member-department" value="' . esc_textarea( $member_department )  . '" class="widefat" rows="4" cols="10" />';
    echo '</div>';

		echo "</div>";

		echo "<h3 style='margin: 20px 0;'>Additional Information</h3>";
		echo "<p>Here you can display team member's recent projects, publications, bio, etc.</p>";
		$member_moreInfo = get_post_meta( $post->ID, 'member-moreInfo', true );
		//This function adds the WYSIWYG Editor
		wp_editor ($member_moreInfo ,'member-moreInfo',array ( "media_buttons" => true ));
	?>

	<textarea name="name" rows="8" cols="80" placeholder="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."></textarea>


<?php

}



// save meta box
function myplugin_save_meta_box( $post_id ) {

	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );

	$is_valid_nonce = false;

	if ( isset( $_POST[ 'member_info_meta_box_nonce' ] ) ) {

		if ( wp_verify_nonce( $_POST[ 'member_info_meta_box_nonce' ], basename( __FILE__ ) ) ) {

			$is_valid_nonce = true;

		}

	}

	if ( $is_autosave || $is_revision || !$is_valid_nonce ) return;

	$member_meta['main_info'] = $_POST['main_info'];
	$member_meta['member-position'] = esc_textarea($_POST['member-position']);
  $member_meta['member-email'] = esc_textarea($_POST['member-email']);
	$member_meta['member-website'] = esc_textarea($_POST['member-website']);
  $member_meta['member-phone'] = esc_textarea($_POST['member-phone']);
	$member_meta['member-office'] = esc_textarea($_POST['member-office']);
	$member_meta['member-moreInfo'] = $_POST['member-moreInfo'];
	$member_meta['member-department'] = $_POST['member-department'];

if(is_array($member_meta)){
  foreach ( $member_meta as $key => $value ) :
		// Don't store custom data twice
		if ( 'revision' === $post->post_type ) {
			return;
		}
		if ( get_post_meta( $post_id, $key, false ) ) {
			// If the custom field already has a value, update it.
			update_post_meta( $post_id, $key, $value );
		} else {
			// If the custom field doesn't have a value, add it.
			add_post_meta( $post_id, $key, $value);
		}
		if ( ! $value ) {
			// Delete the meta key if there's no value
			delete_post_meta( $post_id, $key );
		}
	endforeach;
}

  if (!empty($_POST['main_info'])) {

        $data = $_POST['main_info'];
        update_post_meta($post_id, 'main_info', $data);

    }

}
add_action( 'save_post', 'myplugin_save_meta_box' );





























//
// if( function_exists('acf_add_local_field_group') ):
// $value = get_field( "email" );
//
// acf_add_local_field_group(array (
// 	'key' => 'team_member_main_info',
// 	'title' => 'Team Member Main Information',
// 	'fields' => array (
// 		array (
// 			'key' => 'main_info',
// 			'label' => 'Main Information',
// 			'type' => 'wysiwyg',
// 			'instructions' => 'Here you can type in the team members information like courses taught, office hours, resume, etc.',
// 			'required' => 0,
// 			'conditional_logic' => 0,
// 			'wrapper' => array (
// 				'width' => '',
// 				'class' => '',
// 				'id' => '',
// 			),
// 		),
//     array (
//       'key' => 'email',
//       'label' => 'Email',
//       'type' => 'email',
//       'instructions' => "Team Member's Email",
//       'required' => 0,
//       'conditional_logic' => 0,
//       'wrapper' => array (
//         'width' => '30%',
//         'class' => '',
//         'id' => '',
//       ),
//       'default_value' => "$value",
//     ),
//     array (
//       'key' => 'team_member_phone',
//       'label' => 'Phone Number',
//       'type' => 'text',
//       'instructions' => "Team Member's Office",
//       'required' => 0,
//       'conditional_logic' => 0,
//       'wrapper' => array (
//         'width' => '30%',
//         'class' => '',
//         'id' => '',
//       ),
//     ),
//     array (
//       'key' => 'office_location',
//       'label' => 'Office',
//       'type' => 'textarea',
//       'instructions' => "Team Member's Office",
//       'required' => 0,
//       'conditional_logic' => 0,
//       'wrapper' => array (
//         'width' => '30%',
//         'class' => '',
//         'id' => '',
//       ),
//     )
// 	),
// 	'location' => array (
// 		array (
// 			array (
// 				'param' => 'post_type',
// 				'operator' => '==',
// 				'value' => 'clas_team_members',
// 			),
// 		),
// 	),
// 	'menu_order' => 0,
// 	'position' => 'normal',
// 	'style' => 'default',
// 	'label_placement' => 'top',
// 	'instruction_placement' => 'label',
// 	'hide_on_screen' => '',
// ));
//
// endif;
