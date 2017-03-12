<?php

  /**
   * KVwpBaseFunctions - Media functions
   *
   * @author Kreatív Vonalak - Istvan Krucsanyica <https://github.com/istvankrucsanyica/KVwpBaseFunctions>
   * @copyright (c) 2017, GNUv2
   * @package KVwpBaseFunctions
   * @since 1.0
   * @version 1.0
   */



  /**
   * Remove special chars from file name
   */
  add_filter( 'sanitize_file_name', 'kvbf_sanitize_chars', 10 );
  function kvbf_sanitize_chars( $filename ) {
    return remove_accents( $filename );
  }


  /**
   * Disable base generate thumbnail
   */
  function kvbf_remove_default_image_sizes( $sizes) {
    unset($sizes['thumbnail']);
    unset($sizes['medium']);
    unset($sizes['medium_large']);
    unset($sizes['large']);
    return $sizes;
  }
  add_filter('intermediate_image_sizes_advanced','kvbf_remove_default_image_sizes');


  /**
   * Add new images size
   */
  add_image_size( 'base-thumb', 385, 385, true );
  add_image_size( 'content-thumb', 768 );


?>
