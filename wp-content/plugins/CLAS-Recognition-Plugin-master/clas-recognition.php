<?php
/**
 * Plugin Name: CLAS Recognition
 * Plugin URI: https://recognition-ceremony.clas.ufl.edu/
 * Description: This plugin is for custom functionality for the CLAS Recognition website
 * Version: 1.0
 * Author: Efren Vasquez
 * Author URI: https://mediaservices.clas.ufl.edu
 */

/*==================================

Create custom page templates for Recognition Ceremonies

====================================*/
class clasRecognition_PageTemplater {

	/**
	 * A reference to an instance of this class.
	 */
	private static $instance;

	/**
	 * The array of templates that this plugin tracks.
	 */
	protected $templates;

	/**
	 * Returns an instance of this class.
	 */
	public static function get_instance() {

		if ( null == self::$instance ) {
			self::$instance = new clasRecognition_PageTemplater();
		}

		return self::$instance;

	}

	/**
	 * Initializes the plugin by setting filters and administration functions.
	 */
	private function __construct() {

		$this->templates = array();


		// Add a filter to the attributes metabox to inject template into the cache.
		if ( version_compare( floatval( get_bloginfo( 'version' ) ), '4.7', '<' ) ) {

			// 4.6 and older
			add_filter(
				'page_attributes_dropdown_pages_args',
				array( $this, 'register_project_templates' )
			);

		} else {

			// Add a filter to the wp 4.7 version attributes metabox
			add_filter(
				'theme_page_templates', array( $this, 'add_new_template' )
			);

		}

		// Add a filter to the save post to inject out template into the page cache
		add_filter(
			'wp_insert_post_data',
			array( $this, 'register_project_templates' )
		);


		// Add a filter to the template include to determine if the page has our
		// template assigned and return it's path
		add_filter(
			'template_include',
			array( $this, 'view_project_template')
		);


		// Add your templates to this array.
		$this->templates = array(
			'public/templates/spring2020-template.php' => 'Spring 2020 Recognition',
      'public/templates/summer2020-template.php' => 'Summer 2020 Recognition',
			'public/templates/fall2020-convocation.php' => 'Fall 2020 Convocation'
		);

	}

	/**
	 * Adds our template to the page dropdown for v4.7+
	 *
	 */
	public function add_new_template( $posts_templates ) {
		$posts_templates = array_merge( $posts_templates, $this->templates );
		return $posts_templates;
	}

	/**
	 * Adds our template to the pages cache in order to trick WordPress
	 * into thinking the template file exists where it doens't really exist.
	 */
	public function register_project_templates( $atts ) {

		// Create the key used for the themes cache
		$cache_key = 'page_templates-' . md5( get_theme_root() . '/' . get_stylesheet() );

		// Retrieve the cache list.
		// If it doesn't exist, or it's empty prepare an array
		$templates = wp_get_theme()->get_page_templates();
		if ( empty( $templates ) ) {
			$templates = array();
		}

		// New cache, therefore remove the old one
		wp_cache_delete( $cache_key , 'themes');

		// Now add our template to the list of templates by merging our templates
		// with the existing templates array from the cache.
		$templates = array_merge( $templates, $this->templates );

		// Add the modified cache to allow WordPress to pick it up for listing
		// available templates
		wp_cache_add( $cache_key, $templates, 'themes', 1800 );

		return $atts;

	}

	/**
	 * Checks if the template is assigned to the page
	 */
	public function view_project_template( $template ) {

		// Get global post
		global $post;

		// Return template if post is empty
		if ( ! $post ) {
			return $template;
		}

		// Return default template if we don't have a custom one defined
		if ( ! isset( $this->templates[get_post_meta(
			$post->ID, '_wp_page_template', true
		)] ) ) {
			return $template;
		}

		$file = plugin_dir_path( __FILE__ ). get_post_meta(
			$post->ID, '_wp_page_template', true
		);

		// Just to be safe, we check if the file exist first
		if ( file_exists( $file ) ) {
			return $file;
		} else {
			echo $file;
		}

		// Return template
		return $template;

	}

}
add_action( 'plugins_loaded', array( 'clasRecognition_PageTemplater', 'get_instance' ) );

/*======================================

  Include public CSS file

=======================================*/
  function clasRecognition_public_style() {
    if(is_page_template('public/templates/spring2020-template.php') || is_page_template('public/templates/summer2020-template.php') || is_page_template('public/templates/fall2020-convocation.php')){
      wp_enqueue_style('public-styles', plugin_dir_url(__FILE__).'public/css/styles.css');
    }
  }

  add_action('wp_enqueue_scripts', 'clasRecognition_public_style');


/*=============================================================

  Rename uploaded files for Gravity Forms.

==============================================*/
// class GW_Rename_Uploaded_Files {
//   public function __construct( $args = array() ) {
//     // set our default arguments, parse against the provided arguments, and store for use throughout the class
//     $this->_args = wp_parse_args( $args, array(
//       'form_id' => false,
//       'field_id' => false,
//       'template' => ''
//       ) );
//       // do version check in the init to make sure if GF is going to be loaded, it is already loaded
//       add_action( 'init', array( $this, 'init' ) );
//     }
//
//   public function init() {
//     // make sure we're running the required minimum version of Gravity Forms
//     if( ! is_callable( array( 'GFFormsModel', 'get_physical_file_path' ) ) ) {
//       return;
//     }
//
//     add_filter( 'gform_entry_post_save', array( $this, 'rename_uploaded_files' ), 9, 2 );
//     add_filter( 'gform_entry_post_save', array( $this, 'stash_uploaded_files' ), 99, 2 );
//     add_action( 'gform_after_update_entry', array( $this, 'rename_uploaded_files_after_update' ), 9, 2 );
//     add_action( 'gform_after_update_entry', array( $this, 'stash_uploaded_files_after_update' ), 99, 2 );
//   }
//
//   function rename_uploaded_files( $entry, $form ) {
//     if( ! $this->is_applicable_form( $form ) ) {
//       return $entry;
//     }
//
//     foreach( $form['fields'] as &$field ) {
//       if( ! $this->is_applicable_field( $field ) ) {
//         continue;
//       }
//
//       $uploaded_files = rgar( $entry, $field->id );
//
//       if( empty( $uploaded_files ) ) {
//         continue;
//       }
//
//       $uploaded_files = $this->parse_files( $uploaded_files, $field );
//       $stashed_files = $this->parse_files( gform_get_meta( $entry['id'], 'gprf_stashed_files' ), $field );
//       $renamed_files = array();
//
//       foreach( $uploaded_files as $_file ) {
//         // Don't rename the same files twice.
//         if( in_array( $_file, $stashed_files ) ) {
//           $renamed_files[] = $_file;
//           continue;
//         }
//
//         $dir = wp_upload_dir();
//         $dir = $this->get_upload_dir( $form['id'] );
//         $file = str_replace( $dir['url'], $dir['path'], $_file );
//         if( ! file_exists( $file ) ) {
//           continue;
//         }
//
//         $renamed_file = $this->rename_file( $file, $entry );
//         if ( ! is_dir( dirname( $renamed_file ) ) ) {
//           wp_mkdir_p( dirname( $renamed_file ) );
//         }
//
//         $result = rename( $file, $renamed_file );
//         $renamed_files[] = $this->get_url_by_path( $renamed_file, $form['id'] );
//       }
//
//       // In cases where 3rd party add-ons offload the image to a remote location, no images can be renamed.
//       if( empty( $renamed_files ) ) {
//         continue;
//       }
//
//       if( $field->get_input_type() == 'post_image' ) {
//         $value = str_replace( $uploaded_files[0], $renamed_files[0], rgar( $entry, $field->id ) );
//       } else if( $field->multipleFiles ) {
//         $value = json_encode( $renamed_files );
//       } else {
//         $value = $renamed_files[0];
//       }
//
//       GFAPI::update_entry_field( $entry['id'], $field->id, $value );
//       $entry[ $field->id ] = $value;
//     }
//     return $entry;
//   }
//
//   function get_upload_dir( $form_id ) {
//     $dir = GFFormsModel::get_file_upload_path( $form_id, 'PLACEHOLDER' );
//     $dir['path'] = dirname( $dir['path'] );
//     $dir['url'] = dirname( $dir['url'] );
//     return $dir;
//   }
//
//   function rename_uploaded_files_after_update( $form, $entry_id ) {
//     $entry = GFAPI::get_entry( $entry_id );
//     $this->rename_uploaded_files( $entry, $form );
//   }
//
//   /**
//   * Stash the "final" version of the files after other add-ons have had a chance to interact with them.
//   */
//
//   function stash_uploaded_files( $entry, $form ) {
//     foreach ( $form['fields'] as &$field ) {
//       if ( ! $this->is_applicable_field( $field ) ) {
//         continue;
//       }
//
//       $uploaded_files = rgar( $entry, $field->id );
//       gform_update_meta( $entry['id'], 'gprf_stashed_files', $uploaded_files );
//     }
//     return $entry;
//   }
//
//   function stash_uploaded_files_after_update( $form, $entry_id ) {
//     $entry = GFAPI::get_entry( $entry_id );
//     $this->stash_uploaded_files( $entry, $form );
//   }
//
//   function rename_file( $file, $entry ) {
//     $new_file = $this->get_template_value( $this->_args['template'], $file, $entry );
//     $new_file = $this->increment_file( $new_file );
//     return $new_file;
//   }
//
//   function increment_file( $file ) {
//     $file_path = GFFormsModel::get_physical_file_path( $file );
//     $pathinfo = pathinfo( $file_path );
//     $counter = 1;
//
//     // increment the filename if it already exists (i.e. balloons.jpg, balloons1.jpg, balloons2.jpg)
//     while ( file_exists( $file_path ) ) {
//       $file_path = str_replace( ".{$pathinfo['extension']}", "{$counter}.{$pathinfo['extension']}", GFFormsModel::get_physical_file_path( $file ) );
//       $counter++;
//     }
//
//     $file = str_replace( basename( $file ), basename( $file_path ), $file );
//     return $file;
//   }
//
//   function is_path( $filename ) {
//     return strpos( $filename, '/' ) !== false;
//   }
//
//   function get_template_value( $template, $file, $entry ) {
//     $info = pathinfo( $file );
//
//     if( strpos( $template, '/' ) === 0 ) {
//       $dir = wp_upload_dir();
//       $template = $dir['basedir'] . $template;
//     } else {
//       $template = $info['dirname'] . '/' . $template;
//     }
//
//     // replace our custom "{filename}" psuedo-merge-tag
//     $value = str_replace( '{filename}', $info['filename'], $template );
//
//     // replace merge tags
//     $form = GFAPI::get_form( $entry['form_id'] );
//     $value = GFCommon::replace_variables( $value, $form, $entry, false, true, false, 'text' );
//
//     // make sure filename is "clean"
//     $filename = $this->clean( basename( $value ) );
//     $value = str_replace( basename( $value ), $filename, $value );
//
//     // append our file ext
//     $value .= '.' . $info['extension'];
//     return $value;
//   }
//
//   function is_applicable_form( $form ) {
//     $form_id = isset( $form['id'] ) ? $form['id'] : $form;
//     return $form_id == $this->_args['form_id'];
//   }
//
//   function is_applicable_field( $field ) {
//     $is_file_upload_field = in_array( GFFormsModel::get_input_type( $field ), array( 'fileupload', 'post_image' ) );
//     $is_applicable_field_id = $this->_args['field_id'] ? $field['id'] == $this->_args['field_id'] : true;
//     return $is_file_upload_field && $is_applicable_field_id;
//   }
//
//   function clean( $str ) {
//     return sanitize_file_name( $str );
//   }
//
//   function get_url_by_path( $file, $form_id ) {
//     $dir = $this->get_upload_dir( $form_id );
//     $url = str_replace( $dir['path'], $dir['url'], $file );
//     return $url;
//   }
//
//   function parse_files( $files, $field ) {
//     if( empty( $files ) ) {
//       return array();
//     }
//
//     if( $field->get_input_type() == 'post_image' ) {
//       $file_bits = explode( '|:|', $files );
//       $files = array( $file_bits[0] );
//     } else if( $field->multipleFiles ) {
//       $files = json_decode( $files );
//     } else {
//       $files = array( $files );
//     }
//     return $files;
//   }
// }
//
// # Configuration
// new GW_Rename_Uploaded_Files( array(
// 'form_id' => 5,
// 'field_id' => 5,
// 'template' => '{Name (Last):1.6}-{Name (First):1.3}-{UFID Number:6}' // most merge tags are supported, original file extension is preserved
// ) );


/*=========================================
*
* Modals for Ceremony Page
*
=========================================*/
function ufclas_modals_listMajors($majors) {
	// dye modal
	echo "<ul class='majors'>";

	foreach ($majors as $major => $list_value_media) {
		$clean_major = str_replace(" ", "",       $major);
		$clean_major = str_replace("'", "",       $clean_major);
		$clean_major = str_replace("/", "",       $clean_major);
		$clean_major = str_replace("&amp;",   "", $clean_major);
    $clean_major = str_replace("&#8217;", "", $clean_major);
		$clean_major = strtolower($clean_major);
		echo "<li id=\"{$clean_major}-modal\" data-toggle=\"modal\" data-target=\"#modal_{$clean_major}\" aria-labelledby=\"modal_{$clean_major}\">{$major}</li>";
	}
	echo "</ul>";

echo "<ul>";

	$i = 0;
	foreach ($majors as $major => $list_value_media) {
		$clean_major = str_replace(" ", "",       $major);
		$clean_major = str_replace("'", "",       $clean_major);
		$clean_major = str_replace("/", "",       $clean_major);
    $clean_major = str_replace("&amp;",   "", $clean_major);
		$clean_major = str_replace("&#8217;", "", $clean_major);
		$clean_major = strtolower($clean_major);

    //Removes the s from the following degrees
    if($major == "Doctoral Degrees"){
      $major = "Doctoral Degree";
    }

    if($major == "Master&#8217;s Degrees"){
      $major = "Master&#8217;s Degree";
    }
		?>
		<div class="modal fade" id="modal_<?php echo $clean_major; ?>" tabindex="-1" role="dialog" aria-labelledby="modal_<?php echo $clean_major; ?>" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modal_<?php echo $clean_major; ?>_title"><?php echo $major; ?></h5>
          </div>
          <div class="modal-body">
						<iframe width="100%" height="315" src="<?php echo $list_value_media['video']; ?>" title='<?php echo "video-$clean_major"; ?>' frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
		<?php
	}
} // ufclas_modals_listMajors function


/*=========================================
*
* Modals for Convocaiton page
*
=========================================*/
// Majors Convocation modal
function ufclas_convocation_modals_list($majors) {

	echo "<div class='majors convocation-container'>";

	foreach ($majors as $major => $list_value_media) {
		$clean_major = str_replace(" ", "",       $major);
		$clean_major = str_replace("'", "",       $clean_major);
		$clean_major = str_replace("/", "",       $clean_major);
		$clean_major = str_replace("&amp;",   "", $clean_major);
    $clean_major = str_replace("&#8217;", "", $clean_major);
		$clean_major = strtolower($clean_major);

		$image 			 = "<img src='{$list_value_media['image']}' width='200' alt='test' />";
		echo "<div class='individual-major-convocation' id=\"{$clean_major}-modal\" data-toggle=\"modal\" data-target=\"#modal_{$clean_major}\" aria-labelledby=\"modal_{$clean_major}\">";
			echo "<div class='major-image'>{$image}</div>";
			echo "<div class='major-title'>{$major}</div>";
		echo "</div>";
	}
	echo "</div>";

	$i = 0;
	foreach ($majors as $major => $list_value_media) {
		$clean_major = str_replace(" ", "",       $major);
		$clean_major = str_replace("'", "",       $clean_major);
		$clean_major = str_replace("/", "",       $clean_major);
    $clean_major = str_replace("&amp;",   "", $clean_major);
		$clean_major = str_replace("&#8217;", "", $clean_major);
		$clean_major = strtolower($clean_major);

    //Removes the s from the following degrees
    if($major == "Doctoral Degrees"){
      $major = "Doctoral Degree";
    }

    if($major == "Master&#8217;s Degrees"){
      $major = "Master&#8217;s Degree";
    }
		?>
		<div class="modal fade convocation-modal" id="modal_<?php echo $clean_major; ?>" tabindex="-1" role="dialog" aria-labelledby="modal_<?php echo $clean_major; ?>" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modal_<?php echo $clean_major; ?>_title"><?php echo $major; ?></h5>
          </div>
          <div class="modal-body">
						<div class="modal-interior-image">
							<?php
								$image 			 = "<img src='{$list_value_media['image']}' width='200' alt='test' />";

								echo $image;
							?>
						</div>

						<div class="modal-interior-text">
							<div class="open-house-zoom-link">
								<?php
									//Zoom Link
									$zoomDate = $list_value_media['date'];
									$zoomLink = $list_value_media['zoom'];
								?>
								<p><span class="modal-label">Date:</span><?php echo $zoomDate; ?></p>

								<p><span class="modal-label">Zoom Link:</span> <a href="<?php echo $zoomLink; ?>" target="_blank"><?php echo $zoomLink; ?></a></p>
							</div>

							<div class="website-link">
								<?php
									//Link to their website
									$websiteLink = $list_value_media['website'];
								?>

								<p><span class="modal-label">More Information:</span> <a href="<?php echo $websiteLink; ?>" target="_blank"><?php echo $major; ?></a></p>
							</div>

							<div class="social-media-links">
								<?php
									//Social Media Links
									$socialMediaFacebook = $list_value_media['facebook'];
									$socialMediaInstagram = $list_value_media['instagram'];
									$socialMediaLinkedIn = $list_value_media['linkedin'];
								?>
								<p><span class="modal-label">Follow Us:</span></p>
								<p>
									<?php
										if($socialMediaFacebook != ''){
											echo "<a href='{$socialMediaFacebook}' target='_blank'><i class='fab fa-facebook'></i></a>";
										}

										if($socialMediaInstagram != ''){
											echo "<a href='{$socialMediaInstagram}' target='_blank'><i class='fab fa-instagram-square'></i></a>";
										}

										if($socialMediaLinkedIn != ''){
											echo "<a href='{$socialMediaLinkedIn}' target='_blank'><i class='fab fa-linkedin'></i></a>";
										}
									?>
								</p>

							</div>
						</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
		<?php
	}
} // ufclas_modals_listMajors function

// Curricular Convocation modals
function ufclas_convocation_curricular_modals_list($curricular) {

	echo "<div class='majors convocation-container'>";

	foreach ($curricular as $singleCurricular => $list_value_media) {
		$clean_curricular = str_replace(" ", "",       $singleCurricular);
		$clean_curricular = str_replace("'", "",       $clean_curricular);
		$clean_curricular = str_replace("/", "",       $clean_curricular);
		$clean_curricular = str_replace("&amp;",   "", $clean_curricular);
    $clean_curricular = str_replace("&#8217;", "", $clean_curricular);
		$clean_curricular = strtolower($clean_curricular);

		$image 			 = "<img src='{$list_value_media['image']}' width='200' alt='test' />";
		echo "<div class='individual-major-convocation' id=\"{$clean_curricular}-modal\" data-toggle=\"modal\" data-target=\"#modal_{$clean_curricular}\" aria-labelledby=\"modal_{$clean_curricular}\">";
			echo "<div class='major-image'>{$image}</div>";
			echo "<div class='major-title'>{$singleCurricular}</div>";
		echo "</div>";
	}
	echo "</div>";

	$i = 0;
	foreach ($curricular as $singleCurricular => $list_value_media) {
		$clean_curricular = str_replace(" ", "",       $singleCurricular);
		$clean_curricular = str_replace("'", "",       $clean_curricular);
		$clean_curricular = str_replace("/", "",       $clean_curricular);
    $clean_curricular = str_replace("&amp;",   "", $clean_curricular);
		$clean_curricular = str_replace("&#8217;", "", $clean_curricular);
		$clean_curricular = strtolower($clean_curricular);

		?>
		<div class="modal fade convocation-modal" id="modal_<?php echo $clean_curricular; ?>" tabindex="-1" role="dialog" aria-labelledby="modal_<?php echo $clean_curricular; ?>" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modal_<?php echo $clean_curricular; ?>_title"><?php echo $singleCurricular; ?></h5>
          </div>
          <div class="modal-body">
						<div class="modal-interior-image">
							<?php
								$image 			 = "<img src='{$list_value_media['image']}' width='200' alt='test' />";

								echo $image;
							?>
						</div>

						<div class="modal-interior-text">
							<div class="open-house-zoom-link">
								<?php
									//Zoom Link
									$zoomDate = $list_value_media['date'];
									$zoomLink = $list_value_media['zoom'];
								?>

								<p><span class="modal-label">Date:</span><?php echo $zoomDate; ?></p>

								<p><span class="modal-label">Zoom Link:</span> <a href="<?php echo $zoomLink; ?>" target="_blank"><?php echo $zoomLink; ?></a></p>

							</div>

							<div class="website-link">
								<?php
									//Link to their website
									$websiteLink = $list_value_media['website'];
								?>

								<p><span class="modal-label">More Information:</span> <a href="<?php echo $websiteLink; ?>" target="_blank"><?php echo $singleCurricular; ?></a></p>
							</div>

							<div class="social-media-links">
								<?php
									//Social Media Links
									$socialMediaFacebook = $list_value_media['facebook'];
									$socialMediaInstagram = $list_value_media['instagram'];
									$socialMediaLinkedIn = $list_value_media['linkedin'];
								?>
								<p><span class="modal-label">Follow Us:</span></p>
								<p>
									<?php
										if($socialMediaFacebook != ''){
											echo "<a href='{$socialMediaFacebook}' target='_blank'><i class='fab fa-facebook'></i></a>";
										}

										if($socialMediaInstagram != ''){
											echo "<a href='{$socialMediaInstagram}' target='_blank'><i class='fab fa-instagram-square'></i></a>";
										}

										if($socialMediaLinkedIn != ''){
											echo "<a href='{$socialMediaLinkedIn}' target='_blank'><i class='fab fa-linkedin'></i></a>";
										}
									?>
								</p>


							</div>
						</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
		<?php
	}
} // ufclas_modals_listMajors function
