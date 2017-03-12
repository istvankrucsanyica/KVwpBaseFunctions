<?php

  /**
   * KVwpBaseFunctions - Disable oEmbend
   *
   * @author Kreatív Vonalak - Istvan Krucsanyica <https://github.com/istvankrucsanyica/KVwpBaseFunctions>
   * @copyright (c) 2017, GNUv2
   * @package KVwpBaseFunctions
   * @since 1.0
   * @version 1.0
   */

  remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
  remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
  remove_action( 'wp_head', 'wp_oembed_add_host_js' );
  remove_action( 'rest_api_init', 'wp_oembed_register_route' );
  remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );

?>
