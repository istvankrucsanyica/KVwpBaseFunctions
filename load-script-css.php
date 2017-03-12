<?php

  /**
   * KVwpBaseFunctions - Load script and css files
   *
   * @author Kreatív Vonalak - Istvan Krucsanyica <https://github.com/istvankrucsanyica/KVwpBaseFunctions>
   * @copyright (c) 2017, GNUv2
   * @package KVwpBaseFunctions
   * @since 1.0
   * @version 1.0
   */



  add_action( 'wp_enqueue_scripts', 'kvbf_template_scripts' );
  function kvbf_template_scripts() {
    wp_enqueue_style( TEXTDOMAIN.'-style', get_stylesheet_uri() );

    wp_enqueue_script( TEXTDOMAIN.'-main', THEME_URL . '/javascripts/main.min.js', array(), '', false );
  }


  /**
   * Remove version from js and css files
   */
  add_filter( 'script_loader_src', 'kvbf_remove_script_version', 15, 1 );
  add_filter( 'style_loader_src', 'kvbf_remove_script_version', 15, 1 );
  function kvbf_remove_script_version( $src ) {
    return remove_query_arg( 'ver', $src );
  }

?>
