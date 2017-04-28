<?php

  /**
   * KVwpBaseFunctions - Disable WP core update for some users, Disable Automatic Update Email Notification
   *
   * @author Kreatív Vonalak - Istvan Krucsanyica <https://github.com/istvankrucsanyica/KVwpBaseFunctions>
   * @copyright (c) 2017, GNUv2
   * @package KVwpBaseFunctions
   * @since 1.0.0
   * @version 1.0.1
   */


  /**
   * Disable WP core update for some users
   */
  if ( ! current_user_can( 'update_plugins' ) ) {
    add_action( 'init', create_function('$a', "remove_action('init', 'wp_version_check');"), 2 );
    add_filter( 'pre_option_update_core', create_function( '$a', 'return null;' ) );
  }


  /**
   * Disable Automatic Update Email Notification
   */
  add_filter( 'send_core_update_notification_email', '__return_false' );
  add_filter( 'auto_core_update_send_email', 'kvbf_stop_auto_update_email', 10, 4 );
  function kvbf_stop_auto_update_email( $send, $type, $core_update, $result ) {
    if ( ! empty( $type ) && $type == 'success' ) {
      return false;
    }
    return true;
  }

  ?>
