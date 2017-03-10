<?php

  /**
   * KVwpBaseFunctions - Remove YOAST plugin generated comments
   *
   * @author Kreatív Vonalak - Istvan Krucsanyica <https://github.com/istvankrucsanyica/KVwpBaseFunctions>
   * @copyright (c) 2017, GNUv2
   * @package KVwpBaseFunctions
   * @since 1.0
   * @version 1.0
   */


  if ( defined( 'WPSEO_VERSION' )) {
    add_action( 'get_header', function() {
      ob_start( function ( $o ) {
        return preg_replace('/\n?<.*?yoast.*?>/mi','',$o);
      });
    });
    add_action( 'wp_head', function() {
      ob_end_flush();
    }, 999 );
  }

?>
