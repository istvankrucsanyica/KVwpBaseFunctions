<?php

  /**
   * KVwpBaseFunctions - Editor functions, add shortcodes to the tinyMCE
   *
   * @author Kreatív Vonalak - Istvan Krucsanyica <https://github.com/istvankrucsanyica/KVwpBaseFunctions>
   * @copyright (c) 2017, GNUv2
   * @package KVwpBaseFunctions
   * @since 1.0
   * @version 1.0
   */



  if ( USE_EDITOR_STYLE == TRUE ) {

    add_action( 'after_setup_theme', 'kvbf_add_editor_styles' );
    function kvbf_add_editor_styles() {
      add_editor_style( 'editor-style.css' );
    }

  }


  add_action( 'admin_head', 'kvbf_add_shortcodes' );
  function kvbf_add_shortcodes() {
    if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) return;
    if ( get_user_option('rich_editing') == 'true') {
      add_filter( 'mce_external_plugins', 'kvbf_add_shortcode_tinymce_plugin', 20 );
      add_filter( 'mce_buttons', 'kvbf_register_shortcode_button',20 );
    }
  }


  function kvbf_register_shortcode_button( $buttons ) {
    array_push($buttons, "|", "kvbf_shortcodes_button");
    return $buttons;
  }


  function kvbf_add_shortcode_tinymce_plugin( $plugin_array ) {
    $plugin_array['KvbfShortcodes'] = get_template_directory_uri() .'/includes/tinymce/shortcode_mce.js';
    return $plugin_array;
  }

?>
