<?php

  /**
   * KVwpBaseFunctions - Admin bar modification
   *
   * @author Kreatív Vonalak - Istvan Krucsanyica <https://github.com/istvankrucsanyica/KVwpBaseFunctions>
   * @copyright (c) 2017, GNUv2
   * @package KVwpBaseFunctions
   * @since 1.0.3
   * @version 1.0.0
   */



  /**
   * Remove WP logo, search from admin bar header
   */
  add_action( 'wp_before_admin_bar_render', 'kvbf_admin_bar_remove', 999 );
  function kvbf_admin_bar_remove() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu( 'wp-logo' );
    $wp_admin_bar->remove_node( 'search' );
  }


  /**
   * Add visit site to your toolbar instead of being in the dropdown
   */
  add_action( 'admin_bar_menu', function ( $kvbf_admin_bar ) {
    if ( ! is_admin() ) { return; }
    $kvbf_admin_bar->remove_node( 'view-site' );
    $kvbf_admin_bar->add_menu( array(
      'id'    => 'view-site',
      'title' => __( 'Visit Site' ),
      'href'  => home_url( '/' ),
    ) );
  }, 31 );

?>
