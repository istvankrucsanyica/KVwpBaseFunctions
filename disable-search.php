<?php

  /**
   * KVwpBaseFunctions - Disable search
   *
   * @author Kreatív Vonalak - Istvan Krucsanyica <https://github.com/istvankrucsanyica/KVwpBaseFunctions>
   * @copyright (c) 2017, GNUv2
   * @package KVwpBaseFunctions
   * @since 1.0.1
   * @version 1.0.1
   */

  function kvbf_disable_search( $query, $error = true ) {
    if ( is_search() ) {
      $query->is_search = false;
      $query->query_vars[s] = false;
      $query->query[s] = false;
      if ( $error == true )
        wp_redirect( site_url(), 301 ); exit;
    }
  }
  add_action( 'parse_query', 'kvbf_disable_search' );
  add_filter( 'get_search_form', create_function( '$a', "return null;" ) );

?>
