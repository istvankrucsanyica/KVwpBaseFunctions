<?php

  /**
   * KVwpBaseFunctions - Disable WP-JSON
   *
   * @author Kreatív Vonalak - Istvan Krucsanyica <https://github.com/istvankrucsanyica/KVwpBaseFunctions>
   * @copyright (c) 2017, GNUv2
   * @package KVwpBaseFunctions
   * @since 1.0
   * @version 1.0
   */


  add_filter( 'json_enabled', '__return_false' );
  add_filter( 'json_jsonp_enabled', '__return_false' );
  remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );

?>
