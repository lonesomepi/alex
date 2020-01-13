*/
  //
  // $get_all = get_site_option('active_plugins');
  // echo "<pre>";
  //   print_r($get_all);
  // echo "</pre>";


  function myplugin_action_hook_example() {

    wp_mail('alex.catalano2@gmail.com', 'Subject', 'Message...');

  }

  add_action( 'init', 'myplugin_action_hook_example');



  function myplugin_filter_hook_example( $content ) {

    $content = $content . '<p>Custom Content</p>';

    return $content;

  }

  add_fiter('the_content', 'myplugin_filter_hook_example');
